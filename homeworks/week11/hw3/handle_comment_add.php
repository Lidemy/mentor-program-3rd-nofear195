<?php
  require_once('./conn.php');
  
  $sql_username = "SELECT username FROM nofear195_certificates WHERE permit = " . $_COOKIE["permit"];
  $result_username = $conn->query($sql_username);
  $row_username = $result_username->fetch_assoc();
  if ($_POST['username'] === $row_username['username']) {
      $username = $_POST['username'];
  } else {
      echo "<script type='text/javascript'>alert('使用者錯誤');</script>";
      header("Refresh:0.1; url=./index.php");
      die();
  }

  $comment = $_POST['comment'];   
  if (empty($comment)) {
      echo "<script type='text/javascript'>alert('請檢查資料');</script>";
      header("Refresh:0.1; url=./index.php");
      die();
  }
      
  $sql = "INSERT INTO nofear195_comments(username, comment) 
          VALUES( '$username' ,'$comment')";
  $result = $conn->query($sql);
  if ($result) {
      echo "<script type='text/javascript'>alert('成功新增留言');</script>";
      header("Refresh:0.1; url=./index.php");
  } else {
      echo "failed," . $conn->error;
  }
?>
