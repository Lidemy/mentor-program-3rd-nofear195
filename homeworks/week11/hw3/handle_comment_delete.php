<?php
  require_once("./conn.php");

  $id = $_GET['id'];

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
  $sql = "DELETE FROM nofear195_comments WHERE id = '$id' and username = '$username'";
  if ($conn->query($sql)) {
      echo "<script type='text/javascript'>alert('刪除成功');</script>";
      header("Refresh:0.1; url=./index.php");
  } else {
      echo "failed," . $conn->error;
  }
?>