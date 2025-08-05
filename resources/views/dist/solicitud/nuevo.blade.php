@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}">
@endsection


@section('scripts')

<script>
    var BASEURL = '{{ url()->current() }}';
	var token = '{{ csrf_token() }}';
</script>

    <script src="{{ asset('plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/comun/messagebasicModal.js') }}"></script>
    <script src="{{ asset('js/dist/solicitud/solicitud.js') }}"></script>\
@endsection


@section('content')
<div class="row">
    @include('includes.errors')
    @include('includes.success')
</div>

<div class="col-lg-12">
    <div class="card mb-4">
        <div class="container-fluid py-4">
            <form id="nuevoregistro" name="nuevoregistro" method="POST" action="{{ url()->current('/dist/departamento/nuevo') }}" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">Solicitud</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="departamento" class="form-label fw-bold text-primary">Departamento</label>
                                <select class="form-select border-primary" id="departamento" name="departamento">
                                    <option value="" selected disabled>Selecciona...</option>
                                    @foreach ($departamento as $key => $value) 										
                                        <option value="{{ $value->id }}">{{ $value->nombre }}</option>										
                                    @endForeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3" id="DivResultado_tipoAtencion">
                                <label for="tipoAtencion" class="form-label fw-bold text-primary">Tipo Atención</label>
                                <select class="form-select border-primary" id="tipoAtencion" name="tipoAtencion">
                                    <option value="" selected disabled>Selecciona...</option>
                                </select>
                            </div>

                            {{-- Puedes habilitar estos campos luego si lo necesitas --}}
                            {{-- 
                            <div class="col-md-6 mb-3" id="DivResultado_motivo">
                                <label for="motivo" class="form-label fw-bold text-primary">Motivo</label>
                                <select class="form-select border-primary" id="motivo" name="motivo">
                                    <option value="" selected disabled>Selecciona...</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3" id="DivResultado_submotivo">
                                <label for="submotivo" class="form-label fw-bold text-primary">Submotivo</label>
                                <select class="form-select border-primary" id="submotivo" name="submotivo">
                                    <option value="" selected disabled>Selecciona...</option>
                                </select>
                            </div>
                            --}}

                            <div class="col-md-12 mb-3">
                                <label for="comentario" class="form-label fw-bold text-primary">Comentario</label>
                                <textarea class="form-control border-primary" id="comentario" name="comentario" rows="4" placeholder="Comentario..."></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <button id="submitForm" name="submitForm" type="submit" class="btn btn-primary shadow">
                            <i class="fa fa-check"></i> Guardar
                        </button>
                        <a href="{{ url()->previous() }}" class="btn btn-danger shadow">
                            <i class="fa fa-remove"></i> Cancelar
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


@include('includes.confirmacionmodal')
@include('includes.messagebasicmodal')
@include('includes.loader')
@include('includes.download')
@endsection


