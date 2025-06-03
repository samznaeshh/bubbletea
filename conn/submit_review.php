<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    die("Ошибка: необходимо войти в систему.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $review = trim($_POST['review']);

    if (!empty($review)) {
        // Получаем данные пользователя
        $sql = "SELECT name, avatar FROM users WHERE id = ?";
        $stmt = $db->getConnection()->prepare($sql);
        $stmt->execute([$user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $sql = "INSERT INTO reviews (user_id, name, avatar, review) VALUES (?, ?, ?, ?)";
            $stmt = $db->getConnection()->prepare($sql);
            $stmt->execute([$user_id, $user['name'], $user['avatar'], $review]);

            header("Location: ../index.php"); // Перенаправляем обратно
            exit();
        }
    } else {
        echo "Ошибка: отзыв не может быть пустым.";
    }
} else {
    echo "Ошибка: неправильный метод запроса.";
}
?>