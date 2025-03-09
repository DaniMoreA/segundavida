<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Nuevo Anuncio</title>
</head>
<body>
    <h1>Segunda Vida</h1>
    <h2>Usuario: {{ $user->name }}</h2>
    <h2>Nuevo Anuncio</h2>

    <div class="container">
        <!-- Formulario para crear un nuevo anuncio -->
        <form action="{{ route('new-ad.store') }}" method="POST">
            @csrf <!--Proteccion contra ataques mediante token-->
            
            <!-- Nombre -->
            <label for="name">Titulo:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name') <div class="error-message">{{ $message }}</div> @enderror

            <!-- Teléfono -->
            <label for="phone">Telefono:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
            @error('phone') <div class="error-message">{{ $message }}</div> @enderror

            <!-- Correo Electrónico -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email') <div class="error-message">{{ $message }}</div> @enderror

            <!-- Asunto -->
            <label for="subject">Asunto:</label>
            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required>
            @error('subject') <div class="error-message">{{ $message }}</div> @enderror

            <!-- Contenido -->
            <label for="content">Contenido:</label>
            <textarea id="content" name="content" rows="4" required>{{ old('content') }}</textarea>
            @error('content') <div class="error-message">{{ $message }}</div> @enderror

            <!-- Precio -->
            <label for="price">Precio:</label>
            <input type="number" id="price" name="price" step="0.01" value="{{ old('price') }}" required>
            @error('price') <div class="error-message">{{ $message }}</div> @enderror

            {{-- <!-- Imagen -->
            <label for="image">Subir imagen:</label>
            <input type="file" id="image" name="image" accept="image/*"> --}}

            <button type="submit">Crear Anuncio</button>
        </form>
    </div>
</body>
</html>

