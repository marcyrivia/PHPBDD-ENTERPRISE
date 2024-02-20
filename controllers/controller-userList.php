<?php

session_start();
require_once "../models/enterprise.php";
require_once "../config/config.php";


// Entreprise::activeUsers(21);
if (isset($_SESSION['enterprise'])) {
    $enterprise_id = $_SESSION["enterprise"]["enterprise_id"];
    $userjson =  json_decode(Entreprise::allUsers($enterprise_id), true);
    
    

} else{
    header("Location: ./controller-signin.php");
    exit();
};
    



include_once '../views/view-userList.php';
