<?php
  require_once("./conn.php");

  $id = $_POST['id'];
  $comment = $_POST['comment'];

  $permit = isset($_COOKIE["permit"]) ? $_COOKIE["permit"] : "";
  $stmt_username = $conn->prepare("SELECT username FROM nofear195_certificates WHERE permit=?");
  $stmt_username->bind_param("s", $permit);
  $stmt_username->execute();
  $result_username = $stmt_username->get_result();
  
  if ($result_username->num_rows > 0) {
      $row_username = $result_username->fetch_assoc();
      $username = $row_username['username'];
  } else {
      echo "<script type='text/javascript'>alert('請先登入喔');</script>";
      header("Refresh:0.1; url=./index.php");
      die();
  }
  $stmt = $conn->prepare("UPDATE nofear195_comments SET comment=? WHERE id=? and username=?");
  $stmt->bind_param("sss", $comment, $id, $username);
  if ($stmt->execute()) {
      echo "<script type='text/javascript'>alert('編輯成功');</script>";
      header("Refresh:0.1; url=./index.php");
  } else {
      echo "failed," . $conn->error;
  }
?>