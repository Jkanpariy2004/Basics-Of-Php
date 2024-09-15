<?php 

class Base{
    function __construct(){
        echo "This is Base class contructure.<br>";
    }

    function show(){
        echo "function 1";
    }
}

class Child extends Base{
    function __construct(){
        parent::__construct();
        echo "This is Child class contructure.<br>";   
    }
    
    // function show(){
    //     echo "function 2";
    // }
}

$obj = new Child();
// $obj->show();

?>