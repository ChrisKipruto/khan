<?php

# connect to db
require '../../config/connect.php';

/**
 * Add Product
 * Submit form with AJAX
*/

# valid extensions
$valid_extensions = array("png", "jpeg","jpg");

# set default time zone
date_default_timezone_set('Africa/Nairobi');

# current time
$dt = date("Y-m-d H:i:sa");

# get and store other product details
$title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['proTitle']));
$cat = mysqli_real_escape_string($conn, htmlspecialchars($_POST['proCategory']));
$bra = mysqli_real_escape_string($conn, htmlspecialchars($_POST['proBrand']));
$price = mysqli_real_escape_string($conn, htmlspecialchars($_POST['proPrice']));
$desc = mysqli_real_escape_string($conn, htmlspecialchars($_POST['proDesc']));

# store original file name
$originalFileName = mysqli_real_escape_string($conn, htmlspecialchars($_FILES['proImage']['name']));

# store file temp name
$source = $_FILES['proImage']['tmp_name'];

# store file size 
$fileSize = mysqli_real_escape_string($conn, htmlspecialchars($_FILES['proImage']['size']));

# get file extension
$ext = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

# check file extension validity
if(!in_array($ext, $valid_extensions)){

    echo "Extension Invalid";

} else {

    # check file size
    if($fileSize > 2097152) {

        echo 'Size not 2MB';

    } else {

        $temp = explode(".", $originalFileName);

        $newfilename = round(microtime(true)).".".end($temp);
        
        # target destination
        $location = "../../../public/uploads/".$newfilename;

        # upload image
        if(move_uploaded_file($source, $location)) {

            # insert record to db
            $sql = "INSERT INTO `products`(`product_category`, `product_brand`, `product_title`, `product_price`, `product_description`, `product_image`, `product_keywords`) 
                    VALUES ('$cat', '$bra', '$title', '$price', '$desc', '$newfilename', '$originalFileName')";

            # get results of insert
            $result = mysqli_query($conn, $sql);

            #check result
            if($result){

                echo 'success';

            } else {

                echo 'failed';

            }

        } else {

            echo 'File not Uploaded';

        }

    }

}

?>