<?php
  setcookie("permit", "", time()-3600*24);
  echo "<script type='text/javascript'>alert('成功登出');</script>";
  header("Refresh:0.1; url=./index.php");
?>