<?php
require_once("./header.php");
$reload_page = '<script>window.location.href = "' . $current_page . '";</script>';
// $selecVendor = mysqli_query($con, "SELECT * FROM qb_dash_user WHERE rolle='1' AND trash='0'");
// Select vendors from the database
$stmt = $con->prepare("SELECT qb_dash_user.*, qb_dash_manage.name AS manage_name FROM qb_dash_user 
                       LEFT JOIN qb_dash_manage ON qb_dash_user.manage = qb_dash_manage.id 
                       WHERE qb_dash_user.rolle = '1' AND qb_dash_user.trash = '0'");
$stmt->execute();
$selecVendor = $stmt->get_result();

// echo $selecVendor;
include_once("./inc/activeDeactiveDelete.php");
if ($isAdmin) {
    $uid = $_SESSION['QBUSER_ID'];
    $trashCount = 0;
    $trashSql = mysqli_query($con, "SELECT * FROM qb_dash_user WHERE trash='1'");
    $trashCount = mysqli_num_rows($trashSql);
}
// isMenegeAdmin($menege_page);
?>
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container px-6 py-8 mx-auto">
        <div class="mt-8"></div>
        <div class="flex flex-col mt-8">
            <div
                class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full text-sm px-2 font-semibold">
                        <tbody class="bg-white">
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-l border-gray-400 text-blue-400">
                                    Notifications:&nbsp; <a class="text-green-400">jghu</a>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <a href="./trash.php" class="inline-flex px-2 text-xs bg-orange-100 text-red-500 hover:text-red-600 font-bold rounded-full">
                                        Trash&nbsp;
                                        <p class="rounded-full text-blue-600"> <?php if ($isAdmin) {
                                                                                    echo $trashCount;
                                                                                } ?></p>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <a class="inline-flex px-2 text-xs bg-orange-100 text-red-500 hover:text-red-600 font-bold rounded-full">
                                        Trash
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <a class="inline-flex px-2 text-xs bg-orange-100 text-red-500 hover:text-red-600 font-bold rounded-full">
                                        Trash
                                    </a>
                                </td>
                                <td class=" py-4 whitespace-nowrap border-b border-gray-200">
                                    <div id="table-search-bar" class="inline-flex  text-xs">
                                        <input type="text" id="table_search" class="w-52 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none px-2 py-1" placeholder="Search...">
                                        <input type="hidden" id="profile" value="<?php echo $menege_page ?>">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex flex-col mt-8">
            <div
                class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <h2 class="text-2xl font-semibold leading-tight mb-4">Employee Table</h2>
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full" id="tableProfileVendor">
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
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?php
                            $i = 1;
                            while ($row = $selecVendor->fetch_assoc()) {
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
                                            echo $row['manage_name'];
                                            ?>
                                        </div>
                                        <div class="text-sm leading-5 text-gray-500">
                                            <!-- Web dev -->
                                        </div>
                                    </td>

                                    <td
                                        class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <?php if ($row['status'] == 1) { ?>
                                            <a <?php if ($isAdmin) {
                                                    echo "href='?type=status&use=profile&operation=deactive&id=" . $row['id'] . "'";
                                                } ?> class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</a>
                                        <?php } else { ?>
                                            <a <?php if ($isAdmin) {
                                                    echo "href='?type=status&use=profile&operation=active&id=" . $row['id'] . "'";
                                                } ?> class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">Deactive</a>
                                        <?php } ?>
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                        <?php if ($isAdmin) { ?>
                                            <a href="#"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a
                                                class="text-indigo-600 hover:text-indigo-900">/</a>
                                            <?php } ?>&nbsp;&nbsp;
                                            <?php if ($isAdmin) { ?>
                                                <a <?php echo "href='?type=trash&use=profile&id=" . $row['id'] . "'" ?>
                                                    class="text-red-500 hover:text-green-500">Delete</a>
                                            <?php } ?>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                        <!-- <tbody class="bg-white">

                        </tbody> -->
                    </table>
                    <table class=" min-w-full" id="tableSearchResult">
                    </table>

                </div>
            </div>
        </div>
    </div>
</main>
<?php
require_once("./footer.php");
?>