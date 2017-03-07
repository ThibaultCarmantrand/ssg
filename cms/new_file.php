<?php
require_once ('../generator.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
</head>
<body>

    <form action = "add_new_file.php" method="post">
    <p>
        <label for="title">Titre : </label>
        <input type="text" name="title">
    </p>

    <textarea name="content" id="content"></textarea>


    <button type="submit">Confirmer</button>
    </form>





    <script>
    var simplemde = new SimpleMDE({
        element: document.getElementById("content"),
        lineWrapping: true
    });
    </script>
</body>
</html>
