<?php
class Goodbye
{
    const msg = "Hello";
    public function byebye()
    {
        echo self::msg;
    }
}
echo Goodbye::msg;

// $goodbye = new Goodbye();
// $goodbye->byebye();


?>