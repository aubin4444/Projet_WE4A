-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 22 Avril 2023 à 20:40
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
(3, 2),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(4, 3),
(5, 2),
(5, 3),
(5, 10),
(6, 3),
(6, 5),
(6, 10),
(7, 3),
(7, 5),
(7, 6),
(8, 3),
(8, 5),
(8, 6),
(8, 7),
(9, 3),
(9, 6),
(9, 7),
(9, 8),
(9, 10),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(10, 8),
(10, 9);

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
  `description` varchar(500) DEFAULT ' ',
  `id_destination` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `image`, `description`, `id_destination`, `id_utilisateur`) VALUES
(1, './images/photo_post/France.jpg', '"Wine, cheese, art, and architecture - France has it all. Je suis tombé amoureux!', 2, 5),
(3, './images/photo_post/643eb16724ea73.46680093.jpg', 'cffds', 2, 4),
(4, './images/photo_post/Japon.jpg', 'The blend of tradition and modernity in Japan is simply fascinating', 1, 9),
(5, './images/photo_post/Etats_Unis.jpg', 'From the bustling cities to the awe-inspiring natural wonders, the United States never ceases to amaze me.', 2, 6),
(6, './images/photo_post/Bali.jpg', 'My Wonderful trip to Bali !!!', 3, 7),
(7, './images/photo_post/Laponie.jpg', 'Experiencing the magical winter wonderland of Lapland was a dream come true.', 1, 8),
(9, './images/photo_post/Croatie.jpg', 'Discovering the hidden gems of Croatia was truly amazing.', 3, 10),
(89, './images/photo_post/64442c5bbaeb65.96474043.jpg', 'Paris !!!!', 2, 4),
(90, './images/photo_post/64442c6c159f41.94421849.jpg', 'I love London', 2, 4),
(91, './images/photo_post/64442ce40e0874.49418660.aspx', 'Montreal is soooooo cool', 2, 2),
(92, './images/photo_post/64442d0043d9d1.67367107.jpg', 'beautiful Roma !!', 2, 2),
(95, './images/photo_post/64442d7e12c1b2.91565724.jpg', 'youhou', 2, 3),
(96, './images/photo_post/64442d9071fb63.24810643.jpg', 'wonderful !!', 2, 3),
(97, './images/photo_post/64442da14e0cf5.46260359.jpg', 'I love this country', 2, 3),
(99, './images/photo_post/6444372a7b8376.56481114.jpg', 'Bali !!', 2, 10),
(100, './images/photo_post/6444373b81b954.26081319.jpg', 'Viva Italia !', 2, 10),
(101, './images/photo_post/644437611d2535.90852708.jpg', 'Hajimemashite ', 2, 10),
(102, './images/photo_post/64443b01039e34.68538411.jpg', 'Russia and bear', 2, 10),
(103, './images/photo_post/64443a71282688.61872614.jpg', 'Cool', 2, 3),
(104, './images/photo_post/64443aace02846.53033461.jpg', 'Paris !!!!', 2, 3),
(106, './images/photo_post/6444442f844ca6.64663715.jpg', 'London beautiful city', 2, 5),
(107, './images/photo_post/6444444029ef27.40868165.aspx', 'woohhoo', 2, 5),
(108, './images/photo_post/644444aa5d7376.87060403.jpg', 'I love Italy', 2, 6),
(109, './images/photo_post/64444580ed8846.46931602.jpg', 'this city is amazing', 2, 7),
(110, './images/photo_post/644445943a0ea2.66243326.jpg', 'Croatie', 2, 7),
(111, './images/photo_post/644445c46e2c61.54812488.jpg', 'Bear bear bear', 2, 8),
(112, './images/photo_post/644445d47ec4d6.28324794.jpg', 'Beautiful', 2, 8),
(113, './images/photo_post/644446077e3363.41575638.jpg', 'I love it', 2, 9),
(114, './images/photo_post/6444461398b288.83223876.jpg', 'yoohoo', 2, 9);

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
(2, 'Alice', 'Martin', 'alice_m', 'alice.martin@mail.com', 'c0e4581bf1cefaab08c4d6fd06267c70', './images/photo_de_profil/pdp_alice.jpg'),
(3, 'Lucas', 'Leroy', 'lucas_l', 'lucas.leroy@mail.com', 'c897665128d35c7fdf40df16b6f848c4', './images/photo_de_profil/pdp_lucas.jpg'),
(4, 'Marie', 'Garcia', 'marie_g', 'marie.garcia@mail.com', 'd0cb94d990d6bdef813eafb4256a9e1b', './images/photo_de_profil/pdp_marie.jpg'),
(5, 'Alex', 'Dubois', 'alex_d', 'alex.dubois@mail.com', 'c8f083e97c0c602f01e2c0dd177bd4e5', './images/photo_de_profil/pdp_alex.jpg'),
(6, 'Sophie', 'Rousseau', 'sophie_r', 'sophie.rousseau@mail.com', 'c45f6ebfbb857f7488a1ffa285e50d7c', './images/photo_de_profil/pdp_sophie.jpg'),
(7, 'Kevin', 'Nguyen', 'kevin_n', 'kevin.nguyen@mail.com', '5845d506062c8df421c9d4a2634a0d62', './images/photo_de_profil/pdp_kevin.jpg'),
(8, 'Jules', 'Lefevre', 'jules_l', 'jules.lefevre@mail.com', 'e7cbe36ac726410cd7222658a6bb8f3b', './images/photo_de_profil/pdp_jules.jpg'),
(9, 'Emma', 'Moreau', 'emma_m', 'emma.moreau@mail.com', 'ecde2e073e3a892641053cd8344ba927', './images/photo_de_profil/pdp_emma.jpg'),
(10, 'Hugo', 'Girard', 'hugo_g', 'hugo.girard@mail.com', '27523ee81a81077c40f7565478622048', './images/photo_de_profil/pdp_hugo.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
