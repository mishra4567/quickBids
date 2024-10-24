<?php
// if (isset($_GET['type']) && $_GET['type'] != '') {
//     // $operation="";
//     $type = get_safe_value($con, $_GET['type']);
//     $use = get_safe_value($con, $_GET['use']);
//     // $operation = get_safe_value($con, $_GET['operation']);
//     $id = get_safe_value($con, $_GET['id']);
//     if ($use = 'profile' && $type == 'status') {
//         if ($use == 'active') {
//             $status = '1';
//         } else {
//             $status = '0';
//         }
//         $update_status_sql = "UPDATE qb_dash_user SET status='$status' WHERE id='$id'";
//         mysqli_query($con, $update_status_sql);
//         // Redirect to the same page (or another page if you want)
//     }
//     if ($use = 'profile' && $type == 'restore') {
//         // $id = get_safe_value($con, $_GET['id']);
//         $update_restore_sql = "UPDATE qb_dash_user SET status='1',trash='0' WHERE id='$id'";
//         mysqli_query($con, $update_restore_sql);
//         // Redirect to the same page (or another page if you want)
//     }
//     if ($use = 'profile' && $type == 'trash') {
//         // $id = get_safe_value($con, $_GET['id']);
//         $update_trash_sql = "UPDATE qb_dash_user SET status='0', trash='1' WHERE id='$id'";
//         mysqli_query($con, $update_trash_sql);
//         // echo $update_trash_sql;
//     }
//     // if ($type == 'delete') {
//     //   $id = get_safe_value($con, $_GET['id']);
//     //   $delete_sql = "DELETE FROM admin WHERE id='$id'";
//     //   mysqli_query($con, $delete_sql);
//     // }
//     // echo $reload_page;
//     // header("Location: " . $menege_page);
//     echo $reload_page;
//     exit();
// }
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    $use = get_safe_value($con, $_GET['use']);
    $id = get_safe_value($con, $_GET['id']);

    // Update status
    if ($use == 'profile' && $type == 'status') {
        // Checking whether 'active' or 'inactive'
        if ($_GET['operation'] == 'active') {
            $status = '1'; // Set status to Active
        } else {
            $status = '0'; // Set status to Inactive
        }
        $update_status_sql = "UPDATE qb_dash_user SET status='$status' WHERE id='$id'";
        mysqli_query($con, $update_status_sql);
    }

    // Restore profile
    if ($use == 'profile' && $type == 'restore') {
        $update_restore_sql = "UPDATE qb_dash_user SET status='1', trash='0' WHERE id='$id'";
        mysqli_query($con, $update_restore_sql);
    }

    // Move profile to trash
    if ($use == 'profile' && $type == 'trash') {
        $update_trash_sql = "UPDATE qb_dash_user SET status='0', trash='1' WHERE id='$id'";
        mysqli_query($con, $update_trash_sql);
    }

    // Optional: Define the $reload_page
    // $reload_page = "manage_page.php";  // Example page, adjust this based on your setup

    // Redirect to the desired page
    // header("Location: $reload_page");
    echo $reload_page;
    exit();
}
