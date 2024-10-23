DROP DATABASE IF EXISTS carrentalp;
CREATE DATABASE carrentalp CHARACTER SET utf8 COLLATE utf8_general_ci;
use carrentalp;




CREATE TABLE `cars` (
    `car_id` int(20) NOT NULL,
    `car_name` varchar(50) NOT NULL,
    `car_nameplate` varchar(50) NOT NULL,
    `car_img` varchar(50),
    `priceDay` float NOT NULL,
    `nbplace` int NOT NULL, -- Champs 'nbplace' sans guillemets
    `fule` varchar(20), -- Champs 'fule' sans guillemets
    `car_availability` varchar(10) NOT NULL CHECK (car_availability IN ('yes','no')) -- Contrainte CHECK
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

 

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_nameplate`, `car_img`, `priceDay`, `nbplace`, `fule`, `car_availability`) VALUES
    (1, 'Audi A4', 'GA3KA6969', 'img/cars/audi-a4.png',  300, 5, 'Petrol', 'yes'),
    (2, 'Hyundai Creta', 'BA2CH2020', 'img/cars/creta.png',  290, 5, 'Petrol', 'yes'),
    (3, 'BMW 6-Series', 'BA10PA5555', 'img/cars/bmw6.png', 250, 5, 'Petrol', 'yes'),
    (4, 'Mercedes-Benz E-Class', 'BA10CH6009', 'img/cars/mcec.png',  720, 5, 'Diesel', 'yes'),
    (6, 'Ford EcoSport', 'GA4PA2587', 'img/cars/ecosport.png',  300, 5, 'Petrol', 'yes'),
    (7, 'Honda Amaze', 'PJ16YX8820', 'img/cars/amaze.png',  280, 5, 'Petrol', 'no'),
    (8, 'Land Rover Range Rover Sport', 'GA5KH9669', 'img/cars/rangero.png',  200, 5, 'Diesel', 'yes'),
    (9, 'MG Hector', 'GA6PA6666', 'img/cars/mghector.png',  290, 5, 'Petrol', 'yes'),
    (10, 'Honda CR-V', 'TN17MS1997', 'img/cars/hondacr.png',  285, 5, 'Diesel', 'yes'),
    (11, 'Mahindra XUV 500', 'KA12EX1883', 'img/cars/Mahindra XUV.png',  300, 7, 'Diesel', 'yes'),
    (12, 'Toyota Fortuner', 'GA08MX1997', 'img/cars/Fortuner.png',  320, 7, 'Diesel', 'yes'),
    (13, 'Hyundai Veloster', 'BA20PA5685', 'img/cars/hyundai0.png',  350, 5, 'Petrol', 'yes'),
    (14, 'Jaguar XF', 'GA8KH8866', 'img/cars/jaguarxf.png',  500, 5,'Petrol', 'yes');




--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE  `customers` (
  `customer_username` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_email` varchar(25) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_username`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_password`) VALUES

