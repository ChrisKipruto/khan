<!-- app header -->
<?php require '../templates/front-layout/app.header.php'; ?>

<!-- title -->
<title>Khan Store &bull; Login</title>

<div class="container mt-20">
    <div class="row d-flex justify-content-center align-items-center flex-center">
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
            <div class="p-3">
                <div class="text-center border-b-2 border-red-600 mb-2 py-3">
                    <h4 class="text-2xl uppercase font-bold">
                        Sign
                        <span class="red-text">In</span>
                    </h4>
                </div>

                <div class="danger-msg bg-red-200 border-l-4 border-red-500 text-gray-900 shadow-md relative px-4 py-3" role="alert">
                    <p class="font-small font-semibold pr-2"></p>
                    <span class="absolute right-0 top-0 bottom-0 px-4 py-3 cursor-pointer">
                        <i class="fas fa-times text-red-400 hover:text-red-800 close"></i>
                    </span>
                </div>

                <div class="warning-msg bg-orange-200 border-l-4 border-orange-500 text-gray-900 shadow-md relative px-4 py-3" role="alert">
                    <p class="font-small font-semibold pr-2"></p>
                    <span class="absolute right-0 top-0 bottom-0 px-4 py-3 cursor-pointer">
                        <i class="fas fa-times text-orange-400 hover:text-orange-800 close "></i>
                    </span>
                </div>

                <div class="success-msg bg-green-200 border-l-4 border-green-500 text-gray-900 shadow-md relative px-4 py-3" role="alert">
                    <p class="font-small font-semibold pr-2"></p>
                    <span class="absolute right-0 top-0 bottom-0 px-4 py-3 cursor-pointer">
                        <i class="fas fa-times text-green-400 hover:text-green-800 close"></i>
                    </span>
                </div>

                <form action="" id="login-form" class="px-4 py-4">
                    <div class="mb-3">
                        <label for="login-email" class="uppercase font-bold text-xs text-gray-900">E-Mail Address</label>
                        <input type="email" name="login-email" id="login-email" class="w-full px-3 py-3 rounded shadow-sm text-gray-800 outline-none transition duration-500 ease-in-out hover:bg-red-200 focus:shadow-md focus:bg-red-300">
                    </div>

                    <div class="mb-3">
                        <label for="login-password" class="uppercase font-bold text-xs text-gray-900">Password</label>
                        <input type="password" name="login-password" id="login-password" class="w-full px-3 py-3 rounded shadow-sm text-gray-800 outline-none transition duration-500 ease-in-out hover:bg-red-200 focus:shadow-md focus:bg-red-300">
                    </div>

                    <div class="mb-3 d-flex justify-between">
                        <div class="">
                            <input type="checkbox" name="remember-me" id="remember-me" class="cursor-pointer rounded-0">
                            <label for="remember-me" class="font-bold text-sm text-gray-900 cursor-pointer ">Remeber Me</label>
                        </div>

                        <button class="btn btn-md red accent-2 white-text tracking-wide">
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