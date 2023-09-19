<?php
    include("server.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="demo2" id="signup">
        <!-- <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST"> -->
        <form action="" method="POST">
            FirstName: <input type="text" name="Name" id="fname" value="<?php echo "Hello"?>">
            SurName: <input type="text" name="lname" id="lname">
            UserName: <input type="text" name="uname" id="uname" placeholder="Choose unique username">
            E-Mail: <input type="text" name="mail" id="mail" placeholder="Enter e-mail address">
            Password: <input type="password" name="passwd" id="passwd" placeholder="Enter password">
            Confirm Password: <input type="password" name="cpasswd" id="cpasswd" placeholder="Confirm password">
            <button type="submit" name="signup">SignUp</button>
        </form>
    </div>
</body>
</html>