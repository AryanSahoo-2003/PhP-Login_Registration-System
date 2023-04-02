<?php
// Start the session and connect to the database
if(isset($_POST['update'])){
print_r($_POST);
session_start();
$mysqli = require __DIR__ . "/database.php";

// Check if the user is logged in
// if (!isset($_SESSION["user_id"])) {
//   header("location: login.php");
//   exit;
// }

// Retrieve the form data
$user_id = $_SESSION["user_id"];
$first_name = $_POST["fname"];
$last_name =$_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
// Update the user's information in the "users" table
$sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password' WHERE id = $user_id";
$result = $mysqli->query($sql);
 
// Check if the query was successful
if ($result) {
  // Redirect the user to the welcome page
  header("location: profile.php");
  exit;
} else {
  // Handle the error
  die("Error: Could not update user information");
}}
else if(isset($_POST['delete'])){
print_r($_POST);
session_start();
$mysqli = require __DIR__ . "/database.php";

// Check if the user is logged in
// if (!isset($_SESSION["user_id"])) {
//   header("location: login.php");
//   exit;
// }

// Retrieve the form data
$user_id = $_SESSION["user_id"];
$sql = "Delete FROM users WHERE id = $user_id";
$result = $mysqli->query($sql);
 
// Check if the query was successful
if ($result) {
  // Redirect the user to the welcome page
  header("location: HomeScreen.html");
  exit;
} else {
  // Handle the error
  die("Error: Could not update user information");
}
}

?>
