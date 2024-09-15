<?php  

abstract class main_school{
    abstract function admission_no();
}

class xyz_school extends main_school{
    function admission_no(){
        echo "1232658965 <br>";
    }

    function name(){
        echo "Jenish";
    }
}

$obj=new xyz_school();
$obj->admission_no();
$obj->name();

?>