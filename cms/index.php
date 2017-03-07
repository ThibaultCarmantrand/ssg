<?php
require_once('../generator.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>CMS</h1>

    <p><a href="new_file.php">Add a file</a></p>

    <form action="../generate.php" method="post">
        <button type="submit">Generate Site</button>
    </form>



    <ul>
        <?php
        foreach ($SSG->list_pages() as $page) {
            echo '<li><a href="' . $page . '">' . $page . '</a></li>';
        }
        ?>
    </ul>

</body>
</html>
