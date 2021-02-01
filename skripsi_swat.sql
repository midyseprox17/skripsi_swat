-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 10:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_swat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_devisi`
--

CREATE TABLE `tbl_devisi` (
  `id` int(1) NOT NULL,
  `nama` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_devisi`
--

INSERT INTO `tbl_devisi` (`id`, `nama`) VALUES
(1, 'Security'),
(2, 'Cleaning Servic'),
(3, 'Parkir'),
(4, 'Back Office');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_klien`
--

CREATE TABLE `tbl_klien` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `penanggung_jawab` varchar(50) DEFAULT NULL,
  `email_penanggung_jawab` varchar(100) DEFAULT NULL,
  `dihapus` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_klien`
--

INSERT INTO `tbl_klien` (`id`, `nama`, `telp`, `alamat`, `penanggung_jawab`, `email_penanggung_jawab`, `dihapus`) VALUES
(0127, 'Cabang Bandung Ii', '225895681', 'Jl.Ters Kopo Katapang No. 177 RT. 001 RW. 006. Katapang. Katapang . Kab.Bandung', 'Huda Arifin', 'general.affair@yakult.co.id', '0'),
(0128, 'PT Citra Marga Lintas Jabar', '(022)54416367', 'Kantor PT Citra Marga Lintas Jabar Jl Muara No 1 RT 01 RW 11. Desa Kopo. Kec Kutawaringin Kab Bandung', 'Sani Septian Saesar', 'sanisaesar.cmlj@gmail.com', '0'),
(0129, 'PT. General Prima Inti Plastik', '227947428', 'Jl. Raya Cicalengka-Majalaya Km 4.5 No. 227 Desa. Mandalasari Kec. Cikancung Kab. Bandung 40396', 'Nieda Yulianti', 'niedayulianti1217@gmail.com', '0'),
(0130, 'PT. Moririn Living Indonesia', '022-7949502', 'Jl. Raya Cicalengka-Majalaya Km. 02 RT 001 RW 011 Tanjunglaya Cikancung. Kabupaten Bandung', 'Trie Jatiningsih', 'trie-jatiningsih@moririn-l.co.id', '0'),
(0131, 'Arunika Jaya Textile', '2242833411', 'Jl. Cisirung No. 101 RT. 001 RW. 002', 'Tuti Handayani', 'arunikajayatex@gmail.com', '0'),
(0132, 'PT. Sas Aero Sishan', '224265050', 'Bojong Koneng Atas Blok Utara Sekemerak RT.003. RW. 018. Kel. Cibeunying. Kec. Cimenyan. Kab. Bandung. Jawa Barat', 'Siti Hannah Padliyyah', 'siti.hannah@sas-aero.id', '0'),
(0133, 'PT. Machesa Multi Liftindo', '022-5892930', 'Komplen Taman Kopo Katapang Blok N-17 RT 004 RW 014 Desa/ Kel Pangauban Kec. Katapang', 'Ahmad Fauriyan', 'riyan.loginstore@gmail.com', '0'),
(0134, 'PT. Memohon Ridho Ilahi', '225940943', 'JL. LASWI NO. 71 BALEENDAH', 'Nur Hasanah', 'ptmemori.bdg@gmail.com', '0'),
(0135, 'PT. Grand Dwi Mandiri', '8113893351', 'Cimeunyeut HM 2083-2009 rt.0004 rw.012. Bojongsoang', 'Mecky Lesar', 'lesarmecky@suksesindo.com', '0'),
(0136, 'CV. Eka Gardatama Indonesia', '81220995514', 'Jl. Cempaka VI. No. 32. RT.08. RW.06. Kel. Rancaekek Kencana. Kab. Bandung', 'Muhammad Kevin Fabian', 'muhammadkevinfabian222@gmail.com', '0'),
(0137, 'PT. Asia Pratama Indonesia', '81289106368', 'CICALENGKA', 'Indra Effendi', 'indraeffendi92@yahoo.co.id', '0'),
(0138, 'PT. Triman', '227948371', 'Jl. Peundeuy KM 1 Kel. Bojongsalam Kec. Rancaekek Kab. Bandung', 'James Setia Darma Wangsaputra', 'admin@triman.co.id', '0'),
(0139, 'Miko - Miko Mall Kopo Bandung', '-', 'Milan Kopo Mall Bandung Jl. Raya Kopo No. 599 Lt. 1 Kel. Babakan Ciparay. Kota Bandung - Jawa Barat', 'Stefanny Christiana Tam', 'mrdiywlk@yahoo.com', '0'),
(0140, 'PT Modal Ventura Ycab (Baleendah)', '2284223408', 'Kp. Cihareuyheuy. Desa Padaulun. RT 3 RW 6. Kelurahan Padaulun. Kecamatan Majalaya. Kabupaten Bandung', 'Devyta Wijaya', 'devyta.wijaya@ycabventures.com', '0'),
(0141, 'PT.sinotex Jaya Indonesia', '022-87833422', 'JL.RAYA RANCAEKEK KM 2', 'Maya Puspitaningrum', 'sinotex.pt@yahoo.com', '0'),
(0142, 'PT.sinotex Jaya Indonesia', '022-87833422', 'JL.RAYA RANCAEKEK KM 2', 'Maya Puspitaningrum', 'sinotex.pt@yahoo.com', '0'),
(0143, 'Proven Force Indonesia', '22085937250', 'JL. RAA Wiranata Kusuma Hegar Asri Ruko No 04. Ds. Baleendah Kab. Bandung', 'Roesfini Damayanti', 'riski_rp2@yahoo.com', '0'),
(0144, 'PT. Sudong Metal Buttonindo', '022-5943884', 'JL. WAAS NO. 54 RT. 06/01 DS. SUKASARI KEC. PAMEUNGPEUK KAB. BANDUNG JAWA BARAT', 'Erlangga Pratama Putra', 'ptgongxinepc@gmail.com', '0'),
(0145, 'CV.bihbul Viktori Sablon', '022-5431354', 'JL.BIHBUL RAYA NO.69 RT11 RW02', 'Huan Shin', 'cv.bvs.milda@gmail.com', '0'),
(0146, 'Laboratorium Klinik Prodia Majalaya', '022-5954724', 'Jl. Rancaekek. Majalaya Ruko Maris Square Kav. 24 Majalaya', 'Masripah', 'masripah@prodia.co.id', '0'),
(0147, 'PT. Adhi Mitra Dinamika', '227831111', 'JL. AH NASUTION NO 73', 'Rustani', 'rustanie@yahoo.com', '0'),
(0148, 'Kbpr Bara Ujung Berung', '7811185', 'JL CILENGKRANG II NO 202', 'Juner Limbong.se', 'kbpr.bara@yahoo.com', '0'),
(0149, 'PT Rajawalibuana 86', '022-54413177', 'Komplek permata kopo blok b 76. margahayu Bandung', 'Erna Mulyani', 'ernamulyani1876@gmail.com', '0'),
(0150, 'PT. Seco Textile Indonesia', '2285962760', 'JL. SAPAN NO. 92 KP. LALAREUN RT. 03/03 KEL. RANCAKASUMBA KEC. SOLOKANJERUK', 'Agus Tri Heritanto', 'cs.mitrasuburbersama@gmail.com', '0'),
(0151, 'PT Indovon Pitaloka Perkasa', '227795929', 'JL. RAYA BANDUNG GARUT KM 23.8 RANCAEKEK KABUPATEN BANDUNG', 'Imelda Christina', 'imeldaindovon@gmail.com', '0'),
(0152, 'PT. Sabar Ganda - Bandung', '81324434100', 'Perumahan Linggahara. Jalan Sadang Blok B5 No. 56. Margahayu Bandung', 'Benny Suryadi Boang Manalu', 'bens.bm16@gmail.com', '0'),
(0153, 'CV Dua Kembar', '87886415575', 'Kp. Kiara Eunyeuh RT.01 RW.03 Banyusari Katapang Kabupaten Bandung', 'Ridwan', 'cv.duakembar@yahoo.com', '0'),
(0154, 'CV. Sumber Barokah', '85872344', 'KP.BOJONG RT.003/002 DESA SUKAMUKTI.KEC. KATAPANG. KAB. BANDUNG', 'Drs. Aripin', 'mabrurarifin@yahoo.com', '0'),
(0155, 'PT Tjoean Dharma Indonesia', '2285941506', 'Komp. Grand Bunga Lestari Blok B No 2A-4A rt 001 rw002', 'Triah Bulkiah', 'triahbulkiah@gmail.com', '0'),
(0156, 'PT Va-Vite Indonesia', '225959700', 'Kompleks Kaha Grup Jln. Raya Rancaekek Majalaya No. 389. Ds. Solokan Jeruk. Kec. Solokan Jeruk. Kabupaten Bandung', 'Temy Sumarwo', 'temysumarwo@vaviteindonesia.co.id', '0'),
(0157, 'PT. Jae Gyeong Tex', '81210116448', 'JALAN RAYA RANCAEKEK MAJALAYA NOMOR 389. Kel. Solokanjeruk. Kec. Solokanjeruk. Kab. Bandung. Prov. Jawa Barat', 'Agus Tri Heritanto', 'cs.mitrasuburbersama@gmail.com', '0'),
(0158, 'PT Abadi Nusantara Tirta', '8118082582', 'Jl. Siliwangi Cigado No.39 RT.003 RW.009 Kel. Baleendah Kec. Baleendah Kab. Bandung Jawa Barat', 'Marvin Yulio Vincentius', 'miyagi.hakeru@gmail.com', '0'),
(0159, 'PT. Perdagangan Dan Perindustrian Marga Sandang', '225203832', 'JL. RAYA DAYEUHKOLOT NO. 112 BANDUNG', 'Faizal Rukasah', 'marstexbdg@gmail.com', '0'),
(0160, 'PT Haleyora Powerindo Unit Banten', '227278420', 'JL. PHH MUSTOFA NO 45', 'Widya Sri Ariani', 'hpi.crbn@yahoo.co.id', '0'),
(0161, 'Indonesia Hfs Packaging', '81314428065', 'Jl. Raya Rancaekek-Majalaya No. 389. Komplek Industri Kahatex', 'Agus Tri Heritanto', 'cs.mitrasuburbersama@gmail.com', '0'),
(0162, 'PT Kartini Teh Nasional Cabang Bandung', '+62 821-4764-40', 'Jalan Sadang No.160A. Margahayu Kopo. Kabupaten Bandung.', 'Siska Nofianti', 'siska.fiantika@gmail.com', '0'),
(0163, 'Bdi Bandung Taman Kopo Indah Ii', '225405799', 'Komp. Taman Kopo Indah II. Ruko 1B No. 26 Bandung 40225 – INDONESIA', 'I Putu Agus Hari Wibowo', 'ipahw5873@gmail.com', '0'),
(0164, 'PT. Arsha Mandiri Utama', '85320008144', 'PERUM BUKIT ASRI CICALENGKA BLOK B2 NO 15 DESA MARGAASIH KEC. CICALENGKA BANDUNG 40395', 'Cecep Isniadi', 'felyafaradinasifa@gmail.com', '0'),
(0165, 'PT. G4S Security Services', '021 – 50846666', 'Jl. Terusan Kopo Raya No 641. Kel. Pangauban. Kec. Ketapang. Kab. Bandung', 'Immanuel Yulius S Soeiono', 'info.g4s.indonesia@gmail.com', '0'),
(0166, 'PT. Indogas Cipta Abadi', '0227796268 . 02', 'JL. Panyaungan RT. 01 RW. 03. Desa Cileunyi Wetan. Kecamatan Cileunyi. Kabupaten Bandung. Jawa Barat', 'Rimto Iskandar', 'indogasciptaabadi.pt@gmail.com', '0'),
(0167, 'PT.samudera Industri Cab.kopo', '225891405', 'JL.TERUSAN KOPO KM.11 NO.76 CILAMPENI KATAPANG BANDUNG', 'Amrizal Masri', 'hrd.samuderacikalong@gmail.com', '0'),
(0168, 'CV Master Laundry', '81212120291', 'KP. CIPANAS RT 04 RW 01 DESA CANGKUANG KECAMATAN RANCAEKEK KABUPATEN BANDUNG', 'Riska Supyansyah', 'laundrymaster0@gmail.com', '0'),
(0169, 'PT. Daya Prima Rasa', '2287301297', 'Komplek De Prima Terra Blok B2 No. 5 Desa Tegalluar Kec. Bojongsoang Kab. Bandung', 'Ia Kurnia.se', 'ia.kurnia9977@gmail.com', '0'),
(0170, 'PT. Hyojin Tex', '2285964862', 'Komplek Kaha Group Jl.Raya Rancaekek-Majalaya No.389 Kel.Solokanjeruk Kec.Solokanjeruk.Kabupaten Bandung', 'Dinah Marlinah', 'dinahmarlinah@gmail.com', '0'),
(0171, 'Megalia Global Mandiri', '81212120291', 'Komp. Ranca Indah RT 005 RW 004 Jelegong. Kec. Rancaekek. Kab. Bandung', 'Sandra Erwinsah', 'sandraerwinsah@rocketmail.com', '0'),
(0172, 'Bintang Fajar Transportindo', '2282068429', 'JL. RAYA LASWI NO. 48', 'Bekti Rika Lianawati', 'bektrika@gmail.com', '0'),
(0173, 'PT Agro Boga Utama (Bandung)', '2180681189', 'KAWASAN INDRUSTRI DEPRIMA TERRA BLOK E1 NO 12 A', 'Dani Darojat', 'didinruhidinmiptah@gmail.com', '0'),
(0174, 'Btpn Majalaya', '022 5951565', 'JL. STASION NO 14', 'Ricky Mochamad Nurzaman', 'agustamrin@gmail.com', '0'),
(0175, 'Panja Perkasa Gemilang', '81223125896', 'Jl. Taman Cibaduyut Indah Blok N 41 RT. 006 RW. 011', 'Francis Dina Kartantya', 'majumakmur136@gmail.com', '0'),
(0176, 'PT Semut Merah Squad-Sog14', '2254431520', 'Jl. Terusan Kopo 4 RT/RW 003/015 Kelurahan Margahayu Tengah Kecamatan Margahayu Kabupaten Bandung', 'Mirna', 'semutmerah.squad@yahoo.com', '0'),
(0177, '123', '123', '123123', '123', 'adadsasd@asd.com', '1'),
(0178, '123', '123', '123', '123', '123@fasd.sd', '1'),
(0179, 'abc', 'abc', 'abc', 'abc', 'abc@aca', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontrak`
--

CREATE TABLE `tbl_kontrak` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `klien_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `devisi_id` int(1) DEFAULT NULL,
  `jumlah_pegawai` int(3) DEFAULT NULL,
  `lama_kontrak` enum('3','6','9','12') DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` enum('belum','ditolak','disetujui','berjalan','selesai') DEFAULT NULL,
  `dihapus` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kontrak`
--

INSERT INTO `tbl_kontrak` (`id`, `klien_id`, `devisi_id`, `jumlah_pegawai`, `lama_kontrak`, `tgl_mulai`, `tgl_selesai`, `status`, `dihapus`) VALUES
(0020, 0127, 1, 3, '3', '2020-01-01', '2020-04-01', 'selesai', '0'),
(0021, 0129, 1, 5, '6', '2020-01-17', '2020-07-17', 'selesai', '0'),
(0022, 0130, 2, 2, '3', '2020-12-08', '2021-03-08', 'selesai', '0'),
(0023, 0127, 1, 3, '3', '2021-01-21', '2021-04-21', 'disetujui', '0'),
(0024, 0127, 2, 2, '3', '2021-01-12', '2021-04-12', 'selesai', '0'),
(0025, 0128, 1, 3, '3', '2020-01-01', '2020-04-01', 'selesai', '0'),
(0026, 0146, 1, 3, '3', '2021-01-01', '2021-04-01', 'berjalan', '0'),
(0027, 0144, 1, 3, '6', '1990-01-01', '1990-07-01', 'selesai', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontrak_kriteria`
--

CREATE TABLE `tbl_kontrak_kriteria` (
  `kontrak_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `kriteria` varchar(50) DEFAULT NULL,
  `bobot` int(5) DEFAULT NULL,
  `keterangan` enum('cost','benefit') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kontrak_kriteria`
--

INSERT INTO `tbl_kontrak_kriteria` (`kontrak_id`, `kriteria`, `bobot`, `keterangan`) VALUES
(NULL, 'umur', 4, 'cost'),
(NULL, 'tinggi', 3, 'benefit'),
(NULL, 'pengalaman', 2, 'benefit'),
(NULL, 'umur', 2, 'cost'),
(NULL, 'tinggi', 3, 'benefit'),
(NULL, 'pengalaman', 4, 'benefit'),
(NULL, 'pendidikan_terakhir', 5, 'benefit'),
(NULL, 'tinggi', 3, 'benefit'),
(0020, 'jenis_kelamin', 10, 'cost'),
(0020, 'tinggi', 3, 'benefit'),
(0021, 'umur', 3, 'cost'),
(0021, 'tinggi', 1, 'benefit'),
(0021, 'pengalaman', 2, 'benefit'),
(0022, 'tinggi', 80, 'benefit'),
(0022, 'jenis_kelamin', 70, 'benefit'),
(0022, 'pengalaman', 60, 'benefit'),
(0023, 'umur', 80, 'cost'),
(0023, 'pendidikan_terakhir', 70, 'benefit'),
(0023, 'sertifikat', 60, 'benefit'),
(0024, 'tinggi', 80, 'cost'),
(0024, 'umur', 70, 'cost'),
(0025, 'jenis_kelamin', 80, 'benefit'),
(0025, 'tinggi', 70, 'cost'),
(0026, 'tinggi', 80, 'cost'),
(0026, 'pendidikan_terakhir', 70, 'benefit'),
(0026, 'umur', 60, 'cost'),
(0027, 'tinggi', 80, 'cost'),
(0027, 'pengalaman', 70, 'cost'),
(0027, 'jenis_kelamin', 60, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `nik` char(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_kk` varchar(20) DEFAULT NULL,
  `no_bpjs_ketenagakerjaan` varchar(20) DEFAULT NULL,
  `no_bpjs_kesehatan` varchar(20) DEFAULT NULL,
  `kelas_bpjs` varchar(10) DEFAULT NULL,
  `no_npwp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `no_rek` varchar(20) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `devisi_id` int(1) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('0','1') DEFAULT NULL,
  `tinggi` int(3) DEFAULT NULL,
  `pendidikan_terakhir` enum('1','2','3','4','5','6','7','8') DEFAULT NULL,
  `sertifikat` enum('1','0') DEFAULT NULL,
  `pengalaman` int(3) DEFAULT NULL,
  `hijab` enum('0','1') DEFAULT NULL,
  `menikah` enum('1','0') DEFAULT NULL,
  `dalam_kontrak` enum('0','1') DEFAULT NULL,
  `dihapus` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`nik`, `nama`, `no_kk`, `no_bpjs_ketenagakerjaan`, `no_bpjs_kesehatan`, `kelas_bpjs`, `no_npwp`, `alamat`, `telp`, `email`, `bank`, `no_rek`, `tgl_masuk`, `devisi_id`, `tgl_lahir`, `jenis_kelamin`, `tinggi`, `pendidikan_terakhir`, `sertifikat`, `pengalaman`, `hijab`, `menikah`, `dalam_kontrak`, `dihapus`) VALUES
('10120001', 'HADI KUSNADI', NULL, '3273260000000000', '', '', '', 'cijambe wetan rt-rw : 02-10, cigendung', '', '', '', '', '2020-01-01', 2, '1975-02-22', '1', 161, '3', '0', 9, '0', '0', '0', '0'),
('10120002', 'DANI HARYANTO', NULL, '3205200000000000', '', '', '', 'kp. Andir rt-rw : 04-01, tambakbaya', '', '', '', '', '2020-01-01', 2, '1988-11-25', '1', 165, '2', '0', 0, '0', '1', '0', '0'),
('10120003', 'YAYAN SUPRIATNA', NULL, '3273260000000000', '', '', '', 'haruman sari rt-rw : 05-07, cigending', '', '', '', '', '2020-01-01', 2, '1966-01-29', '1', 166, '3', '0', 5, '0', '1', '0', '0'),
('10120004', 'IUS YULISWARA', NULL, '3207160000000000', '', '', '', 'dusun babakan rt-rw : 01-12, kaso', '', '', '', '', '2020-01-01', 2, '1989-01-03', '1', 158, '2', '0', 35, '0', '1', '0', '0'),
('10120005', 'MARYADI', NULL, '3214110000000000', '', '', '', 'cidurian utara rt-rw : 05-09, sukapura', '', '', '', '', '2020-01-01', 2, '1974-07-13', '1', 163, '3', '0', 31, '0', '0', '0', '0'),
('10120006', 'AGUS RODIANSYAH', NULL, '3273120000000000', '', '', '', 'h. basuki no. 3 rt-rw : 07-10, binong', '', '', '', '', '2020-01-01', 2, '1988-08-10', '1', 167, '3', '0', 19, '0', '1', '0', '0'),
('10120007', 'NUR ACHMAD', NULL, '3273030000000000', '', '', '', 'pasirkoja rt-rw : 02-05, sukahaji', '', '', '', '', '2020-01-01', 2, '1983-04-14', '1', 164, '3', '0', 33, '0', '0', '0', '0'),
('10120008', 'MUMUH MUHIDIN', NULL, '3204050000000000', '', '', '', 'kp.Sekejengkol kulon rt-rw:05-02,cileunyi kulon', '', '', '', '', '2020-01-01', 2, '1975-05-27', '1', 163, '2', '0', 29, '0', '0', '0', '0'),
('10120009', 'AGUS SUGIANTO', NULL, '3210120000000000', '', '', '', 'kp. Ciluncat rt-rw : 05-03, tegal sumedang', '', '', '', '', '2020-01-01', 2, '1981-09-26', '1', 170, '3', '0', 18, '0', '1', '0', '0'),
('10120010', 'ASEP SUHENDAR', NULL, '3273240000000000', '', '', '', 'parakan saat II rt-rw : 01-09, cisaranten endah', '', '', '', '', '2020-01-01', 2, '1987-11-15', '1', 167, '3', '0', 26, '0', '1', '0', '0'),
('10120011', 'WAWAN RAWAN', NULL, '3207160000000000', '', '', '', 'dusun cibodas rt-rw : 04-03, karangpaningal', '', '', '', '', '2020-01-01', 2, '1989-03-06', '1', 169, '3', '0', 26, '0', '0', '0', '0'),
('10120012', 'YUDI SUPRIADI', NULL, '3273250000000000', '', '', '', 'mekarsari rt-rw : 02-01, palasari', '', '', '', '', '2020-01-01', 2, '1977-05-22', '1', 163, '3', '0', 0, '0', '0', '0', '0'),
('10120013', 'DWI WAHYU KRISTANTO', NULL, '3273120000000000', '', '', '', 'kebon gedang III rt-rw : 02-12, maleer', '', '', '', '', '2020-01-01', 2, '1983-04-01', '1', 160, '3', '0', 0, '0', '0', '0', '0'),
('10120014', 'DJAENUDIN', NULL, '3273120000000000', '', '', '', 'binong tengah rt-rw ; 03-02, binong', '', '', '', '', '2020-01-01', 2, '1969-12-25', '1', 166, '3', '0', 35, '0', '0', '0', '0'),
('10120015', 'MUHAMAD RAMDAN', NULL, '3273120000000000', '', '', '', 'kebon gedang v rt-rw : 06-07, maleer', '', '', '', '', '2020-01-01', 2, '1981-07-27', '1', 162, '3', '0', 24, '0', '1', '0', '0'),
('10120016', 'IMAN', NULL, '3204050000000000', '', '', '', 'kp kara rt-rw : 03-02, cileunyi wetan', '', '', '', '', '2020-01-01', 2, '1982-03-27', '1', 158, '3', '0', 16, '0', '0', '0', '0'),
('10120017', 'MUHAMAD SUHANI', NULL, '3273260000000000', '', '', '', 'cijambe rt-rw : 05-06, pasir endah', '', '', '', '', '2020-01-01', 2, '1968-06-17', '1', 162, '3', '0', 23, '0', '1', '0', '0'),
('10120018', 'IMAM DERMAWAN', NULL, '3204320000000000', '', '', '', 'kp bukit mulya rt-rw : 08-08, manggahang', '', '', '', '', '2020-01-01', 2, '1973-03-30', '1', 161, '2', '0', 17, '0', '1', '0', '0'),
('10120019', 'TENIARSYAH RIZKIKA', NULL, '3204320000000000', '', '', '', 'kp. Cijagra rt-rw : 01-11, cilampeni', '', '', '', '', '2020-01-01', 2, '1991-11-23', '1', 164, '2', '0', 24, '0', '1', '0', '0'),
('10120020', 'MOCH. ZAENAL ARIFIN', NULL, '3273140000000000', '', '', '', 'kp. Cipondoh girang rt-rw : 04-12, cinunuk', '', '', '', '', '2020-01-01', 2, '1987-04-22', '1', 165, '2', '0', 13, '0', '0', '0', '0'),
('10120021', 'DEPI SETIAWAN ', NULL, '3273230000000000', '', '', '', 'rancacili rt-rw : 06-02, mekarjaya', '', '', '', '', '2020-01-01', 2, '1983-06-05', '1', 171, '2', '0', 3, '0', '0', '0', '0'),
('10120022', 'REZA HERMAWANTO', NULL, '3273250000000000', '', '', '', 'cisurupan rt-rw : 01-03, cisurupan', '', '', '', '', '2020-01-01', 2, '1987-08-12', '1', 170, '3', '0', 13, '0', '0', '0', '0'),
('10120023', 'KURNIA', NULL, '3204050000000000', '', '', '', 'kp. Sindang wargi rt-rw : 04-18,cileunyi wetan', '', '', '', '', '2020-01-01', 2, '1988-03-19', '1', 165, '3', '0', 10, '0', '0', '0', '0'),
('10120024', 'MAULANA BUKHORIMUSLIM', NULL, '3204050000000000', '', '', '', 'kp. Kara rt-rw : 04-02, cileunyi wetan', '', '', '', '', '2020-01-01', 2, '1994-09-23', '1', 165, '3', '0', 1, '0', '0', '0', '0'),
('10120025', 'KUSWANTO', NULL, '3210070000000000', '', '', '', 'emen slamet rt-rw : 04-08, Majalengka kulon', '', '', '', '', '2020-01-01', 2, '1984-08-05', '1', 168, '3', '0', 4, '0', '0', '0', '0'),
('10120026', 'YOSEP KURNIA', NULL, '3273120000000000', '', '', '', 'binong tengah rt-rw ; 01-02, binong', '', '', '', '', '2020-01-01', 2, '1981-11-02', '1', 171, '2', '0', 17, '0', '0', '0', '0'),
('10120027', 'RONY ERMAYA', NULL, '3273160000000000', '', '', '', 'sukamanah rt-rw : 05-13, sukapura', '', '', '', '', '2020-01-01', 2, '1981-10-15', '1', 163, '2', '0', 22, '0', '0', '0', '0'),
('10120028', 'ASEP SUSANTO', NULL, '3217090000000000', '', '', '', 'kp. Resmigalih rt-rw : 02-01, batujajar timur', '', '', '', '', '2020-01-01', 2, '1968-10-27', '1', 162, '2', '0', 6, '0', '0', '0', '0'),
('10120029', 'UJANG OTANG', NULL, '3204050000000000', '', '', '', 'kp. Panyawungan rt-rw : 03-03, cileunyi wetan', '', '', '', '', '2020-01-01', 2, '1982-06-26', '1', 162, '2', '0', 33, '0', '1', '0', '0'),
('10120030', 'RUSYAWAN', NULL, '3273140000000000', '', '', '', 'lemahneundeut rt-rw : 08-07, cikutha', '', '', '', '', '2020-01-01', 2, '1971-05-10', '1', 165, '2', '0', 15, '0', '1', '0', '0'),
('10120031', 'NANDI SAEPUDIN', NULL, '3204080000000000', '', '', '', 'kp. Cijagra rt-rw : 04-09, bojongsoang', '', '', '', '', '2020-01-01', 2, '1995-07-15', '1', 161, '3', '0', 4, '0', '1', '0', '0'),
('10120032', 'ASEP IWAN', NULL, '3273120000000000', '', '', '', 'cibangkong rt-rw : 07-07, cibangkong', '', '', '', '', '2020-01-01', 2, '1970-08-30', '1', 166, '2', '0', 32, '0', '1', '0', '0'),
('10120033', 'AJANG SETIAWAN', NULL, '3205040000000000', '', '', '', 'kp. Gadog rt-rw : 02-07, sirnajaya', '', '', '', '', '2020-01-01', 2, '0000-00-00', '1', 172, '3', '0', 24, '0', '0', '1', '0'),
('10120034', 'ALDIA NURIANA', NULL, '3277010000000000', '', '', '', 'kp. Ranca cangkuang,04-01 cibeber, cimahi selatan', '', '', '', '', '2020-01-01', 2, '1996-08-23', '1', 166, '3', '0', 24, '0', '1', '0', '0'),
('10120036', 'AGUNG NUGRAHA', NULL, '3273140000000000', '', '', '', 'jl. Babakan baru no 88 rt-rw : 05-07, cibeunying', '', '', '', '', '2020-01-01', 1, '1987-03-01', '1', 159, '2', '0', 32, '0', '1', '0', '0'),
('10120037', 'ROBI ', NULL, '3204320000000000', '', '', '', 'Kp. Mekarsari rt-rw : 01-27, Baleendah', '', '', '', '', '2020-01-01', 1, '1990-01-17', '1', 167, '3', '1', 11, '0', '0', '0', '0'),
('10120038', 'ECEP IRPAN SOLIHIN ', NULL, '3204320000000000', '', '', '', 'Kp. Cipicung rt-rw : 04-01, Baleendah', '', '', '', '', '2020-01-01', 1, '1985-07-16', '1', 169, '2', '1', 13, '0', '0', '0', '0'),
('10120039', 'JEJEN JUNAEDI', NULL, '3204270000000000', '', '', '', 'Kp. Bababkan Sukajadi rt-rw : 04-10, Tanjunglaya', '', '', '', '', '2020-01-01', 1, '1989-12-30', '1', 161, '4', '1', 30, '0', '0', '1', '0'),
('10120040', 'AGUNG AHMAD GINANJAR', NULL, '3211110000000000', '', '', '', 'Dusun Lanjung rt-rw : 01-06, Tanjungsari', '', '', '', '', '2020-01-01', 1, '1995-05-14', '1', 167, '3', '1', 27, '0', '1', '0', '0'),
('10120041', 'AGUNG SUPRIATNA', NULL, '3204050000000000', '', '', '', 'Kp. Nyalindung rt-rw : 04-09, Cileunyi Wetan', '', '', '', '', '2020-01-01', 1, '1997-05-03', '1', 169, '3', '0', 32, '0', '0', '0', '0'),
('10120042', 'DUDUNG MULYADI', NULL, '3211140000000000', '', '', '', 'Dusun Cibabe rt-rw : 01-04, Sindanggalih', '', '', '', '', '2020-01-01', 1, '1977-02-05', '1', 170, '2', '1', 34, '0', '0', '0', '0'),
('10120043', 'MARYONO', NULL, '3273300000000000', '', '', '', 'Kp. Sinom rt-rw : 04-13, Jatihandap', '', '', '', '', '2020-01-01', 1, '1972-10-20', '1', 167, '3', '1', 16, '0', '0', '0', '0'),
('10120044', 'KOKOM PATIMAH', NULL, '3277010000000000', '', '', '', 'Jl. Cijerah 2 blok 14 rt-rw : 01-20, Melong', '', '', '', '', '2020-01-01', 1, '1969-07-03', '0', 169, '2', '1', 36, '1', '0', '0', '0'),
('10120045', 'ENDO SUHENDA', NULL, '3210070000000000', '', '', '', 'Jl. Emen slamet rt-rw : 04-08, Majalengka kulon', '', '', '', '', '2020-01-01', 1, '1967-05-03', '1', 167, '2', '1', 33, '0', '0', '0', '0'),
('10120046', 'HERI SUHERI', NULL, '3204160000000000', '', '', '', 'Kp. Cilaja rt-rw : 03-05, Bojongmanggu', '', '', '', '', '2020-01-01', 1, '1972-01-06', '1', 169, '3', '1', 10, '0', '0', '0', '0'),
('10120047', 'YANYAN HERDIANA ', NULL, '3211110000000000', '', '', '', 'Dusun Gudang rt-rw : 01-04, Tanjungsari', '', '', '', '', '2020-01-01', 1, '1981-07-26', '1', 165, '3', '1', 25, '0', '0', '0', '0'),
('10120048', 'TONI RAMDANI', NULL, '3204280000000000', '', '', '', 'Kp. Bantarsari rt-rw : 04-10, Cangkuang', '', '', '', '', '2020-01-01', 1, '1985-05-03', '1', 172, '3', '1', 10, '0', '0', '0', '0'),
('10120049', 'SAEPUDIN', NULL, '3204250000000000', '', '', '', 'Griya Inti babakan peuteuy rt-rw : 04-10', '', '', '', '', '2020-01-01', 1, '1991-01-03', '1', 158, '3', '1', 34, '0', '0', '0', '0'),
('10120050', 'ROHANA', NULL, '3273230000000000', '', '', '', 'Jl. Keadilan 1 rt-rw : 01-09, Derwati', '', '', '', '', '2020-01-01', 1, '1967-10-25', '1', 166, '2', '1', 34, '0', '0', '0', '0'),
('10120051', 'TARDI', NULL, '3277010000000000', '', '', '', 'Jl. Gempolsari rt-rw : 03-01, Gempol Sari', '', '', '', '', '2020-01-01', 1, '1979-11-11', '1', 165, '3', '0', 15, '0', '1', '0', '0'),
('10120052', 'YOGI PERMANA', NULL, '3204320000000000', '', '', '', 'Kp. Bukitmulya rt-rw : 06-08, Manggahang', '', '', '', '', '2020-01-01', 1, '1996-06-11', '1', 171, '2', '1', 33, '0', '0', '0', '0'),
('10120053', 'AHMAD WAHYONO', NULL, '3204250000000000', '', '', '', 'Kp. Nurkam rt-rw : 02-12, Margaasih', '', '', '', '', '2020-01-01', 1, '1990-07-03', '1', 167, '2', '1', 3, '0', '1', '0', '0'),
('10120054', 'JUHANA', NULL, '3204270000000000', '', '', '', 'Kp. Babakan sukajadi r-rw : 04-10, Tanjunglaya', '', '', '', '', '2020-01-01', 1, '1965-07-01', '1', 158, '2', '0', 31, '0', '0', '0', '0'),
('10120055', 'AHMAD NURDIN', NULL, '3204110000000000', '', '', '', 'Kp. Cikambuy tengah rt-rw : 04-08, Sangkanhurip', '', '', '', '', '2020-01-01', 1, '1969-02-13', '1', 168, '3', '0', 4, '0', '0', '0', '0'),
('10120056', 'HADI ASFAR', NULL, '3273260000000000', '', '', '', 'Cijambe no.10 rt-rw : 03-10, Cigending', '', '', '', '', '2020-01-01', 1, '1970-04-05', '1', 162, '3', '0', 9, '0', '1', '0', '0'),
('10120057', 'RAHAYU MULYAWAN', NULL, '3273240000000000', '', '', '', 'Bojongawi kaler rt-rw : 01-03, Cisaranten Bina Harapan', '', '', '', '', '2020-01-01', 1, '1977-10-18', '0', 173, '3', '1', 15, '0', '1', '0', '0'),
('10120058', 'FITIAN KU3NA', NULL, '3211110000000000', '', '', '', 'Dsn. Lanjung rt-rw : 05-01, Tanjungsari', '', '', '', '', '2020-01-01', 1, '1994-03-13', '1', 158, '3', '0', 14, '0', '1', '0', '0'),
('10120059', 'ANWAR CUARNA', NULL, '3211110000000000', '', '', '', 'Dsn. Ciluluk rt-rw : 01-13, Margajaya', '', '', '', '', '2020-01-01', 1, '1996-02-06', '1', 162, '3', '0', 0, '0', '1', '0', '0'),
('10120060', 'ALDI NUGRAHA', NULL, '3211110000000000', '', '', '', 'Dsn. Lanjung rt-rw : 01-06, Tanjungsari', '', '', '', '', '2020-01-01', 1, '1994-05-19', '1', 173, '3', '1', 16, '0', '0', '0', '0'),
('10120061', 'NANDANG', NULL, '3273260000000000', '', '', '', 'Cijalupang no. 69 rt-rw : 02-01, Pasir Endah', '', '', '', '', '2020-01-01', 1, '1973-12-21', '1', 168, '3', '0', 13, '0', '0', '0', '0'),
('10120062', 'DEDEN RIDWAN', NULL, '3217080000000000', '', '', '', 'Kp. Laksanamekar rt-rw : 02-05, Laksanamekar', '', '', '', '', '2020-01-01', 1, '1983-07-25', '1', 165, '3', '0', 10, '0', '0', '0', '0'),
('10120063', 'ANGGA EKA RUKMANA', NULL, '3273060000000000', '', '', '', 'Jl. Gunung Batu rt-rw : 05-09, Sukaraja', '', '', '', '', '2020-01-01', 1, '1994-01-13', '1', 172, '3', '1', 26, '0', '0', '0', '0'),
('10120064', 'SESEP PERMANA', NULL, '3217150000000000', '', '', '', 'Kp. Cicariu rt-rw : 02-14, Sirnajaya', '', '', '', '', '2020-01-01', 1, '1995-12-12', '1', 160, '2', '0', 20, '0', '0', '0', '0'),
('10120065', 'ADI PERMADI', NULL, '3217080000000000', '', '', '', 'Laksana Mekar rt-rw : 02-05, Laksanamekar', '', '', '', '', '2020-01-01', 1, '1987-07-31', '1', 163, '3', '1', 24, '0', '0', '0', '0'),
('10120066', 'DEDE SULAEMAN', NULL, '3217090000000000', '', '', '', 'Kp. Galanggang rt-rw : 05-12, Galanggang', '', '', '', '', '2020-01-01', 1, '1968-04-13', '1', 171, '3', '0', 21, '0', '0', '0', '0'),
('10120067', 'AMAR UDAYA', NULL, '3204340000000000', '', '', '', 'Kp. Solokan Garut rt-rw : 02-05, Solokanjeruk', '', '', '', '', '2020-01-01', 1, '1977-07-11', '1', 172, '2', '0', 19, '0', '0', '0', '0'),
('10120068', 'EGO SURYANA PUTRA', NULL, '3204340000000000', '', '', '', 'Solokan Garut rt-rw : 04-05 Solokanjeruk', '', '', '', '', '2020-01-01', 1, '1978-07-17', '1', 172, '2', '1', 28, '0', '1', '0', '0'),
('10120069', 'AHMAD HAERUDIN', NULL, '3204340000000000', '', '', '', 'Kp. Solokan Garut rt-rw : 02-05, Solokanjeruk', '', '', '', '', '2020-01-01', 1, '1972-01-01', '1', 159, '3', '1', 27, '0', '1', '0', '0'),
('10120070', 'DADANG SUHERMAN', NULL, '3204340000000000', '', '', '', 'Kp. Solokan Garut rt-rw : 04-05, Solokanjeruk', '', '', '', '', '2020-01-01', 1, '1970-10-10', '1', 159, '3', '0', 24, '0', '1', '0', '0'),
('10120071', 'YAYA MULYANA', NULL, '3204340000000000', '', '', '', 'Kp. Solokan Garut rt-rw : 04-05, Solokanjeruk', '', '', '', '', '2020-01-01', 1, '1967-08-02', '1', 158, '3', '0', 9, '0', '1', '0', '0'),
('10120072', 'BUDIYANTO', NULL, '3204280000000000', '', '', '', 'Babakan Inpres rt-rw : 01-14, Cangkuang', '', '', '', '', '2020-01-01', 1, '1978-03-22', '1', 162, '2', '1', 14, '0', '0', '0', '0'),
('10120073', 'DIAN SUGRIWAN', NULL, '3204280000000000', '', '', '', 'Kp. Cikuya rt-rw : 02-01, Cikuya', '', '', '', '', '2020-01-01', 1, '1983-04-16', '1', 166, '2', '1', 15, '0', '1', '0', '0'),
('10120074', 'FIKRY BAYU ISLAMI', NULL, '3204280000000000', '', '', '', 'Kp. Bojong Peundeuy rt-rw : 01-06, Cangkuang', '', '', '', '', '2020-01-01', 1, '1999-05-14', '1', 173, '3', '0', 24, '0', '0', '0', '0'),
('10120075', 'DADAN SETIAWAN', NULL, '3204250000000000', '', '', '', 'Kp. Ciayunan rt-rw : 02-06, Cicalengka Wetan', '', '', '', '', '2020-01-01', 1, '1977-05-03', '1', 170, '2', '0', 10, '0', '0', '0', '0'),
('10120076', 'DEDI HERI CAHYADI', NULL, '3204280000000000', '', '', '', 'Kp. Kekencehan rt-rw : 02-01, Cangkuang', '', '', '', '', '2020-01-01', 1, '1969-10-22', '1', 165, '3', '0', 2, '0', '1', '0', '0'),
('10120077', 'SOPANDI', NULL, '3211140000000000', '', '', '', 'Dsn. Cimande rt-rw : 02-11, Sindangpakuon', '', '', '', '', '2020-01-01', 1, '1983-10-10', '1', 173, '3', '0', 1, '0', '0', '0', '0'),
('10120078', 'HENDRA', NULL, '3204320000000000', '', '', '', 'Kp. Bukit mulya rt-rw : 10-08, Manggahang', '', '', '', '', '2020-01-01', 1, '1978-08-03', '1', 158, '3', '1', 0, '0', '0', '0', '0'),
('10120079', 'INDRA GUNAWAN NUJAYA', NULL, '3211140000000000', '', '', '', 'Dsn. Cimande rt-rw : 03-11, Sindangpakuon', '', '', '', '', '2020-01-01', 1, '1981-06-24', '1', 166, '3', '0', 25, '0', '1', '0', '0'),
('10120080', 'HAFID NURJAMAN', NULL, '3204280000000000', '', '', '', 'Kp. Sawo Nunggal rt-rw : 01-01, Cangkuang', '', '', '', '', '2020-01-01', 1, '1997-03-18', '1', 164, '3', '0', 31, '0', '1', '0', '0'),
('10120081', 'MAULANA IHSANUDIN ', NULL, '3204280000000000', '', '', '', 'Kekencehan rt-rw : 02-01, Cangkuang', '', '', '', '', '2020-01-01', 1, '1983-08-05', '1', 169, '3', '0', 15, '0', '1', '0', '0'),
('10120082', 'ASEP M. SUDIRMAN', NULL, '3204280000000000', '', '', '', 'Kekencehan rt-rw : 02-01, Cangkuang', '', '', '', '', '2020-01-01', 1, '1962-03-15', '1', 173, '3', '1', 30, '0', '1', '0', '0'),
('10120083', 'MEMED MUHAMAD', NULL, '3204280000000000', '', '', '', 'Kp. Bojong Peundeuy rt-rw : 02-06, Cangkuang', '', '', '', '', '2020-01-01', 1, '1960-10-28', '1', 165, '3', '1', 18, '0', '1', '0', '0'),
('10120084', 'OTANG', NULL, '3204280000000000', '', '', '', 'Kp. Kekecehan rt-rw : 03-01, Cangkuang', '', '', '', '', '2020-01-01', 1, '1971-04-15', '1', 158, '2', '1', 28, '0', '1', '0', '0'),
('10120085', 'DENNY RAHMAN', NULL, '3204280000000000', '', '', '', 'Kekencehan rt-rw : 02-01, Cangkuang', '', '', '', '', '2020-01-01', 1, '1976-04-17', '1', 162, '3', '1', 16, '0', '0', '0', '0'),
('10120086', 'AHMAD I3IL', NULL, '3205220000000000', '', '', '', 'Kp. Pedes rt-rw : 02-07, Jayawaras', '', '', '', '', '2020-01-01', 1, '1996-06-09', '1', 171, '2', '0', 31, '0', '1', '0', '0'),
('10120087', 'CECEP YUSUP RAMDANI', NULL, '3204250000000000', '', '', '', 'Kp. Miji rt-rw : 02-04, Tanjunglaya', '', '', '', '', '2020-01-01', 1, '1988-05-15', '1', 167, '3', '1', 30, '0', '0', '0', '0'),
('10120088', 'DADAN WAHIDIN', NULL, '3211140000000000', '', '', '', 'Kp. Cangkuang rt-rw : 02-14, Cangkuang', '', '', '', '', '2020-01-01', 1, '1979-12-08', '1', 170, '3', '1', 21, '0', '1', '0', '0'),
('10120089', 'YUSUF KURNIA', NULL, '3204320000000000', '', '', '', 'kp. Neglasari rt-rw : 08-10,manggahang', '', '', '', '', '2020-01-01', 1, '1977-06-04', '1', 171, '3', '1', 27, '0', '0', '0', '0'),
('10120090', 'AGUS ROHENDI', NULL, '3204280000000000', '', '', '', 'kp. Babakan inpres rt-rw : 03-05, rancaekek', '', '', '', '', '2020-01-01', 1, '1984-03-07', '1', 168, '3', '1', 17, '0', '0', '0', '0'),
('10120091', 'UUS KADARU3N', NULL, '3204050000000000', '', '', '', 'kp. Kekencehan rt-rw : 04-01, cangkuang', '', '', '', '', '2020-01-01', 1, '1968-11-17', '1', 170, '3', '0', 3, '0', '1', '0', '0'),
('10120092', 'RONY SUPRIYADI', NULL, '3216080000000000', '', '', '', 'jl. Karang tineung indah gg.cemapak, 04-01,sukajadi', '', '', '', '', '2020-01-01', 1, '1979-03-28', '1', 159, '3', '1', 30, '0', '1', '0', '0'),
('10120093', 'GUNTUR GUSTIAN', NULL, '3217100000000000', '', '', '', 'kp. Gunung dukuh, 02-03, cipatik', '', '', '', '', '2020-01-01', 1, '1996-06-15', '1', 165, '3', '0', 3, '0', '1', '0', '0'),
('10120094', 'DADANG KURNIA', NULL, '3205130000000000', '', '', '', 'kp. Cilingga, 01-06, desa nanjung jaya', '', '', '', '', '2020-01-01', 1, '1996-11-14', '1', 163, '3', '1', 1, '0', '0', '0', '0'),
('10120095', 'ANDRI HIDAYAT', NULL, '3211140000000000', '', '', '', 'dsn. Bunter, 05-03, ds sukadana', '', '', '', '', '2020-01-01', 1, '1986-10-28', '1', 168, '3', '1', 8, '0', '0', '0', '0'),
('10120098', 'GUGUM GUMILAR', NULL, '3211200000000000', '', '', '', 'Dsn. Cipeureu rt-rw : 04-01, Awilega', '', '', '', '', '2020-01-01', 1, '1994-12-28', '1', 165, '3', '0', 25, '0', '0', '0', '0'),
('10120099', 'LILI SUPARLI', NULL, '3273300000000000', '', '', '', 'Jl. Pasir Impun rt-rw : 03-01, Pasir Impun', '', '', '', '', '2020-01-01', 1, '1970-01-03', '1', 168, '', '0', 30, '0', '0', '0', '0'),
('10120100', 'DENI SURYADI', NULL, '3273260000000000', '', '', '', 'Cijalupang rt-rw : 02-01, Pasir Endah', '', '', '', '', '2020-01-01', 1, '1983-03-14', '1', 165, '2', '1', 21, '0', '0', '0', '0'),
('10120101', 'RAUFIK MULYANA', NULL, '3278010000000000', '', '', '', 'Dusun Pair Batu rt-rw : 09-06, Genteng', '', '', '', '', '2020-01-01', 1, '1986-11-02', '1', 160, '3', '0', 29, '0', '1', '0', '0'),
('10120102', 'DEA DANIATI', NULL, '3215220000000000', '', '', '', 'Cipulus rt-rw : 02-10, Cisurupan', '', '', '', '', '2020-01-01', 1, '1988-06-30', '0', 166, '3', '1', 20, '0', '0', '0', '0'),
('10120103', 'JUNAEDI', NULL, '3217080000000000', '', '', '', 'Laksana Mekar rt-rw : 07-05, Laksanamekar', '', '', '', '', '2020-01-01', 1, '1961-05-14', '1', 166, '3', '0', 2, '0', '1', '0', '0'),
('10120107', 'ILFAN MUGHINI', NULL, '3213030000000000', '', '', '', 'Blok Kartadara rt-rw : 68-12, Cigadung', '', '', '', '', '2020-01-01', 2, '2001-04-20', '1', 158, '3', '0', 17, '0', '0', '0', '0'),
('10120108', 'AMAR NURFADILA', NULL, '3213030000000000', '', '', '', 'Jl. Sutaatmaja rt-rw : 26-06, Karanganyar', '', '', '', '', '2020-01-01', 2, '1996-03-24', '1', 166, '3', '0', 6, '0', '1', '0', '0'),
('10120109', 'NENDI', NULL, '3213030000000000', '', '', '', 'Rawabadak rt-rw : 103-29, Karanganyar', '', '', '', '', '2020-01-01', 2, '1984-01-07', '1', 158, '2', '0', 23, '0', '0', '0', '0'),
('10120110', 'YOGI JUNIANSYAH', NULL, '1601220000000000', '', '', '', 'Ds. II Banuayu rt-rw : 06--, Banu Ayu', '', '', '', '', '2020-01-01', 2, '1997-06-24', '1', 160, '3', '0', 31, '0', '0', '0', '0'),
('10120111', 'IRWAN KOSASIH', NULL, '3213030000000000', '', '', '', 'sukaasih 2, 65-18, karanganyar', '', '', '', '', '2020-01-01', 1, '1983-08-29', '1', 159, '3', '0', 5, '0', '0', '0', '0'),
('10120112', 'KRI1IANA', NULL, '3213280000000000', '', '', '', 'kp. Cikondang, 15-02, sukasari, subang', '', '', '', '', '2020-01-01', 1, '1999-01-31', '1', 164, '3', '1', 36, '0', '1', '0', '0'),
('10120113', 'REZA AWALUDIN', NULL, '3213260000000000', '', '', '', 'kasomalang wetan, 03-01, kasomalang wetan', '', '', '', '', '2020-01-01', 1, '1998-02-02', '1', 173, '3', '0', 26, '0', '0', '0', '0'),
('10120114', 'ADE JULIANA SADIKIN', NULL, '3213040000000000', '', '', '', 'blok sukahurip, 13-04,dangdeur, subang', '', '', '', '', '2020-01-01', 1, '1983-07-30', '1', 160, '3', '0', 14, '0', '0', '0', '0'),
('10120115', 'HERU KRI3YUDA', NULL, '3204100000000000', '', '', '', 'BTN Margaasih, jl. Hiu rt-rw : 03-16, Margaasih', '', '', '', '', '2020-01-01', 2, '1999-04-24', '1', 169, '3', '0', 5, '0', '1', '0', '0'),
('10120116', 'YUNUS NURSAMSI', NULL, '3204310000000000', '', '', '', 'Kp. Kertasari rt-rw : 01-16, Tarumajaya', '', '', '', '', '2020-01-01', 2, '2000-05-13', '1', 166, '2', '0', 11, '0', '0', '0', '0'),
('10120117', 'VICKY RAMDHANI', NULL, '3273260000000000', '', '', '', 'Jl. Kosar rt-rw : 06-05, Pasir Endah', '', '', '', '', '2020-01-01', 2, '2000-12-15', '1', 170, '3', '0', 7, '0', '0', '0', '0'),
('10120118', 'M. ANDRI SETIAWAN', NULL, '3204060000000000', '', '', '', 'Kp. Mekarsari rt-rw : 05-08, Cikadut', '', '', '', '', '2020-01-01', 2, '1999-09-15', '1', 171, '3', '0', 3, '0', '0', '0', '0'),
('10120119', 'AHMAD SUYUD', NULL, '3204310000000000', '', '', '', 'Kp. Kertasari rt-rw : 01-16, Tarumajaya', '', '', '', '', '2020-01-01', 2, '1993-12-14', '1', 160, '3', '0', 13, '0', '1', '0', '0'),
('10120120', 'PAJIN MUBAROK', NULL, '3211070000000000', '', '', '', 'Ds. Ciaseum rt-rw : 04-04, Karanglayung', '', '', '', '', '2020-01-01', 2, '2000-04-09', '1', 158, '2', '0', 24, '0', '0', '0', '0'),
('10120121', 'ICA ANSORI', NULL, '3206380000000000', '', '', '', 'Pagerageung Kulon rt-rw : 03-01, Pagerageung', '', '', '', '', '2020-01-01', 2, '1997-11-02', '1', 167, '3', '0', 24, '0', '1', '0', '0'),
('10120122', 'INDRA SETIAWAN', NULL, '3202300000000000', '', '', '', 'Kp. Cipicung rt-erw : 04-03, Manggahang', '', '', '', '', '2020-01-01', 2, '1997-07-27', '1', 164, '3', '0', 36, '0', '1', '0', '0'),
('10120123', 'II SOBARI', NULL, '3204320000000000', '', '', '', 'Kp. Sindang Reret rt-rw : 03-08, Sukasari', '', '', '', '', '2020-01-01', 2, '1992-08-13', '1', 161, '3', '0', 7, '0', '1', '0', '0'),
('10120124', 'DEDI CAHYADI', NULL, '3273020000000000', '', '', '', 'Kp. Awiligar rt-rw : 10-10, Cibeunying', '', '', '', '', '2020-01-01', 2, '1982-11-11', '1', 160, '2', '0', 15, '0', '0', '0', '0'),
('10120125', 'RICKI RIANTO', NULL, '3273140000000000', '', '', '', 'Jl. Sukasenang rt-rw : 07-15, Cikutra', '', '', '', '', '2020-01-01', 2, '1983-07-31', '1', 171, '3', '0', 28, '0', '1', '0', '0'),
('10120126', 'SUMPENA', NULL, '3204300000000000', '', '', '', 'Kp. Pasir Tengah rt-rw : 01-05, Tanjungwangi', '', '', '', '', '2020-01-01', 2, '1978-07-07', '1', 159, '3', '0', 7, '0', '0', '0', '0'),
('10120127', 'ELAN SUHERLAN', NULL, '3217130000000000', '', '', '', 'kp. Cikadu,02/03, cicadas, bandung', '', '', '', '', '2020-01-01', 2, '1994-01-02', '1', 168, '3', '0', 28, '0', '0', '0', '0'),
('10120128', 'RODIAN', NULL, '3211220000000000', '', '', '', 'Dsn. Ciulur rt-rw : 01-06, Trunamanggala', '', '', '', '', '2020-01-01', 1, '1993-09-27', '1', 166, '3', '1', 21, '0', '1', '0', '0'),
('10120129', 'HERMAWAN', NULL, '3273130000000000', '', '', '', 'JL. Solokan tongan No. 3, Turangga, Bandung', '', '', '', '', '2020-01-01', 1, '1968-12-15', '1', 171, '3', '1', 11, '0', '0', '0', '0'),
('10120130', 'ANDI HERYANA', NULL, '3273060000000000', '', '', '', 'Jl. Komud sukadio rt-rw : 04-09, HusenSatranegara', '', '', '', '', '2020-01-01', 1, '1983-04-14', '1', 166, '3', '1', 32, '0', '1', '0', '0'),
('10120131', 'ZAM ZAM CAHYAN BUDIMAN', NULL, '3273030000000000', '', '', '', 'Jl. Kopo Cirangrang rt-rw : 02-03, Cirangrang', '', '', '', '', '2020-01-01', 1, '1992-12-22', '1', 166, '3', '0', 4, '0', '1', '0', '0'),
('10120132', 'ZAENAL MUTAQIN', NULL, '3205100000000000', '', '', '', 'Kp. Jalan Cagak rt-rw : 01-04, Ciherang', '', '', '', '', '2020-01-01', 1, '1980-10-02', '1', 170, '3', '1', 27, '0', '0', '0', '0'),
('10120133', 'OYO WALUYO', NULL, '3273160000000000', '', '', '', 'Jl. Cikadut rt-rw : 04-04, Karang Pamulang', '', '', '', '', '2020-01-01', 1, '1980-12-24', '1', 158, '3', '1', 35, '0', '0', '0', '0'),
('10120134', 'URIP', NULL, '3204100000000000', '', '', '', 'Cigondewah Hilir rt-rw : 02-02, Cigondewah Hilir', '', '', '', '', '2020-01-01', 1, '1982-02-27', '1', 173, '2', '1', 13, '0', '0', '0', '0'),
('10120135', 'CAHYADI MULYA', NULL, '3204460000000000', '', '', '', 'Kp. Pameuntasan rt-rw : 01-12, Pameuntasan', '', '', '', '', '2020-01-01', 1, '1981-11-24', '1', 170, '3', '0', 13, '0', '0', '0', '0'),
('10120136', 'MOCH. REZA RAHMATULLOH', NULL, '3273260000000000', '', '', '', 'Jl. Cikadut rt-rw : 02-03, Karang Pamulang', '', '', '', '', '2020-01-01', 1, '1995-04-07', '1', 161, '3', '1', 26, '0', '1', '0', '0'),
('10120137', 'ENDANG SARIPUDIN', NULL, '3217090000000000', '', '', '', 'Blok Sukamaju rt-rw : 02-11, Batujajar Barat', '', '', '', '', '2020-01-01', 1, '1966-11-06', '1', 173, '3', '1', 33, '0', '0', '0', '0'),
('10120138', 'ASEP FACHRIL', NULL, '3204050000000000', '', '', '', 'Dusun Bojongeureunrt-rw : 01-04, Cibeusi', '', '', '', '', '2020-01-01', 1, '1988-04-02', '1', 166, '3', '0', 8, '0', '1', '0', '0'),
('10120139', 'NYARMAN', NULL, '3204070000000000', '', '', '', 'Haruman sari rt-rw : 03-07, Cigending', '', '', '', '', '2020-01-01', 1, '1965-10-05', '1', 160, '3', '0', 22, '0', '1', '0', '0'),
('10120140', 'RUHIYATMANSYAH', NULL, '3207010000000000', '', '', '', 'Jl. Babakan jati rt-rw : 06-07, Gumuruh', '', '', '', '', '2020-01-01', 1, '1988-10-29', '1', 158, '3', '1', 26, '0', '0', '0', '0'),
('10120141', 'CHAERUL SALEH', NULL, '3273120000000000', '', '', '', 'Jl. Gumuruh rt-rw : 05-04, Gumuruh', '', '', '', '', '2020-01-01', 1, '1974-05-11', '1', 165, '3', '1', 21, '0', '0', '0', '0'),
('10120142', 'MARKANI', NULL, '3212290000000000', '', '', '', 'Kp. Nagrak rt-rw : 01-06, Sirnaraja', '', '', '', '', '2020-01-01', 1, '1981-04-08', '1', 166, '3', '1', 20, '0', '1', '0', '0'),
('10120143', 'ALI ABDURAHMAN', NULL, '3273170000000000', '', '', '', 'Komp. Batuwangi rt-rw ; 03-15, Sukamenak', '', '', '', '', '2020-01-01', 1, '2000-05-06', '1', 166, '3', '0', 3, '0', '1', '1', '0'),
('200301144', 'SYAIFUL ISLAM AL', NULL, '3277030000000000', '18040173470', '', '2080253889', 'Jl. Sukarasa no.55 rt-rw ; 03-11, Cimahi Utara', '', '', '', '', '2020-03-01', 2, '1998-08-08', '1', 164, '3', '0', 3, '0', '1', '0', '0'),
('200301145', 'AGUNG SUJANA', NULL, '3273120000000000', 'DAFTAR BARU', '', '1667214336', 'Kp. Sunagara rt-rw ; 12-04, Lemahsugih', '', '', '', '', '2020-03-01', 2, '1982-09-27', '1', 160, '3', '0', 16, '0', '0', '0', '0'),
('200301146', 'HERNA RUKMANA', NULL, '3273040000000000', 'DAFTAR BARU', '', '504785935', 'GG. Pak Marhadi No. 107/88 rt-rw ; 02-08, Bojongloa Kaler', '', '', '', '', '2020-03-01', 2, '1973-02-16', '1', 159, '3', '0', 15, '0', '0', '0', '0'),
('200301147', 'AMAN NURCAHYAT', NULL, '3211060000000000', 'DAFTAR BARU', '', '463135779', 'Kp. Pari Pari rt-rw ; 04-03, Pacet', '', '', '', '', '2020-03-01', 2, '1999-03-23', '1', 170, '2', '0', 6, '0', '1', '0', '0'),
('200301148', 'IWAN RODIAWAN', NULL, '3278050000000000', '', '', '', 'KP. ANDIR; 02/06, LEMBANG, BANDUNG BARAT', '', '', '', '', '2020-03-01', 2, '1982-07-28', '1', 171, '3', '0', 5, '0', '1', '0', '0'),
('200301149', 'DEDEN ROHIMAT', NULL, '3273010000000000', 'DAFTAR BARU', '', 'DAFTAR BARU', 'Kp. Rancaherang rt-rw ; 08-01, Sukasari', '', '', '', '', '2020-03-01', 2, '1995-12-30', '1', 158, '3', '0', 3, '0', '0', '0', '0'),
('200301150', 'HADI SUSANTO', NULL, '3273010000000000', 'DAFTAR BARU', '', '', 'Cukang Kawung No. 209 rt-rw ; 09-13, Cibeunying Kaler', '', '', '', '', '2020-03-01', 2, '1967-10-07', '1', 168, '3', '0', 20, '0', '0', '0', '0'),
('200301151', 'SUPRIATNA', NULL, '3277030000000000', 'DAFTAR BARU', '', '10146586659', 'Jl. Sersanbajuri Negla rt-rw ; 04-04, Sukasari', '', '', '', '', '2020-03-01', 2, '1990-11-01', '1', 169, '2', '0', 18, '0', '1', '0', '0'),
('200301152', 'FEBRY RHAMDAN PRATAMA', NULL, '3273080000000000', 'DAFTAR BARU', '', '10135860006', 'Jl. Sersansurip No. 63-B/169-A rt-rw ; 01-04, Cidadap', '', '', '', '', '2020-03-01', 2, '1996-02-01', '1', 164, '3', '0', 35, '0', '1', '0', '0'),
('200301153', 'EMAN SULAEMAN ', NULL, '3211100000000000', 'DAFTAR BARU', '', 'DAFTAR BARU', 'Kp. Sawahlega No. 20 rt-rw ; 01-06, Cidadap', '', '', '', '', '2020-03-01', 2, '1987-08-20', '1', 173, '2', '0', 6, '0', '1', '0', '0'),
('200301154', 'YUNDA HERLINDA', NULL, '3205340000000000', 'DAFTAR BARU', '', '2209556665', 'Kp. Cimipir rt-rw ; 01-10, Pakenjeng', '', '', '', '', '2020-03-01', 2, '1996-03-30', '0', 167, '3', '0', 21, '1', '0', '0', '0'),
('200301155', 'EKA SARTIKA ', NULL, '3217010000000000', 'DAFTAR BARU', '', 'DAFTAR BARU', 'Kp. Cirateun Peuntas rt-rw ; 04-14, Lembang', '', '', '', '', '2020-03-01', 2, '1967-03-02', '0', 161, '2', '0', 34, '0', '1', '0', '0'),
('200301156', 'JAJANG KOSANDI', NULL, '3205080000000000', 'DAFTAR BARU', '', 'DAFTAR BARU', 'Kp. Cawenekoneng rt-rw ; 02-02, Pasirwengi', '', '', '', '', '2020-03-01', 2, '1996-07-11', '1', 171, '2', '0', 7, '0', '1', '0', '0'),
('200301157', 'CAHYA MUKTI', NULL, '3217010000000000', 'DAFTAR BARU', '', 'DAFTAR BARU', 'Kp. Pojok tengah rt-rw ; 04-05, Lembang', '', '', '', '', '2020-03-01', 2, '1996-07-24', '1', 173, '2', '0', 13, '0', '0', '0', '0'),
('200301158', 'DEDE SUNINGSIH', NULL, '3273020000000000', 'DAFTAR BARU', '', 'DAFTAR BARU', 'Cirateun rt-rw ; 01-03, Sukasari', '', '', '', '', '2020-03-01', 2, '1968-09-19', '0', 159, '3', '0', 15, '0', '1', '0', '0'),
('200301159', 'MIRDAD ', NULL, '3206170000000000', 'DAFTAR BARU', '', '1521635297', 'Kp. Pasarkolot rt-rw ; 11-04, Sukaraja', '', '', '', '', '2020-03-01', 2, '1982-10-12', '1', 162, '2', '0', 13, '0', '1', '0', '0'),
('200301160', 'WILDA WIGUNA', NULL, '3273010000000000', '14005494050', '', '', 'Jl. Gegerkalong girang No. 138 rt-rw ; 02-06, Sukasari', '', '', '', '', '2020-03-01', 2, '1990-11-03', '1', 163, '3', '0', 23, '0', '0', '0', '0'),
('200301161', 'JAJANG TAJUDIN', NULL, '3217020000000000', 'DAFTAR BARU', '', 'DAFTAR BARU', 'Kp. Sariwangi rt-rw ; 04-09, Parongpong ', '', '', '', '', '2020-03-01', 2, '1973-04-27', '1', 158, '3', '0', 32, '0', '1', '0', '0'),
('200301162', 'HALIMAH', NULL, '3217010000000000', 'DAFTAR BARU', '', '1521635073', 'Kp. Pasirwangi rt-rw ; 02-10, Lembang ', '', '', '', '', '2020-03-01', 2, '1971-07-04', '0', 163, '2', '0', 6, '1', '0', '0', '0'),
('200301163', 'KARTIKA SARI', NULL, '3217020000000000', 'DAFTAR BARU', '', '1469725942', 'Kp. Sukamulya rt-rw; 01-04. Parongpong', '', '', '', '', '2020-03-01', 2, '1998-01-04', '0', 172, '2', '0', 33, '1', '0', '0', '0'),
('200301164', 'SUTISNA', NULL, '3273080000000000', '19062492699', '', '2039443424', 'Kp. Cisaladah rt-rw ; 03-04 Cidadap', '', '', '', '', '2020-03-01', 2, '1986-07-18', '1', 169, '4', '0', 11, '0', '0', '0', '0'),
('200301165', 'A GANJAR S', NULL, '3217010000000000', '16009921277', '', '1666973147', 'Kp. Areng rt-rw; 01-11, Lembang', '', '', '', '', '2020-03-01', 2, '1986-09-08', '1', 169, '3', '0', 11, '0', '1', '0', '0'),
('200301166', 'PENDI ', NULL, '3217010000000000', '14005493730', '', '1521634948', 'Kp. Panghegar rt-rw; 05-02, Lembang', '', '', '', '', '2020-03-01', 2, '1990-07-16', '1', 173, '1', '0', 36, '0', '1', '1', '0'),
('200301167', 'RITA MERSITA', NULL, '3273010000000000', '18024688824', '', '1666611854', 'Jl. Geger arum No.11 rt-rw; 04-06, Sukasari', '', '', '', '', '2020-03-01', 2, '1992-04-08', '0', 162, '2', '0', 25, '0', '0', '0', '0'),
('200301168', 'ANGGARA GUSTIANA', NULL, '3217010000000000', 'DAFTAR BARU', '', '1962047452', 'Kp. Areng rt-rw; 01-10, Lembang', '', '', '', '', '2020-03-01', 2, '2000-08-01', '1', 172, '3', '0', 19, '0', '1', '0', '0'),
('200301169', 'RANGGA KURNIAWAN', NULL, '3217010000000000', 'DAFTAR BARU', '', '1717127087', 'Kp. Areng rt-rw; 02-09, Lembang', '', '', '', '', '2020-03-01', 2, '2000-01-10', '1', 164, '3', '0', 1, '0', '1', '0', '0'),
('200301170', 'ENGKOS KOSWARA', NULL, '3273010000000000', 'DAFTAR BARU', '', '1717127087', 'Jl. Gegerkalong Tengah No.2-C rt-rw; 01-04, Sukasari', '', '', '', '', '2020-03-01', 2, '1979-06-17', '1', 167, '3', '0', 24, '0', '0', '0', '0'),
('200301171', 'RITA TRISNAWATI', NULL, '3204060000000000', '', '', '', 'SEKELOA TIMUR, 05/03, COBLONG, BANDUNG', '', '', '', '', '2020-03-01', 2, '1985-07-23', '0', 163, '3', '0', 30, '1', '1', '0', '0'),
('200301172', 'DATI SUMARNI', NULL, '3273020000000000', '', '', '', 'KP PASIRKALIKI BARAT, COBLONG, BANDUNG', '', '', '', '', '2020-03-01', 2, '1985-05-04', '0', 159, '3', '0', 5, '0', '0', '0', '0'),
('200301173', 'SOFYAN NATAWIDJAYA', NULL, '3273010000000000', 'DAFTAR BARU', '', 'DAFTAR BARU', 'Jl. Negla Hilir No.4 rt-rw; 01-05\' Sukasari', '', '', '', '', '2020-03-01', 2, '1987-09-11', '1', 161, '3', '0', 21, '0', '0', '0', '0'),
('200301174', 'AHMAD RIZAL', NULL, '3277010000000000', '', '', '', 'SUKAGALIH, 03/34,MELONG, CIMAHI', '', '', '', '', '2020-03-01', 2, '1996-08-30', '1', 170, '3', '0', 26, '0', '1', '0', '0'),
('200301175', 'KANIA SARI ', NULL, '3211120000000000', 'DAFTAR BARU', '', '1008361168', 'DSN Lebakmaja Kaler rt-rw; 01-11, Tanjungsari', '', '', '', '', '2020-03-01', 2, '1983-01-23', '0', 172, '2', '0', 35, '0', '0', '0', '0'),
('200301176', 'CEPY  HERMAWAN', NULL, '3217010000000000', 'DAFTAR BARU', '', '497974702', 'Kp. Cijengkol rt-rw;02-03, Lembang', '', '', '', '', '2020-03-01', 2, '2000-05-15', '1', 169, '3', '0', 26, '0', '0', '0', '0'),
('200301177', 'NURWENDAH', NULL, '3217010000000000', 'DAFTAR BARU', '', '1720117484', 'Kp. Sukabaru rt-rw; 01-01, Parongpong', '', '', '', '', '2020-03-01', 2, '1994-02-20', '0', 168, '2', '0', 19, '1', '0', '0', '0'),
('200301178', 'TANTAN ', NULL, '3273010000000000', '14WKF003539', '', '504717219', 'Cijerokaso rt-rw; 04-10, Sukasari', '', '', '', '', '2020-03-01', 2, '1991-03-21', '1', 170, '3', '0', 6, '0', '1', '0', '0'),
('200301179', 'ARDIANA ANTINA', NULL, '3217010000000000', '19062492707', '', '497524522', 'Kp. Cihideung Gudang rt-rw; 03-02, Lembang', '', '', '', '', '2020-03-01', 2, '1992-10-11', '1', 163, '3', '0', 15, '0', '0', '0', '0'),
('200301180', 'MULYADI ', NULL, '3217010000000000', '19062492756', '', '2249130317', 'Kp. Cijengkol rt-rw;02-03, Lembang', '', '', '', '', '2020-03-01', 2, '1993-01-17', '1', 164, '3', '0', 27, '0', '0', '0', '0'),
('200301181', 'TETEN SUPRIADI', NULL, '3273140000000000', '19062492624', '', '505231165', 'GG. Sekejati IV No.31/140-A rt-rw;04-01, Cibeunying Kidul', '', '', '', '', '2020-03-01', 2, '1977-06-04', '1', 169, '2', '0', 0, '0', '0', '0', '0'),
('200301182', 'IWAN SETIAWAN', NULL, '3217020000000000', '19062492822', '', '2039443637', 'Jl. Ciwaruga No.23 rt-rw;02-05, Parongpong', '', '', '', '', '2020-03-01', 2, '1986-12-06', '1', 160, '3', '0', 31, '0', '0', '0', '0'),
('200301183', 'IWAN RIDWAN', NULL, '3203020000000000', 'DAFTAR BARU', '', '1720486809', 'GG. Sukasari II rt-rw; 04-04, Cibeunying Kaler', '', '', '', '', '2020-03-01', 2, '1981-02-23', '1', 169, '2', '0', 16, '0', '0', '0', '0'),
('200301184', 'EVI ', NULL, '3217020000000000', '19062492749', '', '497974555', 'Kp. Cijengkol rt-rw;02-03, Lembang', '', '', '', '', '2020-03-01', 2, '1982-08-20', '0', 162, '4', '0', 11, '0', '0', '0', '0'),
('200301185', 'SUSILAWATI', NULL, '3217020000000000', 'DAFTAR BARU', '', '2073745326', 'Kp. Mekarwangi No.45 rt-rw;02-09, Parongpong', '', '', '', '', '2020-03-01', 2, '0000-00-00', '0', 170, '2', '0', 3, '0', '0', '1', '0'),
('200301186', 'ADE FIRMANSYAH ', NULL, '3217020000000000', 'DAFTAR BARU', '', '1862790017', 'Kp. Sukawangi rt-rw;02-02, Parongpong', '', '', '', '', '2020-03-01', 2, '1995-11-29', '1', 171, '3', '0', 1, '0', '1', '0', '0'),
('200301187', 'ASEP WAHYUDIN', NULL, '3273080000000000', '19062492772', '', '1129115632', 'Kp. Bongkor No.25 rt-rw; 07-03, Cidadap', '', '', '', '', '2020-03-01', 2, '1975-04-26', '1', 172, '3', '0', 10, '0', '0', '0', '0'),
('200301188', 'JAKA ', NULL, '3205080000000000', 'DAFTAR BARU', '', '2039872893', 'Kp. Cawenekoneng rt-rw ; 02-02, Pasirwengi', '', '', '', '', '2020-03-01', 2, '1998-08-06', '1', 162, '2', '0', 19, '0', '1', '0', '0'),
('200301189', 'DIN AZHAR MUJAHIDIN', NULL, '3273060000000000', '19062492780', '', '1793685791', 'Jl. H Moch Iskat No. 21/6B rt-rw; 01-06, Cicendo', '', '', '', '', '2020-03-01', 2, '1985-01-14', '1', 165, '2', '0', 1, '0', '0', '0', '0'),
('200301190', 'YUSUF JAELANI ', NULL, '3211110000000000', '19062492798', '', '1008361179', 'DSN Lebakmaja Kaler rt-rw; 01-11, Tanjungsari', '', '', '', '', '2020-03-01', 2, '1993-06-11', '1', 165, '3', '0', 11, '0', '0', '0', '0'),
('200301191', 'WINARDI ', NULL, '3273070000000000', '19062492715', '', '2231168062', 'Jl. Lembah Sukaresmi II Dalam rt-rw;03-10, Sukajadi ', '', '', '', '', '2020-03-01', 2, '1982-08-07', '1', 161, '3', '0', 13, '0', '0', '0', '0'),
('200301192', 'DENI FIRMASYAH ', NULL, '3204290000000000', '19062492731', '', '416172442', 'Kp. Papakserang rt-rw;02-03, Ciparay', '', '', '', '', '2020-03-01', 2, '1989-12-23', '1', 159, '3', '0', 21, '0', '1', '0', '0'),
('200301193', 'TISWAN', NULL, '3273080000000000', '19062492806', '', '1399137254', 'Jl. Cidadap Girang No.7 rt-rw; 04-05, Cidadap', '', '', '', '', '2020-03-01', 2, '1970-06-17', '1', 159, '3', '0', 9, '0', '0', '0', '0'),
('200301194', 'KUSNARA ', NULL, '3217020000000000', 'DAFTAR BARU', '', '1522883957', 'Kp. Cicarita rt-rw; 04-18, Parongpong', '', '', '', '', '2020-03-01', 2, '1986-10-05', '1', 165, '2', '0', 11, '0', '0', '0', '0'),
('200301195', 'AGUS SUHERMAN ', NULL, '3211110000000000', '19062492558', '', 'DAFTAR BARU', 'Wiraja rt-rw; 07-01, Jasina ', '', '', '', '', '2020-03-01', 2, '1990-08-18', '1', 159, '3', '0', 3, '0', '1', '0', '0'),
('200301196', 'ADE NUR IMAN ', NULL, '3204170000000000', '19062492814', '', '1521635321', 'Kp. Sekartoya rt-rw; 04-03, Cimaung', '', '', '', '', '2020-03-01', 2, '1994-07-01', '1', 160, '3', '0', 35, '0', '1', '0', '0'),
('200301197', 'RAHMAT NOVIANTI', NULL, '3213010000000000', '', '', '', 'KMP. KRIPIK, 09/03, SAGALAHERANG KIDUL, SUBANG', '', '', '', '', '2020-03-01', 3, '1987-11-13', '1', 159, '3', '0', 10, '0', '1', '0', '0'),
('200301198', 'AGUNG FIRDAUS', NULL, '3204310000000000', '19034983197', '', '', 'KP. BUDI ASIH, 01/07, GUNUNGLEUTIK, BANDUNG', '', '', '', '', '2020-03-01', 2, '1998-04-23', '1', 159, '2', '0', 25, '0', '1', '0', '0'),
('200301199', 'HENDRA GUNAWAN', NULL, '3273160000000000', '18000977159', '', '', 'pbr, puskopad blok a8 no 32, 05/03, gunungmanik, sumedang', '', '', '', '', '2020-03-01', 2, '1982-06-29', '1', 165, '2', '0', 7, '0', '0', '0', '0'),
('200301200', 'IRPANSYAH', NULL, '3273060000000000', '19034983163', '', '', 'jl.dr junjunan blk 175, 01/02, husensastranegara, bandung', '', '', '', '', '2020-03-01', 2, '1992-08-05', '1', 169, '2', '0', 35, '0', '0', '1', '0'),
('200301201', 'ALYA INSANTY', NULL, '3273090000000000', '', '', '', 'kp. Curug dago, 03/08, ciumbuleuit, bandung', '', '', '', '', '2020-03-01', 2, '2001-02-13', '0', 163, '3', '0', 21, '1', '0', '0', '0'),
('200301202', 'TITIN WARTINI', NULL, '3277020000000000', '16020033458', '', '', 'kp, munajan no 78, baros, cimahi', '', '', '', '', '2020-03-01', 2, '1979-05-02', '1', 159, '3', '0', 0, '0', '1', '0', '0'),
('200301203', 'AZMI GUSTIAN', NULL, '3273030000000000', '', '', '', 'gg. Pagarsih barat IV no 47/85, sukahaji, bbk ciparay, bandung', '', '', '', '', '2020-03-01', 2, '1995-10-13', '1', 167, '2', '0', 6, '0', '0', '0', '0'),
('200301639', 'DESTY ROSALINA', NULL, '3271040000000000', '', '', '', 'LEBAK KANTIN,01/05, KOTA BOGOR TENGAH, BOGOR', '', '', '', '', '2020-03-01', 4, '1989-12-20', '0', 166, '3', '0', 10, '0', '0', '0', '0'),
('200301646', 'DEDENG SOMANTRI', NULL, '3204060000000000', '', '', '', 'Kp. Sekemerak RT/RW 02/18, Cibeunying Cimenyan', '', '', '', '', '2019-03-01', 2, '1960-04-15', '1', 158, '3', '0', 25, '0', '1', '0', '0'),
('200301647', 'YANA PERMANA', NULL, '3204060000000000', '', '', '', 'Pasir Gunting RT/RW 04/09, Padasuka Cimenyan', '', '', '', '', '2019-03-01', 3, '1978-06-29', '1', 169, '3', '0', 26, '0', '0', '0', '0'),
('200301648', 'HADIAT', NULL, '3204320000000000', '', '', '', 'Kp. Bojongkoneng RT/RW 02/10, Rancamanyar', '', '', '', '', '2019-03-01', 3, '1978-08-10', '1', 171, '3', '0', 10, '0', '0', '0', '0'),
('200301649', 'ARIK WARYANSYAH', NULL, '3205030000000000', '', '', '', 'Kp. Cinunuk Hilir RT/RW 04/04, Cinunuk', '', '', '', '', '2019-03-01', 3, '1987-03-28', '1', 171, '3', '0', 31, '0', '0', '0', '0'),
('200301650', 'DIDIN DINIL MUSTOFA', NULL, '3204320000000000', '', '', '', 'Kp. Nusa RT/RW 04/15, Rancamanyar, Baleendah', '', '', '', '', '2019-03-01', 3, '1971-08-15', '1', 160, '3', '0', 5, '0', '1', '0', '0'),
('200301651', 'HENDRA IRAWAN', NULL, '3211120000000000', '', '', '', 'Jl. Cempaka 24 RT/RW 01/09, Sukarapih, Sukasari', '', '', '', '', '2019-03-01', 3, '1966-01-26', '1', 161, '3', '0', 13, '0', '0', '0', '0'),
('200301652', 'ACHMAD SOFYAN', NULL, '3204140000000000', '', '', '', 'Kp. Palasari RT/RW 02/04, Sukasari, Pameungpeuk', '', '', '', '', '2019-03-01', 3, '1974-04-21', '1', 160, '3', '0', 22, '0', '1', '0', '0'),
('200301653', 'AYI RATNINGSIH', NULL, '3273030000000000', '', '', '', 'Sekeloa Timur 187 RT/RW 06/03, Sekeloa, Coblong', '', '', '', '', '2019-03-01', 3, '1971-06-23', '0', 169, '3', '0', 0, '1', '1', '0', '0'),
('200301654', 'HAWI', NULL, '3204320000000000', '', '', '', 'Kp. Bojongkoneng RT/RW 02/10, Rancamanyar', '', '', '', '', '2019-03-01', 3, '1978-04-25', '1', 160, '3', '0', 0, '0', '1', '0', '0'),
('200301655', 'DIAN NOVIANDI', NULL, '3277020000000000', '', '', '', 'Cisangkan Hilir 110 RT/RW 02/17, Cimahi Tengah', '', '', '', '', '2019-03-01', 3, '1984-11-15', '1', 164, '3', '0', 22, '0', '1', '0', '0'),
('200301656', 'DEVI SOFIAN HERMAWAN', NULL, '3273030000000000', '', '', '', 'GG. Karyabakti RT/RW 02/04, Margahayu, Babakan Ciparay', '', '', '', '', '2019-03-01', 3, '1987-09-22', '1', 170, '3', '0', 13, '0', '0', '0', '0'),
('200301657', 'AHMAD SOBARI', NULL, '3211060000000000', '', '', '', 'GG. Sukarame 1 RT/RW 03/09, Cicaheum', '', '', '', '', '2019-03-01', 3, '1989-11-26', '1', 168, '3', '0', 15, '0', '1', '0', '0'),
('200301658', 'HENDI', NULL, '3204320000000000', '', '', '', 'Kp. Penclut RT/RW 01/05, Rancamanyar, Baleendah', '', '', '', '', '2019-03-01', 3, '1968-08-08', '1', 163, '3', '0', 15, '0', '1', '0', '0'),
('200301659', 'AGUS SUMARNA', NULL, '3204320000000000', '', '', '', 'Babakan RT/RW 03/09, Rancamanyar, Baleendah', '', '', '', '', '2019-03-01', 3, '1977-07-07', '1', 168, '3', '0', 32, '0', '0', '0', '0'),
('200301660', 'AEP SAEPUDIN M.NUR', NULL, '3204320000000000', '', '', '', 'Kp. Nusa RT/RW 05/15, Rancamanyar, Baleendah', '', '', '', '', '2019-03-01', 3, '1983-04-16', '1', 160, '3', '0', 4, '0', '1', '0', '0'),
('200301661', 'DEDE HIDAYAT', NULL, '3217090000000000', '', '', '', 'Jl. Bangka Raya GG. Ampera RT/RW 06/07, Jakarta Selatan', '', '', '', '', '2019-03-01', 3, '1982-09-30', '1', 165, '3', '0', 27, '0', '0', '0', '0'),
('200301662', 'DEDED KUSTIWA', NULL, '3204060000000000', '', '', '', 'Sekemerak RT/RW 01/18, Cibeunying, Cimenyan', '', '', '', '', '2019-03-01', 3, '1963-03-02', '1', 172, '3', '0', 1, '0', '0', '0', '0'),
('200301663', 'AYUDI SUHANA', NULL, '3217010000000000', '', '', '', 'Kp. Cirateun Peuntas RT/RW 03/15, Wangunsari', '', '', '', '', '2019-03-01', 3, '1984-08-22', '1', 158, '3', '0', 27, '0', '0', '0', '0'),
('200301664', 'MARNO', NULL, '3204120000000000', '', '', '', 'Kp. Kaum RT/RW 03/12, Dayeuhkolot', '', '', '', '', '2019-03-01', 3, '1972-05-05', '1', 171, '3', '0', 28, '0', '0', '0', '0'),
('200301665', 'MOEHAMAD SAEPULOH', NULL, '3217090000000000', '', '', '', 'Blok Jambu RT/RW 05/02, Galanggang, Batujajar', '', '', '', '', '2019-03-01', 3, '1979-01-01', '1', 167, '3', '0', 3, '0', '0', '0', '0'),
('200301666', 'AHMAD SUTISNA', NULL, '3204380000000000', '', '', '', 'Kp. Sindang Sari RT/RW 01/04, Pasirjambu', '', '', '', '', '2019-03-01', 3, '1972-04-17', '1', 163, '3', '0', 16, '0', '1', '0', '0'),
('200301667', 'BUDI SUHENDANG', NULL, '3205090000000000', '', '', '', 'Kp. Pangakuan RT/RW 04/06, Haruman, Leles, Garut', '', '', '', '', '2019-03-01', 3, '1989-09-19', '1', 160, '3', '0', 26, '0', '1', '0', '0'),
('200301668', 'MAMAN WARDIMAN', NULL, '3204320000000000', '', '', '', 'Babakan RT/RW 02/09, Rancamanyar, Baleendah', '', '', '', '', '2019-03-01', 3, '1979-06-26', '1', 163, '3', '0', 31, '0', '1', '0', '0'),
('200301669', 'AJANG TOYIB', NULL, '3204050000000000', '', '', '', 'Komp. Bumi Langgeng Blok 45 7A RT/RW 04/22, Cinunuk', '', '', '', '', '2019-03-01', 3, '1962-06-11', '1', 160, '3', '0', 34, '0', '0', '0', '0'),
('200301670', 'IWAN SUTIAWAN', NULL, '3204320000000000', '', '', '', 'Kp. Babakan RT/RW 01/09, Rancamanyar, Baleendah ', '', '', '', '', '2019-03-01', 3, '1976-01-06', '1', 172, '3', '0', 34, '0', '1', '0', '0'),
('200301671', 'SUKMANA', NULL, '3204320000000000', '', '', '', 'Kp. Cupu RT/RW 01/08, Rancamanyar, Baleendah', '', '', '', '', '2019-03-01', 3, '1971-01-09', '1', 160, '3', '0', 14, '0', '1', '0', '0'),
('200301672', 'DEDI RAHMAN ', NULL, '3205100000000000', '', '', '', 'Kp. Salamanjah RT/RW 02/12, Kadungora', '', '', '', '', '2019-03-01', 1, '1982-11-05', '1', 160, '3', '0', 11, '0', '1', '0', '0'),
('200301673', 'YU3N ', NULL, '3273210000000000', '', '', '', 'Jl. Babakan Ciseureuh Timur RT/RW 04/07, Regol', '', '', '', '', '2019-03-01', 1, '1983-09-19', '1', 168, '3', '0', 11, '0', '1', '0', '0'),
('200301674', 'RAMDAN FIRMANSYAH', NULL, '3204060000000000', '', '', '', 'Kp. Sekemerak RT/RW 02/18, Cibeunying Cimenyan', '', '', '', '', '2019-03-01', 1, '1990-07-14', '1', 169, '3', '1', 2, '0', '0', '0', '0'),
('200301675', 'ENDANG HERYANA', NULL, '3273230000000000', '', '', '', 'Manjahlega RT/RW 01/12, Rancasari', '', '', '', '', '2019-03-01', 1, '1978-09-14', '1', 162, '3', '0', 17, '0', '0', '0', '0'),
('200301676', 'ASEP SAEFUL MIRAJ', NULL, '3204330000000000', '', '', '', 'Kp. Bandir RT/RW 03/03, Ciparay', '', '', '', '', '2019-03-01', 1, '1987-03-13', '1', 161, '3', '1', 17, '0', '0', '0', '0'),
('200301677', 'CICI ', NULL, '3273060000000000', '', '', '', 'Jl. Citepus II No.18 RT/RW 07/06, Cicendo', '', '', '', '', '2019-03-01', 1, '1980-02-17', '1', 165, '3', '0', 31, '0', '0', '0', '0'),
('200301678', 'DANI SETIA NUGRAHA', NULL, '3205150000000000', '', '', '', 'Kp. Sukasari RT/RW 01/03, Sukawening', '', '', '', '', '2019-03-01', 1, '1976-10-10', '1', 171, '3', '1', 2, '0', '0', '0', '0'),
('200301679', 'DIKI SURYA PERMADI', NULL, '3205040000000000', '', '', '', 'Perum Tanjung Indah RT/RW 02/08, Tarogong Kaler', '', '', '', '', '2019-03-01', 1, '1990-01-23', '1', 164, '3', '1', 22, '0', '1', '0', '0'),
('200301680', 'ERWIN ARDIANSYAH', NULL, '3273260000000000', '', '', '', 'Nagrog II RT/RW 03/08, Ujungberung ', '', '', '', '', '2019-03-01', 1, '1986-03-12', '1', 170, '3', '1', 10, '0', '0', '0', '0'),
('200301681', 'PEBI NUGRAHA', NULL, '3273270000000000', '', '', '', 'Bumi Panyileukan H3 No.14 RT/RW 03/07, Panyileukan ', '', '', '', '', '2019-03-01', 1, '1984-02-06', '1', 161, '3', '1', 11, '0', '1', '0', '0'),
('200301682', 'IWAN SURYANA', NULL, '3273160000000000', '', '', '', 'Kp. Mande RT/RW 03/05, Mandalajati', '', '', '', '', '2019-03-01', 1, '1980-08-09', '1', 170, '3', '0', 29, '0', '0', '0', '0'),
('200301683', 'MANTO ADIDAYA', NULL, '3217090000000000', '', '', '', 'Blok Sukamaju No.59 RT/RW 02/11, Batujajar', '', '', '', '', '2019-03-01', 1, '1990-08-27', '1', 169, '3', '1', 33, '0', '1', '0', '0'),
('200301684', 'M. HERIYADI MUTTAQIN ', NULL, '3217090000000000', '', '', '', 'Jl. Blok Jambu RT/RW 03/02, Batujajar', '', '', '', '', '2019-03-01', 1, '1988-08-18', '1', 170, '3', '1', 20, '0', '1', '0', '0'),
('200301685', 'SULAEMAN ', NULL, '3217090000000000', '', '', '', 'Blok Jambu RT/RW 02/02, Batujajar', '', '', '', '', '2019-03-01', 1, '1968-12-12', '1', 167, '3', '1', 4, '0', '1', '0', '0'),
('200301686', 'TANDES KA1IAN ', NULL, '3204300000000000', '', '', '', 'Kp. Cinanggela RT/RW 01/06, Pacet', '', '', '', '', '2019-03-01', 1, '1985-12-25', '1', 164, '3', '1', 13, '0', '0', '0', '0'),
('200301687', 'TATANG TARMEDI ', NULL, '3211200000000000', '', '', '', 'Cipeureu RT/RW 04/01, Tanjungkerta', '', '', '', '', '2019-03-01', 1, '1980-10-29', '1', 161, '3', '1', 11, '0', '1', '0', '0');
INSERT INTO `tbl_pegawai` (`nik`, `nama`, `no_kk`, `no_bpjs_ketenagakerjaan`, `no_bpjs_kesehatan`, `kelas_bpjs`, `no_npwp`, `alamat`, `telp`, `email`, `bank`, `no_rek`, `tgl_masuk`, `devisi_id`, `tgl_lahir`, `jenis_kelamin`, `tinggi`, `pendidikan_terakhir`, `sertifikat`, `pengalaman`, `hijab`, `menikah`, `dalam_kontrak`, `dihapus`) VALUES
('200301688', 'TAUFIK HIDAYAT ', NULL, '3273120000000000', '', '', '', 'Jl. Cipicung I No.50 RT/RW 09/02, Batununggal', '', '', '', '', '2019-03-01', 1, '1981-02-05', '1', 163, '3', '1', 26, '0', '1', '0', '0'),
('201001688', 'AGIS HIDAYATULLOH', NULL, '3214060000000000', '', '', '', 'Kp. Nenggeng RT/RW 04/02, Neglasari, Darangdan, Purwakarta', '', '', '', '', '0000-00-00', 1, '1993-01-17', '1', 159, '3', '0', 10, '0', '0', '0', '0'),
('201001689', 'ENDRI SETIADI', NULL, '3204380000000000', '', '', '', 'Kp. Cijanggot RT/RW 09/02, Cisalada, Jatiluhur, Purwakarta', '', '', '', '', '0000-00-00', 3, '1991-12-13', '1', 159, '3', '0', 18, '0', '0', '0', '0'),
('201001690', 'SAEPUDIN', NULL, '3217040000000000', '', '', '', 'Kp. Cikadapati RT/RW 03/03, Mekar Jaya, Cikalong Wetan, Bandung', '', '', '', '', '0000-00-00', 3, '1981-02-05', '1', 169, '3', '0', 4, '0', '0', '0', '0'),
('201001691', 'ALAN', NULL, '3204260000000000', '', '', '', 'Kp. Cilangkap RT/RW 03/02, Cadasari', '', '', '', '', '0000-00-00', 1, '1987-11-28', '1', 169, '3', '1', 14, '0', '0', '0', '0'),
('201001692', 'BERTOLDUS EL SANTOS', NULL, '5310060000000000', '', '', '', '01 Waas No. 50, Batununggal, Bandung Kidul', '', '', '', '', '0000-00-00', 1, '1996-03-29', '1', 168, '3', '1', 16, '0', '0', '0', '0'),
('201001693', 'ANDRI CHRISTIAN', NULL, '3217070000000000', '', '', '', 'Kp. Sakola, Cipatat Cipta Harja, Bandung Barat', '', '', '', '', '0000-00-00', 3, '1980-07-20', '1', 161, '3', '0', 5, '0', '0', '0', '0'),
('201001694', 'BAMBANG LE3NA', NULL, '3214030000000000', '', '', '', 'Kp. Malang Nengah RT/RW 08/03, Cipeundeuy, Bojong, Purwakarta', '', '', '', '', '0000-00-00', 1, '1993-05-24', '1', 172, '3', '0', 4, '0', '1', '0', '0'),
('201001695', 'DENI GUNAWAN', NULL, '3204050000000000', '', '', '', 'Jl. Cibiru Indah II No. 47 RT/RW 04/14, Cileunyi', '', '', '', '', '0000-00-00', 1, '1997-10-08', '1', 168, '3', '1', 14, '0', '1', '0', '0'),
('201001696', 'IMAN NUR HIDAYAT', NULL, '3273040000000000', '', '', '', 'Jl. Babakan Tarogong, Gg. Bojong Asih I RT/RW 08/04', '', '', '', '', '0000-00-00', 1, '1992-01-17', '1', 160, '3', '1', 16, '0', '1', '0', '0'),
('201001697', 'IWAN SETIAWAN', NULL, '3214030000000000', '', '', '', 'Kp. Cipicung RT/RW 02/07, Tegalmunjul, Purwakarta', '', '', '', '', '0000-00-00', 1, '1994-07-12', '1', 166, '3', '0', 2, '0', '0', '0', '0'),
('201001698', 'JAJANG SUHENDI', NULL, '3217070000000000', '', '', '', 'Kp. Pakemitan RT/RW 02/11, Cipatat', '', '', '', '', '0000-00-00', 1, '1985-11-18', '1', 170, '3', '0', 27, '0', '0', '0', '0'),
('201001699', 'PAJAR PEBRI ALPARIZI', NULL, '3204290000000000', '', '', '', 'Kp. Pancaheulang RT/RW 01/15, Mekarlaksana, Ciparay', '', '', '', '', '0000-00-00', 1, '1999-02-05', '1', 164, '3', '0', 36, '0', '1', '0', '0'),
('201001700', 'RIANTO WIDIANTO', NULL, '3211170000000000', '', '', '', 'Dusun Talun RT/RW 03/05, Margamekar, Sumedang Selatan', '', '', '', '', '0000-00-00', 1, '1982-02-17', '1', 166, '3', '1', 11, '0', '1', '0', '0'),
('201001701', 'DIDIN MUHIDIN', NULL, '3214040000000000', '', '', '', 'Kp. Cipetir RT/RW 05/02, Liunggunung, Plered', '', '', '', '', '0000-00-00', 1, '1996-07-12', '1', 169, '3', '1', 10, '0', '0', '0', '0'),
('201001702', 'YANDI HUDORI', NULL, '3214040000000000', '', '', '', 'Kp. Ciwareng Kulon RT/RW 12/04, Cibogogirang, Plered', '', '', '', '', '0000-00-00', 1, '1996-02-15', '1', 158, '3', '1', 4, '0', '1', '0', '0'),
('201001703', 'PIRMAN', NULL, '3206300000000000', '', '', '', 'Kp. Malaganti RT/RW 03/03, Sukaharja, Sariwangi', '', '', '', '', '0000-00-00', 1, '1996-11-12', '1', 159, '3', '1', 17, '0', '0', '0', '0'),
('201001704', 'YAYAT', NULL, '3217070000000000', '', '', '', 'Kp. Cimerang RT/RW 02/05, Cipatat', '', '', '', '', '0000-00-00', 1, '1983-06-19', '1', 158, '2', '0', 4, '0', '1', '0', '0'),
('201001705', 'KIKI MAULANA', NULL, '3213190000000000', '', '', '', 'Kp. Gunung Tua RT/RW 03/03, Cijambe, Kabupaten Subang', '', '', '', '', '0000-00-00', 1, '1999-10-17', '1', 163, '3', '1', 33, '0', '1', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penempatan`
--

CREATE TABLE `tbl_penempatan` (
  `kontrak_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `pegawai_nik` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penempatan`
--

INSERT INTO `tbl_penempatan` (`kontrak_id`, `pegawai_nik`) VALUES
(0021, '10120041'),
(0021, '10120052'),
(0021, '10120112'),
(0021, '201001699'),
(0021, '201001705'),
(0020, '10120044'),
(0020, '10120057'),
(0020, '10120102'),
(0022, '200301166'),
(0022, '200301200'),
(0024, '10120033'),
(0024, '200301185'),
(0025, '10120049'),
(0025, '10120054'),
(0025, '10120058'),
(0026, '10120039'),
(0026, '10120143'),
(0026, '201001705'),
(0027, '10120059'),
(0027, '10120078'),
(0027, '10120094');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `hak_akses` enum('hrd','adm','staff') DEFAULT NULL,
  `pertanyaan1` text DEFAULT NULL,
  `jawaban1` text DEFAULT NULL,
  `pertanyaan2` text DEFAULT NULL,
  `jawaban2` text DEFAULT NULL,
  `dihapus` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`, `nama`, `hak_akses`, `pertanyaan1`, `jawaban1`, `pertanyaan2`, `jawaban2`, `dihapus`) VALUES
('admin', '$2y$10$nv23.3zeogm/Gtrk3Jkjje3Kq9fZBFAqSt3m1EeoM.czZijecldhW', 'Admin SWAT', 'adm', 'Apa minuman kesukaanmu?', 'air', 'Siapa nama ibumu?', 'yayu', '0'),
('bayuw', '$2y$10$UJFqdjy4d.nKC1PjWbQWL.NrDqJSSp5WTBXkkJO6ElTA40DpmEzGq', 'Bayu W N', 'hrd', 'Siapa nama ayahmu?', 'doni', 'Apa warna kesukaanmu?', 'kuning', '0'),
('dedi', '$2y$10$eFSmvPBrpJzrgPwYY/ih4.mmThnr5hKwAEf.lp/fN9vGzq7dmFZzS', 'DEDI', 'staff', NULL, NULL, NULL, NULL, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_devisi`
--
ALTER TABLE `tbl_devisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_klien`
--
ALTER TABLE `tbl_klien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kontrak`
--
ALTER TABLE `tbl_kontrak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_devisi` (`devisi_id`),
  ADD KEY `id_klien` (`klien_id`);

--
-- Indexes for table `tbl_kontrak_kriteria`
--
ALTER TABLE `tbl_kontrak_kriteria`
  ADD KEY `kontrak_id` (`kontrak_id`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_devisi` (`devisi_id`);

--
-- Indexes for table `tbl_penempatan`
--
ALTER TABLE `tbl_penempatan`
  ADD KEY `id_pegawai` (`pegawai_nik`),
  ADD KEY `id_kontrak` (`kontrak_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_klien`
--
ALTER TABLE `tbl_klien`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `tbl_kontrak`
--
ALTER TABLE `tbl_kontrak`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kontrak`
--
ALTER TABLE `tbl_kontrak`
  ADD CONSTRAINT `tbl_kontrak_ibfk_2` FOREIGN KEY (`devisi_id`) REFERENCES `tbl_devisi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_kontrak_ibfk_3` FOREIGN KEY (`klien_id`) REFERENCES `tbl_klien` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kontrak_kriteria`
--
ALTER TABLE `tbl_kontrak_kriteria`
  ADD CONSTRAINT `tbl_kontrak_kriteria_ibfk_1` FOREIGN KEY (`kontrak_id`) REFERENCES `tbl_kontrak` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`devisi_id`) REFERENCES `tbl_devisi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_penempatan`
--
ALTER TABLE `tbl_penempatan`
  ADD CONSTRAINT `tbl_penempatan_ibfk_2` FOREIGN KEY (`pegawai_nik`) REFERENCES `tbl_pegawai` (`nik`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_penempatan_ibfk_3` FOREIGN KEY (`kontrak_id`) REFERENCES `tbl_kontrak` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
