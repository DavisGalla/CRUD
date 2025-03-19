<?php 

require 'config.php';   

if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->execute();
    require 'index.php';
}
else {
    require 'index.php';
}