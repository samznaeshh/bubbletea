<?php
session_start();
include ('conn.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/profile.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['avatar'])) {
    // Проверка на наличие ошибок при загрузке файла
    if ($_FILES['avatar']['error'] == 0) {
        $uploadDir = "../uploads/"; // Папка для хранения аватаров
        $fileName = $_FILES['avatar']['name']; // Получаем имя файла
        $fileTmpName = $_FILES['avatar']['tmp_name']; // Временный файл на сервере
        $fileSize = $_FILES['avatar']['size']; // Размер файла
        $fileType = $_FILES['avatar']['type']; // Тип файла

        // Проверка типа файла (например, только изображения)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Неверный формат файла. Допустимые форматы: jpeg, png, gif.";
            exit;
        }

        // Генерируем уникальное имя для файла
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid('avatar_') . '.' . $fileExtension;

        // Указываем путь для сохранения файла
        $uploadPath = $uploadDir . $newFileName;

        // Перемещаем файл в папку на сервере
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            // Обновляем информацию о пользователе с новым путем к аватару
            $sql = "UPDATE users SET avatar = ? WHERE id = ?";
            $stmt = $db->getConnection()->prepare($sql);
            $result = $stmt->execute([$uploadPath, $_SESSION['user_id']]);

            if ($result) {
                header("Location: ../../profile.php");
                exit;
            } else {
                echo "Ошибка при обновлении аватара в базе данных.";
            }
        } else {
            echo "Ошибка при загрузке файла.";
        }
    } else {
        echo "Ошибка при загрузке файла: " . $_FILES['avatar']['error'];
    }
} else {
    echo "Файл не был загружен.";
}
?>