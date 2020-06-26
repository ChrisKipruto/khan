<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Add Women's Shoe Measurement</title>

<div class="container-fluid">
    <div class="row d-flex justify-center">
        <!-- go back to measurements -->
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-1">
            <a href="measurements.php" 
                class="btn btn-link btn-md font-bold tracking-wider">
                Back to Measurements
            </a>
        </div>

        <!-- msg -->
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 mb-3">
            <?php include "../includes/messages.php"; ?>
        </div>

        <!-- form -->
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-3">
            <div class="row d-flex justify-center">
                <!-- check box for country -->
                <div class="col-md-6">
                    <div class="row d-flex justify-center">
                        <!-- select -->
                        <div class="col-md-10 mb-3">
                            <label for="chooseCountryOrHeel"
                                class="font-navbar">
                                Country or Heel dimensions
                            </label>
                            <select class="custom-select z-depth-1" id="chooseCountryOrHeel">
                                <option value=""> Open Select menu </opiton>
                                <option value="forCountry">Country</option>
                                <option value="forHeel">Heel in Inches</option>
                            </select>
                            <p class="red-text font-bold font-small chooseCountryOrHeel-help"></p>
                        </div>

                        <!-- country -->
                        <div class="col-md-10" id="countryColumn">
                            <div class="mb-3">
                                <label for="womenShoeCountry" class="font-navbar">Country</label>
                                <input type="text" id="womenShoeCountry" name="womenShoeCountry"
                                    class="w-full px-3 py-3 outline-none font-semibold grey lighten-2 rounded-sm shadow-md">
                                <p class="red-text font-bold font-small womenShoeCountry-help"></p>
                            </div>
                        </div>

                        <!-- heel to toe -->
                        <div class="col-md-10" id="heelColumn">
                            <div class="mb-3">
                                <label for="heel" class="font-navbar">
                                    Heel to Toe
                                    <span class="font-italic lowercase">inches</span>
                                    <span class="normal-case">- separated with comma</span>
                                </label>
                                <p class="red-text font-bold font-small heel-help"></p>
                                <textarea name="heel" id="heel" cols="30" rows="3"
                                    class="w-full px-3 pt-2 outline-none font-semibold grey lighten-2 rounded-sm shadow-md"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- size -->
                <div class="col-md-6">
                    <label for="womenShoeSize" class="font-navbar">
                        Size
                        <span class="normal-case"> - separated with comma </span>
                    </label>
                    <p class="red-text font-bold font-small womenShoeSize-help"></p>
                    <textarea name="womenShoeSize" id="womenShoeSize" cols="30" rows="3"
                        class="w-full px-3 pt-2 outline-none font-semibold grey lighten-2 rounded-sm shadow-md"></textarea>
                    
                    <button id="addwomenShoeBtn"
                        class="btn btn-md indigo lighten-4 font-bold tracking-wider mt-3">
                        add Women shoe size
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>