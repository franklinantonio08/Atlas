class Distcolaboradores {
    constructor() {
    }

    init(){
        
        if($('#colaboradores').length) {
          this.colaboradores();
      }

      if($('#nuevoregistro').length) {
          this.validatecolaboradores();
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
          _this.colaboradores( $( "#search" ).val() );
      });

      $('#search').keypress(function(event){
          var keycode = (event.keyCode ? event.keyCode : event.which);
          if(keycode == '13'){
              _this.colaboradores( $( "#search" ).val());
              event.preventDefault();
              return false;
          }
          event.stopPropagation();
      });
    
    }

        /*BEGIN TABLA USUARIO*/
        colaboradores(search){

            //var BASEURL = window.location.origin; 

            console.log(BASEURL);

          const _this = this

              const table = $('#colaboradores').DataTable( {
                  "destroy": true,
                  "searching": false,
                  "serverSide": true,
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
                          var info = $('#colaboradores').DataTable().page.info();
                          
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
                      { "data": "nombre" },
                      { "data": "codigo" },
                      { "data": "correo" },
                      { "data": "telefono" },
                      { "data": "tipousuario" },
                      { "data": "estatus" },
                      { "data": "detalle" , "orderable": false, className: "actions text-right"},
                  ],
                  "initComplete": function (settings, json) {

                  },
                  "infoCallback": function( settings, start, end, max, total, pre ) {

                      _this.desactivarcolaboradores();

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
          validatecolaboradores(){

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
                        required: true,
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
          desactivarcolaboradores(){

              const _this = this

              $( ".desactivar" ).off('click');
                $( ".desactivar" ).click(function() {
                    
                    const colaboradoresId = $( this ).attr( "attr-id" );
                    var opciones = {colaboradoresId:colaboradoresId};
                    const message = 'Seguro que desea cambiar de estatus el colaboradores?'
                    const objConfirmacionmodal = new Confirmacionmodal(message, opciones, _this.callbackDesactivarcolaboradores);
                  objConfirmacionmodal.init();
                  
              });
          }
          

          callbackDesactivarcolaboradores(response, opciones){

   
              if(response == true){

                  const _this = this;

                  $.post( BASEURL+'/desactivar', 
                  {
                      colaboradoresId: opciones.colaboradoresId,
                      _token:token 
                      }
                  )
                  .done(function( data ) {

                    console.log('por aqui vamos')


                      if(data.response == true){
                          const modalTitle = 'Posiciones';
                          const modalMessage = 'El colaboradores ha sido cambiado de estatus';
                          const objMessagebasicModal = new MessagebasicModal(modalTitle, modalMessage);
                          objMessagebasicModal.init();

                          const objDistcolaboradoress = new Distcolaboradores();							
                          objDistcolaboradoress.init();	
                          //objDistcolaboradoress.colaboradoress($( "#search" ).val());

                      }else{
                          
                          const modalTitle = 'Posiciones';
                          const modalMessage = 'El colaboradores no se ha podido cambiar de estatus';
                          const objMessagebasicModal = new MessagebasicModal(modalTitle, modalMessage);
                          objMessagebasicModal.init();

                          //const objDistcolaboradoress = new Distcolaboradores();							
                          //objDistcolaboradoress.colaboradoress($( "#search" ).val());
                      }
                  })
                  .fail(function() {
                      
                      const modalTitle = 'Posiciones';
                      const modalMessage = 'El colaboradores no se ha podido cambiar de estatus';
                      const objMessagebasicModal = new MessagebasicModal(modalTitle, modalMessage);
                      objMessagebasicModal.init();

                      //const objDistcolaboradoress = new Distcolaboradores();							
                      //objDistcolaboradoress.colaboradoress($( "#search" ).val());
                      
                  })
                  .always(function() {
                      
                  }, "json");

              }
              
          }

          /*END DESACTIVAR UN DISTRIBUIDOR*/



  }


$(document).ready(function(){

  const objDistcolaboradores = new Distcolaboradores();
  objDistcolaboradores.init();

});