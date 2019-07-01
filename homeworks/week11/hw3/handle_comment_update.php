<?php
  require_once("./conn.php");

  
  $id = $_POST['id'];
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

  $sql = "UPDATE nofear195_comments SET comment = '$comment' WHERE id = '$id' and username = '$username' ";
  if ($conn->query($sql)) {
      echo "<script type='text/javascript'>alert('編輯成功');</script>";
      header("Refresh:0.1; url=./index.php");
  } else {
      echo "failed," . $conn->error;
  }
?>