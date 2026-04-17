

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `form` (
  `RollNumber` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CNIC` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Skills` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`RollNumber`, `Name`, `Email`, `Password`, `CNIC`, `Gender`, `Skills`, `Country`, `DOB`, `Address`) VALUES
(1, 'abcd', 'abcd@gmail.com', '4583905366', '578342892066', 'female', 'MS Word, MS PowerPoint', 'usa', '2000-10-19', 'alksdjfjkashdfjkl;kdffffff');


ALTER TABLE `form`
  ADD PRIMARY KEY (`RollNumber`);
COMMIT;


