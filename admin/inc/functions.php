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
