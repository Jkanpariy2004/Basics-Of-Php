<?php
class base
{
    public $name = "Parent Class";

    public function calc($a, $b)
    {
        return $a * $b;
    }
}

class derived extends base
{
    public $name = "Child Class";
    
    // public function calc($a, $b)
    // {
    //     return $a + $b;
    // }
}

$obj = new derived();
// echo $obj->name;
echo $obj->calc(5,10);
