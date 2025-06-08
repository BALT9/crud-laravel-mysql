<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Continentes y Países</title>
</head>

<body>
    <h1>Lista de Continentes</h1>
    <a href="/formulario">Agregar Continente</a>
    <a href="/formularioP">Agregar País</a>
    <a href="/formularioE">Agregar Estado</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Continente</th>
                <th>Acciones</th>
                <th>Ver Países</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($continentes as $continente)
            <tr>
                <td>{{ $continente->codigo_continente }}</td>
                <td>{{ $continente->nombre_continente }}</td>
                <td>
                    <a href="{{ url('/formulario/' . $continente->codigo_continente) }}">Editar</a>
                    <form action="{{ url('/continente/' . $continente->codigo_continente) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este continente?');">Eliminar</button>
                    </form>
                </td>
                <td>
                    <a href="{{ url('/?continente=' . $continente->codigo_continente) }}">Ver Países</a>
                </td>
            </tr>
            @endforeach

            @if($continentes->isEmpty())
            <tr>
                <td colspan="4">No hay continentes registrados.</td>
            </tr>
            @endif
        </tbody>
    </table>

    @if($paises->isNotEmpty())
    <h2>Países del continente: {{ $nombreContinente }}</h2>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:20px;">
        <thead>
            <tr>
                <th>ID País</th>
                <th>Nombre del País</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paises as $pais)
            <tr>
                <td>{{ $pais->codigo_pais }}</td>
                <td>{{ $pais->nombre_pais }}</td>
                <td>
                    <a href="{{ url('/formularioP/' . $pais->codigo_pais) }}">Editar</a>
                    <form action="{{ url('/pais/' . $pais->codigo_pais) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este país?');">Eliminar</button>
                    </form>
                </td>
                <td>
                    <a href="{{ url('/?continente=' . $pais->codigo_continente . '&pais=' . $pais->codigo_pais) }}">Ver Estados</a>
                </td>
            </tr>
            @endforeach
            @if($continentes->isEmpty())
            <tr>
                <td colspan="4">No hay Paises registrados.</td>
            </tr>
            @endif
        </tbody>
    </table>
    @endif

    @if($estados->isNotEmpty())
    <h2>Estados del país: {{ $nombrePais }}</h2>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:20px;">
        <thead>
            <tr>
                <th>ID Estado</th>
                <th>Nombre del Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estados as $estado)
            <tr>
                <td>{{ $estado->codigo_estado }}</td>
                <td>{{ $estado->nombre_estado }}</td>
                <td>
                    <a href="{{ url('/formularioE/' . $estado->codigo_estado) }}">Editar</a>
                    <form action="{{ url('/estado/' . $estado->codigo_estado) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este estado?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif



</body>

</html>