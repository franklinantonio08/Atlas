    class Distoperativo {
        constructor() {
            this.desde = '2024-01-01';

            // Corrección: Año futuro calculado correctamente y uso de moment()
            const hoy = moment();
            const fechaFutura = moment().add(1, 'year').endOf('month').format('YYYY-MM-DD');
            this.hasta = fechaFutura;

            const bootstrapColors = getComputedStyle(document.documentElement);

            this.colorSuccess = bootstrapColors.getPropertyValue('--bs-success') || '#198754';
            this.colorWarning = bootstrapColors.getPropertyValue('--bs-warning') || '#ffc107';
            this.colorDanger  = bootstrapColors.getPropertyValue('--bs-danger')  || '#dc3545';
            this.colorPrimary = bootstrapColors.getPropertyValue('--bs-primary') || '#0d6efd';
        }

        init() {
            if ($('#panel-operativo').length) {
                this.operativo();
            }

            this.configurarEventos();
            this.configurarRangoFechas();
        }

        configurarEventos() {
            // Usar arrow function para mantener contexto lexical de `this`
            const filtros = ['#operativoId', '#accionesId', '#motivosId', '#unidadId'];

            filtros.forEach(selector => {
                $(selector).on('change', () => this.operativo());
            });
        }

        configurarRangoFechas() {
            $('#reportrange span').html(`${this.desde} - ${this.hasta}`);

            $('#reportrange').daterangepicker({
                format: 'DD-MM-YYYY',
                startDate: moment(this.desde),
                endDate: moment(this.hasta),
                minDate: '2020-01-01',
                maxDate: moment().add(3, 'years').endOf('month'),
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                ranges: {
                    'Hoy': [moment(), moment()],
                    'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
                    'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
                    'Este Mes': [moment().startOf('month'), moment().endOf('month')],
                    'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'Todos': [moment('2020-01-01'), moment()]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-success',
                cancelClass: 'btn-default',
                locale: {
                    applyLabel: 'Enviar',
                    cancelLabel: 'Cancelar',
                    fromLabel: 'Desde',
                    toLabel: 'Hasta',
                    customRangeLabel: 'Personalizar',
                    daysOfWeek: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    firstDay: 1
                }
            }, (start, end) => {
                this.desde = start.format('YYYY-MM-DD');
                this.hasta = end.format('YYYY-MM-DD');

                $('#reportrange span').html(`${this.desde} - ${this.hasta}`);
                $('#reporte_fecha_titulo span').html(`Desde ${this.desde} - Hasta ${this.hasta}`);

                this.operativo();
            });
        }

        operativo() {
            // Esta función debe contener la lógica de carga de datos y visualizaciones
            console.log('Filtrando operativos entre', this.desde, 'y', this.hasta);
            // TODO: implementar

              this.buscarGeneros();
              this.buscarAcciones();
              this.buscarNacionalidades();
              this.buscarMotivos();
              this.buscarProvincias();
              this. buscarProvinciasMapa();
        }


        
            buscarGeneros() {
                const _this = this;

                $.ajax({
                    url: BASEURL + '/BuscarGenero',
                    type: 'POST',
                    data: {
                        _token: token,
                        desde: _this.desde,
                        hasta: _this.hasta,
                        operativoId: $('#operativoId').val(),
                        accionesId: $('#accionesId').val(),
                        motivosId: $('#motivosId').val(),
                        unidadId: $('#unidadId').val()
                    },
                    success: function (response) {
                        if (response.status === 'ok') {
                            let totalHombres = 0;
                            let totalMujeres = 0;

                            Object.values(response.data).forEach(provinciaStats => {
                                provinciaStats.forEach(stat => {
                                    if (stat.name === 'Masculino') {
                                        totalHombres += stat.y;
                                    } else if (stat.name === 'Femenino') {
                                        totalMujeres += stat.y;
                                    }
                                });
                            });

                            $('#kpi-hombres').text(totalHombres.toLocaleString());
                            $('#kpi-mujeres').text(totalMujeres.toLocaleString());
                        }
                    },
                    error: function () {
                        console.error('Error al consultar estadísticas de género');
                    }
                });
            }

            buscarAcciones(){

                const _this = this;

                $.ajax({
                    url: BASEURL + '/BuscarAcciones',
                    type: 'POST',
                    data: {
                        _token: token,
                        desde: _this.desde,
                        hasta: _this.hasta,
                        operativoId: $('#operativoId').val(),
                        accionesId: $('#accionesId').val(),
                        motivosId: $('#motivosId').val(),
                        unidadId: $('#unidadId').val()
                    },
                    success: function (response) {
                        if (response.status === 'ok') {
                            const meses = response.meses;
                            const series = response.series;

                            let totalGeneralArea = 0;
                            series.forEach(s => {
                                totalGeneralArea += s.data.reduce((a, b) => a + b, 0);
                            });

                            Highcharts.chart('area-chart-operativos', {
                                chart: { type: 'area' },
                                title: {
                                    text: `Total General: ${totalGeneralArea} Infractores`,
                                    style: { fontSize: '14px' }
                                },
                                xAxis: {
                                    categories: meses,
                                    tickmarkPlacement: 'on',
                                    title: { text: 'Mes' }
                                },
                                yAxis: {
                                    title: { text: 'Cantidad de Infractores' }
                                },
                                tooltip: {
                                    split: true,
                                    valueSuffix: ' Infractores'
                                },
                                plotOptions: {
                                    area: {
                                        stacking: 'normal',
                                        lineColor: '#666666',
                                        lineWidth: 1,
                                        marker: {
                                            lineWidth: 1,
                                            lineColor: '#666666'
                                        }
                                    }
                                },
                                series: series
                            });
                        }
                    },
                    error: function () {
                        console.error('Error al cargar las acciones de operativos');
                    }
                });
                
            }

            buscarNacionalidades(){

                const _this = this;

                $.ajax({
                    url: BASEURL + '/BuscarNacionalidades',
                    type: 'POST',
                    data: {
                        _token: token,
                        desde: _this.desde,
                        hasta: _this.hasta,
                        operativoId: $('#operativoId').val(),
                        accionesId: $('#accionesId').val(),
                        motivosId: $('#motivosId').val(),
                        unidadId: $('#unidadId').val()
                    },
                    success: function (response) {
                        if (response.status === 'ok') {
                            const paises = response.data.paises;
                            const totalesPorPais = response.data.totales;
                            const porcentajesPorPais = response.data.porcentajes;
                            const totalGeneralPais = response.data.totalGeneral;

                            Highcharts.chart('global-bar-chart-pais', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: `Total General: ${totalGeneralPais} Infractores`,
                                    style: { fontSize: '14px' }
                                },
                                xAxis: {
                                    categories: paises,
                                    crosshair: true
                                },
                                yAxis: [{
                                    title: { text: 'Cantidad' }
                                }, {
                                    title: { text: 'Porcentaje' },
                                    opposite: true,
                                    max: 100
                                }],
                                tooltip: {
                                    shared: true,
                                    formatter: function () {
                                        const idx = this.points[0].point.index;
                                        return `<b>${paises[idx]}</b><br>` +
                                            `Infractores: <b>${totalesPorPais[idx]}</b><br>` +
                                            `Porcentaje: <b>${porcentajesPorPais[idx]}%</b>`;
                                    }
                                },
                                series: [{
                                    name: 'Cantidad',
                                    type: 'column',
                                    data: totalesPorPais,
                                    tooltip: { valueSuffix: '' },
                                    color: '#0d6efd'
                                }, {
                                    name: 'Porcentaje',
                                    type: 'spline',
                                    yAxis: 1,
                                    data: porcentajesPorPais,
                                    tooltip: { valueSuffix: '%' },
                                    color: '#ffc107'
                                }]
                            });
                        }
                    },
                    error: function () {
                        console.error('Error al consultar nacionalidades');
                    }
                });
            }

            buscarMotivos(){

                const _this = this;

                $.ajax({
                    url: BASEURL + '/BuscarMotivos',
                    type: 'POST',
                    data: {
                        _token: token,
                        desde: this.desde,
                        hasta: this.hasta,
                        operativoId: $('#operativoId').val(),
                        accionesId: $('#accionesId').val(),
                        motivosId: $('#motivosId').val(),
                        unidadId: $('#unidadId').val()
                    },
                    success: function (response) {
                        if (response.status === 'ok') {
                            const dataPie = response.data;
                            const totalPie = response.total;

                            Highcharts.chart('global-pie-chart', {
                                chart: { type: 'pie' },
                                title: {
                                    text: `Total General: ${totalPie} Infractores`,
                                    style: { fontSize: '14px' }
                                },
                                tooltip: {
                                    pointFormat: '{series.name}: <b>{point.y}</b>'
                                },
                                accessibility: {
                                    point: { valueSuffix: '' }
                                },
                                plotOptions: {
                                    pie: {
                                        allowPointSelect: true,
                                        cursor: 'pointer',
                                        colors: ['#198754', '#ffc107', '#dc3545'],
                                        dataLabels: {
                                            enabled: true,
                                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                        }
                                    }
                                },
                                series: [{
                                    name: 'Cantidad',
                                    colorByPoint: true,
                                    data: dataPie
                                }]
                            });
                        }
                    },
                    error: function () {
                        console.error('Error al cargar motivos');
                    }
                });
            }

            buscarProvincias(){

                const _this = this;

                $.ajax({
                    url: BASEURL + '/BuscarProvincias',
                    type: 'POST',
                    data: {
                        _token: token,
                        desde: this.desde,
                        hasta: this.hasta,
                        operativoId: $('#operativoId').val(),
                        accionesId: $('#accionesId').val(),
                        motivosId: $('#motivosId').val(),
                        unidadId: $('#unidadId').val()
                    },
                    success: function (response) {
                        if (response.status === 'ok') {
                            const provincias = response.provincias;
                            const totales = response.totales;
                            const porcentajes = response.porcentajes;
                            const totalBar = response.total;

                            Highcharts.chart('global-bar-chart', {
                                chart: { type: 'column' },
                                title: {
                                    text: `Total General: ${totalBar} Infractores`,
                                    style: { fontSize: '14px' }
                                },
                                xAxis: {
                                    categories: provincias,
                                    crosshair: true
                                },
                                yAxis: [{
                                    title: { text: 'Cantidad' }
                                }, {
                                    title: { text: 'Porcentaje' },
                                    opposite: true,
                                    max: 100
                                }],
                                tooltip: {
                                    shared: true,
                                    formatter: function () {
                                        const idx = this.points[0].point.index;
                                        return `<b>${provincias[idx]}</b><br>` +
                                            `Infractores: <b>${totales[idx]}</b><br>` +
                                            `Porcentaje: <b>${porcentajes[idx]}%</b>`;
                                    }
                                },
                                series: [{
                                    name: 'Cantidad',
                                    type: 'column',
                                    data: totales,
                                    tooltip: { valueSuffix: '' },
                                    color: _this.colorPrimary || '#0d6efd'
                                }, {
                                    name: 'Porcentaje',
                                    type: 'spline',
                                    yAxis: 1,
                                    data: porcentajes,
                                    tooltip: { valueSuffix: '%' },
                                    color: '#ffc107'
                                }]
                            });
                        }
                    },
                    error: function () {
                        console.error('Error al cargar provincias');
                    }
                });
            }

            buscarProvinciasMapa() {
                const _this = this;

                // Verifica los códigos disponibles en el mapa
                console.log(Highcharts.maps['countries/pa/pa-all'].features.map(f => f.properties['hc-key']));

                $.ajax({
                    url: BASEURL + '/BuscarProvinciasMapa',
                    type: 'POST',
                    data: {
                        _token: token,
                        desde: _this.desde,
                        hasta: _this.hasta,
                        operativoId: $('#operativoId').val(),
                        accionesId: $('#accionesId').val(),
                        motivosId: $('#motivosId').val(),
                        unidadId: $('#unidadId').val()
                    },
                    success: function (response) {
                        if (response.status === 'ok') {
                            const dataOperativos = response.dataOperativos;
                            const extraStats = response.extraStats;
                            const totalGeneral = response.totalGeneral;

                            Highcharts.mapChart('mapa-operativos', {
                                chart: {
                                    map: 'countries/pa/pa-all',
                                    events: {
                                        load: function () {
                                            if (typeof proj4 === 'undefined') {
                                                Highcharts.error = function () {}; // silenciar warning
                                            }
                                        }
                                    }
                                },
                                title: {
                                    text: `Total General: ${totalGeneral} Infractores`,
                                    style: { fontSize: '14px' }
                                },
                                subtitle: {
                                    text: 'Haz clic en una provincia para ver detalles',
                                    align: 'left'
                                },
                                colorAxis: {
                                    dataClasses: [
                                        { to: 5, color: _this.colorSuccess.trim(), name: '1–5 Bajo' },
                                        { from: 6, to: 15, color: _this.colorWarning.trim(), name: '6–15 Medio' },
                                        { from: 16, color: _this.colorDanger.trim(), name: '16+ Alto' }
                                    ]
                                },
                                tooltip: {
                                    useHTML: true,
                                    formatter: function () {
                                        return `<b>${this.point.name}</b><br><i class="bi bi-people-fill"></i> ${this.point.value || 0} Infractores`;
                                    }
                                },
                                series: [{
                                    mapData: Highcharts.maps['countries/pa/pa-all'], // <- NECESARIO
                                    joinBy: 'hc-key',                                  // <- NECESARIO
                                    data: dataOperativos,
                                    name: 'Operativos',
                                    allowPointSelect: true,
                                    states: {
                                        hover: { color: '#feb24c' },
                                        select: { color: '#ffa07a', borderColor: '#000' }
                                    },
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.name}: {point.value}'
                                    },
                                    point: {
                                        events: {
                                            click: function () {
                                                const hcKey = this.options['hc-key'];
                                                const stats = extraStats[hcKey] || [];

                                                if (stats.length === 0) return;

                                                const modal = new bootstrap.Modal(document.getElementById('modalPieChart'));
                                                modal.show();

                                                setTimeout(() => {
                                                    Highcharts.chart('pie-chart-container', {
                                                        chart: { type: 'pie' },
                                                        title: {
                                                            text: this.name === 'Panamá' ? 'Panamá y Panamá Oeste' : `Detalles: ${this.name}`
                                                        },
                                                        tooltip: {
                                                            pointFormat: '{series.name}: <b>{point.y}</b>'
                                                        },
                                                        plotOptions: {
                                                            pie: {
                                                                allowPointSelect: true,
                                                                cursor: 'pointer',
                                                                dataLabels: {
                                                                    enabled: true,
                                                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                                                }
                                                            }
                                                        },
                                                        series: [{
                                                            name: 'Cantidad',
                                                            colorByPoint: true,
                                                            data: stats
                                                        }]
                                                    });
                                                }, 300);
                                            }
                                        }
                                    }
                                }]
                            });
                        }
                    },
                    error: function () {
                        console.error('Error al cargar datos del mapa');
                    }
                });
            }
    }

    $(document).ready(() => {
        const dist = new Distoperativo();
        dist.init();
    });
