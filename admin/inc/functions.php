<?php
function pr($arr)
{
    echo '<pre>';
    print_r($arr);
};
function prx($arr)
{
    echo '<pre>';
    print_r($arr);
    die();
};
function get_safe_value($con, $str)
{
    if ($str != "") {
        $str = trim($str);
        return strip_tags(mysqli_real_escape_string($con, $str));
    }
};

function isMenegeAdmin($menege_page)
{
    // Allow access if the username is 'admin', regardless of other checks
    if (isset($_SESSION['QBADMIN_USERNAME']) && $_SESSION['QBADMIN_USERNAME'] == 'admin') {
        return; // If admin, no further checks needed
    }

    // Check if QBADMIN_MENEGE is not set or doesn't match the current page
    if (!isset($_SESSION['QBADMIN_MENEGE']) || $_SESSION['QBADMIN_MENEGE'] != $menege_page) {
        // Redirect to 404.php with the page name
        echo '<script>window.location.href = "404.php?page=' . urlencode($menege_page) . '";</script>';
        exit;
    }

    // Check if QBADMIN_ROLE is set and the role is 0 (not an admin role)
    if (isset($_SESSION['QBADMIN_ROLE']) && $_SESSION['QBADMIN_ROLE'] == 0) {
        // Redirect to 404.php if the user is not an admin
        echo '<script>window.location.href = "404.php?page=' . urlencode($menege_page) . '";</script>';
        exit;
    }
}
function renderUserRow($row, $isAdmin, $serial)
{
    $statusClass = $row['status'] == 1 ? 'text-green-800 bg-green-100' : 'text-orange-800 bg-orange-100';
    $statusLabel = $row['status'] == 1 ? 'Active' : 'Deactive';
    $editLink = $isAdmin ? '<a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>' : '/';
    $deleteLink = $isAdmin ? '<a href="?type=trash&use=profile&id=' . $row['id'] . '" class="text-red-500 hover:text-green-500">Delete</a>' : '';
    $activeDectiveLink="";
    if ($isAdmin) {
        if ($row['status'] == 1) {
            $activeDectiveLink = "href='user.php?type=status&use=profile&operation=deactive&id=" . $row['id'] . "'";
        } else {
            $activeDectiveLink = "href='user.php?type=status&use=profile&operation=active&id=" . $row['id'] . "'";
        }
    }
    return "
        <tr>
            <td class='whitespace-no-wrap border-b border-gray-200'>
                <div class='flex flex-row items-center'>
                    <div class='ml-4'>
                        <div class='text-sm font-medium leading-5 text-gray-900'>{$serial}</div>
                    </div>
                    <div class='ml-4'>
                        <div class='text-sm leading-5 text-gray-500'>{$row['id']}</div>
                    </div>
                </div>
            </td>
            <td class='px-6 py-4 whitespace-no-wrap border-b border-gray-200'>
                <div class='flex items-center'>
                    <div class='flex-shrink-0 w-10 h-10'>
                        <img class='w-10 h-10 rounded-full' src='../src/img/photo-1472099645785-5658abf4ff4e.avif' alt='' />
                    </div>
                    <div class='ml-4'>
                        <div class='text-sm font-medium leading-5 text-gray-900'>{$row['name']}</div>
                        <div class='text-sm leading-5 text-gray-500'>{$row['email']}</div>
                    </div>
                </div>
            </td>
            <td class='px-6 py-4 whitespace-no-wrap border-b border-gray-200'>
                <div class='text-sm leading-5 text-gray-900'>{$row['manage_name']}</div>
            </td>
            <td class='px-6 py-4 whitespace-no-wrap border-b border-gray-200'>
                <a {$activeDectiveLink} class='inline-flex px-2 text-xs font-semibold leading-5 {$statusClass} rounded-full'>{$statusLabel}</a>
            </td>
            <td class='px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200'>
                {$editLink} &nbsp;&nbsp; {$deleteLink}
            </td>
        </tr>";
}
