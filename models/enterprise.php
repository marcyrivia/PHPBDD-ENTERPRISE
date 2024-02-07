<?php

require_once('../config/config.php');

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
    public static function create( string $enterprise_name, int $siret,  string $adresse, string $city, int $zipcode, string $enterprise_email, string $password)
    {

        try {
            // Les informations de connexion à la base de données
       // Création d'un objet $db selon la classe PDO
        $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);

            // Paramétrage des erreurs PDO pour les afficher en cas de problème
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête SQL d'insertion des données dans la table userprofil
            $sql = "INSERT INTO `enterprise`(  `enterprise_name`, `enterprise_siret`, `enterprise_adress`, `enterprise_zipcode`, `enterprise_city`, `enterprise_email`, `enterprise_password`)  VALUES (:enterprise_name, :enterprise_siret,  :enterprise_adress,  :enterprise_city, :enterprise_zipcode, :enterprise_email, :enterprise_password)";

            // Préparation de la requête
            $query = $db->prepare($sql);

            // Liaison des valeurs avec les paramètres de la requête
            $query->bindValue(':enterprise_name', htmlspecialchars($enterprise_name), PDO::PARAM_STR);
            $query->bindValue(':enterprise_siret', ($siret), PDO::PARAM_STR);
            $query->bindValue(':enterprise_adress', htmlspecialchars($adresse), PDO::PARAM_STR);
            $query->bindValue(':enterprise_city', htmlspecialchars($city), PDO::PARAM_STR);
            $query->bindValue(':enterprise_zipcode', ($zipcode), PDO::PARAM_STR);
            $query->bindValue(':enterprise_email', htmlspecialchars($enterprise_email), PDO::PARAM_STR);
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

    public static function checkEnterpriseExists(string $enterprise_email)
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `enterprise` WHERE `enterprise_email` = :enterprise_email";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':enterprise_email', $enterprise_email, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le pseudo n'existe pas
            return $result;
            // if (empty($result)) {
            //     return false;
            // } else {
            //     return true;
            // }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    } 

    public static function getInfos(string $enterprise_name)
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `enterprise` WHERE `enterprise_name` = :enterprise_name";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':enterprise_name', $enterprise_name, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    public static function countUsers($enterprise_id) {

        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);

            // stockage de ma requete dans une variable
            $sql = ("SELECT COUNT(DISTINCT userprofil.user_id) AS user_count FROM `userprofil` INNER JOIN  ride ON userprofil.user_id = ride.user_id WHERE userprofil.enterprise_id = :enterprise_id ");

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':enterprise_id', $enterprise_id, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }

    }

    public static function countTrajets($enterprise_id) {

        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);

            // stockage de ma requete dans une variable
            $sql = ("SELECT COUNT(DISTINCT ride.ride_id) AS ride_count FROM `ride` INNER JOIN  userprofil ON userprofil.user_id = ride.user_id WHERE enterprise_id = :enterprise_id ");

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':enterprise_id', $enterprise_id, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }

    }

}