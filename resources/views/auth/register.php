<!-- app header -->
<?php require '../templates/front-layout/app.header.php'; ?>

<!-- title -->
<title>Khan Store &bull; Registration</title>

<div class="container mt-20">
    <div class="row d-flex justify-content-center align-items-center flex-center">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
            <div class="p-3">
                <div class="text-center border-b-2 border-red-600 mb-2 py-3">
                    <h4 class="text-2xl uppercase font-bold">
                        Sign
                        <span class="red-text">Up</span>
                    </h4>
                </div>

                <form action="" id="register-form" class="px-4 py-4">
                    <div class="row d-flex justify-between">
                        <div class="col-xl-5">
                            <div class="mb-3">
                                <label for="name" class="uppercase font-bold text-xs text-gray-900">Name</label>
                                <input type="text" name="name" id="name" class="w-full px-3 py-3 rounded shadow-sm text-gray-900 outline-none transition duration-500 ease-in-out hover:bg-red-200 focus:bg-red-300">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="uppercase font-bold text-xs text-gray-900">E-Mail Address</label>
                                <input type="email" name="email" id="email" placeholder="e.g name@mydomain.com" class="w-full px-3 py-3 rounded shadow-sm text-gray-900 outline-none transition duration-500 ease-in-out hover:bg-red-200 focus:bg-red-300">
                            </div>
                        </div>

                        <div class="col-xl-5">
                            <div class="mb-3">
                                <label for="password" class="uppercase font-bold text-xs text-gray-900">Password</label>
                                <input type="password" name="password" id="password" class="w-full px-3 py-3 rounded shadow-sm text-gray-900 outline-none transition duration-500 ease-in-out hover:bg-red-200 focus:bg-red-300">
                            </div>

                            <div class="mb-3">
                                <label for="confirm-password" class="uppercase font-bold text-xs text-gray-900">Confirm Password</label>
                                <input type="password" name="confirm-password" id="confirm-password" class="w-full px-3 py-3 rounded shadow-sm text-gray-900 outline-none transition duration-500 ease-in-out hover:bg-red-200 focus:bg-red-300">
                            </div>

                            <div class="mb-3">
                                <div class="terms">
                                    <label for="terms-conditions" class="font-bold text-xs text-gray-900 cursor-pointer ">
                                        <input type="checkbox" name="terms-conditions" id="terms-conditions" class="cursor-pointer">
                                        Accept
                                        <a href="" class="font-bold red-text">Terms and Conditions</a>
                                    </label>
                                </div>

                                <button class="btn btn-md red accent-2 white-text tracking-widest font-bold">
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