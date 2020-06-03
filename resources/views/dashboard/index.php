<?php



#start session
session_start();
if(!isset($_SESSION['id'])){

    header('Location: ../auth/login.php');
    exit();

}

?>

<!-- app header -->
<?php require '../templates/front-layout/app.header.php'; ?>

<!-- title -->
<title>Khan Store &bull; <?php echo htmlspecialchars($_SESSION['fname']); ?> </title>

<!-- app footer -->
<?php require '../templates/front-layout/app.footer.php'; ?>