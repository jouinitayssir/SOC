-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 04 déc. 2021 à 20:40
-- Version du serveur :  10.4.8-MariaDB
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
-- Base de données :  `facture`
--

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_produit` int(11) NOT NULL,
  `montant_produit` int(11) NOT NULL,
  `reference` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id_produit`, `montant_produit`, `reference`) VALUES
(41, 54, 'hay7k'),
(42, 54, 'hay7k'),
(43, 54, 'hay7k'),
(44, 54, 'hay7k'),
(45, 1, 'klj'),
(46, 1, 'klj'),
(47, 1, 'klj'),
(48, 1, 'klj'),
(49, 250, 'tay'),
(50, 250, 'tay'),
(51, 250, 'hay7k'),
(52, 250, 'hay7k'),
(53, 250, 'hay7k'),
(54, 250, 'hay7k'),
(55, 250, 'hay7k'),
(56, 250, 'klj'),
(57, 54, 'hay7k'),
(58, 54, 'hay7k'),
(59, 54, 'hay7k'),
(60, 48, 's'),
(61, 54, 'hay7k'),
(62, 250, 'hay7k'),
(63, 250, 'hay7k'),
(64, 250, 'klj'),
(65, 1, 'hay7k'),
(66, 250, 'klj'),
(67, 250, 'hay7k'),
(68, 250, 'hay7k'),
(69, -2, 'hay7k'),
(70, -3983, 'hay7k'),
(71, 145, 'klj'),
(72, 155, 'ju'),
(73, 45, 'hay7k'),
(74, 45, 'hay7k'),
(75, 250, 'klj'),
(76, 250, 'klj'),
(77, 154, 'klj'),
(78, 250, 'klj'),
(79, 250, 'hay7k'),
(80, 250, 'klj'),
(81, 510, 'test_15'),
(82, 250, 'hay7k'),
(83, 168, 'jdjh'),
(84, 250, 'jdjh');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
