@extends('layouts.admin')

@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-body p-4">
            <div id="panel-operativo" class="d-none"></div>        
            <div class="row mb-4">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="fw-bold mb-1 text-dark">Panel de Operativos</h2>
                        <small class="text-muted">Estadísticas y visualizaciones en tiempo real</small>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0">
                            <li class="breadcrumb-item">
                                <i class="bi bi-house-door"></i>
                                <span>Inicio</span>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <i class="bi bi-speedometer2"></i>
                                Dashboard
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Alertas -->
            <div class="row mb-4">
                <div class="col-12">
                    @include('includes.errors')
                    @include('includes.success')
                </div>
            </div>

         
            <!-- Filtros de búsqueda -->
            <div class="row g-3 mb-4 align-items-end">
                <!-- Rango de Fechas -->
                <div class="col-md-4">
                    <label class="form-label fw-semibold text-muted small text-uppercase">Rango de Fechas</label>
                    <div id="reportrange" class="form-control d-flex align-items-center shadow-sm border border-success-subtle rounded">
                        <i class="bi bi-calendar-event me-2 text-success fs-5"></i>
                        <span class="flex-grow-1">Seleccione la fecha</span>
                        <i class="bi bi-caret-down-fill ms-auto text-muted"></i>
                    </div>
                </div>

                <!-- Operación -->
                <div class="col-md-2">
                    <label class="form-label fw-semibold text-muted small text-uppercase">Operación</label>
                    <select class="form-select shadow-sm" id="operativoId" name="operativoId">
                        <option value="">Todos</option>
                        @foreach ($operativo as $value)
                            <option value="{{ $value->id }}">{{ $value->descripcion }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Acciones -->
                <div class="col-md-2">
                    <label class="form-label fw-semibold text-muted small text-uppercase">Acciones</label>
                    <select class="form-select shadow-sm" id="accionesId" name="accionesId">
                        <option value="">Todos</option>
                        @foreach ($acciones as $value)
                            <option value="{{ $value->id }}">{{ $value->descripcion }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Motivos -->
                <div class="col-md-2">
                    <label class="form-label fw-semibold text-muted small text-uppercase">Motivos</label>
                    <select class="form-select shadow-sm" id="motivosId" name="motivosId">
                        <option value="">Todos</option>
                        @foreach ($motivos as $value)
                            <option value="{{ $value->id }}">{{ $value->descripcion }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Unidad Solicitante -->
                <div class="col-md-2">
                    <label class="form-label fw-semibold text-muted small text-uppercase">Unidad Solicitante</label>
                    <select class="form-select shadow-sm" id="unidadId" name="unidadId">
                        <option value="">Todos</option>
                        @foreach ($unidad as $value)
                            <option value="{{ $value->id }}">{{ $value->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

               <!-- KPIs de Totales por Género - Área Chart -->
            <div class="row mb-4">

                <div class="col-md-6">                        
                    <!-- KPI Masculino -->
                    <div class="card shadow-lg border-0 rounded-4 mb-4">
                        <div class="card-header bg-dark text-white rounded-top-4 text-center fw-semibold">
                            Total Masculino
                        </div>
                        <div class="card-body text-center" style="font-family: 'Segoe UI', Roboto, sans-serif;">
                            <div class="d-flex flex-column align-items-center">
                                <i class="bi bi-gender-male" style="font-size: 3rem; color: #0d6efd;"></i>
                                <div class="fs-3 fw-bold text-primary mt-1" id="kpi-hombres">0</div>
                                <div class="fw-semibold text-uppercase mt-2" style="color: #0d6efd;">Masculino</div>
                            </div>
                        </div>
                    </div>

                    <!-- KPI Femenino -->
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-header bg-dark text-white rounded-top-4 text-center fw-semibold">
                            Total Femenino
                        </div>
                        <div class="card-body text-center" style="font-family: 'Segoe UI', Roboto, sans-serif;">
                            <div class="d-flex flex-column align-items-center">
                                <i class="bi bi-gender-female" style="font-size: 3rem; color: #e83e8c;"></i>
                                <div class="fs-3 fw-bold" style="color: #e83e8c;" id="kpi-mujeres">0</div>
                                <div class="fw-semibold text-uppercase mt-2" style="color: #e83e8c;">Femenino</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna derecha: Área Chart -->
                <div class="col-md-6">
                    <div class="card shadow-lg border-0 rounded-4 h-100">
                        <div class="card-header bg-dark text-white rounded-top-4 text-center fw-semibold">
                            <i class="bi bi-graph-up-arrow me-2"></i> Total de Infractores por Acciones en el Tiempo
                        </div>
                        <div class="card-body">
                            <div id="area-chart-operativos" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráfico General de Barras -->

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow-lg rounded-4">
                        <div class="card-header bg-dark text-white rounded-top-4 text-center fw-semibold">
                            <i class="bi bi-bar-chart-fill me-2"></i> Totales y Porcentajes por Nacionalidad
                        </div>
                        <div class="card-body">
                            <div id="global-bar-chart-pais" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráfico General de Pastel y Barras -->
            <div class="row mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="card shadow-lg rounded-4">
                        <div class="card-header bg-dark text-white rounded-top-4 text-center fw-semibold">
                            <i class="bi bi-pie-chart-fill me-2"></i> Distribución de Motivos Aplicados
                        </div>
                        <div class="card-body">
                            <div id="global-pie-chart" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-lg rounded-4">
                        <div class="card-header bg-dark text-white rounded-top-4 text-center fw-semibold">
                            <i class="bi bi-bar-chart-fill me-2"></i> Totales y Porcentajes por Provincia
                        </div>
                        <div class="card-body">
                            <div id="global-bar-chart" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mapa por Provincia -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow-lg rounded-4">
                        <div class="card-header bg-dark text-white rounded-top-4 text-center fw-semibold">
                            <i class="bi bi-geo-alt-fill me-2"></i> Mapa de Infractores por Provincia
                        </div>
                        <div class="card-body">
                            <div id="mapa-operativos" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal con gráfico de pastel -->
<div class="modal fade" id="modalPieChart" tabindex="-1" aria-labelledby="modalPieChartLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalPieChartLabel">
                    <i class="bi bi-pie-chart-fill me-2"></i> Detalles por Provincia
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div id="pie-chart-container" style="height: 350px;"></div>
            </div>
        </div>
    </div>
</div>

@include('includes.confirmacionmodal')
@include('includes.messagebasicmodal')
@endsection


@section('scripts')
        <script>
            const BASEURL = '{{ url()->current() }}';
            const token = '{{ csrf_token() }}';
        </script>

        <!-- JS Específicos -->       
        <script src="{{ asset('js/comun/confirmacionModal.js') }}"></script>
        <script src="{{ asset('js/comun/messagebasicModal.js') }}"></script>

        <!-- Plugins -->
        <script src="{{ asset('plugins/moment/moment.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

        <!-- Highcharts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.8.0/proj4.js"></script>
        <script src="https://code.highcharts.com/maps/highmaps.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script src="https://code.highcharts.com/mapdata/countries/pa/pa-all.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>        
        <script src="{{ asset('js/dist/dashboard/operativo.js') }}"></script>

@endsection
