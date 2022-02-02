<?php include("db.php");

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $message = 'New user created';
    } else {
        $message = 'Sorry, an error occurred';
    }
}
?>
<?php include "includes/header.php" ?>

<div class="container p-5">
    <div class="text-center">
        <h1 class="mb-4">Create an account</h1>
        <span>or <a class="btn btn-primary" href="login.php">Login</a></span>
    </div>
</div>

<div class="card card-body text-center mx-auto" style="width: 18rem;">
    <?php if (!empty($message)) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <form action="signup.php" method="post">
        <input class="form-control" type="email" name="email" placeholder="Enter your email">
        <input class="form-control mt-4" type="password" name="password" placeholder="Enter your password">
        <input class="btn btn-primary mt-4 " type="submit" value="Create">
    </form>
</div>
<?php include "includes/footer.php" ?>