<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Acceso al sistema | Eduka Perú</title>
  <link rel="icon" href="{{ asset('imagenes/imgLogo.png') }}" type="image/png">
<link rel="shortcut icon" href="{{ asset('imagenes/imgLogo.png') }}" type="image/png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

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
      <h2 class="mt-3">Inicia sesión</h2>
      <p>Usa tu Cuenta Institucional</p>
    </div>

    <!-- Right Panel -->
    <div class="right-panel">
      <form method="POST" action="{{ route('identificacion') }}">
        @csrf

        <div class="mb-1">
          <label for="correo" class="form-label">Correo electrónico o usuario</label>
          <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo electrónico o usuario" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback d-block text-start">{{ $message }}</span>
                    @enderror
        </div>

        <div class="mb-5 text-muted">
          <a href="#">¿Olvidaste el correo electrónico?</a>
        </div>

        <p class="text-muted" style="font-size: 0.86rem;">
          ¿Nos es tu ordenador? Usa el modo de invitado para navegar de forma privada.
          <a href="#">Más información para usar el modo de invitado</a>
        </p>

        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">
              <span>Siguiente</span>
          </button>
        </div>
      </form>

    </div>
  </div>

</body>
</html>