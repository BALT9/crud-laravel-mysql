<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Continentes</title>
</head>
<body>
    <h1>Lista de Continentes</h1>
    <a href="/formulario">Agregar Continente</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Continente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($continentes as $continente)
            <tr>
                <td>{{ $continente->codigo_continente }}</td>
                <td>{{ $continente->nombre_continente }}</td>
                <td>
                    <!-- Botón Editar -->
                    <a href="{{ url('/formulario/' . $continente->codigo_continente) }}">Editar</a>

                    <!-- Formulario Eliminar -->
                    <form action="{{ url('/continente/' . $continente->codigo_continente) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este continente?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach

            @if($continentes->isEmpty())
            <tr>
                <td colspan="3">No hay continentes registrados.</td>
            </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
