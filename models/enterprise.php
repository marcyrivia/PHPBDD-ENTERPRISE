<?php

class Enterprise
{

    /**
     * Méthode permettant de créer un utilisateur
     *
     * @param int    $userValidate   Validation de l'utilisateur
     * @param string $lastname       Nom de l'utilisateur
     * @param string $firstname      Prénom de l'utilisateur
     * @param string $pseudo         Pseudo de l'utilisateur
     * @param string $email          Adresse mail de l'utilisateur
     * @param string $dob            Date de naissance de l'utilisateur
     * @param string $password       Mot de passe de l'utilisateur
     * @param int    $id_enterprise  Id de l'entreprise de l'utilisateur
     */
    public static function create( string $name_enterprise, int $siret,  string $adresse, string $city, int $zipcode, string $email, string $password)
    {

        try {
            // Les informations de connexion à la base de données
            $dbName = "trajet";
            $dbUser = "geralt";
            $dbPassword = "am12ine34";

            // Création de l'objet PDO pour la connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=$dbName", $dbUser, $dbPassword);
            // Paramétrage des erreurs PDO pour les afficher en cas de problème
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête SQL d'insertion des données dans la table userprofil
            $sql = "INSERT INTO `enterprise`(  `enterprise_name`, `enterprise_siret`, `enterprise_adress`, `enterprise_zipcode`, `enterprise_city`, `enterprise_email`, `enterprise_password`)  VALUES (:enterprise_name, :enterprise_siret,  :enterprise_adress,  :enterprise_city, :enterprise_zipcode, :enterprise_email, :enterprise_password)";

            // Préparation de la requête
            $query = $db->prepare($sql);

            // Liaison des valeurs avec les paramètres de la requête
            $query->bindValue(':enterprise_name', htmlspecialchars($name_enterprise), PDO::PARAM_STR);
            $query->bindValue(':enterprise_siret', ($siret), PDO::PARAM_STR);
            $query->bindValue(':enterprise_adress', htmlspecialchars($adresse), PDO::PARAM_STR);
            $query->bindValue(':enterprise_city', htmlspecialchars($city), PDO::PARAM_STR);
            $query->bindValue(':enterprise_zipcode', ($zipcode), PDO::PARAM_STR);
            $query->bindValue(':enterprise_email', htmlspecialchars($email), PDO::PARAM_STR);
            $query->bindValue(':enterprise_password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR); // Utilisation de l'algorithme PASSWORD_DEFAULT
            // $query->bindValue(':id_enterprise', $id_enterprise, PDO::PARAM_INT);

            // Exécution de la requête
            $query->execute();
        } catch (PDOException $e) {
            // En cas d'erreur, affichage du message d'erreur et arrêt du script
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }

}