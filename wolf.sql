-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 12:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wolf`
--

-- --------------------------------------------------------

--
-- Table structure for table `brukere`
--

CREATE TABLE `brukere` (
  `id` int(11) NOT NULL,
  `navn` varchar(255) DEFAULT NULL,
  `GamerTag` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brukere`
--

INSERT INTO `brukere` (`id`, `navn`, `GamerTag`, `username`, `password`) VALUES
(1, 'Mike Bazowsky', 'SirSalieri', 'random_username', '$2y$10$b8iOZaOvvS8yvedRdxLP8eSkQ05PdJ9QmFv0jOBnvQOqic1Oy.Vmy'),
(2, 'Oliver Ono', 'Oliver_Fake', 'Testbruker_22222', '$2y$10$wtE8W/DIzL9yYmInC84.dOfSyKmqsKKe5EUv6sley.3xY.opJx5Pu'),
(3, 'Oliver Noenting', 'Oliver_Fake_NOt', 'Testbruker_333333', '$2y$10$64dtbgfuphbmrzK9P6Q/Meot5y3GwMyuPm/Y7OLr8Q3cG8eEwcYyK'),
(4, 'Ulrik IMI', 'uLRIK_fAKE', 'Testbruker_444444444', '$2y$10$R0n9T3GSg36hUR3S/5i.7.4t9x5XA8IHWwxz7PPK1DpLXu89fxeXa'),
(5, 'Ekstra Person', 'Person_Fake', 'Ekstra_Testbrkr', '$2y$10$IW10xkKoa20kj2z1gSNtEOGX/VrpGerSirfT6jf5tqdvvSL3857cy'),
(6, 'Ekstra Person 2', 'Person_Fake_2', 'Testbruker_555555', '$2y$10$DCeqbK2hOjcFmMu/BjxQD.0c5Q3UawJT/EKHlqAsiKpNoWIh6JFwy'),
(7, 'EKSTRA PERSON 3', 'Person_Fake_3', 'Testbruker_6666666666', '$2y$10$NywA0e3Lw2cc6e7RdKvyQ.JI/PrMzR9lspoLMrpbRP1VCWFrPZ6/G'),
(8, 'Ekstra Person 4', 'Person_Fake_3', 'Testbruker_77777777', '$2y$10$K1IFkohBbWP30NRo0r3kCeND0kV3a56GYZ0g15EDcAe4/4dDKKCDS');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `tournament_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`tournament_id`, `name`, `start_date`, `end_date`) VALUES
(1, 'FIRST TOURNAMENT', NULL, NULL),
(2, 'TESTING_1st_Tournament', '2024-05-05 00:00:00', '2024-05-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tournament_registrations`
--

CREATE TABLE `tournament_registrations` (
  `registration_id` int(11) NOT NULL,
  `participant_id` int(11) DEFAULT NULL,
  `tournament_id` int(11) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(255) DEFAULT NULL,
  `gamertag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tournament_registrations`
--

INSERT INTO `tournament_registrations` (`registration_id`, `participant_id`, `tournament_id`, `registration_date`, `username`, `gamertag`) VALUES
(1, NULL, NULL, '2024-05-03 09:30:59', 'random_username', 'No gamertag'),
(2, NULL, NULL, '2024-05-03 09:48:07', 'Testbruker_333333', 'No gamertag'),
(3, NULL, NULL, '2024-05-03 09:59:55', 'Testbruker_444444444', 'No gamertag'),
(4, NULL, NULL, '2024-05-03 10:07:22', 'Testbruker_22222', 'No gamertag'),
(5, NULL, NULL, '2024-05-03 10:12:19', 'Testbruker_77777777', 'No gamertag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brukere`
--
ALTER TABLE `brukere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`tournament_id`);

--
-- Indexes for table `tournament_registrations`
--
ALTER TABLE `tournament_registrations`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `participant_id` (`participant_id`),
  ADD KEY `tournament_id` (`tournament_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brukere`
--
ALTER TABLE `brukere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `tournament_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tournament_registrations`
--
ALTER TABLE `tournament_registrations`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tournament_registrations`
--
ALTER TABLE `tournament_registrations`
  ADD CONSTRAINT `tournament_registrations_ibfk_1` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`),
  ADD CONSTRAINT `tournament_registrations_ibfk_2` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`tournament_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
