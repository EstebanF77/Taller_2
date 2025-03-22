<?php
class CalculadoraEstadistica {
    private array $numeros;

    public function __construct(array $numeros) {
        $this->numeros = $numeros;
    }

    public function calcularPromedio(): float {
        return array_sum($this->numeros) / count($this->numeros);
    }

    public function calcularMedia(): float {
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

    public function calcularModa(): string {
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
?>
