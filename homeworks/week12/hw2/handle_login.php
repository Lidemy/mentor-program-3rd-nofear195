<?php
  require_once('./conn.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  // 獲取 hash 後的密碼
  $stmt_password = $conn->prepare("SELECT password FROM nofear195_users WHERE username=?");
  $stmt_password->bind_param("s", $username);
  $stmt_password->execute();
  $result_password = $stmt_password->get_result();
  $hash = $result_password->fetch_assoc()['password'];
 
  // 獲取舊有的通行證
  $stmt_get_permit = $conn->prepare("SELECT permit FROM nofear195_certificates WHERE username=?");
  $stmt_get_permit->bind_param("s", $username);
  $stmt_get_permit->execute();
  $result_get_permit = $stmt_get_permit->get_result();
  $row = $result_get_permit->fetch_assoc();

  // 新增通行證 sql
  $rand = rand();
  $stmt_create_permit = $conn->prepare("INSERT INTO nofear195_certificates (username, permit) VALUES (?, ?)");
  $stmt_create_permit->bind_param("ss", $username, $rand);
  
  if (password_verify($password,$hash)) {
        if ($result_get_permit->num_rows > 0) {
            setcookie("permit", $row['permit'], time()+3600*24);
        } else {
             $stmt_create_permit->execute();
            setcookie("permit", $rand, time()+3600*24);
        }
        echo "<script type='text/javascript'>alert('登入成功');</script>";
        header("Refresh:0.1; url=./index.php");
  } else {
       echo "<script type='text/javascript'>alert('登入失敗');</script>";
       header("Refresh:0.1; url=./login.php");
  }
?>
