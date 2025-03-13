<?php 

require_once "../bootstrap.php";
require_once "../vendor/autoload.php";

use App\Controllers\AnimalesController;

$q = $_GET['q'];

$controller = new AnimalesController();
$controller->IndexAction($q);
?>