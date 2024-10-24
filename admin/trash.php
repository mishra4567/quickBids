<?php include_once("./header.php");
require_once("./inc/db.php");
// require_once("./inc/functions.php");
isMenegeAdmin($menege_page);
$reload_page = '<script>window.location.href = "' . $current_page . '";</script>';
$selecVendor = mysqli_query($con, "SELECT * FROM qb_dash_user WHERE trash='1'");
include_once("./inc/activeDeactiveDelete.php");
?>
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container px-6 py-8 mx-auto">
        <div class="flex flex-col mt-8">
            <div
                class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="text-2xl font-semibold leading-tight mb-4">
                    <a href="./user.php" class="text-xl font-semibold leading-tight text-orange-400 rounded-full mb-4">Back</a>&nbsp;&nbsp;Employee Table
                </div>
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
                                        <?php if ($row['status'] == 0 || $row['trash'] == 1) { ?>
                                            <a <?php if ($isAdmin) {
                                                    echo "href='?type=restore&use=profile&id=" . $row['id'] . "'";
                                                } ?>class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">Restore</a>
                                        <?php } else { ?>
                                            <a <?php if ($isAdmin) {
                                                    echo "href='?type=restore&use=profile&id=" . $row['id'] . "'";
                                                } ?>class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Trash</a>
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
                                                <a <?php echo "href='?type=trash&id=" . $row['id'] . "'" ?>
                                                    class="text-red-500 hover:text-green-500">Delete</a>
                                            <?php } ?>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once("./footer.php") ?>