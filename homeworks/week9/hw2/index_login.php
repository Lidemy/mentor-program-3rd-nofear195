<?php require_once('./conn.php');?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>week9homework</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <nav class="nav">
        <a class="nav__title" href="./index_login.php">留言板</a>
        <h1 class="nav__alert">本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</h1>
        <ul class="nav__list">
            <li class="nav__item"><a href="./logout.php">登出</a></li>
        </ul>
    </nav>
    <div class="container">
        <form method="post" action="./handle_comment.php">
            <div class="nickname">暱稱︰<?php echo $_COOKIE["nickname"]?></div>
            <div><textarea name="comment" placeholder="留言"></textarea></div>
            <input type="submit" value="送出">
        </form>
        <?php
            $sql = "SELECT nofear195_comments.comment, nofear195_comments.created_at, nofear195_users.nickname 
                    FROM nofear195_comments, nofear195_users
                    WHERE nofear195_comments.username = nofear195_users.username
                    ORDER BY created_at DESC LIMIT 50";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='comments'>";
                    echo "<div class='comments__title'>";
                    echo   "<p class='comments__nickname'>" . $row['nickname'] . "</p>";
                    echo   "<p class='comments__time'>" . $row['created_at'] . "</p>";
                    echo "</div>";        
                    echo "<p class='comments__comment'>" . $row['comment']."</p>";
                    echo "</div>";  
                }
            }

            ?>
    </div>
</body>

</html>
