<?php

    # connect to db
    require "../../../config/connect.php";

    /**
     * Baby shoes 
    */

        # get baby shoes from table
        $sql = "SELECT * FROM baby_shoes";

        # store result
        $result = mysqli_query($conn, $sql);

        # fetch baby shoes results into an array
        $babyShoes = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $baby_shoe_array = array();

    /* End baby shoes *//////////////////////////////////////

    /**
     * Women's shoes 
    */

        # get women's shoes from table
        $sql = "SELECT * FROM women_shoe_sizes";

        # store result
        $result = mysqli_query($conn, $sql);

        # fetch women's shoes results into an array
        $womenShoes = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $women_shoes_array = array();
        $women_shoes_heel_array = array();

    /* End women's shoes *///////////////////////////////////

    /**
     * Men's shoes 
    */

        # get men's shoes from table
        $sql = "SELECT * FROM `men_shoe_sizes`";

        # store result
        $result = mysqli_query($conn, $sql);

        # fetch men's shoes results into an array
        $menShoes = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $mens_shoes_array = array();

    /* End Men's shoes *////////////////////////////////////

    /**
     * Dress  
    */

        # get dress from table
        $sql = "SELECT * FROM dress_sizes";

        # store result
        $result = mysqli_query($conn, $sql);

        # fetch dress results into an array
        $dresses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    /* End Dress *//////////////////////////////////////////

    /**
     * Women's Pants 
    */

        # get women's pants from table
        $sql = "SELECT * FROM women_pants_sizes";

        # store result
        $result = mysqli_query($conn, $sql);

        # fetch  women's pants results into an array
        $womenPants = mysqli_fetch_all($result, MYSQLI_ASSOC);

    /* End Women's Pants*///////////////////////////////////

    /**
     * Men's Pants  
    */

        # get men's pants from table
        $sql = "SELECT * FROM men_pants_sizes";

        # store result
        $result = mysqli_query($conn, $sql);

        # fetch  men's pants results into an array
        $menPants = mysqli_fetch_all($result, MYSQLI_ASSOC);

    /* End Men's Pants *////////////////////////////////////

    # free result from memory
    mysqli_free_result($result);

    # close connection
    mysqli_close($conn);

?>

<!-- admin header -->
<?php require "../../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Measurements</title>

