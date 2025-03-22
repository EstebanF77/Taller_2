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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function obtenerConjunto($entrada) {
            return array_unique(array_map('intval', explode(',', $entrada)));
        }

        $A = obtenerConjunto($_POST['conjuntoA']);
        $B = obtenerConjunto($_POST['conjuntoB']);

        $union = array_unique(array_merge($A, $B));
        $interseccion = array_intersect($A, $B);
        $diferencia_A_B = array_diff($A, $B);
        $diferencia_B_A = array_diff($B, $A);

        function mostrarConjunto($conjunto) {
            return "{" . implode(", ", $conjunto) . "}";
        }

        echo "<h3>Resultados:</h3>";
        echo "<p>Unión: " . mostrarConjunto($union) . "</p>";
        echo "<p>Intersección: " . mostrarConjunto($interseccion) . "</p>";
        echo "<p>Diferencia (A - B): " . mostrarConjunto($diferencia_A_B) . "</p>";
        echo "<p>Diferencia (B - A): " . mostrarConjunto($diferencia_B_A) . "</p>";
    }
    ?>
</body>
</html>
