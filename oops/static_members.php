<?php 
    class abc{
        public static $name='Jenish Kanpariya';
        public static function show(){
            echo self::$name;
        }
    }

    class xyz extends abc{
        public static function show(){
            echo parent::$name;
        }
    }
    echo abc::$name;
    echo "<br>";
    abc::show();

    
    $obj=new xyz();
    echo "<br>";
    $obj->show();
?>