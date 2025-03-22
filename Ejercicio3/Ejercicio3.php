<?php
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
        class CalculadoraEstadistica {
            private $numeros;

            public function __construct($numeros) {
                $this->numeros = $numeros;
            }

            public function calcularPromedio() {
                return array_sum($this->numeros) / count($this->numeros);
            }

            public function calcularMedia() {
                $ordenados = $this->numeros;
                sort($ordenados);
                $n = count($ordenados);
                $mitad = floor($n / 2);

                if ($n % 2 == 0) {
                    return ($ordenados[$mitad - 1] + $ordenados[$mitad]) / 2;
                } else {
                    return $ordenados[$mitad];
                }
            }

            public function calcularModa() {
                $convertidos = array_map('strval', $this->numeros);
            
                $frecuencias = array_count_values($convertidos);
                $maxFrecuencia = max($frecuencias);
                $modas = array_keys($frecuencias, $maxFrecuencia);
            
                if (count($modas) == count($frecuencias)) {
                    return "No hay moda";
                }
            
                $modasNumericas = array_map('floatval', $modas);
                return implode(", ", $modasNumericas);
            }
            
        }

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
    <title>Estadísticas</title>
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
</body>
</html>
