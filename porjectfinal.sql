-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 06:05 PM
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
-- Database: `porject`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `c_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `m_id` int(11) NOT NULL,
  `coach_id` int(11) DEFAULT NULL,
  `picture_blob` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`c_id`, `name`, `picture`, `m_id`, `coach_id`, `picture_blob`) VALUES
(1, 'Liverpool', 'C:\\xampp\\htdocs\\project\\dashboard\\images/liverpool.jpg', 1, 1, ),
(3, 'Paris-Saint German', 'images/psg.jpg', 3, 3, NULL),
(4, 'Bayern', 'images/bay.jpg', 4, 4, NULL),
(5, 'Barcelona', 'images/barca.jpg', 5, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `coach_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `nationality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`coach_id`, `name`, `date_of_birth`, `email`, `phone_number`, `nationality`) VALUES
(1, 'John Smith', '1975-08-15', 'john.smith@example.com', '+1234567890', 'United States'),
(2, 'Carlos Martinez', '1980-02-28', 'carlos.martinez@example.com', '+9876543210', 'Spain'),
(3, 'Mei Ling', '1985-06-10', 'mei.ling@example.com', '+85212345678', 'China'),
(4, 'Ahmed Khan', '1978-12-05', 'ahmed.khan@example.com', '+971567890123', 'Pakistan'),
(5, 'Sophia Rossi', '1983-03-25', 'sophia.rossi@example.com', '+39061234567', 'Italy'),
(6, 'Liam Brown', '1990-01-18', 'liam.brown@example.com', '+447912345678', 'United Kingdom'),
(7, 'Hiro Tanaka', '1972-09-12', 'hiro.tanaka@example.com', '+819012345678', 'Japan'),
(8, 'Maria Silva', '1988-07-22', 'maria.silva@example.com', '+551112345678', 'Brazil'),
(9, 'Victor Ivanov', '1976-05-30', 'victor.ivanov@example.com', '+74951234567', 'Russia'),
(10, 'Aisha Abdi', '1984-11-14', 'aisha.abdi@example.com', '+254712345678', 'Kenya');

-- --------------------------------------------------------

--
-- Table structure for table `defender`
--

CREATE TABLE `defender` (
  `position_id` int(11) DEFAULT NULL,
  `defender_id` int(11) DEFAULT NULL,
  `defender_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `defender`
--

INSERT INTO `defender` (`position_id`, `defender_id`, `defender_name`) VALUES
(1, 0, 'Marcus Johnson'),
(2, 0, 'Ethan Wilson'),
(3, 0, 'Diego Hernández'),
(4, 0, 'Liam Carter'),
(5, 0, 'Hiroshi Nakamura'),
(6, 0, 'Emeka Uche'),
(7, 0, 'Pierre Leclerc'),
(8, 0, 'Matteo Bianchi'),
(9, 0, 'James Wilson'),
(10, 0, 'Lucas Costa'),
(11, 0, 'Min-Jae Kim'),
(12, 0, 'Arjun Menon'),
(13, 0, 'João Fernandes'),
(14, 0, 'Luis Ortega'),
(15, 0, 'Thomas Dupuis'),
(16, 0, 'Willem Janssen'),
(17, 0, 'Erik Larsson'),
(18, 0, 'Carlos Torres'),
(19, 0, 'Sipho Dlamini'),
(20, 0, 'Ahmed Hassan');

-- --------------------------------------------------------

--
-- Table structure for table `forward`
--

