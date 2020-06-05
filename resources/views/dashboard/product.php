<?php



#start session
session_start();
if(!isset($_SESSION['id'])){

    header('Location: ../auth/login.php');
    exit();

}

?>

<!-- app header -->
<?php require '../templates/front-layout/app.header.php'; ?>

<!-- title -->
<title>Khan Store &bull; Product </title>

<div class="container mt-20">
    <!-- product section -->
    <section class="mb-5 pt-3">
        <div class="row d-flex justify-content-center p-3">
            <!-- col img -->
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-4">
                <div class="view overlay zoom z-depth-1 cursor-pointer rounded mb-3">
                    <a href="../../../public/img/products/6a.jpg" class="test-popup-link">
                        <img src="../../../public/img/products/6a.jpg" class="img-fluid" alt="">
                    </a>
                    <!-- <div class="mask waves-effect waves-light"></div> -->
                </div>
                <div class="row">
                    <div class="col-3">
                      <div class="view overlay rounded z-depth-1 gallery-item hoverable">
                        <a href="../../../public/img/products/6e.jpg" class="test-popup-link">
                            <img src="../../../public/img/products/6e.jpg" class="img-fluid" alt="">
                        </a>
                      </div>
                    </div>

                    <div class="col-3">
                      <div class="view overlay rounded z-depth-1 gallery-item hoverable">
                        <a href="../../../public/img/products/6b.jpg" class="test-popup-link">
                            <img src="../../../public/img/products/6b.jpg" class="img-fluid" alt="">
                        </a>
                      </div>
                    </div>

                    <div class="col-3">
                      <div class="view overlay rounded z-depth-1 gallery-item hoverable">
                        <a href="../../../public/img/products/6c.jpg" class="test-popup-link">
                            <img src="../../../public/img/products/6c.jpg" class="img-fluid" alt="">
                        </a>
                      </div>
                    </div>

                    <div class="col-3">
                      <div class="view overlay rounded z-depth-1 gallery-item hoverable">
                        <a href="../../../public/img/products/6d.jpg" class="test-popup-link">
                            <img src="../../../public/img/products/6d.jpg" class="img-fluid" alt="">
                        </a>
                      </div>
                    </div>
                </div>
            </div>

            <!-- col des -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
                <h5 class="text-xl black-text font-bold mb-2">Blue denim shirt</h5>

                <p class="mb-2 text-muted text-uppercase small">Shirts</p>

                <span id="rateMe1" class="indigo-text empty-stars"></span>

                <p class="font-bold mt-2">
                    <span class="mr-1">Ksh 3,500</span>
                </p>

                <p class="pt-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente illo. Sit
                    error voluptas repellat rerum quidem, soluta enim perferendis voluptates laboriosam. Distinctio,
                    officia quis dolore quos sapiente tempore alias.
                </p>

                <div class="table-responsive mb-2">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                        <tr>
                            <th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
                            <td>Jacket</td>
                        </tr>
                        <tr>
                            <th class="pl-0 w-25" scope="row"><strong>Color</strong></th>
                            <td>Yellow</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="table-responsive mb-2">
                    <table class="table table-sm table-borderless">
                        <tbody>
                        <tr>
                            <td class="pl-0 pb-0 w-25">Quantity</td>
                            <td class="pb-0">Select size</td>
                        </tr>
                        <tr>
                            <td class="pl-0">
                                <div class="def-number-input number-input safari_only mb-0">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                    <input class="quantity p-2 shadow-sm outline-none font-bold" min="0" name="quantity" value="1" type="number">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                </div>
                            </td>
                            <td>
                            <div class="mt-1">
                                <div class="form-check form-check-inline pl-0">
                                    <input type="radio" class="form-check-input" id="small" name="materialExampleRadios" checked="">
                                    <label class="form-check-label small text-uppercase card-link-secondary" for="small">Small</label>
                                </div>
                                
                                <div class="form-check form-check-inline pl-0">
                                    <input type="radio" class="form-check-input" id="medium" name="materialExampleRadios">
                                    <label class="form-check-label small text-uppercase card-link-secondary" for="medium">Medium</label>
                                </div>

                                <div class="form-check form-check-inline pl-0">
                                    <input type="radio" class="form-check-input" id="large" name="materialExampleRadios">
                                    <label class="form-check-label small text-uppercase card-link-secondary" for="large">Large</label>
                                </div>
                            </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <button type="button" class="btn btn-indigo btn-md mr-1 mb-2 waves-effect waves-light">
                    Buy now
                </button>

                <button type="button" class="btn btn-light btn-md mr-1 mb-2 waves-effect waves-light">
                    <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                </button>
            </div>
        </div>
    </section>
</div>

<!-- app footer -->
<?php require '../templates/front-layout/app.footer.php'; ?>