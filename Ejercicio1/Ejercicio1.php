<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Acrónimos</title>
</head>
<body>
    <h2>Generador de Acrónimos</h2>
    <form method="POST">
        <label for="phrase">Ingrese una frase:</label>
        <input type="text" id="phrase" name="phrase" required>
        <button type="submit">Generar Acrónimo</button>
    </form>
    
    <?php
    class AcronymGenerator {
        public function generate(string $phrase): string {
            $cleanPhrase = preg_replace('/[^a-zA-Z0-9\-\s]/', '', $phrase);
            $words = preg_split('/[\s-]+/', $cleanPhrase);
            $acronym = '';
            foreach ($words as $word) {
                if (!empty($word)) {
                    $acronym .= strtoupper($word[0]);
                }
            }
            return $acronym;
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["phrase"])) {
        $generator = new AcronymGenerator();
        $phrase = htmlspecialchars($_POST["phrase"]);
        $acronym = $generator->generate($phrase);
        echo "<h3>Resultado: $acronym</h3>";
    }
    ?>
</body>
</html>
