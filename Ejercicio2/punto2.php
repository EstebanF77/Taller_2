
<?php
interface calculadora{
    function calcular($numero);
}


class Fibonacci implements Calculadora {
    function calcular($numero) {
        if ($numero < 1) {
            return "Ingrese un número mayor o igual a 1";
        }
        $serie = [0, 1];
        for ($i = 2; $i < $numero; $i++) {
            $serie[] = $serie[$i - 1] + $serie[$i - 2];
        }
        return array_slice($serie, 0, $numero);
    }
}

class Factorial implements Calculadora {
    public function calcular($numero) {
        if ($numero < 0) {
            return ["Ingrese un número no negativo", ""];
        }
        $resultado = 1;
        $proceso = "1";
        for ($i = 2; $i <= $numero; $i++) {
            $resultado *= $i;
            $proceso .= " x $i";
        }
        return [$resultado, $proceso];
    }
}

