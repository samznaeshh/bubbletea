<?php
session_start();
include("../conn/conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $number = trim($_POST['number']);
    $address = trim($_POST['address']);

    if (empty($name) || empty($email) || empty($password) || empty($number) || empty($address)) {
        echo "Заполните все поля!";
        exit;
    }

    $result = $user->createUser($name, $email, $password, $number, $address);
    echo $result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
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
        <form action="registration.php" method="POST">
            <div class="authh">
                <div class="image-auth">
                    <img src="../img/left.png" alt="" class="left" />
                </div>
                <div class="input-auth">
                    <h5 class="auth-text-main">Регистрация</h5>
                    <input type="text" name="name" placeholder="ФИО" class="inputt" required />
                    <input type="email" name="email" placeholder="Почта" class="inputt" required />
                    <input type="password" name="password" placeholder="Пароль" class="inputt" required />
                    <input type="text" name="number" placeholder="Телефон" class="inputt" required />
                    <input type="text" name="address" placeholder="Адрес" class="inputt" required />
                    <button type="submit" class="button-reg">Зарегистрироваться</button>
                    <div class="reg-text">
                        <h5 class="auth-text1">Если у вас есть аккаунт 
                            <a href="auth.php" class="auth-text2">Войти</a>
                        </h5>
                    </div>
                </div>
            </div>
        </form>
        <!-- <div class="authh">
            <div class="image-auth">
                <img src="../img/left.png" alt="" class="left" />
            </div>
            <div class="input-auth">
                <h5 class="auth-text-main">Регистрация</h5>
                <input type="text" placeholder="фио" class="inputt" />
                <input type="text" placeholder="почта" class="inputt" />
                <input type="text" placeholder="пароль" class="inputt" />
                <a href=""><div class="button-reg">Зарегистрироваться</div></a>
                <div class="reg-text">
                    <h5 class="auth-text1">Если у вас есть аккаунт <a href="../application/auth.html" class="auth-text2">Войти</a></h5>
                </div>
            </div>
        </div> -->
    </div>
</body>
</html>