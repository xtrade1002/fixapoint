
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(50) DEFAULT 'pending' COMMENT '0:pending,1: paid,2:deleted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;


INSERT INTO `appointments` (`id`, `user_id`, `service_id`, `date`, `time`, `status`, `created_at`) VALUES
(17, 6, 1, '2025-04-13', '09:00:00', 'cancelled', '2025-04-12 17:21:44'),
(18, 7, 2, '2025-04-14', '10:00:00', 'pending', '2025-04-12 17:21:44'),
(19, 8, 3, '2025-04-15', '11:00:00', 'confirmed', '2025-04-12 17:21:44'),
(20, 9, 4, '2025-04-16', '12:00:00', 'pending', '2025-04-12 17:21:44');


CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;


INSERT INTO `bookings` (`id`, `name`, `phone`, `service`, `duration`, `slot`) VALUES
(1, 'Vendég1', '06201234156', 'Szolgáltatás1', 45, '10:00-11:00'),
(2, 'Vendég2', '06201234256', 'Szolgáltatás2', 30, '11:00-12:00'),
(3, 'Vendég3', '06201234356', 'Szolgáltatás3', 30, '12:00-13:00'),
(4, 'Vendég4', '06201234456', 'Szolgáltatás4', 60, '13:00-14:00'),
(5, 'Vendég5', '06201234556', 'Szolgáltatás5', 60, '14:00-15:00');


CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;


INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `submitted_at`, `is_read`) VALUES
(8, 'Bettina Ersching', 'xtrade1002@gmail.com', '01736154730', '', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-04-10 13:59:26', 1),
(11, 'Jani Tamás', 'teszt@gmail.com', '01234567', 'Péntek időpont', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-04-12 12:12:16', 1),
(12, 'Kis Réka', 'koldo12@email.com', '0670123412', 'Műszempilla időpont', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-04-12 17:21:44', 1),
(13, 'Nagy Szabolcs', 'koldo13@email.com', '0670123413', 'Foglalás törlése', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-04-12 17:21:44', 1),
(14, 'Fekete Tóni', 'koldo14@email.com', '0670123414', 'Érdeklődés', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-04-12 17:21:44', 1),
(15, 'Fehér Elek', 'koldo15@email.com', '0670123415', 'Fodrászat időpont', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-04-12 17:21:44', 1),
(16, 'Tóth Endre', 'koldo16@email.com', '0670123416', 'Lemondás', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-04-12 17:21:44', 1),
(17, 'Teszt', 'teszt@gmx.de', '01234567', 'Időpont?', 'Olvasatlan üzenet tesztelés?', '2025-04-13 11:48:16', 0);


CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_duration` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;



INSERT INTO `prices` (`id`, `service_id`, `service_duration`, `price`) VALUES
(1, 1, 90, 7115.61),
(2, 2, 90, 6368.36),
(3, 3, 30, 7860.09),
(4, 4, 30, 6506.76);


CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `nameOfService` varchar(255) NOT NULL,
  `categoryOfService` varchar(45) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;


INSERT INTO `services` (`id`, `nameOfService`, `categoryOfService`, `description`, `duration`, `price`) VALUES
(1, 'Masszázs', 'Wellness', 'Relaxáló masszázs, stresszoldás.', 60, 5000.00),
(2, 'Műszempilla', 'Szépségápolás', 'Műszempillák építése természetes hatással.', 90, 8000.00),
(3, 'Kozmetikai kezelés', 'Szépségápolás', 'Arcápolás, bőrtáplálás és hidratálás.', 60, 4000.00),
(4, 'Manikűr', 'Szépségápolás', 'Kéz- és körömápolás, lakkozás.', 45, 3000.00);


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


INSERT INTO `users` (`id`, `fullName`, `companyName`, `phone`, `coupon`, `newsletter`, `email`, `password`, `registered_at`, `terms`) VALUES
(6, 'Bettina E.', 'teszt clg', '01736154730', '', 0, 'xtrade1002@gmail.com', '$2y$10$JE/F2bmn5iWpkVGvH3ENe..q2x4Uj7xR2noLD3fisPh3OJ3.ec3vO', '2025-04-10 15:20:13', 1),
(7, 'Teszt Felhasználó7', 'TesztCég7', '0610123457', 'KEDVEZMENY7', 1, 'teszt7@example.com', '$2y$10$TesztJelszoHash', '2025-04-12 17:21:44', 1),
(8, 'Teszt Felhasználó8', 'TesztCég8', '0610123458', 'KEDVEZMENY8', 1, 'teszt8@example.com', '$2y$10$TesztJelszoHash', '2025-04-12 17:21:44', 1),
(9, 'Teszt Felhasználó9', 'TesztCég9', '0610123459', 'KEDVEZMENY9', 1, 'teszt9@example.com', '$2y$10$TesztJelszoHash', '2025-04-12 17:21:44', 1),
(10, 'Teszt Felhasználó10', 'TesztCég10', '06101234510', 'KEDVEZMENY10', 1, 'teszt10@example.com', '$2y$10$TesztJelszoHash', '2025-04-12 17:21:44', 1),
(11, 'Teszt Felhasználó11', 'TesztCég11', '06101234511', 'KEDVEZMENY11', 1, 'teszt11@example.com', '$2y$10$TesztJelszoHash', '2025-04-12 17:21:44', 1);


ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`);


ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);


ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;


ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;


ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;
