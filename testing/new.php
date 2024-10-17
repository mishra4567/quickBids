<?php
require_once("../database/db.php");
require("./inc/language.php");
require("./inc/functions.php");
// $selectManageSql = mysqli_query($con, "SELECT * FROM pb_dash_manage WHERE status='1' AND role='1'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../src/css/input.css">
    <link rel="stylesheet" href="../src/css/style.css">
</head>

<body>
    <section class="bg-[#f8f4f3]">
        <!-- <div class="flex justify-center p-2 border-b-4 border-r-gray-400 md:pb-4">
            <form method="post">
                <label for="">Select language</label>
                <select name="language" onchange="this.form.submit()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg">
                    <option value="english" <?php echo $language == 'english' ? 'selected' : ''; ?>>English</option>
                    <option value="hindi" <?php echo $language == 'hindi' ? 'selected' : ''; ?>>हिंदी</option>
                    <option value="bangla" <?php echo $language == 'bangla' ? 'selected' : ''; ?>>বাংলা</option>
                </select>
            </form>
        </div> -->
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:mt-4 lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <h2 class="font-bold text-3xl text-gray-400">QUICK <span class="bg-[#f84525] text-white px-2 rounded-md">BIDS</span></h2>
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        <?php echo $translations[$language]['create_account']; ?>
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="post">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <?php echo $translations[$language]['your_name']; ?>
                            </label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your name" required="">
                            <span class="field_error" id="name_error"></span>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <?php echo $translations[$language]['your_email']; ?>
                            </label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                            <span class="field_error" id="email_error"></span>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <?php echo $translations[$language]['password']; ?>
                            </label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            <span class="field_error" id="password_error"></span>
                        </div>
                        <div>
                            <label for="manage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <?php echo $translations[$language]['manage']; ?>
                            </label>
                            <select name="manage" id="manage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value=""><?php echo $translations[$language]['manage']; ?></option>
                                <?php while ($row = mysqli_fetch_assoc($selectManageSql)) {
                                    echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                } ?>
                            </select>
                            <span class="field_error" id="manage_error"></span>
                        </div>
                        <div>
                            <label for="terms" class="font-light text-gray-500 dark:text-gray-300">
                                <?php echo $translations[$language]['accept_the']; ?>
                                <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                                    <?php echo $translations[$language]['terms_conditions']; ?>
                                </a>
                            </label>
                            <input type="checkbox" id="terms" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <?php echo $translations[$language]['create_account']; ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <script src="../src/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="./js/admin.js"></script>
</body>

</html>