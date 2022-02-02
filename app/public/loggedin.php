<?php
include 'db.php';
session_start();
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php
            if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
            }
            ?>
            <?php
            if (isset($_SESSION['messageRed'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['messageRed'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
            }
            ?>
            <div class="card card-body text-center">
                <form action="save_task.php" method="POST">
                    <input class="form-control" type="text" name="title" placeholder="Task Title" autofocus><br>
                    <textarea class="form-control" name="description" rows="2" placeholder="Task Description"></textarea><br>
                    <button class="btn btn-success col-12 form-control" name="save_task">
                        Save
                    </button>
                    <button class="btn btn-danger mt-4">
                        <a href="logout.php" class="link-dark" style="text-decoration:none; color:white">Logout</a>
                    </button>

                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Is Done</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tasks";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td>
                                <a href="check_task.php?id=<?= $row['id'] ?>" class="btn btn-primary">
                                    Task Done
                                </a>
                            </td>
                            <td><?php if ($row['task_completed'] == NULL) { ?>
                                    <input class="form-check-input" type="checkbox" name="checkbox_name" disabled>
                                <?php } else {  ?>
                                    <input class="form-check-input" type="checkbox" name="checkbox_name" checked disabled>
                                <?php } ?>
                            </td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td>
                                <a href="edit_task.php?id=<?= $row['id'] ?>" class="btn btn-primary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_task.php?id=<?= $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>