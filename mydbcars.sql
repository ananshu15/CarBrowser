SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `car` (
  `id` int(6) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `year` int(4) NOT NULL,
  `color` varchar(30) NOT NULL,
  `body` varchar(30) NOT NULL,
  `transmission` varchar(30) NOT NULL,
  `dtype` varchar(30) NOT NULL,
  `img_dir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `car` (`id`, `brand`, `model`, `year`, `color`, `body`, `transmission`, `dtype`, `img_dir`) VALUES
(1, 'Buggati', 'Chiron', 2022, 'Black', 'Sport', 'Automatic', 'FWD', 'cars/buggati.jpg'),
(2, 'Mclaren', 'Spider', 2022, 'Yellow', 'Sport', 'Automatic', 'FWD', 'cars/Mclaren.jpg'),
(3, 'Rolls Royce', 'Gost', 2020, 'Green', 'Luxury', 'Automatic', 'RWD', 'cars/RollsRoyce.jpg'),
(4, 'Ferrari', 'Spider', 2022, 'Blue', 'Convertible', 'Automatic', 'AWD', 'cars/Ferrari.jpg'),
(5, 'Lamborghini', 'Urus', 2021, 'Silver', 'SUV', 'Automatic', 'AWD', 'cars/Lamborghini.jpg'),
(6, 'Bentley ', 'Continental', 2022, 'Grey', 'Sport', 'Manual', 'RWD', 'cars/AstonMartin.jpg');


ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);


ALTER TABLE `car`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

