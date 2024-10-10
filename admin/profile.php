<?php
require_once("./inc/functions.php");
require_once("./header.php");
include("./inc/language.php");
?>
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container px-6 py-8 mx-auto">
        <div class="flex flex-col mt-8">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <!-- Profile Card -->
                    <div class="max-w-sm mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="bg-cover bg-center h-32" style="background-image: url('<?php echo $vendorBackImage ?>')">
                        </div>
                        <div class="p-4">
                            <div class="text-center relative">
                                <img class="w-24 h-24 rounded-full mx-auto border-4 border-white -mt-16" src="<?php echo $vendorPhotoPath ?>" alt="Profile Image">

                                <!-- Update Picture Icon Overlay -->
                                <!-- <label class="absolute bottom-0 right-0 mb-2 mr-2 cursor-pointer bg-blue-500 rounded-full p-2 hover:bg-blue-600 transition">
                                    <input type="file" class="hidden" accept="image/*">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a1.5 1.5 0 00-2.121 0l-4.5 4.5a1.5 1.5 0 000 2.121l4.5 4.5a1.5 1.5 0 002.121-2.121L13.121 12l2.121-2.121a1.5 1.5 0 000-2.121z" />
                                    </svg>
                                </label> -->

                                <h2 class="text-xl font-semibold text-gray-800 mt-2"><?php echo $vendorDetails['name'] ?></h2>
                                <p class="text-gray-600"><?php echo $_SESSION['QBADMIN_MENEGE'] ?></p>
                            </div>
                            <div class="mt-4 text-center">
                                <p class="text-gray-600"><?php echo $vendorDetails['email'] ?></p>
                                <!-- <p class="text-gray-600">John is an experienced developer with a focus on building scalable applications. Passionate about coding and learning new technologies.</p> -->
                            </div>

                            <!-- Followers, Following, Products Section -->
                            <div class="mt-6">
                                <div class="flex justify-around text-center">
                                    <div>
                                        <span class="block text-xl font-bold text-gray-800">1.2k</span>
                                        <span class="block text-sm text-gray-600">Followers</span>
                                    </div>
                                    <div>
                                        <span class="block text-xl font-bold text-gray-800">500</span>
                                        <span class="block text-sm text-gray-600">Following</span>
                                    </div>
                                    <div>
                                        <span class="block text-xl font-bold text-gray-800">35</span>
                                        <span class="block text-sm text-gray-600">Products</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Media Links -->
                            <div class="mt-4 flex justify-center space-x-4">
                                <a href="#" class="text-gray-600 hover:text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8a6 6 0 11-12 0 6 6 0 0112 0zm-6 11c-4.418 0-8-1.79-8-4a1 1 0 011-1h14a1 1 0 011 1c0 2.21-3.582 4-8 4z" />
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-600 hover:text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11h.01M12 11h.01M16 11h.01M9 16h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-600 hover:text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16h16V4H4zm4 14h8M4 10h16" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End of Profile Card -->
                </div>
            </div>
        </div>
    </div>
</main>



<?php
require_once("./footer.php");
?>