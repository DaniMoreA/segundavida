<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Editar Anuncios</title>
</head>
<body>
    <h1>Segunda Vida</h1>
    <h2>Editar Anuncio</h2>

    <div class="container">
        <form action="{{ route('update-ad', $ad->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Laravel requiere PUT para actualizar --}}
            
            <input type="hidden" name="id" value="{{ $ad->id }}">

            <label for="name">Titulo:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $ad->name) }}" required>

            <label for="phone">Telefono:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $ad->phone) }}" pattern="^\d{9}$" title="El numero de telefono tiene que ser de 9 digitos." required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $ad->email) }}" required>

            <label for="subject">Asunto:</label>
            <input type="text" id="subject" name="subject" value="{{ old('subject', $ad->subject) }}" required>

            <label for="content">Contenido:</label>
            <textarea id="content" name="content" rows="4" required>{{ old('content', $ad->content) }}</textarea>

            <label for="price">Precio:</label>
            <input type="number" id="price" name="price" value="{{ old('price', $ad->price) }}" step="0.01" required>

             {{-- <!-- Mostrar si se ha subido -->
            @if($ad->image)
                <p>Imagen actual:</p>
                <img src="{{ asset('storage/' . $ad->image) }}" alt="Imagen del anuncio" width="200">
            @endif

            <!-- Imagen -->
            <label for="image">Subir nueva imagen (opcional):</label>
            <input type="file" id="image" name="image" accept="image/*"> --}}



            <button type="submit">Guardar Cambios</button>
        </form>
    </div>

    <a href="{{ route('my-ads') }}">Volver</a>
</body>
</html>
