<?php

$pdo = require_once __DIR__ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? '';

    if (!empty($id)) {
        try {
            $sql = "DELETE FROM students WHERE id = :id";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);

            header("Location: ../public/index.php?status=deleted");
            exit();
            
        } catch (PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        }
    }
}

// Get student data for confirmation
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        $sql = "SELECT * FROM students WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>