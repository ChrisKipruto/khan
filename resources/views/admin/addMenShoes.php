<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Measurements</title>

<?php

# connect to db
require "../../config/connect.php";

# get men's shoes from table
$sql = "SELECT * FROM `men_shoe_sizes`";

# store result
$result = mysqli_query($conn, $sql);

# fetch men's shoes results into an array
$menShoes = mysqli_fetch_all($result, MYSQLI_ASSOC);

$mens_shoes_array = array();

?>

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
                <!-- country -->
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="mensShoeCountry" class="font-navbar">Country</label>
                        <input type="text" id="mensShoeCountry" name="mensShoeCountry"
                            class="w-full px-3 py-3 outline-none font-semibold grey lighten-2 rounded-sm shadow-md">
                        <p class="red-text font-bold font-small mensShoeCountry-help"></p>
                    </div>
                </div>

                <!-- size -->
                <div class="col-md-5">
                    <label for="mensShoeSize" class="font-navbar">
                        Size
                        <span class="normal-case"> - separated with comma </span>
                    </label>
                    <p class="red-text font-bold font-small mensShoeSize-help"></p>
                    <textarea name="mensShoeSize" id="mensShoeSize" cols="30" rows="3"
                        class="w-full px-3 pt-2 outline-none font-semibold grey lighten-2 rounded-sm shadow-md"></textarea>
                    
                    <button id="addmensShoeBtn"
                        class="btn btn-indigo font-bold tracking-wider mt-3">
                        add Men shoe size
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>