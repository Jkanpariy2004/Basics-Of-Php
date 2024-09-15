<?php
    $x=15;
    $y=20;

    function add(){
        $GLOBALS['z']=$GLOBALS['x']+$GLOBALS['y'];
    }

    add();
    echo $z;
?>