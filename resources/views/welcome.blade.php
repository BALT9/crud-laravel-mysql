<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Continentes y Países</title>
    <link rel="stylesheet" href="{{ asset('css/welcom.css') }}">
</head>

<body class="container">
    <section class="hero">
        <h1>Bienvenido al Explorador de Continentes</h1>
        <p>Consulta, edita y organiza continentes, países y estados de forma sencilla.</p>
    </section>

    <div class="container-grid">
        <div class="tabla1">
            <h1>Lista de Continentes</h1>
            <a href="/formulario" class="btn btn-add">Agregar Continente</a>

            <div class="cards-container">
                @foreach ($continentes as $continente)
                <article class="card-continente" role="region" aria-labelledby="continent-{{ $continente->codigo_continente }}">
                    <header class="card-header" id="continent-{{ $continente->codigo_continente }}">
                        {{ $continente->nombre_continente }}
                    </header>
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $continente->codigo_continente }}</p>
                        <div class="card-actions">
                            <div class="acciones">
                                <a href="{{ url('/formulario/' . $continente->codigo_continente) }}" class="btn edit">Editar</a>

                                <form action="{{ url('/continente/' . $continente->codigo_continente) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este continente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn delete">Eliminar</button>
                                </form>
                            </div>

                            <a href="{{ url('/?continente=' . $continente->codigo_continente) }}" class="btn view">Ver Países</a>
                        </div>
                    </div>
                </article>
                @endforeach

                @if($continentes->isEmpty())
                <div class="no-continentes">
                    No hay continentes registrados.
                </div>
                @endif
            </div>
        </div>
        <div class="tabla1">
            <h1>Lista de Paises</h1>
            <a href="/formularioP" class="btn btn-add">Agregar País</a>
            @if($paises->isNotEmpty())
            <h2>Países del continente: <span>{{ $nombreContinente }}</span></h2>

            <div class="cards-container">
                @foreach ($paises as $pais)
                <article class="card-continente" role="region" aria-labelledby="pais-{{ $pais->codigo_pais }}">
                    <header class="card-header" id="pais-{{ $pais->codigo_pais }}">
                        {{ $pais->nombre_pais }}
                    </header>
                    <div class="card-body">
                        <p><strong>ID País:</strong> {{ $pais->codigo_pais }}</p>
                        <div class="card-actions">
                            <div class="acciones">
                                <a href="{{ url('/formularioP/' . $pais->codigo_pais) }}" class="btn edit">Editar</a>

                                <form action="{{ url('/pais/' . $pais->codigo_pais) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este país?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn delete">Eliminar</button>
                                </form>
                            </div>

                            <a href="{{ url('/?continente=' . $pais->codigo_continente . '&pais=' . $pais->codigo_pais) }}" class="btn view">Ver Estados</a>
                        </div>
                    </div>
                </article>
                @endforeach

                @if($paises->isEmpty())
                <div class="no-paises">
                    No hay países registrados.
                </div>
                @endif
            </div>
            @endif
        </div>
        <div class="tabla1">
            <h1>Lista de Estados</h1>
            <a href="/formularioE" class="btn btn-add">Agregar Estado</a>

            @if($estados->isNotEmpty())
            <h2>Estados del país: <span>{{ $nombrePais }}</span></h2>

            <div class="cards-container">
                @foreach ($estados as $estado)
                <article class="card-continente" role="region" aria-labelledby="estado-{{ $estado->codigo_estado }}">
                    <header class="card-header" id="estado-{{ $estado->codigo_estado }}">
                        {{ $estado->nombre_estado }}
                    </header>
                    <div class="card-body">
                        <p><strong>ID Estado:</strong> {{ $estado->codigo_estado }}</p>
                        <div class="card-actions">
                            <div class="acciones">
                                <a href="{{ url('/formularioE/' . $estado->codigo_estado) }}" class="btn edit">Editar</a>

                                <form action="{{ url('/estado/' . $estado->codigo_estado) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este estado?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn delete">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
            @else
            <div class="no-estados">
                No hay estados registrados.
            </div>
            @endif
        </div>

    </div>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Explorador de Continentes. Todos los derechos reservados.</p>
    </footer>

</body>

</html>