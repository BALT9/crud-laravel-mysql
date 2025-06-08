<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ isset($pais) ? 'Editar País' : 'Agregar País' }}</title>
</head>

<body>
    <h1>{{ isset($pais) ? 'Editar País' : 'Agregar País' }}</h1>

    <form action="{{ isset($pais) ? url('/pais/' . $pais->id) : url('/pais') }}" method="post">
        @csrf
        @if(isset($pais))
        @method('PUT')
        @endif

        <label for="nombre_pais">Nombre del País:</label>
        <input
            type="text"
            id="nombre_pais"
            name="nombre_pais"
            value="{{ old('nombre_pais', $pais->nombre_pais ?? '') }}"
            required>

        <br><br>

        <label for="codigo_continente">Continente:</label>
        <select id="codigo_continente" name="codigo_continente" required>
            <option value="" disabled {{ !isset($pais) ? 'selected' : '' }}>Seleccione un continente</option>
            @foreach ($continentes as $continente)
            <option
                value="{{ $continente->codigo_continente }}"
                {{ (old('codigo_continente', $pais->codigo_continente ?? '') == $continente->codigo_continente) ? 'selected' : '' }}>
                {{ $continente->nombre_continente }}
            </option>
            @endforeach
        </select>


        <br><br>

        <button type="submit">{{ isset($pais) ? 'Actualizar' : 'Crear' }}</button>
    </form>
</body>

</html>