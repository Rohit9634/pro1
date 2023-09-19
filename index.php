<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-image: url('nature.jpg');
            margin: 0px;
        }
        .container {
            background-color: black;
            color: white;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        li {
            padding: 10px;
        }

        li a {
            text-decoration: none;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <ul>
            <li style="float: left;"><a href="home.php" class="href">Home</a></li>
            <li style="float: left;"><a href="" class="href">About</a></li>
            <li style="float: left;"><a href="" class="href">Contacts</a></li>
            <li style="float: left;"><a href="" class="href">Our Vision</a></li>
            <li style="float: right;" id="login"><a href="login.php" class="href">Log-In</a></li>
            <li style="float: right" id="logout"><a href="logout.php" class="href">Log-Out</a></li>
            <li style="float: right;" id="usershowhome"><a href="" class="href">
                <?php if (isset($_SESSION["usershow"])) {
                    echo $_SESSION["usershow"];
                }
            
            ?>
                </a></li>
        </ul>
    </div>
   
   <?php
            if(isset($_SESSION["usershow"]) === true) {
                echo "<script>document.getElementById('login').innerHTML=document.getElementById('logout').innerHTML;
                    document.getElementById('login').innerHTML = '';
                </script>";
            } else {
                echo "<script>document.getElementById('logout').innerHTML='';</script>";
            }

        ?>

        <script>

        </script>
</body>

</html>
