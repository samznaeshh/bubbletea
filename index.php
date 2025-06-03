<?php
    session_start();

    include ('conn/conn.php');

    $sql = "SELECT name, avatar, review, created_at FROM reviews ORDER BY created_at DESC";
    $stmt = $db->getConnection()->query($sql);
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Купить bubble tea, море различных вкусов, бабл ти не дорого">
    <title>Bubble tea</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();
    for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
    k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
 
    ym(99790010, "init", {
         clickmap:true,
         trackLinks:true,
         accurateTrackBounce:true
    });
 </script>
 <noscript><div><img src="https://mc.yandex.ru/watch/99790010" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
 <!-- /Yandex.Metrika counter -->
</head>
<body>
<div class="container">
    <header>
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="example" class="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="catalog/catalog.php">Каталог</a></li>
                <li><a href="">Акции</a></li>
                <li><a href="">Оплата и доставка</a></li>
            </ul>
        </nav>
        <div class="elem">
            <img src="icons/search.svg" alt="" class="search">
            <img src="icons/basket.svg" alt="" class="basket">
            <?php if(isset($_SESSION['user_id'])) {?>
                <a href="pages/profile.php" class="nav-link"><div class="auth">Профиль</div></a>
            <?php } else {?>
                <a href="application/auth.php"><div class="auth">Войти</div></a>
            <?php } ?>
        </div>
    </header>
    <div class="all">
        <div class="top">
            <div class="lefts">
                <h1>МОРЕ УДОВОЛЬСТВИЯ В КАЖДОЙ БАНКЕ</h1>
                <div class="links">
                    <a href="catalog/catalog.php"><div class="catalog"><h3>ПЕРЕЙТИ <br/> В КАТАЛОГ</h3></div></a>
                    <div class="two">
                        <a href=""><div class="stocks"><h3>АКЦИИ</h3></div></a>
                        <a href=""><div class="delivery"><h3>ДОСТАВКА</h3></div></a>
                    </div>
                </div>
            </div>
            <a href="catalog/catalog.php"><img src="img/image.png" alt="" class="bubble"></a>
        </div>
        <con-catalog>
            <div class="menu">
                <h2>Каталог продукции</h2>
                <a href="catalog/catalog.php"><div class="tovars">Все товары</div></a>
            </div>
            <div class="products">
                <a href=""><div class="item"><img src="img/bubble-tea.png" alt="" >готовые напитки</div></a>
                <a href=""><div class="item"><img src="img/sirop.png" alt="">сиропы</div></a>
                <a href="catalog/tapioca/topings.php"><div class="item"><img src="img/tapioka.png" alt="">тапиока</div></a>
            </div>
        </con-catalog>
        <div class="reviews">
            <div class="reviews2">
                <h2>Отзывы</h2>
            </div>
            <div class="rev-items">
                <div class="rev-item">
                    <div class="character">
                        <h4>Оставить отзыв:</h4>
                    </div>
                    <form action="conn/submit_review.php" method="POST">
                    <div class="rev"><textarea name="review" required placeholder="Напишите свой отзыв..." rows="4"></textarea>
                        <button type="submit" class="tovars" >Отправить</button></div>
                    </form>
                </div>
                <?php foreach ($reviews as $rev): ?>
                    <div class="rev-item">
                        <div class="character">
                            <img src="uploads/<?= htmlspecialchars($rev['avatar']) ?>" alt="" class="character-img">
                            <h4><?= htmlspecialchars($rev['name']) ?></h4>
                            <small><?= date("d.m.Y H:i", strtotime($rev['created_at'])) ?></small>
                        </div>
                        <div class="rev">
                            <?= htmlspecialchars($rev['review']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="f_borders">
            <img src="img/logo.png" alt="" class="logo_footer" />
            <div class="f_cat">
                <p>Каталог</p>
                <ul class="f_cat">
                    <li class="f_cat"><a href="">Готовые напитки</a></li>
                    <li class="f_cat"><a href="">Сиропы</a></li>
                    <li class="f_cat"><a href="catalog/tapioca/topings.php">Тапиока</a></li>
                </ul>
            </div>
            <div class="f_call">
                <p>Связаться с нами</p>
                <ul class="f_call">
                    <li class="f_cat">bubbletearu@gmail.com</li>
                    <li class="f_cat">+7 (999) 333 11 77</li>
                    <li class="f_cat"><img src="icons/tg.svg" alt=""></li>
                    <li class="f_cat"><img src="icons/inst.svg" alt=""></li>
                    <li class="f_cat"><img src="icons/messanger.svg" alt=""></li>
                </ul>
            </div>
        </div>
    </footer>
</div>
</body>
</html>