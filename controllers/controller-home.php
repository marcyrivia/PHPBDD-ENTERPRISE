<?php

require_once "../models/enterprise.php";
require_once "../config/config.php";

session_start();
if (isset($_SESSION['enterprise'])) {
    $date = date('jS F Y');
    $enterprise_name = $_SESSION['enterprise']['enterprise_name'];
    // $defaultPic = $_SESSION['user']['user_default'];
} else {
    header("Location: ./controller-signin.php");
    // exit();
};




include_once '../views/view-home.php';
?>


















