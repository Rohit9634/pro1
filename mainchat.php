<?php
include('server.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    #FromUser {
      margin: 0%;
      text-align: center;
      font-size: 30px;
      color: beige;
      background-color: black;
    }

    #chatbox {
      color: green;
    }

    #SendedMsgs {
      color: black;
    }

    div.value_sent_to {
      position: fixed;
      width: 50%;
      float: right;
      bottom: 10px;
      border: 3px solid #8AC007;
    }

    input[type="text"] {
      width: 70%;
      padding: 15px;
    }

    input[type="submit"] {
      padding: 10px;
      width: 28%;
    }

    

  </style>
</head>

<body>

  <?php
        $x = $_SESSION['usershow'];
        $x = $x . "friends";
        $sql = "CREATE TABLE IF NOT EXISTS $x (
                id VARCHAR(20) PRIMARY KEY,
                msgs VARCHAR(400)
            );";

        if ($conn->query($sql)) {
          $z = $_SESSION['usershow'];
          $sql_table = "SELECT id,msgs FROM $x ORDER BY id,msgs DESC";
          $Result = $conn->query($sql_table);
          if ($Result->num_rows > 0) {
            while ($row = $Result->fetch_assoc()) {
              $_SESSION['Message_From'] = $row['id'];
              $_SESSION['message_inbox'] = $row['msgs'];
            }
          }
        } else {
          echo "UserData not found";
        }
        ?>

  <div class="form_container">
    <p id="FromUser">
      <?php echo $_SESSION['Message_From']; ?>
    </p>
    <p id="chatbox" style="float: left; font-size: 30px;">
      <?php echo $_SESSION['message_inbox']; ?>
    </p>
  </div>
  </div>

  <div class="value_sent_to">
    <form action="" method="post">
      <input type="text" name="usermsgs" id="usermsgs"> 
      <input type="submit" value="Send" name="SendMsg">
    </form>
  </div>

  <?php
    if(isset($_POST['SendMsg'])) {
      $message = $_POST['usermsgs'];
      $sql123 = "INSERT INTO sumit123friends VALUES('sumit123',$message);";
      if($conn->query($sql123)) {
        echo "<script>alert('Message sent');</script>";
      }
      else {
        echo "<script>alert('Message error');</script>";
      }
    }
  ?>
</body>

</html>