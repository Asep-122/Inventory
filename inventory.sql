-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 10:04 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_login`
--

CREATE TABLE `cat_login` (
  `Cat_LoginId` int(11) NOT NULL,
  `Cat_LoginName` varchar(20) NOT NULL,
  `Cat_LoginHash` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_login`
--

INSERT INTO `cat_login` (`Cat_LoginId`, `Cat_LoginName`, `Cat_LoginHash`) VALUES
(1, 'Owner', '#Own#'),
(2, 'Admin', '#Admin#'),
(3, 'Kasir', '#Kasir#');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Cat_LoginId` int(11) NOT NULL,
  `Log_Nip` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Cat_LoginId`, `Log_Nip`, `Username`, `Password`, `Status`) VALUES
(1, 1950, 'own-sa', 'owner', '1'),
(2, 1951, 'adm-adm', 'admin', '1'),
(3, 1952, 'Ksr-ksr', 'kasir', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailpesanbarang`
--

CREATE TABLE `tbl_detailpesanbarang` (
  `Invoice` varchar(6) NOT NULL,
  `KodeBarang` varchar(50) NOT NULL,
  `QtyOrder` int(11) NOT NULL,
  `QtyTerima` int(11) NOT NULL,
  `QtyRetur` int(11) NOT NULL,
  `Harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detailpesanbarang`
--

INSERT INTO `tbl_detailpesanbarang` (`Invoice`, `KodeBarang`, `QtyOrder`, `QtyTerima`, `QtyRetur`, `Harga`) VALUES
('INV001', 'BRG0001', 1, 1, 0, 50000),
('INV001', 'BRG0002', 4, 2, 2, 80000),
('INV002', 'BRG0003', 6, 0, 0, 85000),
('INV003', 'BRG0002', 6, 6, 0, 80000),
('INV004', 'BRG0003', 2, 0, 0, 20000),
('INV004', 'BRG0002', 5, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_headerpesanbarang`
--

CREATE TABLE `tbl_headerpesanbarang` (
  `Invoice` varchar(10) NOT NULL,
  `KodeSupplier` varchar(10) DEFAULT NULL,
  `TglOrder` date DEFAULT NULL,
  `TglKirim` date DEFAULT NULL,
  `StatusPemesanan` int(1) DEFAULT NULL,
  `UserEntryOrder` varchar(35) DEFAULT NULL,
  `UserEntryTerima` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_headerpesanbarang`
--

INSERT INTO `tbl_headerpesanbarang` (`Invoice`, `KodeSupplier`, `TglOrder`, `TglKirim`, `StatusPemesanan`, `UserEntryOrder`, `UserEntryTerima`) VALUES
('INV001', 'SPL001', '2020-07-08', '2020-07-15', 2, 'ksr', 'ksr'),
('INV002', 'SPL002', '2020-07-14', '1900-01-01', 0, 'ksr', 'ksr'),
('INV003', 'SPL003', '2020-07-14', '2020-07-14', 2, 'ksr', 'ksr'),
('INV004', 'SPL001', '2020-07-15', '1900-01-01', 0, 'adm', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jualbarang`
--

CREATE TABLE `tbl_jualbarang` (
  `NoPenjualan` varchar(10) NOT NULL,
  `KodeBarang` varchar(10) DEFAULT NULL,
  `Qty` decimal(10,0) DEFAULT NULL,
  `Harga` decimal(10,0) DEFAULT NULL,
  `TglEntry` date DEFAULT NULL,
  `UserEntry` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jualbarang`
--

INSERT INTO `tbl_jualbarang` (`NoPenjualan`, `KodeBarang`, `Qty`, `Harga`, `TglEntry`, `UserEntry`) VALUES
('PJ001', 'BRG0003', '-1', '141750', '2020-07-11', 'Ksr-ksr'),
('PJ002', 'BRG0001', '-1', '68250', '2020-07-12', 'Ksr-ksr');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(200) DEFAULT NULL,
  `TglLahir` datetime DEFAULT NULL,
  `NoTelp` varchar(12) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`ID`, `Nama`, `TglLahir`, `NoTelp`, `Email`, `Alamat`) VALUES
(1950, 'sa', '1995-11-03 10:44:03', '08211255452', 'sa@gmail.com', 'cengkareng jakarta barat 11750'),
(1951, 'adm', '1995-11-03 10:44:03', '08125562444', 'adm@gmail.com', NULL),
(1952, 'kasir', '1997-02-05 00:00:00', '08224243233', 'ksr@gmail.com', 'Kebayoran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masterbarang`
--

CREATE TABLE `tbl_masterbarang` (
  `KodeBarang` varchar(7) NOT NULL,
  `NamaBarang` varchar(30) DEFAULT NULL,
  `Satuan` int(11) DEFAULT NULL,
  `Picture` varchar(30) DEFAULT NULL,
  `UserCreate` varchar(30) DEFAULT NULL,
  `TglCreate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_masterbarang`
--

INSERT INTO `tbl_masterbarang` (`KodeBarang`, `NamaBarang`, `Satuan`, `Picture`, `UserCreate`, `TglCreate`) VALUES
('BRG0001', 'Indomie', 6, 'Indomie_Goreng.jpg', 'adm', '2020-06-08 00:00:00'),
('BRG0002', 'Susu Bear Brand', 6, 'susu.jpg', 'adm', '2020-06-08 00:00:00'),
('BRG0003', 'Beras', 3, 'beras.jpg', 'adm', '2020-06-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanbarang`
--

CREATE TABLE `tbl_pesanbarang` (
  `NoFaktur` varchar(10) NOT NULL,
  `KodeSupplier` varchar(50) DEFAULT NULL,
  `KodeBarang` varchar(10) DEFAULT NULL,
  `QtyOrder` decimal(10,0) DEFAULT NULL,
  `QtyTerima` decimal(10,0) DEFAULT NULL,
  `QtyRetur` decimal(10,0) DEFAULT NULL,
  `Harga` decimal(10,0) DEFAULT NULL,
  `TglPemesanan` datetime DEFAULT NULL,
  `TglTerima` datetime DEFAULT NULL,
  `StatusPemesanan` int(1) DEFAULT NULL,
  `Keterangan` text,
  `UserEntryOrder` varchar(35) DEFAULT NULL,
  `UserEntryTerima` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesanbarang`
--

INSERT INTO `tbl_pesanbarang` (`NoFaktur`, `KodeSupplier`, `KodeBarang`, `QtyOrder`, `QtyTerima`, `QtyRetur`, `Harga`, `TglPemesanan`, `TglTerima`, `StatusPemesanan`, `Keterangan`, `UserEntryOrder`, `UserEntryTerima`) VALUES
('INV001', 'SPL001', 'BRG0001', '1', '0', '0', '65000', '2020-07-11 00:00:00', '1900-01-01 00:00:00', 0, '', 'adm', ''),
('INV002', 'SPL003', 'BRG0001', '3', '2', '1', '76000', '2020-07-12 00:00:00', '2020-07-14 00:00:00', 2, NULL, 'adm', 'adm'),
('INV003', 'SPL001', 'BRG0001', '3', '0', '0', '65000', '2020-07-13 00:00:00', '1900-01-01 00:00:00', 0, '', 'adm', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `Id` int(11) NOT NULL,
  `Satuan` varchar(30) DEFAULT NULL,
  `AliasSatuan` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`Id`, `Satuan`, `AliasSatuan`) VALUES
(1, 'Pcs', 'Pcs'),
(2, 'Kilogram', 'Kg'),
(3, 'Karung', 'Krg'),
(4, 'Lembar', 'Lmbr'),
(5, 'Meter', 'Mtr'),
(6, 'Dus', 'Dus');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stockbarang`
--

CREATE TABLE `tbl_stockbarang` (
  `KodeBarang` varchar(6) NOT NULL,
  `Gudang` varchar(25) DEFAULT NULL,
  `StockBarang` decimal(10,0) DEFAULT NULL,
  `TglLastIn` datetime DEFAULT NULL,
  `TglLastOut` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `KodeSupplier` varchar(10) NOT NULL,
  `NamaSupplier` varchar(30) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Telp` varchar(20) DEFAULT NULL,
  `Alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`KodeSupplier`, `NamaSupplier`, `Email`, `Telp`, `Alamat`) VALUES
('SPL001', 'Cv.Nusantara', 'Nusantara@gmail.com', '0215558986', 'Jl.Sawah Besar'),
('SPL002', 'PT.Delta', 'Delta@Gmail.com', '0215558986', 'Jl.Cengkareng Indah'),
('SPL003', 'PT Titra', 'Titra@Gmail.com', '0821215424', 'Pedongkelan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksibarang`
--

CREATE TABLE `tbl_transaksibarang` (
  `KodeTransaksi` varchar(2) DEFAULT NULL,
  `JenisTransaksi` varchar(10) DEFAULT NULL,
  `KodeBarang` varchar(10) DEFAULT NULL,
  `Qty` decimal(10,0) DEFAULT NULL,
  `TglTransaksi` datetime DEFAULT NULL,
  `UserEntry` varchar(20) DEFAULT NULL,
  `Document` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksibarang`
--

INSERT INTO `tbl_transaksibarang` (`KodeTransaksi`, `JenisTransaksi`, `KodeBarang`, `Qty`, `TglTransaksi`, `UserEntry`, `Document`) VALUES
('00', 'Masuk', 'BRG0001', '2', '2020-07-12 00:00:00', 'adm', 'INV002'),
('01', 'Keluar', 'BRG0001', '-1', '2020-07-12 00:00:00', 'Ksr-ksr', 'PJ002');

--
-- Triggers `tbl_transaksibarang`
--
DELIMITER $$
CREATE TRIGGER `T_UpdateStatusStock` AFTER INSERT ON `tbl_transaksibarang` FOR EACH ROW BEGIN
    			
	
    update tbl_pesanbarang set StatusPemesanan = 2 where NoFaktur = new.Document;

    END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_login`
--
ALTER TABLE `cat_login`
  ADD PRIMARY KEY (`Cat_LoginId`);

--
-- Indexes for table `tbl_headerpesanbarang`
--
ALTER TABLE `tbl_headerpesanbarang`
  ADD PRIMARY KEY (`Invoice`);

--
-- Indexes for table `tbl_jualbarang`
--
ALTER TABLE `tbl_jualbarang`
  ADD PRIMARY KEY (`NoPenjualan`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_masterbarang`
--
ALTER TABLE `tbl_masterbarang`
  ADD PRIMARY KEY (`KodeBarang`);

--
-- Indexes for table `tbl_pesanbarang`
--
ALTER TABLE `tbl_pesanbarang`
  ADD PRIMARY KEY (`NoFaktur`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_stockbarang`
--
ALTER TABLE `tbl_stockbarang`
  ADD PRIMARY KEY (`KodeBarang`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`KodeSupplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_login`
--
ALTER TABLE `cat_login`
  MODIFY `Cat_LoginId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
