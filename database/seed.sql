-- Create the database 
CREATE DATABASE IF NOT EXISTS task_tracker;
USE task_tracker;

-- Drop tables if they exist
SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS tasks;
DROP TABLE IF EXISTS users;
SET FOREIGN_KEY_CHECKS=1;


-- Create the users table
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(100) NOT NULL ,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('admin', 'user') DEFAULT 'user',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Create the tasks table
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `assigned_to` INT(11) UNSIGNED,
  `due_date` DATE,
  `status` ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`assigned_to`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Insert a sample user (password hashed with bcrypt)
INSERT INTO `users` (`username`, `password`, `role`) VALUES
('admin',  '$2y$10$sacWZG8ty9YhU4fqE.NjHeKrOLbszzrdTrBZAcj8mcBu9shXDJwn6','admin'), -- password: admin123
('alaa', '$2y$10$8LLp4OfdpfL/rk/UaRmG7u1xPgi1JKxhtr5vAzbofdYpG5bSUjrEu', 'user'); -- password: alaa123

-- Insert sample task data
INSERT INTO `tasks` (`title`, `description`, `assigned_to`, `due_date`, `status`) VALUES
('Design Login Page', 'Create a login page', 2, '2025-06-01', 'pending'),
('Develop API', 'Develop the overdue tasks API', 1, '2025-05-31', 'in_progress'),
('Admin Dashboard', 'Develop the admin dashboard ', 2, '2025-05-30', 'completed');
