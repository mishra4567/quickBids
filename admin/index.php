<?php include_once("./header.php");
require_once("./inc/db.php");

// echo $uid;
// echo $trashCount;
// if(isset($_SESSION['QBADMIN_LOGIN'])){
//   $uid= $_SESSION['QBUSER_ID'];
//   if(isset($_GET['wishlist_id'])){
//     $wid=get_safe_value($con,$_GET['wishlist_id']);
//     mysqli_query($con, "DELETE FROM wishlist WHERE id='$wid' AND user_id='$uid'");
//   }
//   $wishlist_count = mysqli_num_rows(mysqli_query($con, "SELECT product.name,product.image,product.price,product.mrp,wishlist.id FROM product,wishlist WHERE wishlist.product_id=product.id AND wishlist.user_id='$uid'"));
// }
?>
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
  <div class="container px-6 py-8 mx-auto">
    <h3 class="text-3xl font-medium text-gray-700">Dashboard</h3>
    <?php
    ?>
    <div class="mt-4">
      <div class="flex flex-wrap -mx-6">
        <div class="w-full px-6 sm:w-1/2 xl:w-1/4">
          <div
            class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
            <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
              <i class="fa-solid fa-users-line "></i>
            </div>

            <div class="mx-5">
              <h4 class="text-2xl font-semibold text-gray-700">
                8,282
              </h4>
              <div class="text-gray-500">New Users</div>
            </div>
          </div>
        </div>

        <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/4 sm:mt-0">
          <div
            class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
            <div class="p-3 bg-orange-600 bg-opacity-75 rounded-full">
              <i class="fas fa-shopping-cart"></i>
            </div>

            <div class="mx-5">
              <h4 class="text-2xl font-semibold text-gray-700">
                200,521
              </h4>
              <div class="text-gray-500">Total Orders</div>
            </div>
          </div>
        </div>

        <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/4 xl:mt-0">
          <div
            class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
            <div class="p-3 bg-pink-600 bg-opacity-75 rounded-full">
              <i class="fas fa-shopping-bag"></i>
            </div>

            <div class="mx-5">
              <h4 class="text-2xl font-semibold text-gray-700">
                215,542
              </h4>
              <div class="text-gray-500">Available Products</div>
            </div>
          </div>
        </div>
        <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/4 xl:mt-0">
          <div
            class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
            <div class="p-3 bg-pink-600 bg-opacity-75 rounded-full">
              <i class="fas fa-shopping-bag"></i>
            </div>

            <div class="mx-5">
              <h4 class="text-2xl font-semibold text-gray-700">
                215,542
              </h4>
              <div class="text-gray-500">Remind Products</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include_once("./footer.php") ?>