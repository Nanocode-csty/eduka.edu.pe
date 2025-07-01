<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Acceso al sistema | Eduka Perú</title>
<link rel="icon" href="{{ asset('imagenes/imgLogo.png') }}" type="image/png">
<link rel="shortcut icon" href="{{ asset('imagenes/imgLogo.png') }}" type="image/png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Google Fonts: Roboto -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">

  <style>
    body {
  background-color: #f0f4f9;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  font-family: 'Roboto', sans-serif;
}

/* Cuando el ancho de pantalla sea menor o igual a 576px (Bootstrap sm) */
@media (max-width: 576px) {
  body {
    background-color: #ffffff;
  }
}
    .no-copy {
    pointer-events: none;
    user-select: none;
    }
    .login-wrapper {
      background-color: white;
      border-radius: 1.5rem;
      width: 100%;
      max-width: 1100px;
      display: flex;
      flex-direction: row;
      padding: 3rem;
    }

    .left-panel {
      flex: 1;
      padding-right: 2rem;
    }

    .right-panel {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .form-control {
      border-radius: 0.5rem;
      height: 3rem;
    }

    .btn-primary {
      border-radius: 1.6rem;
      padding: 0.56rem 2.4rem;
      background-color: #104E87;
      border: none;
      font-weight: bold;
    }

    .btn-primary:hover {
      background-color: #0E4678;
    }

    .text-muted a {
      text-decoration: none;
      font-size: 0.9rem;
    }

    .text-muted a:hover {
      text-decoration: underline;
    }

    .bottom-links {
      font-size: 0.85rem;
      margin-top: 2rem;
      color: #5f6368;
    }

    @media (max-width: 768px) {
      .login-wrapper {
        flex-direction: column;
        padding: 2rem;
      }

      .left-panel {
        padding-right: 0;
        margin-bottom: 2rem;
      }
    }
  </style>
</head>

<body>

  <div class="login-wrapper">
    <!-- Left Panel -->
    <div class="left-panel mt-1">
     <img src="img_eduka.png" alt="Eduka" 
     class="img-fluid no-copy" 
     style="max-height: 60px;" 
     oncontextmenu="return false;" 
     draggable="false">
      <h2 class="mt-3">Bienvenido a tu intranet</h2>

<div class="d-inline-flex align-items-center border rounded-pill px-3 py-1 mt-2" style="max-width: 100%;">
    <i class="fas fa-user-tie me-2" ></i>
    <span aria-valuetext="{{ session('email') }}">{{ session('email') }}</span>

</div>

    </div>

    <!-- Right Panel -->
    <div class="right-panel">
      <form method="POST" action="{{ route('password') }}" autocomplete="off">
        @csrf

        <label for="password" class="form-label">Ingresa tu contraseña</label>
        <div class="mb-4">
            <input type="password" id="password" name="password" class="mb-2 form-control @error('password') is-invalid @enderror" placeholder="Ingresa tu contraseña">
            @error('password')
              <span class="invalid-feedback d-block text-start">{{ $message }}</span>
            @enderror  
            <input type="checkbox" id="showPassword" onclick="togglePassword()">
            <label for="showPassword" class="ms-2 mb-0">Mostrar contraseña</label>

    </div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const checkbox = document.getElementById('showPassword');
    
    // Sincronizar el estado del input con el checkbox
    if (checkbox.checked) {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }

}
</script>
        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
        @if ($errors->has('g-recaptcha-response'))
            <span class="invalid-feedback d-block text-start">{{ $errors->first('g-recaptcha-response') }}</span>
        @endif

        <div class="mt-3 d-flex justify-content-end align-items-center gap-4 d-grid">
          <div class="text-muted">
          <a href="#">¿Olvidaste tu contraseña?</a>
          </div>
          <button type="submit" class="btn btn-primary">
                <span>Ingresar</span>
            </button>
        </div>
      </form>

    </div>
  </div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>