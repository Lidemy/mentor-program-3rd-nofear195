<?php 
  require_once('./conn.php');
  // 獲取留言板資料
  $sql = "SELECT nofear195_comments.id, nofear195_comments.comment, nofear195_comments.created_at, 
                 nofear195_users.username, nofear195_users.nickname 
          FROM nofear195_comments, nofear195_users
          WHERE nofear195_comments.username = nofear195_users.username
          ORDER BY created_at DESC";
  $result = $conn->query($sql);

  // 分頁
  $row_count = $result->num_rows;
  $page_size = 20;
  $page_count = ceil($row_count / $page_size);
  if (!isset($_GET["page"])) {
      $page_now = 1;
  } else {
      $page_now = intval($_GET["page"]);
  }
  $page_start = ($page_now - 1) * $page_size;
  $result = $conn->query($sql . " " . 'LIMIT' . " " . $page_start . ',' . $page_size);
  
  // 確認是否有設置通行證
  $permit = isset($_COOKIE["permit"]) ? $_COOKIE["permit"] : "";
  
  // 獲取 username
  $username = " ";
  $sql_username = "SELECT username FROM nofear195_certificates WHERE permit = '$permit'";
  $result_username = $conn->query($sql_username);
  if ($result_username->num_rows > 0) {
      $row_username = $result_username->fetch_assoc();
      $username = $row_username['username'];
  }

  // 獲取 nickname
  $nickname = " ";
  $sql_nickname = "SELECT nickname FROM nofear195_users WHERE username = '$username'";
  $result_nickname = $conn->query($sql_nickname);
  if ($result_nickname->num_rows > 0) {
      $row_nickname = $result_nickname->fetch_assoc();
      $nickname = $row_nickname['nickname'];
  }
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
            <?php
              if ($result_username->num_rows > 0) {
                  echo "<li class='nav__item'><a href='./logout.php'>登出</a></li>";
              } else {
                   echo "<li class='nav__item'><a href='./signup.php'>註冊</a></li>";
                   echo "<li class='nav__item'><a href='./login.php'>登入</a></li>";
              }
            ?>
        </ul>
    </nav>
    <div class="container">
        <form method="post" action="./handle_comment_add.php">
            <div class="nickname">暱稱︰<?php  echo $nickname; ?></div>
            <div><textarea name="comment" placeholder="歡迎留言"></textarea></div>
            <?php
              if ($result_username->num_rows > 0) {
                 echo "<input class='submit' type='submit' value='送出'>";
              } else {
                   echo "<div class='submit'><a href='./login.php'>立即登入留言</a></div>";
              }
            ?>
        </form>
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='comments'>";
                    echo   "<div class='comments__title'>";
                    echo     "<p>" . $row['nickname'] . "</p>";
                    echo     "<p>" . $row['created_at'] . "</p>";
                    echo   "</div>";        
                    echo   "<div class='comments__content'>";
                    echo     "<p class='comments__comment'>" . $row['comment']."</p>";
                    echo       "<p class='comments__link'>";
                               if ($row['username'] === $username) {
                                   echo "<a href='./comment_update.php?id=" . $row['id'] . "'>編輯</a>";
                                   echo "<a href='./handle_comment_delete.php?id=" . $row['id'] . "'>刪除</a>";
                               }
                    echo       "</p>";
                    echo   "</div>";
                    echo "</div>";  
                }
            }
         ?>
        <div class="page">
            <div class="page_info">
                <?php
                 echo "<p>
                        共 $row_count 筆 - 在 $page_now 頁 - 共 $page_count 頁</p>";
                 echo "<p><a href=?page=1>首頁</a></p>";
                 echo "<p><a href=?page=" .  $page_count .">末頁</a></p>";
               ?>
            </div>
            <div class="page_list">
                <?php
                 echo "<p>第</p>";
                 for ($i = 1; $i <= $page_count; $i++) {
                  echo "<a href=?page=" . $i . ">" . $i . "</a>";
                 }
                 echo "<p>頁</p>";
               ?>
            </div>
        </div>
    </div>
</body>

</html>
