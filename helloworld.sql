-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 11 Avril 2023 à 16:42
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

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
  `id_ami` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ami`
--

INSERT INTO `ami` (`id_utilisateur`, `id_ami`) VALUES
(2, 3),
(3, 4),
(3, 20),
(4, 3),
(4, 20),
(10, 2),
(10, 6);

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

--
-- Contenu de la table `destination`
--

INSERT INTO `destination` (`id`, `nom`, `pays`) VALUES
(1, 'Tokyo', 'Japon'),
(2, 'Paris', 'France'),
(3, 'New York', 'États-Unis'),
(4, 'Rome', 'Italie'),
(5, 'Londres', 'Royaume-Uni'),
(6, 'Sydney', 'Australie'),
(7, 'Rio de Janeiro', 'Brésil'),
(8, 'Dubai', 'Émirats arabes unis'),
(9, 'Cape Town', 'Afrique du Sud'),
(10, 'Santorin', 'Grèce');

-- --------------------------------------------------------

--
-- Structure de la table `like`
--

CREATE TABLE `like` (
  `id_post` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `like`
--

INSERT INTO `like` (`id_post`, `id_utilisateur`) VALUES
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `id_destination` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `image`, `description`, `id_destination`, `id_utilisateur`) VALUES
(1, './images/photo_post/France.jpg', '"Wine, cheese, art, and architecture - France has it all. Je suis tombé amoureux!', 2, 5),
(2, './images/photo_post/Angleterre.jpg', 'Exploring the charming countryside and iconic landmarks of England was a true delight.', 2, 3),
(3, './images/photo_post/Russie.jpg', 'The grandeur of Russia\'s architecture and culture left me speechless', 3, 4),
(4, './images/photo_post/Japon.jpg', 'The blend of tradition and modernity in Japan is simply fascinating', 1, 9),
(5, './images/photo_post/Etats_Unis.jpg', 'From the bustling cities to the awe-inspiring natural wonders, the United States never ceases to amaze me.', 2, 6),
(6, './images/photo_post/Bali.jpg', 'My Wonderful trip to Bali !!!', 3, 7),
(7, './images/photo_post/Laponie.jpg', 'Experiencing the magical winter wonderland of Lapland was a dream come true.', 1, 8),
(8, './images/photo_post/Italie.jpg', 'Italy stole my heart with its stunning architecture and delicious food.', 2, 2),
(9, './images/photo_post/Croatie.jpg', 'Discovering the hidden gems of Croatia was truly amazing.', 3, 10),
(10, './images/photo_post/Chine.jpg', 'Unforgettable memories from my trip to China!', 1, 2),
(14, './images/photo_post/64307e15170176.09422156.jpg', 'Do you want to see my dog ?', 2, 2),
(15, './images/photo_post/643196851c8488.74501004.png', 'Mon projet mdrrr', 2, 20),
(16, './images/photo_post/6431a40f2d77f0.92675944.png', 'dghrdth', 2, 3),
(17, './images/photo_post/6432a4acee3096.58538827.png', 'CRUNCH TIME', 2, 3),
(18, './images/photo_post/64356c13560d48.66091992.jpg', 'mon chien', 2, 3);

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
(6, 'Sophie', 'Rousseau', 'sophie_r', 'sophie.rousseau@mail.com', 'pass_sophie', './images/photo_de_profil/pdp_sophie.jpg'),
(7, 'Kevin', 'Nguyen', 'kevin_n', 'kevin.nguyen@mail.com', 'pass_kevin', './images/photo_de_profil/pdp_kevin.jpg'),
(8, 'Jules', 'Lefevre', 'jules_l', 'jules.lefevre@mail.com', 'pass_jules', './images/photo_de_profil/pdp_jules.jpg'),
(9, 'Emma', 'Moreau', 'emma_m', 'emma.moreau@mail.com', 'pass_emma', './images/photo_de_profil/pdp_emma.jpg'),
(10, 'Hugo', 'Girard', 'hugo_g', 'hugo.girard@mail.com', 'pass_hugo', './images/photo_de_profil/pdp_hugo.jpg'),
(19, 'Bonnefoy', 'Aubin', 'aubin12', 'aubin.bonnefoy25@hotmail.fr', '123456', './images/photo_de_profil/avatar.png'),
(20, 'Aubin', 'Bonnefoy', 'aubin', 'aubin.bonnefo25@hotmail.fr', '258456', './images/photo_de_profil/avatar.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ami`
--
ALTER TABLE `ami`
  ADD PRIMARY KEY (`id_utilisateur`,`id_ami`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_ami` (`id_ami`);

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
-- Index pour la table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id_post`,`id_utilisateur`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_post` (`id_post`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_destination` (`id_destination`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ami`
--
ALTER TABLE `ami`
  ADD CONSTRAINT `ami_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `ami_ibfk_2` FOREIGN KEY (`id_ami`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);

--
-- Contraintes pour la table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_destination` FOREIGN KEY (`id_destination`) REFERENCES `destination` (`id`),
  ADD CONSTRAINT `post_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
