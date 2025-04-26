-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 09:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_add`
--

CREATE TABLE `admin_add` (
  `id` int(11) NOT NULL,
  `Advertisement_Title` varchar(20) NOT NULL,
  `Advertisement_Description` varchar(50) NOT NULL,
  `Advertisement_Type` enum('Image only','Text only','Both') NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Submitted_On` datetime NOT NULL DEFAULT current_timestamp(),
  `Start_date` datetime NOT NULL,
  `End_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_add`
--

INSERT INTO `admin_add` (`id`, `Advertisement_Title`, `Advertisement_Description`, `Advertisement_Type`, `cover_image`, `Price`, `Submitted_On`, `Start_date`, `End_date`) VALUES
(29, 'E-books and Tablets ', 'E-tablets sale', '', '68026cf386c7f.png', 6500.00, '2025-04-18 20:47:07', '2025-04-18 20:46:00', '2025-08-22 20:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `ID` int(10) NOT NULL,
  `User_ID` int(10) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Content` varchar(16000) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ID`, `User_ID`, `Title`, `Author`, `Content`, `created_at`) VALUES
(6, 26, 'Test Article', 'Rehan Peiris', 'Testing the Articles. \r\nHello!', '2024-11-29'),
(8, 26, 'The Ultimate Productivity Hack is Saying No', 'James Clear', 'The ultimate productivity hack is saying no.\r\n\r\nNot doing something will always be faster than doing it. This statement reminds me of the old computer programming saying, “Remember that there is no code faster than no code.”\r\n\r\nThe same philosophy applies in other areas of life. For example, there is no meeting that goes faster than not having a meeting at all.\r\n\r\nThis is not to say you should never attend another meeting, but the truth is that we say yes to many things we don’t actually want to do. There are many meetings held that don’t need to be held. There is a lot of code written that could be deleted.\r\n\r\nHow often do people ask you to do something and you just reply, “Sure thing.” Three days later, you’re overwhelmed by how much is on your to-do list. We become frustrated by our obligations even though we were the ones who said yes to them in the first place.\r\n\r\nIt’s worth asking if things are necessary. Many of them are not, and a simple “no” will be more productive than whatever work the most efficient person can muster.\r\n\r\nBut if the benefits of saying no are so obvious, then why do we say yes so often?\r\n\r\nWhy We Say Yes\r\nWe agree to many requests not because we want to do them, but because we don’t want to be seen as rude, arrogant, or unhelpful. Often, you have to consider saying no to someone you will interact with again in the future—your co-worker, your spouse, your family and friends.\r\n\r\nSaying no to these people can be particularly difficult because we like them and want to support them. (Not to mention, we often need their help too.) Collaborating with others is an important element of life. The thought of straining the relationship outweighs the commitment of our time and energy.\r\n\r\nFor this reason, it can be helpful to be gracious in your response. Do whatever favors you can, and be warm-hearted and direct when you have to say no.\r\n\r\nBut even after we have accounted for these social considerations, many of us still seem to do a poor job of managing the tradeoff between yes and no. We find ourselves over-committed to things that don’t meaningfully improve or support those around us, and certainly don’t improve our own lives.\r\n\r\nPerhaps one issue is how we think about the meaning of yes and no.\r\n\r\nThe Difference Between Yes and No\r\nThe words “yes” and “no” get used in comparison to each other so often that it feels like they carry equal weight in conversation. In reality, they are not just opposite in meaning, but of entirely different magnitudes in commitment.\r\n\r\nWhen you say no, you are only saying no to one option. When you say yes, you are saying no to every other option.\r\n\r\nI like how the economist Tim Harford put it, “Every time we say yes to a request, we are also saying no to anything else we might accomplish with the time.” Once you have committed to something, you have already decided how that future block of time will be spent.\r\n\r\nIn other words, saying no saves you time in the future. Saying yes costs you time in the future. No is a form of time credit. You retain the ability to spend your future time however you want. Yes is a form of time debt. You have to pay back your commitment at some point.\r\n\r\nNo is a decision. Yes is a responsibility.\r\n\r\nThe Role of No\r\nSaying no is sometimes seen as a luxury that only those in power can afford. And it is true: turning down opportunities is easier when you can fall back on the safety net provided by power, money, and authority. But it is also true that saying no is not merely a privilege reserved for the successful among us. It is also a strategy that can help you become successful.\r\n\r\nSaying no is an important skill to develop at any stage of your career because it retains the most important asset in life: your time. As the investor Pedro Sorrentino put it, “If you don’t guard your time, people will steal it from you.”\r\n\r\nYou need to say no to whatever isn’t leading you toward your goals. You need to say no to distractions. As one reader told me, “If you broaden the definition as to how you apply no, it actually is the only productivity hack (as you ultimately say no to any distraction in order to be productive).”\r\n\r\nNobody embodied this idea better than Steve Jobs, who said, “People think focus means saying yes to the thing you’ve got to focus on. But that’s not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully.”\r\n\r\nThere is an important balance to strike here. Saying no doesn’t mean you’ll never do anything interesting or innovative or spontaneous. It just means that you say yes in a focused way. Once you have knocked out the distractions, it can make sense to say yes to any opportunity that could potentially move you in the right direction. You may have to try many things to discover what works and what you enjoy. This period of exploration can be particularly important at the beginning of a project, job, or career.\r\n\r\nUpgrading Your No\r\nOver time, as you continue to improve and succeed, your strategy needs to change.\r\n\r\nThe opportunity cost of your time increases as you become more successful. At first, you just eliminate the obvious distractions and explore the rest. As your skills improve and you learn to separate what works from what doesn’t, you have to continually increase your threshold for saying yes.\r\n\r\nYou still need to say no to distractions, but you also need to learn to say no to opportunities that were previously good uses of time, so you can make space for great uses of time. It’s a good problem to have, but it can be a tough skill to master.\r\n\r\nIn other words, you have to upgrade your “no’s” over time.\r\n\r\nUpgrading your no doesn’t mean you’ll never say yes. It just means you default to saying no and only say yes when it really makes sense. To quote the investor Brent Beshore, “Saying no is so powerful because it preserves the opportunity to say yes.”\r\n\r\nThe general trend seems to be something like this: If you can learn to say no to bad distractions, then eventually you’ll earn the right to say no to good opportunities.\r\n\r\nHow to Say No\r\nMost of us are probably too quick to say yes and too slow to say no. It’s worth asking yourself where you fall on that spectrum.\r\n\r\nIf you have trouble saying no, you may find the following strategy proposed by Tim Harford, the British economist I mentioned earlier, to be helpful. He writes, “One trick is to ask, “If I had to do this today, would I agree to it?” It’s not a bad rule of thumb, since any future commitment, no matter how far away it might be, will eventually become an imminent problem.”\r\n\r\nIf an opportunity is exciting enough to drop whatever you’re doing right now, then it’s a yes. If it’s not, then perhaps you should think twice.\r\n\r\nThis is similar to the well-known “Hell Yeah or No” method from Derek Sivers. If someone asks you to do something and your first reaction is “Hell Yeah!”, then do it. If it doesn’t excite you, then say no.\r\n\r\nIt’s impossible to remember to ask yourself these questions each time you face a decision, but it’s still a useful exercise to revisit from time to time. Saying no can be difficult, but it is often easier than the alternative. As writer Mike Dariano has pointed out, “It’s easier to avoid commitments than get out of commitments. Saying no keeps you toward the easier end of this spectrum.”\r\n\r\nWhat is true about health is also true about productivity: an ounce of prevention is worth a pound of cure.\r\n\r\nThe Power of No\r\nMore effort is wasted doing things that don’t matter than is wasted doing things inefficiently. And if that is the case, elimination is a more useful skill than optimization.\r\n\r\nI am reminded of the famous Peter Drucker quote, “There is nothing so useless as doing efficiently that which should not be done at all.”', '2024-11-29'),
(10, 49, 'New Title', 'Rehan Peiris', 'fere', '2025-04-14'),
(13, 49, 'Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling', 'Harry meets his Godfather', '2025-04-12'),
(18, 49, 'Title', 'Rehan Peiris', 'blah blah', '2025-04-16'),
(19, 49, 'Title 2', 'Rehan Peiris', 'blah blah blah', '2025-04-16'),
(24, 49, 'Title', 'Rehan Peiris', 'my content', '2025-04-19'),
(26, 49, 'Title', 'Rehan Peiris', 'Hello', '2025-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `starting_price` decimal(10,2) NOT NULL,
  `current_price` decimal(10,2) NOT NULL,
  `buy_now_price` decimal(10,2) DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `is_closed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `previous_bid` decimal(10,2) DEFAULT NULL,
  `current_bidder_id` int(11) DEFAULT NULL,
  `winner_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`id`, `book_id`, `seller_id`, `starting_price`, `current_price`, `buy_now_price`, `start_time`, `end_time`, `is_closed`, `created_at`, `previous_bid`, `current_bidder_id`, `winner_user_id`) VALUES
