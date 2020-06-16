<?php

    # connect to db
    require '../../config/connect.php';

    # add sub cat
    if(isset($_POST['addSubCat'])){

        # init sub cat details
        $category_id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['categoryId']));
        $subCategory_title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['subCategory']));

        # get brand sql
        $sql = "SELECT * FROM categories WHERE id = '$category_id'";

        # store result
        $result = mysqli_query($conn, $sql);

        # check of result has category
        if(mysqli_num_rows($result) < 1) {

            echo 'No such Category';

        } else {

            # check sub category title is unique
            $sql = "SELECT * FROM subcategories WHERE subcategory_title = '$subCategory_title'";

            # store result
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) >= 1) {

                echo 'Sub title exists';

            } else {

                # insert
                $insert = "INSERT INTO `subcategories`(`category_id`, `subcategory_title`) 
                        VALUES ('$category_id', '$subCategory_title')";
                
                # run insert
                $run = mysqli_query($conn, $insert);

                if($run) {

                    # inserted brand
                    $sql = "SELECT * FROM subcategories WHERE subcategory_title = '$subCategory_title'";

                    # get and store result
                    $result = mysqli_query($conn, $sql);

                    $subCategory = mysqli_fetch_assoc($result);

                    print_r(json_encode($subCategory));

                } else {
                    echo 'failed';
                }

            }

        }

    } /** end add sub cat */

    # delete category
    if(isset($_POST['deleteCat'])) {

        # init delete id
        $deleteId = mysqli_real_escape_string($conn, htmlspecialchars($_POST['deleteId']));

        # get brand by id
        $sql = "SELECT * FROM subcategories WHERE id = '$deleteId'";

        # store result
        $result = mysqli_query($conn, $sql);

        # check count to make sure brand exists
        if(mysqli_num_rows($result) > 0){

            # delete brand
            $sql = "DELETE FROM `subcategories` WHERE `subcategories`.`id` = '$deleteId'";

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

?>