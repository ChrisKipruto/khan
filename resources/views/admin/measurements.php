<?php

    # connect to db
    require "../../config/connect.php";

    # get gender list from table
    $sql = "SELECT * FROM genders";

    # store gender result
    $result = mysqli_query($conn, $sql);

    # fetch result into an array
    $genders = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //////////////////////////////////////////////////////////////////////////

    # get list categories
    $sql = "SELECT * FROM categories WHERE category_title='Fashion'";

    # store result of categories
    $result = mysqli_query($conn, $sql);

    # fetch categories into an array
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Measurements</title>

<div class="container-fluid">
    <div class="row d-flex justify-center mt-3">
        <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12 mb-3">
            <ul class="nav nav-tabs black z-depth-1 md-tabs" id="addMeasurementsTab" role="table">
                <li class="nav-item">
                    <a href="#addMeasurement" class="nav-link active white-text font-semibold border-0"
                        data-toggle="tab" aria-controls="addMeasurement" aria-selected="ture">
                        Add Measurement
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#measurement" class="nav-link white-text font-semibold border-0"
                        data-toggle="tab" aria-controls="measurement" aria-selected="false">
                        Measurements
                    </a>
                </li>
            </ul>

            <div class="tab-content card z-depth-1 pt-3">
                <!-- add measurement -->
                <div class="tab-pane fade show active px-3 py-3" id="addMeasurement">
                    <form action="" id="addMeasurementForm">
                    <div class="row mt-3">
                            <!-- divider -->
                            <div class="col-md-12 mb-3">
                                <h4 class="font-navbar text-sm pb-3">
                                    Product Details
                                </h4>

                                <hr class="pb-2" />
                            </div>
                            
                            <!-- gender -->
                            <div class="col-md-4 mb-4">
                                <label for="gender" class="font-navbar">Gender</label>
                                <select name="gender" id="gender"
                                    class="browser-default custom-select z-depth-1 mb-2">
                                    <option value="">Select Gender</option>
                                    <?php foreach($genders as $gender):?>
                                        <option value="<?php echo htmlspecialchars($gender['id']); ?>">
                                            <?php echo htmlspecialchars($gender['gender_title']); ?>
                                        </option>
                                    <?php endforeach;?>
                                </select>
                                <p class="font-bold red-text font-small gender-help"></p>
                            </div>

                            <!-- categories -->
                            <div class="col-md-4 mb-4">
                                <label for="measurementCategory" class="font-navbar">Product Category</label>
                                <select name="measurementCategory" id="measurementCategory"
                                    class="browser-default custom-select z-depth-1 mb-2">
                                    <option value="">Select categories</option>
                                    <?php foreach($categories as $category):?>
                                        <option value="<?php echo htmlspecialchars($category['id']); ?>">
                                            <?php echo htmlspecialchars($category['category_title']); ?>
                                        </option>
                                    <?php endforeach;?>
                                </select>
                                <span id="preload">
                                    <div class="d-flex align-items-center">
                                        <img src="../../../public/img/5.gif" class="h-8 pr-2" alt="">
                                        <span class="font-small font-semibold light-blue-text">Fetching Sub-categories</span>
                                    </div>
                                </span>
                                <p class="font-bold red-text font-small measureCat-help"></p>
                            </div>

                            <!-- subcategories -->
                            <div class="col-md-4 mb-4">
                                <label for="measurementSubCategory" class="font-navbar">Product SubCategory</label>
                                <select name="measurementSubCategory" id="measurementSubCategory"
                                    class="browser-default custom-select z-depth-1 mb-2">
                                    
                                </select>
                                <span id="preload">
                                    <div class="d-flex align-items-center">
                                        <img src="../../../public/img/5.gif" class="h-8 pr-2" alt="">
                                        <span class="font-small font-semibold light-blue-text">Fetching Sub-categories</span>
                                    </div>
                                </span>
                                <p class="font-bold red-text font-small measureSubCat-help"></p>
                            </div>

                            <!-- divider -->
                            <div class="col-md-12 mb-3">
                                <h4 class="font-navbar text-sm pb-3">
                                    Measurement Details
                                    <small class="lowercase text-xs">If measurement not applicable enter 
                                        <strong class="uppercase red-text">N/A</strong>
                                    </small>
                                </h4>

                                <hr class="pb-2" />
                            </div>

                            <!-- subcategories -->
                            <div class="col-md-4 mb-4">
                                <label for="measurementSubType" class="font-navbar">Product SubType</label>
                                <select name="measurementSubType" id="measurementSubType"
                                    class="browser-default custom-select z-depth-1 mb-2">
                                    
                                </select>
                                <p class="font-bold red-text font-small measureSubType-help"></p>
                            </div>

                            <!-- size -->
                            <div class="col-md-4 mb-4">
                                <label for="measurementSize" style="font-size: 13px;"
                                    class="font-bold">
                                    <span class="uppercase">Size</span>
                                </label>
                                <input type="text" id="measurementSize" name="measurementSize"
                                        placeholder="e.g. XL, XXL"
                                    class="form-control z-depth-1">
                            </div>

                            <!-- Waist -->
                            <div class="col-md-4 mb-4">
                                <label for="measurementWaist" style="font-size: 13px;"
                                    class="font-bold">
                                    <span class="uppercase">Waist</span>
                                </label>
                                <input type="text" id="measurementWaist" name="measurementWaist"
                                        placeholder="Measurement in inches"
                                    class="form-control z-depth-1">
                            </div>

                            <!-- Length -->
                            <div class="col-md-4 mb-4">
                                <label for="measurementLength" style="font-size: 13px;"
                                    class="font-bold">
                                    <span class="uppercase">Length</span>
                                </label>
                                <input type="text" id="measurementLength" name="measurementLength"
                                        placeholder="Measurement in inches"
                                    class="form-control z-depth-1">
                            </div>

                            <!-- Chest -->
                            <div class="col-md-4 mb-4">
                                <label for="measurementChest" style="font-size: 13px;"
                                    class="font-bold">
                                    <span class="uppercase">Chest</span>
                                </label>
                                <input type="text" id="measurementChest" name="measurementChest"
                                        placeholder="Measurement in inches"
                                    class="form-control z-depth-1">
                            </div>

                            <!-- Hip -->
                            <div class="col-md-4 mb-4">
                                <label for="measurementHip" style="font-size: 13px;"
                                    class="font-bold">
                                    <span class="uppercase">Hip</span>
                                </label>
                                <input type="text" id="measurementHip" name="measurementHip"
                                        placeholder="Measurement in inches"
                                    class="form-control z-depth-1">
                            </div>

                            <!-- ShoeSize -->
                            <div class="col-md-4 mb-4">
                                <label for="measurementShoeSize" style="font-size: 13px;"
                                    class="font-bold">
                                    <span class="uppercase">ShoeSize</span>
                                </label>
                                <input type="text" id="measurementShoeSize" name="measurementShoeSize"
                                        placeholder="Measurement in inches"
                                    class="form-control z-depth-1">
                            </div>

                            <!-- ShoeSize -->
                            <div class="col-md-4 mb-4">
                                <button class="btn btn-indigo" id="addMeasurementBtn">
                                    Add Measurement
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!--  measurement -->
                <div class="tab-pane fade px-3 py-3" id="measurement">
                    measure
                </div>
            </div>
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>