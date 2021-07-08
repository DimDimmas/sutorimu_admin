-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2021 pada 04.56
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sutorimu`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addList` (IN `partitle_list` VARCHAR(100), IN `parrate` VARCHAR(10), IN `parstatu` VARCHAR(100), IN `parcover_image` VARCHAR(100), IN `partype` VARCHAR(50), IN `partotal_episode` VARCHAR(10), IN `paraired` VARCHAR(50), IN `parduration` VARCHAR(50), IN `parsynopsis` TEXT, IN `pargenre` VARCHAR(255))  BEGIN 
	INSERT into tb_list (title_list, rate, statu, cover_image, type, total_episode, 	aired, duration, synopsis, genre) VALUES (partitle_list, parrate, parstatu, 		parcover_image, partype, partotal_episode, paraired, parduration, parsynopsis, 		pargenre);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletelist` (IN `parid_list` INT)  BEGIN
	DELETE FROM tb_list WHERE id_list = parid_list;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editlist` (IN `parid_list` INT, IN `partitle_list` VARCHAR(100), IN `parrate` VARCHAR(10), IN `parstatu` VARCHAR(100), IN `parcover_image` VARCHAR(100), IN `partype` VARCHAR(50), IN `partotal_episode` VARCHAR(10), IN `paraired` VARCHAR(50), IN `parduration` VARCHAR(50), IN `parsynopsis` TEXT, IN `pargenre` VARCHAR(255))  BEGIN
	UPDATE tb_list set
    title_list = partitle_list,
    rate = parrate,
    statu = parstatu,
    cover_image = parcover_image,
    type = partype,
    total_episode = partotal_episode,
    aired = paraired,
    duration = parduration,
    synopsis = parsynopsis,
    genre = pargenre
    
    WHERE id_list = parid_list;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list` ()  SELECT * FROM tb_list$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_list` ()  SELECT * FROM tb_list$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_genre`
--

CREATE TABLE `tb_genre` (
  `id_genre` int(10) NOT NULL,
  `title_genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_genre`
--

INSERT INTO `tb_genre` (`id_genre`, `title_genre`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Cars'),
(4, 'Comedy'),
(5, 'Dementia'),
(6, 'Demons'),
(7, 'Drama'),
(8, 'Ecchi'),
(9, 'Fantasy'),
(10, 'Game'),
(11, 'Harem'),
(12, 'Historical'),
(13, 'Horror'),
(14, 'Josei'),
(15, 'Kids'),
(16, 'Live Action'),
(17, 'Magic'),
(18, 'Martial Arts'),
(19, 'Mecha'),
(20, 'Military'),
(21, 'Music'),
(22, 'Mistery'),
(23, 'Parody'),
(24, 'Police'),
(25, 'Psychological'),
(26, 'Romance'),
(27, 'Samurai'),
(28, 'School'),
(29, 'Sci-Fi'),
(30, 'Seinen'),
(31, 'Shoujo'),
(32, 'Shoujo Ai'),
(33, 'Shounen'),
(34, 'Shounen Ai'),
(35, 'Slice of Life'),
(36, 'Space'),
(37, 'Sports'),
(38, 'Super Power'),
(39, 'Supernatural'),
(56, 'tes tambah genre edit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_list`
--

