-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2021 at 08:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafenea`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `idClients` int(11) NOT NULL,
  `uidClients` tinytext NOT NULL,
  `emailClients` tinytext NOT NULL,
  `pwdClients` longtext NOT NULL,
  `codeClients` tinytext NOT NULL,
  `numberClients` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`idClients`, `uidClients`, `emailClients`, `pwdClients`, `codeClients`, `numberClients`) VALUES
(1, 'client', 'client@client.com', '$2y$10$lGd2xQN8c5HSY1EaU4oKiuuYf8Tt5AhFgEfgGjbAsMXLTxYjmRxKW', '333', '0711111111');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idOrders` int(11) NOT NULL,
  `uidOrders` tinytext NOT NULL,
  `emailOrders` tinytext NOT NULL,
  `coffee` longtext NOT NULL,
  `numberOrders` tinytext NOT NULL,
  `totalTime` int(11) NOT NULL,
  `temp` int(11) NOT NULL,
  `sumaOrders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `idProduse` int(11) NOT NULL,
  `uidProduse` tinytext NOT NULL,
  `pretProduse` int(11) NOT NULL,
  `timpProduse` int(11) NOT NULL,
  `descriereProduse` varchar(500) NOT NULL,
  `tipProduse` varchar(10) NOT NULL,
  `pozaProduse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`idProduse`, `uidProduse`, `pretProduse`, `timpProduse`, `descriereProduse`, `tipProduse`, `pozaProduse`) VALUES
(3, 'Nitro Cold Brew', 10, 1, '<p>Preparatul nostru rece, - cu abur lent, pentru un gust foarte neted - devine și mai bun. &Icirc;l infuzăm cu azot pentru a crea o aromă dulce fără zahăr și cremă &icirc;n cascadă, catifelată. Perfecțiunea este servită.</p>\r\n', 'arometari', 'nitro.jpg'),
(4, 'Cafea Americana', 11, 2, '<p>Shot-urile espresso acoperite cu apă fierbinte creează un strat ușor de cremă care culminează &icirc;n această ceașcă minunat de bogată, cu ad&acirc;ncime și nuanțe.</p>\r\n', 'arometari', 'americana.jpg'),
(5, 'Blonde Roast', 9, 3, '<p>Cafea ușor prăjită, moale și aromată. Se poate bea ca atare sau cu lapte, zahăr sau aromat cu vanilie, caramel sau alune.</p>\r\n', 'arometari', 'blonda.jpg'),
(6, 'Espresso', 5, 1, '<p>Semnătura noastră fină Espresso Roast, cu aromă bogată și dulceață caramelică, se află &icirc;n centrul a tot ceea ce facem.</p>\r\n', 'arometari', 'espresso.jpg'),
(7, 'Espresso Con Panna', 7, 2, '<p>Espresso &icirc;nt&acirc;lnește o patura de frișcă pentru a spori aromele bogate și caramelizate ale unui espresso clasic.</p>\r\n', 'arometari', 'conpanna.jpg'),
(12, 'Honey Almondmilk Cold Brew', 14, 2, '<p>Cold Brew ușor &icirc;ndulcit cu miere și completat cu lapte de migdale pentru un gust echilibrat &icirc;n fiecare &icirc;nghițitură delicioasă.</p>\r\n', 'decaf', 'honeyalmond.jpg'),
(13, 'Blonde Vanilla Latte', 13, 2, '<p>Espresso-ul Blonde neted subtil si dulce, lapte, gheață și sirop de vanilie se reunesc pentru a crea o răsucire &icirc;nc&acirc;ntătoare pentru un iubit espresso clasic.</p>\r\n', 'decaf', 'blondevanilla.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'user1', 'user1@gmail.com', '$2y$10$s8X4qojvVbDV/ogeVoFOV.MBgVIxOyQ1/MPLW6du.RjtV.3XcSz1u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idClients`),
  ADD UNIQUE KEY `numberClients` (`numberClients`) USING HASH;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrders`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`idProduse`),
  ADD UNIQUE KEY `uidProduse` (`uidProduse`) USING HASH;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `idClients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `idProduse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
