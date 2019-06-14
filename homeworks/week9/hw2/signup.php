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
    <div class="signup">
        <form method="post" action="./handle_signup.php">
           <h2>註冊帳號</h2>
            <div>帳號︰<input name="username"></div>
            <div>密碼︰<input name="password" type="password"></div>
            <div>暱稱︰<input name="nickname"></div>
            <input type="submit" value="註冊">
        </form>
    </div>
</body>

</html>
