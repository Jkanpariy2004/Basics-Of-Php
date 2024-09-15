<?php
    $name = array("om", "Bhalu", "Avan","jay");
    sort($name);

    $count=count($name);
    for ($x=0;$x<$count;$x++)
    {
        echo $name[$x]."<br>";
    }
    
    echo "<br>";
    echo "<br>";

    $a=array(2,6,98,55,22,33);
    sort($a);

    $count=count($a);
    for ($x=0;$x<$count;$x++)
    {
        echo $a[$x] ."<br>";
    }    
?>