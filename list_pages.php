<?php


$SSG->list_pages();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Location: cms/index.php');
}
