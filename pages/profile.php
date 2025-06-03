<?php
session_start();

include('../conn/conn.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../application/auth.php");
    exit;
}
$userData = $user->getUserById($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
<div class="container">
    <header>
        <div class="logo">
            <a href="../index.php"><img src="../img/logo.png" alt="example" class="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="../index.php">Главная</a></li>
                <li><a href="../catalog/catalog.php">Каталог</a></li>
                <li><a href="">Акции</a></li>
                <li><a href="">Оплата и доставка</a></li>
            </ul>
        </nav>
        <div class="elem">
            <img src="../icons/search.svg" alt="" class="search">
            <img src="../icons/basket.svg" alt="" class="basket">
            <?php if(isset($_SESSION['user_id'])) {?>
                <a href="profile.php" class="nav-link"><div class="auth">Профиль</div></a>
            <?php } else {?>
                <a href="../application/auth.php"><div class="auth">Войти</div></a>
            <?php } ?>
        </div>
    </header>

    <div class="all">
        <div class="main-catalog">
            <div class="text-catalog">
                <h2>Личный кабинет</h2>
                <a href="form/change.php"><p>Изменить</p></a>
            </div>
            <div class="character-pn">
                <img src="../uploads/<?php echo htmlspecialchars($userData['avatar']); ?>" alt="Аватар">
                <h3><?php echo htmlspecialchars($userData['name']); ?></h3>
            </div>
            <div class="character-info">
                <h3>Контактная информация:</h3>
                <p>Почта: <?php echo htmlspecialchars($userData['email']); ?></p>
                <p>Адрес: <?php echo htmlspecialchars($userData['address']); ?></p>
                <p>Номер телефона: <?php echo htmlspecialchars($userData['number']); ?></p>
                <a href="../conn/logout.php"><button class="auth">Выйти из аккаунта</button></a>
            </div>
            <div class="waiting-deliver">
                <h3>Ожидает доставки:</h3>
                <div class="deliveres">
                    <div class="deliver-item">
                        <img src="../catalog/tapioca/tapioca-img/coconut.jpg" alt="">
                        <p>Тапиока</p>
                        <div class="product_text">
                            <p>200 руб/шт</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="f_borders">
            <img src="../img/logo.png" alt="" class="logo_footer" />
            <div class="f_cat">
                <p>Каталог</p>
                <ul class="f_cat">
                    <li class="f_cat"><a href="">Готовые напитки</a></li>
                    <li class="f_cat"><a href="">Сиропы</a></li>
                    <li class="f_cat"><a href="../catalog/tapioca/topings.html">Тапиока</a></li>
                </ul>
            </div>
            <div class="f_call">
                <p>Связаться с нами</p>
                <ul class="f_call">
                    <li class="f_cat">bubbletearu@gmail.com</li>
                    <li class="f_cat">+7 (999) 333 11 77</li>
                    <li class="f_cat"><img src="../icons/tg.svg" alt=""></li>
                    <li class="f_cat"><img src="../icons/inst.svg" alt=""></li>
                    <li class="f_cat"><img src="../icons/messanger.svg" alt=""></li>
                </ul>
            </div>
        </div>
    </footer>
</div>
</body>
</html>