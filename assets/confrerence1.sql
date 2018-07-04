-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 04:20 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `conference`
--
CREATE DATABASE IF NOT EXISTS `conference` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `conference`;

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `user_iduser` int(11) NOT NULL,
  `project_idproject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `competence`
--

CREATE TABLE `competence` (
  `idcompetence` int(11) NOT NULL,
  `competence_level` int(11) DEFAULT NULL,
  `reviewer_idreviewer` int(11) NOT NULL,
  `conference_has_field_id_conference_has_field` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `idconference` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `place` varchar(45) NOT NULL,
  `event_begin` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `application_begin` datetime NOT NULL,
  `application_end` datetime NOT NULL,
  `projects_per_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`idconference`, `title`, `place`, `event_begin`, `event_end`, `application_begin`, `application_end`, `projects_per_author`) VALUES
(1, 'conf1', 'bgd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 'conf2', 'frt', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'conf3', 'frrrr', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'conf4', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'conf5', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 'conf6', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 'conf7', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 'conf8', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 'conf9', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `conference_has_field`
--

CREATE TABLE `conference_has_field` (
  `field_idfield` int(11) NOT NULL,
  `conference_idconference` int(11) NOT NULL,
  `id_conference_has_field` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `idfield` int(11) NOT NULL,
  `name_field` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `idproject` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `section_pro` varchar(45) NOT NULL,
  `apstract` varchar(1000) NOT NULL,
  `field_idfield` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_file`
--

CREATE TABLE `project_file` (
  `idproject_file` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `project_idproject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `idreview` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date_for_review` datetime NOT NULL,
  `reviewer_idreviewer` int(11) NOT NULL,
  `project_idproject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `idreviewer` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL,
  `conference_idconference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`idreviewer`, `user_iduser`, `conference_idconference`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(12) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `organisation` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `coordinator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `first_name`, `last_name`, `phone_number`, `email`, `organisation`, `date_of_birth`, `coordinator`) VALUES
(1, 'shomi75', 'sifra', 'miodrag', 'jovanovic', '0642004551', 'shomi75@gmail.com', 'etf', '0000-00-00', 1),
(3, 'pera', 'sifra', 'pera', 'peric', '0640154646', 'pera@gmail.com', 'unicef', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_conference`
--

CREATE TABLE `user_has_conference` (
  `iduser_has_conference` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL,
  `conference_idconference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_conference`
--

INSERT INTO `user_has_conference` (`iduser_has_conference`, `user_iduser`, `conference_idconference`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD KEY `fk_autor_user1_idx` (`user_iduser`),
  ADD KEY `fk_autor_project1_idx` (`project_idproject`);

--
-- Indexes for table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`idcompetence`),
  ADD KEY `fk_competence_reviewer1_idx` (`reviewer_idreviewer`),
  ADD KEY `fk_competence_conference_has_field1_idx` (`conference_has_field_id_conference_has_field`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`idconference`);

--
-- Indexes for table `conference_has_field`
--
ALTER TABLE `conference_has_field`
  ADD PRIMARY KEY (`id_conference_has_field`),
  ADD KEY `fk_conference_has_field_field1_idx` (`field_idfield`),
  ADD KEY `fk_conference_has_field_conference1_idx` (`conference_idconference`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`idfield`),
  ADD UNIQUE KEY `name_field_UNIQUE` (`name_field`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`idproject`),
  ADD KEY `fk_project_field1_idx` (`field_idfield`);

--
-- Indexes for table `project_file`
--
ALTER TABLE `project_file`
  ADD PRIMARY KEY (`idproject_file`),
  ADD KEY `fk_project_file_project1_idx` (`project_idproject`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idreview`),
  ADD KEY `fk_review_reviewer1_idx` (`reviewer_idreviewer`),
  ADD KEY `fk_review_project1_idx` (`project_idproject`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`idreviewer`),
  ADD KEY `fk_reviewer_user1_idx` (`user_iduser`),
  ADD KEY `fk_reviewer_conference1_idx` (`conference_idconference`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `user_has_conference`
--
ALTER TABLE `user_has_conference`
  ADD PRIMARY KEY (`iduser_has_conference`),
  ADD KEY `fk_user_has_conference_user1_idx` (`user_iduser`),
  ADD KEY `fk_user_has_conference_conference1_idx` (`conference_idconference`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `idconference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `conference_has_field`
--
ALTER TABLE `conference_has_field`
  MODIFY `id_conference_has_field` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `idfield` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `idproject` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_file`
--
ALTER TABLE `project_file`
  MODIFY `idproject_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `idreview` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `idreviewer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_has_conference`
--
ALTER TABLE `user_has_conference`
  MODIFY `iduser_has_conference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `fk_autor_project1` FOREIGN KEY (`project_idproject`) REFERENCES `project` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_autor_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `competence`
--
ALTER TABLE `competence`
  ADD CONSTRAINT `fk_competence_conference_has_field1` FOREIGN KEY (`conference_has_field_id_conference_has_field`) REFERENCES `conference_has_field` (`id_conference_has_field`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_competence_reviewer1` FOREIGN KEY (`reviewer_idreviewer`) REFERENCES `reviewer` (`idreviewer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `conference_has_field`
--
ALTER TABLE `conference_has_field`
  ADD CONSTRAINT `fk_conference_has_field_conference1` FOREIGN KEY (`conference_idconference`) REFERENCES `conference` (`idconference`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_conference_has_field_field1` FOREIGN KEY (`field_idfield`) REFERENCES `field` (`idfield`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_project_field1` FOREIGN KEY (`field_idfield`) REFERENCES `field` (`idfield`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project_file`
--
ALTER TABLE `project_file`
  ADD CONSTRAINT `fk_project_file_project1` FOREIGN KEY (`project_idproject`) REFERENCES `project` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_project1` FOREIGN KEY (`project_idproject`) REFERENCES `project` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_review_reviewer1` FOREIGN KEY (`reviewer_idreviewer`) REFERENCES `reviewer` (`idreviewer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD CONSTRAINT `fk_reviewer_conference1` FOREIGN KEY (`conference_idconference`) REFERENCES `conference` (`idconference`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reviewer_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_conference`
--
ALTER TABLE `user_has_conference`
  ADD CONSTRAINT `fk_user_has_conference_conference1` FOREIGN KEY (`conference_idconference`) REFERENCES `conference` (`idconference`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_conference_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
