<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Construcción de Árbol Binario</title>
    <link rel="stylesheet" href="css.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f8f9fa;
        }
        h2 { margin-top: 20px; }
        form {
            display: inline-block;
            text-align: left;
            margin: 20px auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 300px;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        iframe {
            border: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Construcción de Árbol Binario</h2>
    <form action="formulario6.php" method="get">
       

        <label for="preorden">Preorden:</label>
        <input type="text" name="preorden" id="preorden" required>

        <label for="inorden">Inorden:</label>
        <input type="text" name="inorden" id="inorden" required>

        <label for="postorden">Postorden:</label>
        <input type="text" name="postorden" id="postorden">

        <button type="submit">Construir Árbol</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["preorden"]) && !empty($_GET["inorden"])) {
        $preorden = urlencode($_GET["preorden"]);
        $inorden = urlencode($_GET["inorden"]);
        $postorden = !empty($_GET["postorden"]) ? urlencode($_GET["postorden"]) : '';

       
        $url = 'arbolBinario.php?preorden=' . $preorden . '&inorden=' . $inorden;
        if (!empty($postorden)) {
            $url .= '&postorden=' . $postorden;
        }

        echo "<iframe src='$url' width='100%' height='500px'></iframe>";
    }
    ?>
</body>
</html>

