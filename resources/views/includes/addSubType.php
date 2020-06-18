<?php

    # connect to db
    require "../../config/connect.php";

    # add subtype
    if(isset($_POST['addSubType'])) {

        # init sub type details
        $subtype_title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['subtype']));
        $brand_id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['brand']));
        $subcategory_id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['sid']));

        # check sub title does not exist
        $sql = "SELECT * FROM subtypes WHERE subtype_title = '$subtype_title' AND subcategory = '$subcategory_id'";

        # store result
        $result = mysqli_query($conn, $sql);

        # count the result
        if(mysqli_num_rows($result) >= 1){

            echo 'sub type exists';

        } else {

            # insert into subtypes
            $insert = "INSERT INTO `subtypes`(`subcategory`, `brand`, `subtype_title`) 
                    VALUES ('$subcategory_id', '$brand_id', '$subtype_title')";
            
            # run insert
            $run = mysqli_query($conn, $insert);

            # check if insert
            if($run) {

                echo 'success';

            } else {

                echo 'failed';

            }

        }

    }


    # delete category
    if(isset($_POST['deleteCat'])) {

        # init delete id
        $deleteId = mysqli_real_escape_string($conn, htmlspecialchars($_POST['deleteId']));

        # get brand by id
        $sql = "SELECT * FROM subtypes WHERE id = '$deleteId'";

        # store result
        $result = mysqli_query($conn, $sql);

        # check count to make sure brand exists
        if(mysqli_num_rows($result) > 0){

            # delete brand
            $sql = "DELETE FROM `subtypes` WHERE `subtypes`.`id` = '$deleteId'";

            # run delete
            $run = mysqli_query($conn, $sql);

            # check if run was successful
            if($run){

                echo 'Delete Successful';

            } else {

                echo 'Delete failed';

            }

        } else {

            echo 'sub type does not exist';

        }

    } /** end of delete brand */

?>