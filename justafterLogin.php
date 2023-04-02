<?php 
session_start();
if (isset($_SESSION['user_id'])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Document</title>
    
</head>
<body>
    <br>
    <table style="width: 100%">
        <tr>
        <th ><a href="profile.php"><button style="padding: 15%" id = "profile_button">Profile</button></a> </th>
           <th ><a href ="changes.php" ><button style="padding: 15%" id = "Update_btton">Customizing</button> </a></th>
           <th ><a href="logout.php"><button style="padding: 15%" id = "logout_button">Log-Out</button></a></th>
        </tr>
     </table>
     <h3>Welcome <?= htmlspecialchars($user["first_name"]) ?>  <?= htmlspecialchars($user["last_name"]) ?><h4> &nbsp You are logged in!!</h4></h3>
     <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="update.php" method="post">
                <h1>Personal Information</h1>
<hr>
                <label >First Name :<input disabled="disabled" type="text" placeholder="First Name" id="fname" name="fname" value = <?= htmlspecialchars($user["first_name"]) ?> ></label>
                <label >Last Name :<input disabled="disabled" type="text" placeholder="Last Name" id="lname" name="lname" value = <?= htmlspecialchars($user["last_name"]) ?> > </label>
            </form>
        </div>
    </div>
<p><a href="HomeScreen.html">Log in</a> or <a href="HomeScreen.html">sign up</a></p>
</body>
</html>