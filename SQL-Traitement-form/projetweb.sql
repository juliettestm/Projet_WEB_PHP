-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2023 at 07:26 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(64) NOT NULL,
  `Prenom` varchar(64) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `DateNaissance` date NOT NULL,
  `pseudo` varchar(11) NOT NULL,
  `Mdp` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ID`, `Nom`, `Prenom`, `Email`, `DateNaissance`, `pseudo`, `Mdp`) VALUES
(0, 'pasconnecte', 'pasconnecte', 'pasconnecte', '2023-04-03', 'pasconnecte', 'pasconnecte'),
(4, 'Damia Claus', 'Damia', 'kylian.Mbappe@student.junia.com', '2023-04-03', 'kilogramme', 'kilogramme'),
(6, 'Juliette', 'Damia', 'kylian.Mbappe@student.junia.com', '2023-04-10', 'salut', 'salut'),
(20, 'sodzo', 'szs', 'kylian.Mbappe@student.junia.com', '2023-03-28', 'france', 'dede');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `ID` int(11) NOT NULL,
  `objet` varchar(64) NOT NULL,
  `description` varchar(200) NOT NULL,
  `email` varchar(64) NOT NULL,
  `image` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`ID`, `objet`, `description`, `email`, `image`) VALUES
(4, 'problemes techniques', 'defefefefef', 'kylian.Mbappe@student.junia.com', 'buzz.png'),
(0, 'suggestion', 'edede', 'juliette.saint-maxent@student.junia.com', 'buzz.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`description`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `clients` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
