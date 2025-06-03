<?php
session_start();
include ('../conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($user->authUser($email, $password)) {
            header('Location: ../pages/profile.php');
            exit();
    } else
        echo 'Неправильный логин или пароль!';
} else {
    echo 'Заполните все поля!';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Войти</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="../index.php"><img src="../img/logo.png" alt="example" class="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="../index.php">Главная</a></li>
                <li><a href="../products/catalog.php">Каталог</a></li>
                <li><a href="">Акции</a></li>
                <li><a href="">Оплата и доставка</a></li>
            </ul>
        </nav>
        <div class="elem">
            <img src="../icons/search.svg" alt="" class="search">
            <img src="../icons/basket.svg" alt="" class="basket">
            <?php if(isset($_SESSION['user_id'])) {?>
                <a href="../pages/profile.php" class="nav-link"><div class="auth">Профиль</div></a>
            <?php } else {?>
                <a href="auth.php"><div class="auth">Войти</div></a>
            <?php } ?>
        </div>
    </header>
    <div class="all">
        <form action="" method="POST">
            <div class="authh">
                <div class="input-auth">
                    <h5 class="auth-text-main">Вход</h5>
                    <input type="text" name="email" placeholder="Почта" class="inputt" required />
                    <input type="password" name="password" placeholder="Пароль" class="inputt" required />
                    <button type="submit" class="button-auth">Войти</button>
                    <div class="auth-text">
                        <h5 class="auth-text1">Если у вас еще нет аккаунта 
                            <a href="registration.php" class="auth-text2">Зарегистрируйтесь</a>
                        </h5>
                    </div>
                </div>
                <div class="image-auth">
                    <img src="../img/right.png" alt="" class="right" />
                </div>
            </div>
        </form>
    </div>
</body>
</html>