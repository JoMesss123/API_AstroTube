-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 25 jan. 2024 à 01:23
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api-astrotube`
--

-- --------------------------------------------------------

--
-- Structure de la table `api_video`
--

CREATE TABLE `api_video` (
  `id` int NOT NULL,
  `titre` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `code` text COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_apparution` date NOT NULL,
  `duree` int NOT NULL,
  `nb_vue` int NOT NULL,
  `nb_like` int NOT NULL,
  `score` int NOT NULL,
  `nb_commentaire` int NOT NULL,
  `sous_titre` text COLLATE utf8mb4_general_ci NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `presentation` tinyint(1) NOT NULL,
  `categories` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `api_video`
--

INSERT INTO `api_video` (`id`, `titre`, `description`, `code`, `url`, `source`, `date_apparution`, `duree`, `nb_vue`, `nb_like`, `score`, `nb_commentaire`, `sous_titre`, `verified`, `presentation`, `categories`) VALUES
(1, 'The Big Bang Theor2y', 'The Big Bang Theory est une sitcom américaine en 279 épisodes de 22 minutes créée par Chuck Lorre et Bill Prady, diffusée du 24 septembre 2007 au 16 mai 2019 sur le réseau CBS.', 'TBBT', '../assets/img/milky.jpg', '', '2007-10-24', 22, 0, 0, 5, 1, 'CC', 1, 0, 'comedie'),
(2, 'Extra-terrestre', 'l existe aux États-Unis une zone très étrange, dépourvue de technologie électronique. Tout est fait pour satisfaire une machine qui cherche à détecter des civilisations extraterrestres.\r\n', 'LPA', '../assets/img/nebula.jpg', NULL, '2020-10-01', 21, 311, 5300, 5, 311, 'ST', 0, 0, 'science; documentaire'),
(3, 'La théorie des cordes', 'La théorie des cordes est une théorie physique qui tente de décrire l\'ensemble des phénomènes de la physique à partir d\'objets fondamentaux unidimensionnels appelés « cordes ».', 'LTC', '../assets/img/ngc-2818.jpg', NULL, '2020-10-01', 21, 311, 5300, 5, 311, 'CC', 1, 0, 'science; documentaire'),
(4, 'les secrets de l\'univers', 'L\'univers est l\'ensemble de tout ce qui existe, régi par un certain nombre de lois. L\'observation humaine de l\'univers est appelée astronomie.', 'LSU', '../assets/img/orion-nebula.jpg', NULL, '2020-09-16', 61, 1011, 1100, 5, 1011, 'ST', 1, 0, 'science; documentaire'),
(5, 'le temps n\'exite pas', 'Le temps est un concept développé par l\'être humain pour décrire l\'ordre et la durée des événements, et permet de les situer par rapport à soi.', 'LTNE', '../assets/img/planets.jpg', NULL, '2020-06-16', 13, 3800, 3800, 5, 440, 'CC', 0, 0, 'science; documentaire'),
(9, 'A-t-on enfin une vraie preuve d\'une visite extra-terrestre ?', 'L\'existence des extraterrestres est un sujet de débat dans le domaine de l\'ufologie et de la science-fiction. ', 'AEV', '../assets/img/space-7.jpg', '', '2020-09-16', 36, 38000, 30000, 8, 1, '10000', 0, 0, 'science; documentaire; '),
(10, 'A-t-on enfin une vraie preuve d\'une visite extra-terrestre ?', 'L\'existence des extraterrestres est un sujet de débat dans le domaine de l\'ufologie et de la science-fiction. ', 'AEV', '../assets/img/space-7.jpg', '', '2020-09-16', 36, 38000, 18000, 0, 1, '10000', 0, 0, 'science; documentaire; ');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id_auteur` int NOT NULL,
  `nom` text COLLATE utf8mb4_general_ci NOT NULL,
  `utilisateur` text COLLATE utf8mb4_general_ci NOT NULL,
  `decripstion_auteur` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `nom`, `utilisateur`, `decripstion_auteur`) VALUES
(1, 'Chuck Lorre', 'ChuckLorre', 'Chuck Lorre, de son vrai nom Charles Michael Levine, est un producteur, scénariste, compositeur et réalisateur américain né le 18 octobre 1952 à Bethpage, New York (États-Unis).'),
(2, 'le petit astronome', '@lepetitastronome', 'Le Petit Astronome est une chaîne Youtube qui vous permet de découvrir l\'astronomie et l\'astrophysique de façon simple et ludique.'),
(3, '            nom:\"le petit astronome\",\r\n', '            utilisateur:\"@lepetitastronome\",\r\n', '            description_auteur:\"Le Petit Astronome est une chaîne Youtube qui vous permet de découvrir l\'astronomie et l\'astrophysique de façon simple et ludique. \",\r\n'),
(4, 'Kosmo FR', '@kosmofr', 'Kosmo est une association à but non lucratif qui a pour but de promouvoir l\'astronomie auprès du grand public.\r\n'),
(5, 'TheSimplySpace', '@thesimplyspace', 'TheSimplySpace est une chaîne Youtube qui vous permet de découvrir l\'astronomie et l\'astrophysique de façon simple et ludique.'),
(6, 'astronogeek', '@astronogeek', 'astronogeek est une chaîne Youtube qui vous permet de découvrir l\'astronomie et l\'astrophysique de façon simple et ludique. ');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int NOT NULL,
  `note` int NOT NULL,
  `commentaire` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `auteur` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_video` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `note`, `commentaire`, `date`, `auteur`, `id_video`) VALUES
