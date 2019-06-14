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
        <a class="nav__title" href="./index.php">留言板</a>
        <h1 class="nav__alert">本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</h1>
        <ul class="nav__list">
            <li class="nav__item"><a href="./signup.php">註冊</a></li>
            <li class="nav__item"><a href="./login.php">登入</a></li>
        </ul>
    </nav>
    <div class="container">
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
