<?php
  require_once('./conn.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  // 獲取 hash 後的密碼
  $sql_password = "SELECT password FROM nofear195_users WHERE username='$username'";
  $result_password = $conn->query($sql_password);
  $hash = $result_password->fetch_assoc()['password'];

  // 獲取舊有的通行證
  $sql_get_permit = "SELECT permit FROM nofear195_certificates WHERE username='$username'";
  $result_get_permit = $conn->query($sql_get_permit);
  $row = $result_get_permit->fetch_assoc();

  // 新增通行證 sql
  $rand = rand();
  $sql_create_permit ="INSERT INTO nofear195_certificates (username, permit) VALUES ('$username', '$rand')";
  
  if (password_verify($password,$hash)) {
        if ($result_get_permit->num_rows > 0) {
            setcookie("permit", $row['permit'], time()+3600*24);
        } else {
            $conn->query($sql_create_permit);
            setcookie("permit", $rand, time()+3600*24);
        }
        echo "<script type='text/javascript'>alert('登入成功');</script>";
        header("Refresh:0.1; url=./index.php");
  } else {
       echo "<script type='text/javascript'>alert('登入失敗');</script>";
       header("Refresh:0.1; url=./login.php");
  }
?>
