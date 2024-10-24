<?php
require_once("./inc/db.php");
require("./inc/language.php");
require("./inc/functions.php");
// $selectManageSql = mysqli_query($con, "SELECT * FROM pb_dash_manage WHERE status='1' AND role='1'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUICK BIDS Register</title>
    <link rel="stylesheet" href="../src/css/input.css">
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/vendor/font-awesome-6/css/all.min.css">
    <link rel="stylesheet" href="../src/vendor/font-awesome-6/css/fontawesome.min.css">
    <link rel="stylesheet" href="../src/vendor/mdi-font/css/material-design-iconic-font.min.css">
</head>

<body>
    <!-- Language Switcher -->
    <div class="flex justify-center p-2 border-b-4 border-r-gray-400 md:pb-1">
        <form method="post">
            <label for="">Select language</label>
            <select name="language" onchange="this.form.submit()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg">
                <option value="english" <?php echo $language == 'english' ? 'selected' : ''; ?>>English</option>
                <option value="hindi" <?php echo $language == 'hindi' ? 'selected' : ''; ?>>हिंदी</option>
                <option value="bangla" <?php echo $language == 'bangla' ? 'selected' : ''; ?>>বাংলা</option>
            </select>
        </form>
    </div>
    <div class="font-[sans-serif] bg-[#f8f4f3] flex items-center md:h-screen p-4">
        <div class="w-full max-w-4xl max-md:max-w-xl mx-auto">
            <div class="bg-white grid md:grid-cols-2 gap-16 w-full sm:p-8 p-6 shadow-md rounded-md overflow-hidden">
                <div class="max-md:order-1 space-y-6">
                    <div class="md:mb-16 mb-8">
                        <h3 class="text-gray-800 text-2xl font-bold"><?php echo $translations[$language]['instant'] ?>&nbsp;<?php echo $translations[$language]['access'] ?></h3>
                    </div>

                    <div class="space-y-6">
                        <button type="button"
                            class="w-full px-5 py-2.5 flex items-center justify-center rounded-md text-white text-base tracking-wider font-semibold border-none outline-none bg-blue-600 hover:bg-blue-700">
                            <div class="inline shrink-0 mr-4">
                                <i class="fa-brands fa-facebook"></i>
                            </div>
                            <?php echo $translations[$language]['continue'] ?>&nbsp;<?php echo $translations[$language]['with'] ?> Facebook
                        </button>
                        <button type="button"
                            class="w-full px-5 py-2.5 flex items-center justify-center rounded-md text-gray-800 text-base tracking-wider font-semibold border-none outline-none bg-gray-100 hover:bg-gray-200">
                            <div class="inline shrink-0 mr-4">
                                <i class="fa-brands fa-google"></i>
                            </div>
                            <?php echo $translations[$language]['continue'] ?>&nbsp;<?php echo $translations[$language]['with'] ?> Google
                        </button>
                        <button type="button"
                            class="w-full px-5 py-2.5 flex items-center justify-center rounded-md text-white text-base tracking-wider font-semibold border-none outline-none bg-black hover:bg-[#333]">
                            <div class="inline shrink-0 mr-4">
                                <i class="fa-brands fa-apple"></i>
                            </div>
                            <?php echo $translations[$language]['continue'] ?>&nbsp;<?php echo $translations[$language]['with'] ?> Apple
                        </button>
                    </div>
                </div>

                <form class="w-full">
                    <div class="mb-8">
                        <h3 class="text-gray-800 text-2xl font-bold"><?php echo $translations[$language]['register'] ?></h3>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block"><?php echo $translations[$language]['your_name'] ?></label>
                            <div class="relative flex items-center">
                                <input name="name" type="text" required id="name" class="bg-white border border-gray-300 w-full text-sm text-gray-800 pl-4 pr-10 py-2.5 rounded-md outline-blue-500" placeholder="Enter name" />
                                <i class="fa-solid fa-user-pen w-4 h-4 absolute right-4"></i>
                            </div>
                            <span class="field_error" id="name_error"></span>
                        </div>
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block"><?php echo $translations[$language]['your_email'] ?></label>
                            <div class="relative flex items-center">
                                <input name="email" type="email" required id="email" class="bg-white border border-gray-300 w-full text-sm text-gray-800 pl-4 pr-10 py-2.5 rounded-md outline-blue-500" placeholder="Enter email" />
                                <i class="fa-regular fa-envelope w-4 h-4 absolute right-4"></i>
                            </div>
                            <span class="field_error" id="email_error"></span>
                        </div>
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block"><?php echo $translations[$language]['password'] ?></label>
                            <div class="relative flex items-center">
                                <input name="password" type="password" required id="password" class="bg-white border border-gray-300 w-full text-sm text-gray-800 pl-4 pr-10 py-2.5 rounded-md outline-blue-500" placeholder="Enter password" />
                                <i class="fa-regular fa-eye-slash w-4 h-4 absolute right-4 cursor-pointer"></i>
                            </div>
                            <span class="field_error" id="password_error"></span>
                        </div>
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded-md" />
                            <label for="remember-me" class="text-gray-800 ml-3 block text-sm">
                                <?php echo $translations[$language]['accept_the'] ?> <a href="javascript:void(0);" class="text-blue-600 font-semibold hover:underline ml-1"><?php echo $translations[$language]['terms_conditions'] ?></a>
                            </label>
                        </div>
                    </div>

                    <div class="!mt-8">
                        <button type="button" onclick="admin_register()" class="w-full py-2.5 px-4 text-sm tracking-wider font-semibold rounded-md bg-blue-600 hover:bg-blue-700 text-white focus:outline-none">
                            <?php echo $translations[$language]['create_account'] ?>
                        </button>
                    </div>
                    <p class="text-gray-800 text-sm mt-6 text-center"><?php echo $translations[$language]['already_have_account'] ?> <a href="./login.php" class="text-blue-600 font-semibold hover:underline ml-1"><?php echo $translations[$language]['login_here'] ?></a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="../src/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="./js/admin.js"></script>
</body>

</html>