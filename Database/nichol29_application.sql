-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2017 at 09:37 AM
-- Server version: 5.6.36-82.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nichol29_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `Degrees`
--

CREATE TABLE `Degrees` (
  `DegreeID` int(11) NOT NULL,
  `DegreeTitle` varchar(5) DEFAULT NULL,
  `DegreeName` varchar(255) DEFAULT NULL,
  `DegreeConcentration` varchar(255) DEFAULT NULL,
  `DegreeSchool` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Degrees`
--

INSERT INTO `Degrees` (`DegreeID`, `DegreeTitle`, `DegreeName`, `DegreeConcentration`, `DegreeSchool`) VALUES
(1, 'MA', 'Animation', 'Animator', 'Cinematic Arts'),
(2, 'MS', 'Applied Technology', '', 'Computing'),
(3, 'MS', 'Business Information Technology', '', 'Computing'),
(4, 'MS', 'Computational Finance', '', 'Computing'),
(5, 'MS', 'Computer Science', '', 'Computing'),
(6, 'MS', 'Cybersecurity', 'Computer Security', 'Computing'),
(7, 'MA', 'Digital Communication and Media Arts', '', 'Design'),
(8, 'MS', 'E-Commerce Technology', '', 'Computing'),
(9, 'MA', 'Experience Design', '', 'Design'),
(10, 'MS', 'Film and Television', 'Cinematography', 'Cinematic Arts'),
(11, 'MS', 'Game Programming', '', 'Computing'),
(12, 'MS', 'Health Informatics', '', 'Computing'),
(13, 'MS', 'Human-Computer Interaction', '', 'Computing'),
(14, 'MS', 'Information Systems', 'Standard', 'Computing'),
(15, 'MS', 'IT Project Management', '', 'Computing'),
(16, 'MS', 'Network Engineering and Security', '', 'Computing'),
(17, 'MS', 'Predictive Analytics', 'Computational Methods', 'Computing'),
(18, 'MS', 'Software Engineering', 'Software Development', 'Computing'),
(19, 'MS', 'Computer Science Technology', '', 'Computing');

-- --------------------------------------------------------

--
-- Table structure for table `Jobs`
--

CREATE TABLE `Jobs` (
  `JobID` int(11) NOT NULL,
  `JobTitle` varchar(255) DEFAULT NULL,
  `TechSkill1` varchar(255) DEFAULT NULL,
  `TechSkill2` varchar(255) DEFAULT NULL,
  `TechSkill3` varchar(255) DEFAULT NULL,
  `TechSkill4` varchar(255) DEFAULT NULL,
  `TechSkill5` varchar(255) DEFAULT NULL,
  `SoftSkill1` varchar(255) DEFAULT NULL,
  `SoftSkill2` varchar(255) DEFAULT NULL,
  `SoftSkill3` varchar(255) DEFAULT NULL,
  `SoftSkill4` varchar(255) DEFAULT NULL,
  `SoftSkill5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Jobs`
--

INSERT INTO `Jobs` (`JobID`, `JobTitle`, `TechSkill1`, `TechSkill2`, `TechSkill3`, `TechSkill4`, `TechSkill5`, `SoftSkill1`, `SoftSkill2`, `SoftSkill3`, `SoftSkill4`, `SoftSkill5`) VALUES
(1, 'Computer Systems Analyst', 'Java', 'Oracle', 'C++', 'Software Engineering', '', 'Organization', 'Teamwork', 'Analyze', 'Communication', 'Independent'),
(2, 'Data Scientist', 'Python', 'Java', 'Software Engineering', 'C#', 'C++', 'Teamwork', 'Organization', 'Communication', 'Analyze', 'Problem Solving'),
(3, 'Database Administrator', 'Oracle', 'Database Administration', 'MongoDB', 'MySQL', 'Python', 'Organization', 'Teamwork', 'Communication', 'Independent', 'Analyze'),
(4, 'IT Security Specialist', 'C#', 'Oracle', '', '', '', 'Teamwork', 'Organization', 'Communication', 'Independent', 'Analyze'),
(5, 'Mobile Application Developer', 'Java', 'C#', 'Software Engineering', 'Objective-C', 'C++', 'Teamwork', 'Communication', 'Analyze', 'Independent', 'Organization'),
(6, 'Quality Assurance', '', '', '', '', '', 'Teamwork', 'Communication', 'Organization', 'Analyze', 'Independent'),
(7, 'Software Developer', 'Java', 'MySQL', 'C#', 'Oracle', 'Software Engineering', 'Teamwork', 'Organization', 'Writing', 'Communication', 'Independent'),
(8, 'Software Engineer', 'Java', 'Software Engineering', 'C#', 'Database Administration', 'MongoDB', 'Teamwork', 'Organization', 'Communication', 'Independent', 'Writing'),
(9, 'User Experience', 'Java', 'Python', '', '', '', 'Teamwork', 'Communication', 'Independent', 'Organization', 'Analyze'),
(10, 'Web Developer', 'Java', 'C#', 'Software Engineering', 'Python', 'Microsoft SQL Server', 'Teamwork', 'Communication', 'Independent', 'Analyze', 'Writing');

-- --------------------------------------------------------

--
-- Table structure for table `Results`
--

CREATE TABLE `Results` (
  `UserID` int(10) NOT NULL,
  `Job1` varchar(255) DEFAULT NULL,
  `JobResult1` decimal(9,2) DEFAULT NULL,
  `Job2` varchar(255) DEFAULT NULL,
  `JobResult2` decimal(9,2) DEFAULT NULL,
  `Job3` varchar(255) DEFAULT NULL,
  `JobResult3` decimal(9,2) DEFAULT NULL,
  `Job4` varchar(255) DEFAULT NULL,
  `JobResult4` decimal(9,2) DEFAULT NULL,
  `Job5` varchar(255) DEFAULT NULL,
  `JobResult5` decimal(9,2) DEFAULT NULL,
  `Degree1` varchar(255) DEFAULT NULL,
  `DegreeResult1` decimal(9,2) DEFAULT NULL,
  `Degree2` varchar(255) DEFAULT NULL,
  `DegreeResult2` decimal(9,2) DEFAULT NULL,
  `Degree3` varchar(255) DEFAULT NULL,
  `DegreeResult3` decimal(9,2) DEFAULT NULL,
  `Degree4` varchar(255) DEFAULT NULL,
  `DegreeResult4` decimal(9,2) DEFAULT NULL,
  `Degree5` varchar(255) DEFAULT NULL,
  `DegreeResult5` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Results`
--

INSERT INTO `Results` (`UserID`, `Job1`, `JobResult1`, `Job2`, `JobResult2`, `Job3`, `JobResult3`, `Job4`, `JobResult4`, `Job5`, `JobResult5`, `Degree1`, `DegreeResult1`, `Degree2`, `DegreeResult2`, `Degree3`, `DegreeResult3`, `Degree4`, `DegreeResult4`, `Degree5`, `DegreeResult5`) VALUES
(1, 'Animator', '0.14', 'Database_Administrator', '0.64', 'IT_Security', '0.00', 'Mobile_App_Developer', '0.06', 'Animator', '0.01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Data_Scientist', '0.11', 'Database_Administrator', '0.06', 'IT_Security', '0.09', 'Mobile_App_Developer', '0.06', 'Animator', '0.31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(541, 'Software_Developer', '0.50', 'Database_Administrator', '0.29', 'Computer_Systems_Analyst', '0.07', 'Mobile_App_Developer', '0.06', 'Network_Specialist', '0.05', 'Computer_Science', '0.73', 'Applied_Technology', '0.23', 'Experience_Design', '0.03', 'Business_Information_Technology', '0.02', 'Computational_Finance', '0.02'),
(544, 'Computer_Systems_Analyst', '0.13', 'Database_Administrator', '0.06', 'Data_Scientist', '0.05', 'Mobile_App_Developer', '0.01', 'IT_Security', '0.00', 'Computer_Science', '0.85', 'Applied_Technology', '0.03', 'E_Commerce_Technology', '0.02', 'Computational_Finance', '0.02', 'Digital_Communication_and_Media_Arts', '0.01'),
(546, 'Computer_Systems_Analyst', '0.14', 'Database_Administrator', '0.11', 'Data_Scientist', '0.06', 'Mobile_App_Developer', '0.02', 'IT_Security', '0.00', 'Computer_Science', '0.92', 'Applied_Technology', '0.05', 'E_Commerce_Technology', '0.05', 'Experience_Design', '0.03', 'Animation', '0.02');

-- --------------------------------------------------------

--
-- Table structure for table `SoftSkills`
--

CREATE TABLE `SoftSkills` (
  `SoftSkillID` int(11) NOT NULL,
  `SoftSkillName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SoftSkills`
--

INSERT INTO `SoftSkills` (`SoftSkillID`, `SoftSkillName`) VALUES
(1, 'Analytical'),
(2, 'Communication'),
(3, 'Independence'),
(4, 'Multi-Tasking'),
(5, 'Organization'),
(6, 'Problem Solving'),
(7, 'Speaking'),
(8, 'Teamwork'),
(9, 'Writing'),
(10, 'Leadership'),
(11, 'Creativity'),
(12, 'Time Management'),
(13, 'Motivation'),
(14, 'Adaptability'),
(15, 'Research'),
(16, 'Confidence'),
(17, 'Enthusiasm'),
(18, 'Persistence'),
(19, 'Patience'),
(20, 'Negotiation');

-- --------------------------------------------------------

--
-- Table structure for table `TechSkills`
--

CREATE TABLE `TechSkills` (
  `TechSkillID` int(11) NOT NULL,
  `TechSkillName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TechSkills`
--

INSERT INTO `TechSkills` (`TechSkillID`, `TechSkillName`) VALUES
(1, 'C#'),
(2, 'C++'),
(3, 'Database Administration'),
(4, 'DB2'),
(5, 'Java'),
(6, 'Microsoft SQL Server'),
(7, 'MongoDB'),
(8, 'MySQL'),
(9, 'Objective-C'),
(10, 'Oracle'),
(11, 'Python'),
(12, 'Software Engineering'),
(13, 'NONE'),
(14, 'Design'),
(15, 'Mathematics'),
(16, 'Protocols'),
(17, 'TCP/IP'),
(18, 'LAN'),
(19, 'FTP'),
(20, 'SMTP'),
(21, 'Linux'),
(22, 'Windows'),
(23, 'Unix'),
(24, 'R'),
(25, 'Mitigation'),
(26, 'Pen Testing'),
(27, 'Excel');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` char(10) NOT NULL DEFAULT '',
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Age` varchar(3) DEFAULT NULL,
  `Location` varchar(20) DEFAULT NULL,
  `Degree` varchar(20) DEFAULT NULL,
  `TechSkill1` varchar(255) DEFAULT NULL,
  `TechSkill1Weight` int(2) DEFAULT NULL,
  `TechSkill2` varchar(255) DEFAULT NULL,
  `TechSkill2Weight` int(2) DEFAULT NULL,
  `TechSkill3` varchar(255) DEFAULT NULL,
  `TechSkill3Weight` int(2) DEFAULT NULL,
  `TechSkill4` varchar(255) DEFAULT NULL,
  `TechSkill4Weight` int(2) DEFAULT NULL,
  `TechSkill5` varchar(255) DEFAULT NULL,
  `TechSkill5Weight` int(2) DEFAULT NULL,
  `SoftSkill1` varchar(255) DEFAULT NULL,
  `SoftSkill1Weight` int(2) DEFAULT NULL,
  `SoftSkill2` varchar(255) DEFAULT NULL,
  `SoftSkill2Weight` int(2) DEFAULT NULL,
  `SoftSkill3` varchar(255) DEFAULT NULL,
  `SoftSkill3Weight` int(2) DEFAULT NULL,
  `SoftSkill4` varchar(255) DEFAULT NULL,
  `SoftSkill4Weight` int(2) DEFAULT NULL,
  `SoftSkill5` varchar(255) DEFAULT NULL,
  `SoftSkill5Weight` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `FirstName`, `LastName`, `Age`, `Location`, `Degree`, `TechSkill1`, `TechSkill1Weight`, `TechSkill2`, `TechSkill2Weight`, `TechSkill3`, `TechSkill3Weight`, `TechSkill4`, `TechSkill4Weight`, `TechSkill5`, `TechSkill5Weight`, `SoftSkill1`, `SoftSkill1Weight`, `SoftSkill2`, `SoftSkill2Weight`, `SoftSkill3`, `SoftSkill3Weight`, `SoftSkill4`, `SoftSkill4Weight`, `SoftSkill5`, `SoftSkill5Weight`) VALUES
('541', 'Nick', 'Holyk', '28', 'Itasca', 'Computer Science', 'C++', 5, 'Java', 6, 'MySQL', 10, 'Python', 8, 'R', 3, 'Problem Solving', 6, 'Persistence', 7, 'Patience', 7, 'Adaptability', 8, 'Organization', 7),
('544', 'Ryan', 'Macwan', '24', 'Naperville', 'Animation', 'Java', 8, 'Python', 6, 'MySQL', 4, 'C++', 5, '', 0, 'Problem Solving', 9, 'Analyze', 8, 'Public Speaking', 8, 'Independent', 7, 'Communication', 6),
('546', 'Glenn', 'Hintze', '99', 'Chicago', 'Business Information', 'Java', 9, 'Python', 8, 'MySQL', 4, 'C++', 4, 'Database Administration', 1, 'Communication', 10, 'Problem Solving', 9, 'Writing', 9, 'Organization', 7, 'Multitasking', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Degrees`
--
ALTER TABLE `Degrees`
  ADD UNIQUE KEY `DegreeID` (`DegreeID`);

--
-- Indexes for table `Jobs`
--
ALTER TABLE `Jobs`
  ADD PRIMARY KEY (`JobID`);

--
-- Indexes for table `Results`
--
ALTER TABLE `Results`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `SoftSkills`
--
ALTER TABLE `SoftSkills`
  ADD PRIMARY KEY (`SoftSkillID`);

--
-- Indexes for table `TechSkills`
--
ALTER TABLE `TechSkills`
  ADD PRIMARY KEY (`TechSkillID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Degrees`
--
ALTER TABLE `Degrees`
  MODIFY `DegreeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `SoftSkills`
--
ALTER TABLE `SoftSkills`
  MODIFY `SoftSkillID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `TechSkills`
--
ALTER TABLE `TechSkills`
  MODIFY `TechSkillID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
