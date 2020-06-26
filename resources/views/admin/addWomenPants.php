<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Add Women's Pants</title>

<div class="container">
    <div class="row d-flex justify-center">
        <!-- go back to measurements -->
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 mb-1">
            <a href="womenMeasurement.php" 
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
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="womenPantsSize" class="font-navbar">Size</label>
                        <input type="text" id="womenPantsSize" name="womenPantsSize"
                            placeholder="e.g. L, XL, XXL"
                            class="w-full px-3 py-3 outline-none font-semibold grey lighten-2 rounded-sm shadow-md">
                        <p class="red-text font-bold font-small womenPantsSize-help"></p>
                    </div>
                </div>

                <!-- Bust/Chest -->
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="womenPantsBust" class="font-navbar">Bust/Chest</label>
                        <input type="text" id="womenPantsBust" name="womenPantsBust"
                            class="w-full px-3 py-3 outline-none font-semibold grey lighten-2 rounded-sm shadow-md">
                        <p class="red-text font-bold font-small womenPantsBust-help"></p>
                    </div>
                </div>

                <!-- waist -->
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="womenPantsWaist" class="font-navbar">Waist</label>
                        <input type="text" id="womenPantsWaist" name="womenPantsWaist"
                            class="w-full px-3 py-3 outline-none font-semibold grey lighten-2 rounded-sm shadow-md">
                        <p class="red-text font-bold font-small womenPantsWaist-help"></p>
                    </div>
                </div>

                <!-- Hip -->
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="womenPantsHip" class="font-navbar">Hip</label>
                        <input type="text" id="womenPantsHip" name="womenPantsHip"
                            class="w-full px-3 py-3 outline-none font-semibold grey lighten-2 rounded-sm shadow-md">
                        <p class="red-text font-bold font-small dressHip-help"></p>
                    </div>

                    <p class="font-small font-semibold">* All measurements represented in inches</p>
                    <button id="addWomensPantsBtn"
                        class="btn indigo lighten-4 font-bold tracking-wider float-right mt-3">
                        add Women's Pants Size
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>