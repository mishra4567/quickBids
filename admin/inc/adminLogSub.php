<?php
// session_start();
require_once("../../database/db.php");
require_once("./functions.php");
$email = get_safe_value($con, $_POST['email']);
$password =sha1( get_safe_value($con, $_POST['password']));
$sql = mysqli_query($con, "SELECT * FROM qb_dash_user  WHERE email='$email' AND password='$password'");
$check_user = mysqli_num_rows($sql);
if ($check_user > 0) {
    $row=mysqli_fetch_assoc($sql);
    if($row['status']=='0'){
        echo "deactivated";
    }else{
        $_SESSION['QBADMIN_LOGIN'] = 'yes';
        $_SESSION['QBUSER_ID'] = $row['id'];
        $_SESSION['QBADMIN_USERNAME']=$row['name'];
        $_SESSION['QBADMIN_ROLE']=$row['rolle'];
        // $_SESSION['QBADMIN_PHOTO']=$row['image'];
        // $_SESSION['QBADMIN_MENEGE']=$row['manage'];
        $manageNumber = $row['manage'];
        $adminManageNameSql = mysqli_query($con, "SELECT name FROM qb_dash_manage WHERE id='$manageNumber'");
        $adminManageName = mysqli_fetch_assoc($adminManageNameSql);
        $_SESSION['QBADMIN_MENEGE']=$adminManageName['name'];
        echo "valid";
        die();
    }
} else {
    echo "worng";
}