-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2021 at 01:25 PM
-- Server version: 10.5.9-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id` char(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `diskon` int(3) NOT NULL,
  `semua_layanan` tinyint(1) NOT NULL,
  `berlangsung` tinyint(1) NOT NULL,
  `date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id`, `nama`, `diskon`, `semua_layanan`, `berlangsung`, `date_end`) VALUES
('60541a9e6702c5.05401790', 'diskon 1', 100, 1, 0, '2021-03-19 10:29:00'),
('60541ac618da29.30802262', 'diskon 2', 20, 1, 0, '2021-03-19 10:30:00'),
('60541d10051638.14138724', 'diskon 3', 10, 0, 0, '2021-03-19 10:39:00'),
('605422074695f0.51333093', 'diskon 6', 20, 1, 0, '2021-03-19 11:01:00'),
('6055ba6d39fcd0.92099779', 'diskon 10%', 10, 0, 0, '2021-03-22 00:00:00'),
('60573114643066.97093058', 'diskon 20%', 20, 1, 0, '2021-03-23 00:00:00'),
('60573e0b235668.34526989', 'paket 10', 10, 0, 0, '2021-03-23 19:37:00'),
('606cfe0adfc364.27705874', 'diskon 30%', 30, 0, 0, '2021-05-15 00:00:00'),
('609fc85051d2c1.38644960', 'diskon all service 20%', 20, 1, 1, '2021-05-22 00:00:00');

--
-- Triggers `diskon`
--
DELIMITER $$
CREATE TRIGGER `after_insert_diskon` AFTER INSERT ON `diskon` FOR EACH ROW IF NEW.semua_layanan = true
THEN
UPDATE paket SET id_diskon = NEW.id;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_diskon` AFTER UPDATE ON `diskon` FOR EACH ROW IF NEW.berlangsung = false 
THEN
UPDATE paket SET id_diskon = NULL WHERE id_diskon = OLD.id;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete_diskon` BEFORE DELETE ON `diskon` FOR EACH ROW UPDATE paket SET id_diskon = NULL WHERE id_diskon = OLD.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `lupa_password`
--

CREATE TABLE `lupa_password` (
  `id` varchar(25) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `tempat_tinggal_masa_kecil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lupa_password`
--

INSERT INTO `lupa_password` (`id`, `telp`, `nama_ayah`, `nama_ibu`, `tempat_tinggal_masa_kecil`) VALUES
('606cf9a497a849.76696132', '123', 'bapak', 'ibu', 'bantul'),
('606d01406907c7.55900454', '098098', 'ayah', 'ibu', 'bantul'),
('609fc9f31c9494.34740752', '234', 'bapak', 'ibu', 'bantul'),
('609fca3f373630.43306333', '0888', 'bapak', 'ibu', 'bantul');

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `id` char(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`id`, `nama`, `alamat`, `telp`) VALUES
('60573d69943b83.94134097', 'outlet 2', 'tokyo, japan', '00918281'),
('606d7bea9a15c2.96172541', 'outlet 4', 'bantul', '09182312'),
('qwertyuiopa', 'outlet 1', 'Jalan Ngentak, Gendeng, Bangunjiwo, Kec. Kasihan, Bantul, Daerah Istimewa Yogyakarta 55184', '0928');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` char(25) NOT NULL,
  `id_outlet` char(25) NOT NULL,
  `id_diskon` char(25) DEFAULT NULL,
  `layanan` enum('kilogram','bed cover','jeans','selimut','sepatu','delivery','fast wash') NOT NULL,
  `nama` varchar(100) NOT NULL,
  `service` text NOT NULL,
  `harga` int(11) NOT NULL,
  `final_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `id_outlet`, `id_diskon`, `layanan`, `nama`, `service`, `harga`, `final_harga`) VALUES
('60557e8a870da1.47823488', 'qwertyuiopa', '609fc85051d2c1.38644960', 'kilogram', 'paket cuci bersih', 'cuci, setrika, pewangi', 3000, 2400),
('605580808659e9.40907438', 'qwertyuiopa', '609fc85051d2c1.38644960', 'sepatu', 'paket cuci sepatu', 'cuci, semir, pewangi', 10000, 8000),
('6055b2369c8719.51863272', 'qwertyuiopa', '609fc85051d2c1.38644960', 'delivery', 'paket delivery mantap', 'antar, jemput', 12000, 9600);

--
-- Triggers `paket`
--
DELIMITER $$
CREATE TRIGGER `before_insert_paket` BEFORE INSERT ON `paket` FOR EACH ROW IF NEW.id_diskon IS NOT NULL 
THEN
SET NEW.final_harga = NEW.harga - (((SELECT diskon FROM diskon WHERE id = NEW.id_diskon) / 100) * NEW.harga);
ELSEIF NEW.id_diskon IS NULL
THEN 
SET NEW.final_harga = NEW.harga;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_update_paket` BEFORE UPDATE ON `paket` FOR EACH ROW IF NEW.id_diskon IS NOT NULL 
THEN
SET NEW.final_harga = NEW.harga - (((SELECT diskon FROM diskon WHERE id = NEW.id_diskon) / 100) * NEW.harga);
ELSEIF NEW.id_diskon IS NULL
THEN 
SET NEW.final_harga = NEW.harga;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` char(25) NOT NULL,
  `id_outlet` char(25) NOT NULL,
  `id_pelanggan` char(25) NOT NULL,
  `id_pegawai` char(25) NOT NULL,
  `id_paket` char(25) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `qty` double NOT NULL,
  `tgl_masuk` date NOT NULL,
  `batas_waktu` date NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  `diskon` int(3) NOT NULL,
  `pajak` int(11) NOT NULL,
  `status` enum('proses','selesai','diambil','masuk') NOT NULL,
  `dibayar` enum('lunas','belum dibayar') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_outlet`, `id_pelanggan`, `id_pegawai`, `id_paket`, `invoice`, `qty`, `tgl_masuk`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `dibayar`, `keterangan`) VALUES
