<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ isset($continente) ? 'Editar Continente' : 'Agregar Continente' }}</title>
</head>
<body>
    <h1>Formulario de Continente</h1>
    <h2>{{ isset($continente) ? 'Editar Continente' : 'Agregar Continente' }}</h2>

    <form action="{{ isset($continente) ? url('/continente/' . $continente->codigo_continente) : url('/continente') }}" method="POST">
        @csrf

        @if(isset($continente))
            @method('PUT')
        @endif

        <label for="nombre_continente">Ingrese el nombre del Continente:</label>
        <input 
            type="text" 
            name="nombre_continente" 
            id="nombre_continente" 
            value="{{ old('nombre_continente', $continente->nombre_continente ?? '') }}" 
            required
        >

        <input type="submit" value="{{ isset($continente) ? 'Actualizar' : 'Enviar' }}">
    </form>
</body>
</html>
