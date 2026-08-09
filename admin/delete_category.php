<?php
require_once '../function.php';
$id = $_GET['id'];
try {
    $connection = new mysqli(DB_HOST,DB_USER,DB_PASS, DB_NAME);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $sql = "delete from categories where id=$id";
    $connection->query($sql);
    if ($connection->affected_rows == 1) {
        header('location:category.php?response=1');
    } else {
        header('location:category.php?response=0');
    }
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}
?>