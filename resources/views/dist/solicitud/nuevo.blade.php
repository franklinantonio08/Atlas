@section('scripts')

<script>
    var BASEURL = '{{ url()->current() }}';
	var token = '{{ csrf_token() }}';
</script>

<script src="{{ asset('../js/comun/messagebasicModal.js') }}"></script>
<script type="text/javascript" src="{{ asset('../js/dist/solicitud/solicitud.js') }}"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@stop

@extends('layouts.admin')

@section('content')
   
 <!-- ACTION BUTTONS -->
 <div class="row">

    @include('includes/errors')
    @include('includes/success')

</div>

	<div class="col-lg-12">
        <div class="card mb-4">
			
            <div class="card-body p-4">
                <div class="row">
                    <div class="col">
                        <div class="card-title fs-4 fw-semibold">Solicitud</div>
                    </div>
                </div>
			</div>

            <div class="table-responsive">
                   
                <!-- Formulario -->

                <div class="container-fluid px-2 my-2">
                    <form id="nuevoregistro" name="nuevoregistro" method="POST" action="{{ url()->current('/dist/departamento/nuevo') }}" enctype="multipart/form-data" autocomplete="off">
                            {{ csrf_field() }}
                        <div class="col-lg-5 m-b-6">
<!--
                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="width: 130px;" >Cedula</span>
                                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="width: 130px;">Nombre</span>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="width: 130px;">Apellido</span>
                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="">
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" >
                                    <span class="input-group-text" style="width: 130px;">@example.com</span>
                                  </div>

                                  <div class="input-group mb-3">
                                    <span class="input-group-text" style="width: 130px;">Teléfono</span>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="">
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" style="width: 130px;" for="inputGroupSelect01">Genero</label>
                                    <select class="form-select" id="genero" name="genero">
                                        <option value="" selected disabled>Seleccionar...</option>	
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>										
                                    </select>
                                  </div> -->

                                  <div class="input-group mb-3">
                                    <label class="input-group-text" style="width: 130px;" for="departamento">Departamento</label>
                                    <select class="form-select" id="departamento" name="departamento">
                                        <option value="" selected disabled>Selecciona...</option>
                                        @foreach ($departamento as $key => $value) 										
                                        <option value="{{ $value->id }}">{{ $value->nombre }}</option>										
                                        @endForeach
                                    </select>
                                  </div>

                                  <div class="input-group mb-3" id='DivResultado_tipoAtencion'>
                                    <div class="input-group mb-3">
                                    <label class="input-group-text" style="width: 130px;" for="motivo">Tipo Atencion</label>
                                    <select class="form-select" id="tipoAtencion" name="tipoAtencion">
                                        <option value="" selected disabled>Selecciona...</option>
                                    </select>
                                    </div>
                                </div> 

                                <!--
                                    <div class="input-group mb-3" id='DivResultado_motivo'>
                                        <div class="input-group mb-3">
                                        <label class="input-group-text" style="width: 130px;" for="motivo">Motivo</label>
                                        <select class="form-select" id="motivo" name="motivo">
                                            <option value="" selected disabled>Selecciona...</option>
                                        </select>
                                        </div>
                                    </div> 

                                    <div class="input-group mb-3" id='DivResultado_submotivo'>
                                        <div class="input-group mb-3">
                                        <label class="input-group-text" style="width: 130px;" for="submotivo">Submotivo</label>
                                        <select class="form-select" id="submotivo" name="submotivo">
                                            <option value="" selected disabled>Selecciona...</option>
                                        </select>
                                        </div>
                                    </div> -->


                                
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="comentario" name="comentario" type="text" placeholder="Comentario" style="height: 10rem;" ></textarea>
                                    <label for="comentario">Comentario</label>
                                </div>

                                <!-- ACTION BUTTONS -->
                                    <div class="form-group row">
                                        <div class="offset-12 col-12">
                                            <button id="submitForm" name="submitForm" type="submit" class="btn btn-primary text-white"><i class="fa fa-check m-r-5"></i> Guardar</button>
                                            <a href="{{ url()->previous() }}"  class="btn btn-danger text-white"><i class="fa fa-remove m-r-5"></i> Cancelar</a>
                                        </div>
                                    </div>
                                <!-- end ACTION BUTTONS -->

                               
                        </div>
                        
                    </form>
                </div>

                
            
                <!-- Fin Formulario-->

            </div>
	    </div>    
    </div>  



</div>

@include('includes/messagebasicmodal')
@endsection



