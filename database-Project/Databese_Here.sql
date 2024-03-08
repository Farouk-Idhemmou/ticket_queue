-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 juil. 2023 à 16:19
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tickets`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `password` varchar(75) NOT NULL,
  `dp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `gender`, `dob`, `password`, `dp`) VALUES
(12, 'admin', 'admin@admin.com', 'Male', '2002-01-05', '1234', '64bb12af7874d9.193305481.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `password` varchar(75) NOT NULL,
  `salary` int(10) NOT NULL,
  `dp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `gender`, `dob`, `password`, `salary`, `dp`) VALUES
(1, 'farouk', 'farouk@gmail.com', 'Male', '2003-01-05', '1234', 9000, ''),
(2, 'yasser', 'yasser@gmail.com', 'Male', '2001-02-15', '1234', 8000, ''),
(3, 'Walid', 'walid@gmail.com', 'Male', '2003-08-05', '1234', 12000, ''),
(4, 'ossama', 'ossama@gmail.com', 'Male', '2000-03-10', '1234', 20000, ''),
(5, 'emp3', 'emp3@admin.com', 'Male', '2000-03-12', '1234', 12333, '');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `Numero` int(100) NOT NULL,
  `date` datetime NOT NULL,
  `service` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`Numero`, `date`, `service`) VALUES
(1, '2023-07-22 12:14:05', 'E-facture'),
(2, '2023-07-22 12:14:08', 'Redal Info'),
(3, '2023-07-22 12:14:11', 'Solutions Alternatives de paiement'),
(4, '2023-07-22 12:14:14', 'Localiser votre agence'),
(7, '2023-07-22 22:47:20', 'E-facture'),
(8, '2023-07-22 22:48:37', 'Déposer mon courrier à distance'),
(9, '2023-07-23 15:04:46', 'فاتورة إلكترونية'),
(10, '2023-07-23 15:08:45', 'Déposer mon courrier à distance'),
(11, '2023-07-23 16:09:54', 'معلومات حول ريضال');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
