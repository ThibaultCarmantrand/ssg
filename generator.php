<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
// Include all the packages mentionned in composer.json
require_once(__DIR__ . '/vendor/autoload.php');
require_once('Site.class.php');
require_once('Ssg.class.php');

$root = '/home/thibault/php-dev/static_site_gen/';
$Parsedown = new Parsedown();
$twigLoader = new Twig_Loader_Filesystem($root . '/templates', '');
$twig = new Twig_Environment($twigLoader, array(
  'autoescape' => false,
  'debug' => true
));
$twig->addGlobal('site', new Site());

$SSG = new Ssg($Parsedown, $twigLoader, $twig);
