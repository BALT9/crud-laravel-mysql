<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>soy formulario</h1>
    <h2>agregar continente</h2>
    <form action="/continente" method="post">
        @csrf <!-- Esto evita el error 419 -->
        <label for="nombre_continente">Ingrese el nombre del Continente:</label>
        <input type="text" name="nombre_continente" id="nombre_continente">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>