('antonio', 'Antonio M', '0785556580', 'antony@gmail.com', '2677 Burton Avenue', 'antonio123'),
('christine', 'Christine', '8544444444', 'chr@gmail.com', '3701 Fairway Drive', 'christine123'),
('ethan', 'Ethan Hawk', '69741111110', 'thisisethan@gmail.com', '4554 Rowes Lane', 'ethan123'),
('james', 'James Washington', '0258786969', 'james@gmail.com', '2316 Mayo Street', 'james123'),
('lucas', 'Lucas Rhoades', '7003658500', 'lucas@gmail.com', '2737 Fowler Avenue', 'lucas123');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE  `driver` (
`driver_id` int(20) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `dl_number` varchar(50) NOT NULL,
  `driver_phone` varchar(15) NOT NULL,
  `driver_address` varchar(50) NOT NULL,
  `driver_gender` varchar(10) NOT NULL,
  `driver_availability` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--
INSERT INTO `driver` (`driver_id`, `driver_name`, `dl_number`, `driver_phone`, `driver_address`, `driver_gender` ,`driver_availability`) VALUES ('0', '',  '', '', '', '', '');
INSERT INTO `driver` (`driver_id`, `driver_name`, `dl_number`, `driver_phone`, `driver_address`, `driver_gender` ,`driver_availability`) VALUES
(1, 'Bruno Den', '27840218658 ', '9547863157', '1782  Vineyard Drive', 'Male', 'yes'),
(2, 'Will Williams', '03191563155 ', '9147523684', '4354  Hillcrest Drive', 'Male', 'yes'),
(3, 'Steeve Rogers', '32346288078 ', '9147523682', '1506  Skinner Hollow Road', 'Male', 'yes'),
(4, 'Ivy', '04316015965 ', '9187563240', '4680  Wayside Lane', 'Female', 'no'),
(5, 'Pamela C Benson', '68799466631 ', '7584960123', 'Urkey Pen Road', 'Female', 'yes'),
(6, 'Billy Williams', '36740186040 ', '8421025476', '2898  Oxford Court', 'Male', 'yes'),
(7, 'Nicolas', '44919316260 ', '7541023695', 'Breezewood Court', 'Male', 'yes'),
(8, 'Stephen Strange', '94592817723', '5215557850', 'Fairview Street12', 'Male', 'yes');





-- --------------------------------------------------------

--
-- Table structure for table `rentedcars`
--

CREATE TABLE  `rentedcars` (
`id` int(100) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `car_id` int(20) NOT NULL,
  `driver_id` int(20) NOT NULL,
  `booking_date` date NOT NULL,
  `rent_start_date` date NOT NULL,
  `rent_end_date` date NOT NULL,
  `car_return_date` date DEFAULT NULL,
  `no_of_days` int(50) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `return_status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=574681260 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentedcars`
--

INSERT INTO `rentedcars` (`id`, `customer_username`, `car_id`, `driver_id`, `booking_date`, `rent_start_date`, `rent_end_date`, `car_return_date`, `no_of_days`, `total_amount`, `return_status`) VALUES
(574681245, 'ethan', 4, 2, '2021-07-18', '2021-07-01', '2021-07-02', '2021-07-18',  1, 5884, 'R'),
(574681246, 'james', 6, 6, '2021-07-18', '2021-06-01', '2021-06-28', '2021-07-18',   27, 5035, 'R'),
(574681247, 'antonio', 3, 1, '2021-07-18', '2021-07-19', '2021-07-22', '2021-07-20',   3, 5473, 'R'),
(574681248, 'ethan', 1, 2, '2021-07-20', '2021-07-28', '2021-07-29', '2021-07-20',   1, 690, 'R'),
(574681249, 'james', 1, 2, '2021-07-23', '2021-07-24', '2021-07-25', '2021-07-23',   1, 5000, 'R'),
(574681250, 'lucas', 3, 2, '2021-07-23', '2021-07-23', '2021-07-24', '2021-07-23',   1, 2600, 'R'),
(574681251, 'james', 10, 1, '2021-07-23', '2021-07-25', '2021-07-30', '2021-07-23', 2, 600, 'R'),
(574681252, 'christine', 11, 2, '2021-07-23', '2021-07-23', '2021-07-23', '2021-07-23', 0, 2600, 'R'),
(574681253, 'christine', 6, 7, '2021-07-23', '2021-07-23', '2021-08-03', '2021-07-23', 11, 28600, 'R'),
(574681254, 'ethan', 12, 5, '2021-07-23', '2021-07-23', '2021-07-26', '2021-07-23', 3, 9600, 'R'),
(574681255, 'christine', 8, 5, '2021-07-23', '2021-07-23', '2021-08-08', '2021-07-23', 16, 38400, 'R'),
(574681258, 'lucas', 3, 1, '2024-03-24', '2024-03-24', '2024-03-25', '2024-03-24', 1, 2600, 'R'),
(574681259, 'lucas', 14, 8, '2024-03-24', '2024-03-24', '2024-03-26', '2024-03-24', 2, 12200, 'R');

CREATE TABLE `employee` (
  `employee_username` varchar(50) NOT NULL PRIMARY KEY,
  `employee_name` varchar(50) NOT NULL,
  `employee_phone` varchar(15) NOT NULL,
  `employee_email` varchar(25) NOT NULL,
  `employee_address` varchar(50) NOT NULL,
  `employee_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `employee` (`employee_username`, `employee_name`, `employee_phone`, `employee_email`, `employee_address`, `employee_password`) VALUES ('admin', 'chaima doggaz', '56782456', 'chaima.doggaz@gmail.com', 'nabeul', 'chaima123');
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
 ADD PRIMARY KEY (`car_id`), ADD UNIQUE KEY `car_nameplate` (`car_nameplate`);

--
-- Indexes for table `clientcars`


--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`customer_username`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
 ADD PRIMARY KEY (`driver_id`), ADD UNIQUE KEY `dl_number` (`dl_number`);

--
-- Indexes for table `rentedcars`
--
ALTER TABLE `rentedcars`
 ADD PRIMARY KEY (`id`), ADD KEY `customer_username` (`customer_username`), ADD KEY `car_id` (`car_id`), ADD KEY `driver_id` (`driver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
MODIFY `car_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
MODIFY `driver_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rentedcars`
--
ALTER TABLE `rentedcars`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=574681260;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientcars`
--


--
-- Constraints for table `driver`
--

--
-- Constraints for table `rentedcars`
--
ALTER TABLE `rentedcars`
ADD CONSTRAINT `rentedcars_ibfk_1` FOREIGN KEY (`customer_username`) REFERENCES `customers` (`customer_username`),
ADD CONSTRAINT `rentedcars_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
ADD CONSTRAINT `rentedcars_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`);


