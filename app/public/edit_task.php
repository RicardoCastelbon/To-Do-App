<?php
session_start();
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "UPDATE tasks set title = '$title', 
    description = '$description' WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $_SESSION['message'] = 'Task updated';
    header("Location: loggedin.php");
}
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" value="<?php echo $title ?>" placeholder="edit title" autofocus><br>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" rows="2" placeholder="edit description"><?php echo $description ?></textarea><br>
                    </div>
                    <button class="btn btn-success col-12" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php") ?>