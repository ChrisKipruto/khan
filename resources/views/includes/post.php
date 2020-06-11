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

} /** End of add brand */

# delete brand
if(isset($_POST['deleteBrand'])) {

    # init delete id
    $deleteId = mysqli_real_escape_string($conn, htmlspecialchars($_POST['deleteId']));

    # get brand by id
    $sql = "SELECT * FROM brands WHERE id = '$deleteId'";

    # store result
    $result = mysqli_query($conn, $sql);

    # check count to make sure brand exists
    if(mysqli_num_rows($result) > 0){

        # delete brand
        $sql = "DELETE FROM `brands` WHERE `brands`.`id` = '$deleteId'";

        # run delete
        $run = mysqli_query($conn, $sql);

        # check if run was successful
        if($run){

            echo 'Delete Successful';

        } else {

            echo 'Delete failed';

        }

    } else {

        echo 'That brand does not exist';

    }

} /** end of delete brand */

?>