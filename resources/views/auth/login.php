<!-- app header -->
<?php require '../templates/front-layout/app.header.php'; ?>

<!-- title -->
<title>Khan Store &bull; Login</title>

<div class="container mt-20">
    <div class="row d-flex justify-content-center align-items-center flex-center">
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
            <div class="p-3">
                <div class="text-center border-b-2 border-indigo-600 mb-2 py-3">
                    <h4 class="text-2xl uppercase font-bold">
                        Sign
                        <span class="indigo-text">In</span>
                    </h4>
                </div>

                <?php include '../includes/messages.php'; ?>

                <form id="login-form" class="px-4 py-4">
                    <div class="mb-3">
                        <label for="login-email" class="uppercase font-bold text-xs text-gray-900">E-Mail Address</label>
                        <input type="email" placeholder="e.g. name@mydomain.com" name="login-email" id="login-email" class="w-full px-3 py-3 rounded shadow-sm text-gray-800 outline-none transition duration-500 ease-in-out hover:bg-indigo-200 focus:shadow-md focus:bg-indigo-300">
                        <p class="red-text font-semibold font-small email-help"></p>
                    </div>

                    <div class="mb-3">
                        <label for="login-password" class="uppercase font-bold text-xs text-gray-900">Password</label>
                        <input type="password" name="login-password" id="login-password" class="w-full px-3 py-3 rounded shadow-sm text-gray-800 outline-none transition duration-500 ease-in-out hover:bg-indigo-200 focus:shadow-md focus:bg-indigo-300">
                        <p class="red-text font-semibold font-small pwd-help"></p>
                    </div>

                    <div class="mb-3 d-flex justify-between">
                        <div class="">
                            <input type="checkbox" name="remember-me" id="remember-me" class="cursor-pointer rounded-0">
                            <label for="remember-me" class="font-bold text-sm text-gray-900 cursor-pointer ">Remeber Me</label>
                        </div>

                        <button class="btn btn-md indigo accent-2 white-text tracking-wide" id="login-button">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- app footer -->
<?php require '../templates/front-layout/app.footer.php'; ?>