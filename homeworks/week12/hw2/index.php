<?php 
  require_once('./conn.php');

  // 確認是否有設置通行證
  $permit = isset($_COOKIE["permit"]) ? $_COOKIE["permit"] : "";

  // 獲取 username
  $username = " ";
  $stmt_username = $conn->prepare("SELECT username FROM nofear195_certificates WHERE permit=?");
  $stmt_username->bind_param("s", $permit);
  $stmt_username->execute();
  $result_username = $stmt_username->get_result();
  if ($result_username->num_rows > 0) {
      $row_username = $result_username->fetch_assoc();
      $username = $row_username['username'];
  }

  // 獲取 nickname
  $nickname = " ";
  $stmt_nickname = $conn->prepare("SELECT nickname FROM nofear195_users WHERE username=?");
  $stmt_nickname->bind_param("s", $username);
  $stmt_nickname->execute();
  $result_nickname = $stmt_nickname->get_result();
  if ($result_nickname->num_rows > 0) {
      $row_nickname = $result_nickname->fetch_assoc();
      $nickname = $row_nickname['nickname'];
  }

  // 分頁設定

  // 主留言總數
  $sql_comm="SELECT comment FROM nofear195_comments WHERE parent_id = '0'";
  $sql_result = $conn->query($sql_comm);
  $row_count = $sql_result->num_rows;

  $page_size = 20;
  $page_count = ceil($row_count / $page_size);
  if (!isset($_GET["page"])) {
      $page_now = 1;
  } else {
      $page_now = intval($_GET["page"]);
  }
  $page_start = ($page_now - 1) * $page_size;
  $stmt = $conn->prepare("SELECT nofear195_users.username, nofear195_users.nickname,
                                 nofear195_comments.id, nofear195_comments.comment, nofear195_comments.created_at
                          FROM   nofear195_comments, nofear195_users
                          WHERE  nofear195_comments.username = nofear195_users.username 
                                 AND  nofear195_comments.parent_id = '0'
                          ORDER BY created_at DESC LIMIT ?, ?");
  $stmt->bind_param("ii", $page_start, $page_size);
  $stmt->execute();
  $result = $stmt->get_result();
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
            <div>
               <textarea name="comment" placeholder="歡迎留言"></textarea>
               <input type='hidden' name='parent_id' value='0'>
                 <?php
                   if ($result_username->num_rows > 0) {
                     echo "<input class='submit' type='submit' value='送出'>";
                   } else {
                     echo "<a class='submit' href='./login.php'>立即登入留言</a>";
                   }
                 ?>
            </div>
        </form>
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  // 主留言
                    echo "<div class='comments'>";
                    echo      "<div class='comments__title'>";
                    echo           "<p class=nickname>" . $row['nickname'] . "</p>";
                    echo           "<p>" . $row['created_at'] . "</p>";
                    echo      "</div>";        
                    echo      "<div class='comments__content'>";
                    echo           "<p class='comments__comment'>" . htmlspecialchars($row['comment'], ENT_QUOTES, 'utf-8')."</p>";
                    echo           "<p class='comments__link'>";
                                   if ($row['username'] === $username) {
                                       echo "<a href='./comment_update.php?id=" . $row['id'] . "'>編輯</a>";
                                       echo "<a href='./handle_comment_delete.php?id=" . $row['id'] . "'>刪除</a>";
                                   }
                    echo           "</p>";
                    echo      "</div>";
                    
                    // 子留言
                    $parent_id = $row['id'];
                    
                    $stmt_child = $conn->prepare("SELECT nofear195_users.username, nofear195_users.nickname,
                                                         nofear195_comments.id, nofear195_comments.comment,
                                                         nofear195_comments.created_at
                                                  FROM   nofear195_comments, nofear195_users
                                                  WHERE  nofear195_comments.username = nofear195_users.username 
                                                         AND nofear195_comments.parent_id =?
                                                  ORDER BY created_at ASC");
                    $stmt_child->bind_param("s", $parent_id);
                    $stmt_child->execute();
                    $result_child = $stmt_child->get_result();
                    if ($result_child->num_rows > 0) {
                        while($row_child = $result_child->fetch_assoc()) {
                            if ($row_child['username'] === $row['username']) {
                                echo  "<div class='comments owner'>";
                                echo       "<div class='comments__title'>";
                                echo       "<p class=nickname>" . $row_child['nickname'] . "  ＜原PO＞" . "</p>";
                            } else {
                                echo  "<div class='comments child'>";
                                echo       "<div class='comments__title'>";
                                echo       "<p class=nickname>" . $row_child['nickname'] . "</p>";
                            }
                            echo       "<p>" . $row_child['created_at'] . "</p>";
                            echo       "</div>";
                            echo       "<div class='comments__content'>";
                            echo            "<p class='comments__comment'>" . htmlspecialchars($row_child['comment'], ENT_QUOTES, 'utf-8')."</p>";
                            echo            "<p class='comments__link'>";
                                            if ($row_child['username'] === $username) {
                                                echo "<a href='./comment_update.php?id=" . $row_child['id'] . "'>編輯</a>";
                                                echo "<a href='./handle_comment_delete.php?id=" . $row_child['id'] . "'>刪除</a>";
                                            }
                            echo       "</div>";
                            echo    "</div>"; 
                        }
                    }
                    // 回復留言
                    echo      "<div class='reply'>";
                    echo           "<div class='reply__title'>回覆留言</div>";   
                    echo           "<form method='post' action='./handle_comment_add.php'>";
                    echo                 "<div class='nickname'>暱稱︰" . $nickname . "</div>";
                    echo                 "<div>";
                    echo                       "<textarea name='comment' placeholder='歡迎留言'></textarea>";
                    echo                       "<input type='hidden' name='parent_id' value=" . $parent_id . ">";
                    echo                       "<input class='submit' type='submit' value='送出'>";
                    echo                 "</div>";
                    echo           "</form>";
                    echo       "</div>";
                    
                    echo "</div>";  
                    
                }
            }
         ?>
         <!-- 分頁-->
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
