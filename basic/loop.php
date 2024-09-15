<?php
    echo "<h1>While Loop</h1>";
    $x = 1;
    while ($x <= 10) 
    {
        echo $x++ . "<br>";
    }

    echo "<h1>do While Loop</h1>";
    $x = 1;
    do {
        echo $x++ . "<br>";
    }while ($x <= 10);

    echo "<h1>For Loop</h1>";
    for($i=1; $i<=10; $i++)
    {
      echo $i."<br>";
    } 

    echo "<h1>For each Loop</h1>";
    $array=array("Jenish","Raj","Piyush","jay");
    $no=1;
    foreach($array as $ex)
    {
?>
    [<?php echo $no++ ?>]<?php echo $ex."<br>"; ?>
<?php
    }
?>