<?php
require_once("../../database/db.php");
require_once("./functions.php");
$rolle = "1";
$status = "1";
// if (isset($_POST['submit'])) {
$name = get_safe_value($con, $_POST['name']);
$email = get_safe_value($con, $_POST['email']);
// $mobail = get_safe_value($con, $_POST['mobail']);
$manage = get_safe_value($con, $_POST['manage']);
$password = sha1(get_safe_value($con, $_POST['password']));
$rolle = get_safe_value($con, $rolle);
$status = get_safe_value($con, $status);
$check_user = mysqli_num_rows(mysqli_query($con, "SELECT * FROM qb_dash_user WHERE email='$email'"));
// $check_mobail=mysqli_num_rows(mysqli_query($con, "SELECT * FROM qb_dash_user WHERE mobail='$mobail'"));
if ($check_user > 0) {
    echo "present";
    die();
}
// elseif($check_mobail>0){
//     echo "mobail_present";
// }
else {
    $added_on = date('y-m-d h:i:s');
    mysqli_query($con, "INSERT INTO qb_dash_user (name,email,manage,password,rolle,status,added_on) VALUES('$name','$email','$manage','$password','$rolle','$status','$added_on')");
    echo "ensert";
    die();
}
// }
