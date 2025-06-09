<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ isset($estado) ? 'Editar Estado' : 'Agregar Estado' }}</title>
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
</head>
<body class="form-body">

    <div class="form-container">
        <header class="form-header">
            <h1 class="form-title">{{ isset($estado) ? 'Editar Estado' : 'Agregar Estado' }}</h1>
        </header>

        <form 
            class="form" 
            action="{{ isset($estado) ? url('/estado/' . $estado->codigo_estado) : url('/estado') }}" 
            method="POST"
        >
            @csrf
            @if(isset($estado))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="nombre_estado" class="form-label">Nombre del Estado:</label>
                <input
                    type="text"
                    id="nombre_estado"
                    name="nombre_estado"
                    class="form-input"
                    value="{{ old('nombre_estado', $estado->nombre_estado ?? '') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="codigo_pais" class="form-label">País:</label>
                <select 
                    id="codigo_pais" 
                    name="codigo_pais" 
                    class="form-select" 
                    required
                >
                    <option value="">Seleccione un país</option>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->codigo_pais }}"
                            {{ (old('codigo_pais', $estado->codigo_pais ?? '') == $pais->codigo_pais) ? 'selected' : '' }}>
                            {{ $pais->nombre_pais }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="form-button">
                    {{ isset($estado) ? 'Actualizar' : 'Crear' }}
                </button>
            </div>
        </form>
    </div>

</body>
</html>
