-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 01, 2022 lúc 09:42 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `assignment-php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `img` varchar(250) NOT NULL,
  `content` varchar(250) NOT NULL,
  `is_correct` varchar(10) NOT NULL,
  `question_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`id`, `img`, `content`, `is_correct`, `question_id`) VALUES
(6, '', 'cú pháp ctr + /', '1', 1),
(7, '', 'cú pháp shift +/', '0', 1),
(8, '', 'cú pháp alt +/', '0', 1),
(9, '', 'enter +/', '0', 1),
(30, '', 'client', '1', 20),
(31, '', 'sever', '', 20),
(32, '', 'client & sever', '', 20),
(33, '', 'không có đáp án nào', '', 20),
(34, '', 'thông dịch', '', 21),
(35, '', 'biên dịch', '1', 21),
(36, '', 'thông dịch & biên dịch', '', 21),
(37, '', 'không có đáp án nào', '', 21),
(38, '', 'viết riêng 1 trang', '', 22),
(39, '', 'viết chung với html', '', 22),
(40, '', ' cả 2 đáp án trên', '1', 22),
(41, '', 'không có đáp án nào', '', 22),
(46, '', 'chuyến 1 chuỗi thành 1 số', '', 24),
(47, '', 'chuyển một chuỗi thành 1 số nguyên', '1', 24),
(48, '', 'chuyển 1 chuỗi thành số thực', '', 24),
(49, '', 'chuyển 1 số thành 1 chuỗi', '', 24),
(50, '', 'hiện thị một thông báo nhập tin', '1', 25),
(51, '', 'hiện thị thông báo yes & no', '', 25),
(52, '', 'cả hại dạng trên', '', 25),
(53, '', 'không có đáp án nào', '', 25),
(54, '', 'Creative Style Sheets', '', 26),
(55, '', 'Computer Style sheets', '', 26),
(56, '', 'Cascading Style sheets', '1', 26),
(57, '', 'Colorfull Style sheets', '', 26),
(58, '', ' font=', '', 27),
(59, '', 'font:', '', 27),
(60, '', 'font-family:', '1', 27),
(61, '', 'font-family=', '', 27),
(62, '', ' font-weight:bold', '1', 28),
(63, '', 'style:bold', '0', 28),
(64, '', 'font-style:bold', '0', 28),
(65, '', 'Tất cả đều đúng', '0', 28),
(66, '', 'margin-left:', '1', 29),
(67, '', 'text-indent:', '', 29),
(68, '', 'indent:', '', 29),
(69, '', 'left:', '', 29),
(70, '', 'Liên kết chưa thăm', '', 30),
(71, '', 'Mouse over một thành phần', '1', 30),
(72, '', 'Liên kết đã thăm', '', 30),
(73, '', 'Kích hoạt một thành phần', '', 30),
(74, '', 'bg-image:hinh.jpg', '', 31),
(75, '', 'background-image:hinh.jpg', '', 31),
(76, '', 'background-image:url=hinh.jpg', '', 31),
(77, '', 'background-image:url(hinh.jpg)', '1', 31),
(78, '', 'background-attachment: fix', '', 32),
(79, '', 'background-attachment: fixed', '1', 32),
(80, '', ' background-attachment: scroll', '', 32),
(81, '', 'Tất cả đều sai', '', 32),
(82, '', 'text-align: center', '1', 33),
(83, '', 'text-align: justify', '', 33),
(84, '', 'font-align: center', '', 33),
(85, '', 'font-align: justify', '', 33),
(86, '', 'Đen', '', 34),
(87, '', 'Đỏ', '', 34),
(88, '', 'Trắng', '1', 34),
(89, '', 'Vàng', '0', 34),
(90, '', 'một đối tượng mất focus', '1', 35),
(91, '', 'khi di chuột qua form', '', 35),
(92, '', 'khi đối tượng trong form có focus', '', 35),
(93, '', 'khi kick vào phần tử', '', 35),
(94, '', 'number ,String ,boolean', '1', 36),
(95, '', 'Number,interger,char', '', 36),
(96, '', 'number ,String ,null', '', 36),
(97, '', 'Tất cả đều đúng', '', 36),
(98, '', 'chuyển 1 chuỗi thành 1 số', '', 37),
(99, '', 'chuyển 1 chuỗi thành số thực', '1', 37),
(100, '', 'chuyển 1 chuỗi thành 1 số nguyên', '', 37),
(101, '', 'không có đáp án nào', '', 37),
(102, '', 'khi bắt đầu chạy chương trìn', '', 38),
(103, '', 'khi di chuột qua', '', 38),
(104, '', 'khi kick vào phần tử', '1', 38),
(105, '', 'Tất cả đều đúng', '', 38),
(106, '', 'hiện thị thông báo yes & no', '1', 39),
(107, '', 'hiện thị một thông báo nhập tin', '', 39),
(108, '', 'hiện thị thông báo yes', '', 39),
(109, '', 'Tất cả đều sai', '', 39),
(134, '', 'si', '0', 69),
(135, '', 'si', '1', 69),
(136, '', 'ba', '0', 69),
(137, '', 'si', '0', 69);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL,
  `quiz_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `name`, `img`, `quiz_id`) VALUES
(1, 'Làm sao để add 1 comments trong CSS ?', '', 1),
(20, 'JavaScript là ngôn ngữ xử lý ở:', '', 13),
(21, 'JavaScript là ngôn ngữ thông dịch', '', 13),
(22, 'phương thức viết chương trình của javascript như t', '', 13),
(24, 'trong javascript hàm parseInt để làm gì', '', 13),
(25, 'lệnh prompt để làm gì', '', 13),
(26, 'CSS là viết tắt của ?', '', 1),
(27, 'Làm sao để thay đổi font của mỗi phần tử ?', '', 1),
(28, 'Làm sao để tạo chữ đậm?', '', 1),
(29, 'Làm sao để thay đổi lề trái của một phần tử ?', '', 1),
(30, ' a:hover là:', '', 1),
(31, ' Dòng nào đặt ảnh hinh.jpg làm ảnh nền trang web', '', 1),
(32, 'Dòng nào để thiết lập ảnh nền cố định', '', 1),
(33, ' Dòng nào để thiết lập canh đều cho văn bản', '', 1),
(34, ' Trong mã màu RGB dạng hệ thập lục, #FFFFFF là màu gì?', '', 1),
(35, 'sự kiện onblur được thực hiện khi nào', '', 13),
(36, 'JavaScript  có các dạng biến', '', 13),
(37, 'trong javascript hàm parseFloat để làm gì', '', 13),
(38, 'trong javascript sự kiện onclick thực hiện khi nào', '', 13),
(39, 'lệnh confirm dùng để làm gì', '', 13),
(69, 'hoang1505', '', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quizs`
--

