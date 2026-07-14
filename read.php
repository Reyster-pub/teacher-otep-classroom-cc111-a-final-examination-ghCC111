<?php

$pdo = require_once __DIR__ . '/db.php';

try {
    $sql = "SELECT id, name, surname, middlename, address, contact_number 
            FROM students ORDER BY surname, name";
    
    $stmt = $pdo->query($sql);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
    $students = [];
}
?>