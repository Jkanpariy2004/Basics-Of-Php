<?php 
    trait trait1{
        public function showmsg(){
            echo "This is trait tutorial";
        }
    }

    class a{
        use trait1;
    }

    class b{
        use trait1;
    }

    class c{
        use trait1;
    }

    $obj=new a();
    $obj=new b();
    $obj=new c();
    $obj->showmsg();
    echo "<br>";
    $obj->showmsg();
    echo "<br>";
    $obj->showmsg();

?>