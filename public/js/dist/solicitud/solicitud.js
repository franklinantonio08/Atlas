class Distsolicitud {
    constructor() {

        this.desde = '2024-01-01';
        this.hasta = moment().subtract(0, 'days').format('YYY-MM-DD');

        var date = new Date();
        var year1 = new Date();
        var year1 = year1.getFullYear() + 1;
        var field = year1.toString()+ '-' + (date.getMonth() + 1).toString().padStart(2, 0) + '-' + date.getDate().toString().padStart(2, 0);

        this.hasta = field;
    }

    init(){
        
        if($('#editarregistro').length) {
            this.cambia_motivo();
            this.cambia_tipoAtencion();

            const fechaNacimientoInput = document.getElementById('fechaNacimiento');

            // Obtener la fecha actual
            const fechaActual = new Date();
        
            // Establecer la fecha máxima como la fecha actual
            fechaNacimientoInput.max = fechaActual.toISOString().split('T')[0];
      }

      if($('#nuevoregistro').length) {
        //this.cambia_motivo();
        this.cambia_tipoAtencion();
        
        this.validatesolicitud();
      }

      if($('#solicitud').length) {
        this.solicitud();
    }

      if($('#nuevoimportar').length) {
        this.validateimportacion();
            /*INICIO Para el input File*/
            $(':file').on('fileselect', function(event, numFiles, label) {
                  var input = $(this).parents('.input-group').find(':text'),
                      log = numFiles > 1 ? numFiles + ' Archivo Seleccionado' : label;

                  if( input.length ) {
                      input.val(log);
                  } else {
                      if( log ) alert(log);
                  }

              });
              
            $(document).on('change', ':file', function() {
                var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
            });
            /*FINAL Para el input File*/
    }
     
      this.acciones();

    }

    acciones(){

        const _this = this;
                
        $( "#searchButton" ).off('click');
        $( "#searchButton" ).click(function() {
          _this.solicitud( $( "#search" ).val() );
      });

      $('#search').keypress(function(event){
          var keycode = (event.keyCode ? event.keyCode : event.which);
          if(keycode == '13'){
              _this.solicitud( $( "#search" ).val());
              event.preventDefault();
              return false;
          }
          event.stopPropagation();
      });

       $('#reportrange span').html(this.desde + ' - ' + this.hasta);

        $('#reportrange').daterangepicker({
              format: 'DD-MM-YYYY',
              startDate: '01/01/2020',
              endDate: moment(),
              minDate: '01/01/2020',
              maxDate: moment().add(3, 'year').endOf('month'),
              showDropdowns: true,
              showWeekNumbers: true,
              timePicker: false,
              timePickerIncrement: 1,
              timePicker12Hour: true,
              ranges: {
                  'Hoy': [moment(), moment()],
                  'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                  'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
                  'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
                  'Este Mes': [moment().startOf('month'), moment().endOf('month')],
                  'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                  'Todos': ['01/01/2020', moment()]
              },
              opens: 'right',
              drops: 'down',
              buttonClasses: ['btn', 'btn-sm'],
              applyClass: 'btn-success',
              cancelClass: 'btn-default',
              separator: ' to ',
              locale: {
                  applyLabel: 'Enviar',
                  cancelLabel: 'Cancelar',
                  fromLabel: 'Desde',
                  toLabel: 'Hasta',
                  customRangeLabel: 'Personalizar',
                  daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Augosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                  firstDay: 1
              }
        }, function (start, end, label) {
             // console.log(start.format('DD-MM-YYYY'), end.format('DD-MM-YYYY'));
              
              _this.desde = start.format('YYYY-MM-DD');
              _this.hasta = end.format('YYYY-MM-DD');

              _this.solicitud();
              
              $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
              $('#reporte_fecha_titulo span').html(' Desde ' + start.format('YYYY-MM-DD') + ' - Hasta ' + end.format('YYYY-MM-DD'));
                            
        }); 
    
    }

    cambia_tipoAtencion() {

        //console.log(BASEURL);

        const _this = this;
    $('#departamento').on('change', function() { 

        //console.log('post');

        var departamento = $( "#departamento" ).val();  
        var obj_div = document.getElementById('DivResultado_tipoAtencion'); 
        var selec1 = '<div class="input-group mb-3">';
        selec1 += '<label style="width: 130px;" class="input-group-text" for="tipoAtencion">Tipo Atencion</label>';
        selec1 += '<select class="form-select" id="tipoAtencion" name="tipoAtencion">';
        selec1 += '<option value="" selected disabled>Selecciona...</option>';
        var selec2 = '</select> </div>';
        var valor = selec1;
             
        if(departamento != ''){
            $.post( BASEURL+'/buscatipoatencion', 
                {
                _token:token, departamento:departamento
                }
                ).done(function( data ) {
                    if(data.response == true){ 
                    $.each(data.data, function (id, value) {
                        $.each(value, function (id, valur) {
                            const tipoAtencion = valur;
                            valor +=tipoAtencion;
                        });
                    });
                    
                    valor +=selec2;
                    obj_div.innerHTML =valor;

                    console.log(valor);
                    //_this.cambia_corregimiento();
                }
                })
                .fail(function() {
                })
                .always(function() {
                }, "json");
            //console.log(provincia, distrito, corregimiento);
        }else{

            //console.log('no post');


            const tipoAtencion = '<option value="" seleted >S/A</option>';            
            valor +=tipoAtencion;            
            valor +=selec2;
            obj_div.innerHTML =valor;
           // _this.cambia_corregimiento();
        }

      });

    

            $('#DivResultado_posiciones').on('change', function() { 
                
                  //  _this.cambia_corregimiento();
                
            });
    }

    cambia_motivo() {

        //console.log(BASEURL);

        const _this = this;
    $('#departamento').on('change', function() { 

        //console.log('post');

        var departamento = $( "#departamento" ).val();  
        var obj_div = document.getElementById('DivResultado_motivo'); 
        var selec1 = '<div class="input-group mb-3">';
        selec1 += '<label style="width: 130px;" class="input-group-text" for="motivo">Motivo</label>';
        selec1 += '<select class="form-select" id="motivo" name="motivo">';
        selec1 += '<option value="" selected disabled>Selecciona...</option>';
        var selec2 = '</select> </div>';
        var valor = selec1;
             
        if(departamento != ''){
            $.post( BASEURL+'/buscamotivo', 
                {
                _token:token, departamento:departamento
                }
                ).done(function( data ) {
                    if(data.response == true){ 
                    $.each(data.data, function (id, value) {
                        $.each(value, function (id, valur) {
                            const motivo = valur;
                            valor +=motivo;
                        });
                    });
                    
                    valor +=selec2;
                    obj_div.innerHTML =valor;

                    console.log(valor);
                    //_this.cambia_corregimiento();
                }
                })
                .fail(function() {
                })
                .always(function() {
                }, "json");
            //console.log(provincia, distrito, corregimiento);
        }else{

            //console.log('no post');


            const motivo = '<option value="" seleted >S/A</option>';            
            valor +=motivo;            
            valor +=selec2;
            obj_div.innerHTML =valor;
           // _this.cambia_corregimiento();
        }

      });

    

            $('#DivResultado_posiciones').on('change', function() { 
                
                  //  _this.cambia_corregimiento();
                
            });
    }

        /*BEGIN TABLA USUARIO*/
        solicitud(search){

            //var BASEURL = window.location.origin; 

        console.log(BASEURL);

          const _this = this

              const table = $('#solicitud').DataTable( {
                  "destroy": true,
                  "searching": false,
                  "serverSide": true,
                  "autoWidth": false,
                  "info": true,
                  "lengthMenu": objComun.lengthMenuDataTable,
                  "pageLength": pageLengthDataTable, //Variable global en el layout
                  "language": {
                      "lengthMenu": "Mostrar _MENU_ por página",
                      "zeroRecords": "No se ha encontrado información",
                      "info": "Mostrando _PAGE_ de _PAGES_",
                      "infoEmpty": "",
                  },
                  "ajax": {
                      "url":BASEURL,
                      "type": "POST",
                      "error": this.handleAjaxError, 
                      "data": function ( d ) {
                          var info = $('#solicitud').DataTable().page.info();
                          
                          var orderColumnNumber = d.order[0].column;
                          
                          objComun.orderDirReporte = d.order[0].dir; //Variable global en comun.js
                          objComun.orderColumnReporte = d.columns[orderColumnNumber].data; //Variable global en comun.js
                          objComun.lengthActualReporte = info.length; //Variable global en comun.js
                          objComun.paginaActualReporte = info.page+1; //Variable global en comun.js
                          
                          d.currentPage = info.page + 1;
                          d.searchInput = search;
                          d._token=token;
                      }
                  },
                  "columns": [
                      { "data": "id"},
                      { "data": "departamento" },
                      { "data": "TipoAtencion"},
                      { "data": "codigo" },
                      { "data": "estatus" },
                      { "data": "detalle" , "orderable": false, className: "actions text-end"},
                  ],
                  "initComplete": function (settings, json) {

                  },
                  "infoCallback": function( settings, start, end, max, total, pre ) {

                      _this.desactivarsolicitud();

                      var api = this.api();
                      var pageInfo = api.page.info();
                      return 'Mostrando '+ (pageInfo.page+1) +' de '+ pageInfo.pages;
                  }
              });
  
          }

          handleAjaxError( xhr, textStatus, error ) {
              console.log(error);
          }

          /*END TABLA USUARIO*/

          /*BEGIN VALIDAR NUEVO USUARIO*/
          validatesolicitud(){

            $('#nuevoregistro').submit(function(){
                $(this).find(':submit').attr('disabled','disabled');
              });
            //console.log('por aqui vamos')

              $("#nuevoregistro").validate({
                  submitHandler: function(form) {
                      console.log('submit');
                      form.submit();
                   },
                   invalidHandler:function(form) {
                   },
                   highlight: function(element) {
                    $('#submitForm').removeAttr("disabled");

                       var titleElemnt = $( element ).attr( "id" );
                       $("button[data-id*='"+titleElemnt+"']").addClass( "errorValidate" );
                       $(element).addClass( "errorValidate" );
                    },
                   unhighlight: function(element) {
                       var titleElemnt = $( element ).attr( "id" );
                       $("button[data-id*='"+titleElemnt+"']").addClass( "successValidate" );
                       $(element).addClass( "successValidate" ); 
                    },
                  rules: {
                    nombre: {
                        required: false,
                    },
                   
                  },
                  messages: {
                    regional: {
                        required: "",
                    },
                   
                  }
              });
          }
          /*END VALIDAR NUEVO USUARIO*/


          /* BEGIN  Validacion de importacion*/

          validateimportacion(){

            var validator = $("#nuevoimportar").validate({
                ignore: [],
                submitHandler: function(form) {
                    form.submit();
                },
                invalidHandler:function(form) {
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "archivoPlantilla") {
                    error.appendTo('#fileError');
                    } else {
                    error.insertAfter(element);
                    }
                },
                rules: {
                    archivoPlantilla: {
                        required: true,
                        extension: "xls|xlsx",
                        filesize: 1048576
                    }
                },
                messages: {
                    archivoPlantilla: {
                        required: "Este elemento es requerido",
                        extension: "Solo xls o xlsx",
                        filesize: "Tamaño plantilla incorrecto"
                    }
                }
            });

            $.validator.addMethod('filesize', function(value, element, param) {
                // param = size (in bytes) 
                // element = element to validate (<input>)
                // value = value of the element (file name)
                return this.optional(element) || (element.files[0].size <= param) 
            });	
            
        }

          /* End Validar Importacion */


          /*BEGIN DESACTIVAR UN USUARIO*/
          desactivarsolicitud(){

              const _this = this

              $( ".desactivar" ).off('click');
                $( ".desactivar" ).click(function() {
                    
                    const solicitudId = $( this ).attr( "attr-id" );
                    var opciones = {solicitudId:solicitudId};
                    const message = 'Seguro que desea cambiar de estatus el solicitud?'
                    const objConfirmacionmodal = new Confirmacionmodal(message, opciones, _this.callbackDesactivarsolicitud);
                  objConfirmacionmodal.init();
                  
              });
          }
          

          callbackDesactivarsolicitud(response, opciones){

   
              if(response == true){

                  const _this = this;

                  $.post( BASEURL+'/desactivar', 
                  {
                      solicitudId: opciones.solicitudId,
                      _token:token 
                      }
                  )
                  .done(function( data ) {

                    console.log('por aqui vamos')


                      if(data.response == true){
                          const modalTitle = 'Solicitud';
                          const modalMessage = 'El solicitud ha sido cambiado de estatus';
                          const objMessagebasicModal = new MessagebasicModal(modalTitle, modalMessage);
                          objMessagebasicModal.init();

                          const objDistsolicituds = new Distsolicitud();							
                          objDistsolicituds.init();	
                          //objDistsolicituds.solicituds($( "#search" ).val());

                      }else{
                          
                          const modalTitle = 'Solicitud';
                          const modalMessage = 'El solicitud no se ha podido cambiar de estatus';
                          const objMessagebasicModal = new MessagebasicModal(modalTitle, modalMessage);
                          objMessagebasicModal.init();

                          //const objDistsolicituds = new Distsolicitud();							
                          //objDistsolicituds.solicituds($( "#search" ).val());
                      }
                  })
                  .fail(function() {
                      
                      const modalTitle = 'Solicitud';
                      const modalMessage = 'El solicitud no se ha podido cambiar de estatus';
                      const objMessagebasicModal = new MessagebasicModal(modalTitle, modalMessage);
                      objMessagebasicModal.init();

                      //const objDistsolicituds = new Distsolicitud();							
                      //objDistsolicituds.solicituds($( "#search" ).val());
                      
                  })
                  .always(function() {
                      
                  }, "json");

              }
              
          }

          /*END DESACTIVAR UN DISTRIBUIDOR*/



  }


$(document).ready(function(){

  const objDistsolicitud = new Distsolicitud();
  objDistsolicitud.init();

  let valfon = "";


   var maelissa =  "sebastian"; 

   console.log(maelissa);


});