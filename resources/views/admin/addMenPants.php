<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Add Women's Pants</title>

<div class="container">
    <div class="row d-flex justify-center">
        <!-- go back to measurements -->
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 mb-1">
            <a href="menMeasurement.php" 
                class="btn btn-link btn-md font-bold tracking-wider">
                Back to Measurements
            </a>
        </div>

        <!-- msg -->
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 mb-3">
            <?php include "../includes/messages.php"; ?>
        </div>

        <!-- add mens shoe measurements -->
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-3">
            <div class="row d-flex justify-center">
                <!-- size -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="menPantsSize" class="font-navbar">Size</label>
                        <input type="text" id="menPantsSize" name="menPantsSize"
                            placeholder="e.g. L, XL, XXL"
                            class="w-full px-3 py-3 outline-none font-semibold grey lighten-2 rounded-sm shadow-md">
                        <p class="red-text font-bold font-small menPantsSize-help"></p>
                    </div>
                </div>

                <!-- waist -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="menPantsWaist" class="font-navbar">Waist</label>
                        <input type="text" id="menPantsWaist" name="menPantsWaist"
                            class="w-full px-3 py-3 outline-none font-semibold grey lighten-2 rounded-sm shadow-md">
                        <p class="red-text font-bold font-small menPantsWaist-help"></p>
                    </div>

                    <p class="font-small font-semibold">* All measurements represented in inches</p>
                    <button id="addMensPantsBtn"
                        class="btn indigo lighten-4 font-bold tracking-wider float-right mt-3">
                        add Men's Pants Size
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>