(15, 62, 49, 70000.00, 70200.00, 100000.00, '2025-04-17 00:19:00', '2025-04-24 00:19:00', 0, '2025-04-16 18:50:03', 70100.00, 52, NULL),
(21, 63, 52, 2000.00, 2000.00, 10000.00, '2025-04-17 00:39:00', '2025-04-24 00:39:00', 0, '2025-04-16 19:09:31', 2000.00, NULL, NULL),
(22, 64, 52, 2000.00, 2100.00, NULL, '2025-04-17 14:25:00', '2025-04-17 16:10:00', 1, '2025-04-17 08:55:27', 2000.00, 49, 49);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` enum('children','crime','education','fantasy','fiction','history','horror','mystery','non-fiction','romance','short-story','sci-fi') NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL DEFAULT 'English',
  `cover_image` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `book_condition` enum('new','like-new','very-good','good','acceptable','poor') NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('available','removed','auction') NOT NULL DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `seller_id`, `title`, `ISBN`, `author`, `genre`, `publisher`, `language`, `cover_image`, `price`, `discount`, `quantity`, `book_condition`, `description`, `status`, `created_at`) VALUES
(1, 26, 'Harry Potter and the cursed child', '9850-565662-6565', 'J.K. Rowling', 'fiction', 'sarasavi', 'English', 'Harry_Potter_and_the_Cursed_Child_Special_Rehearsal_Edition_Book_Cover.jpg', 2800.00, 10.00, 0, 'new', 'loremadfafa', 'available', '2024-09-16 15:57:09'),
(2, 29, 'It Ends with Us\r\n', '978-1-5011-1036-8', 'Colleen Hoover', 'romance', 'Atria Books', 'English', 'It_ends_with_us.jpg', 3800.00, 0.00, 5, 'new', 'It Ends with Us is a romance novel by Colleen Hoover, published by Atria Books on August 2, 2016. Based on the relationship between her mother and father, Hoover described it as \"the hardest book I\'ve ever written\". It explores themes of domestic violence and emotional abuse', 'available', '2024-09-16 16:32:54'),
(3, 29, 'The Fault in Our Stars\r\n\r\n', '978-1-5011-1036-9', 'John Green', 'romance', 'Dutton Books', 'English', 'the_fault_in_our_stars.jpg', 3800.00, 0.00, 5, 'new', 'The Fault in Our Stars is a novel by John Green. It is his fourth solo novel, and sixth novel overall. It was published on January 10, 2012.', 'available', '2024-09-16 16:39:47'),
(4, 29, 'Little Women', '978-1-5011-1036-10', 'Louisa May Alcott', 'fiction', 'Simon &amp;amp;amp; Schuster', 'English', 'Little_Women.jpg', 4999.00, 5.00, 0, 'new', 'Little Women is a coming-of-age novel written by American novelist Louisa May Alcott, originally published in two volumes, in 1868 and 1869.[1][2] The story follows the lives of the four March sisters—Meg, Jo, Beth, and Amy—and details their passage from childhood to womanhood. Loosely based on the lives of the author and her three sisters,[3][4]: 202  it is classified as an autobiographical or semi-autobiographical novel.[5][6]: 12 ', 'available', '2024-09-16 16:45:02'),
(5, 29, 'The Kite Runner\r\n', '978-1-5011-1036-30', 'Khaled Hosseini', 'fiction', 'Riverhead Books', 'English', 'the_kite_runner.jpg', 2999.00, 0.00, 20, 'new', 'The Kite Runner is the first novel by Afghan-American author Khaled Hosseini. Published in 2003 by Riverhead Books, it tells the story of Amir, a young boy from the Wazir Akbar Khan district of Kabul.', 'available', '2024-09-16 16:48:19'),
(6, 29, 'Five Feet Apart\r\n\r\n', '978-1-5011-1036-8', 'Mikki Daughtry, Rachael Lippincott, and Tobias Iaconis', 'romance', '‎Simon & Schuster Books for Young Readers', 'English', 'Five_feet_apart.jpg', 2999.00, 0.00, 14, 'new', 'Also a major motion picture starring Cole Sprouse and Haley Lu Richardson! Goodreads Choice Winner, Best Young Adult Fiction of 2019 In this #1 New York Times bestselling novel that’s perfect for fans ...', 'available', '2024-09-16 16:54:24'),
(7, 29, 'To Kill a Mockingbird', '9850-565662-6565', 'Harper Lee', 'fiction', 'J. B. Lippincott &amp; Co', 'English', 'to_kill_a_mocking_bird.jpg', 2800.00, 0.00, 5, 'new', 'To Kill a Mockingbird is a novel by the American author Harper Lee. It was published in July 1960 and became instantly successful. In the United States, it is widely read in high schools and middle schools', 'available', '2024-09-16 17:00:42'),
(8, 29, 'The Great Gatsby', '978-1-5011-1036-8', 'F. Scott Fitzgerald', 'fiction', 'Charles Scribner&#039;s Sons', 'English', 'the_great_gatsby.jpg', 3890.00, 5.00, 9, 'new', 'The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald. Set in the Jazz Age on Long Island, near New York City, the novel depicts first-person narrator Nick Carraway&#039;s interactions with mysterious millionaire Jay Gatsby and Gatsby&#039;s obsession to reunite with his former lover, Daisy Buchanan', 'available', '2024-09-16 17:05:59'),
(9, 29, 'The notebook', '66261112121212', 'Nicholas Sparks', 'romance', 'Warner Books', 'English', '674833098a0b9.jpg', 1500.00, 50.00, 8, 'new', 'sknkfs', 'available', '2024-11-28 09:08:25'),
(12, 29, 'Harry Potter', '9789510455067', 'J.K. Rowling', 'fiction', 'Warner Books', 'English', '67495e4392224.jpg', 1500.00, 20.00, 8, 'new', 'descripiton', 'available', '2024-11-29 06:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `bookseller`
--

CREATE TABLE `bookseller` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `dob` date NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `bank` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `rating` decimal(3,1) DEFAULT NULL
) ;

--
-- Dumping data for table `bookseller`
--

INSERT INTO `bookseller` (`id`, `user_id`, `full_name`, `gender`, `dob`, `phone_number`, `street_address`, `city`, `district`, `province`, `payment_method`, `bank`, `branch_name`, `account_number`, `account_name`, `rating`) VALUES
(1, 26, 'Nimamntha', 'male', '2024-09-04', '0783152739', 'sdd', 'pannipitya', 'colombo', 'Western', 'asdasda', '0', '0', '0', '0', NULL),
(2, 45, 'Rehan Peiris', 'male', '2002-04-09', '0123456789', '1', 'pannipitya', 'colombo', 'Western', 'Cash', '0', '0', '0', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookstore`
--

