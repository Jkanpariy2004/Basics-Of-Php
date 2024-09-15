<?php

class MyClass{   
    public $a=15;   //variable not define without access modifiers(public,private,protected)
    function show(){
        echo $this->a;  //variable not print without "$this" keyword in only function
    }

}

$object = new MyClass(); 
$object->show();

?>