<?php
    echo "<h1>Indexed arrays</h1>";
    $array=array('Jenish','Raj','Om','Bhalu');
    // print_r($array);
    echo $array[2];

    echo "<h1>Associative arrays</h1>";
    $array=array("Jenish"=>20,"Raj"=>25,"Om"=>'Fail',"Bhalu"=>30);
    // var_dump($array);
    echo $array['Raj'];
    // foreach($array as $key => $value){
    //     echo "<br>My Name is $key and my marks is $value";
    // }

    echo "<h1>Multidimensional arrays</h1>";
    $store=array(
        array("book",15,20),
        array("pen",25,30),
        array("bat",35,40),
        array("ball",45,50),
        array("pencil",55,60),
    );
    echo $store[0][0] ." In Stock : ". $store[0][1] ." pice and Price is: ". $store[0][2] ."<br>" ;
    echo $store[1][0] ." In Stock : ". $store[1][1] ." pice and Price is: ". $store[1][2] ."<br>" ;
    echo $store[2][0] ." In Stock : ". $store[2][1] ." pice and Price is: ". $store[2][2] ."<br>" ;
    echo $store[3][0] ." In Stock : ". $store[3][1] ." pice and Price is: ". $store[3][2] ."<br>" ;
    echo $store[4][0] ." In Stock : ". $store[4][1] ." pice and Price is: ". $store[4][2] ."<br>" ;

?>