CREATE TABLE `quizs` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `subject_id` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  `minutes` int(11) NOT NULL,
  `is_shuffle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quizs`
--

INSERT INTO `quizs` (`id`, `name`, `start_time`, `end_time`, `subject_id`, `status`, `minutes`, `is_shuffle`) VALUES
(1, 'Quiz 1', '2022-07-15 20:39:00', '2022-07-31 22:39:00', 1, 0, 15, 0),
(13, 'Quiz 1', '2022-02-07 09:02:00', '2022-02-28 21:02:00', 2, 0, 120, 0),
(14, 'Quiz 2', '2022-02-21 10:14:00', '2022-02-21 10:14:00', 2, 0, 15, 0),
(15, 'Quiz1', '2022-06-24 14:03:00', '2022-06-30 14:03:00', 3, 0, 20, 0),
(16, 'Quiz 2', '2022-06-24 10:41:00', '2022-07-01 10:41:00', 3, 0, 20, 0),
(20, 'Quiz 2', '2022-02-22 20:40:00', '2022-02-28 20:40:00', 1, 0, 18, 0),
(21, 'Quiz4', '2022-06-06 10:03:00', '2022-06-30 22:03:00', 1, 0, 25, 0),
(38, 'hoangnvph1', '2022-02-23 10:45:00', '2022-02-27 10:45:00', 2, 0, 15, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'giáo viên'),
(2, 'học sinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_quiz`
--

CREATE TABLE `student_quiz` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `quiz_id` int(10) NOT NULL,
  `score` decimal(10,0) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `student_quiz`
--

INSERT INTO `student_quiz` (`id`, `student_id`, `quiz_id`, `score`, `start_time`, `end_time`) VALUES
(88, 7, 1, '3', '2022-02-23 10:31:25', '2022-02-23 10:31:48'),
(89, 1, 1, '1', '2022-06-24 16:30:22', '2022-06-24 16:31:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_quiz_detail`
--

CREATE TABLE `student_quiz_detail` (
  `id` int(11) NOT NULL,
  `student_quiz_id` int(10) NOT NULL,
  `answer_id` int(10) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `student_quiz_detail`
--

INSERT INTO `student_quiz_detail` (`id`, `student_quiz_id`, `answer_id`, `question_id`) VALUES
(149, 86, 7, 1),
(150, 86, 55, 26),
(151, 86, 60, 27),
(152, 86, 62, 28),
(153, 86, 66, 29),
(154, 86, 71, 30),
(155, 86, 77, 31),
(156, 86, 84, 33),
(157, 86, 88, 34),
(158, 86, 79, 32),
(159, 87, 30, 20),
(160, 87, 34, 21),
(161, 87, 39, 22),
(162, 87, 48, 24),
(163, 87, 51, 25),
(164, 87, 90, 35),
(165, 87, 95, 36),
(166, 87, 99, 37),
(167, 87, 104, 38),
(168, 87, 106, 39),
(169, 88, 6, 1),
(170, 88, 55, 26),
(171, 88, 63, 28),
(172, 88, 66, 29),
(173, 88, 76, 31),
(174, 88, 83, 33),
(175, 88, 88, 34),
(176, 89, 7, 1),
(177, 89, 54, 26),
(178, 89, 59, 27),
(179, 89, 67, 29),
(180, 89, 70, 30),
(181, 89, 75, 31),
(182, 89, 80, 32),
(183, 89, 82, 33),
(184, 89, 86, 34),
(185, 89, 65, 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `author_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `description`, `author_id`) VALUES
(1, 'Thiết kế web với HTML5&CSS3 ', 'HTML là gì? Là chữ viết tắt của Hyper Text Markup Language, tạm dịch là ngôn ngữ đánh dấu siêu văn bản và được sử dụng phổ biến trên Word Wide Web.\r\nCòn CSS là gì?  Là viết tắt của Cascading Style Sheets, là dạng ngôn ngữ đi tìm và định dạng lại các             \r\n ', 1),
(2, 'Lập trình cơ sở với Javascript', ' JavaScript là một trong những ngôn ngữ lập trình phổ biến nhất trên thế giới. Ban đầu JavaScript được thiết kế để phát triển web front-end tương tác, nhưng sau được mở rộng cho phát triển ứng dụng và web back-end trong vài năm qua. Điều này dẫn đến việc số lượng người muốn học JavaScript tăng lên, cũng như ngày càng có nhiều khóa học JavaScript trực tuyến khác nhau, tự cho là hướng dẫn học lập trình JavaScript tốt nhất.\r\n ', 1),
(3, ' Lập trình PHP 1', '    Lập trình PHP là ngôn ngữ lập trình mã nguồn mở phía server được thiết kế để dễ dàng xây dựng các trang web động. Mã PHP có thể thực thi trên server để tạo ra mã HTML và xuất ra trình duyệt web theo yêu cầu của người sử dụng. PHP cho phép xây dựng ứng dụng web trên mạng internet tương tác với mọi cơ sở dữ liệu như: MySQL, Oracle,… Ngôn ngữ lập trình PHP được tối ưu hóa cho các ứng dụng web, tốc độ nhanh, nhỏ gọn, cú pháp giống C và Java, dễ học và thời gian xây dựng sản phẩm tương đối ngắn hơn so với các ngôn ngữ khác nên PHP đã nhanh chóng trở thành một ngôn ngữ lập trình phổ biến nhất thế giới.    ', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `avatar` varchar(150) DEFAULT NULL,
  `role_id` int(10) NOT NULL DEFAULT 2,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `google_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `role_id`, `email`, `password`, `google_id`) VALUES
(1, 'hoangnv', '', 1, 'hoangnvph15198@fpt.edu.vn', 'hoang', NULL),
(2, 'long9x', '', 2, 'long@gmail.com', 'long', NULL),
(4, 'Kiên nvnfg', '', 2, 'Kienph11111@fpt.edu.vn', 'kien', NULL),
(7, 'Namnvph15999', '', 2, 'Namnv@gmail.com', 'nam15999', NULL),
(36, 'dien thoai 1', 'images/H8Z3s3PgW3tKXMLdTuGTWIu1EU2gIrNQNMpG9pGd.png', 2, 'gang@gmail.com', '1231', NULL),
(37, 'hoang', 'images/tQNxVOYA85PzPmB2OHcr46L6QnEFcAn8xV6ysz5B.png', 2, 'nguyenvanhoang2444@gmail.com', '12313', NULL),
(38, 'iphone 5', 'images/iYwUe1eRY95MNCouyUM6xSze0MvfvGkal3N8uYBi.png', 2, 'Namnv@gmail.com', '123456', NULL),
(46, 'Quiz454', 'images/NDlYn3jyAVpAnkZB5lNttnNfFOd4y8jihPo7Hy2M.png', 2, 'long@gmail.com', 'ncvbcv', NULL),
(47, 'Quiz4v', 'images//150705iPhone_11_Pro_Max_MG_1.png', 2, 'hoangnvph15198@fpt.edu.vn', '1232312', NULL),
(48, 'Hoàng Nguyễn', NULL, 2, 'nguyenvanhoang2444@gmail.com', NULL, '104632705562936008368'),
(49, 'Nguyễn Văn Hoàng PH 1 5 1 9 8', NULL, 2, 'hoangnvph15198@fpt.edu.vn', NULL, '110866336754102777896');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_ibfk_1` (`question_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sp_quiz` (`quiz_id`);

--
-- Chỉ mục cho bảng `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subkject` (`subject_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student_quiz`
--
ALTER TABLE `student_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quiz` (`quiz_id`),
  ADD KEY `fk_sudent` (`student_id`);

--
-- Chỉ mục cho bảng `student_quiz_detail`
--
ALTER TABLE `student_quiz_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_auther` (`author_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `student_quiz`
--
ALTER TABLE `student_quiz`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `student_quiz_detail`
--
ALTER TABLE `student_quiz_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_sp_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quizs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `quizs`
--
ALTER TABLE `quizs`
  ADD CONSTRAINT `fk_subkject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `student_quiz`
--
ALTER TABLE `student_quiz`
  ADD CONSTRAINT `fk_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quizs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sudent` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `fk_auther` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
