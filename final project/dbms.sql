-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2018 at 07:58 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dname` varchar(45) NOT NULL,
  `course` varchar(45) DEFAULT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dname`, `course`, `location`) VALUES
(1, 'engineering science', 'engineering math', 'ncku'),
(2, 'mathematics', 'calculus', 'tainan'),
(3, 'physics', 'physics applications', 'taipei'),
(4, 'computer science ', 'computer organization', 'ncku'),
(5, 'business management', 'financial management', 'ncku'),
(6, 'urban planning', NULL, 'taipei'),
(7, 'architecture', 'design class', 'ncku'),
(8, 'mechanical engineering', 'engineering science', 'ncku'),
(9, 'material science', 'chemistry', 'ncku'),
(10, 'civil engineering', 'calculus', 'ncku'),
(11, 'sadaada', NULL, 'adaaadaa'),
(12, 'adadaa', NULL, 'faffaff');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `lab_id` int(11) NOT NULL,
  `lab_name` varchar(50) NOT NULL,
  `professor_name` varchar(45) NOT NULL,
  `number_of_student` varchar(45) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`lab_id`, `lab_name`, `professor_name`, `number_of_student`, `location`) VALUES
(1, 'Research and Development', 'james kevena', '7', 'ncku'),
(2, 'Management system', 'kevin chen', '8', 'ntu'),
(3, 'accounting', 'maria harry', '5', 'tainan'),
(4, 'marketing and sales', 'kelly sonly', '4', 'taipei'),
(5, 'manufacturing', 'kenzo hundras', '11', 'tainan'),
(6, 'operating system development', 'david zhang', '11', 'ncku'),
(7, 'leadership', 'luis henry son', '9', 'taipei'),
(8, 'music and culture', 'tamara susy', '4', 'taipei'),
(9, 'ethics and religion', 'paul levis non', '6', 'ncku'),
(10, 'english research', 'kevin kusonova', '7', 'ncku'),
(11, 'dadada', 'dadadffffffffff', 'gggggggggggggggggggr', 'ggggggggggggg'),
(12, 'djahddddddddddddddd', 'fafffffffffffffffffffffffffff', 'ggggggggggggggggg', 'hhhhhhhhhhhhhhhhhhhhh');

-- --------------------------------------------------------

--
-- Table structure for table `parttime`
--

CREATE TABLE `parttime` (
  `pt_id` int(11) NOT NULL,
  `pt_name` varchar(45) NOT NULL,
  `salary` int(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `#ofEmployee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parttime`
--

INSERT INTO `parttime` (`pt_id`, `pt_name`, `salary`, `location`, `#ofEmployee`) VALUES
(1, 'waiter', 130, 'tainan', 3),
(2, 'dancer', 250, 'taipei', 4),
(3, 'chef', 300, 'tainan', 2),
(4, 'translator', 500, 'ncku', 3),
(5, 'documentary', 150, 'ncku', 5),
(6, 'marketing', 200, 'ncku', 7),
(7, 'accounting', 400, 'ncku', 5),
(8, 'teaching assistant', 140, 'ncku', 8),
(9, 'programmer', 600, 'ncku', 7),
(10, 'analysist', 800, 'taipei', 2),
(11, 'dddddddddddddddd', 100, 'fffffffffffffffff', 12),
(12, 'ggggggggggggggggg', 50, 'hhhhhhhhhhhhhhhhhhhh', 31);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `pf_id` int(11) NOT NULL,
  `pf_name` varchar(45) NOT NULL,
  `sex` varchar(45) NOT NULL,
  `office_num` varchar(45) NOT NULL,
  `laboratory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`pf_id`, `pf_name`, `sex`, `office_num`, `laboratory_id`) VALUES
(1, 'kelly sonly', 'female', '00001', 4),
(2, 'david zhang', 'male', '00010', 6),
(3, 'james kevena', 'male', '00011', 1),
(4, 'kenzo hundras', 'male', '00100', 5),
(5, 'kevin chen', 'male', '00101', 2),
(6, 'maria harry', 'female', '00110', 3),
(7, 'paul levis non', 'male', '00111', 9),
(8, 'luis henry son', 'male', '01000', 7),
(9, 'tamara susy', 'female', '01001', 8),
(10, 'kevin kusonova', 'male', '01010', 10),
(11, 'aidaddddddddd', 'dhiaaaaaaaaaaaa', 'diuaiiiiiiiii', 9),
(12, 'askddddjjjjjjjjjjjjsssaaaaaaaaa', 'dakdhhhhhhhhhhhhh', 'dakdhha', 3);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `proj_id` int(11) NOT NULL,
  `proj_name` varchar(45) NOT NULL,
  `starting_date` varchar(45) NOT NULL,
  `deadline_date` varchar(45) NOT NULL,
  `professor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`proj_id`, `proj_name`, `starting_date`, `deadline_date`, `professor_id`) VALUES
(1, 'software development', '20180101', '20180601', 4),
(2, 'operating system applications', '20180201', '20180901', 2),
(3, 'management system', '20180101', '20180401', 6),
(4, 'analysis statistics', '20180601', '20181201', 9),
(5, 'system analysis', '20180211', '20190811', 7),
(6, 'planning and design', '20180901', '20190901', 8),
(7, 'microcontroller unit development', '20180101', '20180501', 3),
(8, 'manufacturing system', '20180901', '20190701', 5),
(9, 'market demand and analysis', '20180901', '20190201', 1),
(10, 'english culture and sharing system', '20180601', '20190601', 10);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(45) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `dept_manage` int(11) DEFAULT NULL,
  `parttime_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `dept_id`, `dept_manage`, `parttime_id`, `project_id`) VALUES
(1, 'jodie black', 7, 7, 8, 6),
(2, 'marven asla', 1, NULL, NULL, 7),
(3, 'emma natrio', 5, 5, 7, NULL),
(4, 'marion jodie', 6, 6, 2, 6),
(5, 'jessie keveno', 2, NULL, 8, 4),
(6, 'karen dayuna', 5, NULL, 6, NULL),
(7, 'lisa melion', 10, 10, 5, NULL),
(8, 'stephen valentino', 4, 4, 9, 1),
(9, 'sam smith', 8, 8, 8, NULL),
(10, 'leslie chen', 3, NULL, 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `parttime`
--
ALTER TABLE `parttime`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`pf_id`),
  ADD KEY `fk_professor_laboratory1_idx` (`laboratory_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`proj_id`),
  ADD KEY `fk_project_professor1_idx` (`professor_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `fk_student_department_idx` (`dept_id`),
  ADD KEY `fk_student_department1_idx` (`dept_manage`),
  ADD KEY `fk_student_parttime1_idx` (`parttime_id`),
  ADD KEY `fk_student_project1_idx` (`project_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_laboratory1` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratory` (`lab_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_project_professor1` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`pf_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_department1` FOREIGN KEY (`dept_manage`) REFERENCES `department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_parttime1` FOREIGN KEY (`parttime_id`) REFERENCES `parttime` (`pt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`proj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
