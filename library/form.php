<?php
session_start();

ini_set("display_errors", 1);
error_reporting(E_ALL);

if(isset($_GET) && $_GET['action'] === 'edit'){
    $name  = $_SESSION['name'];
    $email = $_SESSION['email'];
    $body  = $_SESSION['body'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap');
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo"><a href="index.html">library</a></div>
        <button class="btn-menu">
        </button>
        <nav>
            <ul class="menu">
                <li id="about" onclick="show(introduction)">about</li>
                <!-- マウスオーバーでしたかったけどスマホでの対応方法要調査
                onmouseover="show(introduction)" onmouseout="show(introduction)" -->
                <li class="contact"><a href="form.php">contact</a></li>
            </ul>
        </nav>
        <span id="introduction" class="introduction">2022年後半からweb制作の学習を始めた30代です。<br>ここでアウトプットしています。</span>
        
        <script>
            function show() {
                
            const element = document.getElementById("introduction");
            const about = document.getElementById("about");
            element.style.visibility = (element.style.visibility == 'visible')? "hidden": "visible";

            if (about.innerHTML === 'about') {
                about.innerHTML = 'close';
            } else {
                about.innerHTML = 'about';
            }
            }
        </script>

        <script>
            const btn = document.querySelector('.btn-menu');
            const menu = document.querySelector('.menu');

            btn.addEventListener('click', () => {
              menu.classList.toggle('open-menu'),
              btn.classList.toggle('close-btn-menu')
              
            });
        </script>
    </header>
    <div>
        <h1>お問い合わせ</h1>
        <div class="form" id="form">
            <form method="post" action="confirm.php">
                <h3>お名前</h3>
                <input type="text" name="name" value="<?php if(isset($name)){echo $name;} ?>" placeholder="お名前" class="input" required>
                <h3>メールアドレス</h3>
                <input type="email" name="email" value="<?php if(isset($email)){echo $email;} ?>" placeholder="メールアドレス" class="input" required>
                <h3>内容</h3>
                <textarea type="text" name="body" placeholder="お問い合わせ内容" rows="7" class="input"  required><?php if(isset($body)){echo $body;} ?></textarea><br>
                <button type="submit" name="submit" value="確認" class="submit-btn">確認</button>
            </form>
        
        </div>
    </div>
</body>
</html>