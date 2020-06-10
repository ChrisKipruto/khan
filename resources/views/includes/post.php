<?php

# connect to db
require '../../config/connect.php';

# add brand
if(isset($_POST['addBrand'])){

    # init brand
    $brand = mysqli_real_escape_string($conn, htmlspecialchars($_POST['productBrand']));

    # check if brand title already exist
    $sql = "SELECT * FROM brands WHERE brand_title = '$brand'";

    # run check
    $run = mysqli_query($conn, $sql);

    # count rows
    $count = mysqli_num_rows($run);

    // check count
    if($count < 1){

        # insert
        $sql = "INSERT INTO brands (brand_title) VALUES ('$brand')";

        # run insert stmt
        $run = mysqli_query($conn, $sql);

        # check run
        if($run){

            # inserted brand
            $sql = "SELECT * FROM brands WHERE brand_title = '$brand'";

            # get and store result
            $result = mysqli_query($conn, $sql);

            $brand = mysqli_fetch_assoc($result);

            echo json_encode($brand);

        } else {

            echo 'Failed';

        }

    } else {

        echo 'Brand title exists';

    }

}

?>