<?php
$isAdmin = $_SESSION['QBADMIN_USERNAME'] == 'admin';
$current_page = basename($_SERVER['PHP_SELF']);
$menege_page = pathinfo($current_page, PATHINFO_FILENAME);
$isTable = $_SESSION['QBADMIN_MENEGE'] == 'table' || $isAdmin;
$isUIElements = $_SESSION['QBADMIN_MENEGE'] == 'uiEliments' || $isAdmin;
$isforms = $_SESSION['QBADMIN_MENEGE'] == 'forms' || $isAdmin;
// $isIcons = $_SESSION['QBADMIN_MENEGE'] == 'icons' || $isAdmin;
$isMarketing = $_SESSION['QBADMIN_MENEGE'] == 'marketing' || $isAdmin;
// echo $_SESSION['QBADMIN_MENEGE'];
/**
 * Default Image Velidation 
 */
include_once("./inc/imageValid.php");