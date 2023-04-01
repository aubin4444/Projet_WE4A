-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 01 Avril 2023 à 13:29
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `helloworld`
--

-- --------------------------------------------------------

--
-- Structure de la table `ami`
--

CREATE TABLE `ami` (
  `id_utilisateur` int(11) NOT NULL,
  `id_amis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `contenu` varchar(500) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

CREATE TABLE `destination` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `is_like` tinyint(1) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `id_destination` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mot_de_passe` varchar(100) DEFAULT NULL,
  `photo_profil` varchar(200) DEFAULT './images/photo_de_profil/avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `prenom`, `nom`, `pseudo`, `email`, `mot_de_passe`, `photo_profil`) VALUES
(2, 'Alice', 'Martin', 'alice_m', 'alice.martin@mail.com', 'pass_alice', './images/photo_de_profil/pdp_alice.jpg'),
(3, 'Lucas', 'Leroy', 'lucas_l', 'lucas.leroy@mail.com', 'pass_lucas', './images/photo_de_profil/pdp_lucas.jpg'),
(4, 'Marie', 'Garcia', 'marie_g', 'marie.garcia@mail.com', 'pass_marie', './images/photo_de_profil/pdp_marie.jpg'),
(5, 'Alex', 'Dubois', 'alex_d', 'alex.dubois@mail.com', 'pass_alex', './images/photo_de_profil/pdp_alex.jpg'),
(6, 'Sophie', 'Rousseau', 'sophie_r', 'sophie.rousseau@mail.com', 'pass_sophie', './images/photo_de_profil/avatar.png'),
(7, 'Kevin', 'Nguyen', 'kevin_n', 'kevin.nguyen@mail.com', 'pass_kevin', './images/photo_de_profil/pdp_kevin.jpg'),
(8, 'Jules', 'Lefevre', 'jules_l', 'jules.lefevre@mail.com', 'pass_jules', './images/photo_de_profil/avatar.png'),
(9, 'Emma', 'Moreau', 'emma_m', 'emma.moreau@mail.com', 'pass_emma', './images/photo_de_profil/avatar.png'),
(10, 'Hugo', 'Girard', 'hugo_g', 'hugo.girard@mail.com', 'pass_hugo', './images/photo_de_profil/avatar.png'),
(19, 'Bonnefoy', 'Aubin', 'aubin12', 'aubin.bonnefoy25@hotmail.fr', '123456', './images/photo_de_profil/avatar.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ami`
--
ALTER TABLE `ami`
  ADD PRIMARY KEY (`id_utilisateur`,`id_amis`),
  ADD KEY `id_amis` (`id_amis`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_post` (`id_post`);

--
-- Index pour la table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_destination` (`id_destination`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ami`
--
ALTER TABLE `ami`
  ADD CONSTRAINT `ami_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `ami_ibfk_2` FOREIGN KEY (`id_amis`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_destination`) REFERENCES `destination` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