(1, 6, 'The Big Bang Theory est une sitcom américaine en 279 épisodes de 22 minutes créée par Chuck Lorre et Bill Prady, diffusée du 24 septembre 2007 au 16 mai 2019 sur le réseau CBS.', '2019-05-16', 'Chuck Loree', 1),
(2, 5, 'blblabalanblabalbalalbalalbalablabal', '2023-11-01', '@moi-meme', 2),
(3, 5, 'Juste une petite précision concernant l\'interdiction des véhicules à essence autour du télescope. Ce n\'est pas l\'essence qui émet une onde électromagnétique, mais la commande d\'allumage du mélange essence/air dans le moteur qui se fait par une étincelle générée haute tension. Aussi, suivant le régime du moteur, la fréquence de cet allumage change constamment, ce qui est encore plus gênant. Pour les moteurs Diesel, l\'allumage est spontané et n\'a pas besoin d\'étincelle pour fonctionner. \r\n', '2023-10-01', '@zeboulon\r\n', 3),
(4, 5, 'L\'univers est l\'ensemble de tout ce qui existe, régi par un certain nombre de lois. L\'observation humaine de l\'univers est appelée astronomie. ', '2023-10-01', '@zeboulon', 4),
(5, 8, 'Le nouveau télescope apporte de la matière à réflexion ! Au moins, grâce à lui, on peut enfin remettre en question certaines théories... non pas pour les rejeter d’emblée, mais pour les confronter aux nouvelles réalités observées... Et en parlant d’observations, on a appris que les galaxies s’éloignent les unes des autres grâce à l’analyse de leurs spectres lumineux... ce qui, me semble-t-il, a conduit des scientifiques à émettre l’hypothèse que si tous ces grands corps célestes se dispersaient ainsi, il devait y avoir une origine à cette propulsion vers les 4 coins de l’Univers... D’où, la théorie du Big Bang.', '2023-10-01', '@gerard', 5),
(6, 5, 'blblabalanblabalbalalbalalbalablabal', '2023-11-01', '@moi-meme', 2);

-- --------------------------------------------------------

--
-- Structure de la table `coordonnee`
--

CREATE TABLE `coordonnee` (
  `id_coordonnee` int NOT NULL,
  `courriel` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `facebook` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `twitter` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `instagram` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `youtube` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `site` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `twitch` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `coordonnee`
--

INSERT INTO `coordonnee` (`id_coordonnee`, `courriel`, `facebook`, `twitter`, `instagram`, `youtube`, `site`, `twitch`) VALUES
(1, 'qwert@gmail.com', 'https://www.facebook.com/chuck.lorre.7', 'https://twitter.com/chucklorre', 'https://www.instagram.com/chucklorre/', 'https://www.youtube.com/user/ChuckLorre', 'https://chucklorre.com/', 'https://www.twitch.tv/chucklorre'),
(2, 'lepetitastronome74@gmail.com', 'https://www.facebook.com/profile.php?id=100086130316488', 'https://twitter.com/lepetitastronome', 'https://www.instagram.com/lepetitastronome/', 'https://www.youtube.com/@PetitAstronome/featured', 'https://lepetitastronome.com/', 'https://www.twitch.tv/lepetitastronome'),
(3, '                courriel:\"lepetitastronome74@gmail.com\",\r\n', '                facebook:\"https://www.facebook.com/profile.php?id=100086130316488\",\r\n', '                twitter:\"https://twitter.com/lepetitastronome\",\r\n', '                instagram:\"https://www.instagram.com/lepetitastronome/\",\r\n', '                youtube:\"https://www.youtube.com/@PetitAstronome/featured\",\r\n\r\n', '                                site:\"https://lepetitastronome.com/\",\r\n\r\n', '                twitch:\"https://www.twitch.tv/lepetitastronome\",\r\n'),
(4, 'okosmo.pdt@gmail.com\r\n', 'https://www.facebook.com/KosmoFR', 'https://twitter.com/KosmoFR', 'https://www.instagram.com/kosmofr/', 'https://www.youtube.com/@Kosmo_FR/featured', 'https://kosmofr.com', 'https://www.twitch.tv/kosmofr'),
(5, 'thesimply@gmail.com', 'https://www.facebook.com/TheSimplySpace', 'https://twitter.com/TheSimplySpace', 'https://www.instagram.com/thesimplyspace/', 'https://www.youtube.com/@TheSimplySpace/featured', 'https://thesimplyspace.com/', 'https://www.twitch.tv/thesimplyspace'),
(6, 'astronogeek@gmail.com', 'https://www.facebook.com/astronogeek', 'https://twitter.com/astronogeek', 'https://www.instagram.com/astronogeek/', 'https://www.youtube.com/@astronogeek/featured', 'https://astronogeek.com/', 'https://www.twitch.tv/astronogeek');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `api_video`
--
ALTER TABLE `api_video`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_video` (`id_video`);

--
-- Index pour la table `coordonnee`
--
ALTER TABLE `coordonnee`
  ADD PRIMARY KEY (`id_coordonnee`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `api_video`
--
ALTER TABLE `api_video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id_auteur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `coordonnee`
--
ALTER TABLE `coordonnee`
  MODIFY `id_coordonnee` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD CONSTRAINT `auteur_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `coordonnee` (`id_coordonnee`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `id_video` FOREIGN KEY (`id_video`) REFERENCES `api_video` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
