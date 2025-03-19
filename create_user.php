<?php
require 'config.php'; // Include DB connection
require 'functions.php'; // Include functions

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST['firstName'] ?? '';
    $last_name = $_POST['lastName'] ?? '';
    $phone = !empty($_POST['phone']) ? intval($_POST['phone']) : 212;
    $email = $_POST['email'] ?? '';





    if (!empty($first_name)) {

        
            $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, phone, email ) 
                                    VALUES (:first_name, :last_name, :phone, :email)");
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name); 
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
    }
}

else{
    $stmt = $pdo->query("SELECT id, first_name,last_name, phone, email FROM users"); 
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    require 'edit.view.php';
}


