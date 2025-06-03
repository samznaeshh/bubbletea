<?php
class Database {
    private $host; 
    private $username; 
    private $password; 
    private $dbname ; 

    public function __construct($host, $db_name, $username, $password){
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect(){
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function disconnect(){
        if ($this->connection) {
            $this->connection = null;
        }
    }

    public function getConnection(){
        return $this->connection;
    }
}
class User {  
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function createUser($name, $email, $password, $number, $address, $role = 'user') {
        $allowed_roles = ['user', 'admin'];
        if (!in_array($role, $allowed_roles)) {
            $role = 'user'; 
        }
    
        if ($this->getUserByEmail($email)) {
            return "Пользователь с таким email уже зарегистрирован!";
        }
    
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password, number, address, role, date) VALUES (?, ?, ?, ?, ?, ?, NOW())";
    
        $stmt = $this->db->getConnection()->prepare($sql);
        if ($stmt->execute([$name, $email, $hashedPassword, $number, $address, $role])) {
            return "Регистрация успешна!";
        }
        return "Ошибка регистрации.";
    }

    public function authUser($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        } else {
            return false;
        }
    }

    // Получение информации о пользователе по ID
    public function getUserById($userId) {
        $sql = "SELECT name, email, number, address, avatar FROM users WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Получение информации о пользователе по Email
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Выход из системы
    public function logoutUser() {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }
    public function updateAvatar($userId, $avatarPath) {
        $sql = "UPDATE users SET avatar = ? WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        return $stmt->execute([$avatarPath, $userId]);
    }
}



$db = new Database('localhost', 'bubbletea', 'root', '');
$db->connect();

$user = new User($db);