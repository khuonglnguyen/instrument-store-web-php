-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 12:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instrumentstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,
  `productImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `productId`, `qty`, `productName`, `productPrice`, `productImage`) VALUES
(40, 1, 6, 1, 'Essex EUP-123EA1', '230000000', '4c301f519e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(2, 'Piano', 1),
(4, 'Guitar', 1),
(5, 'Organ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `receivedDate` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `createdDate`, `receivedDate`, `status`) VALUES
(39, 31, '2021-12-07', '2021-12-07', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderId`, `productId`, `qty`, `productPrice`, `productName`, `productImage`) VALUES
(36, 39, 7, 2, '3190000', 'GUITAR YAMAHA CX40', 'd3ac08c33e.jpg'),
(37, 39, 4, 1, '749000000', 'Boston GP-156', 'a30bcd79d7.jpg'),
(38, 39, 8, 3, '19000000', 'Taylor 114E', 'cb50eef0d8.jpg'),
(39, 39, 9, 4, '4200000', 'Takamine D2D', '758ded2800.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `originalPrice` decimal(10,0) NOT NULL,
  `promotionPrice` decimal(10,0) NOT NULL,
  `image` varchar(50) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `cateId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `soldCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `originalPrice`, `promotionPrice`, `image`, `createdBy`, `createdDate`, `cateId`, `qty`, `des`, `status`, `soldCount`) VALUES
