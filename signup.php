<?php
require "functions.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $date = date('Y-m-d H:i:s');

    $query = "insert into users(	username,email,password,date) values ('$username','$email','$password','$date')";

    $result = mysqli_query($con, $query);

    header("Location: login.php");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - my website</title>
</head>

<body>
    <?php include "header.php" ?>
    <div style="margin: auto;max-width:600px">
        <h2 style="text-align: center;">Signup</h2>
        <form action="" method="post" style="margin: auto;padding:10px;">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button>Signup</button>
        </form>
    </div>


    <?php include "footer.php" ?>
</body>

</html>