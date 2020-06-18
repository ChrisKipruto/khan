<?php

    $ErroMsg = "";

    # check if id is present
    if(!isset($_GET['id'])){

        header("Location: category.php?error=noid");

        exit();

    } else {

        # connect to Database
        require "../../config/connect.php";

        # init subcategory id 
        $subcategory_id = htmlspecialchars($_GET['id']);

        /**
         * Get the sub category
        */

        # sql to get the sub category
        $sql = "SELECT * FROM subcategories WHERE id = '$subcategory_id'";

        # store result of query
        $result = mysqli_query($conn, $sql);

        # check if category exist
        if(mysqli_num_rows($result) < 1) {

            header("Location: category.php?error=nosubexist");

            exit();

        } else {

            # fetch subcategory result into an array
            $subcategory = mysqli_fetch_assoc($result);

            # init sub category details
            $subcategory_id = $subcategory['id'];
            $category_id = $subcategory['category_id'];
            $subcategory_title = $subcategory['subcategory_title'];

        }

        ///////////////////////////////////////////////////////////////////////////////

        /**
         * Get Category Details
        */

        # get category by sql
        $sql = "SELECT * FROM categories WHERE id = '$category_id'";

        # store result of category
        $result = mysqli_query($conn, $sql);

        # check if category exist
        if(mysqli_num_rows($result) < 1) {

            header("Location: category.php?error=nocatexist");

            exit();

        } else {

            # fetch the result of category into an array
            $category = mysqli_fetch_assoc($result);

            # init category details
            $category_id = $category['id'];
            $category_title = $category['category_title'];

        }
        
        ///////////////////////////////////////////////////////////////////////////////

        /**
         * get sub types
        */

        # get subtypes as per the sub category wit sql
        $sql = "SELECT * FROM subtypes WHERE subcategory = '$subcategory_id'";

        # store result of sub types
        $result = mysqli_query($conn, $sql);

         # fetch subtypes into an associaive array
         $subTypes = mysqli_fetch_all($result, MYSQLI_ASSOC);

        ///////////////////////////////////////////////////////////////////////////////


        # free up result from memory
        mysqli_free_result($result);

        # close connection to db
        mysqli_close($conn);

    }

?>

<!-- back app header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<!-- title -->
<title> Khan Store &bull; <?php echo htmlspecialchars($subcategory_title) ?> </title>

<div class="container-fluid">
    <!-- cat success -->
    <div id="catSuccess" class="w-68 z-40 absolute top-auto -mt-3 right-0 mr-2 position-fixed">
        <div class="success-color z-depth-1 p-3 relative">
            <p class="white-text catSuccessP"></p>
        </div>
    </div>

    <!-- cat failed -->
    <div id="catDanger" class="w-68 z-40 absolute top-auto -mt-3 right-0 mr-2 position-fixed">
        <div class="danger-color z-depth-1 p-3 relative">
            <p class="white-text catDangerP"></p>
        </div>
    </div>

    <div class="row d-flex justify-content-center">

        <!-- go back to categor -->
        <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12 mb-3">
            <a href="category.php?id=<?php echo htmlspecialchars($category_id); ?>" 
                class="btn btn-link btn-md font-bold tracking-wider">
                Back to Category
            </a>
        </div>

        <!-- add sub type modal -->
        <div class="modal fade" id="addSubTypeModal"
            tabindex="1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-notify" role="document">
                <div class="modal-content p-3">
                    <!-- header -->
                    <div class="modal-header bg-indigo-500">
                        <p class="uppercase font-bold white-text tracking-wide">
                            Add Sub Type Form
                        </p>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <!-- body -->
                    <div class="modal-body">
                        <div class="row">
                            <!-- sub type title -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="subtypeTitle"
                                        class="font-bold font-navbar">Sub-Type Title</label>
                                    <input type="text" id="subtypeTitle" name="subtypeTitle"
                                        class="w-full px-3 py-3 outline-none border-b-2 border-indigo-300 bg-gray-200 font-bold shadow-md" />
                                    <p class="red-text font-small font-bold subtype-help"></p>
                                </div>
                            </div>

                            <!-- sub type by brand -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="proBrand" 
                                    class="text-gray-800 uppercase font-navbar">Add Product Brand {optional}</label>
                                    <div>
                                        <select name="proBrand" class="browser-default custom-select z-depth-1 mb-2" id="proBrand">

                                        </select>
                                        <p class="font-bold red-text font-small bra-help"></p>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-indigo" id="addSubTypeBtn">
                                Add Sub-Type
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- sub category details -->
        <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12 mb-3">
            <!-- details divide-->
            <div class="row d-flex justify-center">
            
                <!-- sub and category -->
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" id="category"
                                value="<?php echo htmlspecialchars($category_title); ?>">
                            
                            <input type="hidden" id="subcategory"
                                value="<?php echo htmlspecialchars($subcategory_id); ?>">
                            <!-- category details -->
                            <div class="mb-3">
                                <label for="category"
                                    class="font-bold font-navbar">Category</label>
                                <input type="text"
                                    cid="<?php echo htmlspecialchars($category_id); ?>"
                                    value="<?php echo htmlspecialchars($category_title); ?>"
                                    class="w-full px-3 py-3 border-b-2 border-indigo-300 bg-gray-200 uppercase text-xs font-bold shadow-md" disabled />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- sub category details -->
                            <div class="mb-3">
                                <label for="subcategory"
                                    class="font-bold font-navbar">Sub-Category</label>
                                <input type="text"
                                    sid="<?php echo htmlspecialchars($subcategory_id); ?>"
                                    value="<?php echo htmlspecialchars($subcategory_title); ?>"
                                    class="w-full px-3 py-3 border-b-2 border-indigo-300 bg-gray-200 uppercase text-xs font-bold shadow-md" disabled />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- sub types -->
                <div class="col-md-7">
                    <div class="row d-flex justify-center">
                        <?php if($subTypes): ?>
                            <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12 mb-3">
                                <button type="button" data-toggle="modal" data-target="#addSubTypeModal"
                                class="btn btn-md bg-indigo-500 white-text tracking-wide text-lg font-bold">
                                    Add New Sub-Type
                                </button>
                            </div>
                            
                            <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12 mb-3">
                                <table class="table table-sm table-striped" id="subTypeTable">
                                    <thead>
                                        <tr>
                                            <th>Sub Type Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($subTypes as $subType):?>
                                            <tr class="border-b" id="subtype-<?php echo htmlspecialchars($subType['id']); ?>">
                                                <td class="pl-3 cursor-pointer">
                                                    <span class="font-bold tracking-wide black-text"
                                                        sid="<?php echo htmlspecialchars($subType['id']); ?>">
                                                        <?php echo htmlspecialchars($subType['subtype_title']); ?>
                                                    </span>
                                                </td>

                                                <td class="text-center">
                                                    <a href="" class="pr-2 outline-none red-text deleteSubType" 
                                                    sid="<?php echo htmlspecialchars($subType['id']); ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12 mb-3">
                                <div class="bg-indigo-200 border-l-4 border-indigo-500 shadow-md p-3">
                                    <p class="font-bold text-indigo-700">
                                        There are no Sub Types to this category of products.
                                    </p>

                                    <button type="button" data-toggle="modal" data-target="#addSubTypeModal"
                                    class="btn btn-md bg-indigo-500 white-text tracking-wide text-lg font-bold">
                                        Add New Sub-Type
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- back app footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>