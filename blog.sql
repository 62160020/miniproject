-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 03:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `create_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `authors_id` int(11) NOT NULL,
  `updatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publish_sts` char(1) NOT NULL DEFAULT 'N',
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `create_ts`, `authors_id`, `updatetime`, `publish_sts`, `image_url`) VALUES
(15, 'เบลล์ (Belle) ', 'เราชื่นชมเบลล์เพราะความงามภายในของเธอ\" มีบุคลิกลักษณะ จิตใจงาม, เห็นอกเห็นใจผู้อื่น, กล้าหาญ, เอาใจใส่, ทะเยอทะยาน, มุ่งมั่น, รักการอ่าน, เฉลียวฉลาด,โรแมนติก, ตรงไปตรงมา, งดงาม, ใจกว้าง\r\n\r\nโฉมงามกับเจ้าชายอสูร (Beauty and the Beast)\r\nPicture\r\n    \r\n      เบลล์ สาวน้อยช่างฝันที่เฝ้าคิดถึงดินแดนอันห่างไกล, ดาบที่กวัดแกว่งและเจ้าชายที่ปลอมตัวเป็นคนธรรมดามากกว่าชีวิตธรรมดาๆ ในเมืองเล็กๆ อันห่างไกลอย่างที่ที่สาวน้อยทั้งหลายไม่สามารถหวังไกลเกินกว่าการแต่งงานและเป็นภรรยาที่แสนดีของหนุ่มหล่อเช่น แกสตัน แต่กระนั้นก็ตามการออกไปผจญภัยเป็นสิ่งสุดท้ายที่เธอคิดถึงขณะควบม้ามุ่งเข้าสู่เขตป่าอันรกทึบเพื่อตามหาพ่อสุดที่รักของเธอที่หายตัวไป และยอมรับข้อแลกเปลี่ยนกับเจ้าสัตว์ประหลาดที่ไร้ความปราณีเพียงเพื่อให้ท่านรอดชีวิตจากการถูกจับคุมขัง “เอาฉันไว้แทนเถิด”เธอกล่าวกับเจ้าชายอสูรผู้เป็นเจ้าของกุญแจสู่ที่คุมขังของเบลล์ แต่ทว่ากลับไม่มีกุญแจสู่ประตูหัวใจอันเป็นอิสระของเธอ\r\n      หลังจากยอมเสี่ยงชีวิตของตนเพื่อช่วยให้เบลล์ปลอดภัย เธอเริ่มมองเห็นจิตใจอันดีงามที่ซ่อนอยู่ภายใต้รูปลักษณ์ที่น่าเกลียด มันทำให้เธอตระหนักว่าสิ่งที่เธอและเขาไม่เคยกล้านึกฝันมาก่อนอาจเกิดขึ้นจริงก็ได้\r\n\r\n', '2021-03-26 14:22:04', 43, '2021-03-26 15:22:04', 'Y', 'IMG-605dee0cede258.43674716.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `passwd` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `penname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `username`, `passwd`, `name`, `penname`, `email`) VALUES
(40, 'alcatraz765', '070b544f80462ce4ff09578f32054f65', 'Al Catraz', 'P', 'fugnulutru@nedoz.com'),
(41, 'f', 'd41d8cd98f00b204e9800998ecf8427e', 'f', 'k', 'f@hotmail.com'),
(42, 'fluk', 'd41d8cd98f00b204e9800998ecf8427e', 'fluk', 'qwe', 'fl@hotmail.com'),
(43, 'Hwan', 'e10adc3949ba59abbe56e057f20f883e', 'Hwan jirattikan', 'jiratikarn', '62160020@go.buu.ac.th');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authors_id` (`authors_id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
