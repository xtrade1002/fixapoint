-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Ápr 11. 09:53
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `booking_system`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(50) DEFAULT 'pending' COMMENT '0:pending,1: paid,2:deleted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `submitted_at`) VALUES
(8, 'Bettina Ersching', 'xtrade1002@gmail.com', '01736154730', '', 'Üzenet teszteléás', '2025-04-10 13:59:26');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_duration` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `nameOfService` varchar(255) NOT NULL,
  `categoryOfService` varchar(45) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `services`
--

INSERT INTO `services` (`id`, `nameOfService`, `categoryOfService`, `description`, `duration`, `price`) VALUES
(1, 'Masszázs', 'Wellness', 'Relaxáló masszázs, stresszoldás.', 60, 5000.00),
(2, 'Műszempilla', 'Szépségápolás', 'Műszempillák építése természetes hatással.', 90, 8000.00),
(3, 'Kozmetikai kezelés', 'Szépségápolás', 'Arcápolás, bőrtáplálás és hidratálás.', 60, 4000.00),
(4, 'Manikűr', 'Szépségápolás', 'Kéz- és körömápolás, lakkozás.', 45, 3000.00),
(5, 'Pedikűr', 'Szépségápolás', 'Lábápolás, körömmunka és lakkozás.', 60, 3500.00);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `coupon` varchar(50) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT 0 COMMENT '0 - nem kér, 1 - kér',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `terms` tinyint(1) DEFAULT 0 COMMENT '1 elfogadta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `fullName`, `companyName`, `phone`, `coupon`, `newsletter`, `email`, `password`, `registered_at`, `terms`) VALUES
(1, 'Kiss Anna', NULL, NULL, NULL, 0, 'anna@example.com', '', '2025-04-10 18:07:20', 0),
(2, 'Nagy Zsófia', NULL, NULL, NULL, 0, 'zsófia@example.com', '', '2025-04-10 18:07:20', 0),
(3, 'Farkas Laura', NULL, NULL, NULL, 0, 'laura@example.com', '', '2025-04-10 18:07:20', 0),
(4, '', NULL, NULL, NULL, 0, 'teszt@gmail.com', '$2y$10$dSlK4kgdovaGaF4CQcrdaeO9l12OtRwjNvBYatyRMD6iQ.PkA.F9m', '2025-04-04 08:02:15', 0),
(5, '', NULL, NULL, NULL, 0, 'teszt@gmx.hu', '$2y$10$abcdefg1234567890hijklmnopqrstuvwxYz1234567890ABCD', '2025-04-10 04:55:06', 0),
(6, 'Bettina Ersching', 'Xtrade', '01736154730', '', 0, 'xtrade1002@gmail.com', '$2y$10$JE/F2bmn5iWpkVGvH3ENe..q2x4Uj7xR2noLD3fisPh3OJ3.ec3vO', '2025-04-10 15:20:13', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`);

--
-- A tábla indexei `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- A tábla indexei `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
