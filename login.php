<?php

require "functions.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    $query = "select * from users where email='$email' && password ='$password' limit 1";

    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['info'] = $row;
        header("Location: profile.php");
        die;
    } else {
        $error = "wrong email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - my website</title>
</head>

<body>
    <?php include "header.php" ?>
    <div style="margin: auto;max-width:600px">

        <h2 style="text-align: center;">Login</h2>
        <form action="" method="post" style="margin: auto;padding:10px;">
            <input type="email" name="email" placeholder="Email" require><br>
            <input type="password" name="password" placeholder="Password" require><br>

            <?php
            if (!empty($error)) {
                echo "<div>" . $error . "</div>";
            }
            ?>
            <button>Login</button>
        </form>
    </div>


    <?php include "footer.php" ?>
</body>

</html>