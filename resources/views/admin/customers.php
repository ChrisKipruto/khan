<!-- admin header -->
<?php require "../templates/back-layout/back.header.php"; ?>

<?php

    # connect to DB
    require '../../config/connect.php';

    /**
     * Get customers
    */

        # fetch customers from table
        $sql = "SELECT * FROM `customers`";

        # store result of fetch
        $result = mysqli_query($conn, $sql);

        # fetch the result into an array
        $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);

        # init customers array
        $customers_array = array();

    /** end customers ********************************************* end customers  */

?>

<title>Khan Store &bullet; Custoners</title>

<div class="container-fluid">
    <div class="row d-flex justify-center mt-3">
        <!-- check if customers are there -->
        <?php if(!$customers): ?>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 mb-3">
                <div class="bg-indigo-100 border-l-4 border-indigo-500 z-depth-1 p-3">
                    <p class="lead font-bold text-center text-indigo-700">
                        There are no customers registered yet!
                    </p>
                </div>
            </div>
        <?php else: ?>
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mb-3">
                <div class="table-responsive-md table-responsive-sm">
                    <table id="customersTable" class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="px-3">Full Name</th>
                                <th>E-Mail Address</th>
                                <th>Phone Number</th>
                                <th>Register Date</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody class="">
                            <?php foreach($customers as $customer): ?>
                                <tr class=" shadow-sm">
                                    <td class="px-3"> <?php echo htmlspecialchars($customer['fullname']); ?> </td>
                                    <td> <?php echo htmlspecialchars($customer['email']); ?> </td>
                                    <td> <?php echo htmlspecialchars($customer['phone_number']); ?> </td>
                                    <td> <?php echo htmlspecialchars($customer['created_at']); ?> </td>
                                    <td> <?php echo htmlspecialchars($customer['updated_at']); ?> </td>
                                    <td>
                                        <a href="customer?id=<?php echo htmlspecialchars($customer['id']); ?>"
                                            class="light-blue-text"
                                            title="Customer Info">
                                            <i class="fas fa-info pr-2"></i>
                                        </a>

                                        <a href="editCustomer?id=<?php echo htmlspecialchars($customer['id']); ?>"
                                            class="red-text"
                                            title="Delete Customer">
                                            <i class="fas fa-trash pr-2"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- admin footer -->
<?php require "../templates/back-layout/back.footer.php"; ?>