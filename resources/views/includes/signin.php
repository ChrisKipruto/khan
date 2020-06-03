<?php
    # db connection
    require '../../config/connect.php';

    # login 
    if(isset($_POST['login'])){
        
        $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
        $pwd = mysqli_real_escape_string($conn, htmlspecialchars($_POST['pwd']));

        # check if fields are not empty
        if(!empty($email) || !empty($pwd)){

            # sql stmt
            $sql = "SELECT * FROM customers WHERE email = '$email'";

            # run sql stmt and store result
            $result = mysqli_query($conn, $sql);

            # get count
            if(mysqli_num_rows($result) < 1){

                echo 'customer not exist';
                
            } else {

                # store result into array
                $customer = mysqli_fetch_assoc($result);

                # check is password match
                if(!password_verify($pwd, $customer['pass_word'])){
                    echo 'passwords do not match';
                } else {

                    # start session
                    session_start();

                    # set session variables
                    $_SESSION['id'] = $customer['id'];
                    $_SESSION['fname'] = $customer['fullname'];
                    $_SESSION['email'] = $customer['email'];
                    $_SESSION['created_at'] = $customer['created_at'];

                    echo 'Log In';

                }

            }

            # release memory
            mysqli_free_result($result);

            # close connection
            mysqli_close($conn);
            
        } else {
            echo 'empty fields';
        }

    }
?>