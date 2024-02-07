<?php 
require_once('../models/enterprise.php');
session_start();
if(isset($_SESSION["enterprise"])){
$date = date('d F Y');
$enterprise = $_SESSION['enterprise'];
$enterprise_name = $_SESSION['enterprise']['enterprise_name'];
$enterprise_siret = $_SESSION['enterprise']['enterprise_siret'];
$enterprise_adress = $_SESSION['enterprise']['enterprise_adress'];
$enterprise_city = $_SESSION['enterprise']['enterprise_city'];
$enterprise_zipcode = $_SESSION['enterprise']['enterprise_zipcode'];
$enterprise_email = $_SESSION['enterprise']['enterprise_email'];
$enterprise_id = $_SESSION['enterprise']['enterprise_id'];
// $defaultPic = $_SESSION['user']['user_default'];

$enterpriseCount = Enterprise::countUsers($enterprise_id);

$trajetCount = Enterprise::countTrajets($enterprise_id);
$trajetStr = $trajetCount["ride_count"];





}







?>













<?php


// Contrôleur - Gestion de la logique métier

// Vérifications et traitements du formulaire ici

// Inclusion de la vue
include_once('../views/view-home.php');
?>