<?php
    session_start();
    include('conn.php');
    $user->logoutUser($_SESSION['user_id']);
    header('Location: ../index.php');