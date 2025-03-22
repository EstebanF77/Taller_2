<?php
class CrearAcronimo {
    public function generate(string $frase): string {
        $limpiarfrase = preg_replace('/[^a-zA-Z0-9\-\s]/', '', $frase);
        $palabras = preg_split('/[\s-]+/', $limpiarfrase);
        $acronimo = '';
        foreach ($palabras as $palabra) {
            if (!empty($palabra)) {
                $acronimo .= strtoupper($palabra[0]);
            }
        }
        return $acronimo;
    }
}
?>

