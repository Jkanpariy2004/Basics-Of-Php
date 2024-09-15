<?php

echo '<h1>Strings</h1>';
echo "Hello <br>";
echo 'Hello';

echo '<h1>String Length</h1>';
echo strlen("Hello world!");

echo '<h1>Word Count</h1>';
echo str_word_count("Hello world!");

echo '<h1>Search For Text Within a String</h1>';
echo strpos("Hello world!", "world");

echo '<h1>Reverse Order</h1>';
echo strrev("Hello world!");

echo '<h1>String Replace</h1>';
$oldtxt = "Hello World!";
$newtxt =
    str_replace(
        "World",
        "Dolly",
        $oldtxt
    );
echo $newtxt;

echo '<h1>Concatenate</h1>';


$x = "Hello";
$y = "World";
$z = $x . $y;
echo "$z <br>";

$x = "Hello";
$y = "World";
$z = $x . " " . $y;
echo "$z <br>";

$x = "Hello";
$y = "World";
$z = "$x $y";
echo $z;