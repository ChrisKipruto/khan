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

            print_r(json_encode($brand));

        } else {

            echo 'Failed';

        }

    } else {

        echo "Brand title exists";

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

# count categories
if(isset($_POST['countCat'])){

    # sql get all categories
    $sql = "SELECT * FROM categories";

    # store resul
    $result = mysqli_query($conn, $sql);

    # count the rows
    $count = mysqli_num_rows($result);

    # return count
    echo $count;

} /** end count categories */

# add addCat
if(isset($_POST['addCat'])){

    # init category
    $category = mysqli_real_escape_string($conn, htmlspecialchars($_POST['productCat']));

    # check if category title already exist
    $sql = "SELECT * FROM categories WHERE category_title = '$category'";

    # run check
    $run = mysqli_query($conn, $sql);

    # count rows
    $count = mysqli_num_rows($run);

    // check count
    if($count < 1){

        # insert
        $sql = "INSERT INTO categories (category_title) VALUES ('$category')";

        # run insert stmt
        $run = mysqli_query($conn, $sql);

        # check run
        if($run){

            # inserted category
            $sql = "SELECT * FROM categories WHERE category_title = '$category'";

            # get and store result
            $result = mysqli_query($conn, $sql);

            $category = mysqli_fetch_assoc($result);

            echo json_encode($category);

        } else {

            echo 'Failed';

        }

    } else {

        echo 'Category title exists';

    }

} /** End of add category */

# delete category
if(isset($_POST['deleteCat'])) {

    # init delete id
    $deleteId = mysqli_real_escape_string($conn, htmlspecialchars($_POST['deleteId']));

    # get brand by id
    $sql = "SELECT * FROM categories WHERE id = '$deleteId'";

    # store result
    $result = mysqli_query($conn, $sql);

    # check count to make sure brand exists
    if(mysqli_num_rows($result) > 0){

        # delete brand
        $sql = "DELETE FROM `categories` WHERE `categories`.`id` = '$deleteId'";

        # run delete
        $run = mysqli_query($conn, $sql);

        # check if run was successful
        if($run){

            echo 'Delete Successful';

        } else {

            echo 'Delete failed';

        }

    } else {

        echo 'category does not exist';

    }

} /** end of delete brand */

# count brands
if(isset($_POST['countBra'])){

    # sql get all brands
    $sql = "SELECT * FROM brands";

    # store resul
    $result = mysqli_query($conn, $sql);

    # count the rows
    $count = mysqli_num_rows($result);

    # return count
    echo $count;

} /** end count brands */

?>