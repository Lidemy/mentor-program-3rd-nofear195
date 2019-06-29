<?php
  require_once("./conn.php");
  
  $sql_username = "SELECT username FROM nofear195_certificates WHERE permit = " . $_COOKIE["permit"];
  $result_username = $conn->query($sql_username);
  $row_username = $result_username->fetch_assoc();
  if ($_POST['username'] === $row_username['username']) {
      $comment = $_POST['comment'];
      $id = $_POST['id'];
  } else {
      echo "<script type='text/javascript'>alert('使用者錯誤');</script>";
      header("Refresh:0.1; url=./index.php");
      die();
  }

  if (empty($comment) || empty($id)) {
      die('empty data');
  }
  $sql = "UPDATE nofear195_comments SET comment = '$comment' WHERE id = '$id'";
  if ($conn->query($sql)) {
      header("Location: ./index.php");
  } else {
      echo "failed," . $conn->error;
  }
?>