CREATE TABLE `tb_list` (
  `id_list` int(10) NOT NULL,
  `title_list` varchar(100) NOT NULL,
  `rate` varchar(10) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `cover_image` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `total_episode` varchar(10) DEFAULT NULL,
  `aired` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `synopsis` text NOT NULL,
  `genre` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_list`
--

INSERT INTO `tb_list` (`id_list`, `title_list`, `rate`, `status`, `cover_image`, `type`, `total_episode`, `aired`, `duration`, `synopsis`, `genre`, `trailer`) VALUES
(25, 'Shingeki no Kyojin: The Final Season ', '9.16', 'On-going', 'cvr-1611417346.jpg', 'TV', '16', 'Dec 7, 2020 to ? ', '23', 'Gabi Braun and Falco Grice have been training their entire lives to inherit one of the seven titans under Marley\'s control and aid their nation in eradicating the Eldians on Paradis. However, just as all seems well for the two cadets, their peace is suddenly shaken by the arrival of Eren Yeager and the remaining members of the Survey Corps.\r\n<br> <br>\r\nHaving finally reached the Yeager family basement and learned about the dark history surrounding the titans, the Survey Corps has at long last found the answer they so desperately fought to uncover. With the truth now in their hands, the group set out for the world beyond the walls.\r\n<br> <br>\r\nIn Shingeki no Kyojin: The Final Season, two utterly different worlds collide as each party pursues its own agenda in the long-awaited conclusion to Paradis\' fight for freedom.', 'Action, Drama, Fantasy, Military, Mistery, Super Power', 'SlNpRThS9t8'),
(28, '5-toubun no Hanayome ∬', '8.02', 'On-going', 'cvr-1611457443.jpg', 'TV', '12', 'Jan 8, 2021 to ? ', 'Unknown', 'Second season of 5-toubun no Hanayome. ', 'Comedy, Harem, Romance, School edit, Shounen', 'pCwfEB6PbFk'),
(35, 'The Tutorial of the Advance Player', '9.0', 'On-going', 'cvr-1611487418.jpg', 'TV', '13', '13 januari', '24 min. per episode', 'aaaaaaa', 'Action, Adventure, Fantasy', ''),
(36, 'Dr. Stone: Stone Wars', '8.35', 'On-going', 'cvr-1611487580.jpg', 'TV', '11', 'Jan 14, 2021 to ?', 'Unknown', 'Second season of Dr. Stone', 'Adventure, Sci-Fi, Shounen', ''),
(37, 'Horimiya', '8.59', 'On-going', 'cvr-1611487784.jpg', 'TV', '13', 'Jan 10, 2021 to ?', '23 min. per ep.', 'Although admired at school for her amiability and academic prowess, high school student Kyouko Hori has been hiding another side of her. With her parents often away from home due to work, Hori has to look after her younger brother and do the housework, leaving no chance to socialize away from school.\r\n\r\nMeanwhile, Izumi Miyamura is seen as a brooding, glasses-wearing otaku. However, in reality, he is a gentle person inept at studying. Furthermore, he has nine piercings hidden behind his long hair and a tattoo along his back and left shoulder.\r\n\r\nBy sheer chance, Hori and Miyamura cross paths outside of school—neither looking as the other expects. These seemingly polar opposites become friends, sharing with each other a side they have never shown to anyone else.', 'Comedy, Romance, School, Shounen, Slice of Life', ''),
(38, 'Hataraku Saibou!!', '7.70', 'On-going', 'cvr-1611488002.jpg', 'TV', '8', 'Jan 9, 2021 to ?', 'Unknown', 'Second season of Hataraku Saibou.', 'Comedy, Shounen', ''),
(39, 'Yakusoku no Neverland 2nd Season', '8.33', 'On-going', 'cvr-1611489259.jpg', 'TV', '11', 'Jan 8, 2021 to ?', 'Unknown', 'Second season of Yakusoku no Neverland.', 'Mistery, Sci-Fi, Shounen, Thriller', 'esTm0x10HW4'),
(40, 'Princess Principal: Crown Handler 1', 'N/A', 'Finished', 'cvr-1611539631.jpg', 'Movie', '1', 'Feb 11, 2021', 'Unknown', 'The film is set in London at the end of the 19th century and after the attempted assassination of the Imperial princess in the television anime. The Empire is increasing counter-spy actions in the wake of the incident, and finds Control, the Commonwealth group in charge of covert operations against the Empire, at unease and suspecting its spy within the royal family as a double agent. Control assigns their spy ring Dove with a new mission to extract a secondhand bookstore owner and deliver him to Commonwealth hands. Ange, Dorothy, and Chise successfully spring the bookstore owner from an Imperial prison. Control also assigns Dove to make contact with Bishop, their spy within the royal family, to ascertain their loyalties.', 'Action, Historical, Mistery', 're0okA0NAEc'),
(41, 'Re:Zero kara Hajimeru Isekai Seikatsu 2nd Season Part 2', '8.72', 'On-going', 'cvr-1611652400.jpg', 'TV', ' 12', 'Jan 6, 2021 to ? ', 'Unknown', 'Second half of Re:Zero kara Hajimeru Isekai Seikatsu 2nd Season.', 'Harem, Military, Parody', 'TOVXrQ6R8KE'),
(48, 'Gintama: The Final', '8.98', 'Finished', 'cvr-1611674993.jpg', 'Movie', '1', 'Jan 8, 2021 ', ' Unknown', 'New Gintama movie.', 'Action, Comedy, Drama, Historical, Parody, Samurai, Sci-Fi, Shounen', 'H61PB6vMbos'),
(49, 'Seitokai Yakuindomo Movie 2', 'N/A', 'Finished', 'cvr-1611675122.jpg', 'Movie', '1', 'Jan 1, 2021 ', 'Unknown', 'No synopsis information has been added to this title.', 'Comedy, School, Shounen, Slice of Life', ''),
(50, 'Natsume Yuujinchou: Ishi Okoshi to Ayashiki Raihousha', 'N/A', 'Finished', 'cvr-1611679908.jpg', 'Movie', '2', ' Jan 16, 2021 ', ' Unknown', 'The film will be made up of two stories: \"Ishi Okoshi\" and \"Ayashiki Raihousha.\" In \"Ishi Okoshi,\" Natsume meets a small youkai called Mitsumi in a forest. Mitsumi is entrusted to wake up the divine youkai \"Iwatetsu\" from its deep slumber. Mitsumi weighs on Natsume\'s mind, so he sets out to help Mitsumi with his task.\r\n\r\nIn \"Ayashiki Raihousha,\" a mysterious visitor appears in front of Tanuma. Nearly every day, the visitor visits Tanuma, talks to him a little, and then leaves. Natsume, who knows the visitor is a youkai, worries for Tanuma, but Tanuma enjoys these exchanges with the youkai. The youkai means no harm, but Tanuma\'s health slowly starts to deteriorate.', 'Demons, Drama, Shoujo, Slice of Life, Supernatural', ''),
(51, 'Bishoujo Senshi Sailor Moon Eternal Movie 1', 'N/A', 'Finished', 'cvr-1611680027.jpg', 'Movie', '1', ' Jan 8, 2021 ', 'Unknown', 'Bishoujo Senshi Sailor Moon Eternal serves as the fourth installment in Toei Animation\'s reboot of Naoko Takeuchi\'s original magical girl manga. The sequel was announced in January 2017 as a part of the franchise\'s 25th anniversary and later confirmed to be a two-part anime film covering the Dream arc.\r\n', 'Demons, Magic, Romance, Shoujo', ''),
(52, 'Girls & Panzer: Saishuushou Part 3', 'N/A', 'Finished', 'cvr-1611680106.jpg', 'Movie', '1', 'Mar 26, 2021 ', 'Unknown', 'The third film in the six-part Girls & Panzer: Saishuushou film series.', 'Military, School', ''),
(62, 'Bishoujo Senshi Sailor Moon Eternal Movie 2', 'N/A', 'Finished', 'cvr-1611709671.jpg', 'TV', '1', 'Dec 7, 2020 to ?', 'Unknown', 'No synopsis', 'Demons, Romance', ''),
(75, 'Mushoku Tensei: Isekai Ittara Honki Dasu', '8.35', 'On-going', 'cvr-1611746595.jpg', 'TV', '11', 'Jan 11, 2021 to ? ', 'Unknown ', 'Killed while saving a stranger from a traffic collision, a 34-year-old NEET is reincarnated into a world of magic as Rudeus Greyrat, a newborn baby. With knowledge, experience, and regrets from his previous life retained, Rudeus vows to lead a fulfilling life and not repeat his past mistakes.\r\n<br><br>\r\nNow gifted with a tremendous amount of magical power as well as the mind of a grown adult, Rudeus is seen as a genius in the making by his new parents. Soon, he finds himself studying under powerful warriors, such as his swordsman father and a mage named Roxy Migurdia—all in order to hone his apparent talents. But despite his innocent exterior, Rudeus is still a perverted otaku, who uses his wealth of knowledge to make moves on women whom he could never make in his previous life.', 'Drama, Fantasy, Magic', 'Qx01pn9l-6g'),
(80, 'tes edit', '3.00', 'Finished', 'cvr-1611806627.jpg', 'TV', '156', 'Dec 7, 2020 to 2020', 'Unknown edit', 'tes tambah edit', 'Drama, Ecchi, Fantasy, Game, Harem', 'tes edit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_update`
--

CREATE TABLE `tb_update` (
  `no` int(10) NOT NULL,
  `episode` varchar(100) NOT NULL,
  `title_list` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `embed_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_update`
--

INSERT INTO `tb_update` (`no`, `episode`, `title_list`, `preview`, `embed_link`) VALUES
(52, '1', 'Mushoku Tensei: Isekai Ittara Honki Dasu', 'prv-1611746764.jpg', 'tes');

--
-- Trigger `tb_update`
--
DELIMITER $$
CREATE TRIGGER `before_list_update` BEFORE UPDATE ON `tb_update` FOR EACH ROW INSERT INTO tb_list
SET title_list = NEW.title_list
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_title_list` BEFORE UPDATE ON `tb_update` FOR EACH ROW INSERT INTO tb_list
SET title_list = OLD.title_list
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tes`
--

CREATE TABLE `tes` (
  `tes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_genre`
--
ALTER TABLE `tb_genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeks untuk tabel `tb_list`
--
ALTER TABLE `tb_list`
  ADD PRIMARY KEY (`id_list`),
  ADD KEY `title_list` (`title_list`);

--
-- Indeks untuk tabel `tb_update`
--
ALTER TABLE `tb_update`
  ADD PRIMARY KEY (`no`),
  ADD KEY `fk_titlelist` (`title_list`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_genre`
--
ALTER TABLE `tb_genre`
  MODIFY `id_genre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `tb_list`
--
ALTER TABLE `tb_list`
  MODIFY `id_list` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `tb_update`
--
ALTER TABLE `tb_update`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_update`
--
ALTER TABLE `tb_update`
  ADD CONSTRAINT `fk_titlelist` FOREIGN KEY (`title_list`) REFERENCES `tb_list` (`title_list`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
