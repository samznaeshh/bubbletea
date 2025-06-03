<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Каталог бабл ти, купить bubble tea, море различных вкусов, бабл ти не дорого, тапиока, готовые напитки, пробные наборы, попробовать бабл ти">
    <title>Каталог</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/catalog.css">
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
                <li><a href="catalog.php">Каталог</a></li>
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
                <a href="../application/auth.php"><div class="auth">Войти</div></a>
            <?php } ?>
        </div>
    </header>
    <div class="all">
        <div class="main-catalog">
            <div class="text-catalog">
                <h2>Каталог</h2>
            </div>
            <div class="products">
                <a href=""><div class="item"><img src="../img/bubble-tea.png" alt="" >готовые напитки</div></a>
                <a href=""><div class="item"><img src="../img/sirop.png" alt="">сиропы</div></a>
                <a href="tapioca/topings.php"><div class="item"><img src="../img/tapioka.png" alt="">тапиока</div></a>
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
                    <li class="f_cat"><a href="tapioca/topings.php">Тапиока</a></li>
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