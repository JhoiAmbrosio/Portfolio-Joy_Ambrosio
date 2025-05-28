<?php
require_once 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date = date('Y-m-d H:i:s');

    try {
        $sql = "INSERT INTO messages (name, email, message, created_at) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $message, $date]);
        
        header("Location: index.html?message=success");
    } catch(PDOException $e) {
        header("Location: index.html?message=error");
    }
}
?>