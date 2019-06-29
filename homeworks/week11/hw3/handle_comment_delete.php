<?php
  require_once("./conn.php");
  $sql_username = "SELECT username FROM nofear195_certificates WHERE permit = " . $_COOKIE["permit"];
  $result_username = $conn->query($sql_username);
  $row_username = $result_username->fetch_assoc();
  if ($_GET['username'] === $row_username['username']) {
      $id = $_GET['id'];
  } else {
      echo "<script type='text/javascript'>alert('使用者錯誤');</script>";
      header("Refresh:0.1; url=./index.php");
      die();
  }

  $sql = "DELETE FROM nofear195_comments WHERE id = '$id'";
  if ($conn->query($sql)) {
      header("Location: ./index.php");
  } else {
      echo "failed," . $conn->error;
  }
?>