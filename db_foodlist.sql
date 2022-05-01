-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 06:54 PM
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
-- Database: `db_foodlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE `confirm` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `person` int(11) NOT NULL,
  `tablee` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_quantity` int(11) NOT NULL,
  `food_price` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `confirm`
--

INSERT INTO `confirm` (`id`, `date`, `time`, `person`, `tablee`, `food_id`, `user_id`, `food_name`, `food_quantity`, `food_price`, `firstname`, `lastname`) VALUES
(167, '2022-05-08', '12:00', 2, 10, 3, 6, 'เสี่ยวหลงเปา', 1, 50, 'ภัทรสุดา', 'ยมนา'),
(168, '2022-05-19', '13:00', 2, 1, 3, 2, 'เสี่ยวหลงเปา', 1, 50, 'Patsuda', 'Yommana'),
(169, '2022-05-19', '13:00', 2, 1, 2, 2, 'เป็ดปักกิ่ง', 1, 125, 'Patsuda', 'Yommana'),
(170, '2022-05-10', '20:00', 2, 1, 3, 2, 'เสี่ยวหลงเปา', 1, 50, 'Patsuda', 'Yommana'),
(171, '2022-05-07', '12:00', 2, 1, 20, 2, 'ข้าวอบหนำเลี๊ยบหมู', 1, 120, 'Patsuda', 'Yommana'),
(172, '2022-05-07', '12:00', 2, 1, 21, 2, 'ไก่ห่อใบเตย', 1, 110, 'Patsuda', 'Yommana'),
(173, '2022-05-07', '12:00', 2, 1, 18, 2, 'ซุปปลากะพงบะหมี่หยก', 2, 235, 'Patsuda', 'Yommana'),
(174, '2022-05-20', '15:00', 1, 1, 12, 2, 'ตับหมูผัดขิง', 1, 130, 'Patsuda', 'Yommana'),
(175, '2022-05-20', '15:00', 1, 1, 10, 2, 'ข้าวอบจักรพรรดิ', 1, 135, 'Patsuda', 'Yommana'),
(176, '2022-05-20', '15:00', 1, 1, 9, 2, 'เป็ดตุ๋นเกาลัด', 1, 230, 'Patsuda', 'Yommana'),
(185, '2022-05-30', '11:00', 1, 1, 21, 2, 'ไก่ห่อใบเตย', 1, 110, 'Patsuda', 'Yommana'),
(186, '2022-05-30', '11:00', 1, 1, 22, 2, 'เนื้อเป็ดผัดพริกเกลือ', 1, 75, 'Patsuda', 'Yommana'),
(187, '2022-05-30', '11:00', 1, 1, 20, 2, 'ข้าวอบหนำเลี๊ยบหมู', 1, 120, 'Patsuda', 'Yommana'),
(188, '2022-05-30', '11:00', 1, 1, 19, 2, 'กระเพาะปลาผัดแห้ง', 1, 250, 'Patsuda', 'Yommana');

-- --------------------------------------------------------

--
-- Table structure for table `food_list`
--