CREATE TABLE `forward` (
  `position_id` int(11) DEFAULT NULL,
  `forward_id` int(11) DEFAULT NULL,
  `forward_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forward`
--

INSERT INTO `forward` (`position_id`, `forward_id`, `forward_name`) VALUES
(1, 0, 'John Anderson'),
(2, 0, 'Lucas Batista'),
(3, 0, 'Maximilian Schmidt'),
(4, 0, 'Diego Romero'),
(5, 0, 'Carlos Navarro'),
(6, 0, 'Emeka Chukwu'),
(7, 0, 'Pierre Bernard'),
(8, 0, 'Matteo Lombardi'),
(9, 0, 'James Edwards'),
(10, 0, 'Hiroshi Kato'),
(11, 0, 'Min-Soo Choi'),
(12, 0, 'Liam O’Connor'),
(13, 0, 'João Barros'),
(14, 0, 'Ethan Harris'),
(15, 0, 'Luis Ramos'),
(16, 0, 'Arjun Sharma'),
(17, 0, 'Thomas Legrand'),
(18, 0, 'Willem van Dijk'),
(19, 0, 'Erik Bergström'),
(20, 0, 'Sipho Nkuna');

-- --------------------------------------------------------

--
-- Table structure for table `goalkepper`
--

CREATE TABLE `goalkepper` (
  `position_id` int(11) DEFAULT NULL,
  `goalkepper_id` int(11) DEFAULT NULL,
  `goalkepper_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goalkepper`
--

INSERT INTO `goalkepper` (`position_id`, `goalkepper_id`, `goalkepper_name`) VALUES
(1, 0, 'John Richardson'),
(2, 0, 'Lucas Moreira'),
(3, 0, 'Maximilian Becker'),
(4, 0, 'Diego Alvarez'),
(5, 0, 'Carlos Mendes'),
(6, 0, 'Emeka Obi'),
(7, 0, 'Pierre Fontaine'),
(8, 0, 'Matteo Ricci'),
(9, 0, 'James Cooper'),
(10, 0, 'Hiroshi Fujimoto'),
(11, 0, 'Min-Hyuk Lee'),
(12, 0, 'Liam Murphy'),
(13, 0, 'João Martins'),
(14, 0, 'Ethan Wright'),
(15, 0, 'Luis Morales'),
(16, 0, 'Arjun Reddy'),
(17, 0, 'Thomas Dupuy'),
(18, 0, 'Willem Bakker'),
(19, 0, 'Erik Svensson'),
(20, 0, 'Sipho Mthembu');

-- --------------------------------------------------------

--
-- Table structure for table `have`
--

CREATE TABLE `have` (
  `training_id` int(11) DEFAULT NULL,
  `Player_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `have`
--

INSERT INTO `have` (`training_id`, `Player_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `m_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `club_name` varchar(100) NOT NULL,
  `experience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`m_id`, `name`, `start_date`, `end_date`, `club_name`, `experience`) VALUES
(1, 'John Smith', '2015-01-10', '2020-12-31', 'Joy Bangla League', 10),
(2, 'Laura Johnson', '2018-07-15', NULL, 'Chelsea FC', 5),
(3, 'Michael Brown', '2010-05-20', '2019-11-30', 'Liverpool FC', 15),
(4, 'Emma Davis', '2021-03-01', NULL, 'Real Madrid', 3),
(5, 'James Wilson', '2017-08-25', '2022-06-15', 'Barcelona FC', 8),
(6, 'Sophia Taylor', '2012-09-30', '2020-05-20', 'Arsenal FC', 12),
(7, 'David Lee', '2019-01-01', NULL, 'Bayern Munich', 5),
(8, 'Olivia Martinez', '2016-11-10', '2023-10-05', 'Juventus FC', 7),
(9, 'Liam Anderson', '2014-06-14', '2021-02-28', 'Paris Saint-Germain', 10),
(10, 'Isabella Garcia', '2020-09-01', NULL, 'AC Milan', 4);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(11) NOT NULL,
  `club_1_id` int(11) DEFAULT NULL,
  `club_2_id` int(11) DEFAULT NULL,
  `match_date` datetime DEFAULT NULL,
  `club_1_score` int(11) DEFAULT 0,
  `club_2_score` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `club_1_id`, `club_2_id`, `match_date`, `club_1_score`, `club_2_score`) VALUES
(2, 4, 5, '2026-10-01 22:36:00', 0, 0),
(3, 4, 5, '2026-10-01 22:36:00', 4, 2),
(10, 3, 4, '2024-12-16 22:08:00', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `midfielder`
--

CREATE TABLE `midfielder` (
  `position_id` int(11) DEFAULT NULL,
  `Midfielder_id` int(11) DEFAULT NULL,
  `Midfielder_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `midfielder`
--

INSERT INTO `midfielder` (`position_id`, `Midfielder_id`, `Midfielder_name`) VALUES
(1, 0, 'John Smith'),
(2, 0, 'Lucas Silva'),
(3, 0, 'Max Müller'),
(4, 0, 'Diego Fernández'),
(5, 0, 'Carlos García'),
(6, 0, 'Emeka Okafor'),
(7, 0, 'Pierre Dubois'),
(8, 0, 'Matteo Rossi'),
(9, 0, 'James Brown'),
(10, 0, 'Hiroshi Tanaka'),
(11, 0, 'Min-ho Park'),
(12, 0, 'Liam Murphy'),
(13, 0, 'João Pereira'),
(14, 0, 'Ethan Wilson'),
(15, 0, 'Luis Martínez'),
(16, 0, 'Arjun Iyer'),
(17, 0, 'Thomas Dupont'),
(18, 0, 'Willem de Vries'),
(19, 0, 'Erik Johansson'),
(20, 0, 'Sipho Nkosi');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `p_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `score` int(11) DEFAULT 0,
  `assist` int(11) DEFAULT 0,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`p_id`, `first_name`, `last_name`, `nationality`, `score`, `assist`, `date_of_birth`) VALUES
(2, 'Cristiano', 'Ronaldo', 'Portugal', 911, 256, '1985-02-05'),
(3, 'Neymar', 'Junior', 'Brazil', 350, 200, '1992-02-05'),
(4, 'Kylian', 'Mbappe', 'France', 200, 100, '1998-12-20'),
(5, 'Jalal', 'ABEDIN', 'Bangladeshi', 1, 41, '2002-10-17'),
(6, 'Jalal', 'Rahman', 'Bangladesh', 15, 16, '2001-10-17'),
(7, 'Lionel', 'Messi', '', 672, 301, '1987-06-24'),
(8, 'Cristiano', 'Ronaldo', '', 725, 230, '1985-02-05'),
(9, 'Neymar', 'Jr', '', 371, 213, '1992-02-05'),
(10, 'Kylian', 'Mbappe', '', 195, 90, '1998-12-20'),
(11, 'Robert', 'Lewandowski', '', 541, 144, '1988-08-21'),
(12, 'Kevin', 'De Bruyne', '', 122, 255, '1991-06-28'),
(13, 'Sergio', 'Ramos', '', 134, 40, '1986-03-30'),
(14, 'Mohamed', 'Salah', '', 250, 145, '1992-06-15'),
(15, 'Luka', 'Modric', '', 80, 175, '1985-09-09'),
(16, 'Virgil', 'Van Dijk', '', 50, 30, '1991-07-08'),
(17, 'Erling', 'Haaland', '', 85, 20, '2000-07-21'),
(18, 'Harry', 'Kane', '', 281, 180, '1993-07-28'),
(19, 'Karim', 'Benzema', '', 350, 160, '1987-12-19'),
(31, 'Marco', 'Reus', '', 145, 95, '1989-05-31'),
(33, 'Philippe', 'Coutinho', '', 100, 85, '1992-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `player_club`
--

CREATE TABLE `player_club` (
  `id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player_club`
--

INSERT INTO `player_club` (`id`, `c_id`, `p_id`, `m_id`) VALUES
(27, 1, 2, 1),
(28, 1, 3, 1),
(29, 1, 4, 1),
(30, 1, 5, 1),
(31, 2, 6, 2),
(32, 2, 7, 2),
(33, 2, 8, 2),
(34, 2, 9, 2),
(35, 2, 10, 2),
(36, 3, 11, 3),
(37, 3, 12, 3),
(38, 3, 13, 3),
(39, 3, 14, 3),
(40, 3, 15, 3),
(41, 4, 16, 4),
(42, 4, 17, 4),
(43, 4, 18, 4),
(44, 4, 19, 4),
(45, 4, 20, 4),
(46, 5, 21, 5),
(47, 5, 22, 5),
(48, 5, 23, 5),
(49, 5, 24, 5),
(50, 5, 25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `player_email`
--

CREATE TABLE `player_email` (
  `Player_id` int(11) DEFAULT NULL,
  `email` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `player_phonenumber`
--

CREATE TABLE `player_phonenumber` (
  `Player_id` int(11) DEFAULT NULL,
  `phone_number` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(10) DEFAULT NULL,
  `Goalkepper` varchar(20) DEFAULT NULL,
  `Midfielder` varchar(20) DEFAULT NULL,
  `Forward` varchar(20) DEFAULT NULL,
  `Defender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `Goalkepper`, `Midfielder`, `Forward`, `Defender`) VALUES
(1, 'John Richardson', 'John Smith', 'John Anderson', 'Marcus Johnson'),
(2, 'Lucas Moreira', 'Lucas Silva', 'Lucas Batista', 'Ethan Wilson'),
(3, 'Maximilian Becker', 'Max Müller', 'Maximilian Schmidt', 'Diego Hernández'),
(4, 'Diego Alvarez', 'Diego Fernández', 'Diego Romero', 'Liam Carter'),
(5, 'Carlos Mendes', 'Carlos García', 'Carlos Navarro', 'Hiroshi Nakamura'),
(6, 'Emeka Obi', 'Emeka Okafor', 'Emeka Chukwu', 'Emeka Uche'),
(7, 'Pierre Fontaine', 'Pierre Dubois', 'Pierre Bernard', 'Pierre Leclerc'),
(8, 'Matteo Ricci', 'Matteo Rossi', 'Matteo Lombardi', 'Matteo Bianchi'),
(9, 'James Cooper', 'James Brown', 'James Edwards', 'James Wilson'),
(10, 'Hiroshi Fujimoto', 'Hiroshi Tanaka', 'Hiroshi Kato', 'Lucas Costa'),
(11, 'Min-Hyuk Lee', 'Min-ho Park', 'Min-Soo Choi', 'Min-Jae Kim'),
(12, 'Liam Murphy', 'Liam Murphy', 'Liam O’Connor', 'Arjun Menon'),
(13, 'João Martins', 'João Pereira', 'João Barros', 'João Fernandes'),
(14, 'Ethan Wright', 'Ethan Wilson', 'Ethan Harris', 'Luis Ortega'),
(15, 'Luis Morales', 'Luis Martínez', 'Luis Ramos', 'Thomas Dupuis'),
(16, 'Arjun Reddy', 'Arjun Iyer', 'Arjun Sharma', 'Willem Janssen'),
(17, 'Thomas Dupuy', 'Thomas Dupont', 'Thomas Legrand', 'Erik Larsson'),
(18, 'Willem Bakker', 'Willem de Vries', 'Willem van Dijk', 'Carlos Torres'),
(19, 'Erik Svensson', 'Erik Johansson', 'Erik Bergström', 'Sipho Dlamini'),
(20, 'Sipho Mthembu', 'Sipho Nkosi', 'Sipho Nkuna', 'Ahmed Hassan');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `UserId` int(13) NOT NULL,
  `FullName` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`UserId`, `FullName`, `Email`, `Password`) VALUES
(1, 'pial', 'pial@gmail.com', '123'),
(2, 'nihal', 'nihal@gmail.com', '123'),
(3, 'rayhan', 'rayhan@gmail.com', '456'),
(4, 'rayhan', 'rayhan@gmail.com', '456'),
(5, 'ABC', 'ABC@gmail.com', '564'),
(6, 'ABC', 'ABC@gmail.com', '564'),
(7, 'Jalal ', 'jalal@gmail.com', '456'),
(8, 'jakariya', 'jakariya@gmail.com', '000'),
(9, 'Kona ', 'kona@gmail.com', '999'),
(10, 'Kona ', 'kona@gmail.com', '999'),
(11, 'sadi ', 'sadi@gmail.com', '753'),
(12, 'moin', 'moin@gmail.com', '789'),
(13, 'moin', 'moin@gmail.com', '789'),
(14, 'moin', 'moin@gmail.com', '789'),
(15, 'pial1', 'pial1@gmail.com', '8944'),
(16, 'pial1', 'pial1@gmail.com', '8944'),
(17, 'rakib1', 'rakib1@gmail.com', '123'),
(18, 'nihal ', 'nihal@gmail.com', '1234'),
(19, 'sadia', 'sadia@gmail.com', '123'),
(20, 'sadia', 'sadia@gmail.com', '123'),
(21, 'kona1', 'kona1@gmail.com', '1234'),
(22, 'Abdullah ', 'abdullah@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `stadiums`
--

CREATE TABLE `stadiums` (
  `stadium_id` int(11) NOT NULL,
  `stadium_name` varchar(255) DEFAULT NULL,
  `stadium_image` varchar(255) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stadiums`
--

INSERT INTO `stadiums` (`stadium_id`, `stadium_name`, `stadium_image`, `c_id`) VALUES
(1, 'Old Trafford', '', 1),
(2, 'Santiago Bernabéu', 'path/to/bernabeu_image.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `training_id` int(11) NOT NULL,
  `training_date` date DEFAULT NULL,
  `traing_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `id` (`m_id`),
  ADD KEY `coach_id` (`coach_id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`coach_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `club_1_id` (`club_1_id`),
  ADD KEY `club_2_id` (`club_2_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `player_club`
--
ALTER TABLE `player_club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`stadium_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`training_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `coach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `player_club`
--
ALTER TABLE `player_club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `UserId` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `stadium_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `managers` (`m_id`),
  ADD CONSTRAINT `clubs_ibfk_2` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`coach_id`);

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`club_1_id`) REFERENCES `clubs` (`c_id`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`club_2_id`) REFERENCES `clubs` (`c_id`);

--
-- Constraints for table `player_club`
--
ALTER TABLE `player_club`
  ADD CONSTRAINT `player_club_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `clubs` (`c_id`),
  ADD CONSTRAINT `player_club_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `players` (`p_id`),
  ADD CONSTRAINT `player_club_ibfk_3` FOREIGN KEY (`m_id`) REFERENCES `managers` (`m_id`);

--
-- Constraints for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD CONSTRAINT `stadiums_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `clubs` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
