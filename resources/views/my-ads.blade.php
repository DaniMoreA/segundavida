<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Mis Anuncios</title>
</head>
<body>
    <h1>Segunda Vida</h1>
    <h2>Usuario: {{ $user->name }}</h2>
    <h2>Anuncios</h2>

    <div class="container">
        @if ($myAds->isEmpty())
            <p>No hay anuncios</p>
        @else
            <ul>
                @foreach ($myAds as $ad)
                    <li>
                        <h2>{{ $ad->subject }}</h2>
                        <p><strong>Nombre:</strong> {{ $ad->name }}</p>
                        <p><strong>Telefono:</strong> {{ $ad->phone }}</p>
                        <p><strong>Email:</strong> {{ $ad->email }}</p>
                        <p><strong>Contenido:</strong> {{ $ad->content }}</p>
                        <p><strong>Precio:</strong> {{ $ad->price }} €</p>

                        <!-- Boton Eliminar -->
                        <form action="{{ route('delete-ad', $ad->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Borrar</button>
                        </form>

                        <!-- Boton Modificar -->
                        <form action="{{ route('edit-ad', $ad->id) }}" method="GET" style="display:inline;">
                            <button type="submit">Editar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <a href="{{ route('home') }}">Volver</a>
</body>
</html>
