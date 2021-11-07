-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 12 oct. 2021 à 03:52
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
-- Base de données :  `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `characteristics`
--

CREATE TABLE `characteristics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `characteristics`
--

INSERT INTO `characteristics` (`id`, `name`, `description`) VALUES
(3, 'Chomedy', 'Chomedy L’artère principale du quartier rappelle un petit centre-ville où l’on y trouve tous les services essentiels à seulement quelques coins de rue. Si vous considérez habiter à Laval, c’est un quartier à visiter absolument !\r\nÀ proximité:\r\nLe Carrefour Laval\r\nLe Centropolis\r\nLe Cosmodome\r\nLe Cinéplex\r\nLe Walmart\r\nPlusieurs gyms'),
(4, 'Vimont', 'De nouvelles constructions, de beaux espaces verts, des artères pleines de vie et des quartiers tranquilles où il fait bon vivre. On retrouve sur son territoire:\r\n\r\nUn milieu de vie paisible et dynamique\r\nDes maisons, condos et jumelés neufs\r\nL’Hôpital de la Cité-de-la-Santé\r\nUne quinzaine de parcs\r\nStations de train\r\nGymnases, écoles, banques…bref de tout !\r\nEt plus encore !'),
(5, 'Laval-des-Rapides', 'Ce quartier est réputé pour accueillir de nombreuses familles et compte beaucoup de maisons unifamiliales et logements abordables. Ce quartier devrait figurer sur votre liste de quartier à considérer, car il vient avec son lot d’avantages.\r\n\r\nIl est notamment :\r\nDirectement face à Montréal\r\nLe quartier hébergeant le Collège Montmorency');

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
(7, 4, 25),
(9, 5, 27),
(10, 4, 26);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci
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
-- Structure de la table `proprietes`
--

CREATE TABLE `proprietes` (
  `id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sold` tinyint(1) DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `proprietes`
--

INSERT INTO `proprietes` (`id`, `address`, `user_id`, `type`, `slug`, `sold`, `image`, `price`, `created`, `modified`) VALUES
(25, '6535 rue de Prince-Rupert, Laval', 12, 'Residential house', '6535-rue-de-Prince-Rupert-Laval', 1, 'devant.jpg', 345000, '2021-10-12 00:09:38', '2021-10-12 02:11:07'),
(26, '98 street Chapeleau', 14, 'Condo', '98-rue-Chapeleau', 0, 'devant-2.jpg', 765500, '2021-10-12 02:34:23', '2021-10-12 02:42:56'),
(27, '23 street Pageau, Laval', 15, 'Apartment', '23-rue-Pageau-Laval', 1, 'apartment.jpg', 2599999, '2021-10-12 02:38:16', '2021-10-12 02:41:07');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
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
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
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
-- Index pour la table `proprietes`
--
ALTER TABLE `proprietes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `proprietes`
--
ALTER TABLE `proprietes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
-- Contraintes pour la table `proprietes`
--
ALTER TABLE `proprietes`
  ADD CONSTRAINT `proprietes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
