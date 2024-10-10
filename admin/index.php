<?php include_once("./header.php");
require_once("../database/db.php");
// $userManage= $_SESSION['QBUSER_ID'];
// echo $userManage;
// $userManageName= mysqli_fetch_assoc(mysqli_query($con, "SELECT manage FROM qb_dash_user WHERE id='$userManage'"));
// $selectName = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM pb_dash_manage WHERE id='$userManageName'"));
// echo $selectName['name'];
// echo $userManageName['manage'];
$selecVendor = mysqli_query($con, "SELECT * FROM qb_dash_user WHERE rolle='1'");
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

    <div class="mt-8"></div>

    <div class="flex flex-col mt-8">
      <div
        class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div
          class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
          <table class="min-w-full">
            <thead>
              <tr>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  # &nbsp; &nbsp;ID
                </th>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  Name
                </th>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  Title
                </th>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  Status
                </th>
                <!-- <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  Role
                </th> -->
                <th
                  class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
              </tr>
            </thead>

            <tbody class="bg-white">
              <?php
              $i = 1;
              while ($row = mysqli_fetch_assoc($selecVendor)) {
              ?>
                <tr>
                  <td
                    class=" whitespace-no-wrap border-b border-gray-200">
                    <div class="flex flex-row  items-center">
                      <div class="ml-4">
                        <div
                          class="text-sm font-medium leading-5 text-gray-900">
                          <?php echo $i++ ?>
                        </div>
                      </div>
                      <div class="ml-4">
                        <div class="text-sm leading-5 text-gray-500">
                          <?php echo $row['id'] ?>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td
                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 w-10 h-10">
                        <img
                          class="w-10 h-10 rounded-full"
                          src="../src/img/photo-1472099645785-5658abf4ff4e.avif"
                          alt="" />
                      </div>

                      <div class="ml-4">
                        <div
                          class="text-sm font-medium leading-5 text-gray-900">
                          <?php echo $row['name'] ?>
                        </div>
                        <div class="text-sm leading-5 text-gray-500">
                          <?php echo $row['email'] ?>
                        </div>
                      </div>
                    </div>
                  </td>

                  <td
                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-900">
                      <?php
                      $manageId = $row["manage"];
                      $displayVendorName = mysqli_fetch_assoc(mysqli_query($con, "SELECT *FROM qb_dash_manage WHERE id='$manageId'"));
                      echo $displayVendorName['name'];
                      ?>
                    </div>
                    <div class="text-sm leading-5 text-gray-500">
                      <!-- Web dev -->
                    </div>
                  </td>

                  <td
                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <?php if ($row['status'] == 1) { ?>
                      <a <?php if ($_SESSION['QBADMIN_USERNAME'] == 'admin') {
                            echo "href='?type=status&operation=deactive&id=" . $row['id'] . "'";
                          } ?> class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</a>
                    <?php } else { ?>
                      <a <?php if ($_SESSION['QBADMIN_USERNAME'] == 'admin') {
                            echo "href='?type=status&operation=deactive&id=" . $row['id'] . "'";
                          } ?> class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">Deactive</a>
                    <?php } ?>
                    <!-- <span
                          class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                          Active
                        </span> -->
                  </td>

                  <!-- <td
                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                    Owner
                  </td> -->

                  <td
                    class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                    <a
                      href="#"
                      class="text-indigo-600 hover:text-indigo-900">Edit</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include_once("./footer.php") ?>