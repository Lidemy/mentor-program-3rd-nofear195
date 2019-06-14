<?php
  require_once('./conn.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM nofear195_users WHERE username='$username' and password='$password'";
  $result = $conn->query($sql);

   if (empty($result->num_rows)) {
       echo "<script type='text/javascript'>alert('登入失敗');</script>";
       header("Refresh:0.1; url=./login.php");
   } else {
       setcookie("username", $username, time()+3600*24);
       $nickname = $result->fetch_assoc()['nickname'];
       setcookie("nickname", $nickname, time()+3600*24);
       echo "<script type='text/javascript'>alert('登入成功');</script>";
       header("Refresh:0.1; url=./index_login.php");
   }
?>