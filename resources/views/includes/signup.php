<?php

require '../../config/connect.php';

// REGISTER
if(isset($_POST['register'])){

    # init registration details
    $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name']));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
    $phone = mysqli_real_escape_string($conn, htmlspecialchars($_POST['phone']));
    $pwd = mysqli_real_escape_string($conn, htmlspecialchars($_POST['pwd']));

    # set default time zone
    date_default_timezone_set('Africa/Nairobi');

    $dt = date("Y-m-d H:i:sa");

    # check registration details
    if(!empty($name) || !empty($email) || !empty($pwd)){

        # check email if it exists
        $sql = "SELECT * FROM customers WHERE email = '$email'";

        # run and store result
        $result = mysqli_query($conn, $sql);

        # check count
        if(mysqli_num_rows($result) < 1){

            # check email if it exists
            $sql = "SELECT * FROM customers WHERE phone_number = '$phone'";

            # run and store result
            $result = mysqli_query($conn, $sql);

            # check count
            if(mysqli_num_rows($result) < 1){

                # hash password
                $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);

                /**
                 * INSERT
                */
                $sql = "INSERT INTO customers (fullname, email, phone_number, pass_word, updated_at) 
                        VALUES('$name', '$email', '$phone', '$pwdHash', '$dt')";

                # run insert stmt
                $run = mysqli_query($conn, $sql);

                # check run
                if($run){

                    echo 'Successful Registration';

                } else {

                    echo 'Failed Registration';

                }

            } else {
                echo 'Phone Exist';
            }

        } else {

            echo 'Email Exist';

        }

    } else {

        echo 'Detalis Empty';

    }

}

?>