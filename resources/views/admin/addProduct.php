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
                    
                    <!-- col 1 -->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-4">
                        <div class="row">
                            <!-- title -->
                            <div class="col-md-12 mb-4">
                                <label for="proTitle" class="text-gray-800 uppercase font-navbar">Product Title</label>
                                <div>
                                    <input type="text" name="proTitle" id="proTitle" placeholder="Product Title"
                                        class="w-full px-3 py-2 outline-none z-depth-1 rounded-sm bg-white black-text focus:outline-none font-semibold">
                                    <p class="font-bold red-text font-small title-help"></p>
                                </div>
                            </div>

                            <!-- category -->
                            <div class="col-md-12 mb-4">
                                <label for="proCategory" class="text-gray-800 uppercase font-navbar">Product Category</label>
                                <div>
                                    <select name="proCategory" class="browser-default custom-select z-depth-1" id="proCategory">

                                    </select>
                                    <p class="font-bold red-text font-small cat-help"></p>
                                </div>
                            </div>

                            <!-- brand -->
                            <div class="col-md-12 mb-4">
                                <label for="proBrand" class="text-gray-800 uppercase font-navbar">Product Brand</label>
                                <div>
                                    <select name="proBrand" class="browser-default custom-select z-depth-1" id="proBrand">
                                        
                                    </select>
                                    <p class="font-bold red-text font-small bra-help"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- col 2 -->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-4">
                        <div class="row">
                            <!-- Price -->
                            <div class="col-md-12 mb-4">
                                <label for="proPrice" class="text-gray-800 uppercase font-navbar">Product Price</label>
                                <div>
                                    <input type="text" name="proPrice" id="proPrice" placeholder="Product Price"
                                        class="w-full px-3 py-2 outline-none z-depth-1 rounded-sm bg-white black-text focus:outline-none font-semibold">
                                    <p class="font-bold red-text font-small price-help"></p>
                                </div>
                            </div>

                            <!-- Image -->
                            <div class="col-md-12 mb-4">
                                <label for="proImage" class="text-gray-800 uppercase font-navbar">Product Image</label>
                                <div class="mb-2">
                                    <input type="file" id="proImage" name="proImage" placeholder="Product Image"
                                        class="w-full px-3 py-2 outline-none z-depth-1 rounded-sm bg-white black-text focus:outline-none font-semibold">
                                    <p class="font-bold red-text font-small img-help"></p>
                                </div>
                                <div class='preview w-full'>
                                    <img src="" id="previewImg" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- col 3 -->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-4">
                        <label for="proDesc" class="text-gray-800 uppercase font-navbar">Product Description</label>
                        <p class="font-bold red-text font-small desc-help"></p>
                        <textarea style="font-size: 11px;" name="proDesc" id="proDesc" cols="30" rows="5"
                        class="w-full shadow-md bg-white border border-white rounded px-3 py-3 leading-tight focus:bg-white focus:outline-none">

                        </textarea>

                        <button class="btn btn-md indigo lighten-4 font-bold tracking-wide black-text mt-4" id="addProBtn">
                            <i class="fas fa-plus-square pr-2"></i>
                            Add Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>