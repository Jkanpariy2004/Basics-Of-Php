<?php
    interface inter1{
        // not define variable & constructure & only define public function
        public function sum();
        public function sub();
    }

    interface inter2{
        public function show();
    }

    class child implements inter1,inter2{
        function sum(){
            echo 10+5;
        }

        function sub(){
            echo 10-5;
        }

        function show(){
            echo "Interface";
        }
    }

    $obj = new child();
    $obj->sum();
    echo "<br>";
    $obj->sub();
    echo "<br>";
    $obj->show();
?>