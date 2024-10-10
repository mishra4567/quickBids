<?php
require_once("../database/db.php");
require_once("./inc/functions.php");
if (isset($_SESSION['QBADMIN_LOGIN']) && $_SESSION['QBADMIN_LOGIN'] != '') {
} else {
    header('location:./login.php');
}
$current_page = basename($_SERVER['PHP_SELF']);
$menege_page = pathinfo($current_page, PATHINFO_FILENAME);
echo $menege_page;
$isTable = $_SESSION['QBADMIN_MENEGE'] == 'table' || $_SESSION['QBADMIN_USERNAME'] == 'admin';
$isUIElements = $_SESSION['QBADMIN_MENEGE'] == 'uiEliments' || $_SESSION['QBADMIN_USERNAME'] == 'admin';
$isforms=$_SESSION['QBADMIN_MENEGE'] == 'forms' || $_SESSION['QBADMIN_USERNAME'] == 'admin';
$isIcons=$_SESSION['QBADMIN_MENEGE'] == 'icons' || $_SESSION['QBADMIN_USERNAME'] == 'admin';
echo $_SESSION['QBADMIN_MENEGE'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <link href="https://cdn.tailwindcss.com" rel="stylesheet"> -->
    <title>quickBids</title>
    <link rel="stylesheet" href="../src/vendor/font-awesome-4.7/css/font-awesome.min.css">
    <link rel="stylesheet" href="../src/vendor/font-awesome-6/css/all.min.css">
    <link rel="stylesheet" href="../src/vendor/font-awesome-6/css/fontawesome.min.css">
    <link rel="stylesheet" href="../src/vendor/mdi-font/css/material-design-iconic-font.min.css">
    <script src="../src/vendor/jsdelivr/alpine.min.js"></script>
    <link rel="stylesheet" href="../src/css/admin.css" />
    <link rel="stylesheet" href="../src/css/style.css">
</head>

<body class="h-screen overflow-hidden" style="background: #edf2f7">
    <div>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div
                :class="sidebarOpen ? 'block' : 'hidden'"
                @click="sidebarOpen = false"
                class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
            <div
                :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
                class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-8">
                    <div class="flex items-center">
                        <svg
                            class="w-12 h-12"
                            viewBox="0 0 512 512"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z"
                                fill="#4C51BF"
                                stroke="#4C51BF"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z"
                                fill="white"></path>
                        </svg>

                        <span class="mx-2 text-2xl font-semibold text-white">Dashboard</span>
                    </div>
                </div>

                <nav class="mt-10">
                    <a
                        class="flex items-center px-6 py-2 mt-4 text-gray-400 hover:text-gray-100 <?php echo ($current_page == 'index.php') ? 'adminActive' : ''; ?>"
                        href="./index.php">
                        <i class="fas fa-house-chimney-user "></i>
                        <span class="mx-3">Dashboard</span>
                    </a>
                    <?php
                    if ($isTable) {
                    ?>
                        <a
                            class="flex items-center px-6 py-2 mt-4 text-gray-400 hover:text-gray-100 <?php echo ($current_page == 'table.php') ? 'adminActive' : ''; ?> "
                            href="./table.php">
                            <i class=" zmdi zmdi-menu"></i>
                            <span class="mx-3">Tables</span>
                        </a>
                    <?php }
                    if ($isUIElements) {
                    ?>
                        <a
                            class="flex items-center px-6 py-2 mt-4 text-gray-400 hover:text-gray-100 <?php echo ($current_page == 'uiEliments.php') ? 'adminActive' : ''; ?> "
                            href="./uiEliments.php">
                            <i class="zmdi zmdi-collection-folder-image"></i>
                            <span class="mx-3">UI Elements</span>
                        </a>
                    <?php  }
                    if ($isforms) {
                    ?>
                        <a
                            class="flex items-center px-6 py-2 mt-4 text-gray-400 hover:text-gray-100 <?php echo ($current_page == 'forms.php') ? 'adminActive' : ''; ?>"
                            href="./forms.php">
                            <i class="fa fa-edit"></i>
                            <span class="mx-3">Forms</span>
                        </a>
                    <?php  }
                    /**
                    Later enter the Icons in manage table
                     */
                    if ($isIcons) {
                    ?>
                        <a
                            class="flex items-center px-6 py-2 mt-4 text-gray-400 hover:text-gray-100 <?php echo ($current_page == 'icons.php') ? 'adminActive' : ''; ?>"
                            href="./icons.php">
                            <i class="fa-solid fa-code"></i>
                            <span class="mx-3">Icons</span>
                        </a>
                    <?php  }
                    /**
                    Later enter the Icons in manage table
                     */
                    if ($isTable) {
                    ?>
                        <a
                            class="flex items-center px-6 py-2 mt-4 text-gray-400 hover:text-gray-100"
                            href="./login.php">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            <span class="mx-3">Login</span>
                        </a>
                    <?php  }
                    /**
                    Later enter the Icons in manage table
                     */ ?>
                    
                    <a
                        class="flex items-center px-6 py-2 mt-4 text-gray-400 hover:text-gray-100"
                        href="./ragister.php">
                        <i class="fa-regular fa-registered"></i>
                        <span class="mx-3">Register</span>
                    </a>
                </nav>
            </div>
            <div class="flex flex-col flex-1 overflow-hidden">
                <header
                    class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-indigo-600">
                    <div class="flex items-center">
                        <button
                            @click="sidebarOpen = true"
                            class="text-gray-500 focus:outline-none lg:hidden">
                            <i class=" zmdi zmdi-menu"></i>
                        </button>

                        <div class="relative mx-4 lg:mx-0">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="fas fa-search"></i>
                            </span>

                            <input
                                class="w-32 pl-10 pr-4 rounded-md form-input sm:w-64 focus:border-indigo-600"
                                type="text"
                                placeholder="Search" />
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div x-data="{ notificationOpen: false }" class="relative">
                            <button
                                @click="notificationOpen = ! notificationOpen"
                                class="flex mx-4 text-gray-600 focus:outline-none">
                                <i class="fa-solid fa-bell"></i>
                            </button>

                            <div
                                x-show="notificationOpen"
                                @click="notificationOpen = false"
                                class="fixed inset-0 z-10 w-full h-full"
                                style="display: none"></div>

                            <div
                                x-show="notificationOpen"
                                class="absolute right-0 z-10 mt-2 overflow-hidden bg-white rounded-lg shadow-xl w-80"
                                style="width: 20rem; display: none">
                                <a
                                    href="#"
                                    class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                                    <img
                                        class="object-cover w-8 h-8 mx-1 rounded-full"
                                        src="../src/img/photo-1450297350677-623de575f31c.avif"
                                        alt="avatar" />
                                    <p class="mx-2 text-sm">
                                        <span class="font-bold" href="#">Sara Salah</span> replied
                                        on the
                                        <span class="font-bold text-indigo-400" href="#">Upload Image</span>
                                        artical . 2m
                                    </p>
                                </a>
                                <a
                                    href="#"
                                    class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                                    <img
                                        class="object-cover w-8 h-8 mx-1 rounded-full"
                                        src="../src/img/photo-1494790108377-be9c29b29330.avif"
                                        alt="avatar" />
                                    <p class="mx-2 text-sm">
                                        <span class="font-bold" href="#">Slick Net</span> start
                                        following you . 45m
                                    </p>
                                </a>
                                <a
                                    href="#"
                                    class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                                    <img
                                        class="object-cover w-8 h-8 mx-1 rounded-full"
                                        src="../src/img/photo-1528892952291-009c663ce843.avif"
                                        alt="avatar" />
                                    <p class="mx-2 text-sm">
                                        <span class="font-bold" href="#">Jane Doe</span> Like Your
                                        reply on
                                        <span class="font-bold text-indigo-400" href="#">Test with TDD</span>
                                        artical . 1h
                                    </p>
                                </a>
                                <a
                                    href="#"
                                    class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                                    <img
                                        class="object-cover w-8 h-8 mx-1 rounded-full"
                                        src="../src/img/photo-1531427186611-ecfd6d936c79.avif"
                                        alt="avatar" />
                                    <p class="mx-2 text-sm">
                                        <span class="font-bold" href="#">Abigail Bennett</span>
                                        start following you . 3h
                                    </p>
                                </a>
                            </div>
                        </div>

                        <div x-data="{ dropdownOpen: false }" class="relative">
                            <button
                                @click="dropdownOpen = ! dropdownOpen"
                                class="relative block w-8 h-8 overflow-hidden rounded-full shadow focus:outline-none">
                                <img
                                    class="object-cover w-full h-full"
                                    src="../src/img/photo-1528892952291-009c663ce843.avif"
                                    alt="Your avatar" />
                            </button>

                            <div
                                x-show="dropdownOpen"
                                @click="dropdownOpen = false"
                                class="fixed inset-0 z-10 w-full h-full"
                                style="display: none"></div>

                            <div
                                x-show="dropdownOpen"
                                class="absolute right-0 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl"
                                style="display: none">
                                <p class="block px-4 py-2 text-sm  text-blue-400 hover:bg-indigo-600 hover:text-white"><?php echo $_SESSION['QBADMIN_USERNAME'] ?></p>
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Products</a>
                                <a
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile</a>
                                <a
                                    href="./logout.php"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</a>
                            </div>
                        </div>
                    </div>
                </header>