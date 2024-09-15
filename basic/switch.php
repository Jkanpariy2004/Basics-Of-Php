<!-- switch Statement -->
<?php
// $subject = "php";

// switch($subject){
//     case "c++":
//         echo "Your Selected c++";
//         break;
//     case "php":
//         echo "Your Selected php";
//         break;
//     case "java":
//         echo "Your Selected java";
//         break;
//     default:
//         echo "Your selected Subject is not available.";
// }

?>
<?php
$cookie_name = "user";
$cookie_value = "Alex Porter";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>
<html>

<body>

    <?php
    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }
    ?>

</body>

</html>