CREATE TABLE `food_list` (
  `id` int(11) NOT NULL,
  `food_name` varchar(200) NOT NULL,
  `food_detail` text NOT NULL,
  `food_img` text NOT NULL,
  `food_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_list`
--

INSERT INTO `food_list` (`id`, `food_name`, `food_detail`, `food_img`, `food_price`) VALUES
(1, 'หมูหันจีน', 'ทำให้เนื้อหมูด้านในสุก หนังด้านนอกจะเหลือง กรอบ เนื้อมีรสหวานอร่อย กลิ่นหอม ชวนรับประทาน', 'foodlist/01.png', 130),
(2, 'เป็ดปักกิ่ง', 'เสิร์ฟในรูปแผ่นหนังบางกรอบ ที่มาพร้อมแผ่นแป้งบางสำหรับห่อ ตามด้วยซอสหวานและเครื่องเคียง', 'foodlist/02.png', 125),
(3, 'เสี่ยวหลงเปา', 'ความอร่อยอยู่ที่น้ำซุปร้อนๆ ที่ซ่อนตัวอยู่ในแผ่นแป้งบางๆ\r\nซึ่งมาจากการใส่วุ้นที่มาจากการเคี่ยวหนังหมู', 'foodlist/03.png', 50),
(5, 'ไก่แช่เหล้า', 'เนื้อไก่มีความนุ่มละมุนลิ้น มีรสชาติกลมกล่อม ดึงกลิ่นของเหล้าอีกทั้งมีความเปรี้ยวนิดๆ', 'foodlist/04.png', 50),
(6, 'กุ้งอบหม้อดิน', 'วุ้นเส้นอบหม้อดินฮอยอัน วุ้นเส้นเหนียวนุ่ม พร้อมซอสปรุงรสเข้มข้น', 'foodlist/05.png', 50),
(7, 'หัวปลาแซลม่อนนึ่งซีอิ้ว', 'แซลมอนเนื้อแน่นนุ่มละมุน เคล้าไปกับซีอิ๊วญี่ปุ่นรสกลมกล่อม เป็นแหล่งโปรตีนคุณภาพดี ย่อยง่าย', 'foodlist/06.png', 50),
(8, 'ปีกไก่เหล้าแดง', 'ความอร่อยอยู่ที่ผิวกรอบๆ ของไก่ที่เคลือบด้วยตัวซอสเหล้าแดงที่มีกลิ่นหอม ', 'foodlist/07.png', 180),
(9, 'เป็ดตุ๋นเกาลัด', 'เป็ดเนื้อนุ่ม ๆ ที่ตุ๋นจนรสชาติเข้าเนื้อ แถมยังหอมกลิ่นเครื่องเทศที่เราใส่ลงไป ', 'foodlist/08.png', 230),
(10, 'ข้าวอบจักรพรรดิ', 'ทำจากข้าวไรซ์เบอร์รี่ หรือข้าวกล้อง ซึ่งมีวิตามินบีรวมและมีเม็ดแปะก๊วยมีสรรพคุณทางยามากมาย', 'foodlist/09.png', 135),
(11, 'สามชั้นตุ๋นเต้าเจี้ยว', 'เมนูอาหารจีนที่เราเอาความละมุนของสามชั้น กับ ความหอมเข้มข้นของเต้าเจี้ยว เมื่อเจอกันตุ๋นให้เนื้อหมูเกิดความนุ่ม ละมุน', 'foodlist/10.png', 125),
(12, 'ตับหมูผัดขิง', 'มาเสริมธาตุเหล็กกันด้วยตับหมูผัดกับขิงที่ได้สรรพคุณจากสมุนไพรอย่างขิง กระเทียม และต้นหอม', 'foodlist/11.png', 130),
(13, 'กุ้งทอดซอสขิง', 'หอมกลิ่นขิงกับเหล้าจีนที่ทำเป็นซอสมาคลุกกับกุ้งทอด จะรับประทานกับข้าว หรือเป็นอาหารเรียกน้ำย่อยก็ได้', 'foodlist/12.png', 190),
(14, 'สลัดกุ้งเสฉวน', 'เมนูสลัดจานเบาๆ ใส่กุ้งสดผัดกับพริกเสฉวน กินกับผักสลัดที่มีเนื้อแตงกวาซอยกับใบผักกาดขาว ', 'foodlist/13.png', 150),
(15, 'เต้าหู้ทรงเครื่องเสฉวน', 'วัตถุดิบที่เป็นเอกลักษณ์ก็คือ พริกเสฉวน หน้าตาและสีสันจะดุเดือดเลือดพล่าน รสชาติอร่อยเด็ด', 'foodlist/14.png', 70),
(16, 'ปอเปี๊ยะ', 'สัญลักษณ์แทนความเป็นสิริมงคลในช่วงเฉลิมฉลองเทศกาลฤดูใบไม้ผลิ ทำให้เกิดสิริมงคลแก่ชีวิตด้วย', 'foodlist/15.png', 65),
(17, 'ผัดหมี่', 'เส้นหมี่ลวก นำไปผัดกับซอส ใส่เนื้อสัตว์ลงไปจะได้รสชาติหมี่แบบจีนที่เหนียวนุ่ม และรสเข้มข้นของซอส', 'foodlist/16.png', 70),
(18, 'ซุปปลากะพงบะหมี่หยก', 'น้ำซุปปลาสูตรพิเศษ โดยใช้ผักสมุนไพรมาต้มกับกระดูกปลาช่วยดับกลิ่นคาวปลาได้', 'foodlist/17.png', 235),
(19, 'กระเพาะปลาผัดแห้ง', 'กระเพาะปลาผัดแห้งแบบใส่ไก่ ถั่วงอก และเห็ดหอม ใช้ไข่เป็ดฟองใหญ่เพื่อให้สีผัดกระเพาะปลาสวยขึ้น ', 'foodlist/18.png', 250),
(20, 'ข้าวอบหนำเลี๊ยบหมู', 'หนำเลี๊ยบเป็นพืชตระกูลมะกอกดำ นำมาทานคู่กับข้าวอบ และใส่เนื้อสัตว์ลงไป', 'foodlist/19.png', 120),
(21, 'ไก่ห่อใบเตย', 'ไก่ห่อใบเตยเด่นที่กลิ่น รส และเนื้อสัมผัสไก่นุ่มๆ หมักเครื่องปรุงได้รสเข้มข้น', 'foodlist/20.png', 110),
(22, 'เนื้อเป็ดผัดพริกเกลือ', 'เนื้อเป็ดนุ่มๆ ผัดกับเครื่องพริกเกลือแบบเน้นๆ ทั้งพริก กระเทียม ต้นหอม กรอบๆ', 'foodlist/21.png', 75);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `slip_date` date NOT NULL,
  `slip_time` varchar(255) NOT NULL,
  `slip_price` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `book_date` date NOT NULL,
  `book_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `file`, `slip_date`, `slip_time`, `slip_price`, `firstname`, `lastname`, `book_date`, `book_time`) VALUES
(32, 6, 'uploads/payment.jpg', '2022-05-10', '13:36', 50, 'ภัทรสุดา', 'ยมนา', '2022-05-10', '20:00'),
(33, 6, 'uploads/payment.jpg', '2022-05-08', '13:36', 50, 'ภัทรสุดา', 'ยมนา', '2022-05-08', '12:00'),
(34, 2, 'uploads/payment.jpg', '2022-05-09', '14:17', 175, 'Patsuda', 'Yommana', '2022-05-19', '13:00'),
(35, 2, 'uploads/payment.jpg', '2022-05-10', '14:20', 50, 'Patsuda', 'Yommana', '2022-05-10', '20:00'),
(36, 2, 'uploads/payment.jpg', '2022-05-07', '14:22', 700, 'Patsuda', 'Yommana', '2022-05-07', '12:00'),
(37, 2, 'uploads/payment.jpg', '2022-05-20', '14:23', 495, 'Patsuda', 'Yommana', '2022-05-20', '15:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone`, `email`, `username`, `pass`, `user_type`) VALUES
(2, 'Patsuda', 'Yommana', 946908727, 'ptaoon@gmail.com', 'user', '123', 'user'),
(3, 'admin', 'admin', 0, 'ptaoon@gmail.com', 'kitchen', '123', 'kitchen'),
(4, 'admin', 'admin', 0, 'ptaoon@gmail.com', 'welcome', '123', 'welcome'),
(6, 'ภัทรสุดา', 'ยมนา', 946908727, 'ptaoon@gmail.com', 'onnpxy', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `confirm`
--
ALTER TABLE `confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_list`
--
ALTER TABLE `food_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `confirm`
--
ALTER TABLE `confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `food_list`
--
ALTER TABLE `food_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
