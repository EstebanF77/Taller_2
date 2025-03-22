<?php

<<<<<<< HEAD
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
=======
//sirve para estructurar el nombramiento de los metodos de las clases  (a diferencia del la clase abtarascta este ermite crear metodos metodos intectativos)
interface  FigurasGeometricas{
    public function area();
    public function toString();

}
//permite crear una planatilla de los metodos que debe implementar un metodo
abstract class Model{
    abstract function prueba(); 

    function set($prop, $val){
        $this->{$prop} = $val;
    }

    function get ($prop){
        return $this->{$prop};
    }
}

class Figura extends Model implements FigurasGeometricas{
    
    function prueba()
    {
        echo'prueba';
    }
    
    function area(){
        echo "Area";
        return 0;
    }
    function toString(){
        echo "toString";

        return "Figura";
    }
}

class Cuadrado extends Figura{
    protected $lado ;

    function area (){

        return pow($this->lado,2);
    }

    function toString (){
        $area= $this->area();
        return" El cuadrado tiene area de $area";
    }

    function prueba (){ //el metodo prueba es solo para probar que funciona los demas metodos (no es necesario)
        $area = pow($this->lado,2);
        return "cuadrado prueba con area $area";
    }

}

/*
$cuadrado = new Cuadrado();
$cuadrado->set('lado',5);
echo '<br>' . $cuadrado->prueba();*/

class Triangulo extends Figura{
    protected $base;
    protected $altura;

    function __construct() //para inicializar valores 
    {
        $this->base = 12;
    }

    function area(){
        $area=( $this->base * $this->altura)/2;
        return $area;
    }

    function toString(){

        $area = $this->area();
        return"el triangulo tiene area de $area";
    }

    function prueba() {
        $area = ( $this->base * $this->altura)/2;
        return"el triangulo tiene area de $area";
    }

    static function nombreFigura(){
        return "Triangulo";
    }

}

/*
$Triangulo = new Triangulo();
$Triangulo->set('base',4);
$Triangulo->set('altura',5);
echo '<br>' . $Triangulo->toString();*/
>>>>>>> 8d5e037d02dead923e913433453539ea002ae6e1


