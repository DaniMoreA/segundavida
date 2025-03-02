<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Home</title>
</head>
<body>
    <h1>Segunda Vida</h1>
    <h2>Bienvenido: {{ $user->name }}</h2>

    @if (!$user)
        <p>Usuario no encontrado</p>
    @endif

    
    <a href="{{ route('my-ads') }}" class="button">Ver mis Anuncios</a><br>
    

    <a href="{{ route('new-ad') }}" class="button">Crear Anuncio</a><br>
    <a href="{{ route('logout') }}" class="button">Cerrar Sesion</a>

</body>
</html>
