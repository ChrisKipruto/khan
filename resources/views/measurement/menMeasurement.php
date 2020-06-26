<?php

    # connect to db
    require "../../config/connect.php";

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
     * Men's Pants  
    */

        # get men's pants from table
        $sql = "SELECT * FROM men_pants_sizes";

        # store result
        $result = mysqli_query($conn, $sql);

        # fetch  men's pants results into an array
        $menPants = mysqli_fetch_all($result, MYSQLI_ASSOC);

    /* End Men's Pants *////////////////////////////////////

    /**
     * Men's Shirts  
    */

        # get men's Shirts from table
        $sql = "SELECT * FROM men_size_shirts";

        # store result
        $result = mysqli_query($conn, $sql);

        # fetch  men's Shirts results into an array
        $menShirts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $mens_shirts_array = array();

    /* End Men's Shirts *////////////////////////////////////

    # free result from memory
    mysqli_free_result($result);

    # close connection
    mysqli_close($conn);

?>

<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Measurements</title>

<div class="container-fluid">
    <div class="row d-flex justify-center mt-3">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-3">
            <ul class="nav nav-tabs black md-tabs" id="categoryTab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link white-text border-0 font-semibold" id="menShoes-tab" 
                        data-toggle="tab" href="#menShoes" role="tab" aria-controls="menShoes" aria-selected="false">
                        Mens's Shoes
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link white-text border-0 font-semibold" id="menPants-tab" 
                        data-toggle="tab" href="#menPants" role="tab" aria-controls="menPants" aria-selected="false">
                        Men's Pants
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active white-text border-0 font-semibold" id="menShirts-tab" 
                        data-toggle="tab" href="#menShirts" role="tab" aria-controls="menShirts" aria-selected="false">
                        Men's Shirts
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link white-text border-0 font-semibold" id="menSuits-tab" 
                        data-toggle="tab" href="#menSuits" role="tab" aria-controls="menSuits" aria-selected="false">
                        Men's Suits
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link white-text border-0 font-semibold" id="menUnderwear-tab" 
                        data-toggle="tab" href="#menUnderwear" role="tab" aria-controls="menUnderwear" aria-selected="false">
                        Men's Underwear
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link white-text border-0 font-semibold" id="menBelt-tab" 
                        data-toggle="tab" href="#menBelt" role="tab" aria-controls="menBelt" aria-selected="false">
                        Men's Belt
                    </a>
                </li>
            </ul>

            <!-- tab content -->
            <div class="tab-content  pt-3" id="categoryTabContent">

                <!-- men's shoes tab -->
                <div class="tab-pane fade px-2 py-2" id="menShoes" 
                    role="tabpanel" aria-labelledby="menShoes-tab">
                    <div class="mx-3 my-3">
                        <div class="row d-flex justify-center">
                            <!-- check if men's shoes is not null -->                 
                            <?php if(!$menShoes): ?>
                                <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12 mb-3">
                                    <div class="text-center">
                                        <p class="lead font-semibold">
                                            There are no measurements added.
                                            <a href="addMenShoes.php" 
                                                class="btn btn-md btn-indigo font-seminbold tracking-wide">
                                                <i class="fas fa-plus pr-2"></i>
                                                Add
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12 mb-3">
                                    <a href="addMenShoes.php" 
                                        class="btn btn-md btn-indigo font-seminbold tracking-wide mb-2">
                                        <i class="fas fa-plus pr-2"></i>
                                        Add
                                    </a>
                                    <table id="mensShoesTable" class="table table-striped table-bordered table-sm">
                                        <thead>
                                            <tr>
                                            <?php foreach($menShoes as $menShoe): ?>
                                                <th><?php echo htmlspecialchars($menShoe['country']); ?></th>
                                            <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for($ms = 0; $ms < count(explode(',',$menShoe['Size'])); $ms++):?>   
                                            <tr>
                                                <?php foreach($menShoes as $menShoe): ?>
                                                    <td>
                                                        <?php
                                                            $menS = explode(',',$menShoe['Size']);
                                                            // $c_m_s = array_merge($mens_shoes_array, $menS);
                                                            print_r($menS[$ms]);
                                                        ?>
                                                    </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div> <!-- end men's shoes tab -->

                <!-- Mens's Pants tab -->
                <div class="tab-pane fade px-2 py-2" id="menPants" 
                    role="tabpanel" aria-labelledby="menPants-tab">
                    <div class="mx-3 my-3">
                    <div class="row d-flex justify-content-center">
                            <!-- check if men's shoes is not null -->                 
                            <?php if(!$menPants): ?>
                                <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12 mb-3">
                                    <div class="text-center">
                                        <p class="lead font-semibold">
                                            There are no measurements added.
                                            <a href="addMenPants.php" 
                                                class="btn btn-indigo font-seminbold tracking-wide">
                                                <i class="fas fa-plus pr-2"></i>
                                                Add
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-xl-9 col-lg-9 col-md-10 col-sm-12 mb-3">
                                    <a href="addMenPants.php" 
                                        class="btn btn-md btn-indigo font-seminbold tracking-wide">
                                        <i class="fas fa-plus pr-2"></i>
                                        Add
                                    </a>

                                    <table id="menPantsTable" class="table table-striped table-sm">
                                        <thead class="">
                                            <tr class="font-bold">
                                                <th>Sizes</th>
                                                <th>Waist</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($menPants as $menPant): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($menPant['size']); ?></td>
                                                    <td><?php echo htmlspecialchars($menPant['waist']); ?></td>
                                                </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div> <!-- end Mens's Pants tab -->

                <!-- Men's Shirts -->
                <div class="tab-pane fade show active px-2 py-2" id="menShirts" role="tabpanel" aria-labelledby="menShirts-tab">
                    <div class="mx-3 my-3">
                        <div class="row d-flex justify-center">
                            <!-- check if shirts is not null -->
                            <?php if(!$menShirts): ?>
                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-3">
                                    <p class="lead font-bold text-center">
                                        There are no measurements.
                                        <a href="addMenShirts.php" class="btn btn-md btn-indigo">
                                            <i class="fas fa-plus pr-2"></i>
                                            Add
                                        </a>
                                    </p>
                                </div>
                            <?php else: ?>
                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-3">
                                    <a href="addMenShirts.php" class="btn btn-md btn-indigo">
                                        <i class="fas fa-plus pr-2"></i>
                                        Add
                                    </a>

                                    <table id="menShirtsTable" class="table table-striped table-sm">

                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div> <!-- end Men's Shirts -->

                <!-- Men's Suits -->
                <div class="tab-pane fade px-2 py-2" id="menSuits" role="tabpanel" aria-labelledby="menSuits-tab">
                    <div class="mx-3 my-3">
                        <div class="row">
                            <div class="col-xl-9"></div>
                        </div>
                    </div>
                </div> <!-- end Men's Suits -->

                <!-- Men's Underwear -->
                <div class="tab-pane fade px-2 py-2" id="menUnderwear" role="tabpanel" aria-labelledby="menUnderwear-tab">
                    <div class="mx-3 my-3">
                        <div class="row">
                            <div class="col-xl-9"></div>
                        </div>
                    </div>
                </div> <!-- end Men's Underwear -->

                <!-- Men's Belt-->
                <div class="tab-pane fade px-2 py-2" id="menBelt" role="tabpanel" aria-labelledby="menBelt-tab">
                    <div class="mx-3 my-3">
                        <div class="row">
                            <div class="col-xl-9"></div>
                        </div>
                    </div>
                </div> <!-- end Men's Belt-->
            </div>
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>