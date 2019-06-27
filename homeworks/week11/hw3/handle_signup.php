<?php
  require_once('./conn.php');

  $username = $_POST['username'];
  $password = $_POST['password'];
  $nickname = $_POST['nickname'];
   
  if (empty($username) || empty($password) || empty($nickname)) {
      die('請檢查資料');
  }
  
  $hash = password_hash($password,PASSWORD_DEFAULT);

  $sql = "INSERT INTO nofear195_users(username, password,
          nickname) VALUES('$username', '$hash', '$nickname')";
  $result = $conn->query($sql);
  if ($result) {
      echo "<script type='text/javascript'>alert('註冊成功');</script>";
      header("Refresh:0.1; url=./login.php");
  } else {
      echo "failed," . $conn->error;
  }
?>