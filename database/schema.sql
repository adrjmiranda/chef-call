DROP DATABASE IF EXISTS `cheff_call`;
CREATE DATABASE `cheff_call` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `cheff_call`;

CREATE TABLE `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `first_name` VARCHAR(100) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) UNIQUE NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(15),
  `image_name` VARCHAR(15),
  `role` ENUM('admin', 'customer') NOT NULL DEFAULT 'customer'
);

CREATE TABLE `addresses` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `street` VARCHAR(255) NOT NULL,
  `neighborhood` VARCHAR(255) NOT NULL,
  `number` CHAR(6) NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  CONSTRAINT `fk_address_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
); 

CREATE TABLE `categories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL UNIQUE,
  `description` VARCHAR(255) NOT NULL,
  `image_name` VARCHAR(255)
);

CREATE TABLE `dishes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `image_name` VARCHAR(255),
  `price` DECIMAL(10,2) NOT NULL CHECK (`price` > 0),
  `category_id` INT UNSIGNED NOT NULL,
  CONSTRAINT `fk_dishes_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
);

CREATE TABLE `orders` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `status` ENUM('pending', 'preparing', 'delivery', 'delivered', 'canceled') NOT NULL DEFAULT 'pending',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total` DECIMAL(10,2) NOT NULL CHECK (`total` >= 0),
  `customer_id` INT UNSIGNED NOT NULL,
  CONSTRAINT `fk_orders_customer` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
);

CREATE TABLE `order_items` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `quantity` INT UNSIGNED NOT NULL CHECK (`quantity` > 0),
  `unit_price` DECIMAL(10,2) NOT NULL CHECK(`unit_price` > 0), 
  `subtotal` DECIMAL(10,2) GENERATED ALWAYS AS (`quantity` * `unit_price`) STORED,
  `order_id` INT UNSIGNED NOT NULL,
  `dish_id` INT UNSIGNED NOT NULL,
  CONSTRAINT `fk_order_item_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_order_item_dish` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE
);

CREATE TABLE `payments` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `method` ENUM('card', 'money', 'pix') NOT NULL,
  `status` ENUM('pending', 'approved', 'refused') NOT NULL DEFAULT 'pending',
  `order_id` INT UNSIGNED NOT NULL,
  CONSTRAINT `fk_payments_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
);

