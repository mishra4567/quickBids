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
    <!-- Language Switcher -->
    <div class="absolute top-4 right-4">
        <form id="languageForm" method="GET" action="">
            <label for="language" class="text-sm font-semibold text-gray-800 mr-2">Language:</label>
            <select name="lang" id="language" class="border border-gray-300 rounded-md text-gray-800 text-sm px-2 py-1">
                <option value="en" selected>English</option>
                <option value="hi">हिंदी</option>
            </select>
        </form>
    </div>

    <div class="font-[sans-serif] bg-[#f8f4f3] flex items-center md:h-screen p-4">
        <div class="w-full max-w-4xl max-md:max-w-xl mx-auto">
            <div class="bg-white grid md:grid-cols-2 gap-16 w-full sm:p-8 p-6 shadow-md rounded-md overflow-hidden">
                <div class="max-md:order-1 space-y-6">
                    <div class="md:mb-16 mb-8">
                        <h3 class="text-gray-800 text-2xl font-bold">Instant Access</h3>
                    </div>

                    <div class="space-y-6">
                        <button type="button"
                            class="w-full px-5 py-2.5 flex items-center justify-center rounded-md text-white text-base tracking-wider font-semibold border-none outline-none bg-blue-600 hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22px" fill="#fff" class="inline shrink-0 mr-4" viewBox="0 0 167.657 167.657">
                                <!-- Facebook icon -->
                            </svg>
                            Continue with Facebook
                        </button>
                        <button type="button"
                            class="w-full px-5 py-2.5 flex items-center justify-center rounded-md text-gray-800 text-base tracking-wider font-semibold border-none outline-none bg-gray-100 hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22px" fill="#fff" class="inline shrink-0 mr-4" viewBox="0 0 512 512">
                                <!-- Google icon -->
                            </svg>
                            Continue with Google
                        </button>
                        <button type="button"
                            class="w-full px-5 py-2.5 flex items-center justify-center rounded-md text-white text-base tracking-wider font-semibold border-none outline-none bg-black hover:bg-[#333]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22px" fill="#fff" class="inline shrink-0 mr-4" viewBox="0 0 22.773 22.773">
                                <!-- Apple icon -->
                            </svg>
                            Continue with Apple
                        </button>
                    </div>
                </div>

                <form class="w-full">
                    <div class="mb-8">
                        <h3 class="text-gray-800 text-2xl font-bold">Register</h3>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Name</label>
                            <div class="relative flex items-center">
                                <input name="name" type="text" required class="bg-white border border-gray-300 w-full text-sm text-gray-800 pl-4 pr-10 py-2.5 rounded-md outline-blue-500" placeholder="Enter name" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                    <!-- Name icon -->
                                </svg>
                            </div>
                        </div>
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Email Id</label>
                            <div class="relative flex items-center">
                                <input name="email" type="email" required class="bg-white border border-gray-300 w-full text-sm text-gray-800 pl-4 pr-10 py-2.5 rounded-md outline-blue-500" placeholder="Enter email" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 682.667 682.667">
                                    <!-- Email icon -->
                                </svg>
                            </div>
                        </div>
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Password</label>
                            <div class="relative flex items-center">
                                <input name="password" type="password" required class="bg-white border border-gray-300 w-full text-sm text-gray-800 pl-4 pr-10 py-2.5 rounded-md outline-blue-500" placeholder="Enter password" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                                    <!-- Password icon -->
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded-md" />
                            <label for="remember-me" class="text-gray-800 ml-3 block text-sm">
                                I accept the <a href="javascript:void(0);" class="text-blue-600 font-semibold hover:underline ml-1">Terms and Conditions</a>
                            </label>
                        </div>
                    </div>

                    <div class="!mt-8">
                        <button type="button" class="w-full py-2.5 px-4 text-sm tracking-wider font-semibold rounded-md bg-blue-600 hover:bg-blue-700 text-white focus:outline-none">
                            Create Account
                        </button>
                    </div>
                    <p class="text-gray-800 text-sm mt-6 text-center">Already have an account? <a href="javascript:void(0);" class="text-blue-600 font-semibold hover:underline ml-1">Login here</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="../src/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="./js/admin.js"></script>
    <script>
        // Auto-submit form on language change
        document.getElementById('language').addEventListener('change', function() {
            document.getElementById('languageForm').submit();
        });
    </script>
</body>

</html>