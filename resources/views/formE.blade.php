<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ isset($estado) ? 'Editar Estado' : 'Agregar Estado' }}</title>
</head>

<body>
    <h1>{{ isset($estado) ? 'Editar Estado' : 'Agregar Estado' }}</h1>

    <form action="{{ isset($estado) ? url('/estado/' . $estado->codigo_estado) : url('/estado') }}" method="POST">
        @csrf
        @if(isset($estado))
            @method('PUT')
        @endif

        <label for="nombre_estado">Nombre del Estado:</label>
        <input
            type="text"
            id="nombre_estado"
            name="nombre_estado"
            value="{{ old('nombre_estado', $estado->nombre_estado ?? '') }}"
            required
        >

        <br><br>

        <label for="codigo_pais">País:</label>
        <select id="codigo_pais" name="codigo_pais" required>
            <option value="">Seleccione un país</option>
            @foreach ($paises as $pais)
                <option value="{{ $pais->codigo_pais }}"
                    {{ (old('codigo_pais', $estado->codigo_pais ?? '') == $pais->codigo_pais) ? 'selected' : '' }}>
                    {{ $pais->nombre_pais }}
                </option>
            @endforeach
        </select>

        <br><br>

        <button type="submit">{{ isset($estado) ? 'Actualizar' : 'Crear' }}</button>
    </form>
</body>

</html>
