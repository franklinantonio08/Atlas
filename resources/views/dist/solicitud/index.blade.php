@extends('layouts.admin')

@section('content')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-body p-4">
            <!-- Título -->
            <div class="row mb-3">
                <div class="col-sm-12">
                    <h4 class="card-title fw-semibold">Lista de Solicitudes</h4>
                </div>
            </div>

            <!-- Filtros -->
            <div class="row align-items-end flex-wrap gap-3 mb-4">

                <!-- Rango de Fechas -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold text-muted">Rango de Fechas</label>
                    <div id="reportrange" class="form-control d-flex align-items-center shadow-sm border border-success-subtle rounded">
                        <i class="bi bi-calendar-event me-2 text-success fs-5"></i>
                        <span class="flex-grow-1">Seleccione la fecha</span>
                        <i class="bi bi-caret-down-fill ms-auto text-muted"></i>
                    </div>
                </div>

                <!-- Estado -->
                <div class="col-md-2">
                    <label class="form-label fw-semibold text-muted">Estado</label>
                    <select id="estadoFiltro" name="estadoFiltro" class="form-select shadow-sm">
                        <option value="">Todos</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Aprobado">Aprobado</option>
                        <option value="Rechazado">Rechazado</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>
                </div>

                <!-- Buscar -->
                <div class="col-md-4">
                    <label class="form-label fw-semibold text-muted">Buscar</label>
                    <div class="input-group shadow-sm">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Buscar...">
                        <button type="button" id="searchButton" class="btn btn-warning">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Nuevo -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold text-muted invisible">Nuevo</label>
                    <a href="{{ url()->current() }}/nuevo" class="btn btn-primary w-100 shadow-sm">
                        <i class="bi bi-file-earmark-plus me-1"></i> Nuevo Registro
                    </a>
                </div>
            </div>

            <!-- Mensajes -->
            <div class="row">
                @include('includes.errors')
                @include('includes.success')
            </div>

            <!-- Tabla -->
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered data-table" id="solicitud">
                        <thead>
                            <tr>
                                <th class="bg-primary fs-8 fw-semibold text-white">#</th>
                                <th class="bg-primary fs-8 fw-semibold text-white">Departamento</th>
                                <th class="bg-primary fs-8 fw-semibold text-white">Tipo Atención</th>
                                <th class="bg-primary fs-8 fw-semibold text-white">Código</th>
                                <th class="bg-primary fs-8 fw-semibold text-white">Estatus</th>
                                <th class="bg-primary fs-8 fw-semibold text-white">Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="gradeX">
                                <td colspan="6" class="text-center">No hay datos disponibles</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
<script src="{{ asset('js/dist/solicitud/solicitud.js') }}"></script>
<script src="{{ asset('js/comun/confirmacionModal.js') }}"></script>
<script src="{{ asset('js/comun/messagebasicModal.js') }}"></script>

<script src="{{ asset('plugins/moment/moment.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

@endsection
