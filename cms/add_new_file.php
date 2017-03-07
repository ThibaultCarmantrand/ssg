<?php
require_once('../generator.php');


if (!empty($_POST)) {
    $SSG->add_new_file(urlencode($_POST['title']), $_POST['content']);
    header('Location: index.php');
}
