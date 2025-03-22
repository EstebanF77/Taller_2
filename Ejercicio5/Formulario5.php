

<?php
require'Ejercicio5.php';

$numeroDecimal = "";
$resultadoBinario = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroDecimal = $_POST["numero"];

    if (ctype_digit($numeroDecimal)) {  // Solo enteros positivos
        $numeroEntero = intval($numeroDecimal);
        $conversor = new ConversorBinario($numeroEntero);
        $resultadoBinario = $conversor->convertir();
    } else {
        $resultadoBinario = "Entrada inválida, ingresa un número entero positivo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor Decimal a Binario</title>
</head>
<body>
    <h2>Conversor Decimal a Binario</h2>
    <form method="post">
        <label>Ingresa un número entero:</label><br>
        <input type="text" name="numero" value="<?php echo htmlspecialchars($numeroDecimal); ?>" required><br><br>
        <input type="submit" value="Convertir">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultado:</h3>
        <p>Binario: <?php echo $resultadoBinario; ?></p>
    <?php endif; ?>

    <a href="../Index.html">Ir al inicio</a>
</body>
</html>