<?php

session_start();
$errors = [];
// Inclusion des fichiers nécessaires
require_once "../config/config.php"; // Paramètres de configuration de la base de données
require_once "../models/enterprise.php"; // Classe Utilisateur

// Vérification si la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tableau d'erreurs (stockage des erreurs)
    $errors = [];
    var_dump($_POST['enterprise_password']);
    // Validation du champ pseudo
    if (empty($_POST['enterprise_email'])) {
        $errors['enterprise_email'] = 'Veuillez saisir votre pseudo';
    }

    // Validation du champ mot de passe
    if (empty($_POST['enterprise_password'])) {
        $errors['enterprise_password'] = 'Veuillez saisir votre mot de passe';
    }

    // Si les champs sont valides, commence les tests

    if (empty($errors)) {
        var_dump("$_POST");
        $enterprise_email = $_POST['enterprise_email'];
        $result = Enterprise::checkEnterpriseExists($_POST['enterprise_email']);
        // Vérification de l'existence du pseudo avec la méthode checkPseudoExists de la classe Utilisateur

        if (!$result) {
            $errors['enterprise_email'] = 'Email inconnu';
        } else {

            // Utilisation de password_verify pour valider le mot de passe
            if (password_verify($_POST['enterprise_password'], $result['enterprise_password'])) {
                $_SESSION["enterprise"] = $result;
                unset($_SESSION["enterprise"]["enterprise_password"]);
                // Si la validation du mot de passe est réussie, redirection vers controller-home.php
                header('Location: controller-home.php');
            } else {
                // Sinon, ajout d'une erreur de connexion au tableau d'erreurs
                $errors['connexion'] = 'Mauvais mot de passe';
            }
        }
    }
}
?>

<?php
// Inclusion de la vue
include_once('../views/view-signin.php');
?>
