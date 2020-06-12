<?php

# get brands
if(isset($_POST['bra'])){

    # connect to db
    require '../../config/connect.php';

    # sql to get brands
    $sql = "SELECT * FROM brands";

    # run sql and store the result
    $result = mysqli_query($conn, $sql);

    # fetch the result into an array
    $brands = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($brands as $brand){

        echo '
            <p class="mb-3">
                <a href="brands.php?id='.htmlspecialchars($brand['id']).'" class="card-link-secondary"> '.htmlspecialchars($brand['brand_title']).' </a>
            </p>
        ';

    }

}

# get categories
if(isset($_POST['cat'])){

    # connect to db
    require '../../config/connect.php';

    # sql to get category
    $sql = "SELECT * FROM categories";

    # run sql and store the result
    $result = mysqli_query($conn, $sql);

    # fetch the result into an array
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($categories as $category){

        echo '
            <p class="mb-3">
                <a href="categories.php?id='.htmlspecialchars($category['id']).'" class="card-link-secondary"> '.htmlspecialchars($category['category_title']).' </a>
            </p>
        ';

    }

}

?>