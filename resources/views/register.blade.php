<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Registro</title>
</head>
<body>
    <h1>Segunda Vida</h1>
    <h2>Registro</h2>

    <div class="container">
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required value="{{ old('name') }}">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Registrar</button>
        </form>

        <p>¿Tiene creada una cuenta? <a href="{{ route('login') }}">Iniciar Sesion</a></p>
    </div>
</body>
</html>
