<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE tasks SET task_completed = 1 WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION['message'] = 'Task checked saved';
    header("Location: loggedin.php");
}
