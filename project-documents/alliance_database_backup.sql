-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2016 at 05:48 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alliance`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `user` text NOT NULL,
  `date` date NOT NULL,
  `comment_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `item_id`, `rating`, `user`, `date`, `comment_text`) VALUES
(1, 2, 5, 'Christopher', '2016-11-27', 'Great book! Love the series!');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `Email` varchar(128) NOT NULL,
  `Password` text NOT NULL,
  `First Name` text NOT NULL,
  `Last Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`Email`, `Password`, `First Name`, `Last Name`) VALUES
('admin@bookstore', '$2y$10$iF9J9jL877ok0F1YEiVf.uMCgJRNM5IX0mKjHW2cuLDTAf2Jf2n8q', 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `date`, `status`) VALUES
(1, 2, '2016-12-06 15:44:24', 'Preparing for shipment'),
(9, 4, '2016-12-06 16:20:44', 'Preparing for shipment'),
(10, 4, '2016-12-06 16:21:52', 'Preparing for shipment'),
(11, 4, '2016-12-06 16:22:59', 'Preparing for shipment'),
(12, 4, '2016-12-06 16:24:08', 'Preparing for shipment'),
(13, 4, '2016-12-06 16:25:59', 'Preparing for shipment'),
(14, 4, '2016-12-06 16:29:28', 'Preparing for shipment'),
(15, 4, '2016-12-06 16:37:37', 'Preparing for shipment'),
(16, 4, '2016-12-06 16:39:22', 'Preparing for shipment'),
(17, 4, '2016-12-06 16:39:38', 'Preparing for shipment'),
(18, 4, '2016-12-06 16:40:19', 'Preparing for shipment'),
(19, 4, '2016-12-06 16:40:52', 'Preparing for shipment'),
(20, 4, '2016-12-06 16:41:21', 'Preparing for shipment'),
(21, 4, '2016-12-06 16:41:51', 'Preparing for shipment'),
(22, 4, '2016-12-06 16:42:54', 'Preparing for shipment'),
(23, 4, '2016-12-06 16:43:02', 'Preparing for shipment'),
(24, 4, '2016-12-06 16:46:49', 'Preparing for shipment'),
(25, 4, '2016-12-06 21:13:27', 'Preparing for shipment'),
(26, 4, '2016-12-06 21:14:37', 'Preparing for shipment'),
(27, 4, '2016-12-06 21:52:43', 'Preparing for shipment');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `item_id`, `amount`) VALUES
(2, 2, 1),
(0, 4, 1),
(0, 2, 1),
(14, 2, 1),
(14, 4, 1),
(14, 4, 1),
(14, 2, 1),
(14, 2, 1),
(14, 4, 1),
(14, 2, 1),
(14, 4, 1),
(14, 4, 1),
(14, 2, 1),
(14, 4, 1),
(14, 2, 1),
(14, 2, 1),
(14, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  `Price` double NOT NULL,
  `Author` text NOT NULL,
  `Publisher` text NOT NULL,
  `Link` text NOT NULL,
  `Amount` int(11) NOT NULL,
  `Categories` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Description`, `Price`, `Author`, `Publisher`, `Link`, `Amount`, `Categories`) VALUES
