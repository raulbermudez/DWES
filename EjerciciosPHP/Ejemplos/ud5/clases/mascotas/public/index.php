<?php
/**
 * @author raul <email>
 */

require_once "../vendor/autoload.php";
use App\Models\Perro;

$perro = new Perro("tana", "negro");
echo "Dame la pata";
$perro->darPata();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->darPata();
$perro->darPata();