<!-- app header -->
<?php require '../templates/front-layout/app.header.php'; ?>

<!-- title -->
<title>Khan Store &bull; Contact Us</title>

<div class="container mt-20">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3 mt-4" id="pageTitle">
            <h4 class="text-gray-900 text-center text-2xl font-bold uppercase">
                Contact 
                <span class="red-text">Us</span>
            </h4>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-3" id="pageTitle">
            <p class="text-center font-small">
                Send us your request using the online form opposite and we will get back to you within 2 working days.
            </p>
        </div>
    </div>

    <div class="row px-3 py-3">
        <!-- customer info -->
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-4">
            <!-- name -->
            <div class="mb-3">
                <label for="contact-name">Your Name <sup class="red-text fa-lg">*</sup></label>
                <input type="text" name="contact-name" id="contact-name" class="w-full px-3 py-3 shadow-sm rounded transition ease-in-out duration-500 focus:outline-none focus:bg-red-200">
            </div>

            <!-- email -->
            <div class="mb-3">
                <label for="contact-email">Your Email Address <sup class="red-text fa-lg">*</sup></label>
                <input type="email" name="contact-email" id="contact-email" class="w-full px-3 py-3 shadow-sm rounded transition ease-in-out duration-500 focus:outline-none focus:bg-red-200">
            </div>
        </div>

        <!-- customer msg -->
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-4">
            <!-- order number -->
            <div class="mb-3">
                <label for="contact-order-no">Your Order Number <sup class="red-text fa-lg">*</sup></label>
                <input type="text" name="contact-order-no" id="contact-order-no" class="w-full px-3 py-3 shadow-sm rounded transition ease-in-out duration-500 focus:outline-none focus:bg-red-200">
            </div>

            <!-- msg -->
            <div class="mb-3">
                <label for="contact-order-no">Message <sup class="red-text fa-lg">*</sup></label>
                <textarea name="contact-msg" id="contact-msg" placeholder="Give full details of your contact reason" class="w-full px-3 py-3 shadow-sm rounded transition ease-in-out duration-500 focus:outline-none focus:bg-red-200">

                </textarea>
            </div>

            <button class="btn btn-block btn-danger tracking-wide">
                submit
            </button>
        </div>
    </div>
</div>

<!-- app footer -->
<?php require '../templates/front-layout/app.footer.php'; ?>