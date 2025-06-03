<?php
include ('conn.php');

session_start();  // Чтобы использовать сессионные данные

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/profile.php");
    exit;
}

// Проверяем, были ли отправлены данные
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Проверяем, что все поля заполнены
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'])) {

        // Получаем данные из формы
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Обновляем данные пользователя
        $sql = "UPDATE users SET name = ?, email = ?, number = ?, address = ? WHERE id = ?";
        $stmt = $db->getConnection()->prepare($sql);
        $result = $stmt->execute([$name, $email, $phone, $address, $_SESSION['user_id']]);
        if ($result) {
            header("Location: ../pages/profile.php");
            exit;
        } else {
            echo "Ошибка при обновлении данных!";
        }
    } else {
        echo "Заполните все поля!";
    }
}
?>