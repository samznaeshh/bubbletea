<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Купить топпинг для bubble tea малина-клубника, топпинг малина-клубника">
    <title>Топиока малина-клубника</title>
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../../css/product.css">
</head>
<body>
<div class="container">
    <header>
        <div class="logo">
            <a href="../../../index.php"><img src="../../../img/logo.png" alt="example" class="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="../../../index.php">Главная</a></li>
                <li><a href="../../catalog.php">Каталог</a></li>
                <li><a href="">Акции</a></li>
                <li><a href="">Оплата и доставка</a></li>
            </ul>
        </nav>
        <div class="elem">
            <img src="../../../icons/search.svg" alt="" class="search">
            <img src="../../../icons/basket.svg" alt="" class="basket">
            <?php if(isset($_SESSION['user_id'])) {?>
                <a href="../../../pages/profile.php" class="nav-link"><div class="auth">Профиль</div></a>
            <?php } else {?>
                <a href="../../../application/auth.php"><div class="auth">Войти</div></a>
            <?php } ?>
        </div>
    </header>

    <div class="all">
        <div class="main-catalog">
            <div class="product-text">
                <h2>Топиока малина-клубника</h2>
            </div>
            <div class="product-description">
                <div class="product-img">
                    <img src="../tapioca-img/coconut.jpg" alt="">
                </div>
                <div class="pr-descrip">
                    <h3>Топиока малина-клубника</h3>
                    <h4>Описание</h4>
                    <h4>Кусочки кокоса – один из самых популярных топпингов для напитков Bubble Tea.
                        Кусочки имеют жевательную текстуру и используются в различных напитках в качестве топпинга, 
                        в молочных, фруктовых чаях, мороженом, пудингах, десертах, молочных коктейлях, и фруктовых салатах.
                        Идеальное дополнение к азиатской кухне.</h4>
                    <h4>Цена: 2045 руб/шт</h3>
                        <div class="product_buy">
                            <div class="buy_num">
                                <h4> - 1 + </h4>    
                                <!-- Нужно исправить -->
                            </div>
                            <div class="produxt_basket">
                                <h4>в корзину</h4>
                            </div>
                        </div>
                </div>
            </div>
            <div class="specifications">
                <div class="product-text">
                    <h3>Характеристики</h3>
                </div>
                <div class="product-specifications">
                    <div class="pr">
                        <h4>Вес......................................................................................................................... 3,85 кг <br>
                            Вкус...................................................................................................................... Малина-клубника <br>
                            Количество упаковок в коробке................................................. 4 <br>
                            Производство............................................................................................ Тайвань
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="f_borders">
            <img src="../../../img/logo.png" alt="" class="logo_footer" />
            <div class="f_cat">
                <p>Каталог</p>
                <ul class="f_cat">
                    <li class="f_cat"><a href="">Готовые напитки</a></li>
                    <li class="f_cat"><a href="">Сиропы</a></li>
                    <li class="f_cat"><a href="">Тапиока</a></li>
                </ul>
            </div>
            <div class="f_call">
                <p>Связаться с нами</p>
                <ul class="f_call">
                    <li class="f_cat">bubbletearu@gmail.com</li>
                    <li class="f_cat">+7 (999) 333 11 77</li>
                    <li class="f_cat"><img src="../../../icons/tg.svg" alt=""></li>
                    <li class="f_cat"><img src="../../../icons/inst.svg" alt=""></li>
                    <li class="f_cat"><img src="../../../icons/messanger.svg" alt=""></li>
                </ul>
            </div>
        </div>
    </footer>
</div>
</body>
</html>