<?php
    $mysqli = require __DIR__ . "/database.php";
    $sql = sprintf("SELECT * FROM users
            WHERE email = '%s'",$mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    if($user){
        if(empty($_POST['password'])){

         echo "Password can't be left empty";

        }
        else if($_POST['password']==$user['password']){

            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
             header("Location: justafterLogin.php");
            exit;
        }
        else{

            echo "Wrong Password";

        }
    }
?>
