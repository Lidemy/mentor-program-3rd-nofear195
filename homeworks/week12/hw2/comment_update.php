<?php
  require_once("./conn.php");
  $id = $_GET['id'];
  $stmt = $conn->prepare("SELECT * FROM nofear195_comments WHERE id=?");
  $stmt->bind_param("s",$id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>留言板</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <nav class="nav">
        <a class="nav__title" href="./index.php">留言板</a>
        <h1 class="nav__alert">本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</h1>
        <ul class="nav__list">
            <li class="nav__item"><a href="./logout.php">登出</a></li>
        </ul>
    </nav>
    <div class="container">
        <form method="post" action="./handle_comment_update.php">
            <div>編輯內容︰</div>
            <div>
               <textarea name="comment"><?php echo $row['comment']?></textarea>
               <input type="hidden" name="id" value="<?php echo $id?>">
               <input class="submit" type="submit" value="送出">
            </div>   
        </form>
    </div>
</body>

</html>
