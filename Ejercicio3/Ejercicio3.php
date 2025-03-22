<?php
// --- Lógica PHP al principio ---
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
                $frecuencias = array_count_values($this->numeros);
                $maxFrecuencia = max($frecuencias);
                $modas = array_keys($frecuencias, $maxFrecuencia);

                if (count($modas) == count($frecuencias)) {
                    return "No hay moda";
                }

                return implode(", ", $modas);
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

<!-- HTML -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Estadística</title>
    <style>
        body { font-family: Arial; background: #eef; padding: 20px; }
        .container { background: white; padding: 20px; border-radius: 10px; width: 400px; margin: auto; box-shadow: 0 0 10px #aaa; }
        input[type="text"] { width: 100%; padding: 8px; margin: 10px 0; }
        input[type="submit"] { padding: 10px 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora Estadística</h2>
        <form method="post" action="">
            <label>Ingresa números separados por comas:</label>
            <input type="text" name="numeros" value="<?php echo htmlspecialchars($numerosTexto); ?>" placeholder="Ej: 3.5, 2, 4, 2, 5" required>
            <input type="submit" value="Calcular">
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <h3>Resultados:</h3>
            <p><strong>Promedio:</strong> <?php echo $promedio; ?></p>
            <p><strong>Media:</strong> <?php echo $media; ?></p>
            <p><strong>Moda:</strong> <?php echo $moda; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
