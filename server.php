<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    global $conn;
    $conn = new mysqli('localhost','root','');

    if($conn->connect_error) {
        die("Connection failed").$conn->connect_error;
    } else {
        $databasecreate = "CREATE DATABASE IF NOT EXISTS friendsdatabase";
        try {
            $conn = new mysqli('localhost','root','','friendsdatabase');
        } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
        }
    }

    $sql = "CREATE TABLE IF NOT EXISTS sign_up(fname VARCHAR(20),
        lname VARCHAR(20),
        uname VARCHAR(20) PRIMARY KEY,
        e_mail VARCHAR(30),
        passwd VARCHAR(50)
    );";

    if(!$conn->query($sql)) {
        echo "<script>alert(Dangerous to using the database some error occured);</script>";
    }
    $username = "";
    $errors = array();
        if(isset($_POST['login'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $passwords = mysqli_real_escape_string($conn, md5($_POST['passwd']));
            $converted_password = md5($passwords);
            $sql = "SELECT * FROM sign_up WHERE uname='$username' AND passwd='$passwords'";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION["usershow"] = $row["uname"];
                }
                header("Location: mainchat.php"); 
            } else {
                echo "<script>alert('Invalid username and password')</script>";
            }
        }



        if(isset($_POST['signup'])) {
            $fname = $_POST["Name"];
            $lname = $_POST["lname"];
            $uname = $_POST["uname"];
            $E_mail = $_POST["mail"];
            $passwords = $_POST["passwd"];
            $converted_password = md5($passwords);
        
            $query = "INSERT INTO sign_up VALUES('$fname', '$lname', '$uname','$E_mail', '$converted_password')";
        
            if($conn->query($query) === TRUE) {
                header("Location: login.php");
            } else {
                echo "Some error occured";
            }
        }
?>