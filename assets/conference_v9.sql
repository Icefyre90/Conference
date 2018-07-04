-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2018 at 10:39 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `user_iduser` int(11) NOT NULL,
  `project_idproject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`user_iduser`, `project_idproject`) VALUES
(4, 1),
(5, 2),
(5, 4),
(5, 6),
(5, 7),
(4, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(3, 27),
(1, 27),
(5, 28),
(3, 28),
(4, 28),
(5, 29),
(5, 30),
(5, 31),
(5, 32);

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

--
-- Dumping data for table `competence`
--

INSERT INTO `competence` (`idcompetence`, `competence_level`, `reviewer_idreviewer`, `conference_has_field_id_conference_has_field`) VALUES
(1, 2, 4, 10),
(2, 4, 4, 11),
(3, 5, 4, 12),
(4, 4, 5, 10),
(5, 3, 5, 11),
(6, 4, 5, 12);

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
  `projects_per_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`idconference`, `title`, `place`, `event_begin`, `event_end`, `application_begin`, `application_end`, `projects_per_autor`) VALUES
(1, 'Shopify Meetup', 'Johannesburg', '2018-07-01 08:00:00', '2018-07-15 20:00:00', '2018-06-15 10:00:00', '2018-07-01 08:00:00', 2),
(2, 'Cisco Live', 'Barselona', '2018-06-20 13:00:00', '2018-06-30 20:00:00', '2018-06-12 20:00:00', '2018-06-20 13:00:00', 2),
(3, 'Upfront Summit', 'Los Angeles', '2018-07-10 20:00:00', '2018-08-01 16:00:00', '2018-06-25 10:00:00', '2018-07-10 20:00:00', 3),
(4, 'Adobe Summit', 'Las Vegas', '2018-06-30 13:00:00', '2018-07-20 21:00:00', '2018-06-15 10:00:00', '2018-06-30 13:00:00', 2),
(5, 'IDTechEx', 'Berlin', '2018-06-28 10:00:00', '2018-07-05 16:00:00', '2018-06-21 08:00:00', '2018-06-28 10:00:00', 3),
(6, 'React', 'Amsterdam', '2018-07-12 10:00:00', '2018-07-24 15:00:00', '2018-07-01 12:00:00', '2018-07-12 10:00:00', 2),
(7, 'Cloud Foundry', 'Boston', '2018-06-28 12:00:00', '2018-07-05 20:00:00', '2018-06-14 10:00:00', '2018-06-28 12:00:00', 2),
(8, 'HardwareCon', 'San Jose', '2018-07-10 10:00:00', '2018-07-20 17:00:00', '2018-07-01 10:00:00', '2018-07-10 10:00:00', 3),
(9, 'Digifest', 'Toronto', '2018-09-04 08:00:00', '2018-09-11 16:00:00', '2018-08-15 12:00:00', '2018-09-04 08:00:00', 2),
(10, 'Dell EMC World', 'Las Vegas', '2018-08-09 12:00:00', '2018-08-16 08:00:00', '2018-07-25 00:00:00', '2018-08-09 12:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `conference_has_field`
--

CREATE TABLE `conference_has_field` (
  `field_idfield` int(11) NOT NULL,
  `conference_idconference` int(11) NOT NULL,
  `id_conference_has_field` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference_has_field`
--

INSERT INTO `conference_has_field` (`field_idfield`, `conference_idconference`, `id_conference_has_field`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(3, 2, 4),
(2, 2, 5),
(5, 2, 6),
(1, 2, 7),
(1, 3, 8),
(2, 3, 9),
(2, 4, 10),
(3, 4, 11),
(1, 4, 12),
(1, 10, 13);

-- --------------------------------------------------------

--
-- Table structure for table `conference_has_project`
--

CREATE TABLE `conference_has_project` (
  `conference_idconference` int(11) NOT NULL,
  `project_idproject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference_has_project`
--

INSERT INTO `conference_has_project` (`conference_idconference`, `project_idproject`) VALUES
(1, 2),
(1, 10),
(1, 11),
(1, 32),
(2, 4),
(3, 6),
(4, 8),
(4, 9),
(4, 24),
(4, 25),
(5, 27),
(5, 28),
(5, 29);

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `idfield` int(11) NOT NULL,
  `name_field` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`idfield`, `name_field`) VALUES
(5, 'Computers'),
(1, 'Electronics'),
(4, 'Instrumentation'),
(2, 'Microelectronics'),
(6, 'Signal processing'),
(3, 'Telecommunications');

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
  `field_idfield` int(11) NOT NULL,
  `core` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`idproject`, `project_name`, `keywords`, `section_pro`, `apstract`, `field_idfield`, `core`, `status`) VALUES
(1, 'Webtwo ipsum', 'Sunday Monday Happy Days', 'Electronics', 'The mate was a mighty sailin\' man the Skipper brave and sure. Five passengers set sail that day for a three hour tour a three hour tour. ', 1, 4, 0),
(2, 'Project2', 'Glogster joukuu zlio imvu quora klout mozy, convore greplin movity handango', 'Microelectronics', 'Jajah sococo wufoo, zlio. Balihoo unigo flickr jibjab zoodles, xobni mzinga klout. ', 2, 5, 0),
(4, 'Project4', ' Blyve oovoo hipmunk chartly, odeo flickr', 'Electronics', 'he powerless in a world of criminals who operate above the law. So this is the tale of our castaways they\'re here for a long long time.', 1, 5, 0),
(6, 'Project6', 'Let me out that Queen. You\'re a good guy, mon frere. That means brother in French. ', 'Electronics', 'Aren\'t you the sweetest thing, spending time with what\'s left of your uncle. Of course.', 1, 5, 0),
(7, 'Project7', ' Makin their way the only way they know how', 'Electronics', ' That\'s just a little bit more than the law will allow.', 1, 5, 0),
(8, 'Project8', 'You ever roasted doughnuts?The best way to communicate is compatible.', 'Electronics', 'The best way to communicate is compatible. Compatible communication is listening with open ears and an open mind, and not being fearful or judgemental about what you\'re hearing.It\'s good to yell at people and tell people that you\'re from Tennesee, so that way you\'ll be safe. ', 1, 4, 1),
(9, 'Project9', 'Busey ipsum dolor sit amet. Listen to the silence. And when the silence is deafening, you\'re in the center of your own universe.', 'Telecommunications', 'I would like to give you a backstage pass to my imagination.I wrestled a bear once.', 3, 5, 0),
(10, 'Project10', 'These kind of things only happen for the first time once. The best way to communicate is compatible. ', 'Microelectronics', 'And remember to balance your internal energy with the environment.', 2, 5, 0),
(11, 'Project11', 'Prow scuttle parrel provost Sail ho shrouds spirits boom mizzenmast yardarm. Pinnace holystone mizzenmast quarter crow\'s nest nipperkin grog yardarm hempen halter furl. ', 'Telecommunications', 'Trysail Sail ho Corsair red ensign hulk smartly boom jib rum gangway. ', 3, 5, 0),
(24, 'Project24', 'Android is fragmented, when awful user experience for example Android geek.', 'Electronics', 'Pleasure to use, but also delay in getting Ice Cream Sandwich.', 1, 5, 0),
(25, 'Project25', 'Profit apparently iPhone rip-offs, finally genius.', 'Microelectronics', 'Awful user experience thus iPhone rip-offs particularly user experience sucks which Steve Jobs was a genius.', 2, 5, 4),
(26, 'Project26', 'Front dooryahd pig fat You is sum wicked suhmart huntin\' deeah noseeum Hold\'er ', 'Microelectronics', 'The \'Gash chimbly huntin\' deeah hum-dingah wicked cunnin\' bluebries some cunnin The \'Gash way up north.', 2, 5, 0),
(27, 'Project27', 'Two ghostly white figures in coveralls and helmets are soflty dancing colonies at the edge of forever Sea of Tranquility dispassionate extraterrestrial observer star stuff harvesting star light.', 'Electronics', 'Great turbulent clouds with pretty stories for which there\'s little good evidence', 1, 1, 0),
(28, 'Project28', 'Skate ipsum dolor sit amet, hanger airwalk switch Ray Underhill lipslide nose bump shoveit. Hang ten 900 Jordan Richter pool risers bone air freestyle. Switch ollie north casper slide finger flip judo air 360. ', 'Microelectronics', 'Heel flip manual boned out drop in Greg Evans impossible Christ air. Masonite pop shove-it locals layback nollie hard flip. Pool blunt Rector transfer slam spine hang ten.', 2, 3, 0),
(29, 'Project29', 'Ollie north blunt quarter pipe Dylan Rieder cab flip. Ledge chicken wing rocket air Rodney Mullen backside. Method air nose slide transition 180. ', 'Microelectronics', ' Rock and roll Baker downhill rails switch. Hang ten cess slide front foot impossible bluntslide World Industries.', 2, 5, 0),
(30, 'Project30', 'Bulbasaur Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ivysaur Lorem ipsum dolor sit amet', 'Telecommunications', 'Charmander Lorem ipsum dolor sit amet, consectetur adipiscing elit. Charmeleon Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 3, 5, 0),
(31, 'Project31', 'Arbok Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pikachu Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Telecommunications', 'Raichu Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 3, 5, 0),
(32, 'Project32', 'Cascoon Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Electronics', 'Dustox Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lotad Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lombre Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_file`
--

CREATE TABLE `project_file` (
  `idproject_file` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `time` varchar(20) NOT NULL,
  `project_idproject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `idreview` int(11) NOT NULL,
  `rating` int(11) DEFAULT '0',
  `comment` varchar(500) DEFAULT '_',
  `date_for_review` datetime NOT NULL,
  `reviewer_idreviewer` int(11) NOT NULL,
  `project_idproject` int(11) NOT NULL,
  `project_status` int(11) DEFAULT '0'
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
(3, 1, 3),
(4, 3, 4),
(5, 4, 4);

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
(1, 'Admin1', 'admin', 'Admin', 'Jedan', '0641234567', 'admin1@gmail.com', 'Group 6', '1990-01-01', 1),
(3, 'User1', 'user', 'User', 'Jedan', '0641234566', 'user1@gmail.com', 'Group 6', '1990-01-01', 0),
(4, 'Admin2', 'admin', 'Admin', 'Dva', '0641234565', 'admin2@gmail.com', 'Group 6', '1990-01-01', 1),
(5, 'User2', 'user', 'User', 'Dva', '0641234564', 'user2@gmail.com', 'Group 6', '1990-01-01', 0);

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
(3, 3, 3),
(7, 4, 4),
(8, 4, 5),
(21, 4, 7),
(22, 4, 8),
(23, 4, 9),
(24, 4, 10);

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
-- Indexes for table `conference_has_project`
--
ALTER TABLE `conference_has_project`
  ADD PRIMARY KEY (`conference_idconference`,`project_idproject`),
  ADD KEY `fk_conference_has_project_project1_idx` (`project_idproject`),
  ADD KEY `fk_conference_has_project_conference1_idx` (`conference_idconference`);

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
-- AUTO_INCREMENT for table `competence`
--
ALTER TABLE `competence`
  MODIFY `idcompetence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `idconference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `conference_has_field`
--
ALTER TABLE `conference_has_field`
  MODIFY `id_conference_has_field` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `idfield` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `idproject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `project_file`
--
ALTER TABLE `project_file`
  MODIFY `idproject_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `idreview` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `idreviewer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_has_conference`
--
ALTER TABLE `user_has_conference`
  MODIFY `iduser_has_conference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
-- Constraints for table `conference_has_project`
--
ALTER TABLE `conference_has_project`
  ADD CONSTRAINT `fk_conference_has_project_conference1` FOREIGN KEY (`conference_idconference`) REFERENCES `conference` (`idconference`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_conference_has_project_project1` FOREIGN KEY (`project_idproject`) REFERENCES `project` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
