<!-- app header -->
<?php require '../templates/front-layout/app.header.php'; ?>

<!-- title -->
<title>Khan Store &bull; Registration</title>

<div class="container mt-20">
    <div class="row d-flex justify-content-center align-items-center flex-center">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
            <div class="p-3">
                <div class="text-center border-b-2 border-indigo-600 mb-2 py-3">
                    <h4 class="text-2xl uppercase font-bold">
                        Sign
                        <span class="indigo-text">Up</span>
                    </h4>
                </div>

                <?php include '../includes/messages.php'; ?>

                <form action="" id="register-form" class="px-4 py-4">
                    <div class="row d-flex justify-between">
                        <div class="col-xl-5">
                            <div class="mb-3">
                                <label for="name" class="uppercase font-bold text-xs text-gray-900">Name</label>
                                <input type="text" name="reg-name" id="reg-name" class="w-full px-3 py-3 rounded shadow-sm text-gray-900 outline-none transition duration-500 ease-in-out hover:bg-indigo-200 focus:bg-indigo-300">
                                <p class="red-text font-semibold font-small name-help"></p>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="uppercase font-bold text-xs text-gray-900">E-Mail Address</label>
                                <input type="email" name="reg-email" id="reg-email" placeholder="e.g name@mydomain.com" class="w-full px-3 py-3 rounded shadow-sm text-gray-900 outline-none transition duration-500 ease-in-out hover:bg-indigo-200 focus:shadow-md focus:bg-indigo-300">
                                <p class="red-text font-semibold font-small email-help"></p>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="uppercase font-bold text-xs text-gray-900">Phone Number</label>
                                <input type="text" name="reg-phone" id="reg-phone" placeholder="e.g 0720XXXXXX" class="w-full px-3 py-3 rounded shadow-sm text-gray-900 outline-none transition duration-500 ease-in-out hover:bg-indigo-200 focus:shadow-md focus:bg-indigo-300">
                                <p class="red-text font-semibold font-small phone-help"></p>
                            </div>
                        </div>

                        <div class="col-xl-5">
                            <div class="mb-3">
                                <label for="password" class="uppercase font-bold text-xs text-gray-900">Password</label>
                                <input type="password" name="reg-password" id="reg-password" class="w-full px-3 py-3 rounded shadow-sm text-gray-900 outline-none transition duration-500 ease-in-out hover:bg-indigo-200 focus:shadow-md focus:bg-indigo-300">
                                <p class="red-text font-semibold font-small pwd-help"></p>
                            </div>

                            <div class="mb-3">
                                <label for="confirm-password" class="uppercase font-bold text-xs text-gray-900">Confirm Password</label>
                                <input type="password" name="confirm-password" id="confirm-password" class="w-full px-3 py-3 rounded shadow-sm text-gray-900 outline-none transition duration-500 ease-in-out hover:bg-indigo-200 focus:shadow-md focus:bg-indigo-300">
                                <p class="red-text font-semibold font-small confirm-help"></p>
                            </div>

                            <div class="mb-3">
                                <div class="terms">
                                    <label for="terms-conditions" class="font-bold text-xs text-gray-900 cursor-pointer ">
                                        <input type="checkbox" name="terms-conditions" id="terms-conditions" class="cursor-pointer">
                                        Accept
                                        <a href="" class="font-bold indigo-text">Terms and Conditions</a>
                                    </label>
                                </div>
 
                                <button class="btn btn-md indigo accent-2 white-text tracking-widest font-bold" id="register-button">
                                    Register
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- app footer -->
<?php require '../templates/front-layout/app.footer.php'; ?>