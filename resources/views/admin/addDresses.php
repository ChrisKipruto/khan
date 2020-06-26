<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Add Dress</title>

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
                        <label for="dressSize" class="font-navbar">Dress Size</label>
                        <input type="text" id="dressSize" name="dressSize"
                            class="w-full px-3 py-3 outline-none font-semibold grey lighten-2 rounded-sm shadow-md">
                        <p class="red-text font-bold font-small dressSize-help"></p>
                    </div>
                </div>

                <!-- Bust/Chest -->
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="dressChest" class="font-navbar">Bust/Chest</label>
                        <input type="text" id="dressChest" name="dressChest"
                            class="w-full px-3 py-3 outline-none font-semibold grey lighten-2 rounded-sm shadow-md">
                        <p class="red-text font-bold font-small dressChest-help"></p>
                    </div>
                </div>

                <!-- waist -->
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="dressWaist" class="font-navbar">Waist</label>
                        <input type="text" id="dressWaist" name="dressWaist"
                            class="w-full px-3 py-3 outline-none font-semibold grey lighten-2 rounded-sm shadow-md">
                        <p class="red-text font-bold font-small dressWaist-help"></p>
                    </div>
                </div>

                <!-- Hip -->
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="dressHip" class="font-navbar">Hip</label>
                        <input type="text" id="dressHip" name="dressHip"
                            class="w-full px-3 py-3 outline-none font-semibold grey lighten-2 rounded-sm shadow-md">
                        <p class="red-text font-bold font-small dressHip-help"></p>
                    </div>

                    <p class="font-small font-semibold">* All measurements represented in inches</p>
                    <button id="addDressBtn"
                        class="btn btn-indigo font-bold tracking-wider float-right mt-3">
                        add Dress
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>