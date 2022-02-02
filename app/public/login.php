<?php include("db.php");

session_start();

$message = '';
?>

<?php include "includes/header.php" ?>

<?php if (isset($_SESSION['message'])) : ?>
    <p><?= $_SESSION['message'] ?></p>
    <?php $_SESSION['message'] = ''; ?>
<?php endif ?>

<div class="container p-5">
    <div class="text-center">
        <h1 class="mb-4">Login</h1>
        <span>or <a class="btn btn-primary" href="signup.php">Create an account</a></span>
    </div>
</div>

<div class="card card-body text-center mx-auto" style="width: 18rem;">
    <form action="autenticate.php" method="post">
        <input class="form-control" type="email" name="email" placeholder="Enter your email">
        <input class="form-control mt-4" type="password" name="password" placeholder="Enter your password">
        <input class="btn btn-primary mt-4 " type="submit" name="submit" value="Login">
    </form>
</div>
<?php include "includes/footer.php" ?>