CREATE TABLE `bookstore` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_email` varchar(255) NOT NULL,
  `owner_phone_number` varchar(15) NOT NULL,
  `owner_nic` varchar(12) NOT NULL,
  `manager_name` varchar(255) DEFAULT NULL,
  `manager_email` varchar(255) DEFAULT NULL,
  `manager_phone_number` varchar(15) DEFAULT NULL,
  `manager_nic` varchar(12) DEFAULT NULL,
  `bank` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `business_reg_no` varchar(50) NOT NULL,
  `evidence_doc` varchar(255) NOT NULL,
  `status` enum('pending','approved') NOT NULL DEFAULT 'pending',
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  `rating` decimal(3,1) DEFAULT NULL,
  `followers` int(11) NOT NULL DEFAULT 0,
  `profile_picture` varchar(255) NOT NULL
) ;

--
-- Dumping data for table `bookstore`
--

INSERT INTO `bookstore` (`id`, `user_id`, `store_name`, `phone_number`, `street_address`, `city`, `district`, `province`, `owner_name`, `owner_email`, `owner_phone_number`, `owner_nic`, `manager_name`, `manager_email`, `manager_phone_number`, `manager_nic`, `bank`, `branch_name`, `account_number`, `account_name`, `business_reg_no`, `evidence_doc`, `status`, `createdAt`, `rating`, `followers`, `profile_picture`) VALUES
(2, 29, 'sarasavi', '0783152739', '74 Highlevel Rd, Maharagama', 'maharagama', 'colombo', 'western', 'Duleepa Edirisinghe', 'duleepa23@gmail.com', '0112465656', '200300901545', 'Kaveesha Nirmal', 'duleepa23@gmail.com', '0115646235', '200300901545', 'boc', 'Maharagama', '856979665624', 'Duleepa Edirisinghe', 'asdasd', '0', 'approved', '2024-09-17', NULL, 2, 'adv_68010812777896.99831442.png'),
(6, 39, 'sipsari', '0783152739', '15/6 High Level Road, Pannipitiya', 'pannipitya', 'colombo', 'western', 'K.M Silva', 'silva20@gmail.com', '0115462315', '200200901545', 'Lasan Perera', 'perera.lk@gmail.com', '0715624633', '195044662230', '', '', '', '', 'asdasd', '0', 'approved', '2024-09-17', NULL, 2, ''),
(7, 43, 'sasmitha', '0783152739', '15/6 Temple Road, Maharagama', 'pannipitya', 'gampaha', 'colombo', 'Sasmitha', 'duleepa23@gmail.com', '0783152739', '200300901545', 'Duleepa', 'duleepa23@gmail.com', '0783152739', '200300901545', '', '', '', '', '200312', '0', 'pending', '2024-11-29', NULL, 0, ''),
(8, 47, 'sipsarii', '0783152739', '15/6 Temple Road, Maharagama', 'pannipitya', 'colombo', 'colombo', 'Sasmitha', 'duleepa23@gmail.com', '0783152739', '200300901545', 'Duleepa', 'duleepa60@gmail.com', '0783152739', '200300901545', '', '', '', '', '200312', '0', 'pending', '2024-11-29', NULL, 0, ''),
(9, 49, 'makeen', '0445454545', 'ksksjjs', 'pannipitya', 'gampaha', 'colombo', 'makeen', 'info@gmail.com', '0783152739', '200300901545', 'makeenn', 'makeen@gmail.com', '0077547798', '200315462586', '', '', '', '', '20031313131', '6801585514e0d_makeen-books-evidence.pdf', 'approved', '2025-04-18', NULL, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `dob` date DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `user_id`, `full_name`, `gender`, `dob`, `phone_number`, `street_address`, `city`, `district`, `province`, `payment_method`) VALUES
(3, 20, 'Duleepa Edirisinghe', 'male', '2003-01-09', '0783152739', '15/6 Temple Road, Maharagama', 'maharagama', 'colombo', 'Western', 'card'),
(4, 21, 'Duleepa Edirisinghe', 'male', '2024-09-05', '0783152739', 'sdsdd', 'pannipitya', 'colombo', 'Western', 'sadas'),
(7, 27, 'Duleepa Edirisinghe', 'male', '2003-01-09', '0783152739', '15/6 Temple Road, Maharagama', 'maharagama', 'colombo', 'Western', 'card'),
(8, 38, 'Duleepa Edirisinghe', 'male', '2024-09-12', '0783152739', '15/6 Temple Road, Maharagama', 'maharagama', 'colombo', 'Western', 'card'),
(9, 41, 'sdadsd', 'male', '2024-10-30', '000', '15/6 Temple Road, Maharagama', 'pannipitya', 'gampaha', 'Western', 'sd'),
(10, 42, 'Nimamntha', 'male', '2024-11-14', '0783152739', 'sdd', 'pannipitya', 'colombo', 'Western', 'card'),
(11, 48, 'Rasheen Mohommade', 'male', '2002-08-09', '0783152739', 'abillawatta road,boralasgamuwa', 'pannipitya', 'colombo', 'Western', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` varchar(3000) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `nic_number` varchar(20) NOT NULL,
  `license_number` varchar(20) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `secondary_phone_number` varchar(15) DEFAULT NULL,
  `bank` varchar(100) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `account_number` varchar(30) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `vehicle_type` enum('bike','three-wheeler','car','van') NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `vehicle_registration_number` varchar(20) NOT NULL,
  `vehicle_registration_document` varchar(255) NOT NULL,
  `drivers_photo` varchar(255) NOT NULL,
  `photo_nic` varchar(255) NOT NULL,
  `photo_of_driving_license` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `gender`, `nic_number`, `license_number`, `address_line_1`, `address_line_2`, `city`, `phone_number`, `secondary_phone_number`, `bank`, `branch_name`, `account_number`, `account_name`, `vehicle_type`, `vehicle_model`, `vehicle_registration_number`, `vehicle_registration_document`, `drivers_photo`, `photo_nic`, `photo_of_driving_license`, `created_at`) VALUES
