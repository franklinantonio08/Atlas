<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Iniciar Sesión - {{ config('app.name', 'Laravel') }}</title>

  <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/css/coreui.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow: hidden;
    }

    #background-layer {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center center;
      z-index: 0;
      transition: opacity 1s ease-in-out;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }

    .login-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      position: relative;
      z-index: 2;
    }

    .login-card {
      background-color: rgba(255, 255, 255, 0.95);
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      padding: 30px;
      max-width: 400px;
      width: 100%;
    }

    .login-title {
      font-size: 24px;
      font-weight: bold;
      color: #0d6efd;
      margin-bottom: 20px;
      text-align: center;
    }

    .form-control {
      border-radius: 8px;
    }

    .btn-primary {
      border-radius: 8px;
      font-weight: bold;
    }

    .footer-link {
      text-align: center;
      margin-top: 10px;
    }

    .banner-img {
      display: block;
      margin: 0 auto 15px auto;
      max-height: 80px;
    }
  </style>
</head>

<body>
  <div id="background-layer"></div>
  <div class="overlay"></div>

  <div class="login-wrapper">
    <div class="login-card">
      <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="banner-img">
      <h2 class="login-title">Iniciar Sesión</h2>

      <x-auth-session-status class="mb-3" :status="session('status')" />
      <x-auth-validation-errors class="mb-3" :errors="$errors" />

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
          <label for="username" class="form-label">Usuario</label>
          <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus class="form-control">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input id="password" type="password" name="password" required class="form-control">
        </div>

        <div class="form-check mb-3">
          <input type="checkbox" name="remember" id="remember_me" class="form-check-input">
          <label for="remember_me" class="form-check-label">Recordarme</label>
        </div>

        <div class="mb-3">
          <label for="tipo_usuario" class="form-label">Tipo de usuario</label>
          <select class="form-select" name="tipo_usuario" id="tipo_usuario" required>
            {{-- <option value="" disabled selected>Seleccione un tipo...</option> --}}
            <option value="ad">Usuario interno (AD)</option>
            <option value="local" selected>Usuario local</option>
          </select>
        </div>


        <button type="submit" class="btn btn-primary w-100">
          <i class="bi bi-box-arrow-in-right me-2"></i> Inicia sesión
        </button>

        <div class="footer-link">
          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
          @endif
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const backgrounds = [
      "{{ asset('images/background_1.jpg') }}",
      "{{ asset('images/background_2.jpg') }}",
      "{{ asset('images/background_3.jpg') }}",
      "{{ asset('images/background_4.jpg') }}"
    ];

    let index = 0;
    const bgLayer = document.getElementById('background-layer');
    bgLayer.style.backgroundImage = `url('${backgrounds[0]}')`;
    bgLayer.style.opacity = 1;

    setInterval(() => {
      index = (index + 1) % backgrounds.length;
      bgLayer.style.opacity = 0;
      setTimeout(() => {
        bgLayer.style.backgroundImage = `url('${backgrounds[index]}')`;
        bgLayer.style.opacity = 1;
      }, 1000); // Espera 1s para que se desvanezca
    }, 6000);


   
  document.getElementById('tipo_usuario').addEventListener('change', function() {
    const label = document.getElementById('username-label');
    if (this.value === 'local') {
      label.textContent = 'Correo electrónico';
      // Opcional: puedes agregar validación de email en el cliente
    } else {
      label.textContent = 'Usuario';
    }
  });

  </script>
</body>
</html>

