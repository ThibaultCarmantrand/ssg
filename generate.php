<?php

require_once('generator.php');

$SSG->generate_site();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Location: cms/index.php');
}