('609fadd01328d2.90684008', 'qwertyuiopa', '609fadb4baf398.80988497', '6052c89c8f79d7.99670672', '60557e8a870da1.47823488', '123', 2, '2021-05-15', '2021-05-22', '2021-05-17', 0, 10, 0, 'diambil', 'lunas', ''),
('609fb21439d2c5.17697584', 'qwertyuiopa', '609fadb4baf398.80988497', '6052c89c8f79d7.99670672', '605580808659e9.40907438', '12', 1, '2021-05-15', '2021-05-22', NULL, 0, 0, 0, 'masuk', 'belum dibayar', '');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `before_insert_transaksi` BEFORE INSERT ON `transaksi` FOR EACH ROW SET NEW.id_pelanggan = (SELECT id FROM user WHERE user.telp = NEW.id_pelanggan)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` char(25) NOT NULL,
  `id_outlet` char(25) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `role` enum('admin','kasir','pelanggan') NOT NULL,
  `alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_outlet`, `nama`, `telp`, `password`, `role`, `alamat`) VALUES
('6052c89c8f79d7.99670672', 'qwertyuiopa', 'irvan hakim', '123', '$2y$12$JMRQz9swqN7lv1P5MwNUeOdlqTbUKIYV0CcDYYtHqok9kfGUPZPMe', 'admin', 'Shibuya, Japan.'),
('60558af9625b04.86699993', 'qwertyuiopa', 'nani', '01923', '$2y$12$G7Z6Zg.1RjJXQFJ5YL2lseZlREblKdphRHmm7MXSp9Rx6EftyoMkO', 'kasir', 'bangunjiwo'),
('606cfacfec2cf0.63270378', 'qwertyuiopa', 'bakunya123', '091237', '$2y$12$5TPpg7rCdT1BijzVplRC8eCaR1zivfeumk670QryAvgyxs3Hhq52e', 'admin', 'bantul'),
('606d01263efea3.65752737', 'qwertyuiopa', 'kasir', '098098', '$2y$12$NH.HnCBDf8pAs//c4B.G/u8zjENI2gEBjgl755JSx4zwaw2hBNWt6', 'kasir', 'bantul'),
('609e4cb5caa1a5.77446821', 'qwertyuiopa', 'Hatsune Miku', '088806033610', '$2y$12$OQZXMExNzJPBm0moNmCMRev0q6X/nWjTofmEmxfaHK7QT4mxOQP0K', 'kasir', 'Tokyo'),
('609fadb4baf398.80988497', NULL, 'kawaii-chan', '0888', '$2y$12$Kwrdq5/kBfi.Q1RwN8KGAOblzzP7cNbn6YtoF5pTBonsjNjEOXfK6', 'pelanggan', 'shibuya'),
('609fc9c7272453.81798879', 'qwertyuiopa', 'kasir', '234', '$2y$12$bHov8gW4vDqnMgrJsQHLYO7UrUI/DL1.H.oiMvaI96OLS.l0IVC9y', 'kasir', 'shibuya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lupa_password`
--
ALTER TABLE `lupa_password`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telp` (`telp`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_diskon` (`id_diskon`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice` (`invoice`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_outlet` (`id_outlet`) USING BTREE,
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telp` (`telp`),
  ADD KEY `id_outlet` (`id_outlet`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lupa_password`
--
ALTER TABLE `lupa_password`
  ADD CONSTRAINT `lupa_password_ibfk_1` FOREIGN KEY (`telp`) REFERENCES `user` (`telp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `id_diskon_to_diskon_TB` FOREIGN KEY (`id_diskon`) REFERENCES `diskon` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `id_outlet_to_outlet_TB` FOREIGN KEY (`id_outlet`) REFERENCES `outlet` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `id_outlet_to_outlet_TB_2` FOREIGN KEY (`id_outlet`) REFERENCES `outlet` (`id`),
  ADD CONSTRAINT `id_pegawai_to_user_TB` FOREIGN KEY (`id_pegawai`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `id_pelanggan_to_user_TB` FOREIGN KEY (`id_pelanggan`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_to_outlet_TB` FOREIGN KEY (`id_outlet`) REFERENCES `outlet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
