<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creador de Acrónimos</title>
</head>
<body>
    <h2>Acrónimo</h2>
    <form method="POST">
        <label for="phrase">Ingrese una frase:</label>
        <input type="text" id="phrase" name="phrase" required>
        <button type="submit">Generar Acrónimo</button>
    </form>

    <?php
    require_once 'Ejercicio1.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["phrase"])) {
        $generador = new CrearAcronimo();
        $frase = htmlspecialchars($_POST["phrase"]);
        $acronimo = $generador->generate($frase);
        echo "<h3>Resultado: $acronimo</h3>";
    }
    ?>

    <a href='../index.html'>Volver</a>
</body>
</html>
