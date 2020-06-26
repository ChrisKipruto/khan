<!-- back app header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<!-- title -->
<title> Khan Store &bull; Add Baby Shoes Measurements </title>

<div class="container-fluid">
    <div class="row d-flex justify-center">
        <!-- go back to measurements -->
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 mb-1">
            <a href="babyMeasurement.php" 
                class="btn btn-link btn-md font-bold tracking-wider">
                Back to Measurements
            </a>
        </div>

        <!-- msg -->
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 mb-3">
            <?php include "../includes/messages.php"; ?>
        </div>

        <!-- add baby shoes measurements -->
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-3">
            <div class="row d-flex justify-center">
                <!-- country -->
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="babyShoeCountry" class="font-navbar">Country</label>
                        <input type="text" id="babyShoeCountry" name="babyShoeCountry"
                            class="w-full px-3 py-3 outline-none font-semibold bg-gray-400 rounded-sm shadow-md">
                        <p class="red-text font-bold font-small babyshoeCountry-help"></p>
                    </div>
                </div>

                <!-- size -->
                <div class="col-md-5">
                    <label for="babyShoeSizes" class="font-navbar">
                        Size
                        <span class="normal-case">(separated with comma)</span>
                    </label>
                    <p class="red-text font-bold font-small babyShoeSizes-help"></p>
                    <textarea name="babyShoeSizes" id="babyShoeSizes" cols="30" rows="6"
                        class="w-full px-3 pt-2 outline-none font-semibold bg-gray-400 rounded-sm shadow-md"></textarea>
                    
                    <button id="addBabyShoeBtn"
                        class="btn btn-md indigo lighten-4 font-bold tracking-wider mt-3">
                        add baby shoe size
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- back app footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>