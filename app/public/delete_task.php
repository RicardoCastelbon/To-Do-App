<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tasks WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   
    $_SESSION['messageRed'] = 'Task Removed';
    header("Location: loggedin.php");
}
