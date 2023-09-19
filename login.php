<?php
include("server.php");
include("index.html");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form_container {
            box-sizing: border-box;
            border: 1px solid black;
            width: 40%;
            margin-top: 15%;
            background-color: black;
            color: blanchedalmond;
        }

        input[type="text"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 70%;
            font-size: 20px;
            background-color: green;
            color: white;
        }

    </style>
</head>

<body>
    <center>
        <div class="form_container">
            <form action="" method="post">
                <input type="text" name="username" id="" placeholder="Enter username"><br>
                <input type="text" name="passwd" id="" placeholder="Enter password"> <br>
                <input type="submit" value="Submit" name="login">
            </form>
            <p id="anotherPage">Or don't have an account <a href="signup.php" class="href">Sign Up</a></p>
        </div>
        </center>
    <?php
    echo "<script>document.getElementById('logout').innerHTML=document.getElementById('login').innerHTML;
        document.getElementById('logout').innerHTML = '';
    </script>";
    ?>
</body>

</html>
