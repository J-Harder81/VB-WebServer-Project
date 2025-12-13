SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `jtt_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `jtt_db`;

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `registered`) VALUES
(1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@example.com', '2026-12-07 00:00:00'),
(2, 'test2', '$2y$10$TClCXX5u0IPv1W2WqmE8ueEQVeLrHFaShExIfaTTJ30e0aGq32xey', 'test2@example.com', '2025-12-08 00:00:16');

CREATE TABLE `layers` (
  `id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `layers` (`id`, `title`, `description`, `file`, `image`) VALUES
(1, 'Linux', 'The operating system that serves as the foundation for the stack.', 'assets/files/txt/linux.txt', 'assets/images/linux-logo.png'),
(2, 'Apache', 'The web server software that handles HTTP requests and serves web pages to users.', 'assets/files/txt/apache.txt', 'assets/images/apache-logo.png'),
(3, 'MySQL', 'The database management system used to store and manage application data.', 'assets/files/txt/mysql.txt', 'assets/images/mysql-logo.png'),
(4, 'PHP', 'The server-side scripting language used to develop dynamic web content and interact with the database.', 'assets/files/txt/php.txt', 'assets/images/php-logo.png');

CREATE TABLE `tutorials` (
  `id` int NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tutorials` (`id`, `title`, `file`) VALUES
(1, 'Virtual Machine Setup', 'assets/files/pdf/vm-setup.pdf'),
(2, 'Install Ubuntu Server', 'assets/files/pdf/us-install.pdf'),
(3, 'Configure Ubuntu Server', 'assets/files/pdf/linux.pdf'),
(4, 'Install & Configure Apache', 'assets/files/pdf/apache.pdf'),
(5, 'Install & Configure MySQL', 'assets/files/pdf/mysql.pdf'),
(6, 'Install & Configure PHP', 'assets/files/pdf/php.pdf');


ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `layers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `layers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `tutorials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
