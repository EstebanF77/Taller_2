<?php
include 'punto2.php';

$resultado = null;
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['numero']) || !is_numeric($_POST['numero'])) {
        $error = "Por favor ingrese un numero valido.";
    } else {
        $numero = intval($_POST['numero']);
        $operacion = $_POST['operacion'];

        if ($operacion == 'fibonacci') {
            $calculadora = new Fibonacci();
            $resultado = $calculadora->calcular($numero);
        } elseif ($operacion == 'factorial') {
            $calculadora = new Factorial();
            list($resultado, $proceso) = $calculadora->calcular($numero);
        } else {
            $error = "Operacion no valida.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="post">
        <label for="numero">Ingrese un número:</label>
        <input type="number" name="numero" id="numero" required>
        <br>
        <label for="operacion">Seleccione una operación:</label>
        <select name="operacion" id="operacion">
            <option value="fibonacci">Fibonacci</option>
            <option value="factorial">Factorial</option>
        </select>
        <br>
        <button type="submit">Calcular</button>
    </form>
    
    <?php if (!empty($error)): ?>
       
    <?php elseif ($resultado !== null): ?>
        <h2>Resultado:</h2>
        <?php if ($operacion == 'factorial'): ?>
            <p><?= $proceso ?> = <?= $resultado ?></p>
        <?php elseif (is_array($resultado)): ?>
            <p><?= implode(", ", $resultado) ?></p>
        <?php else: ?>
            <p><?= $resultado ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="../Index.html">ir al inicio</a>
</body>
</html>