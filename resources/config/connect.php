<?php

# connect to database
$conn = mysqli_connect('localhost', 'root', '', 'khanstore');

# check connection
if(!$conn){
    echo 'Db Connection Error: ' . mysqli_connect_error($conn);
}

?>