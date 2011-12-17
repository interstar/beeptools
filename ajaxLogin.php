<?php
    include "user.php";
    $name = $_POST["username"];
    $pwd = $_POST["password"];
    
    $user = new User($name,$pwd);

    if ($user.login()) {
        $result = array("login"=>1);
    } else {
        $result = array("login"=>0);       
    }
    $encoded = json_encode($result);
    header('Content-type: text/html');
    echo $encoded;
    
?>

