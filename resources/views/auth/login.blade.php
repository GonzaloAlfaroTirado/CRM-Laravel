<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CRM Alfaro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #f8f9fa; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            height: 100vh; 
        }

        .login-card { 
            max-width: 400px; 
            width: 100%; 
            border: none; 
            border-radius: 15px; 
        }

        .login-logo { 
            width: 120px; 
            display: block; 
            margin: 0 auto 20px; 
        }
    </style>
</head>
<body>

    <div class="card login-card shadow-lg p-4">
        <div class="card-body">
            <img src="{{ asset('img/logo2.png') }}" alt="Logo" class="login-logo">
            <h4 class="text-center mb-4 text-secondary">Iniciar Sesión</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" id="email" required autofocus value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                </div>
            </form>
        </div>
        <div class="text-center mt-3 text-muted small">
            CRM Alfaro &copy; {{ date('Y') }}
        </div>
    </div>

</body>
</html>