<div class="container-fluid">
    <div class="row d-flex justify-center mt-3">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-3">
            <ul class="nav nav-tabs black md-tabs" id="categoryTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active white-text border-0 font-semibold" id="womenShoes-tab" 
                        data-toggle="tab" href="#womenShoes" role="tab" aria-controls="womenShoes" aria-selected="false">
                        Women's Shoes
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link white-text border-0 font-semibold" id="dresses-tab" 
                        data-toggle="tab" href="#dresses" role="tab" aria-controls="dresses" aria-selected="false">
                        Dresses
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link white-text border-0 font-semibold" id="womenPants-tab" 
                        data-toggle="tab" href="#womenPants" role="tab" aria-controls="womenPants" aria-selected="false">
                        Women's Pants
                    </a>
                </li>
            </ul>

            <!-- tab content -->
            <div class="tab-content  pt-3" id="categoryTabContent">

                <!-- women's shoes tab -->
                <div class="tab-pane fade show active px-2 py-2" id="womenShoes" 
                    role="tabpanel" aria-labelledby="womenShoes-tab">
                    <div class="mx-2 my-2">
                        <div class="row d-flex justify-content-center">
                            <?php if(!$womenShoes): ?>                     
                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-3">
                                    <p>There are no measurements added for womens shoes.</p>
                                    <a href="addWomenShoes.php"
                                        class="btn btn-indigo btn-md">
                                        <i class="fas fa-plus pr-2"></i>
                                        Add
                                    </a>
                                </div> 
                            <?php else: ?>
                                <div class="col-xl-11 col-lg 11 col-md-12 col-sm-12 mb-3">
                                    <div class="accordion" id="womenShoeAccordion">
                                        <div class="card z-depth-0 bordered">
                                            <div class="card-header" id="womenShoeAccordionHeadingOne">
                                                <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#womenShoeAccordionCollapseOne"
                                                aria-expanded="true" aria-controls="womenShoeAccordionCollapseOne">
                                                    Womens Shoes
                                                </button>
                                                </h5>
                                            </div>
                                            <div id="womenShoeAccordionCollapseOne" class="collapse show" aria-labelledby="womenShoeAccordionHeadingOne"
                                            data-parent="#womenShoeAccordion">
                                                <div class="card-body">
                                                    <a href="addWomenShoes.php" 
                                                        class="btn btn-md btn-indigo 
                                                        tracking-wider font-bold">
                                                        <i class="fas fa-feather pr-2"></i>
                                                        Add
                                                    </a>

                                                    <table id="womenShoesTable" class="table table-striped table-sm">
                                                        <thead>
                                                            <tr>
                                                            <?php foreach($womenShoes as $womenShoe): ?>
                                                                <th><?php echo htmlspecialchars($womenShoe['country']) ?></th>
                                                            <?php endforeach; ?>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php
                                                            $mainCount = count(explode(',', $womenShoe['sizes']));
                                                            $h = explode(',', $womenShoe['heel_to_toe']);
                                                        ?>
                                                        <?php for($ws = 0; $ws < $mainCount; $ws++): ?>
                                                            <tr>
                                                                <?php foreach($womenShoes as $womenShoe): ?>
                                                                    <td>
                                                                        <?php
                                                                            $w_s = explode(',', $womenShoe['sizes']);
                                                                            $c_w_s = array_merge($women_shoes_array, $w_s);
                                                                            print_r(@$c_w_s[$ws]);
                                                                        ?>
                                                                    </td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                        <?php endfor; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card z-depth-0 bordered">
                                            <div class="card-header" id="womenShoeAccordionHeadingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#womenShoeAccordionCollapeTwo" aria-expanded="false" aria-controls="womenShoeAccordionCollapeTwo">
                                                        Heel Dimension
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="womenShoeAccordionCollapeTwo" 
                                                class="collapse" 
                                                aria-labelledby="womenShoeAccordionHeadingTwo" 
                                                data-parent="#womenShoeAccordion">
                                                <div class="row d-flex justify-center">
                                                    <div class="col-md-6">
                                                        <table id="heelToToeTable" class="table table-striped table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>Heel to Toe</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?php foreach ($womenShoes as $womenShoe): ?>
                                                                    <?php for($h = 0; $h < count(explode(',', $womenShoe['heel_to_toe'])); $h++): ?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php
                                                                                    $heels = explode(',', $womenShoe['heel_to_toe']);
                                                                                    $c_w_h = array_merge($heels, $women_shoes_heel_array);
                                                                                    print_r($c_w_h[$h]);
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endfor; ?>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div> <!-- end women's shoes tab -->

                <!-- Dresses tab -->
                <div class="tab-pane fade px-2 py-2" id="dresses" 
                    role="tabpanel" aria-labelledby="dresses-tab">
                    <div class="mx-3 my-3">
                        <div class="row d-flex justify-center">
                            <!-- check if men's shoes is not null -->                 
                            <?php if(!$dresses): ?>
                                <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12 mb-3">
                                    <div class="text-center">
                                        <p class="lead font-semibold">
                                            There are no measurements added.
                                            <a href="addDresses.php" 
                                                class="btn btn-md btn-indigo font-seminbold tracking-wide">
                                                <i class="fas fa-plus pr-2"></i>
                                                Add
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-xl-9 col-lg-9 col-md-10 col-sm-12 mb-3">
                                    <a href="addDresses.php" 
                                        class="btn btn-md btn-indigo font-seminbold tracking-wide mb-2">
                                        <i class="fas fa-plus pr-2"></i>
                                        Add
                                    </a>
                                    <table id="dressesTable" class="table table-striped table-bordered table-sm">
                                        <thead class="p-2 bg-black">
                                            <tr class="uppercase white-text font-bold">
                                                <th>Sizes</th>
                                                <th>Chest</th>
                                                <th>Waist</th>
                                                <th>Hip</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($dresses as $dresse): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($dresse['size']); ?></td>
                                                    <td><?php echo htmlspecialchars($dresse['chest']); ?></td>
                                                    <td><?php echo htmlspecialchars($dresse['waist']); ?></td>
                                                    <td><?php echo htmlspecialchars($dresse['hip']); ?></td>
                                                </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div> <!-- end Dresses tab -->

                <!-- Women's Pants tab -->
                <div class="tab-pane fade px-2 py-2" id="womenPants" 
                    role="tabpanel" aria-labelledby="womenPants-tab">
                    <div class="mx-3 my-3">
                        <div class="row d-flex justify-content-center">
                            <!-- check if men's shoes is not null -->                 
                            <?php if(!$womenPants): ?>
                                <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12 mb-3">
                                    <div class="text-center">
                                        <p class="lead font-semibold">
                                            There are no measurements added.
                                            <a href="addWomenPants.php" 
                                                class="btn btn-indigo btn-md font-seminbold tracking-wide">
                                                <i class="fas fa-plus pr-2"></i>
                                                Add
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-xl-9 col-lg-9 col-md-10 col-sm-12 mb-3">
                                    <a href="addWomenPants.php" 
                                        class="btn btn-indigo btn-md font-seminbold tracking-wide">
                                        <i class="fas fa-plus pr-2"></i>
                                        Add
                                    </a>

                                    <table id="womenPantsTable" class="table table-striped table-sm">
                                        <thead class="p-2 bg-black">
                                            <tr class="uppercase white-text font-bold">
                                                <th>Sizes</th>
                                                <th>Bust</th>
                                                <th>Waist</th>
                                                <th>Hip</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($womenPants as $womenPant): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($womenPant['size']); ?></td>
                                                    <td><?php echo htmlspecialchars($womenPant['bust']); ?></td>
                                                    <td><?php echo htmlspecialchars($womenPant['waist']); ?></td>
                                                    <td><?php echo htmlspecialchars($womenPant['hip']); ?></td>
                                                </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div> <!-- end Women's Pants tab -->
            </div>
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../../templates/back-layout/back.footer.php"; ?>