-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 02:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Category` varchar(40) NOT NULL,
  `Duration` int(11) NOT NULL,
  `Price` float NOT NULL,
  `IntroVideo` text NOT NULL,
  `InstructorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `Name`, `Description`, `Category`, `Duration`, `Price`, `IntroVideo`, `InstructorID`) VALUES
(1, 'Become a Data Engineer', 'Data Engineering is the foundation for the new world of Big Data. Enroll now to build production-ready data infrastructure, an essential skill for advancing your data career.', 'Data Science', 12, 1000, 'https://www.youtube.com/embed/nyL46pc1VqI', 1),
(2, 'Become a Data Analyst', 'Use Python, SQL, and statistics to uncover insights, communicate critical findings, and create data-driven solutions', 'Data Science', 12, 1200, 'https://www.youtube.com/embed/GPVsHOlRBBI', 2),
(3, 'Responding to a Nation-State Cyber Attacks', 'Identify the infection chain and assess and improve an island nation\'s system resilience', 'Cyber Security', 18, 1650, 'https://www.youtube.com/embed/wygwHXYj_TI', 3),
(4, 'Introduction to Cyber Security', 'This foundations course explains security fundamentals including core principles, critical security controls, and cybersecurity best practices.', 'Cyber Security', 24, 1850, 'https://www.youtube.com/embed/O4pJeXgOJDs', 2),
(5, 'Network Penetration Testing for Beginners', 'Learn network penetration testing / ethical hacking in this full tutorial course for beginners. ', 'Cyber Security ', 20, 500, 'https://www.youtube.com/embed/3Kq1MIfTWCE', 1),
(6, 'Python for Data Science - Course for Beginners ', 'This Python data science course will take you from knowing nothing about Python to coding and analyzing data with Python using tools like Pandas, NumPy, and Matplotlib.', 'Data Science', 15, 600, 'https://www.youtube.com/embed/LHBE6Q9XlzI', 2),
(7, 'Learn Web Development from Scratch ', 'This Web Development Full Course video will help you understand and learn Web Development in detail.', 'Web Development ', 13, 700, 'https://www.youtube.com/embed/Q33KBiDriJY', 3),
(8, 'Web Development Full Course (Front End) | HTML,CSS,JavaScript', 'This Specialization covers how to write syntactically correct HTML5 and CSS3, and how to create interactive web experiences with JavaScript. ', 'Web Development ', 25, 300, 'https://www.youtube.com/embed/TdqQqyc7pfU', 4),
(9, 'Learn HTML5 and CSS3 From Scratch', 'In this course we will cover both languages from the scratch and by the end of the course you will be creating your own projects.', 'Web Development ', 10, 500, 'https://www.youtube.com/embed/mU6anWqZJcc', 1),
(10, 'The Foundations of Entrepreneurship', 'This entrepreneurship course will teach you the important lessons that they don\'t teach you in business school. You will learn about topics such as how to network, how to find customers, and how to get a job.', 'Entrepreneurship', 12, 500, 'https://www.youtube.com/embed/UEngvxZ11sw', 1),
(11, 'Business Crash Course ', 'We\'ll be talking about what Entrepreneurs are, what you need to be one, the pitfalls of running your own business, as well as the real benefits! ', 'Entrepreneurship', 15, 200, 'https://www.youtube.com/embed/YHBVjv4MYXE?list=PLH2l6uzC4UEVY8arV3ExtMVamFxTzMtZ4', 4),
(12, 'Harvard i-lab | Entrepreneurship 101 with Gordon Jones', 'Did you know about the multi-million dollar facility for students interested in entrepreneurship and innovation? Want to learn about the Harvard innovation lab? Interested in entrepreneurship and want to know about programs and resources available to you? Hear Gordon Jones\r\n', 'Entrepreneurship', 30, 700, 'https://www.youtube.com/embed/7IoBUOsy_ew', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `Username` varchar(30) NOT NULL,
  `EnrolledCourses` int(11) NOT NULL,
  `DateOfEnroll` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`Username`, `EnrolledCourses`, `DateOfEnroll`) VALUES
('ahmed', 1, '2022-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `ID` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Title` varchar(40) NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Profile_Img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`ID`, `Name`, `Title`, `Nationality`, `Profile_Img`) VALUES
(1, 'Amanda Moran', 'Developer Advocate at DATASTAX', 'United States', 'https://www.udacity.com/www-proxy/contentful/assets/2y9b3o528xhq/6UCZmF34I3HAeHTJpCXzqw/8cca3175317684e09435671d8a9d9be6/DSGN-1158_Instructor1.jpg'),
(2, 'Ben Goldberg', 'Staff Engineering at SPOTHERO', 'Canada', 'https://www.udacity.com/www-proxy/contentful/assets/2y9b3o528xhq/2GQeHWbk09HPt2h09umEZ5/61f0c7e00fdfcbda5167a05093c49196/DSGN-1158_Instructor2.jpg'),
(3, 'Sameh El-Ansary', 'Assistant Professor at Nile University', 'Egypt', 'https://www.udacity.com/www-proxy/contentful/assets/2y9b3o528xhq/5pnrWy6EnTQRNDii80u2ow/ba8110b223b7c2f31014aaf8159da79e/DSGN-1158_Sameh.jpg'),
(4, 'Olli Livonen', 'Data Engineer at WOLT', 'United States', 'https://www.udacity.com/www-proxy/contentful/assets/2y9b3o528xhq/2RbJPdnM3ALh4QegRbNsVH/d80b7eaa1e16bfbb4ca13195f791da55/DSGN-1158_Instructor5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Email`, `Password`, `Fname`, `Lname`, `Age`, `Gender`) VALUES
('ahmed', 'asd@hotmail.com', '123', 'Ahmed', 'Sherif', 23, 'male'),
('asdas', 'a@gmail.com', 'dasd', 'weqew', 'dasds', 12, 'male'),
('Ziad', 'ZA00056@tkh.edu.eg', '123', 'Ziad', 'Amin', 20, 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `InstructorID` (`InstructorID`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`InstructorID`) REFERENCES `instructors` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
