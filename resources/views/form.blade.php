<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ isset($continente) ? 'Editar Continente' : 'Agregar Continente' }}</title>
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
</head>
<body class="form-body">

    <div class="form-container">
        <header class="form-header">
            <h1 class="form-title">Formulario de Continente</h1>
            <h2 class="form-subtitle">{{ isset($continente) ? 'Editar Continente' : 'Agregar Continente' }}</h2>
        </header>

        <form 
            class="form" 
            action="{{ isset($continente) ? url('/continente/' . $continente->codigo_continente) : url('/continente') }}" 
            method="POST"
        >
            @csrf
            @if(isset($continente))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="nombre_continente" class="form-label">Nombre del Continente:</label>
                <input 
                    type="text" 
                    name="nombre_continente" 
                    id="nombre_continente" 
                    class="form-input" 
                    value="{{ old('nombre_continente', $continente->nombre_continente ?? '') }}" 
                    required
                >
            </div>

            <div class="form-group">
                <button type="submit" class="form-button">
                    {{ isset($continente) ? 'Actualizar' : 'Enviar' }}
                </button>
            </div>
        </form>
    </div>

</body>
</html>