(1, 'Interactive Computer Graphics: A Top-Down Approach with Shader-Based OpenGL (6th Edition)', 'Computer animation and graphics–once rare, complicated, and comparatively expensive–are now prevalent in everyday life from the computer screen to the movie screen. Interactive Computer Graphics: A Top-Down Approach with Shader-Based OpenGL®, 6e, is the only introduction to computer graphics text for undergraduates that fully integrates OpenGL 3.1 and emphasizes application-based programming. Using C and C++, the top-down, programming-oriented approach allows for coverage of engaging 3D material early in the text so readers immediately begin to create their own 3D graphics. Low-level algorithms (for topics such as line drawing and filling polygons) are presented after readers learn to create graphics.', 140.99, 'Edward Angel', 'Pearson', 'https://images-na.ssl-images-amazon.com/images/I/51mG5L1RaTL._AC_US', 10, 'Textbook Computer Science Graphics '),
(2, 'The Last Wish: Introducing The Witcher', 'Geralt of Rivia is a witcher. A cunning sorcerer. A merciless assassin. And a cold-blooded killer.\r\n\r\nHis sole purpose: to destroy the monsters that plague the world. \r\n\r\nBut not everything monstrous-looking is evil and not everything fair is good. . . and in every fairy tale there is a grain of truth. \r\n', 5.69, 'Andrzej Sapkowski', 'Orbit', 'https://images-na.ssl-images-amazon.com/images/I/51fA7fl5CwL._AC_US', 12, 'Fantasy Witcher Drama Adventure'),
(3, 'Batman: Detective Comics Vol. 1: Faces of Death (The New 52)', 'As a part of the acclaimed DC Comics—The New 52 event of September 2011, Detective Comics is relaunched for the first time ever with an all-new number #1! Bruce Wayne returns as Batman, and sets his sights on new villain the Gotham Ripper, who in turn has his sights on Batman. Meanwhile, Bruce Wayne explores a budding romance with television journalist Charlotte Rivers, who\'s visiting Gotham City to cover the gruesome slayings–while also trying to uncover Bruce\'s own mystery. But time is running out as both Commissioner Gordon and Batman work to uncover the true identity of this new serial killer.\r\nThis volume collects issues 1-7 of Detective Comics, part of the DC Comics—The New 52 event.', 13.72, 'Tony S. Daniel', 'DC Comics', 'https://images-na.ssl-images-amazon.com/images/I/61w8YRzm1ZL._AC_US', 9, 'Comics Batman DC Universe '),
(4, 'Sword of Destiny (The Witcher)', 'Geralt is a witcher, a man whose magic powers, enhanced by long training and a mysterious elixir, have made him a brilliant fighter and a merciless assassin. Yet he is no ordinary murderer: his targets are the multifarious monsters and vile fiends that ravage the land and attack the innocent. \r\n\r\nThis is a collection of short stories, following the adventures of the hit collection THE LAST WISH. Join Geralt as he battles monsters, demons and prejudices alike...', 9.59, 'Andrzej Sapkowski', 'Orbit', 'https://images-na.ssl-images-amazon.com/images/I/51lhhkKszIL._AC_US', 11, 'Witcher Fantasy Drama Adventure'),
(5, 'Steve Jobs', 'Based on more than forty interviews with Jobs conducted over two years—as well as interviews with more than a hundred family members, friends, adversaries, competitors, and colleagues—Walter Isaacson has written a riveting story of the roller-coaster life and searingly intense personality of a creative entrepreneur whose passion for perfection and ferocious drive revolutionized six industries: personal computers, animated movies, music, phones, tablet computing, and digital publishing.\r\nAt a time when America is seeking ways to sustain its innovative edge, and when societies around the world are trying to build digital-age economies, Jobs stands as the ultimate icon of inventiveness and applied imagination. He knew that the best way to create value in the twenty-first century was to connect creativity with technology. He built a company where leaps of the imagination were combined with remarkable feats of engineering.  \r\n\r\nAlthough Jobs cooperated with this book, he asked for no control over what was written nor even the right to read it before it was published. He put nothing off-limits. He encouraged the people he knew to speak honestly. And Jobs speaks candidly, sometimes brutally so, about the people he worked with and competed against. His friends, foes, and colleagues provide an unvarnished view of the passions, perfectionism, obsessions, artistry, devilry, and compulsion for control that shaped his approach to business and the innovative products that resulted.\r\n\r\nDriven by demons, Jobs could drive those around him to fury and despair. But his personality and products were interrelated, just as Apple’s hardware and software tended to be, as if part of an integrated system. His tale is instructive and cautionary, filled with lessons about innovation, character, leadership, and values', 11.91, 'Walter Isaacson', 'Simon & Schuster', 'https://images-na.ssl-images-amazon.com/images/I/418XttEFsaL._AC_US', 6, 'Biography Non-fiction Steve Jobs'),
(6, 'Honor Bound (The Montana Hamiltons)', 'Ainsley Hamilton has always been the responsible one of the family. As the oldest daughter of presidential candidate Buckmaster Hamilton, she\'s also a potential target. For months she\'s sensed someone following her. When an expedition to scout locations for a commercial takes a terrifying turn, she\'s rescued by a natural-born cowboy who tempts the good girl to finally let loose. \r\n\r\nSawyer Nash knows just how reckless it is to fall for someone he\'s gone undercover to protect. Yet masquerading as an extra on set, he starts to see beneath Ainsley\'s controlled facade. And with the election—and a killer—drawing closer, Sawyer stands to lose not just his job and his life but the woman for whom he\'d gladly risk both', 6.79, 'B.J. Daniels', 'HQN Books', 'https://images-na.ssl-images-amazon.com/images/I/51qT-uUq3OL._SY', 11, 'Romance Novel Drama'),
(8, 'It Ends with Us: A Novel', 'The newest, highly anticipated novel from beloved #1 New York Times bestselling author, Colleen Hoover.\r\n\r\nSometimes it is the one who loves you who hurts you the most.\r\n\r\nLily hasn’t always had it easy, but that’s never stopped her from working hard for the life she wants. She’s come a long way from the small town in Maine where she grew up—she graduated from college, moved to Boston, and started her own business. So when she feels a spark with a gorgeous neurosurgeon named Ryle Kincaid, everything in Lily’s life suddenly seems almost too good to be true.\r\n\r\nRyle is assertive, stubborn, maybe even a little arrogant. He’s also sensitive, brilliant, and has a total soft spot for Lily. And the way he looks in scrubs certainly doesn’t hurt. Lily can’t get him out of her head. But Ryle’s complete aversion to relationships is disturbing. Even as Lily finds herself becoming the exception to his “no dating” rule, she can’t help but wonder what made him that way in the first place.\r\n\r\nAs questions about her new relationship overwhelm her, so do thoughts of Atlas Corrigan—her first love and a link to the past she left behind. He was her kindred spirit, her protector. When Atlas suddenly reappears, everything Lily has built with Ryle is threatened. \r\n\r\nWith this bold and deeply personal novel, Colleen Hoover delivers a heart-wrenching story that breaks exciting new ground for her as a writer. Combining a captivating romance with a cast of all-too-human characters, It Ends With Us is an unforgettable tale of love that comes at the ultimate price.', 9.52, 'Colleen Hoover', 'Atria Books', 'https://images-na.ssl-images-amazon.com/images/I/51KZalxuryL._SY', 22, 'Romance Drama '),
(9, 'Leonard: My Fifty-Year Friendship with a Remarkable Man', 'Leonard Nimoy and William Shatner first crossed paths as actors on the set of The Man from U.N.C.L.E. Little did they know that their next roles as Spock and Captain Kirk, in a new science fiction television series, would shape their lives in ways no one could have anticipated. In seventy-nine television episodes of Star Trek and six feature films, they grew to know each other more than most friends could ever imagine.\r\n\r\nOver the course of half a century, Shatner and Nimoy saw each other through personal and professional highs and lows. In this powerfully emotional book, Shatner tells the story of a man who was his friend for five decades, recounting anecdotes and untold stories of their lives on and off set, as well as gathering stories from others who knew Nimoy well, to present a full picture of a rich life.\r\n\r\nAs much a biography of Nimoy as a story of their friendship, Leonard is a uniquely heartfelt book written by one legendary actor in celebration of another', 15.46, 'William Shatner, David Fisher', 'Thomas Dunne Books', 'https://images-na.ssl-images-amazon.com/images/I/51Xv7TYve3L._SY', 22, 'Biography Nonfiction'),
(28, 'Introduction to Algorithms, 3rd Edition', 'Some books on algorithms are rigorous but incomplete; others cover masses of material but lack rigor. Introduction to Algorithms uniquely combines rigor and comprehensiveness. The book covers a broad range of algorithms in depth, yet makes their design and analysis accessible to all levels of readers. Each chapter is relatively self-contained and can be used as a unit of study. The algorithms are described in English and in a pseudocode designed to be readable by anyone who has done a little programming. The explanations have been kept elementary without sacrificing depth of coverage or mathematical rigor.\r\n\r\nThe first edition became a widely used text in universities worldwide as well as the standard reference for professionals. The second edition featured new chapters on the role of algorithms, probabilistic analysis and randomized algorithms, and linear programming. The third edition has been revised and updated throughout. It includes two completely new chapters, on van Emde Boas trees and multithreaded algorithms, substantial additions to the chapter on recurrence (now called "Divide-and-Conquer"), and an appendix on matrices. It features improved treatment of dynamic programming and greedy algorithms and a new notion of edge-based flow in the material on flow networks. Many new exercises and problems have been added for this edition. As of the third edition, this textbook is published exclusively by the MIT Press.', 66.32, 'Thomas H Cormen, Clifford Stein Ronald Rivest, Charles E. Leiserson', 'The MIT Press', 'https://images-na.ssl-images-amazon.com/images/I/41-1VkO+1lL._AC_US', 9, 'Textbook Computer Science Algorithms');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Email` varchar(128) NOT NULL,
  `Password` text NOT NULL,
  `First Name` text NOT NULL,
  `Last Name` text NOT NULL,
  `id` int(16) NOT NULL,
  `Address 1` text NOT NULL,
  `Address 2` text NOT NULL,
  `Address 3` text NOT NULL,
  `City` text NOT NULL,
  `State` text NOT NULL,
  `Country` text NOT NULL,
  `Zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `Password`, `First Name`, `Last Name`, `id`, `Address 1`, `Address 2`, `Address 3`, `City`, `State`, `Country`, `Zipcode`) VALUES
('aaa@b.com', '$2y$10$w3jgHpGqCu4fE6m5Kv8IbOgxyiWcBi39vt9MvF20zVpWgly9pJ55K', 'azhar', 'aaaaa', 1, '', '', '', '', '', '', 0),
('alliance@alliance.dev', '$2y$10$O.9fUALIWO9OZbEg0E5rW.cD3rWNvDfFGJVtzAzIeBS53EYBAGxZS', 'Alliance', 'Alliance', 2, '4700 Taft Blvd', 'Apt#1', '', 'Wichita Falls', 'Texas', 'USA', 76308),
('azhar@xyz.com', '$2y$10$iBo33L/os2EsLBD76AxmZu8uo6DWsLc3axDYOFkOHmIHb1wmpPJ1i', 'azhar', 'Mohammad', 3, '', '', '', '', '', '', 0),
('cjames1201@my.mwsu.edu', '$2y$10$/FZy25WhQ/0YVAddyZpq5Ohim9pA00qqQJdnYTAnqgV1mixY4eULa', 'Christopher', 'James', 4, '4700 Taft Blvd Apt355', '', '', 'Wichita Falls', 'Texas', 'USA', 76308);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
