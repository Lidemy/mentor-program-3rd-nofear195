<?php
  require_once("./conn.php");
  $comment = $_POST['comment'];
  $id = $_POST['id'];

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