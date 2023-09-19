<?php
include('server.php');
$x = $_SESSION['usershow'];
$x = $x . "friends";
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .chatting_interface {
      float: right;
      width: 50%;
    }

    #FromUser {
      margin: 0%;
      text-align: center;
      font-size: 30px;
      color: beige;
      background-color: black;
    }

    #sentfrom {
      font-size: 20px;
      color: green;
      box-sizing: border-box;
      width: 50%;
    }

    #SendedMsgs {
      color: black;
    }

    .value_sent_to {
      width: 50%;
      border: 3px solid #8AC007;
      position: absolute;
      bottom: 0px;
    }

    input[type="text"] {
      width: 70%;
      padding: 15px;
    }

    input[type="submit"] {
      padding: 10px;
      width: 28%;
    }

    #sentto {
      float: right;
      font-size: 30px;
    }

    .whole_interface {
      width: 100%;
    }

    .users {
      width: 50%;
      float: left;
      box-sizing: border-box;
      position: fixed;
      background-color: black;
      height: 100%;
    }

    .users_list {
      margin: 0%;
      box-sizing: border-box;
      border: 1px solid white;
      background-color: aqua;
      padding: 20px;
      font-size: 15px;
    }

    body {
      margin: 0%;
    }

    .search_form {
      width: 100%;
      background-color: #8AC007;
    }

    #search {
      width: 70%;
    }
  </style>
</head>

<body>

  <div class="whole_interfaces">
    <div class="users">
      <div class="search_form">
        <form action="" method="post">
          <input type="search" name="search" id="search" style="padding: 10px;">
          <input type="submit" value="Search_value" style="width: 28%;" name="names_search">
        </form>
      </div>
      <?php

      if (isset($_POST['names_search'])) {
        $search_names = $_POST['search'];
        $search_SQL = "SELECT * FROM sign_up WHERE id='$search_names'";
        $res = $conn->query($search_SQL);
      }
      $z = $_SESSION['usershow'];
      $sql = "SELECT id FROM $x ORDER BY id DESC";
      $Resultss = $conn->query($sql);
      if ($Resultss->num_rows > 0) {
        while ($rows = $Resultss->fetch_assoc()) {
          echo "<p class='users_list'><button onclick='myFunction()'>" . $rows['id'] . "</button></p><br/>";
        }
      }
      ?>
      <script>

      </script>
    </div>
    <div class="chatting_interface">
      <?php
      $x = $_SESSION['usershow'];
      $x = $x . "friends";
      $sql = "CREATE TABLE IF NOT EXISTS $x (
                id VARCHAR(20),
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
        <p id="sentfrom" style="">
          <?php
                      $v = 'sumit123';
                      $b = 'rohit123';
          if($_SESSION['usershow'] == $v) {
            $x = 'rohit123friends';
          } else {
            $x = 'sumit123friends';
          }
            $sql = "SELECT msgs FROM $x ORDER BY id DESC";
            $resu = $conn->query($sql);
            if($resu->num_rows > 0){
              while($rowsof = $resu->fetch_assoc()){
              echo "Sender's Message: ".$rowsof['msgs']."<br/>"; 
              }
            }
            ?>
        </p>

        <p id="sentto" style="">
          <?php
            $v = 'sumit123';
            $b = 'rohit123';
            if($_SESSION['usershow'] == $v) {
              $x = 'sumit123friends';
            } else {
              $x = 'rohit123friends';
            }
            $sql = "SELECT msgs FROM $x ORDER BY msgs DESC";
            $resu = $conn->query($sql);
            if($resu->num_rows>0){
              while($rowsof = $resu->fetch_assoc()){
              echo "Recveiver's Message: ".$rowsof['msgs']."<br/>"; 
              }
            }
          ?>
        </p>
      </div>

      <div class="value_sent_to">
        <form action="friends.php" method="post">
          <input type="text" name="sent_msgs" id="usermsgs">
          <input type="submit" id="" value="Send" name="SendMsg">
        </form>

        <?php
        if (isset($_POST['SendMsg'])) {
          $_SESSION['sent_msgs'] = $_POST["sent_msgs"];
          $a = $_SESSION['sent_msgs'];
          $z = $_SESSION['usershow'];
          InsertValue($x, $z, $a);
        }
        ?>
      </div>
    </div>
  </div>
  </div>

  <?php
  function InsertValue($table_name, $id, $msgs)
  {
    $x = $_SESSION['usershow'];
    $x = $x.'friends';
    $conn = new mysqli('localhost','root','','friendsdatabase');
    $sql = "INSERT INTO $x VALUES ('$id', '$msgs')";
    try {
      if ($conn->query($sql)) {
      }
    } catch (Exception $e) {
      echo "Error $e";
    }
  }
  ?>
</body>

</html>





























<!-- <?php
include('server.php');
$conn = new mysqli("localhost", "root", "", "friendsdatabase");
if ($conn->connect_error) {
  die("Connection failed") . $conn->connect_error;
} else {
}
if (isset($_SESSION['usershow']) === true) {

  $x = $_SESSION['usershow'];
  $x = $x . "friends";
  $sql = "CREATE TABLE IF NOT EXISTS $x (
                    id VARCHAR(20) PRIMARY KEY,
                    msgs VARCHAR(400)
                );";

  if ($conn->query($sql)) {
    $z = $_SESSION['usershow'];
    $sql_table = "SELECT id FROM $x ORDER BY id DESC";
    $Result = $conn->query($sql_table);
    if ($Result->num_rows > 0) {
      while ($row = $Result->fetch_assoc()) {
        echo "<a href='home.php'>" . $row['id'] . "</a><br />";
      }
    }
  } else {
    echo "UserData not found";
  }
}
?>

<?php
$x = $_SESSION['usershow'];
$x = $x . "friends";
$sql = "CREATE TABLE IF NOT EXISTS $x (
                    id VARCHAR(20) PRIMARY KEY,
                    msgs VARCHAR(400)
                );";

if ($conn->query($sql)) {
  $z = $_SESSION['usershow'];
  $sql_table = "SELECT id FROM $x ORDER BY id DESC";
  $Result = $conn->query($sql_table);
  if ($Result->num_rows > 0) {
    while ($row = $Result->fetch_assoc()) {
      echo "<a href='home.php'>" . $row['id'] . "</a><br />";
    }
  }
} else {
  echo "UserData not found";
}
?> -->