-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_ppa
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ref_department`
--

DROP TABLE IF EXISTS `ref_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_department` (
  `id_department` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `leader` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nip_leader` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pangkat` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jabatan` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `phone` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `website` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `views` int DEFAULT NULL,
  `status` int DEFAULT '1',
  `type` int DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_id` int DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_department`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2147483648 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_desa`
--

DROP TABLE IF EXISTS `ref_desa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_desa` (
  `kd_kab` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `id_desa` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nm_desa` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jenis` char(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `map_url` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`kd_kab`,`id_desa`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_domaindesa`
--

DROP TABLE IF EXISTS `ref_domaindesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_domaindesa` (
  `id` int NOT NULL,
  `kode_desa` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_desa` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `url_desa` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `uuid` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_jenis_akta`
--

DROP TABLE IF EXISTS `ref_jenis_akta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_jenis_akta` (
  `id_jenis` int NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_jenis`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_jenis_pengadilan`
--

DROP TABLE IF EXISTS `ref_jenis_pengadilan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_jenis_pengadilan` (
  `jenis_id` int NOT NULL AUTO_INCREMENT,
  `jenis_pengadilan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `keterangan_pengadilan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`jenis_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_jenis_pihak`
--

DROP TABLE IF EXISTS `ref_jenis_pihak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_jenis_pihak` (
  `id_jenis` int NOT NULL AUTO_INCREMENT,
  `jenis_pihak` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `keterangan_pihak` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_jenis`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_kab`
--

DROP TABLE IF EXISTS `ref_kab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_kab` (
  `kd_kab` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kab` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nm_kab` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kd_kab`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_kec`
--

DROP TABLE IF EXISTS `ref_kec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_kec` (
  `kd_kab` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `id_kec` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `nm_kec` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kd_sr` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '',
  `zona` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`kd_kab`,`id_kec`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_kekerasan`
--

DROP TABLE IF EXISTS `ref_kekerasan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_kekerasan` (
  `id_kekerasan` int NOT NULL AUTO_INCREMENT,
  `jenis_kekerasan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ket_kekerasan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_kekerasan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_pengadilan`
--

DROP TABLE IF EXISTS `ref_pengadilan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_pengadilan` (
  `id_pengadilan` int NOT NULL AUTO_INCREMENT,
  `nama_pengadilan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jenis_pengadilan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_pengadilan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_perkara`
--

DROP TABLE IF EXISTS `ref_perkara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_perkara` (
  `id_perkara` int NOT NULL AUTO_INCREMENT,
  `perkara` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_perkara`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_program`
--

DROP TABLE IF EXISTS `ref_program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_program` (
  `id_sipd` int NOT NULL AUTO_INCREMENT,
  `id_urusan` int DEFAULT NULL,
  `kode_urusan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_urusan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_bidang_urusan` int DEFAULT NULL,
  `kode_bidang_urusan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_bidang_urusan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_program` int DEFAULT NULL,
  `kode_program` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_program` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `id_giat` int DEFAULT NULL,
  `kode_giat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_giat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `id_sub_giat` int DEFAULT NULL,
  `kode_sub_giat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_sub_giat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `is_locked` int DEFAULT NULL,
  `vol_staf` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `action` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_sipd`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1979 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_progres`
--

DROP TABLE IF EXISTS `ref_progres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_progres` (
  `progres_id` int NOT NULL AUTO_INCREMENT,
  `progres_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `progres_keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`progres_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_prop`
--

DROP TABLE IF EXISTS `ref_prop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_prop` (
  `kd_prop` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_prop` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nm_prop` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kd_prop`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_sengketa`
--

DROP TABLE IF EXISTS `ref_sengketa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_sengketa` (
  `id_sengketa` int NOT NULL AUTO_INCREMENT,
  `nama_sengketa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_sengketa`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_status_berkas`
--

DROP TABLE IF EXISTS `ref_status_berkas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_status_berkas` (
  `id` int NOT NULL,
  `keterangan_proses` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_tahun`
--

DROP TABLE IF EXISTS `ref_tahun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_tahun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reg_districts`
--

DROP TABLE IF EXISTS `reg_districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reg_districts` (
  `id` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `regency_id` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `districts_regency_id_index` (`regency_id`,`id`) USING BTREE,
  CONSTRAINT `district_regency_foreign` FOREIGN KEY (`regency_id`) REFERENCES `reg_regencies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reg_districts_copy1`
--

DROP TABLE IF EXISTS `reg_districts_copy1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reg_districts_copy1` (
  `id` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `regency_id` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `districts_regency_id_index` (`regency_id`,`id`) USING BTREE,
  CONSTRAINT `reg_districts_copy1_ibfk_1` FOREIGN KEY (`regency_id`) REFERENCES `reg_regencies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reg_provinces`
--

DROP TABLE IF EXISTS `reg_provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reg_provinces` (
  `id` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reg_regencies`
--

DROP TABLE IF EXISTS `reg_regencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reg_regencies` (
  `id` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `province_id` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `province_id` (`province_id`) USING BTREE,
  KEY `reg_id` (`id`) USING BTREE,
  CONSTRAINT `regency_province_foreign` FOREIGN KEY (`province_id`) REFERENCES `reg_provinces` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reg_villages`
--

DROP TABLE IF EXISTS `reg_villages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reg_villages` (
  `id` char(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `district_id` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `villages_district_id_index` (`district_id`) USING BTREE,
  CONSTRAINT `village_district_foreign` FOREIGN KEY (`district_id`) REFERENCES `reg_districts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rencana_aksi`
--

DROP TABLE IF EXISTS `rencana_aksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rencana_aksi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `skpd_id` int DEFAULT NULL,
  `kak_id` int DEFAULT NULL,
  `sub_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun` year DEFAULT NULL,
  `tujuan_pprg` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `biaya` int DEFAULT NULL,
  `create` datetime DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  `create_id` int DEFAULT NULL,
  `update_id` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `kak_id` (`kak_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_kak`
--

DROP TABLE IF EXISTS `tb_kak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_kak` (
  `Id_kak` int NOT NULL AUTO_INCREMENT,
  `Kode_skpd` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Wawasan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Isu_Gender` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Faktor_Kesenjangan_akses` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Faktor_Kesenjangan_partisipasi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Faktor_kesenjangan_kontrol` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Faktor_kesenjangan_manfaat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Sebab_Kesenjagan_Internal` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Sebab_Kesenjagan_Eksternal` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Reformasi_Tujuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Rencana_Aksi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Data_Dasar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Indikator_Gender` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Tahun_Anggaran` year NOT NULL,
  `Kode_Program` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Sasaran_Program` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Program` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Sub_Kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Uraian_Kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Tujuan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Maksud` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Dasar_Hukum` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Gambaran_Umum` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Cara_Pelaksanan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Tempat_Pelaksaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Pelaksana_Penaggungjawab` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Analisis_Situasi` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Jadwal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Biaya` int DEFAULT NULL,
  `Indikator_Kinerja` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Batasan_Kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Hasil` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Belanja1_Tujuan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Belanja1_Alokasianggaran` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Belanja2_Tujuan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Belanja2_Alokasianggaran` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Capaian_Program` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Total_Anggaran` int DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  KEY `id_kak` (`Id_kak`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_tor`
--

DROP TABLE IF EXISTS `tb_tor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_tor` (
  `tor_id` int NOT NULL AUTO_INCREMENT,
  `tor_tahun` year DEFAULT NULL,
  `tor_skpd` int DEFAULT NULL,
  `tor_kak_id` int DEFAULT NULL,
  `tor_program` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tor_sasaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tor_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tor_dasar_hukum` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tor_gambaran_umum` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tor_uraian_kerja` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tor_indikator_kerja` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tor_batasan_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tor_maksud_tujuan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tor_cara_pelaksanaan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tor_tempat_pelaksanaan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tor_penanggung_jawab` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tor_jadwal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tor_biaya` float DEFAULT NULL,
  `create_id` int DEFAULT NULL,
  `update_id` int DEFAULT NULL,
  `create` datetime DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  `delete` datetime DEFAULT NULL,
  PRIMARY KEY (`tor_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_ajb`
--

DROP TABLE IF EXISTS `tbl_ajb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ajb` (
  `id_ajb` int NOT NULL AUTO_INCREMENT,
  `kode_akta` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `penjual` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nik_penjual` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ktp_penjual` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'upload',
  `pembeli` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nik_pembeli` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ktp_pembeli` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'upload',
  `jenis_akta` int DEFAULT NULL,
  `nomor_akta` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'seteleh review',
  `tanggal_akta` date DEFAULT NULL COMMENT 'seteleh review',
  `letter_kohir` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `letter_nopersil` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `letter_blok` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `luas` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `batas_utara` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `batas_selatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `batas_timur` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `batas_barat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nilai_transaksi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'upload',
  `status_berkas` int NOT NULL DEFAULT '1',
  `sppt_pbb` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `resi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `keterangan_tercatat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'apabila resi selesai',
  `akta_sebelum` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'akta_sebelum',
  `akta_selesai` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'akta_selesai',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ajb`) USING BTREE,
  KEY `id_ajb` (`id_ajb`,`kode_akta`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_buku`
--

DROP TABLE IF EXISTS `tbl_buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_buku` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `penerbit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_file_pelayanan`
--

DROP TABLE IF EXISTS `tbl_file_pelayanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_file_pelayanan` (
  `files_id` int NOT NULL AUTO_INCREMENT,
  `kode_layanan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`files_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_hak_akses`
--

DROP TABLE IF EXISTS `tbl_hak_akses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_hak_akses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user_level` int NOT NULL,
  `id_menu` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_ligitasi`
--

DROP TABLE IF EXISTS `tbl_ligitasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ligitasi` (
  `id_pelayanan` int NOT NULL AUTO_INCREMENT,
  `kode_layanan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `skpd_id` int DEFAULT NULL,
  `nama_pejabat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `keterangan` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `review` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jenis_pengadilan` int DEFAULT NULL,
  `status_sengketa` int DEFAULT NULL,
  `jenis_perkara` int DEFAULT NULL,
  `pengadilan` int DEFAULT NULL,
  `jenis_pihak` int DEFAULT NULL,
  `file1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'surat pemohonana bantuan hukum',
  `file2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'surat relaas',
  `file3` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'dokumen gugatan',
  `file4` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'dokumenlainnya',
  `nama_pic` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hp_pic` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pelayanan`) USING BTREE,
  KEY `kode_layanan` (`kode_layanan`) USING BTREE,
  KEY `id_pelayanan` (`id_pelayanan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_litigasi`
--

DROP TABLE IF EXISTS `tbl_litigasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_litigasi` (
  `id_pelayanan` int NOT NULL AUTO_INCREMENT,
  `kode_layanan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `skpd_id` int DEFAULT NULL,
  `nama_pejabat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `keterangan` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `review` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jenis_pengadilan` int DEFAULT NULL,
  `status_sengketa` int DEFAULT NULL,
  `jenis_perkara` int DEFAULT NULL,
  `pengadilan` int DEFAULT NULL,
  `jenis_pihak` int DEFAULT NULL,
  `file1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'surat pemohonana bantuan hukum',
  `file2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'surat relaas',
  `file3` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'dokumen gugatan',
  `file4` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'dokumenlainnya',
  `nama_pic` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hp_pic` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pelayanan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_menu`
--

DROP TABLE IF EXISTS `tbl_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `url` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_main_menu` int NOT NULL,
  `is_aktif` enum('y','n') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'y=yes,n=no',
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_pelayanan`
--

DROP TABLE IF EXISTS `tbl_pelayanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pelayanan` (
  `id_pelayanan` int NOT NULL AUTO_INCREMENT,
  `kode_layanan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `skpd_id` int DEFAULT NULL,
  `nama_pejabat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `review` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pelayanan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_ppa_berita_acara`
--

DROP TABLE IF EXISTS `tbl_ppa_berita_acara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ppa_berita_acara` (
  `berita_acara_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `berita_acara_status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '1 pengajuan 2 sdg proses 3 selasai 4 tolak',
  `berita_acara_dihentikan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `berita_acara_kode` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'UUID',
  `berita_acara_tgl` date DEFAULT NULL,
  `berita_acara_hari` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `berita_acara_kronologi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `berita_acara_penerima_laporan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `berita_acara_kepala_uptd` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `berita_acara_keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `berita_acara_harapan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelapor_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelapor_tgl` date DEFAULT NULL COMMENT 'TANGGAL LAPORAN',
  `pelapor_tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_idusers` int DEFAULT NULL COMMENT 'ID PELAPOR DARI TBL_USER',
  `pelapor_nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_pekerjaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_telepon` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_kab` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_kec` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_desa` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `korban_nik` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_jeniskelamin` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_agama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_alamat` varchar(255) DEFAULT NULL,
  `korban_tgl_lahir` date DEFAULT NULL,
  `korban_usia` int DEFAULT NULL,
  `korban_prop` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_kab` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_kec` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_desa` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_foto1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_foto2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_email` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_telepon` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_tglkejadian` date DEFAULT NULL,
  `pelaku_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_jenis_kelamin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_usia` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_hubungan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_pendidikan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_prop` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_kab` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_kec` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_desa` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lapor_anonim` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'ya',
  `lapor_rahasia` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'ya',
  `lapor_status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'valid',
  `lapor_kategori` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'aduan',
  `lapor_disposisi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'lainya',
  `lapor_klarifikasi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '-',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `user_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`berita_acara_id`,`berita_acara_kode`) USING BTREE,
  KEY `id` (`berita_acara_id`) USING BTREE,
  KEY `nik_pelapor` (`pelapor_nik`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_delete_tbl_ppa_berita_acara` AFTER DELETE ON `tbl_ppa_berita_acara` FOR EACH ROW BEGIN
INSERT INTO tbl_ppa_berita_acara_log(berita_acara_id, 
	berita_acara_status, 
	berita_acara_dihentikan, 
	berita_acara_kode, 
	berita_acara_tgl, 
	berita_acara_hari, 
	berita_acara_kronologi, 
	berita_acara_penerima_laporan, 
	berita_acara_kepala_uptd, 
	berita_acara_keterangan, 
	pelapor_nama, 
	pelapor_tgl, 
	pelapor_tempat, 
	pelapor_idusers, 
	pelapor_nik, 
	pelapor_pekerjaan, 
	pelapor_telepon, 
	pelapor_kab, 
	pelapor_kec, 
	pelapor_desa, 
	korban_nik, 
	korban_nama, 
	korban_jeniskelamin, 
	korban_agama, 
	korban_tempat, 
	korban_tgl_lahir, 
	korban_usia, 
	korban_prop, 
	korban_kab, 
	korban_kec, 
	korban_desa, 
	korban_foto1, 
	korban_foto2, 
	korban_email, 
	korban_telepon, 
	korban_tglkejadian, 
	pelaku_nama, 
	pelaku_jenis_kelamin, 
	pelaku_usia, 
	pelaku_hubungan, 
	pelaku_pendidikan, 
	pelaku_alamat, 
	pelaku_prop, 
	pelaku_kab, 
	pelaku_kec, 
	pelaku_desa, 
	pelaku_nik, 
	lapor_anonim, 
	lapor_rahasia, 
	lapor_status, 
	lapor_kategori, 
	lapor_disposisi, 
	lapor_klarifikasi, 
	create_at, 
	update_at, 
	delete_at, 
	user_id)
VALUES (OLD.berita_acara_id, 
OLD.berita_acara_status, 
OLD.berita_acara_dihentikan, 
OLD.berita_acara_kode, 
OLD.berita_acara_tgl, 
OLD.berita_acara_hari, 
OLD.berita_acara_kronologi, 
OLD.berita_acara_penerima_laporan, 
OLD.berita_acara_kepala_uptd, 
OLD.berita_acara_keterangan, 
OLD.pelapor_nama, 
OLD.pelapor_tgl, 
OLD.pelapor_tempat, 
OLD.pelapor_idusers, 
OLD.pelapor_nik, 
OLD.pelapor_pekerjaan, 
OLD.pelapor_telepon, 
OLD.pelapor_kab, 
OLD.pelapor_kec, 
OLD.pelapor_desa, 
OLD.korban_nik, 
OLD.korban_nama, 
OLD.korban_jeniskelamin, 
OLD.korban_agama, 
OLD.korban_tempat, 
OLD.korban_tgl_lahir, 
OLD.korban_usia, 
OLD.korban_prop, 
OLD.korban_kab, 
OLD.korban_kec, 
OLD.korban_desa, 
OLD.korban_foto1, 
OLD.korban_foto2, 
OLD.korban_email, 
OLD.korban_telepon, 
OLD.korban_tglkejadian, 
OLD.pelaku_nama, 
OLD.pelaku_jenis_kelamin, 
OLD.pelaku_usia, 
OLD.pelaku_hubungan, 
OLD.pelaku_pendidikan, 
OLD.pelaku_alamat, 
OLD.pelaku_prop, 
OLD.pelaku_kab, 
OLD.pelaku_kec, 
OLD.pelaku_desa, 
OLD.pelaku_nik, 
OLD.lapor_anonim, 
OLD.lapor_rahasia, 
OLD.lapor_status, 
OLD.lapor_kategori, 
OLD.lapor_disposisi, 
OLD.lapor_klarifikasi, 
OLD.create_at, 
OLD.update_at, 
OLD.delete_at, 
OLD.user_id
);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tbl_ppa_berita_acara_copy1`
--

DROP TABLE IF EXISTS `tbl_ppa_berita_acara_copy1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ppa_berita_acara_copy1` (
  `berita_acara_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `berita_acara_status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '1 pengajuan 2 sdg proses 3 selasai 4 tolak',
  `berita_acara_dihentikan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `berita_acara_kode` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'UUID',
  `berita_acara_tgl` date DEFAULT NULL,
  `berita_acara_hari` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `berita_acara_kronologi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `berita_acara_penerima_laporan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `berita_acara_kepala_uptd` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `berita_acara_keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `berita_acara_harapan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelapor_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelapor_tgl` date DEFAULT NULL COMMENT 'TANGGAL LAPORAN',
  `pelapor_tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_idusers` int DEFAULT NULL COMMENT 'ID PELAPOR DARI TBL_USER',
  `pelapor_nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_pekerjaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_telepon` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_kab` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_kec` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_desa` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `korban_nik` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_jeniskelamin` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_agama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_tgl_lahir` date DEFAULT NULL,
  `korban_usia` int DEFAULT NULL,
  `korban_prop` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_kab` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_kec` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_desa` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_foto1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_foto2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_email` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_telepon` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_tglkejadian` date DEFAULT NULL,
  `pelaku_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_jenis_kelamin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_usia` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_hubungan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_pendidikan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_prop` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_kab` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_kec` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_desa` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lapor_anonim` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'ya',
  `lapor_rahasia` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'ya',
  `lapor_status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'valid',
  `lapor_kategori` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'aduan',
  `lapor_disposisi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'lainya',
  `lapor_klarifikasi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '-',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `user_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`berita_acara_id`) USING BTREE,
  KEY `id` (`berita_acara_id`) USING BTREE,
  KEY `nik_pelapor` (`pelapor_nik`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_delete_tbl_ppa_berita_acara_copy1` AFTER DELETE ON `tbl_ppa_berita_acara_copy1` FOR EACH ROW BEGIN
INSERT INTO tbl_ppa_berita_acara_log(berita_acara_id, 
	berita_acara_status, 
	berita_acara_dihentikan, 
	berita_acara_kode, 
	berita_acara_tgl, 
	berita_acara_hari, 
	berita_acara_kronologi, 
	berita_acara_penerima_laporan, 
	berita_acara_kepala_uptd, 
	berita_acara_keterangan, 
	pelapor_nama, 
	pelapor_tgl, 
	pelapor_tempat, 
	pelapor_idusers, 
	pelapor_nik, 
	pelapor_pekerjaan, 
	pelapor_telepon, 
	pelapor_kab, 
	pelapor_kec, 
	pelapor_desa, 
	korban_nik, 
	korban_nama, 
	korban_jeniskelamin, 
	korban_agama, 
	korban_tempat, 
	korban_tgl_lahir, 
	korban_usia, 
	korban_prop, 
	korban_kab, 
	korban_kec, 
	korban_desa, 
	korban_foto1, 
	korban_foto2, 
	korban_email, 
	korban_telepon, 
	korban_tglkejadian, 
	pelaku_nama, 
	pelaku_jenis_kelamin, 
	pelaku_usia, 
	pelaku_hubungan, 
	pelaku_pendidikan, 
	pelaku_alamat, 
	pelaku_prop, 
	pelaku_kab, 
	pelaku_kec, 
	pelaku_desa, 
	pelaku_nik, 
	lapor_anonim, 
	lapor_rahasia, 
	lapor_status, 
	lapor_kategori, 
	lapor_disposisi, 
	lapor_klarifikasi, 
	create_at, 
	update_at, 
	delete_at, 
	user_id)
VALUES (OLD.berita_acara_id, 
OLD.berita_acara_status, 
OLD.berita_acara_dihentikan, 
OLD.berita_acara_kode, 
OLD.berita_acara_tgl, 
OLD.berita_acara_hari, 
OLD.berita_acara_kronologi, 
OLD.berita_acara_penerima_laporan, 
OLD.berita_acara_kepala_uptd, 
OLD.berita_acara_keterangan, 
OLD.pelapor_nama, 
OLD.pelapor_tgl, 
OLD.pelapor_tempat, 
OLD.pelapor_idusers, 
OLD.pelapor_nik, 
OLD.pelapor_pekerjaan, 
OLD.pelapor_telepon, 
OLD.pelapor_kab, 
OLD.pelapor_kec, 
OLD.pelapor_desa, 
OLD.korban_nik, 
OLD.korban_nama, 
OLD.korban_jeniskelamin, 
OLD.korban_agama, 
OLD.korban_tempat, 
OLD.korban_tgl_lahir, 
OLD.korban_usia, 
OLD.korban_prop, 
OLD.korban_kab, 
OLD.korban_kec, 
OLD.korban_desa, 
OLD.korban_foto1, 
OLD.korban_foto2, 
OLD.korban_email, 
OLD.korban_telepon, 
OLD.korban_tglkejadian, 
OLD.pelaku_nama, 
OLD.pelaku_jenis_kelamin, 
OLD.pelaku_usia, 
OLD.pelaku_hubungan, 
OLD.pelaku_pendidikan, 
OLD.pelaku_alamat, 
OLD.pelaku_prop, 
OLD.pelaku_kab, 
OLD.pelaku_kec, 
OLD.pelaku_desa, 
OLD.pelaku_nik, 
OLD.lapor_anonim, 
OLD.lapor_rahasia, 
OLD.lapor_status, 
OLD.lapor_kategori, 
OLD.lapor_disposisi, 
OLD.lapor_klarifikasi, 
OLD.create_at, 
OLD.update_at, 
OLD.delete_at, 
OLD.user_id
);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tbl_ppa_berita_acara_log`
--

DROP TABLE IF EXISTS `tbl_ppa_berita_acara_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ppa_berita_acara_log` (
  `berita_acara_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `berita_acara_status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '1 pengajuan 2 sdg proses 3 selasai 4 tolak',
  `berita_acara_dihentikan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `berita_acara_kode` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'UUID',
  `berita_acara_tgl` date DEFAULT NULL,
  `berita_acara_hari` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `berita_acara_kronologi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `berita_acara_penerima_laporan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `berita_acara_kepala_uptd` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `berita_acara_keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `berita_acara_harapan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelapor_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelapor_tgl` date DEFAULT NULL COMMENT 'TANGGAL LAPORAN',
  `pelapor_tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_idusers` int DEFAULT NULL COMMENT 'ID PELAPOR DARI TBL_USER',
  `pelapor_nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_pekerjaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_telepon` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_kab` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_kec` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `pelapor_desa` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'DARI TBL PELAPOR',
  `korban_nik` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_jeniskelamin` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_agama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_tgl_lahir` date DEFAULT NULL,
  `korban_usia` int DEFAULT NULL,
  `korban_prop` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_kab` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_kec` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_desa` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_foto1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_foto2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_email` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_telepon` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `korban_tglkejadian` date DEFAULT NULL,
  `pelaku_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_jenis_kelamin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_usia` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_hubungan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_pendidikan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_prop` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_kab` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_kec` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_desa` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pelaku_nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lapor_anonim` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'ya',
  `lapor_rahasia` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'ya',
  `lapor_status` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'valid',
  `lapor_kategori` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'aduan',
  `lapor_disposisi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'lainya',
  `lapor_klarifikasi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '-',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `user_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`berita_acara_id`) USING BTREE,
  KEY `id` (`berita_acara_id`) USING BTREE,
  KEY `nik_pelapor` (`pelapor_nik`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_delete_tbl_ppa_beritaacara_log` AFTER DELETE ON `tbl_ppa_berita_acara_log` FOR EACH ROW BEGIN
INSERT INTO tbl_ppa_berita_acara(berita_acara_id, 
	berita_acara_status, 
	berita_acara_dihentikan, 
	berita_acara_kode, 
	berita_acara_tgl, 
	berita_acara_hari, 
	berita_acara_kronologi, 
	berita_acara_penerima_laporan, 
	berita_acara_kepala_uptd, 
	berita_acara_keterangan, 
	pelapor_nama, 
	pelapor_tgl, 
	pelapor_tempat, 
	pelapor_idusers, 
	pelapor_nik, 
	pelapor_pekerjaan, 
	pelapor_telepon, 
	pelapor_kab, 
	pelapor_kec, 
	pelapor_desa, 
	korban_nik, 
	korban_nama, 
	korban_jeniskelamin, 
	korban_agama, 
	korban_tempat, 
	korban_tgl_lahir, 
	korban_usia, 
	korban_prop, 
	korban_kab, 
	korban_kec, 
	korban_desa, 
	korban_foto1, 
	korban_foto2, 
	korban_email, 
	korban_telepon, 
	korban_tglkejadian, 
	pelaku_nama, 
	pelaku_jenis_kelamin, 
	pelaku_usia, 
	pelaku_hubungan, 
	pelaku_pendidikan, 
	pelaku_alamat, 
	pelaku_prop, 
	pelaku_kab, 
	pelaku_kec, 
	pelaku_desa, 
	pelaku_nik, 
	lapor_anonim, 
	lapor_rahasia, 
	lapor_status, 
	lapor_kategori, 
	lapor_disposisi, 
	lapor_klarifikasi, 
	create_at, 
	update_at, 
	delete_at, 
	user_id)
VALUES (OLD.berita_acara_id, 
OLD.berita_acara_status, 
OLD.berita_acara_dihentikan, 
OLD.berita_acara_kode, 
OLD.berita_acara_tgl, 
OLD.berita_acara_hari, 
OLD.berita_acara_kronologi, 
OLD.berita_acara_penerima_laporan, 
OLD.berita_acara_kepala_uptd, 
OLD.berita_acara_keterangan, 
OLD.pelapor_nama, 
OLD.pelapor_tgl, 
OLD.pelapor_tempat, 
OLD.pelapor_idusers, 
OLD.pelapor_nik, 
OLD.pelapor_pekerjaan, 
OLD.pelapor_telepon, 
OLD.pelapor_kab, 
OLD.pelapor_kec, 
OLD.pelapor_desa, 
OLD.korban_nik, 
OLD.korban_nama, 
OLD.korban_jeniskelamin, 
OLD.korban_agama, 
OLD.korban_tempat, 
OLD.korban_tgl_lahir, 
OLD.korban_usia, 
OLD.korban_prop, 
OLD.korban_kab, 
OLD.korban_kec, 
OLD.korban_desa, 
OLD.korban_foto1, 
OLD.korban_foto2, 
OLD.korban_email, 
OLD.korban_telepon, 
OLD.korban_tglkejadian, 
OLD.pelaku_nama, 
OLD.pelaku_jenis_kelamin, 
OLD.pelaku_usia, 
OLD.pelaku_hubungan, 
OLD.pelaku_pendidikan, 
OLD.pelaku_alamat, 
OLD.pelaku_prop, 
OLD.pelaku_kab, 
OLD.pelaku_kec, 
OLD.pelaku_desa, 
OLD.pelaku_nik, 
OLD.lapor_anonim, 
OLD.lapor_rahasia, 
OLD.lapor_status, 
OLD.lapor_kategori, 
OLD.lapor_disposisi, 
OLD.lapor_klarifikasi, 
OLD.create_at, 
OLD.update_at, 
OLD.delete_at, 
OLD.user_id
);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tbl_ppa_pendampingan`
--

DROP TABLE IF EXISTS `tbl_ppa_pendampingan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ppa_pendampingan` (
  `layanan_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'UUID BERITA ACARA',
  `kode_beritaacara` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `layanan_tgl` date DEFAULT NULL,
  `layanan_jenis` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `layanan_keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `layanan_rtl` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `layanan_progress` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `layanan_foto1` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `layanan_foto2` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `layanan_foto3` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tindak_lanjut1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tindak_lanjut2` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tindak_lanjut3` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `creat_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  `id_users` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`layanan_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_relaas`
--

DROP TABLE IF EXISTS `tbl_relaas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_relaas` (
  `id_relaas` int NOT NULL AUTO_INCREMENT COMMENT '** = itu ngunci kalo udah milih salah satu pak, misalkan milih yang penggugat dan tergugat.. jadi pemohon dan termohon ga bisa diisi, begitu juga sebaliknya\n\n\r\n',
  `nama_pihak` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT '* = Bisa dikosongkan pak kalo pilih salah satu, misalkan kalo yang hadir sidang terisi otomatis yang poin pemberitahuan isi putusan ga perlu diisi pak, begitu juga sebaliknya',
  `jenis_pihak` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pengadilan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `no_perkara` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal_hadir_sidang` date DEFAULT NULL,
  `tgl_pengumuman` date DEFAULT NULL,
  `tgl_pemberitahuan_putusan` date DEFAULT NULL COMMENT '\r\n',
  `berkas` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status_persidangan` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_relaas`) USING BTREE,
  KEY `id` (`id_relaas`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_setting`
--

DROP TABLE IF EXISTS `tbl_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_setting` (
  `id_setting` int NOT NULL AUTO_INCREMENT,
  `nama_setting` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `value` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_tahun`
--

DROP TABLE IF EXISTS `tbl_tahun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tahun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` year DEFAULT NULL,
  `status` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `id_users` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `full_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota_lahir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `images` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `id_user_level` int NOT NULL COMMENT '1 aktik \r\n0 tidak\r\n',
  `is_aktif` enum('y','n') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'ya atau tidak',
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_skpd` int DEFAULT NULL,
  `province_id` int DEFAULT NULL,
  `regency_id` int DEFAULT NULL,
  `district_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `village_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rw_id` char(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rt_id` char(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `verified_email` int DEFAULT NULL,
  `google_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `google_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `division_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pekerjaan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `penyandang_disabilitas` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamat_domisili` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `pihak_konfirmasi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email_konfirmasi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hp_konfirmasi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ket_laporan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_users`,`user_id`) USING BTREE,
  UNIQUE KEY `user_id` (`user_id`) USING BTREE,
  UNIQUE KEY `phone` (`phone`) USING BTREE,
  KEY `id_users` (`id_users`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10759 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_user_bak`
--

DROP TABLE IF EXISTS `tbl_user_bak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user_bak` (
  `id_users` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `full_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota_lahir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `images` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `id_user_level` int NOT NULL COMMENT '1 aktik \r\n0 tidak\r\n',
  `is_aktif` enum('y','n') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'ya atau tidak',
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_skpd` int DEFAULT NULL,
  `province_id` int DEFAULT NULL,
  `regency_id` int DEFAULT NULL,
  `district_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `village_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rw_id` char(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rt_id` char(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `verified_email` int DEFAULT NULL,
  `google_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `google_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `division_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pekerjaan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `penyandang_disabilitas` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamat_domisili` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `pihak_konfirmasi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email_konfirmasi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hp_konfirmasi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ket_laporan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_users`,`user_id`) USING BTREE,
  UNIQUE KEY `user_id` (`user_id`) USING BTREE,
  UNIQUE KEY `phone` (`phone`) USING BTREE,
  KEY `id_users` (`id_users`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1369 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_user_copy1`
--

DROP TABLE IF EXISTS `tbl_user_copy1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user_copy1` (
  `id_users` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `full_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota_lahir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `images` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `id_user_level` int NOT NULL COMMENT '1 aktik \r\n0 tidak\r\n',
  `is_aktif` enum('y','n') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'ya atau tidak',
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_skpd` int DEFAULT NULL,
  `province_id` int DEFAULT NULL,
  `regency_id` int DEFAULT NULL,
  `district_id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `village_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rw_id` char(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rt_id` char(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `verified_email` int DEFAULT NULL,
  `google_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `google_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `division_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pekerjaan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `penyandang_disabilitas` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamat_domisili` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `pihak_konfirmasi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email_konfirmasi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hp_konfirmasi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ket_laporan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_users`,`user_id`) USING BTREE,
  UNIQUE KEY `user_id` (`user_id`) USING BTREE,
  UNIQUE KEY `phone` (`phone`) USING BTREE,
  KEY `id_users` (`id_users`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1343 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_user_level`
--

DROP TABLE IF EXISTS `tbl_user_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user_level` (
  `id_user_level` int NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user_level`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `visit_time` datetime DEFAULT NULL,
  `verified_time` datetime DEFAULT NULL,
  `code` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gender` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `level` int DEFAULT '3',
  `division` int DEFAULT NULL,
  `division_sub` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'profile.png',
  `ipaddress` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `active` int DEFAULT NULL,
  `status` int DEFAULT '0',
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `province_id` int DEFAULT NULL,
  `regency_id` int DEFAULT NULL,
  `district_id` int DEFAULT NULL,
  `village_id` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rt_id` char(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rw_id` char(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `verified_email` int DEFAULT NULL,
  `google_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `google_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pekerjaan` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `penyandang_disabilitas` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamat_domisili` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pihak_konfirmasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email_pihak_konfirmasi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hp_konfirmasi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  KEY `nik` (`id_user`,`nik`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `visitor`
--

DROP TABLE IF EXISTS `visitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visitor` (
  `ip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hits` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `online` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-27 13:58:01
