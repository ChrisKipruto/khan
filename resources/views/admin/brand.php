<?php

    # check is
    if(!isset($_GET['id'])){

        header("Location: addBrand.php?error=noid");

        exit();

    } else {

        # get brand id
        $brand_id = htmlspecialchars($_GET['id']);

    }

?>

<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Brand</title>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>