(2, 'Kohler & Campbell KIG50D', '233000000', '220000000', '95548b09b3.jpg', 1, '0000-00-00', 2, 96, 'Với kích thước linh hoạt, giúp người chơi dễ dàng bố trí phù hợp cho mọi không gian. Giờ đây, người chơi sẽ không còn lo ngại với diện tích không gian chật hẹp. Từ phòng khách, sảnh nhà hàng, khách sạn,.. hay bất cứ đâu Kohler & Campbell KiG50D sẽ góp phần làm nổi bật không gian thêm phần sang trọng.', 1, 4),
(3, 'Kawai ND-21', '90500000', '85000000', '8d2e8819d7.jpg', 1, '0000-00-00', 2, 9, 'Đàn Piano Kawai ND-21 hiện thân cho vẻ đẹp của một cây Piano Acoustic ở phân khúc giá rẻ. Khoác bên ngoài vẻ đẹp sang trọng của một cây đàn upright piano.', 1, 1),
(4, 'Boston GP-156', '749000000', '749000000', 'a30bcd79d7.jpg', 1, '0000-00-00', 2, 19, 'Đàn piano Boston là một thương hiệu con của hãng Piano lừng danh Steinway & Sons, mang cùng một tiêu chuẩn xuất sắc của tất cả các công cụ được thiết kế bởi hãng này. GP-156 PE được thừa hưởng những thiết kế ưu việt của thương hiệu Steinway, mang âm sắc cổ điện với thiết kế tinh tế, đẹp và hiện đại.', 1, 1),
(5, 'Kohler & Campbell J310B', '98000000', '90000000', '109cc07e03.jpg', 1, '0000-00-00', 2, 8, 'Công ty Công nghiệp Kohler & Campbell, Inc đã được thành lập vào năm 1896 tại New York bởi 2 nhà đồng thời sáng lập là Charles Kohler và John Campbell. Campbell là một thợ máy đã phát minh ra một số máy chế biến gỗ và sắt và sau đó đã áp dụng vào việc chế tạo đàn piano.', 1, 2),
(6, 'Essex EUP-123EA1', '230000000', '230000000', '4c301f519e.jpg', 1, '0000-00-00', 2, 7, 'Piano Essex EUP-123E nổi bật với phong cách cổ điển, sang trọng. Cây đàn được thiết kế bởi thương hiệu Steinway & Sons, phối hợp với nhà thiết kế đồ nội thất nổi tiếng William Faber tạo nên sự đẳng cấp, tinh tế của cây đàn.aah', 1, 3),
(7, 'GUITAR YAMAHA CX40', '3190000', '3190000', 'd3ac08c33e.jpg', 1, '2021-12-07', 4, 8, 'Đàn Classic Guitar Yamaha CX40', 1, 2),
(8, 'Taylor 114E', '19000000', '19000000', 'cb50eef0d8.jpg', 1, '2021-12-07', 4, 7, 'Đàn guitar Taylor 114E là một dòng sản phẩm acoustic thuộc dòng series 1 của taylor với thiết kế độc đáo đó chính là khớp nối cần đàn và sử dụng gỗ sitka spruce tạo âm thanh vô cùng trong trẻo, sống động, giúp người chơi có thể cảm nhận được tốt hơn và đây cũng là ưu điểm nổi bật tạo lên sự thành công cho thương hiệu Taylor.', 1, 3),
(9, 'Takamine D2D', '4200000', '4200000', '758ded2800.jpg', 1, '2021-12-07', 4, 6, 'Đàn guitar Takamine D2D là sản phẩm nổi bật của thương hiệu Takamine Nhật Bản và được rất nhiều tín đồ săn đón trong thời gian gần đây. Không những mang đến một thiết kế dáng đàn đẹp mắt, vừa vặn với mọi dáng người mà âm thanh tuyệt vời mà bạn không thể chê vào đâu được.', 1, 4),
(10, 'Takamine ED2DCNAT', '6350000', '6200000', '1dfd0eec5c.jpg', 1, '2021-12-07', 4, 10, 'Đàn guitar Takamine ED2DCNAT là một sản phẩm được thiết kế hoàn hảo đến từng chi tiết với mặt đàn được làm từ gỗ Spruce, mặt sau và hông đàn được làm từ gỗ Mahogany, cùng hệ thống điện tử khuếch đại âm thanh để truyền tải âm thanh đến cho người nghe một cách rõ ràng và chân thật nhất.\r\n\r\nChắc hẳn, đây chính là cây đàn guitar tuyệt vời dành riên cho bạn, bất kể bạn là người mới học hay là người chơi đàn guitar có nhiều kinh nghiệm.', 1, 0),
(11, 'TAYLOR 150E 12 String', '21100000', '21100000', '9bc38b3364.jpg', 1, '2021-12-07', 4, 10, 'Đàn Guitar Taylor 150E 12 String là cây đàn acoustic sở hữu 12 dây đàn đã tạo ra âm thanh tốt, chuẩn xác, thiết kế độc đáo, tinh tế cùng với việc cân bằng ánh sáng octave sắc nét đã tạo ra tông màu tươi sáng, tốt và rõ ràng. Đây chắc hẳn là những tính năng nổi bật đã tạo nên sự khác biệt trong các loại đàn khác.', 1, 0),
(12, 'TAYLOR 214CE DLX', '34700000', '34700000', 'e235fe0bc6.jpg', 1, '2021-12-07', 4, 10, 'Đàn guitar Taylor 214CE DLX sở hữu thiết kế độc đáo với đường nét trên cơ thể mượt mà mang đến âm thanh trung thực, giai điệu rõ ràng và sử dụng chất liệu gỗ rosewood đem lại giai điệu tuyệt vời trong một loại nhạc cụ tuyệt đẹp.', 1, 0),
(13, 'Roland BK-9', '31000000', '31000000', 'bf843e62a9.jpg', 1, '2021-12-07', 5, 20, 'Đàn organ Roland BK-9 là công cụ hàng đầu mới trong loạt dòng BK nổi tiếng, mang lại âm thanh giật gân, nhịp điệu hàng đầu, và một lựa chọn đáng kinh ngạc của các tính năng cao cấp. Bạn có một thế giới âm nhạc dưới sự kiểm soát của ngón tay, với một lựa chọn âm thanh tuyệt vời - bao gồm âm thanh SuperNATURAL nổi tiếng của Roland - và một loạt các giai điệu đệm hoàn toàn remastered trong gần như mọi thể loại âm nhạc, từ cổ điển đến hiện đại.', 1, 0),
(14, 'Roland E-A7', '29000000', '29000000', 'd1a3f61f87.jpg', 1, '2021-12-07', 5, 15, 'Đàn organ Roland E-A7 là cây đàn cao cấp dùng để biểu diễn hoặc đi show với hơn 1.500 âm sắc nhạc cụ đến từ khắp nơi trên thế giới, 156 nút chuyên dụng để truy cập tức thì vào chức năng cho hiệu suất trình diễn mạnh mẽ.', 1, 0),
(15, 'Roland FA-06', '29500000', '29500000', '8f40bd6405.jpg', 1, '2021-12-07', 5, 10, 'Đàn organ Roland FA-06 là một sản phẩm cao cấp đến từ Roland với âm thanh tốt và nhiều tính năng hấp dẫn hỗ trợ người sử dụng để trình diễn trên sân khấu một cách xuất sắc nhất. Ngoài ra với thiết kế nhỏ gọn nên dễ dàng mang đi di chuyển để biểu diễn mà không lo cồng kềnh hư hỏng.', 1, 0),
(16, 'Roland FA-08', '44300000', '44300000', 'a12f8914dc.jpg', 1, '2021-12-07', 5, 10, 'Đàn organ Roland FA-08 sở hữu đầy đủ chức năng của một Music Workstation với thiết kế chắc chắn, tính linh hoat cao cùng với hiệu ứng Studio chất lượng cao, điều khiển thời gian thực, hỗ trợ chức năng Sampling và phát lại âm thanh ngay lập tức từ 16 mặt pad có trang bị đèn tín hiệu.', 1, 0),
(17, 'Roland AXSYNTH', '25100000', '25100000', '422b3a5da2.jpg', 1, '2021-12-07', 5, 20, 'Đàn organ Roland AXSYNTH mang một phong cách mới của Roland, với việc sử dụng âm thanh mạnh mẽ, phong cách solo mới nhất của Roland và có thể đeo lên vai thực hiện phần trình diễn được hiệu quả hơn trên sân khấu.', 1, 0),
(18, 'Roland GAIA SH-01', '14300000', '14300000', 'c43d221a7b.jpg', 1, '2021-12-07', 5, 5, 'Đàn organ Roland GAIA SH-01 cung cấp cho bạn một tấn hiệu ứng (reverb, biến dạng, lông tơ, tai nạn bit, flanger, phaser, pitch shifter, tăng thấp và trì hoãn) để khám phá âm những giới hạn âm thanh tuyệt vời, với những nút tính năng điều chỉnh dễ dàng mang lại sự sáng tạo vô biên của người chơi khi sử dụng cây đàn organ này.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `address` varchar(500) NOT NULL,
  `isConfirmed` tinyint(4) NOT NULL DEFAULT 0,
  `captcha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `dob`, `password`, `role_id`, `status`, `address`, `isConfirmed`, `captcha`) VALUES
(1, 'admin@gmail.com', 'Nguyễn Lập An Khương', '2021-11-01', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '', 1, ''),
(31, 'lapankhuongnguyen@gmail.com', 'khuong nguyen', '2021-12-06', 'c4ca4238a0b923820dcc509a6f75849b', 2, 1, 'CanTho', 1, '56661');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`),
  ADD KEY `product_id` (`productId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`orderId`),
  ADD KEY `product_id` (`productId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cateId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cateId`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
