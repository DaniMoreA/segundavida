<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Login</title>
</head>
<body>
    <h1>Segunda Vida</h1>
    <h2>Bienvenido</h2>
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf  {{-- Protección contra ataques CSRF --}}
            <label>Usuario:</label>
            <input type="email" name="email" required /><br>

            <label>Clave:</label>
            <input type="password" name="password" required /><br>

            <button type="submit">Entrar</button><br>
        </form>
        <p>¿No tienes cuenta? <a href="{{ route('register') }}">Registrate Aqui</a></p>

    </div>
</body>
</html>
