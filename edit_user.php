<?php
require 'config.php'; 
require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST['firstName'] ?? '';
    $last_name = $_POST['lastName'] ?? '';
    $phone = !empty($_POST['phone']) ? intval($_POST['phone']) : 212;
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($first_name)) {
        try {
            $stmt = $pdo->prepare("UPDATE users SET first_name = :first_name, 
                                                    last_name = :last_name,
                                                    phone = :phone,
                                                    email = :email 
                                                WHERE id = :id");
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name); 
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $_POST['id']);
            
            $stmt->execute();
            echo json_encode(["status" => "success", "message" => "User created successfully"]);
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => $e->getMessage()]);
        }
    }
    require 'index.php';
}
else {
    $stmt = $pdo->query("SELECT id, first_name,last_name, phone, email FROM users WHERE id = {$_GET['id']}");
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    require 'edit.view.php';
}

