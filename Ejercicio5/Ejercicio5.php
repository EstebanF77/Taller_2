<?php
class ConversorBinario {
    private int $numero;

    public function __construct(int $numero) {
        $this->numero = $numero;
    }

    public function convertir(): string {
        return decbin($this->numero); // Conversión a binario
    }
}
?>

