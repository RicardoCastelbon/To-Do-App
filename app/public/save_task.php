<?php
session_start();
include("db.php");

if (isset($_POST['save_task']) && $_POST['title'] != '' && $_POST['description'] != '') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO tasks(title, description) VALUES ('$title', '$description')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION['message'] = "Task saved";
    header("Location: loggedin.php");
} else {
    $_SESSION['messageRed'] = "Complete all the fields";
    header("Location: loggedin.php");
}
