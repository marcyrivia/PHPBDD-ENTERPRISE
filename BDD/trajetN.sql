-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 08 fév. 2024 à 14:27
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trajet`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@example.com', 'AdminPassword');

-- --------------------------------------------------------

--
-- Structure de la table `enterprise`
--

CREATE TABLE `enterprise` (
  `enterprise_id` int NOT NULL,
  `enterprise_name` varchar(50) NOT NULL,
  `enterprise_email` varchar(50) NOT NULL,
  `enterprise_siret` varchar(50) NOT NULL,
  `enterprise_adress` varchar(50) NOT NULL,
  `enterprise_password` varchar(255) NOT NULL,
  `enterprise_zipcode` int NOT NULL,
  `enterprise_city` varchar(25) NOT NULL,
  `enterprise_photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `enterprise`
--

INSERT INTO `enterprise` (`enterprise_id`, `enterprise_name`, `enterprise_email`, `enterprise_siret`, `enterprise_adress`, `enterprise_password`, `enterprise_zipcode`, `enterprise_city`, `enterprise_photo`) VALUES
(1, 'France Gazouz', 'FranceGazouz@gmail.com', '54DE65Z5D2DF', '28 Rue De La Mort', 'Geleklek123', 76000, 'Rouen', NULL),
(2, 'AmineCorp', 'contact@nouvelleentreprise.com', '12345678901234', '15 Rue du Commerce', 'MotDePasse123', 75001, 'Paris', NULL),
(3, 'NassCorp', 'NassCorp@mail.fr', ' 12345678901234.', '10 rue chez moi', 'password', 76000, 'Rouen', NULL),
(8, 'bandaiNamco', 'bandai@mail.fr', '1234567891234', '1 rue de l&#039;afpa', '$2y$10$DLT0V6l/.BjZpDGnh1BGTuexLHR3nuRfM6A90ongnJLtyPq/lszfC', 76000, 'rouen', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `events_id` int NOT NULL,
  `events_startdate` date NOT NULL,
  `events_challengedescrib` varchar(300) NOT NULL,
  `events_photo` varchar(50) DEFAULT NULL,
  `events_enddate` date NOT NULL,
  `events_challengename` varchar(50) NOT NULL,
  `enterprise_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`events_id`, `events_startdate`, `events_challengedescrib`, `events_photo`, `events_enddate`, `events_challengename`, `enterprise_id`) VALUES
(1, '2024-11-01', 'L\'entreprise France Gazouz organise une marche à pied pour fêter la saison 14 de League Of Legends', NULL, '2024-11-01', 'Faille de l\'invocateur', 1),
(2, '2024-02-02', 'Défi de remise en forme pour février', NULL, '2024-02-10', 'Février Fit Challenge', 2);

-- --------------------------------------------------------

--
-- Structure de la table `ride`
--

CREATE TABLE `ride` (
  `ride_id` int NOT NULL,
  `ride_date` date NOT NULL,
  `ride_distance` float NOT NULL,
  `ride_photo` varchar(50) DEFAULT NULL,
  `user_id` int NOT NULL,
  `transport_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ride`
--

INSERT INTO `ride` (`ride_id`, `ride_date`, `ride_distance`, `ride_photo`, `user_id`, `transport_id`) VALUES
(1, '2024-02-01', 2.5, 'parc_epicerie.jpg', 1, 1),
(2, '2024-02-02', 3.8, 'bureau_parc.jpg', 2, 2),
(3, '2024-02-03', 4.2, 'gym_magasin.jpg', 3, 1),
(4, '2024-02-01', 2.5, 'parc_epicerie.jpg', 1, 1),
(5, '2024-02-02', 3.8, 'bureau_parc.jpg', 2, 2),
(6, '2024-02-03', 4.2, 'gym_magasin.jpg', 3, 1),
(7, '2024-02-01', 2.5, 'parc_epicerie.jpg', 1, 1),
(8, '2024-02-02', 3.8, 'bureau_parc.jpg', 2, 2),
(9, '2024-02-03', 4.2, 'gym_magasin.jpg', 3, 1),
(64, '2024-02-04', 7.3, 'maison_travail.jpg', 1, 3),
(65, '2024-02-05', 1.2, 'travail_restaurant.jpg', 1, 1),
(66, '2024-02-06', 5.6, 'maison_bureau.jpg', 2, 2),
(67, '2024-02-07', 2.1, 'bureau_parc.jpg', 2, 2),
(68, '2024-02-08', 3.9, 'maison_bureau.jpg', 3, 3),
(70, '2024-02-10', 1.8, 'maison_epicerie.jpg', 4, 4),
(71, '2024-02-11', 0.9, 'epicerie_cafe.jpg', 4, 4),
(72, '2024-02-12', 6.5, 'maison_travail.jpg', 5, 5),
(73, '2024-02-13', 3.3, 'travail_parc.jpg', 5, 5),
(74, '2024-02-14', 6.4, 'maison_travail.jpg', 5, 5),
(75, '2024-02-15', 2.2, 'travail_boulangerie.jpg', 5, 5),
(76, '2024-02-16', 7.1, 'maison_travail.jpg', 1, 3),
(77, '2024-02-17', 1.5, 'travail_restaurant.jpg', 1, 1),
(78, '2024-02-18', 5.3, 'maison_bureau.jpg', 2, 2),
(79, '2024-02-19', 2.5, 'bureau_parc.jpg', 2, 2),
(80, '2024-02-20', 4, 'maison_bureau.jpg', 3, 3),
(81, '2024-02-21', 4.2, 'bureau_parc.jpg', 3, 3),
(116, '2024-01-28', 6, NULL, 10, 3),
(121, '2024-01-17', 2, NULL, 54, 3),
(122, '9999-09-09', 9.22337e18, NULL, 53, 2),
(123, '2024-01-05', 21, NULL, 52, 1),
(127, '2024-02-14', 5, NULL, 10, 3),
(135, '2024-02-01', 36, '', 66, 3),
(138, '2024-10-10', 1, '', 75, 1),
(139, '2024-02-08', 7, '', 74, 2);

-- --------------------------------------------------------

--
-- Structure de la table `transport`
--

CREATE TABLE `transport` (
  `transport_id` int NOT NULL,
  `transport_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `transport`
--

INSERT INTO `transport` (`transport_id`, `transport_type`) VALUES
(1, 'Le vélo'),
(2, 'La trottinette'),
(3, 'La marche'),
(4, 'Le roller'),
(5, 'Le skate');

-- --------------------------------------------------------

--
-- Structure de la table `transport_pris_en_compte`
--

CREATE TABLE `transport_pris_en_compte` (
  `events_id` int NOT NULL,
  `transport_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `transport_pris_en_compte`
--

INSERT INTO `transport_pris_en_compte` (`events_id`, `transport_id`) VALUES
(2, 1),
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `userprofil`
--

CREATE TABLE `userprofil` (
  `user_id` int NOT NULL,
  `user_validate` tinyint(1) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_pseudo` varchar(50) NOT NULL,
  `user_describ` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_dateofbirth` date NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_photo` varchar(50) DEFAULT NULL,
  `enterprise_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `userprofil`
--

INSERT INTO `userprofil` (`user_id`, `user_validate`, `user_name`, `user_firstname`, `user_pseudo`, `user_describ`, `user_email`, `user_dateofbirth`, `user_password`, `user_photo`, `enterprise_id`) VALUES
(1, 1, 'Dupont', 'Alice', 'alice89', 'I love coding!', 'alice@example.com', '1990-05-15', 'PasswordAlice', 'alice.jpg', 1),
(2, 1, 'Martin', 'Bob', 'bob92', 'Passionate about technology', 'bob@example.com', '1985-09-20', 'PasswordBob', 'bob.jpg', 1),
(3, 1, 'Leclerc', 'Caroline', 'caro77', 'Travel enthusiast', 'caroline@example.com', '1988-12-10', 'PasswordCaroline', 'caroline.jpg', 1),
(4, 1, 'Lefevre', 'David', 'david78', 'Nature lover', 'david@example.com', '1982-07-25', 'PasswordDavid', 'david.jpg', 2),
(5, 1, 'Bertrand', 'Émilie', 'emilie_94', 'Art and culture enthusiast', 'emilie@example.com', '1995-02-03', 'PasswordEmilie', 'emilie.jpg', 2),
(6, 1, 'Lambert', 'François', 'francois123', 'Fitness and sports', 'francois@example.com', '1987-11-08', 'PasswordFrancois', 'francois.jpg', 2),
(7, 1, 'festin', 'bryan', 'banana', NULL, 'banana@gmail.com', '2024-01-19', '$2y$10$fRgExivPbTmfhp6EbrJ74uLPOOBoXc.Y4DmBrsQq/djs4kqN8SHfC', 'default.png', 1),
(8, 1, 'Provoke', 'Sora', 'Sora', NULL, 'Sora@mail.fr', '2024-01-01', '$2y$10$oltFxpDRo.Pf14uGgtf.kew.GG8yB1uyGrA52NRt0jPig80ECo5p6', 'default.png', 1),
(10, 1, 'aminelebg', 'Gojo', 'sora', 'je vous tape tous sur tekker8 et street fighter', 'nassim@mail.fr', '2024-01-05', '$2y$10$tIyEOGMJNv5SXbDC2ErDC.9pihvUvjC2gEknzlqsSv00LVx07kCzS', 'IMG_4677.jpeg', 1),
(20, 1, 'dfsfs', 'zaea', 'sfdsfsq', NULL, 'jsp@mail.fr', '2020-01-10', '$2y$10$RK0klDVOYANIsNnE4xlf2OxjOS5N8j.vct.cqGo3cwDW3SUQ3R1IO', 'default.png', 1),
(21, 1, 'dfsfs', 'bryan', 'banana', NULL, 'azavfds@gmail.com', '1998-10-10', '$2y$10$/wSppWDH1qgn4pGHKgzlPudPu5FVRT7GmfF4KHHCosl4beWLQ66sC', 'default.png', 1),
(47, 1, 'lil', 'uzi', 'vert', NULL, 'lil@uzivert.fr', '1998-10-10', '$2y$10$tYII3D2jujPRd.cjQZT7vuHJIwjgU6RXr4PKAhZNd6FrpJTplGugW', 'default.png', 1),
(50, 1, 'soso', 'lali', 'lalou', NULL, 'lali@mail.fr', '1998-10-10', '$2y$10$5cLLBtpQe/LrsxRDgCQar.JKm247KMLcIFetkzkZDwkaBOLlDBlq2', 'default.png', 1),
(51, 1, 'chedy', 'elaifia', 'ch.el', NULL, 'elaifia.chedy@gmail.com', '1990-03-25', '$2y$10$y0wQEFbJfzicC2S3A.lfCOpAcQ6ex7DiydqrwZnqQc1H.IfRIng/C', 'default.png', 1),
(52, 1, 'Festin', 'Bryan', 'Goeland', 'Il ne sait pas faire la diff entre un goeland et une mouette', 'festinb@gmail.com', '2024-01-27', '$2y$10$68ksMq/GjOgm/BIynYZGu.LWtB.gBlKZslTaLIvOV3z348DeUt05i', '17072064139384162774492716841611.jpg', 2),
(53, 1, 'caca', 'prout', 'impot', NULL, 'azerty@gmail.com', '1996-10-10', '$2y$10$JzkVwqwCSooQUrkJzkJyKe0wk8rd0kzS2oeTQVK74docW5fvnbGoe', NULL, 1),
(54, 1, 'Toto', 'Tata', 'tota', NULL, 'tota@mail.fr', '2024-01-08', '$2y$10$YQyjsX.Lb/dk2o332GdX9OXOahyd6bQMwNii3f.OJDhPxjYw5CZ26', NULL, 1),
(55, 1, 'azuz', 'aze', 'looser54', NULL, 'ooserkoko@gmail.com', '2024-01-03', '$2y$10$wfVhKH1lI1iMUY/8m5SCUuKYCb9yhMbgybamw3B8Lit./WSbp8pdy', NULL, 2),
(56, 1, 'Segura', 'Omar', 'zRaW', 'Fan de cinéma et jeux vidéos.', 'Omarsegura76300@gmail.com', '2001-08-24', '$2y$10$RYW9hdsaD2TtA2f9v01eveu/F.DDkP/r9DdtfKF/M4miY..jtp7BS', NULL, 1),
(60, 1, 'kazama', 'jin', 'Kazama', NULL, 'kaz@mail.fr', '1998-10-10', '$2y$10$X2h.yNNFvpIo92vsGvgooe5Q6kkTGbIXGTLa38wQ7m/XEVPKkG6he', NULL, 3),
(64, 1, 'Coco', 'Rat', 'Illl', NULL, 'Abc@def.fr', '2024-02-01', '$2y$10$vrN.Tdt.9M2vlaNVv71iQ.dFGRannUYBZlxFroPOhDhA67unaD9CC', NULL, 2),
(66, 1, 'Poirier-Halley', 'Hélène', 'LNteflingue', NULL, 'poirier.helene@outlook.fr', '1981-10-25', '$2y$10$iL37NOsuPHAEru.3NP7gdeOn93aFeoC9iZTaCoxhqub5xmPPMO8Rm', NULL, 3),
(67, 1, 'Azerty', 'Ytreza', 'Azerty30', NULL, 'Azerty@mail.com', '2024-02-05', '$2y$10$ln8G4WEsKeZrepHa0/2rf.H3FDEO0I9imsyj4mIj2d2FliY1sGsFi', 'CD018D74-326E-4BAA-80E7-EE2321E15B4F.jpeg', 3),
(68, 1, 'Soso', 'Soraya', 'Soraya', NULL, 'soso@mail.fr', '2024-02-06', '$2y$10$yqfAanwNoIDdwTsOI1m4Aug6S/8VQlhApeozbz1u2.1J6we2S1pxy', NULL, 1),
(69, 1, 'kazama', 'jin', 'jinpussyslayer', NULL, 'jin@mail.fr', '1998-10-10', '$2y$10$4qknwtP.e/6c./qJmPdNBuqvuOvXf4vkqmc6906zofftuAgIykVQW', NULL, 8),
(70, 1, 'j&#039;aimepas', 'Amine', 'jesuisnul', NULL, 'amine@jepue.fr', '1998-10-10', '$2y$10$6R9jDUaDRQ7FxdRKFWS/8O.aqw26FWHKu7gKd77wT.f0zli.zhgnG', NULL, 8),
(72, 1, 'fdsdgf', 'gsfdgfds', 'dsgfdsgfd', NULL, 'dsgfd@mail.fr', '1998-10-10', '$2y$10$nwyeRh0Sh1zw8VpBCMvZXO5MRjlSGzuDi52N9cuh1M50woIF4wqjC', NULL, 8),
(73, 1, 'dsgfdsgf', 'gfdgfdhfd', 'supertest', NULL, 'dsfdsgf@mail.fr', '1998-10-10', '$2y$10$m6ohmHV5QjdP49ZN7a9SxeDr09klZ/1ShhTbVxCqygFvx3FMQBuW6', NULL, 8),
(74, 1, 'bababa', 'bibibi', 'babi', NULL, 'babi@mail.fr', '1998-10-10', '$2y$10$aHdP.o.tnm5UB98ithffS.DdQco.o0VqgS8Inj75W7iRvG/R72FbW', NULL, 8),
(75, 1, 'jesaispaas', 'toujourspas', 'ok', NULL, 'rzerfx@mail.fr', '1998-10-10', '$2y$10$1bhGXsk8B78e6d6qMVWDVOjfQYPSzdurntLpDTpSZzwmhAijDkXQ.', NULL, 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Index pour la table `enterprise`
--
ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`enterprise_id`),
  ADD UNIQUE KEY `enterprise_siret` (`enterprise_siret`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`events_id`),
  ADD KEY `enterprise_id` (`enterprise_id`);

--
-- Index pour la table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`ride_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `transport_id` (`transport_id`);

--
-- Index pour la table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transport_id`);

--
-- Index pour la table `transport_pris_en_compte`
--
ALTER TABLE `transport_pris_en_compte`
  ADD PRIMARY KEY (`events_id`,`transport_id`),
  ADD KEY `transport_id` (`transport_id`);

--
-- Index pour la table `userprofil`
--
ALTER TABLE `userprofil`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `enterprise_id` (`enterprise_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `enterprise`
--
ALTER TABLE `enterprise`
  MODIFY `enterprise_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `events_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ride`
--
ALTER TABLE `ride`
  MODIFY `ride_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT pour la table `transport`
--
ALTER TABLE `transport`
  MODIFY `transport_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `userprofil`
--
ALTER TABLE `userprofil`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprise` (`enterprise_id`);

--
-- Contraintes pour la table `ride`
--
ALTER TABLE `ride`
  ADD CONSTRAINT `ride_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofil` (`user_id`),
  ADD CONSTRAINT `ride_ibfk_2` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`transport_id`);

--
-- Contraintes pour la table `transport_pris_en_compte`
--
ALTER TABLE `transport_pris_en_compte`
  ADD CONSTRAINT `transport_pris_en_compte_ibfk_1` FOREIGN KEY (`events_id`) REFERENCES `events` (`events_id`),
  ADD CONSTRAINT `transport_pris_en_compte_ibfk_2` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`transport_id`);

--
-- Contraintes pour la table `userprofil`
--
ALTER TABLE `userprofil`
  ADD CONSTRAINT `userprofil_ibfk_1` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprise` (`enterprise_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
