<?php
  require_once('./conn.php');

  $username = $_COOKIE['username'];
  $comment = $_POST['comment'];
   
  if (empty($comment)) {
      echo "<script type='text/javascript'>alert('請檢查資料');</script>";
      header("Refresh:0.1; url=./index_login.php");
      die();
  }

  if(!isset($_COOKIE['username']) && !isset($_COOKIE['nickname'])) {
      echo "<script type='text/javascript'>alert('請先登入');</script>";
      header("Refresh:0.1; url=./login.php");
      die();
      
  }
  $sql = "INSERT INTO nofear195_comments(username, comment) 
          VALUES( '$username' ,'$comment')";
  $result = $conn->query($sql);
  if ($result) {
      echo "<script type='text/javascript'>alert('成功新增留言');</script>";
      header("Refresh:0.1; url=./index_login.php");
  } else {
      echo "failed," . $conn->error;
  }
?>
