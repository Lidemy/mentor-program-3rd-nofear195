<?php
  require_once('./conn.php');

  $comment = $_POST['comment'];   
  
  $permit = isset($_COOKIE["permit"]) ? $_COOKIE["permit"] : "";
  $sql_username = "SELECT username FROM nofear195_certificates WHERE permit =  '$permit' ";
  $result_username = $conn->query($sql_username);
  if ($result_username->num_rows > 0) {
      $row_username = $result_username->fetch_assoc();
      $username = $row_username['username'];
  } else {
      echo "<script type='text/javascript'>alert('請先登入喔');</script>";
      header("Refresh:0.1; url=./index.php");
      die();
  }
  
  if (empty($comment)) {
      echo "<script type='text/javascript'>alert('請輸入留言');</script>";
      header("Refresh:0.1; url=./index.php");
      die();
  }
      
  $sql = "INSERT INTO nofear195_comments(username, comment) VALUES( '$username' ,'$comment')";
  if ($conn->query($sql)) {
      echo "<script type='text/javascript'>alert('成功新增留言');</script>";
      header("Refresh:0.1; url=./index.php");
  } else {
      echo "failed," . $conn->error;
  }
?>
