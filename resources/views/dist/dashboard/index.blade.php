@extends('layouts.dashboard')

@section('body_class', 'sin-scroll')

@section('content')

<style>
    body {
        background-color: #f0f2f5;
    }

    .contenedor-principal {
        display: flex;
        gap: 30px;
        padding: 20px 40px 40px;
    }

    .panel-turnos {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .modulo-card {
        background: white;
        border-left: 10px solid #007bff;
        border-radius: 10px;
        padding: 20px;
        text-align: left;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .modulo-card h2 {
        font-size: 1.8rem;
        color: #007bff;
        margin: 0;
        flex: 1;
    }

    .modulo-card .turno {
        font-size: 2.8rem;
        font-weight: bold;
        color: #333;
        text-align: right;
        flex: 1;
    }

    .panel-video {
        flex: 1.5;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .panel-video video {
        width: 100%;
        height: auto;
        border-radius: 16px;
        box-shadow: 0 0 20px rgba(0,0,0,0.15);
    }

    @media (max-width: 992px) {
        .contenedor-principal {
            flex-direction: column;
            padding: 20px;
        }

        .modulo-card {
            flex-direction: column;
            text-align: center;
        }

        .modulo-card h2,
        .modulo-card .turno {
            font-size: 2rem;
        }
    }
</style>

<div class="container-fluid">

    <div class="contenedor-principal">

        <!-- Turnos a la izquierda -->
        <div class="panel-turnos">
            @foreach ($cubiculo as $value)
                @if ($value->posicion <= 7)
                    <div class="modulo-card">
                        <h2>MÓDULO {{ $value->posicion }}</h2>
                        <div class="turno">{{ $value->codigo }}</div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Video a la derecha -->
        <div class="panel-video">
            <video id="videoPublicidad" autoplay muted loop playsinline>
                <source src="{{ asset('videos/publicidad.mp4') }}" type="video/mp4">
                Tu navegador no soporta la reproducción de video.
            </video>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    const BASEURL = '{{ url()->current() }}';
    const token = '{{ csrf_token() }}';
</script>

<script src="{{ asset('js/comun/messagebasicModal.js') }}"></script>
<script src="{{ asset('js/dist/dashboard/dashboard.js') }}"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
