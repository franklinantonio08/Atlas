class Distcolaboradores {
    constructor() {
    }

    init(){

        
        if($('#nuevoregistro').length) {
            console.log('test')
          this.colaboradores();
          this.cambia_distrito();
          this.cambia_posiciones();
          //this.openCity();

          this.llamada();
      }

      if($('#nuevoregistro').length) {
          this.validatecolaboradores();
      }
      if($('#colaboradores').length) {
        this.colaboradores();
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

      //document.addEventListener("DOMContentLoaded", function () {
      
   // });

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
    
//console.log('por aqui vamos');

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }


    }

   // $('#provincia').on('change', function() { }


   llamada(){

    //$.post( BASEURL+'/buscadistrito', 

        //var BASEURL = '{{ url()->current() }}';
    //var token = '{{ csrf_token() }}';

    $(document).ready(function() {
        // Función para cargar el contenido del div listado
        function cargarListado() {
            console.log('cargarListado')
            $.ajax({
                url: BASEURL + '/listado', // Cambia esta URL según tu ruta Laravel
                type: 'GET',
                dataType: 'html',
                success: function(response) {
                    $('.cubiculo').html(response);

                    actualizarLlamados();
                },
                error: function(error) {
                    console.error('Error al cargar el listado:', error);
                }
            });
        }

        // Llama a la función al cargar la página
        cargarListado();

        // Programa la recarga cada 3 minutos
        setInterval(cargarListado, 5000); // 180000 milisegundos = 3 minutos
    });

    function actualizarLlamados() {
        console.log('actualizarLlamados')
        $('[data-llamado]').each(function() {
            var llamado = parseInt($(this).data('llamado'));
            if (llamado < 3) {
                convertirTexto();
                // Actualiza el atributo data-llamado para evitar ejecutar convertirTexto en futuras llamadas.
                $(this).data('llamado', llamado + 1);
            }
        });
    }

    function convertirTexto() {

        console.log('convertirTexto');
        var turno1 = document.getElementById('turno1').value;

        console.log(turno1);

        var mensaje = 'Favor pasar al cubiculo 1, el turno ' + turno1; 


        //console.log(turno1);
    
        // Crea un nuevo objeto SpeechSynthesisUtterance
        var utterance = new SpeechSynthesisUtterance(mensaje);
    
        // Establece el idioma como español
        utterance.lang = 'es-ES';
    
        // Establece la velocidad de la voz (ajusta según preferencias)
        utterance.rate = 1.0; // Puedes ajustar este valor para hacer la voz más fluida
    
        // Obtiene la lista de voces disponibles
        var voices = window.speechSynthesis.getVoices();
    
        // Encuentra una voz femenina (si está disponible)
        var feminineVoice = voices.find(voice => voice.lang === 'es-ES' && voice.name.includes('femenina'));
    
        // Establece la voz (opcional)
        utterance.voice = feminineVoice || voices.find(voice => voice.lang === 'es-ES');
    
        // Pronuncia el texto
        window.speechSynthesis.speak(utterance);
    
        // Muestra el texto hablado
        //document.getElementById('output').innerText = 'Hablando: ' + turno1;
    }
   }

 

   test(){
    //document.addEventListener("DOMContentLoaded", function () {
        const navActive = document.getElementById('navActive');
        const navLink = document.getElementById('navLink');
        const navDisabled = document.getElementById('navDisabled');
        const formContainer = document.getElementById('formContainer');

        navActive.addEventListener('click', function (event) {
            event.preventDefault();
            formContainer.innerHTML = `
                <form id="nuevoregistro" name="nuevoregistro" method="POST" action="{{ url()->current('/dist/departamento/nuevo') }}" enctype="multipart/form-data">
                    <!-- Your form content here -->
                </form>
            `;
            formContainer.style.display = 'block';
        });

        navLink.addEventListener('click', function (event) {
            event.preventDefault();
            formContainer.style.display = 'none';
        });

        navDisabled.addEventListener('click', function (event) {
            event.preventDefault();
            formContainer.style.display = 'none';
        });
   // });
   }




    cambia_distrito() {

        console.log(BASEURL);

        const _this = this;
    $('#provincia').on('change', function() { 
        var provincia = $( "#provincia" ).val();  
        var obj_div = document.getElementById('DivResultado_distrito'); 
        var selec1 = '<div class="form-floating mb-3">';
        selec1 += '<select id="distrito" name="distrito"  class="form-select" > ';
        selec1 += '<option value="" selected disabled>Selecciona un departamento</option>';
        var selec2 = '</select> </div>';
        var valor = selec1;
             
        if(provincia != ''){

            console.log('por aqui entra al post');

            $.post( BASEURL+'/buscadistrito', 
                {
                _token:token, provincia:provincia
                }
                ).done(function( data ) {
                    if(data.response == true){ 
                    $.each(data.data, function (id, value) {
                        $.each(value, function (id, valur) {
                            const distri = valur;
                            valor +=distri;
                        });
                    });
                    
                    valor +=selec2;
                    obj_div.innerHTML =valor;
                    //_this.cambia_corregimiento();
                }
                })
                .fail(function() {
                })
                .always(function() {
                }, "json");
            //console.log(provincia, distrito, corregimiento);
        }else{

            console.log('no entra al post');

            const distri = '<option value="" seleted >S/A</option>';            
            valor +=distri;            
            valor +=selec2;
            obj_div.innerHTML =valor;
           // _this.cambia_corregimiento();
        }

      });

    

            $('#DivResultado_distrito').on('change', function() { 
                
                  //  _this.cambia_corregimiento();
                
            });
    }

    

    cambia_posiciones() {

        console.log(BASEURL);

        const _this = this;
    $('#departamento').on('change', function() { 

        console.log('post');

        var departamento = $( "#departamento" ).val();  
        var obj_div = document.getElementById('DivResultado_posiciones'); 
        var selec1 = '<div class="input-group mb-3">';
        selec1 += '<label style="width: 130px;" class="input-group-text" for="posiciones">Posicion</label>';
        selec1 += '<select class="form-select" id="posiciones" name="posiciones">';
        selec1 += '<option value="" selected disabled>Selecciona...</option>';
        var selec2 = '</select> </div>';
        var valor = selec1;
             
        if(departamento != ''){
            $.post( BASEURL+'/buscaposiciones', 
                {
                _token:token, departamento:departamento
                }
                ).done(function( data ) {
                    if(data.response == true){ 
                    $.each(data.data, function (id, value) {
                        $.each(value, function (id, valur) {
                            const posiciones = valur;
                            valor +=posiciones;
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

            console.log('no post');


            const posiciones = '<option value="" seleted >S/A</option>';            
            valor +=posiciones;            
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
        colaboradores(search){

            //var BASEURL = window.location.origin; 

            //console.log(BASEURL);

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