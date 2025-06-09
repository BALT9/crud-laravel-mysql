<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ isset($pais) ? 'Editar País' : 'Agregar País' }}</title>
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
</head>

<body class="form-body">

    <div class="form-container">
        <header class="form-header">
            <h1 class="form-title">{{ isset($pais) ? 'Editar País' : 'Agregar País' }}</h1>
        </header>

        <form 
            class="form" 
            action="{{ isset($pais) ? url('/pais/' . $pais->id) : url('/pais') }}" 
            method="post"
        >
            @csrf
            @if(isset($pais))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="nombre_pais" class="form-label">Nombre del País:</label>
                <input
                    type="text"
                    id="nombre_pais"
                    name="nombre_pais"
                    class="form-input"
                    value="{{ old('nombre_pais', $pais->nombre_pais ?? '') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="codigo_continente" class="form-label">Continente:</label>
                <select 
                    id="codigo_continente" 
                    name="codigo_continente" 
                    class="form-select" 
                    required
                >
                    <option value="" disabled {{ !isset($pais) ? 'selected' : '' }}>Seleccione un continente</option>
                    @foreach ($continentes as $continente)
                        <option 
                            value="{{ $continente->codigo_continente }}"
                            {{ (old('codigo_continente', $pais->codigo_continente ?? '') == $continente->codigo_continente) ? 'selected' : '' }}
                        >
                            {{ $continente->nombre_continente }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="form-button">
                    {{ isset($pais) ? 'Actualizar' : 'Crear' }}
                </button>
            </div>
        </form>
    </div>

</body>

</html>
