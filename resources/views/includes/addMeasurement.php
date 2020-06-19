<?php

    require "../../config/connect.php";

    # get sub category as per category
    if(isset($_POST['getSubCategory'])) {

        #init category id
        $categoryId = mysqli_real_escape_string($conn, htmlspecialchars($_POST['catId']));

        # get category sql
        $sql = "SELECT * FROM categories WHERE id = '$categoryId'";

        # store result
        $result = mysqli_query($conn, $sql);

        # check of result has category
        if(mysqli_num_rows($result) < 1) {

            echo 'No such Category';

        } else {

            # get sub categories
            $sql = "SELECT * FROM subcategories WHERE category_id = '$categoryId'";

            # store result
            $result = mysqli_query($conn, $sql);

            # fetch the result into an array
            $subCategories = mysqli_fetch_all($result, MYSQLI_ASSOC);

            # check run
            if(!$subCategories){

                echo 'No subcategory';

            } else {

                echo '
                    <option value=""> Open to Select Sub-Category </opiton>
                ';

                foreach($subCategories as $subCategory){
                    echo '
                        <option value="'.$subCategory['id'].'" cid="'.$subCategory['category_id'].'">
                            '.$subCategory['subcategory_title'].'
                        </option>
                    ';
                }

            }

        }

    } /** end get sub category as per category */

    if(isset($_POST['getSubType'])) {

        # init sub category id
        $subcategory_id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['subcatId']));

        # get subtypes as per the sub category wit sql
        $sql = "SELECT * FROM subtypes WHERE subcategory = '$subcategory_id'";

        # store result of sub types
        $result = mysqli_query($conn, $sql);

         # fetch subtypes into an associaive array
         $subTypes = mysqli_fetch_all($result, MYSQLI_ASSOC);

         # check run
         if(!$subTypes){

            echo 'No sub type';

        } else {

            echo '
                <option value=""> Open to Select Sub-Category </opiton>
            ';

            foreach($subTypes as $subType){
                echo '
                    <option value="'.$subType['id'].'" sid="'.$subType['subcategory'].'"  bid="'.$subType['brand'].'">
                        '.$subType['subtype_title'].'
                    </option>
                ';
            }

        }

    }

?>