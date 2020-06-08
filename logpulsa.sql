-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2016 at 11:49 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logpulsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_harga`
--

CREATE TABLE IF NOT EXISTS `m_harga` (
  `id_harga` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `waktu_input` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_harga`
--

INSERT INTO `m_harga` (`id_harga`, `harga`, `waktu_input`) VALUES
(7, '11000', '2016-04-01 09:40:28'),
(8, '12000', '2016-04-01 09:40:33'),
(9, '27000', '2016-04-01 09:40:38'),
(10, '51000', '2016-04-01 09:40:42'),
(11, '52000', '2016-04-03 06:33:21'),
(12, '100000', '2016-04-03 21:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `m_menu`
--

CREATE TABLE IF NOT EXISTS `m_menu` (
  `id_menu` int(11) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `aktif` varchar(1) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_menu`
--

INSERT INTO `m_menu` (`id_menu`, `controller`, `menu`, `icon`, `aktif`, `urutan`) VALUES
(1, 'beranda', 'Beranda', 'home', '1', 1),
(2, 'transaksi', 'Transaksi', 'transfer', '1', 2),
(3, 'master', 'Data Master', 'hdd', '1', 3),
(4, 'laporan', 'Laporan', 'book', '0', 4);

-- --------------------------------------------------------

--
-- Table structure for table `m_nominal`
--

CREATE TABLE IF NOT EXISTS `m_nominal` (
  `id_nominal` int(11) NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `waktu_input` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_nominal`
--

INSERT INTO `m_nominal` (`id_nominal`, `nominal`, `waktu_input`) VALUES
(4, '100', '2016-04-01 08:09:30'),
(5, '50', '2016-04-01 08:09:36'),
(6, '10', '2016-04-01 09:41:20'),
(7, '25', '2016-04-01 09:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `m_submenu`
--

CREATE TABLE IF NOT EXISTS `m_submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `function` varchar(255) NOT NULL,
  `submenu` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `aktif` varchar(1) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_submenu`
--

INSERT INTO `m_submenu` (`id_submenu`, `id_menu`, `function`, `submenu`, `icon`, `aktif`, `urutan`) VALUES
(1, 2, 'semua', 'Semua', 'chevron-right', '1', 4),
(2, 2, 'utang', 'Utang', 'chevron-right', '1', 3),
(3, 2, 'lunas', 'Lunas', 'chevron-right', '1', 2),
(4, 3, 'harga', 'Harga', 'chevron-right', '1', 1),
(5, 3, 'nominal', 'Nominal', 'chevron-right', '1', 2),
(6, 4, 'harian', 'Harian', 'chevron-right', '1', 1),
(7, 4, 'bulanan', 'Bulanan', 'chevron-right', '1', 2),
(8, 4, 'tahunan', 'Tahunan', 'chevron-right', '1', 3),
(9, 2, 'input', 'Input', 'chevron-right', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE IF NOT EXISTS `m_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id_user`, `username`, `password`, `nama`) VALUES
(2, 'admin', 'kPDi9GDSrK4eNuPrmAFa6Omh0N3VidUqJzjORKRKwObT8UrMP4GzGMHxR7FH1UhpkDyYmdE9WAXf9VxP7AhGDw==', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE IF NOT EXISTS `t_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `id_nominal` int(11) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `waktu_lunas` datetime NOT NULL,
  `waktu_transaksi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `no_hp`, `id_nominal`, `id_harga`, `status`, `waktu_lunas`, `waktu_transaksi`) VALUES
(19, '08567158200', 4, 12, 'LUNAS', '2016-04-23 07:31:17', '2016-04-23 07:31:17'),
(20, '08567158200', 5, 11, 'UTANG', '0000-00-00 00:00:00', '2016-04-23 07:31:29'),
(21, '08567158200', 7, 9, 'LUNAS', '2016-04-23 07:31:51', '2016-04-23 07:31:51'),
(22, '08567158200', 5, 10, 'UTANG', '0000-00-00 00:00:00', '2016-04-02 07:32:09'),
(23, '08567158200', 6, 8, 'LUNAS', '2016-04-23 07:32:24', '2016-04-23 07:32:24'),
(24, '08567158200', 6, 8, 'UTANG', '0000-00-00 00:00:00', '2016-04-23 07:32:53'),
(25, '08567158200', 5, 11, 'UTANG', '0000-00-00 00:00:00', '2016-04-23 07:33:12');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jumlah_all`
--
CREATE TABLE IF NOT EXISTS `v_jumlah_all` (
`total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jumlah_all_lunas`
--
CREATE TABLE IF NOT EXISTS `v_jumlah_all_lunas` (
`total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jumlah_all_utang`
--
CREATE TABLE IF NOT EXISTS `v_jumlah_all_utang` (
`total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jumlah_today`
--
CREATE TABLE IF NOT EXISTS `v_jumlah_today` (
`total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jumlah_today_lunas`
--
CREATE TABLE IF NOT EXISTS `v_jumlah_today_lunas` (
`total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jumlah_today_utang`
--
CREATE TABLE IF NOT EXISTS `v_jumlah_today_utang` (
`total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi_all`
--
CREATE TABLE IF NOT EXISTS `v_transaksi_all` (
`id_transaksi` int(11)
,`no_hp` varchar(255)
,`id_nominal` int(11)
,`id_harga` int(11)
,`status` varchar(255)
,`waktu_lunas` datetime
,`waktu_transaksi` datetime
,`nominal` varchar(255)
,`harga` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi_lunas`
--
CREATE TABLE IF NOT EXISTS `v_transaksi_lunas` (
`id_transaksi` int(11)
,`no_hp` varchar(255)
,`id_nominal` int(11)
,`id_harga` int(11)
,`status` varchar(255)
,`waktu_lunas` datetime
,`waktu_transaksi` datetime
,`nominal` varchar(255)
,`harga` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi_today`
--
CREATE TABLE IF NOT EXISTS `v_transaksi_today` (
`id_transaksi` int(11)
,`no_hp` varchar(255)
,`id_nominal` int(11)
,`id_harga` int(11)
,`status` varchar(255)
,`waktu_lunas` datetime
,`waktu_transaksi` datetime
,`nominal` varchar(255)
,`harga` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi_utang`
--
CREATE TABLE IF NOT EXISTS `v_transaksi_utang` (
`id_transaksi` int(11)
,`no_hp` varchar(255)
,`id_nominal` int(11)
,`id_harga` int(11)
,`status` varchar(255)
,`waktu_lunas` datetime
,`waktu_transaksi` datetime
,`nominal` varchar(255)
,`harga` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_jumlah_all`
--
DROP TABLE IF EXISTS `v_jumlah_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jumlah_all` AS select sum(`v_transaksi_all`.`harga`) AS `total` from `v_transaksi_all`;

-- --------------------------------------------------------

--
-- Structure for view `v_jumlah_all_lunas`
--
DROP TABLE IF EXISTS `v_jumlah_all_lunas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jumlah_all_lunas` AS select sum(`v_transaksi_all`.`harga`) AS `total` from `v_transaksi_all` where (`v_transaksi_all`.`status` = 'LUNAS');

-- --------------------------------------------------------

--
-- Structure for view `v_jumlah_all_utang`
--
DROP TABLE IF EXISTS `v_jumlah_all_utang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jumlah_all_utang` AS select sum(`v_transaksi_all`.`harga`) AS `total` from `v_transaksi_all` where (`v_transaksi_all`.`status` = 'UTANG');

-- --------------------------------------------------------

--
-- Structure for view `v_jumlah_today`
--
DROP TABLE IF EXISTS `v_jumlah_today`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jumlah_today` AS select sum(`v_transaksi_today`.`harga`) AS `total` from `v_transaksi_today` where (left(`v_transaksi_today`.`waktu_transaksi`,10) = curdate());

-- --------------------------------------------------------

--
-- Structure for view `v_jumlah_today_lunas`
--
DROP TABLE IF EXISTS `v_jumlah_today_lunas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jumlah_today_lunas` AS select sum(`v_transaksi_today`.`harga`) AS `total` from `v_transaksi_today` where ((left(`v_transaksi_today`.`waktu_transaksi`,10) = curdate()) and (`v_transaksi_today`.`status` = 'LUNAS'));

-- --------------------------------------------------------

--
-- Structure for view `v_jumlah_today_utang`
--
DROP TABLE IF EXISTS `v_jumlah_today_utang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jumlah_today_utang` AS select sum(`v_transaksi_today`.`harga`) AS `total` from `v_transaksi_today` where ((left(`v_transaksi_today`.`waktu_transaksi`,10) = curdate()) and (`v_transaksi_today`.`status` = 'UTANG'));

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi_all`
--
DROP TABLE IF EXISTS `v_transaksi_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi_all` AS select `a`.`id_transaksi` AS `id_transaksi`,`a`.`no_hp` AS `no_hp`,`a`.`id_nominal` AS `id_nominal`,`a`.`id_harga` AS `id_harga`,`a`.`status` AS `status`,`a`.`waktu_lunas` AS `waktu_lunas`,`a`.`waktu_transaksi` AS `waktu_transaksi`,`b`.`nominal` AS `nominal`,`c`.`harga` AS `harga` from ((`t_transaksi` `a` join `m_nominal` `b`) join `m_harga` `c`) where ((`a`.`id_nominal` = `b`.`id_nominal`) and (`a`.`id_harga` = `c`.`id_harga`));

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi_lunas`
--
DROP TABLE IF EXISTS `v_transaksi_lunas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi_lunas` AS select `a`.`id_transaksi` AS `id_transaksi`,`a`.`no_hp` AS `no_hp`,`a`.`id_nominal` AS `id_nominal`,`a`.`id_harga` AS `id_harga`,`a`.`status` AS `status`,`a`.`waktu_lunas` AS `waktu_lunas`,`a`.`waktu_transaksi` AS `waktu_transaksi`,`b`.`nominal` AS `nominal`,`c`.`harga` AS `harga` from ((`t_transaksi` `a` join `m_nominal` `b`) join `m_harga` `c`) where ((`a`.`id_nominal` = `b`.`id_nominal`) and (`a`.`id_harga` = `c`.`id_harga`) and (`a`.`status` = 'LUNAS'));

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi_today`
--
DROP TABLE IF EXISTS `v_transaksi_today`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi_today` AS select `a`.`id_transaksi` AS `id_transaksi`,`a`.`no_hp` AS `no_hp`,`a`.`id_nominal` AS `id_nominal`,`a`.`id_harga` AS `id_harga`,`a`.`status` AS `status`,`a`.`waktu_lunas` AS `waktu_lunas`,`a`.`waktu_transaksi` AS `waktu_transaksi`,`b`.`nominal` AS `nominal`,`c`.`harga` AS `harga` from ((`t_transaksi` `a` join `m_nominal` `b`) join `m_harga` `c`) where ((`a`.`id_nominal` = `b`.`id_nominal`) and (`a`.`id_harga` = `c`.`id_harga`) and (left(`a`.`waktu_transaksi`,10) = curdate()));

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi_utang`
--
DROP TABLE IF EXISTS `v_transaksi_utang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi_utang` AS select `a`.`id_transaksi` AS `id_transaksi`,`a`.`no_hp` AS `no_hp`,`a`.`id_nominal` AS `id_nominal`,`a`.`id_harga` AS `id_harga`,`a`.`status` AS `status`,`a`.`waktu_lunas` AS `waktu_lunas`,`a`.`waktu_transaksi` AS `waktu_transaksi`,`b`.`nominal` AS `nominal`,`c`.`harga` AS `harga` from ((`t_transaksi` `a` join `m_nominal` `b`) join `m_harga` `c`) where ((`a`.`id_nominal` = `b`.`id_nominal`) and (`a`.`id_harga` = `c`.`id_harga`) and (`a`.`status` = 'UTANG'));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_harga`
--
ALTER TABLE `m_harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `m_menu`
--
ALTER TABLE `m_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `m_nominal`
--
ALTER TABLE `m_nominal`
  ADD PRIMARY KEY (`id_nominal`);

--
-- Indexes for table `m_submenu`
--
ALTER TABLE `m_submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_harga`
--
ALTER TABLE `m_harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `m_menu`
--
ALTER TABLE `m_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_nominal`
--
ALTER TABLE `m_nominal`
  MODIFY `id_nominal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `m_submenu`
--
ALTER TABLE `m_submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
