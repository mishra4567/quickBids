<?php
require_once("./header.php");
$page_not_found = isset($_GET['menege_page']) ? htmlspecialchars($_GET['menege_page']) : 'unknown page';
?>
<div class="text-center">
    <h1 class="text-6xl font-bold text-gray-800">404</h1>
    <h2 class="mt-4 text-2xl font-semibold text-gray-600">"<?php echo htmlspecialchars($_GET['page'] ?? ''); ?>"Page Not Found</h2>
    <p class="mt-2 text-gray-500">Sorry, the page you are looking for does not exist.</p>
    <a href="./index.php" class="mt-6 inline-block px-6 py-3 text-white bg-blue-600 rounded hover:bg-blue-700 transition">
        Go to Home
    </a>
</div>
<?php
require_once("./footer.php");
