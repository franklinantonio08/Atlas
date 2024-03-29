@section('scripts')

<script>
	var token = '{{ csrf_token() }}';
</script>
	
<script type="text/javascript" src="{{ asset('../js/dist/posiciones/posiciones.js') }}"></script>
<script src="{{ asset('../js/comun/messagebasicModal.js') }}"></script>

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
       
    <!-- Formulario -->
   
	<div class="col-lg-12">
        <div class="card mb-4">
			
            <div class="card-body p-4">
                <div class="row">
                    <div class="col">
                        <div class="card-title fs-4 fw-semibold">Posición</div>
                    </div>
                </div>
			</div>

            <div class="table-responsive">

            

                <div class="container-fluid px-2 my-2">
                    <form id="nuevoregistro" name="nuevoregistro" method="POST" action="{{ url()->current('/dist/posiciones/nuevo') }}" enctype="multipart/form-data" autocomplete="off">
                            {{ csrf_field() }}
                            
                            <input type="hidden" id="posicionesId" name="posicionesId" value="{{$posiciones->id}}" class="form-control text-right" placeholder="">

                        <div class="col-lg-5 m-b-6">

                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="width: 130px;">Nombre</span>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""value="{{$posiciones->nombre}}">
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" style="width: 130px;" for="departamento">Departamento</label>
                                    <select class="form-select" id="departamento" name="departamento">
                                        <option value="" selected disabled>Selecciona...</option>
                                        @foreach ($departamento as $key => $value) 										
                                        
                                        @if($posiciones->departamento == $value->nombre)
										<option value="{{  $value->id }}" selected>{{$value->nombre }}</option>
										@else
										<option value="{{ $value->id }}">{{ $value->nombre }}</option>
										@endif
                                        
                                        @endForeach
                                    </select>
                                  </div>

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



