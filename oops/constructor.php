<?php

class MyClass1{   
    public $a=100;
    function __construct($b)
    {
        // echo $this->a;
        echo $this->a=$b;
        echo "<br>this is contructure. <br>";
    }

    function show(){
        echo "This is my function. <br>";
    }

    function __destruct()
    {
        echo "this is destructure.";
    }
}

$object = new MyClass1(150); 
$object->show();

?>