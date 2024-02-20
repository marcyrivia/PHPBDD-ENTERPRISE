
<?php 
require_once"../config/config.php";
require_once"../models/enterprise.php";

if(isset($_GET["validate"])){
  entreprise::activeUsers($_GET["validate"]);  
  header("Location: controller-userList.php");
} else if (isset($_GET["unvalidate"])) {
    Entreprise::blockUsers($_GET["unvalidate"]);
    header("Location: controller-userList.php");
}

?>