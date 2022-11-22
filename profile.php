<?php
require "functions.php";

check_login();
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['username'])) {
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    $query = "insert into users(username,email,password) values ('$username','$email','$password')";

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
    <title>Profile - my website</title>
</head>

<body>
    <?php include "header.php" ?>
    <div style="margin: auto;max-width:600px">
        <?php if (!empty($_GET['action']) && $_GET['action'] == 'edit') : ?>

            <h2 style="text-align: center;">Edit Profile</h2>
            <form action="" method="post" enctype="multipart/form-data" style="margin: auto;padding:10px;">
                <img src="<?php echo $_SESSION['info']['image'] ?>" alt="" style="width:100px;height:100px;margin:auto;object-fit:cover;display:block;"><br>
                Image: <input type="file" name="img" required><br>
                <input value="<?php echo $_SESSION['info']['username'] ?>" type="text" name="username" placeholder="Username" required><br>
                <input value="<?php echo $_SESSION['info']['email'] ?>" type="email" name="email" placeholder="Email" required><br>
                <input value="<?php echo $_SESSION['info']['password'] ?>" type="password" name="password" placeholder="Password" required><br>
                <button>Save</button>
                <a href="profile.php">
                    <button type='button'>Cancel</button>
                </a>

            </form>

        <?php else : ?>
            <h2 style="text-align: center;">User Profile</h2>
            <div style="display:flex; flex-direction:column; justify-content: center;align-items:center;margin:30px auto;max-width:600px;">
                <div>
                    <td> <img src="<?php echo $_SESSION['info']['image'] ?>" alt="" style="width:150px;height:150px;object-fit:cover;"></td>
                </div>
                <div>
                    <td><?php echo $_SESSION['info']['username']; ?></td>
                </div>
                <div>
                    <td><?php echo $_SESSION['info']['email']; ?></td>
                </div>
                <a href="profile.php?action=edit">
                    <button>Edit Profile</button>
                </a>

            </div>
            <hr>
            <h5>Create a post</h5>
            <form action="" method="post" style="margin: auto;padding:10px;">
                <textarea name="post" id="" cols="30" rows="8"></textarea><br>
                <button>Post</button>
            </form>
        <?php endif; ?>
    </div>


    <?php include "footer.php" ?>
</body>

</html>