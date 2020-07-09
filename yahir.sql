-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2020 pada 06.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yahir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nohp` bigint(20) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `sumber_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `nohp`, `alamat`, `karyawan_id`, `type_id`, `sumber_id`, `created_at`, `updated_at`) VALUES
(1, 'Aceng Kusmana', 6282111230484, 'Cikarang', 7, 1, 2, 1589730329, 1589730329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer__sumber`
--

CREATE TABLE `customer__sumber` (
  `id_sumber` int(11) NOT NULL,
  `sumber` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer__sumber`
--

INSERT INTO `customer__sumber` (`id_sumber`, `sumber`, `created_at`) VALUES
(1, 'Website', 1589730329),
(2, 'Facebook', 1589730329),
(3, 'Instagram', 1589730329),
(4, 'Telegram', 1589730329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer__type`
--

CREATE TABLE `customer__type` (
  `id_type` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer__type`
--

INSERT INTO `customer__type` (`id_type`, `type`, `created_at`) VALUES
(1, 'Agen', 1589730329),
(2, 'Reseller', 1589730329),
(3, 'Eceran', 1589730329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `databarang`
--

CREATE TABLE `databarang` (
  `id_databarang` int(11) NOT NULL,
  `cabang_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `namaBarang` varchar(128) NOT NULL,
  `stock` int(11) NOT NULL,
  `asal_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `harga_agen` bigint(20) NOT NULL,
  `harga_reseller` bigint(20) NOT NULL,
  `harga_custom` bigint(20) DEFAULT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `databarang`
--

INSERT INTO `databarang` (`id_databarang`, `cabang_id`, `supplier_id`, `namaBarang`, `stock`, `asal_id`, `kategori_id`, `harga`, `harga_agen`, `harga_reseller`, `harga_custom`, `created_at`) VALUES
(9, 1, 1, 'Gamis Monalisa', 100, 1, 1, 20000, 30000, 40000, 50000, 1589730329),
(10, 1, 1, 'atasan', 100, 1, 1, 20000, 30000, 40000, 50000, 1589730329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `databarang__asal`
--

CREATE TABLE `databarang__asal` (
  `id_asal` int(11) NOT NULL,
  `asal` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `databarang__asal`
--

INSERT INTO `databarang__asal` (`id_asal`, `asal`) VALUES
(1, 'JKT'),
(2, 'Pekalongan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `databarang__kategori`
--

CREATE TABLE `databarang__kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `databarang__kategori`
--

INSERT INTO `databarang__kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Gamis'),
(2, 'Koko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `karyawan_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `type_pembayaran_id` int(11) NOT NULL,
  `ekspedisi_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `type_penjualan` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice__detail`
--

CREATE TABLE `invoice__detail` (
  `id_detail` int(11) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `databarang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice__detail`
--

INSERT INTO `invoice__detail` (`id_detail`, `invoice_id`, `databarang_id`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(135, '', 9, 0, 0, 0, 0),
(136, '', 9, 0, 0, 0, 0),
(137, '', 10, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice__ekspedisi`
--

CREATE TABLE `invoice__ekspedisi` (
  `id_ekspedisi` int(11) NOT NULL,
  `ekspedisi` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice__ekspedisi`
--

INSERT INTO `invoice__ekspedisi` (`id_ekspedisi`, `ekspedisi`, `created_at`) VALUES
(1, 'JNE', 1589730329),
(2, 'POS', 1589730329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice__type_pembayaran`
--

CREATE TABLE `invoice__type_pembayaran` (
  `id_type_pembayaran` int(11) NOT NULL,
  `type_pembayaran` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice__type_pembayaran`
--

INSERT INTO `invoice__type_pembayaran` (`id_type_pembayaran`, `type_pembayaran`, `created_at`) VALUES
(1, 'Cash', 1589730329),
(2, 'Transfer', 1589730329),
(3, 'EDC', 1589730329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice__type_penjualan`
--

CREATE TABLE `invoice__type_penjualan` (
  `id_type_penjualan` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice__type_penjualan`
--

INSERT INTO `invoice__type_penjualan` (`id_type_penjualan`, `type`, `created_at`) VALUES
(1, 'Paket Usaha', 1589730329),
(2, 'Request', 1589730329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `cabang_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `role_id`, `cabang_id`, `first_name`, `last_name`, `full_name`, `email`, `password`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 'siti', 'khalifa', 'Siti Khalifa', 'sitikhalifa382@gmail.com', '$2y$10$imvljp7EPqyGhG.smsIaGeD/sIV8Vez4GqDOAfRjZjyb6xx.LQ24C', 'default.png', 1, 1590364888, 1590364888),
(8, 1, 1, 'Siti', 'Khalifa', 'Siti Khalifa', 'wasender2020@gmail.com', '$2y$10$k01HOIw4kqbmuPYMR2cE3uI5qBygHPFre30pape7KUWzSbDvxA/cK', 'default.jpg', 1, 1594097479, 1594097479);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan__cabang`
--

CREATE TABLE `karyawan__cabang` (
  `id_cabang` int(11) NOT NULL,
  `cabang` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan__cabang`
--

INSERT INTO `karyawan__cabang` (`id_cabang`, `cabang`, `created_at`) VALUES
(1, 'GBK', 1589730329),
(2, 'BDR', 1589730329),
(3, 'Delta', 1589730329),
(4, 'Solo', 1589730329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan__role`
--

CREATE TABLE `karyawan__role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan__role`
--

INSERT INTO `karyawan__role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`) VALUES
(1, 'Administrator'),
(2, 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu__access`
--

CREATE TABLE `menu__access` (
  `id_access` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu__access`
--

INSERT INTO `menu__access` (`id_access`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu__sub`
--

CREATE TABLE `menu__sub` (
  `id_sub` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu__sub`
--

INSERT INTO `menu__sub` (`id_sub`, `menu_id`, `title`, `url`, `icon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1, 1589730329, 1589730329),
(2, 2, 'Penjualan', 'karyawan', 'fas fa-fw fa-shopping-cart', 1, 1589730329, 1589730329),
(3, 2, 'Data Barang', 'karyawan/databarang', 'fas fa-fw fa-tshirt', 1, 1589730329, 1589730329),
(4, 1, 'Supplier', 'admin/supplier', 'fas fa-fw fa-share-alt-square', 1, 1589730329, 1589730329),
(5, 2, 'Data Customer', 'karyawan/datacustomer', 'fas fa-fw fa-users', 1, 1589730329, 1589730329),
(6, 2, 'Tambah Penjualan', 'karyawan/penjualan', 'fas fa-fw fa-plus-circle', 1, 1589730329, 1589730329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `namapaket` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `namapaket`, `created_at`, `updated_at`) VALUES
(1, 'PSA (Paket Sample Anak)', 1589730329, 1589730329),
(2, 'PMA (Paket Mini Anak)', 1589730329, 1589730329),
(3, 'Paket Setelan', 1589730329, 1589730329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket__detail`
--

CREATE TABLE `paket__detail` (
  `id_paket_detail` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `databarang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket__detail`
--

INSERT INTO `paket__detail` (`id_paket_detail`, `paket_id`, `databarang_id`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(4, 3, 9, 20, 250000, 1589730329, 1589730329),
(5, 3, 10, 20, 250000, 1589730329, 1589730329);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sample_data`
--

CREATE TABLE `sample_data` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `hidup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sample_data`
--

INSERT INTO `sample_data` (`id`, `first_name`, `last_name`, `age`, `hidup`) VALUES
(4, 'adsfa', 'dasfs', 8, 0),
(5, 'dasf', 'dasf', 32, 0),
(6, 'asdf', 'dasf', 23, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `product` varchar(128) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `asal_id` int(11) NOT NULL,
  `supplier` varchar(128) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `tanggal`, `product`, `kategori_id`, `asal_id`, `supplier`, `stock`, `created_at`, `updated_at`) VALUES
(2, '2020-06-03 05:58:00', 'Daster Rabbani', 1, 2, 'yahyuti', 500, 1589730329, 1589730329),
(3, '2020-06-03 05:58:00', 'cinos anak', 1, 2, 'yahyuti', 500, 1589730329, 1589730329),
(4, '2020-06-03 05:58:00', 'jilbab syari', 1, 2, 'yahyuti', 500, 1589730329, 1589730329),
(5, '2020-06-03 05:58:00', 'jilbab segiempat', 1, 2, 'yahyuti', 500, 1589730329, 1589730329),
(6, '2020-06-03 05:58:00', 'Kaos muslim anak', 1, 2, 'yahyuti', 500, 1589730329, 1589730329),
(7, '2020-06-03 05:58:00', 'kaos muslim abg', 1, 2, 'yahyuti', 500, 1589730329, 1589730329),
(2147483647, '2020-06-03 05:59:27', '', 0, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `no_invoice` varchar(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`no_invoice`, `tanggal`) VALUES
('0306200001', '2020-06-03 06:03:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `test`
--

INSERT INTO `test` (`id`, `title`, `description`, `date_created`) VALUES
(143, 'dasf', 'dsfa', '2020-06-06 02:23:02'),
(144, 'aceng', 'dfsa', '2020-07-07 05:49:26'),
(145, 'aceng', 'ACENGKUSMANA', '2020-07-07 05:54:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `kelamin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `kelamin`, `alamat`, `created_at`) VALUES
(1, 'aceng kusmana', 'acengkusmana@gmail.com', 82111230484, 'Laki-laki', 'cikarang', 1592229975),
(2, 'aceng kusmana', 'acengkusmana@gmail.com', 82111230484, 'Laki-laki', 'cikarang', 1592230086),
(3, 'aceng kusmana', 'acengkusmana@gmail.com', 82111230484, 'Laki-laki', 'cikarang', 1592232386);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `karyawan_id` (`karyawan_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `sumber_id` (`sumber_id`);

--
-- Indeks untuk tabel `customer__sumber`
--
ALTER TABLE `customer__sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indeks untuk tabel `customer__type`
--
ALTER TABLE `customer__type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indeks untuk tabel `databarang`
--
ALTER TABLE `databarang`
  ADD PRIMARY KEY (`id_databarang`),
  ADD KEY `cabang_id` (`cabang_id`),
  ADD KEY `asal_id` (`asal_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indeks untuk tabel `databarang__asal`
--
ALTER TABLE `databarang__asal`
  ADD PRIMARY KEY (`id_asal`);

--
-- Indeks untuk tabel `databarang__kategori`
--
ALTER TABLE `databarang__kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `type_penjualan` (`type_penjualan`),
  ADD KEY `karyawan_id` (`karyawan_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `type_pembayaran_id` (`type_pembayaran_id`),
  ADD KEY `ekspedisi_id` (`ekspedisi_id`);

--
-- Indeks untuk tabel `invoice__detail`
--
ALTER TABLE `invoice__detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `databarang_id` (`databarang_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indeks untuk tabel `invoice__ekspedisi`
--
ALTER TABLE `invoice__ekspedisi`
  ADD PRIMARY KEY (`id_ekspedisi`);

--
-- Indeks untuk tabel `invoice__type_pembayaran`
--
ALTER TABLE `invoice__type_pembayaran`
  ADD PRIMARY KEY (`id_type_pembayaran`);

--
-- Indeks untuk tabel `invoice__type_penjualan`
--
ALTER TABLE `invoice__type_penjualan`
  ADD PRIMARY KEY (`id_type_penjualan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `role` (`role_id`),
  ADD KEY `cabang` (`cabang_id`);

--
-- Indeks untuk tabel `karyawan__cabang`
--
ALTER TABLE `karyawan__cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indeks untuk tabel `karyawan__role`
--
ALTER TABLE `karyawan__role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `menu__access`
--
ALTER TABLE `menu__access`
  ADD PRIMARY KEY (`id_access`);

--
-- Indeks untuk tabel `menu__sub`
--
ALTER TABLE `menu__sub`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `paket__detail`
--
ALTER TABLE `paket__detail`
  ADD PRIMARY KEY (`id_paket_detail`),
  ADD KEY `databarang_id` (`databarang_id`),
  ADD KEY `paket_id` (`paket_id`);

--
-- Indeks untuk tabel `sample_data`
--
ALTER TABLE `sample_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `asal_id` (`asal_id`);

--
-- Indeks untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`no_invoice`);

--
-- Indeks untuk tabel `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `customer__sumber`
--
ALTER TABLE `customer__sumber`
  MODIFY `id_sumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `customer__type`
--
ALTER TABLE `customer__type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `databarang`
--
ALTER TABLE `databarang`
  MODIFY `id_databarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `databarang__asal`
--
ALTER TABLE `databarang__asal`
  MODIFY `id_asal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `databarang__kategori`
--
ALTER TABLE `databarang__kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `invoice__detail`
--
ALTER TABLE `invoice__detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT untuk tabel `invoice__ekspedisi`
--
ALTER TABLE `invoice__ekspedisi`
  MODIFY `id_ekspedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `invoice__type_pembayaran`
--
ALTER TABLE `invoice__type_pembayaran`
  MODIFY `id_type_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `invoice__type_penjualan`
--
ALTER TABLE `invoice__type_penjualan`
  MODIFY `id_type_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `karyawan__cabang`
--
ALTER TABLE `karyawan__cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `karyawan__role`
--
ALTER TABLE `karyawan__role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu__access`
--
ALTER TABLE `menu__access`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menu__sub`
--
ALTER TABLE `menu__sub`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `paket__detail`
--
ALTER TABLE `paket__detail`
  MODIFY `id_paket_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sample_data`
--
ALTER TABLE `sample_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_3` FOREIGN KEY (`sumber_id`) REFERENCES `customer__sumber` (`id_sumber`),
  ADD CONSTRAINT `customer_ibfk_4` FOREIGN KEY (`type_id`) REFERENCES `customer__type` (`id_type`);

--
-- Ketidakleluasaan untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`type_penjualan`) REFERENCES `invoice__type_penjualan` (`id_type_penjualan`);

--
-- Ketidakleluasaan untuk tabel `invoice__detail`
--
ALTER TABLE `invoice__detail`
  ADD CONSTRAINT `invoice__detail_ibfk_1` FOREIGN KEY (`databarang_id`) REFERENCES `databarang` (`id_databarang`);

--
-- Ketidakleluasaan untuk tabel `paket__detail`
--
ALTER TABLE `paket__detail`
  ADD CONSTRAINT `paket__detail_ibfk_2` FOREIGN KEY (`databarang_id`) REFERENCES `databarang` (`id_databarang`),
  ADD CONSTRAINT `paket__detail_ibfk_3` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id_paket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