(1, 22, 'duleepa', 'Edirisinghe', '2024-09-07', 'male', 'asdadasd', '556565', '656565', '656565', '6565', '956565656565', '656565656', 'dfcc', 'sadad', '22121212', 'sdahdhaids', 'bike', 'asdasd', 'asdasd', '', '', '', '', '2024-09-15 19:45:18'),
(2, 44, 'duleepa', 'Edirisinghe', '2024-11-05', 'male', '200300901545', '2003', 'duleepa', 'duleepa', 'duleeap', '0783152739', '', 'pan-asia', 'mahargama', '22121212', '2asdas', 'three-wheeler', 'asdasd', 'asdadsa', '', '', '', '', '2024-11-29 03:56:04'),
(3, 46, 'Dasun', 'Athapaththu', '2024-11-11', 'male', '200205302535', '123456', 'polgahahena', 'palapotha', 'beliatta', '1234567890', '', 'boc', 'beliatta', '123456', 'dasun', 'bike', 'ct100', '12345', '', '', '', '', '2024-11-29 05:35:45'),
(4, 50, 'Nimsara', 'Wickramathanthree', '2002-02-21', 'male', '200200904515', '52232012320666', 'panadura', 'panadura', 'panadura', '0783152739', '0783152739', 'boc', 'Maharagama', '20031202565652', 'earnings', 'car', 'toyota', '502300130', '68021fd16c36c_vehicle registration photo.pdf', '', '68021fd16c81b_nic photo.pdf', '68021fd16c653_licence photo.pdf', '2025-04-18 09:48:01'),
(5, 52, 'Nimantha', 'sdjsd', '2003-01-09', 'male', '200300090154', '46465656565', 'polonnaruwa', 'pollnaruwa', 'polonnaruwa', '0783152739', '0783152739', 'boc', 'polonnaruwa', '202325656565656', 'savings', 'bike', 'truimph', '', '680224901bd05_vehicle registration photo.pdf', '', '680224901c173_nic photo.pdf', '680224901bf52_licence photo.pdf', '2025-04-18 10:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `couriercomplains`
--

CREATE TABLE `couriercomplains` (
  `id` int(11) NOT NULL,
  `order_id` varchar(10) DEFAULT NULL,
  `complain` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courierorder`
--

CREATE TABLE `courierorder` (
  `id` int(11) NOT NULL,
  `order_id` varchar(10) NOT NULL,
  `courier_id` varchar(10) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `status` enum('Accepted','Pending','Completed') NOT NULL DEFAULT 'Accepted',
  `pickup_location` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `distance` float NOT NULL,
  `timeframe` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courierorder`
--

INSERT INTO `courierorder` (`id`, `order_id`, `courier_id`, `buyer_id`, `status`, `pickup_location`, `shipping_address`, `distance`, `timeframe`) VALUES
(1, '28', '50', 0, 'Accepted', '28', '28', 0, '0000-00-00'),
(4, '21', '50', 0, 'Accepted', '21', '21', 0, '0000-00-00'),
(5, '22', '50', 0, 'Accepted', '22', '22', 0, '0000-00-00'),
(6, '20', '50', 0, 'Completed', '20', '20', 0, '0000-00-00'),
(8, '18', '50', 0, 'Accepted', '15/6 Temple Road, Maharagama', '15/6 Temple Road, Maharagama', 21.48, '2025-04-13'),
(9, '35', '50', 0, 'Completed', '74 Highlevel Rd, Maharagama', '15/6 Temple Road, Maharagama', 21.05, '2025-04-21'),
(10, '36', '50', 0, 'Completed', '74 Highlevel Rd, Maharagama', '15/6 Temple Road, Maharagama', 21.05, '2025-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `bookstore_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `buyer_id`, `bookstore_id`) VALUES
(42, 20, 39),
(43, 20, 29),
(44, 20, 49),
(45, 26, 29),
(46, 26, 39),
(47, 26, 49);

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `ID` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `status` enum('available','auction','sold','delivery','completed') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`ID`, `book_id`, `seller_id`, `status`) VALUES
(5, 55, 49, 'available'),
(6, 56, 49, 'available'),
(7, 57, 49, 'available'),
(9, 59, 49, 'available'),
(10, 60, 49, 'available'),
(11, 61, 49, 'available'),
(12, 62, 49, 'auction'),
(13, 63, 52, 'auction'),
(14, 64, 52, 'auction'),
(15, 65, 52, 'available'),
(16, 66, 52, 'available'),
(17, 67, 52, 'available'),
(18, 68, 52, 'available'),
(19, 69, 52, 'available'),
(20, 70, 52, 'available'),
(21, 71, 52, 'available'),
(22, 72, 52, 'available'),
(23, 73, 52, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` int(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`, `is_read`) VALUES
(2, 29, 20, 'hello duleepa', '2025-02-22 11:52:31', 1),
(3, 20, 29, 'hello sarasavi', '2025-02-22 11:52:50', 1),
(13, 29, 20, 'hello', '2025-02-22 12:09:58', 1),
(14, 29, 20, 'hello', '2025-02-22 12:13:03', 1),
(15, 29, 20, 'hello', '2025-02-22 12:13:04', 1),
(16, 29, 20, 'hello', '2025-02-22 12:13:10', 1),
(17, 29, 20, 'mama saravai', '2025-02-22 12:14:24', 1),
(18, 29, 20, 'mama', '2025-02-22 12:15:22', 1),
(19, 29, 20, 'hello', '2025-02-22 12:27:59', 1),
(20, 29, 20, 'hello', '2025-02-22 12:28:36', 1),
(21, 29, 20, 'bye', '2025-02-22 12:28:42', 1),
(22, 29, 20, 'bye', '2025-02-22 12:31:21', 1),
(23, 29, 20, 'hi again', '2025-02-22 18:41:02', 1),
(24, 20, 29, 'hello', '2025-02-22 18:42:10', 1),
(25, 29, 20, 'machan', '2025-02-22 18:42:14', 1),
(26, 20, 29, 'ss', '2025-03-07 06:15:28', 1),
(27, 20, 29, 's', '2025-04-12 10:18:04', 1),
(28, 20, 29, 'ss', '2025-04-12 10:18:20', 1),
(29, 29, 20, 'hi again', '2025-04-12 10:21:23', 1),
(30, 29, 20, 'hi for the last time', '2025-04-12 10:24:48', 1),
(31, 29, 20, 'hi not again', '2025-04-12 10:28:00', 1),
(32, 29, 20, 'hiiiiiiiiiiiii', '2025-04-12 10:28:21', 1),
(33, 20, 29, 'sskdaskjd', '2025-04-22 09:03:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(512) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title`, `content`, `link`, `is_read`, `created_at`) VALUES
(37, 49, '3', '3', NULL, 1, '2025-04-18 17:14:58'),
(42, 49, '8', '8', NULL, 1, '2025-04-18 17:14:58'),
(43, 49, '9', '9', NULL, 1, '2025-04-18 17:14:58'),
(44, 49, '10', '10', NULL, 1, '2025-04-18 17:14:58'),
(45, 49, '11', '11', NULL, 1, '2025-04-18 17:14:58'),
(46, 49, '12', '12', NULL, 1, '2025-04-18 17:14:58'),
(47, 49, '13', '13', NULL, 1, '2025-04-18 17:14:58'),
(48, 49, '14', '14', NULL, 1, '2025-04-18 17:14:58'),
(49, 49, '15', '15', NULL, 1, '2025-04-18 17:14:58'),
(50, 49, '16', '16', NULL, 1, '2025-04-18 17:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `order_status` enum('pending','shipping','completed','reviewed','canceled') DEFAULT 'pending',
  `payment_status` enum('successful','failed','refunded') DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `quanitity` int(11) DEFAULT NULL,
  `delivery_fee` decimal(10,2) DEFAULT NULL,
  `discount_applied` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `pickup_location` varchar(150) NOT NULL,
  `estimate_distance` float NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `province` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `created_on` datetime DEFAULT current_timestamp(),
  `shipped_date` datetime DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  `canceled_date` datetime DEFAULT NULL,
  `courier_id` int(11) DEFAULT NULL,
  `pinCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `buyer_id`, `book_id`, `seller_id`, `order_status`, `payment_status`, `payment_method`, `quanitity`, `delivery_fee`, `discount_applied`, `total_amount`, `pickup_location`, `estimate_distance`, `shipping_address`, `province`, `district`, `city`, `created_on`, `shipped_date`, `completed_date`, `canceled_date`, `courier_id`, `pinCode`) VALUES
(2, 20, 9, 29, 'pending', 'successful', NULL, 2, 250.00, 50.00, 1750.00, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-02-26 19:02:19', NULL, NULL, NULL, NULL, 0),
(3, 20, 9, 29, 'reviewed', 'successful', NULL, 1, 250.00, 50.00, 1000.00, '15/6 Temple Road, Maharagama', 0, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-03-07 11:43:42', '2025-04-07 23:22:36', '2025-04-08 23:22:36', NULL, NULL, 0),
(4, 20, 12, 29, 'reviewed', 'successful', NULL, 2, 250.00, 20.00, 2650.00, '15/6 Temple Road, Maharagama', 0, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-09 23:52:15', '2025-04-07 23:53:14', '2025-04-08 23:53:14', NULL, NULL, 0),
(5, 48, 7, 29, 'pending', 'successful', NULL, 2, 250.00, 0.00, 5850.00, '15/6 Temple Road, Maharagama', 21.48, 'abillawatta road,boralasgamuwa', 'Western', 'colombo', 'pannipitya', '2025-04-13 01:20:29', NULL, NULL, NULL, NULL, 0),
(6, 20, 7, 29, 'pending', 'successful', NULL, 1, 250.00, 0.00, 3050.00, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 19:55:37', NULL, NULL, NULL, NULL, 0),
(7, 20, 8, 29, 'pending', 'successful', NULL, 1, 250.00, 0.00, 3945.50, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 19:56:51', NULL, NULL, NULL, NULL, 0),
(8, 20, 9, 29, 'pending', 'successful', NULL, 4, 250.00, 50.00, 3250.00, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 20:03:29', NULL, NULL, NULL, NULL, 0),
(9, 20, 7, 29, 'pending', 'successful', NULL, 1, 250.00, 0.00, 3050.00, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 20:03:29', NULL, NULL, NULL, NULL, 0),
(10, 20, 6, 29, 'pending', 'successful', NULL, 1, 250.00, 0.00, 3249.00, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 20:11:16', NULL, NULL, NULL, NULL, 0),
(11, 20, 6, 29, 'pending', 'successful', NULL, 1, 250.00, 0.00, 3249.00, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 20:12:10', NULL, NULL, NULL, NULL, 0),
(12, 20, 6, 29, 'pending', 'successful', NULL, 1, 250.00, 0.00, 3249.00, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 20:12:23', NULL, NULL, NULL, NULL, 0),
(13, 20, 6, 29, 'pending', 'successful', NULL, 1, 250.00, 0.00, 3249.00, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 20:13:25', NULL, NULL, NULL, NULL, 0),
(14, 20, 4, 29, 'pending', 'successful', NULL, 1, 250.00, 5.00, 4999.05, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 20:16:30', NULL, NULL, NULL, NULL, 0),
(15, 20, 4, 29, 'pending', 'successful', NULL, 1, 250.00, 5.00, 4999.05, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 20:22:24', NULL, NULL, NULL, NULL, 0),
(16, 20, 4, 29, 'pending', 'successful', NULL, 1, 250.00, 5.00, 4999.05, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 20:29:19', NULL, NULL, NULL, NULL, 0),
(17, 20, 9, 29, 'pending', 'successful', NULL, 1, 250.00, 50.00, 1000.00, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 22:35:02', NULL, NULL, NULL, NULL, 0),
(18, 20, 6, 29, 'pending', 'successful', NULL, 1, 250.00, 0.00, 3249.00, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 22:37:43', NULL, NULL, NULL, 50, 44181),
(19, 20, 12, 29, 'pending', 'successful', NULL, 1, 250.00, 20.00, 1450.00, '15/6 Temple Road, Maharagama', 21.48, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 22:37:43', NULL, NULL, NULL, NULL, 0),
(20, 20, 4, 29, 'completed', 'successful', NULL, 1, 250.00, 5.00, 4999.05, '15/6 Temple Road, Maharagama', 0, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 22:37:43', '2025-04-20 13:32:36', NULL, NULL, 50, 95629),
(21, 20, 9, 29, 'shipping', 'successful', NULL, 1, 250.00, 50.00, 1000.00, '15/6 Temple Road, Maharagama', 0, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 22:55:39', '2025-04-19 22:37:00', NULL, NULL, 50, 40808),
(22, 20, 1, 26, 'pending', 'successful', NULL, 1, 250.00, 10.00, 2770.00, '15/6 Temple Road, Maharagama', 0, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-13 23:19:47', NULL, NULL, NULL, 50, 40832),
(28, 20, 7, 29, 'pending', 'successful', NULL, 1, 250.00, 0.00, 3050.00, '15/6 Temple Road, Maharagama', 0, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-19 01:37:32', NULL, NULL, NULL, 50, 56232),
(34, 20, 12, 29, 'pending', 'successful', NULL, 2, 250.00, 300.00, 2650.00, '74 Highlevel Rd, Maharagama', 21.05, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-20 20:04:19', NULL, NULL, NULL, NULL, 0),
(35, 20, 8, 29, 'canceled', 'refunded', NULL, 2, 250.00, 194.50, 7641.00, '74 Highlevel Rd, Maharagama', 21.05, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-21 01:58:57', '2025-04-20 22:48:53', '2025-04-21 02:22:31', '2025-04-20 22:57:00', 50, 46184),
(36, 20, 6, 29, 'completed', 'successful', NULL, 1, 250.00, 0.00, 3249.00, '74 Highlevel Rd, Maharagama', 21.05, '15/6 Temple Road, Maharagama', 'Western', 'colombo', 'maharagama', '2025-04-22 14:04:14', '2025-04-22 10:39:00', '2025-04-22 10:39:45', NULL, 50, 42900);

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE `payment_info` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_date` datetime DEFAULT current_timestamp(),
  `payment_amount` decimal(10,2) DEFAULT NULL,
  `payment_gateway` varchar(50) DEFAULT 'stripe',
  `type` enum('book','advertisment','','') NOT NULL DEFAULT 'book'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`payment_id`, `order_id`, `ad_id`, `transaction_id`, `payment_date`, `payment_amount`, `payment_gateway`, `type`) VALUES
(2, 2, NULL, NULL, '2025-02-26 19:02:19', 1750.00, 'stripe', 'book'),
(3, 2, NULL, NULL, '2025-03-07 11:43:42', 1000.00, 'stripe', 'book'),
(4, 2, NULL, NULL, '2025-04-09 23:52:15', 2650.00, 'stripe', 'book'),
(5, 5, NULL, NULL, '2025-04-13 01:20:29', 5850.00, 'stripe', 'book'),
(6, 2, NULL, NULL, '2025-04-13 19:55:37', 3050.00, 'stripe', 'book'),
(7, 2, NULL, NULL, '2025-04-13 19:56:51', 3945.50, 'stripe', 'book'),
(8, 2, NULL, NULL, '2025-04-13 20:03:29', 3250.00, 'stripe', 'book'),
(9, 6, NULL, NULL, '2025-04-13 20:03:29', 3050.00, 'stripe', 'book'),
(10, 10, NULL, NULL, '2025-04-13 20:12:23', 3249.00, 'stripe', 'book'),
(11, 10, NULL, NULL, '2025-04-13 20:13:25', 3249.00, 'stripe', 'book'),
(13, 15, NULL, NULL, '2025-04-13 20:22:24', 4999.05, 'stripe', 'book'),
(14, 16, NULL, NULL, '2025-04-13 20:29:19', 4999.05, 'stripe', 'book'),
(15, 17, NULL, NULL, '2025-04-13 22:35:02', 1000.00, 'stripe', 'book'),
(16, 18, NULL, NULL, '2025-04-13 22:37:43', 3249.00, 'stripe', 'book'),
(17, 19, NULL, NULL, '2025-04-13 22:37:43', 1450.00, 'stripe', 'book'),
(18, 20, NULL, NULL, '2025-04-13 22:37:43', 4999.05, 'stripe', 'book'),
(19, 21, NULL, NULL, '2025-04-13 22:55:40', 1000.00, 'stripe', 'book'),
(20, 22, NULL, NULL, '2025-04-13 23:19:47', 2770.00, 'stripe', 'book'),
(26, NULL, 4, NULL, '2025-04-16 00:18:11', 680.00, 'stripe', 'advertisment'),
(27, NULL, 5, NULL, '2025-04-16 02:20:01', 700.00, 'stripe', 'advertisment'),
(28, 28, NULL, NULL, '2025-04-19 01:37:32', 3050.00, 'stripe', 'book'),
(34, 34, NULL, NULL, '2025-04-20 20:04:19', 2650.00, 'stripe', 'book'),
(35, 35, NULL, NULL, '2025-04-21 01:58:57', 7641.00, 'stripe', 'book'),
(36, 36, NULL, NULL, '2025-04-22 14:04:14', 3249.00, 'stripe', 'book');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `payee_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `transaction_type` enum('book','delivery','refund') NOT NULL,
  `gross_amount` decimal(10,2) NOT NULL,
  `system_fee` decimal(10,2) NOT NULL,
  `net_amount` decimal(10,2) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `payment_date` datetime DEFAULT current_timestamp(),
  `settlement_status` enum('pending','paid') DEFAULT 'pending',
  `settlement_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `payee_id`, `order_id`, `payment_id`, `transaction_type`, `gross_amount`, `system_fee`, `net_amount`, `bank`, `branch_name`, `account_number`, `account_name`, `payment_date`, `settlement_status`, `settlement_date`) VALUES
(6, 50, 20, 18, 'delivery', 250.00, 25.00, 225.00, 'boc', 'Maharagama', '20031202565652', 'earnings', '2025-04-13 22:37:43', 'paid', '2025-04-20 21:37:14'),
(7, 29, 20, 18, 'book', 4749.05, 474.91, 4274.15, 'boc', 'Maharagama', '856979665624', 'Duleepa Edirisinghe', '2025-04-13 22:37:43', 'paid', '2025-04-20 21:36:50'),
(8, 50, 35, 35, 'delivery', 250.00, 25.00, 225.00, 'boc', 'Maharagama', '20031202565652', 'earnings', '2025-04-21 01:58:57', 'pending', NULL),
(12, 20, 35, 35, 'refund', 7391.00, 739.10, 6651.90, 'BOC', 'mahargama', '823232646464', 'Duleepa', '2025-04-21 01:58:57', 'pending', NULL),
(13, 50, 36, 36, 'delivery', 250.00, 25.00, 225.00, 'boc', 'Maharagama', '20031202565652', 'earnings', '2025-04-22 14:04:14', 'pending', NULL),
(14, 29, 36, 36, 'book', 2999.00, 299.90, 2699.10, 'boc', 'Maharagama', '856979665624', 'Duleepa Edirisinghe', '2025-04-22 14:04:14', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `refund_requests`
--

CREATE TABLE `refund_requests` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `reason` text NOT NULL,
  `evidence` varchar(255) DEFAULT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `comment` varchar(250) DEFAULT NULL,
  `reply` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `seller_rating` int(11) DEFAULT NULL CHECK (`seller_rating` >= 1 and `seller_rating` <= 3),
  `review_date` datetime DEFAULT current_timestamp(),
  `is_read` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `buyer_id`, `book_id`, `order_id`, `seller_id`, `rating`, `comment`, `reply`, `likes`, `seller_rating`, `review_date`, `is_read`) VALUES
(3, 20, 9, 3, 29, 2, 'BEST ROMANCE NOVEL FOR A REASON', 'thank you', 1, 1, '2025-04-11 21:19:15', 1),
(5, 20, 12, 4, 29, 3, 'good', 'thank you for your response', 2, 2, '2025-04-12 02:07:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review_like`
--

CREATE TABLE `review_like` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_like`
--

INSERT INTO `review_like` (`id`, `user_id`, `review_id`) VALUES
(16, 20, 3),
(20, 20, 5),
(19, 29, 5);

-- --------------------------------------------------------

--
-- Table structure for table `store_add`
--

CREATE TABLE `store_add` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `posted_date` datetime DEFAULT current_timestamp(),
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `payment_amount` decimal(10,0) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_add`
--

INSERT INTO `store_add` (`id`, `store_id`, `image_path`, `title`, `status`, `posted_date`, `start_date`, `end_date`, `payment_amount`, `active_status`) VALUES
(4, 29, 'adv_67fea190e7a275.40495592.png', 'Buy now!', 'approved', '2025-04-15 23:42:32', '2025-04-15', '2025-04-25', 680, 1),
(5, 29, 'adv_67fec08c979670.76818881.png', 'Ramadan Offer', 'approved', '2025-04-16 01:54:44', '2025-04-17', '2025-04-30', 700, 1),
(6, 29, 'adv_680011528a5791.61981660.png', 'Summer Sale', 'approved', '2025-04-17 01:51:38', '2025-05-01', '2025-05-31', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('buyer','bookSeller','bookStore','courier','admin') NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  `active_status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `email`, `password`, `role`, `createdAt`, `active_status`) VALUES
(1, 'admin@123', 'admin@example.com', '$2y$10$wkhSuf1MAeRH3OR8M1X7fORLtFoTcDpJm8h4Rr6HZYVZlbVty2W/e', 'admin', '2024-09-15', 'active'),
(20, 'duleepa.a', 'duleepa24@gmail.com', '$2y$10$T9af//jPRIUWRNxVbdXfr.Ofc3ixgiF.CkWfcEwZseYdVLATXj3fa', 'buyer', '2024-09-15', 'active'),
(21, 'duleepaaa', 'duleepa25@gmail.com', '$2y$10$2DRX6X2whIx3DnwOOseNKOrZR867wqcgiDLnuB.lUwf9NnFn3G4Ka', 'buyer', '2024-09-15', 'active'),
(22, 'duleepa45asd', 'duleepa94@gmail.com', '$2y$10$Sd3aBRRg68lkxLPhyD3H1uM7w34xkKTHYkBknzjQjbCfIeeGxDwPO', 'courier', '2024-09-16', 'active'),
(26, 'nimantha.a', 'nimantham.lk@gmail.com', '$2y$10$t2Y2AhLB.7bdt9P.fFLYOe0duY47uSzbA.ZtslW6BBxsynFenbJW6', 'bookSeller', '2024-09-16', 'active'),
(27, 'duleepa09', 'duleepa200@gmail.com', '$2y$10$yuWjYElG34aQNuo6JnKEO.FI1eSa4rzLkoXeFMhTbMX/YQakgCnOG', 'buyer', '2024-09-16', 'inactive'),
(29, 'sarasavi', 'sarasavi@gmail.com', '$2y$10$0Z6JJ43TSP3GKCk.6LItyuPgrLtZUuO.hLd6waIvC4sajR0uFP0lW', 'bookStore', '2024-09-16', 'active'),
(38, 'duleepa20', 'duleepa30@gmail.com', '$2y$10$UjSchGRv7rsmtfXZU76O/uMAW1wNLrd4ghKchlrdxcf9QWRRxAR46', 'buyer', '2024-09-17', 'active'),
(39, 'sipsari', 'kithminilee@gmail.com', '$2y$10$LUkAMqPJo4CVONdC2HaMp.A.es9w9sj0FJFPAkihMBxkVMd92/ylW', 'bookStore', '2024-09-17', 'active'),
(41, 'sss', 'silvasasmitha53333@gmail.com', '$2y$10$hSUrWr/kBKYeplCz.wv2uehuVwWdElIXx/ijpbizkyOqIVCQho9NK', 'buyer', '2024-11-29', 'active'),
(42, 'sarasaviy', 'duleepa240@gmail.com', '$2y$10$OT.t8I3TNe8QSxhT2pZ75.xkjC01vSHsQG1uXYpF6ZeqH0G76fysi', 'buyer', '2024-11-29', 'active'),
(43, 'sasmitha', 'duleepa250@gmail.com', '$2y$10$91qIzJUoHuSELeH0r0HAs.QcQZXcrdVJVUaE6y7jZFzYuLwtdDBNG', 'bookStore', '2024-11-29', 'inactive'),
(44, 'duleepa', 'duleepa2001@gmail.com', '$2y$10$iOeG.MLsm9OGJnQG3pB9x.Ndc9jnUQ.prh4FHULjtvvdsLBHp0XNO', 'courier', '2024-11-29', 'active'),
(45, 'Rehan58', 'rehan@gmail.com', '$2y$10$h33p9JXA3IPXMecih98/cOQ/GRB.junzDw7dkJvvl5Ss.l2hHTxni', 'bookSeller', '2024-11-29', 'active'),
(46, 'dasun22', 'dasun22@gmail.com', '$2y$10$bgxmOOKUlq8INBDLvUm1V.I0X9y2jcyywHhgzzPFyw4J6v6odcg9W', 'courier', '2024-11-29', 'active'),
(47, 'sipsarii', 'duleepa20@gmail.com', '$2y$10$gaiVYre5FFUHJQCmrpZMg.iaE06uK6bHECaPwFji/lFSvXFdb1Fgi', 'bookStore', '2024-11-29', 'inactive'),
(48, 'rasheen.m', 'rasheen20@gmail.com', '$2y$10$m69tQ9TNbv.qB/FvJAnV5OO30LhmSrpyWXzFx4QTkR0ej5JOvluD2', 'buyer', '2025-04-13', 'active'),
(49, 'makeen', 'makeen20@gmail.com', '$2y$10$DnfDXsSkaOXFdyhDSwiDIeI.H7j0hqRFFkZnTCoEkyNhDEG0RN1oO', 'bookStore', '2025-04-18', 'active'),
(50, 'nimsara.wick', 'nimsara.wick@gmail.com', '$2y$10$rFNstWMitLt4qVnWB5t4NeKKeT8uF9uYW1oz6VIhCE53WmyySR3O6', 'courier', '2025-04-18', 'active'),
(52, 'nimantha.madushan', 'nimantha.m@gmail.com', '$2y$10$LfxuSYOMgRrrp9ubXr.9yuRr3pYZy1DqI9D.91jxlZ1pGnVKfPXbe', 'courier', '2025-04-18', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_add`
--
ALTER TABLE `admin_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `winner_user_id` (`winner_user_id`),
  ADD KEY `current_bidder_id` (`current_bidder_id`),
  ADD KEY `auction_ibfk_1` (`book_id`),
  ADD KEY `auction_ibfk_2` (`seller_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `bookseller`
--
ALTER TABLE `bookseller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bookstore`
--
ALTER TABLE `bookstore`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nic_number` (`nic_number`),
  ADD UNIQUE KEY `license_number` (`license_number`),
  ADD UNIQUE KEY `vehicle_registration_number` (`vehicle_registration_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `couriercomplains`
--
ALTER TABLE `couriercomplains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courierorder`
--
ALTER TABLE `courierorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `bookstore_id` (`bookstore_id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `listings_ibfk_2` (`seller_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `fk_courier` (`courier_id`),
  ADD KEY `fk_seller` (`seller_id`),
  ADD KEY `fk_buyer_user` (`buyer_id`);

--
-- Indexes for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `fk_orders_ad_id` (`ad_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payee_id` (`payee_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `refund_requests`
--
ALTER TABLE `refund_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `fk_review_order` (`order_id`),
  ADD KEY `fk_review_seller` (`seller_id`);

--
-- Indexes for table `review_like`
--
ALTER TABLE `review_like`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_like` (`user_id`,`review_id`),
  ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `store_add`
--
ALTER TABLE `store_add`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_add`
--
ALTER TABLE `admin_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bookseller`
--
ALTER TABLE `bookseller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookstore`
--
ALTER TABLE `bookstore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `couriercomplains`
--
ALTER TABLE `couriercomplains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courierorder`
--
ALTER TABLE `courierorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payment_info`
--
ALTER TABLE `payment_info`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `refund_requests`
--
ALTER TABLE `refund_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review_like`
--
ALTER TABLE `review_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `store_add`
--
ALTER TABLE `store_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `user` (`ID`) ON DELETE SET NULL;

--
-- Constraints for table `bookseller`
--
ALTER TABLE `bookseller`
  ADD CONSTRAINT `bookseller_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `bookstore`
--
ALTER TABLE `bookstore`
  ADD CONSTRAINT `bookstore_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `courier`
--
ALTER TABLE `courier`
  ADD CONSTRAINT `courier_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`bookstore_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_buyer_user` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `fk_courier` FOREIGN KEY (`courier_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `fk_seller` FOREIGN KEY (`seller_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);

--
-- Constraints for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD CONSTRAINT `fk_orders_ad_id` FOREIGN KEY (`ad_id`) REFERENCES `store_add` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_info_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`payee_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `payroll_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `payroll_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `payment_info` (`payment_id`);

--
-- Constraints for table `refund_requests`
--
ALTER TABLE `refund_requests`
  ADD CONSTRAINT `refund_requests_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `refund_requests_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_review_seller` FOREIGN KEY (`seller_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review_like`
--
ALTER TABLE `review_like`
  ADD CONSTRAINT `review_like_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_like_ibfk_2` FOREIGN KEY (`review_id`) REFERENCES `review` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `store_add`
--
ALTER TABLE `store_add`
  ADD CONSTRAINT `store_add_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
