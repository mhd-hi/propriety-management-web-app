-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 17 nov. 2021 à 03:57
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immobilier_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `characteristics`
--

CREATE TABLE `characteristics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `characteristics`
--

INSERT INTO `characteristics` (`id`, `name`, `description`) VALUES
(3, 'Garage extérieur', 'Se situe à lextérieur de la maison'),
(4, 'Garage sous-terrain', 'Basé en bas de la baptise'),
(5, 'Pas de garage', 'Pas de place pour se garer!');

-- --------------------------------------------------------

--
-- Structure de la table `characteristics_proprietes`
--

CREATE TABLE `characteristics_proprietes` (
  `id` int(11) NOT NULL,
  `characteristic_id` int(11) NOT NULL,
  `propriete_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `characteristics_proprietes`
--

INSERT INTO `characteristics_proprietes` (`id`, `characteristic_id`, `propriete_id`) VALUES
(9, 5, 27),
(10, 4, 26),
(11, 3, 28),
(13, 3, 25),
(30, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(4, 'it_IT', 'Proprietes', 25, 'address', '6535 strada del Prince-Rupert, Laval'),
(5, 'it_IT', 'Proprietes', 25, 'type', 'Casa residenziale'),
(6, 'fr_CA', 'Proprietes', 27, 'type', 'Apartement'),
(7, 'it_IT', 'Proprietes', 26, 'address', '98 strada Chapeleau'),
(8, 'it_IT', 'Proprietes', 27, 'address', '23 strada Pageau, Laval'),
(9, 'fr_CA', 'Proprietes', 27, 'address', '23 rue Pageau, Laval'),
(10, 'it_IT', 'Proprietes', 27, 'type', 'appartamento'),
(11, 'it_IT', 'Proprietes', 26, 'type', 'condominio'),
(12, 'fr_CA', 'Proprietes', 26, 'address', '98 rue Chapeleau');

-- --------------------------------------------------------

--
-- Structure de la table `municipalities`
--

CREATE TABLE `municipalities` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `municipalities`
--

INSERT INTO `municipalities` (`id`, `province_id`, `region_id`, `code`, `name`) VALUES
(1, 1, 1, '65005', 'Laval'),
(2, 2, 2, '204', 'Churchill'),
(3, 2, 2, '431', 'Flin Flon'),
(4, 2, 2, '431', 'Thompson'),
(5, 2, 2, '15', 'Western Manitoba'),
(8, 2, 1, '123', 'ville'),
(9, 3, 13, '1', 'Ottawa'),
(10, 3, 13, '2', 'Ajax'),
(11, 1, 8, 'Chibougama', '99025'),
(12, 1, 8, '99020', 'Chapais'),
(13, 1, 4, '66107', 'Beaconsfield'),
(14, 1, 4, '66023', 'Montréal'),
(15, 1, 5, '46035', 'Bedford'),
(17, 1, 5, '46078', 'Bromont'),
(18, 1, 5, '47017', 'Granby'),
(19, 1, 6, '61025', 'Joliette'),
(20, 1, 6, '640415', 'Mascouche'),
(21, 1, 7, '74005', 'Mirabel'),
(22, 1, 11, '93042', 'Alma'),
(23, 1, 12, '21025', 'Beaupré'),
(24, 3, 20, '234', 'Toronto');

-- --------------------------------------------------------

--
-- Structure de la table `proprietes`
--

CREATE TABLE `proprietes` (
  `id` int(11) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `municipality_id` int(11) NOT NULL DEFAULT '1',
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sold` tinyint(1) DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `proprietes`
--

INSERT INTO `proprietes` (`id`, `address`, `user_id`, `municipality_id`, `type`, `slug`, `sold`, `image`, `price`, `created`, `modified`) VALUES
(1, '6535 rue de Marguerite', 12, 1, 'Résidentiel', '6535-rue-de-Marguerite', 0, 'devant.jpg', 345111, '2021-10-12 00:09:38', '2021-11-11 00:56:51'),
(25, '6535 rue de Prince-Rupert', 12, 1, 'Duplex', '6535-rue-de-Prince-Rupert-Laval', 0, 'devant.jpg', 5900900, '2021-10-12 00:09:38', '2021-11-03 07:09:03');

-- --------------------------------------------------------

--
-- Structure de la table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `provinces`
--

INSERT INTO `provinces` (`id`, `code`, `name`) VALUES
(1, 'QC', 'Québec'),
(2, 'MA', 'Manitoba'),
(3, 'ON', 'Ontario '),
(4, 'NL', 'Terre-Neuve'),
(5, 'NS', 'Nouvelle-Écosse'),
(6, 'SK', 'Saskatchewan'),
(7, 'AB', 'Alberta'),
(8, 'BC', 'Colombie-Britannique'),
(9, 'YT', 'Yukon'),
(10, 'NT', 'Territoires du Nord-Ouest'),
(11, 'NB', 'Nouveau-Brunswick');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `province_id`, `code`, `name`) VALUES
(1, 1, '14', 'Laval'),
(2, 2, '8', 'North Region'),
(3, 2, '13', 'Prairies'),
(4, 1, '6', 'Montréal'),
(5, 1, '5', 'Estrie'),
(6, 1, '14', 'Lanaudìère'),
(7, 1, '15', 'Laurentides'),
(8, 1, '10', 'Nord-du-Québec'),
(9, 2, '14', 'Central Plains'),
(10, 2, '5', 'Winnipeg'),
(11, 1, '2', 'Saguenay-Lac-Saint-Jean'),
(12, 1, '3', 'Capitale-Nationale'),
(13, 3, '1', 'Northern'),
(14, 9, '1', 'Watson Lake'),
(15, 4, '1', 'Saint-John\'s'),
(16, 5, '1', 'Digby'),
(17, 6, '1', 'Athabasca'),
(18, 7, '1', 'Parkland'),
(19, 8, '1', 'Vancouver'),
(20, 3, '5', 'Toronto region');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Secretaire'),
(2, 'Agent'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `uuid`, `role_id`, `name`, `email`, `confirmed`, `password`, `created`, `modified`) VALUES
(12, '00888bc9-e7c9-4b8f-bb11-d5dff013316f', 3, 'Mohamed Hafdi', 'mhdhafdi2@gmail.com', 1, '$2y$10$Ji3nH0tp4XW/p0jGDN5Y4O0MWgJHGddiQ6HijCJiRHpZgkYsYXy2C', '2021-10-11 23:51:51', '2021-10-11 23:54:08'),
(13, 'ec04ee7f-7591-425b-bf3b-67b477b9fc20', 2, 'Roger Admont', 'mohamedhafdi@yopmail.com', 0, '$2y$10$pvWMZM6iX6AEE6DIc.s/7O/Pq5.X7WyyBtsTYVyOtOs3bW5GJhiGO', '2021-10-12 00:11:35', '2021-10-12 02:32:12'),
(14, '7db945b0-0a18-46cb-9a72-7706a1c9d38c', 2, 'Mark Zuckerberg', 'markzuckerberg@yopmail.com', 1, '$2y$10$PPlRYrMjZ8TCUJgM2IL6IOaTe/2y6c624nxgAxZMUyM7vDOf7BzTy', '2021-10-12 02:31:29', '2021-10-12 02:32:01'),
(15, '9edd5163-1ba6-4d91-9551-2b2de1a9fcd4', 1, 'Marine Lepen', 'marinelepen@yopmail.com', 0, '$2y$10$oRVR074WEQ3FPGVU4/6hTO0XaMhcNExLVnIQrd0yDg5wk/P3Gdyn2', '2021-10-12 02:32:50', '2021-10-12 02:32:50');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `characteristics`
--
ALTER TABLE `characteristics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `characteristics_proprietes`
--
ALTER TABLE `characteristics_proprietes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_characteristic_id` (`characteristic_id`),
  ADD KEY `fk_characteristic_id_id` (`propriete_id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Index pour la table `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipalities_provinces` (`province_id`),
  ADD KEY `municipalities_regions` (`region_id`);

--
-- Index pour la table `proprietes`
--
ALTER TABLE `proprietes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pro_muni` (`municipality_id`);

--
-- Index pour la table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regions_provinces` (`province_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `uuid` (`uuid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `characteristics`
--
ALTER TABLE `characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `characteristics_proprietes`
--
ALTER TABLE `characteristics_proprietes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `municipalities`
--
ALTER TABLE `municipalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `proprietes`
--
ALTER TABLE `proprietes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `characteristics_proprietes`
--
ALTER TABLE `characteristics_proprietes`
  ADD CONSTRAINT `fk_characteristic_id_id` FOREIGN KEY (`propriete_id`) REFERENCES `proprietes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_id_characteristic_id` FOREIGN KEY (`characteristic_id`) REFERENCES `characteristics` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `municipalities`
--
ALTER TABLE `municipalities`
  ADD CONSTRAINT `municipalities_provinces` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `municipalities_regions` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `proprietes`
--
ALTER TABLE `proprietes`
  ADD CONSTRAINT `pro_muni` FOREIGN KEY (`municipality_id`) REFERENCES `municipalities` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `proprietes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_provinces` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
