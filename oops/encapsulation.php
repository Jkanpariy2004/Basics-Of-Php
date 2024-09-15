<?php
class class1
{
    private $number;
    function __construct()
    {
        $this->number = 100;
    }

    // function setvalue(){
    //     $this->number=1000;
    // }

    function getvalue(){
        return $this->number;
    }

    protected function My(){
        echo "jenish";
    }
}

class class2 extends class1{
    function My1(){
        $this->My();
    }
}

$obj = new class1();
$obj2 = new class2();
// echo $obj->My();
echo $obj2->My1();


?>