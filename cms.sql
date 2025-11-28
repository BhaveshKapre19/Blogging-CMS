-- Database: cms

CREATE DATABASE IF NOT EXISTS `cms`;
USE `cms`;

-- Table structure for table `categories`
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `users`
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text,
  `role` varchar(255) NOT NULL,
  `randSalt` varchar(255) DEFAULT '$2y$10$iusesomecrazystrings22',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `posts`
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(3) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL DEFAULT '0',
  `post_status` varchar(255) NOT NULL DEFAULT 'Draft',
  `post_views_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `comments`
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(3) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL DEFAULT 'unapproved',
  `comment_date` date NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `users_online`
CREATE TABLE IF NOT EXISTS `users_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) NOT NULL,
  `time_Q` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert default categories
INSERT INTO `categories` (`cat_title`) VALUES
('Bootstrap'),
('Java'),
('PHP'),
('Javascript');

-- Note: You should register a new user via the registration page (registration.php)
-- and then update their role to 'Admin' in the database to access the admin panel.
-- Example: UPDATE users SET role = 'Admin' WHERE username = 'your_username';
