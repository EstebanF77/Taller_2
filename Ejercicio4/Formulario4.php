<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones con Conjuntos</title>
</head>
<body>
    <h2>Operaciones con Conjuntos</h2>
    <form method="post">
        <label for="conjuntoA">Conjunto A (números separados por coma):</label>
        <input type="text" name="conjuntoA" required>
        <br>
        <label for="conjuntoB">Conjunto B (números separados por coma):</label>
        <input type="text" name="conjuntoB" required>
        <br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    require_once 'conjuntos.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $A = OperacionesConjuntos::obtenerConjunto($_POST['conjuntoA']);
        $B = OperacionesConjuntos::obtenerConjunto($_POST['conjuntoB']);

        $union = OperacionesConjuntos::union($A, $B);
        $interseccion = OperacionesConjuntos::interseccion($A, $B);
        $diferencia_A_B = OperacionesConjuntos::diferencia($A, $B);
        $diferencia_B_A = OperacionesConjuntos::diferencia($B, $A);

        echo "<h3>Resultados:</h3>";
        echo "<p>Unión: " . OperacionesConjuntos::mostrarConjunto($union) . "</p>";
        echo "<p>Intersección: " . OperacionesConjuntos::mostrarConjunto($interseccion) . "</p>";
        echo "<p>Diferencia (A - B): " . OperacionesConjuntos::mostrarConjunto($diferencia_A_B) . "</p>";
        echo "<p>Diferencia (B - A): " . OperacionesConjuntos::mostrarConjunto($diferencia_B_A) . "</p>";
    }
    ?>

    <a href='../index.html'>Volver</a>
</body>
</html>
