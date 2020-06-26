<?php

    # connect to db
    require "../../config/connect.php";

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
<?php require "../templates/back-layout/back.header.php"; ?>

<title>Khan Store &bullet; Measurements</title>

<div class="container-fluid">
    <div class="row d-flex justify-center mt-3">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
            
        </div>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>