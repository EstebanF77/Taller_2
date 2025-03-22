<?php

class CalculadoraEstadistica
{
    private array $numeros;

    public function __construct(array $numeros)
    {
        $this->numeros = $numeros;
    }

    public function calcularPromedio(): float
    {
        return array_sum($this->numeros) / count($this->numeros);
    }

    public function calcularMediana(): float    
    {
        $numerosOrdenados = $this->numeros;
        sort($numerosOrdenados);
        $count = count($numerosOrdenados);
        $medio = (int)($count / 2);

        if ($count % 2 === 0) {
            return ($numerosOrdenados[$medio - 1] + $numerosOrdenados[$medio]) / 2;
        } else {
            return $numerosOrdenados[$medio];
        }
    }

    public function calcularModa(): string
    {
        $frecuencias = array_count_values($this->numeros);
        $maxFrecuencia = max($frecuencias);
        $modas = array_keys($frecuencias, $maxFrecuencia);

        if ($maxFrecuencia === 1 || count($modas) === count($this->numeros)) {
            return "No hay moda";
        }

        return implode(", ", $modas);
    }
}


echo "¿Cuántos números deseas ingresar?: ";
$cantidad = (int)trim(fgets(STDIN));
$numeros = [];

for ($i = 0; $i < $cantidad; $i++) {
    echo "Número " . ($i + 1) . ": ";
    $input = trim(fgets(STDIN));
    if (is_numeric($input)) {
        $numeros[] = (float)$input;
    } else {
        echo "Valor inválido, intenta de nuevo.\n";
        $i--; 
    }
}

$calculadora = new CalculadoraEstadistica($numeros);

echo "\n=== Resultados ===\n";
echo "Promedio: " . number_format($calculadora->calcularPromedio(), 2) . "\n";
echo "Mediana: " . number_format($calculadora->calcularMediana(), 2) . "\n";
echo "Moda: " . $calculadora->calcularModa() . "\n";

?>


