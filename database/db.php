<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "quickbids");
// $collectShopDetels = "SELECT * FROM qb_dash_user  WHERE role='1'";
$selecUser = mysqli_query($con, "SELECT * FROM qb_dash_user WHERE rolle='1'");
$selectManageSql = mysqli_query($con, "SELECT * FROM pb_dash_manage WHERE status='1' AND role='1'");