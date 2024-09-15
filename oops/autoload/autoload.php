<?php

function __autoload ($class) {
    require $class . '.php';
}

// spl_autoload_register() <- this function use



$obj1 = new first();
$obj2 = new second();
$obj3 = new third();

?>
