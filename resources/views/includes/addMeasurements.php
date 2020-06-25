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


    /**
     * Add Womens Shoes
    */

        if(isset($_POST['addWomenShoe'])) {

            # init women shoes details
            $country = mysqli_real_escape_string($conn, htmlspecialchars($_POST['country']));
            $size = mysqli_real_escape_string($conn, htmlspecialchars($_POST['size']));
            $heelDim = mysqli_real_escape_string($conn, htmlspecialchars($_POST['heelDim']));

            # check if country is empty
            if(!empty($country) || empty($heelDim)) {

                # check if country exist
                $sql = "SELECT * FROM women_shoe_sizes WHERE country = '$country'";

                # store result
                $result = mysqli_query($conn, $sql);

                # check count
                if(mysqli_num_rows($result) > 0) {

                    echo 'country exist';

                } else {

                    # insert
                    $insert = "INSERT INTO `women_shoe_sizes`(`country`, `sizes`, `heel_to_toe`)
                    VALUES ('$country', '$size', '$heelDim')";

                    # run
                    $run = mysqli_query($conn, $insert);

                    if($run) {
                        echo 'success';
                    } else {
                        echo 'failed';
                    }

                }

            } else {

                # check heel_to_toe exist
                $sql = "SELECT * FROM women_shoe_sizes WHERE heel_to_toe IS NOT NULL";

                # store result
                $result = mysqli_query($conn, $sql);

                # chekc result
                if(mysqli_num_rows($result) > 0) {

                    echo 'heel to to exist';

                } else {
                    
                    # insert
                    $insert = "INSERT INTO `women_shoe_sizes`(`country`, `sizes`, `heel_to_toe`)
                    VALUES ('$country', '$size', '$heelDim')";

                    # run
                    $run = mysqli_query($conn, $insert);

                    if($run) {
                        echo 'success';
                    } else {
                        echo 'failed';
                    }

                }

            }

        }

    /**End add Womens Shoes*/ /////////////////////////////////////


    /**
     * Add mens shoes
    */

        if(isset($_POST['addMensShoes'])) {

            # init mens shoes details
            $size = mysqli_real_escape_string($conn, htmlspecialchars($_POST['menSize']));
            $country = mysqli_real_escape_string($conn, htmlspecialchars($_POST['menCountry']));

            # check if country already exist
            $sql = "SELECT * FROM men_shoe_sizes WHERE country = '$country'";

            # store result of check
            $result = mysqli_query($conn, $sql);

            # count the result
            if(mysqli_num_rows($result) > 0) {
                echo 'country exist'; 
            } else {

                # insert into table
                $insert = "INSERT INTO `men_shoe_sizes`(`country`, `Size`) 
                VALUES ('$country', '$size')";

                # run
                $run = mysqli_query($conn, $insert);

                # check
                if($run) {
                    echo 'success';
                } else {
                    echo 'failed';
                }

            }

        }

    /**End add mens shoes*/ /////////////////////////////////////




    /**
     * Add dress 
    */

    if(isset($_POST['addDress'])) {

        # init dress  details
        $size = mysqli_real_escape_string($conn, htmlspecialchars($_POST['dSize']));
        $chest = mysqli_real_escape_string($conn, htmlspecialchars($_POST['dChest']));
        $waist = mysqli_real_escape_string($conn, htmlspecialchars($_POST['dWaist']));
        $hip = mysqli_real_escape_string($conn, htmlspecialchars($_POST['dHip']));

        # check if country already exist
        $sql = "SELECT * FROM dress_sizes WHERE size = '$size'";

        # store result of check
        $result = mysqli_query($conn, $sql);

        # count the result
        if(mysqli_num_rows($result) > 0) {
            echo 'size exist'; 
        } else {

            # insert into table
            $insert = "INSERT INTO `dress_sizes`(`size`, `chest`, `waist`, `hip`)
                VALUES ('$size', '$chest', '$waist', '$hip')";

            # run
            $run = mysqli_query($conn, $insert);

            # check
            if($run) {
                echo 'success';
            } else {
                echo 'failed';
            }

        }

    }

    /**End add dress */ ///////////////////////////////////////////



    /**
     * Add dress 
    */

    if(isset($_POST['addWomenPants'])) {

        # init dress  details
        $size = mysqli_real_escape_string($conn, htmlspecialchars($_POST['dSize']));
        $waist = mysqli_real_escape_string($conn, htmlspecialchars($_POST['dWaist']));
        $bust = mysqli_real_escape_string($conn, htmlspecialchars($_POST['dBust']));
        $hip = mysqli_real_escape_string($conn, htmlspecialchars($_POST['dHip']));

        # check if size already exist
        $sql = "SELECT * FROM women_pants_sizes WHERE size = '$size'";

        # store result of check
        $result = mysqli_query($conn, $sql);

        # count the result
        if(mysqli_num_rows($result) > 0) {
            echo 'size exist'; 
        } else {

            # insert into table
            $insert = "INSERT INTO `women_pants_sizes`(`size`, `bust`, `waist`, `hip`)
                VALUES ('$size', '$bust', '$waist', '$hip')";

            # run
            $run = mysqli_query($conn, $insert);

            # check
            if($run) {
                echo 'success';
            } else {
                echo 'failed';
            }

        }

    }

    /**End add dress */ ///////////////////////////////////////////


    /**
     * Add men's pants 
    */

    if(isset($_POST['addMenPants'])) {

        # init men's pants  details
        $size = mysqli_real_escape_string($conn, htmlspecialchars($_POST['dSize']));
        $waist = mysqli_real_escape_string($conn, htmlspecialchars($_POST['dWaist']));

        # check if size already exist
        $sql = "SELECT * FROM men_pants_sizes WHERE size = '$size'";

        # store result of check
        $result = mysqli_query($conn, $sql);

        # count the result
        if(mysqli_num_rows($result) > 0) {
            echo 'size exist'; 
        } else {

            # insert into table
            $insert = "INSERT INTO `men_pants_sizes`(`size`, `waist`)
                VALUES ('$size', '$waist')";

            # run
            $run = mysqli_query($conn, $insert);

            # check
            if($run) {
                echo 'success';
            } else {
                echo 'failed';
            }

        }

    }

    /**End add men's pants */ ///////////////////////////////////////////

?>