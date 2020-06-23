<?php

    # connect to db
    require '../../config/connect.php';

    /**
     * Add Baby shoes
    */

        if(isset($_POST['addBabyShoe'])) {

            # init shoe details
            $country = mysqli_real_escape_string($conn, htmlspecialchars($_POST['country']));
            $shoeSize = mysqli_real_escape_string($conn, htmlspecialchars($_POST['shoeSize']));

            # check that country if unique
            $sql = "SELECT * FROM baby_shoes WHERE country = '$country'";

            # store result
            $result = mysqli_query($conn, $sql);

            # count result
            if(mysqli_num_rows($result) > 0) {
                echo 'Country exist';
            } else {

                # insert
                $insert = "INSERT INTO `baby_shoes`(`country`, `size`) 
                        VALUES ('$country', '$shoeSize')";
                
                # run insert
                $run = mysqli_query($conn, $insert);

                #check run
                if($run) {
                    echo 'success';
                } else {
                    echo 'failed';
                }

            }
            
        }

    /**End add baby shoes*/ /////////////////////////////////////

?>