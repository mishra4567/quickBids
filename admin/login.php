<?php
require_once("../database/db.php");
require("./inc/language.php");
require("./inc/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>quickBids Login</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/vendor/font-awesome-6/css/all.min.css">
    <link rel="stylesheet" href="../src/vendor/font-awesome-6/css/fontawesome.min.css">
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen   bg-[#f8f4f3]">
            <div class="flex justify-center p-2 border-b-4 border-r-gray-400">
                <form method="post">
                    <label for="">Select language</label>
                    <select name="language" onchange="this.form.submit()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg">
                        <option value="english" <?php echo $language == 'english' ? 'selected' : ''; ?>>English</option>
                        <option value="hindi" <?php echo $language == 'hindi' ? 'selected' : ''; ?>>हिंदी</option>
                        <option value="bangla" <?php echo $language == 'bangla' ? 'selected' : ''; ?>>বাংলা</option>
                    </select>
                </form>
            </div>
            <div class="flex flex-col sm:justify-center items-center mt-6 pt-6 sm:pt-0">
                <div>
                    <a href="#">
                        <h2 class="font-bold text-3xl">QUICK <span class="bg-[#f84525] text-white px-2 rounded-md">BIDS</span></h2>
                    </a>
                </div>
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <form>
                        <div class="py-8">
                            <div class="text-center">
                                <span class="text-2xl font-semibold">
                                    <!-- Log In -->
                                    <?php echo $translations[$language]['login']; ?>
                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="email" value="Email" />
                            <input type='email'
                                name='email'
                                placeholder='Email'
                                id="login_email"
                                class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]" />
                            <span class="field_error" id="login_email_error"></span>
                        </div>
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700" for="password" value="Password" />
                            <div class="relative">
                                <input id="login_password" type="password" name="password" placeholder="Password" required autocomplete="current-password" class='w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]'>
                                <span class="field_error" id="login_password_error"></span>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                    <button type="button" id="togglePassword" class="text-gray-500 focus:outline-none focus:text-gray-600 hover:text-gray-600">
                                        <i class="fa-solid fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="login_msg">
                                <p class="field_error"></p>
                            </div>
                        </div>
                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <input type="checkbox" id="remember_me" name="remember" class='rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500'>
                                <span class="ms-2 text-sm text-gray-600">
                                    <!-- Remember Me -->
                                    <?php echo $translations[$language]['remember_me']; ?>
                                </span>
                            </label>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a class="hover:underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                <!-- Forgot your password? -->
                                <?php echo $translations[$language]['forgot_password'] ?>
                            </a>
                            <a onclick="admin_login()" class='ms-4 inline-flex items-center px-4 py-2 bg-[#f84525] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                                <!-- Sign In -->
                                <?php echo $translations[$language]['sign_in'] ?>
                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../src/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="./js/admin.js"></script>
    <script>
        const passwordInput = document.getElementById('login_password');
        const togglePasswordButton = document.getElementById('togglePassword');

        togglePasswordButton.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        });
    </script>
</body>

</html>