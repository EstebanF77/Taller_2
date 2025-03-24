<?php
class Nodo {
    public $contenido;
    public $izquierda;
    public $derecha;

    function __construct($contenido) {
        $this->contenido = $contenido;
        $this->izquierda = null;
        $this->derecha = null;
    }
}

class ArbolBinario {
    private $raiz;

    function getRaiz() {
        return $this->raiz;
    }

    function __construct($preorden = [], $inorden = [], $postorden = []) {
        if (!empty($preorden) && !empty($inorden)) {
            $this->raiz = $this->construirDesdePreIn($preorden, $inorden);
        } elseif (!empty($inorden) && !empty($postorden)) {
            $this->raiz = $this->construirDesdeInPost($inorden, $postorden);
        }
    }

    private function construirDesdePreIn($preorden, $inorden) {
        if (empty($preorden) || empty($inorden)) return null;

        $raizContenido = array_shift($preorden);
        $nodo = new Nodo($raizContenido);
        $indice = array_search($raizContenido, $inorden);

        $nodo->izquierda = $this->construirDesdePreIn(
            array_slice($preorden, 0, $indice),
            array_slice($inorden, 0, $indice)
        );
        $nodo->derecha = $this->construirDesdePreIn(
            array_slice($preorden, $indice),
            array_slice($inorden, $indice + 1)
        );

        return $nodo;
    }

    private function construirDesdeInPost($inorden, $postorden) {
        if (empty($inorden) || empty($postorden)) return null;

        $raizContenido = array_pop($postorden);
        $nodo = new Nodo($raizContenido);
        $indice = array_search($raizContenido, $inorden);

        $nodo->derecha = $this->construirDesdeInPost(
            array_slice($inorden, $indice + 1),
            array_slice($postorden, $indice)
        );
        $nodo->izquierda = $this->construirDesdeInPost(
            array_slice($inorden, 0, $indice),
            array_slice($postorden, 0, $indice)
        );

        return $nodo;
    }

    function dibujarArbol($nodo) {
        if ($nodo === null) return '';

        // Dibujar el nodo actual
        $html = '<div class="nodo">' . $nodo->contenido;

        // Dibujar hijos si existen
        if ($nodo->izquierda || $nodo->derecha) {
            $html .= '<div class="hijos">';
            $html .= $nodo->izquierda ? $this->dibujarArbol($nodo->izquierda) : '<div class="vacio"></div>';
            $html .= $nodo->derecha ? $this->dibujarArbol($nodo->derecha) : '<div class="vacio"></div>';
            $html .= '</div>';
        }

        $html .= '</div>';
        return $html;
    }
}

// Crear el árbol y mostrarlo después de definirlo en otro archivo PHP
if (isset($arbol) && $arbol->getRaiz() !== null) {
    echo '<div class="arbol">' . $arbol->dibujarArbol($arbol->getRaiz()) . '</div>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $preorden = !empty($_POST['preorden']) ? explode(',', $_POST['preorden']) : [];
    $inorden = !empty($_POST['inorden']) ? explode(',', $_POST['inorden']) : [];
    $postorden = !empty($_POST['postorden']) ? explode(',', $_POST['postorden']) : [];

    // Verificar que al menos se ingresaron dos recorridos
    if ((count($preorden) > 0 && count($inorden) > 0) || (count($inorden) > 0 && count($postorden) > 0)) {
        $arbol = new ArbolBinario($preorden, $inorden, $postorden);
        $raiz = $arbol->getRaiz();

        // Mostrar el árbol visualmente
        echo "<h2>Árbol Binario Generado</h2>";
        echo '<div class="arbol">';
        echo $arbol->dibujarArbol($raiz);
        echo '</div>';
    } else {
        echo "<p style='color:red;'>Debes ingresar al menos dos recorridos.</p>";
    }
}
?>
