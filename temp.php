<?php
ini_set('display_errors', 'On');


$endsWith = "@gmail.com";
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password =  $_POST['confirm_password'];

if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
	die("All fields are required.");
}
if (!substr($email, -strlen($endsWith)) === $endsWith) {
	die("Invalid email format.Email should be a gMail Account.");
}
if ($password != $confirm_password) {
	die("Passwords do not match.");
}
if (strlen($password) < 6) {
	die("Password must be at least 6 characters long. For reference,See TrakOn App");
}


// if (mysqli_query($connection, $sql)) {
// 	// header("Location: success.php"); // redirect to success page
//     phpinfo();
// } else {
// 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
$mysqli  = require __DIR__ ."/database.php";

$sql = "INSERT INTO users(first_name, last_name, email, password) VALUES (?,?,?,?)";

$stmt = $mysqli->stmt_init();


if(!$stmt->prepare($sql)){
    die("SQL ERROR BRO" . $mysqli->error);
}



$stmt->bind_param("ssss",
                    $first_name,
                    $last_name,
                    $email,
                    $_POST['password']);


if($stmt->execute()){
// echo "Signup Hogya Hai Bhai";
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: HomeScreen.html");
            exit;

}
else{
    die($mysqli->errno);
    echo $mysqli->errno;
    if($mysqli->errno == 1062){die("Bro..I think you have already been registered!! Just Login Bruh..");}
    else{
        die($mysqli->errno);
    }
}
// mysqli_close($connection);

// $check = array('familyname' =>'Aunsul' , 'MotherSide' => 'Prince');
// if(isset($aryan['fullname'])) { return $aryan['fullname'];}
// if(isset($check['familyname'])) { return $aryan['familyname'];}
// print($aryan['fullname']);
// phpinfo();
?>
