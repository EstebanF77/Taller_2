<?php
class Nodo {
    public $valor;
    public $izquierda;
    public $derecha;

    public function __construct($valor) {
        $this->valor = $valor;
        $this->izquierda = null;
        $this->derecha = null;
    }
}

class ArbolBinario {
    public $raiz;

    public function __construct() {
        $this->raiz = null;
    }

    public function construirDesdePreIn($preorden, $inorden) {
        $this->raiz = $this->construirRecursivo($preorden, $inorden);
    }

    private function construirRecursivo(&$preorden, $inorden) {
        if (empty($preorden) || empty($inorden)) return null;

        $valorRaiz = array_shift($preorden);
        $nodo = new Nodo($valorRaiz);
        $indice = array_search($valorRaiz, $inorden);

        $nodo->izquierda = $this->construirRecursivo($preorden, array_slice($inorden, 0, $indice));
        $nodo->derecha = $this->construirRecursivo($preorden, array_slice($inorden, $indice + 1));

        return $nodo;
    }

    public function renderizar($nodo) {
        if ($nodo === null) return;

       
        echo "<div class='contenedor-nodo'>";
        echo "<div class='nodo'>{$nodo->valor}</div>";

        
        if ($nodo->izquierda || $nodo->derecha) {
            echo "<div class='lineas'>";
            if ($nodo->izquierda) {
                echo "<div class='linea izquierda'></div>";
            }
            if ($nodo->derecha) {
                echo "<div class='linea derecha'></div>";
            }
            echo "</div>";
        }

        
        echo "<div class='hijos'>";
        if ($nodo->izquierda) {
            $this->renderizar($nodo->izquierda);
        } else {
            echo "<div class='espacio'></div>";
        }

        if ($nodo->derecha) {
            $this->renderizar($nodo->derecha);
        } else {
            echo "<div class='espacio'></div>";
        }
        echo "</div>";

        echo "</div>"; 
    }
}

if (isset($_GET['preorden']) && isset($_GET['inorden'])) {
    $preorden = explode(",", str_replace(" ", "", $_GET['preorden']));
    $inorden = explode(",", str_replace(" ", "", $_GET['inorden']));

    $arbol = new ArbolBinario();
    $arbol->construirDesdePreIn($preorden, $inorden);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Árbol Binario</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <div class="arbol">
        <?php if (isset($arbol)) $arbol->renderizar($arbol->raiz); ?>
    </div>
</body>
</html>



