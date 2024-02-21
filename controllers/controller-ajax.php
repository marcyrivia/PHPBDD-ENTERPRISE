<?php
// Démarre la session PHP pour permettre l'utilisation des sessions
session_start();

// Inclusion des fichiers nécessaires
require_once '../models/enterprise.php'; // Inclusion du fichier contenant la classe Entreprise
require_once '../config/config.php'; // Inclusion du fichier de configuration

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['enterprise'])) {
    // Récupère l'identifiant de l'entreprise à partir de la session utilisateur
    $enterpriseId = $_SESSION['enterprise']['enterprise_id'];


    // Vérifie si le paramètre GET 'validate' est défini
    if (isset($_GET['validate'])) {
        // Récupère les informations de l'utilisateur à valider à partir de la méthode statique userBelong de la classe Entreprise
        $getOneuser = json_decode(Entreprise::userBelong($_GET['validate']), true);

        
        // Vérifie si l'utilisateur appartient à l'entreprise actuelle
        if ($getOneuser['enterprise_id'] == $enterpriseId) {
            // Active l'utilisateur en utilisant la méthode statique activeUsers de la classe Entreprise
            Entreprise::activeUsers($_GET['validate']);
        }
    }
    
    // Vérifie si le paramètre GET 'unvalidate' est défini
    if (isset($_GET['unvalidate'])) {
        // Récupère les informations de l'utilisateur à invalider à partir de la méthode statique userBelong de la classe Entreprise
        $getOneuser = json_decode(Entreprise::userBelong($_GET['unvalidate']), true);
        
        // Vérifie si l'utilisateur appartient à l'entreprise actuelle
        if ($getOneuser['enterprise_id'] == $enterpriseId) {
            // Bloque l'utilisateur en utilisant la méthode statique blockUsers de la classe Entreprise
            Entreprise::blockUsers($_GET['unvalidate']);
        }
    }
}
