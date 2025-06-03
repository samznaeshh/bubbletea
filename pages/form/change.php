<?php
include ('../../conn/conn.php');
session_start();  // Важно, чтобы сессия была активной для получения данных пользователя

if (!isset($_SESSION['user_id'])) {
    header("Location: ../profile.php");
    exit;
}

// Получаем данные пользователя через объект User
$userData = $user->getUserById($_SESSION['user_id']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/change.css">
</head>
<body>
<div class="container">
    <header>
        <div class="logo">
            <a href="../../index.php"><img src="../../img/logo.png" alt="example" class="logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="../../index.php">Главная</a></li>
                <li><a href="../../catalog/catalog.php">Каталог</a></li>
                <li><a href="">Акции</a></li>
                <li><a href="">Оплата и доставка</a></li>
            </ul>
        </nav>
        <div class="elem">
            <img src="../../icons/search.svg" alt="" class="search">
            <img src="../../icons/basket.svg" alt="" class="basket">
            <?php if(isset($_SESSION['user_id'])) {?>
                <a href="../profile.php" class="nav-link"><div class="auth">Профиль</div></a>
            <?php } else {?>
                <a href="../../application/auth.php"><div class="auth">Войти</div></a>
            <?php } ?>
        </div>
    </header>

    <div class="all">
        <div class="main-catalog">
            <div class="change">
                <p>Изменить аватар:</p>
                <form action="../../conn/upload_avatar.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="avatar" required>
                    <button type="submit">Загрузить аватар</button>
                </form>
                <p>Изменить данные:</p>
                <form action="../../conn/update_profile.php" method="POST" class="changes">
                    <input class="ioy" type="text" name="name" value="<?= htmlspecialchars($userData['name']) ?>" required>
                    <input class="ioy" type="email" name="email" value="<?= htmlspecialchars($userData['email']) ?>" required>
                    <input class="ioy" type="text" name="phone" value="<?= htmlspecialchars($userData['number']) ?>" required>
                    <input class="ioy" type="text" name="address" value="<?= htmlspecialchars($userData['address']) ?>" required>
                    <button type="submit">Сохранить изменения</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>