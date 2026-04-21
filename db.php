<?php
$host = "localhost";
$dbname = "ARAK_db"; //database name i mamp
$username = "root";   // root i MAMP
$password = "root";   // root i mamp

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // تفعيل errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>