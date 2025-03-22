<?php
require 'Formulario3.php'; 

$promedio = $media = $moda = "";
$numerosTexto = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numerosTexto = $_POST["numeros"];
    $partes = explode(",", $numerosTexto);
    $numeros = [];

    foreach ($partes as $valor) {
        $valor = trim($valor);
        if (is_numeric($valor)) {
            $numeros[] = floatval($valor);
        }
    }

    if (count($numeros) > 0) {
        $calc = new CalculadoraEstadistica($numeros);
        $promedio = number_format($calc->calcularPromedio(), 2);
        $media = number_format($calc->calcularMedia(), 2);
        $moda = $calc->calcularModa();
    } else {
        $promedio = $media = $moda = "Entrada inválida";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Estadística</title>
</head>
<body>
    <h2>Calculadora Estadística</h2>
    <form method="post">
        <label>Ingresa números separados por comas:</label><br>
        <input type="text" name="numeros" value="<?php echo htmlspecialchars($numerosTexto); ?>" required><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados:</h3>
        <p>Promedio: <?php echo $promedio; ?></p>
        <p>Media: <?php echo $media; ?></p>
        <p>Moda: <?php echo $moda; ?></p>
    <?php endif; ?>

    <a href="../Index.html">Ir al inicio</a>
</body>
</html>
