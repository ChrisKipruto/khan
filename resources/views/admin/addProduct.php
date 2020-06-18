<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Add Product</title>

<div class="container-fluid">
    <div class="row d-flex justify-center mt-3">
        <!-- go back btn -->
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-1">
            <a href="products.php" class="btn btn-sm  btn-outline-indigo rounded-full font-semibold tracking-wide">
                <i class="fas fa-reply-all pr-2"></i>
                Go Back
            </a>
        </div>

        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-3">
            <form enctype="multipart/form-data" id="addProductForm" action="" method="post">
                <div class="row">
                    <div class="col-xl-12 mb-2" id="feedbackMsg">
                        <?php include '../includes/messages.php'; ?>
                    </div>
                    
                    
                </div>
            </form>
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>