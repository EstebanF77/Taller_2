
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Construcción de Árbol Binario</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <h2>Construcción de Árbol Binario</h2>
    <form action="arbolBinario.php?mostrar=si" method="post">
    <label for="preorden">Preorden:</label>
    <input type="text" name="preorden" id="preorden">

    <label for="inorden">Inorden:</label>
    <input type="text" name="inorden" id="inorden">

    <label for="postorden">Postorden:</label>
    <input type="text" name="postorden" id="postorden">

    <button type="submit">Construir Árbol</button>
</form>
</body>
</html>

<!-- Aquí se mostrará el árbol generado -->
<?php if (isset($_GET['mostrar']) && $_GET['mostrar'] == "si"): ?>
    <iframe src="arbolBinario.php" width="100%" height="500px"></iframe>
<?php endif; ?>