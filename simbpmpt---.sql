/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : simbpmpt

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-01-27 19:04:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `TBL_ASP`
-- ----------------------------
DROP TABLE IF EXISTS `TBL_ASP`;
CREATE TABLE `TBL_ASP` (
  `ASP_ID__` int(20) NOT NULL AUTO_INCREMENT,
  `PRZ_ID__` int(20) NOT NULL,
  `SAU_ID__` int(20) NOT NULL,
  PRIMARY KEY (`ASP_ID__`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of TBL_ASP
-- ----------------------------

-- ----------------------------
-- Table structure for `TBL_FLE`
-- ----------------------------
DROP TABLE IF EXISTS `TBL_FLE`;
CREATE TABLE `TBL_FLE` (
  `FLE_ID__` int(100) NOT NULL,
  `PRZ_ID__` int(10) NOT NULL,
  `FLE_TIPE` enum('RESI','SK') NOT NULL DEFAULT 'RESI',
  `FLE_NAMA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of TBL_FLE
-- ----------------------------

-- ----------------------------
-- Table structure for `TBL_JNS`
-- ----------------------------
DROP TABLE IF EXISTS `TBL_JNS`;
CREATE TABLE `TBL_JNS` (
  `JNS_ID__` int(5) NOT NULL AUTO_INCREMENT,
  `JNS_NMJN` varchar(255) NOT NULL,
  `JNS_KDJN` varchar(100) NOT NULL,
  `JNS_KTGR` enum('Retribusi','Non Retribusi') NOT NULL DEFAULT 'Non Retribusi',
  `JNS_KTRG` text NOT NULL,
  PRIMARY KEY (`JNS_ID__`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of TBL_JNS
-- ----------------------------
INSERT INTO `TBL_JNS` VALUES ('3', 'Izin Lokasi', 'IL', 'Non Retribusi', '');
INSERT INTO `TBL_JNS` VALUES ('4', 'Izin Membuka Tanah', 'IMT', 'Non Retribusi', '');
INSERT INTO `TBL_JNS` VALUES ('5', 'Pemberian Izin Pemanfaatan Ruang Manfaat Jalan, Ruang Milik Jalan dan Ruang Pengawasan Jalan', 'PIMR', 'Non Retribusi', 'Dinas Bina Marga');
INSERT INTO `TBL_JNS` VALUES ('6', 'Pendaftaran Penanaman Modal', 'PPM', 'Non Retribusi', 'BKPM (SPIPISE)');
INSERT INTO `TBL_JNS` VALUES ('7', 'Izin Prinsip Penanaman Modal (IPPM)', 'IPPM', 'Non Retribusi', 'BKPM (SPIPISE)');
INSERT INTO `TBL_JNS` VALUES ('8', 'Izin Prinsip Perluasan Penanaman Modal', 'IPPPM', 'Non Retribusi', 'BKPM (SPIPISE)');
INSERT INTO `TBL_JNS` VALUES ('9', 'Izin Prinsip Perubahan Penanaman Modal', 'IPPuPM', 'Non Retribusi', 'BKPM (SPIPISE)');
INSERT INTO `TBL_JNS` VALUES ('10', 'Izin Usaha', 'IU', 'Non Retribusi', 'BKPM (SPIPISE)');
INSERT INTO `TBL_JNS` VALUES ('11', 'Izin Usaha Perluasan', 'IUP', 'Non Retribusi', 'BKPM (SPIPISE)');
INSERT INTO `TBL_JNS` VALUES ('12', 'Izin Usaha Perubahan', 'IUPu', 'Non Retribusi', 'BKPM (SPIPISE)');
INSERT INTO `TBL_JNS` VALUES ('13', 'Izin Usaha Penggabungan', 'IUPg', 'Non Retribusi', 'BKPM (SPIPISE)');
INSERT INTO `TBL_JNS` VALUES ('14', 'Penyelenggaraan IMB Gedung', 'PIMBG', 'Retribusi', 'Dinas Cipta Karya');
INSERT INTO `TBL_JNS` VALUES ('15', 'Pemberian Izin Pengelolaan Kamar Mandi/ Kamar Kecil', 'PIPKM', 'Non Retribusi', 'Dinas Cipta Karya');
INSERT INTO `TBL_JNS` VALUES ('16', 'Pemberian Izin Usaha Pengelolaan Kebersihan Lingkungan', 'PIUPKL', 'Non Retribusi', 'Dinas Cipta Karya');
INSERT INTO `TBL_JNS` VALUES ('17', 'Pemberian Izin Optikal', 'PIO', 'Non Retribusi', 'Dinas Kesehatan');
INSERT INTO `TBL_JNS` VALUES ('18', 'Pemberian Surat Izin kerja asisten Apoteker', 'PSIKAP', 'Non Retribusi', 'Dinas Kesehatan');
INSERT INTO `TBL_JNS` VALUES ('19', 'Pemberian tanda Terdaftar Salon Kecantikan', 'PTTSK', 'Non Retribusi', 'Dinas Kesehatan');
INSERT INTO `TBL_JNS` VALUES ('20', 'Pemberian Tanda Terdaftar Jasa Boga', 'PTTJS', 'Non Retribusi', 'Dinas Kesehatan');
INSERT INTO `TBL_JNS` VALUES ('21', 'Pemberian Tanda Daftar Sarana Pariwisata Dan Jasa Pariwisata', 'PTDSPDJP', 'Non Retribusi', 'DISBUDPAR');
INSERT INTO `TBL_JNS` VALUES ('23', 'Pemberian Tanda Daftar Pengusahaan Objek dan Daya Tarik Wisata', 'PTDPODDTW', 'Non Retribusi', 'DISBUDPAR');
INSERT INTO `TBL_JNS` VALUES ('24', 'Pemberian Izin Trayek Angkutan Perdesaan/ Angkutan Kota', 'PITAPAK', 'Retribusi', 'DISHUB KOMINFO');
INSERT INTO `TBL_JNS` VALUES ('25', 'Pemberian Izin Operasi Angkutan Taxi Yang Melayani Wilayah Kabupaten', 'PIOATYMWK', 'Retribusi', 'DISHUB KOMINFO');
INSERT INTO `TBL_JNS` VALUES ('26', 'PEMBERIAN IZIN REKOMENDASI OPERASI ANGKUTAN SEWA', 'PIROAS', 'Retribusi', 'DISHUB KOMINFO');
INSERT INTO `TBL_JNS` VALUES ('27', 'Pemberian Izin Usaha Angkutan Pariwisata', 'PIUAP', 'Retribusi', 'DISHUB KOMINFO');
INSERT INTO `TBL_JNS` VALUES ('28', 'Pemberian Izin Usaha Angkutan Barang', 'PIUAB', 'Retribusi', 'DISHUB KOMINFO');
INSERT INTO `TBL_JNS` VALUES ('29', 'Izin Galian Penyelanggaraan Kabel Telkom', 'IGPKT', 'Non Retribusi', 'DISHUB KOMINFO');
INSERT INTO `TBL_JNS` VALUES ('30', 'IZIN PENDIRIAN KANTOR CABANG DAN LOKET OPERATOR', 'IPKCDLO', 'Non Retribusi', 'DISHUB KOMINFO');
INSERT INTO `TBL_JNS` VALUES ('31', 'PENERBITAN TANDA DAFTAR INDUSTRI (TDI) DAN IZIN USAHA INDUSTRI (IUI),  PERLUASAN IUI SKALA INVESTASI S.D 10 M TIDAK TERMASUK TANAH DAN BANGUNAN TEMPAT USAHA', '---', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('32', 'PENERBITAN IZIN USAHA KAWASAN INDUSTRI YANG LOKASI DI KABUPATEN\r\n', 'PIUKIYLDK', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('33', 'Pemberian Izin Usaha Perdagangan Di Wilayah Kabupaten', 'PIUPDWK', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('34', 'Pemberian Surat Izin menempati Bangungan (Sim B)', 'PSIMB', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('35', 'Pemberian Izin Usaha Perusahaan Pengeboran Air Bawah Tanah', 'PIUPPABT', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('36', 'Pemberian Izin Juru Bor', 'PIJB', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('37', 'Pemberian Izin Eksplorasi', 'PIE', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('38', 'Rekomendasi Penataan Lahan', 'RPL', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('39', 'PEMBERIAN IZIN PERDAGANGAN BARANG (TDP, SIUP, TDG, MINUMAN BERALKOHOL GOL B DAN C UNTUK PENGECER, PENJUALAN LANGSUNG UNTUK DIMINUM DI TEMPAT, PENGECER DAN PENJUALAN LANGSUNG UNTUK DIMINUM DI TEMPAT UNTUK MINUMAN BERALKOHOL MENGANDUNG REMPAH S.D. 15 %)\r\n', 'PIPB', 'Non Retribusi', 'DISPERINDAG TAMBEN\r\n');
INSERT INTO `TBL_JNS` VALUES ('40', 'IZIN PENGEBORAN, IZIN PENGGALIAN DAN IZIN  PENURAPAN MATA AIR PADA CEKUNGAN AIR TANAH DAN AIR BAWAH TANAH PADA WILAYAH KABUPATEN.\r\n', 'IPIPDIP', 'Non Retribusi', 'DISPERINDAG TAMBEN\r\nDISPERINDAG TAMBEN\r\nDISPERINDAG TAMBEN\r\nDISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('41', 'PEMBERIAN IZIN USAHA PERTAMBANGAN, ENERGI DAN SUMBERDAYA MINERAL PADA WILAYAH KABUPATEN.\r\n', 'PIUP', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('42', 'PEMBERIAN IZIN USAHA PERTAMBANGAN, ENERGI DAN SUMBER DAYA MINERAL UNTUK OPERASI PRODUKSI, YANG BERDAMPAK LINGKUNGAN LANGSUNG PADA WILAYAH KABUPATEN.\r\n', 'PIUAP', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('43', 'PEMBERIAN IZIN BADAN USAHA JASA PERTAMBANGAN,  ENERGI DAN SUMBER DAYA MINERAL DALAM RANGKA MENARIK INVESTOR UNTUK PMA DAN PMDN DI WILAYAH KABUPATEN\r\n', 'PIBUJP', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('44', 'Izin Usaha Ketenagalistrikan Untuk Umum (UIKU)', 'UIKU', 'Non Retribusi', 'DISPERINDAG TAMBEN\r\n');
INSERT INTO `TBL_JNS` VALUES ('45', 'Izin Usaha Ketenagalistrikan Sendiri', 'IUKS', 'Non Retribusi', 'DISPERINDAG TAMBEN\r\n');
INSERT INTO `TBL_JNS` VALUES ('46', 'Izin Usaha Penunjang Tenaga Listrik', 'IUPTL', 'Non Retribusi', 'DISPERINDAG TAMBEN\r\n');
INSERT INTO `TBL_JNS` VALUES ('47', 'Izin Pemakaian Batubara', 'IPB', 'Non Retribusi', 'DISPERINDAG TAMBEN\r\n');
INSERT INTO `TBL_JNS` VALUES ('48', 'Persetujuan Prinsip Industri', 'PPI', 'Non Retribusi', 'DISPERINDAG TAMBEN\r\n');
INSERT INTO `TBL_JNS` VALUES ('49', 'Izin Usaha Industri Di Luar Kawasan Industri', 'IUI', 'Non Retribusi', 'DISPERINDAG TAMBEN\r\n');
INSERT INTO `TBL_JNS` VALUES ('50', 'Persetujuan Prinsip Kawasan Industri ', 'PPKI', 'Non Retribusi', 'DISPERINDAG TAMBEN\r\n');
INSERT INTO `TBL_JNS` VALUES ('51', 'Izin Usaha Kawasan Industri', 'IUKI', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('52', 'Izin Usaha Perluasan Kawasan Industri', 'IUPKI', 'Non Retribusi', 'DISPERINDAG TAMBEN\r\n');
INSERT INTO `TBL_JNS` VALUES ('53', 'PEMBERIAN IZIN USAHA TANAMAN PANGAN DAN HORTIKULTURA WILAYAH KABUPATEN\r\n', 'PIUTP', 'Non Retribusi', 'DISTANHUTBUNAK\r\n');
INSERT INTO `TBL_JNS` VALUES ('54', 'PEMBERIAN IZIN PENGUSAHAAN TAMBAK DI KAWASAN HUTAN\r\n', 'PIPTDKH', 'Non Retribusi', 'DISTANHUTBUNAK\r\n');
INSERT INTO `TBL_JNS` VALUES ('55', 'PENYELENGGARAAN PERIZINAN LEMBAGA PELATIHAN\r\n', 'PPLP', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('56', 'PENERBITAN IZIN PENDIRIAN LEMBAGA BURSA KERJA/LPTKS DAN LEMBAGA PENYULUHAN DAN BIMBINGAN JABATAN SKALA KABUPATEN.\r\n', 'PIPLBK', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('57', 'PENERBITAN IZIN OPERASIONAL PERUSAHAAN PENYEDIA JASA PEKERJA/BURUH YANG BERDOMISILI DI KABUPATEN\r\n', 'PIOPPJP', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('58', 'PENCABUTAN IZIN OPERASIONAL PERUSAHAAN PENYEDIA JASA PEKERJA/BURUH YANG BERDOMISILI DI KABUPATEN ATAS REKOMENDASI PUSAT DAN ATAU PROVINSI\r\n', 'PIOPPJPB', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('59', 'Izin Memperkerjakan Tenaga Asing', 'IMTA', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('60', 'Izin Pemakaian Bejana Tekan', 'IPBT', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('61', 'Izin Penggunaan Genset', 'IPG', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('62', 'Izin Pemakaian Pesawat Angkat', 'IPPA', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('63', 'Izin Penggunaan Ketel Uap', 'IPKU', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('64', 'Izin Pengemudi Forklip', 'IPF', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('65', 'IZIN OPERASIONAL TKS LUAR NEGERI, TKS INDONESIA, LEMBAGA SUKARELA INDONESIA (IOTKS)\r\n', 'IOTLN', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('66', 'IZIN PENDIRIAN KANTOR CABANG PERUSAHAAN JASA TENAGA KERJA INDONESIA (IPKCPJ-TKI)\r\n', 'IPKC', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('67', 'IZIN ASRAMA ATAU AKOMODASI PENAMPUNGAN CALON TKI (IA-APC TKI)\r\n', 'IA-APC TKI', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('68', 'Izin Pengguaan Alat Berat', 'IPAB', 'Non Retribusi', 'DISNAKERTRANS');
INSERT INTO `TBL_JNS` VALUES ('69', 'PELAKSANAAN KEBIJAKAN PERIZINAN DAN PENERBITAN IUP DI BIDANG PEMBUDIDAYAAN IKAN YANG TIDAK MENGGUNAKAN TENAGA KERAJA ASING DI WILAYAH KABUPATEN\r\n', 'PKPDPIUP', 'Retribusi', 'DINAS PERIKANAN');
INSERT INTO `TBL_JNS` VALUES ('70', 'PELAKSANAAN KEBIJAKAN PERIZINAN USAHA PENGOLAHAN DAN PEMASARAN HASIL PERIKANAN DI KABUPATEN\r\n', 'PKPUPDPHPDK', 'Retribusi', 'DINAS PERIKANAN');
INSERT INTO `TBL_JNS` VALUES ('71', 'IZIN PENGUMPULAN LIMBAH B3 PADA SKALA KABUPATEN KECUALI MINYAK PELUMAS/OLI BEKAS\r\n', 'IPLB3PDKKMPOB', 'Non Retribusi', 'BPLH');
INSERT INTO `TBL_JNS` VALUES ('72', 'IZIN PENYIMPANAN SEMENTARA LIMBAH B3 DI INDUSTRI ATAU USAHA SUATU KEGIATAN\r\n', 'IPSLB3', 'Non Retribusi', 'BPLH');
INSERT INTO `TBL_JNS` VALUES ('73', 'PEMBERIAN IZIN PEMBUANGAN AIR LIMBAH KE AIR/SUMBER AIR\r\n', 'PIPALKASA', 'Non Retribusi', 'BPLH');
INSERT INTO `TBL_JNS` VALUES ('74', 'PEMBERIAN IZIN PEMANFAATAN AIR LIMBAH KE TANAH UNTUK APLIKASI PADA TANAH\r\n', 'PIPALKTUAPT', 'Non Retribusi', 'DISPERINDAG TAMBEN');
INSERT INTO `TBL_JNS` VALUES ('75', 'Pemberian Izin Gangguan (HO)', 'HO', 'Retribusi', 'BPLH');
INSERT INTO `TBL_JNS` VALUES ('76', 'Pemberian Izin Operasional Pendirian Sekolah Swasta', 'PIOPSS', 'Non Retribusi', 'DISDIKPORA');
INSERT INTO `TBL_JNS` VALUES ('77', 'Izin Mendirikan Sekolah Non Formal (PAUD/TK)', 'IMS-NF', 'Non Retribusi', 'DISDIKPORA');
INSERT INTO `TBL_JNS` VALUES ('78', 'Izin Mendirikan Lembaga Kursus dan Pelatihan', 'IMLKDP', 'Non Retribusi', 'DISDIKPORA');
INSERT INTO `TBL_JNS` VALUES ('79', 'Izin Pendirian Pusat Belajar Masyarakat', 'IPPBM', 'Non Retribusi', 'DISDIKPORA');
INSERT INTO `TBL_JNS` VALUES ('80', 'Pemberian Izin Pemasangan Reklame', 'PI-PR', 'Non Retribusi', 'DPPKAD');
INSERT INTO `TBL_JNS` VALUES ('81', 'Pemberian Izin Usaha Jasa Konstruksi', 'PIU-JK', 'Non Retribusi', 'BAG. DALPROG SETDA');
INSERT INTO `TBL_JNS` VALUES ('82', 'Pemberian Izin Menggarap Tanah Negara', 'PI-MTN', 'Non Retribusi', '');
INSERT INTO `TBL_JNS` VALUES ('83', 'Izin Rumah Sakit', 'I-RS', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('84', 'Izin Laboratorium', 'I-L', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('85', 'Izin Rumah Bersalin', 'I-RB', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('86', 'Izin BP UTAMA + DTP', 'IBP-UD', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('87', 'Izin BP UTAMA', 'IBP-U', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('88', 'Izin BP MADYA', 'IBP-M', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('89', 'Izin BP Perusahaan', 'IBP-P', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('90', 'Izin Klinik Khusus', 'IK-K', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('91', 'Izin Klinik Kecantikan Estetika', 'IK-KE', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('92', 'Izin Balai Konsultasi Gizi', 'I-BKG', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('93', 'Izin Praktek Dokter (Umum/ Spesialis/ Gigi)', 'IP-D', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('94', 'Izin Praktek Perawat', 'IP-P', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('95', 'Izin Praktek Bidan', 'IP-B', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('96', 'Izin Tukang Gigi', 'I-TG', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('97', 'Izin Praktek Fisioterapi', 'IP-F', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('98', 'Izin Kerja Refraktionis Option', 'IK-RO', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('99', 'Izin Laik Higienis', 'I-LH', 'Non Retribusi', 'DINAS KESEHATAN');
INSERT INTO `TBL_JNS` VALUES ('100', 'Izin Lingkungan', 'I-L', 'Non Retribusi', 'BPLH');
INSERT INTO `TBL_JNS` VALUES ('101', 'Izin Usaha Obat Hewan (Toko Obat, Pengecer, Kios)', 'IU-OH', 'Non Retribusi', 'DISTANHUTBUNAK');
INSERT INTO `TBL_JNS` VALUES ('102', 'Persetujuan Prinsip Usaha Peternakan', 'PPUP', 'Non Retribusi', 'DISTANHUTBUNAK');
INSERT INTO `TBL_JNS` VALUES ('103', 'Izin Usaha Peternakan', 'IUP', 'Non Retribusi', 'DISTANHUTBUNAK');
INSERT INTO `TBL_JNS` VALUES ('104', 'Izin Perluasan Usaha Peternakan', 'IPUP', 'Non Retribusi', 'DISTANHUTBUNAK');

-- ----------------------------
-- Table structure for `TBL_PMH`
-- ----------------------------
DROP TABLE IF EXISTS `TBL_PMH`;
CREATE TABLE `TBL_PMH` (
  `PMH_ID__` int(4) NOT NULL AUTO_INCREMENT,
  `PMH_NM__` varchar(250) NOT NULL,
  `PMH_TMLH` varchar(100) NOT NULL,
  `PMH_TNLH` date NOT NULL,
  `PMH_JNS_` enum('P','L') NOT NULL DEFAULT 'L',
  `PMH_AAA_` text NOT NULL,
  `PMH_TLP_` varchar(20) NOT NULL,
  `PMH_PKRA` varchar(50) NOT NULL,
  `PMH_NO__` varchar(100) NOT NULL,
  `PMH_NPWP` varchar(100) NOT NULL,
  `PMH_PRSH` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`PMH_ID__`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of TBL_PMH
-- ----------------------------
INSERT INTO `TBL_PMH` VALUES ('2', 'Rizal Alfarozi', 'Jakarta', '1980-06-17', 'L', 'Jalan Kepatihan No 23 Bandung', '+62 8986 2213 1', 'Swasta', '2812 3821 1232 123', '3213 1231 123', 'PT. Gemerlang');
INSERT INTO `TBL_PMH` VALUES ('3', 'Fikri Aliansyah', 'Bandung', '1994-12-09', 'L', 'Jalan Fikriansyah', '+82 3211 0622 12', 'Swasta', '0021 2038 3817 2', '2313 1239 1231 92', 'PT. Sentosa');

-- ----------------------------
-- Table structure for `TBL_PRA`
-- ----------------------------
DROP TABLE IF EXISTS `TBL_PRA`;
CREATE TABLE `TBL_PRA` (
  `PRA_ID__` int(10) NOT NULL AUTO_INCREMENT,
  `PRA_1___` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Fotocopy KTP dan pasfoto ukuran 3x4 (2 lembar) Direktur/Direktis',
  `PRA_2___` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Fotocopy akta perusahaan CV/PT',
  `PRA_3___` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Fotocopy Surat Izin Tempat Usaha (SITU)',
  `PRA_4___` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Fotocopy Tanda Daftar Perusahaan (TDP)',
  `PRA_5___` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Fotocopy ijazah tenaga teknik (SKT) dan administrasi',
  `PRA_6___` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Fotocopy NPWP dan PKP',
  `PRA_7___` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Fotocopy KTA/KTA biasa dari asosiasi terkait',
  `PRA_8___` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Fotocopy Sertifikasi Badan Usaha (SBU) dari LPJK Jawa Barat (bawa aslinya)',
  `PRA_9___` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Persyaratan Lainnya',
  PRIMARY KEY (`PRA_ID__`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of TBL_PRA
-- ----------------------------
INSERT INTO `TBL_PRA` VALUES ('1', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `TBL_PRA` VALUES ('2', '1', '1', '0', '0', '1', '1', '1', '0', '1');
INSERT INTO `TBL_PRA` VALUES ('3', '1', '0', '1', '1', '1', '0', '1', '1', '1');
INSERT INTO `TBL_PRA` VALUES ('4', '1', '1', '0', '1', '0', '1', '0', '1', '1');
INSERT INTO `TBL_PRA` VALUES ('5', '1', '1', '', '', '', '', '1', '1', '1');

-- ----------------------------
-- Table structure for `TBL_PRZ`
-- ----------------------------
DROP TABLE IF EXISTS `TBL_PRZ`;
CREATE TABLE `TBL_PRZ` (
  `PRZ_ID__` int(10) NOT NULL AUTO_INCREMENT,
  `JNS_ID__` int(5) NOT NULL,
  `SAU_ID__` int(2) NOT NULL DEFAULT '1',
  `PMH_ID__` int(5) NOT NULL,
  `PRA_ID__` int(5) NOT NULL,
  `PRZ_NMPR` varchar(200) NOT NULL,
  `PRZ_AAPR` text NOT NULL,
  `PRZ_JNPR` varchar(200) NOT NULL,
  `PRZ_NMPJ` varchar(200) NOT NULL,
  `PRZ_JBT_` varchar(200) NOT NULL,
  `PRZ_THN_` varchar(4) NOT NULL,
  `PRZ_NMRS` varchar(20) NOT NULL,
  `PRZ_NMSK` varchar(50) NOT NULL DEFAULT 'Belum Terbit',
  `PRZ_TNGL` date NOT NULL,
  `PRZ_KTRN` text NOT NULL,
  PRIMARY KEY (`PRZ_ID__`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of TBL_PRZ
-- ----------------------------
INSERT INTO `TBL_PRZ` VALUES ('2', '3', '1', '2', '1', 'PT. Gemerlang', 'JL. Kebaruan Karang Cianjur', 'Perusahaan (PT.)', 'Rizal Alfarozi', '', '2014', '1.I.1', 'Belum Terbit', '2014-01-01', '');
INSERT INTO `TBL_PRZ` VALUES ('3', '30', '1', '3', '2', 'PT. Sentosa', 'Jalan Sentosa', 'Perusahaan (PT.)', 'Fikri Aliansyah', 'Siapa aja', '2014', '1.I.2', 'Belum Terbit', '2014-01-04', '');
INSERT INTO `TBL_PRZ` VALUES ('4', '31', '3', '3', '3', 'PT. Sentosa', 'Jalan Sentosa', 'Perusahaan (PT.)', 'Fikri Aliansyah', 'Siapa aja', '2014', '1.I.3', 'Belum Terbit', '2014-01-14', '');
INSERT INTO `TBL_PRZ` VALUES ('5', '3', '7', '3', '4', 'PT. Sentosa', 'Jalan Sentosa', 'Perusahaan (PT.)', 'Fikri Aliansyah', 'Siapa aja', '2014', '1.I.4', 'Belum Terbit', '2014-01-17', '');
INSERT INTO `TBL_PRZ` VALUES ('6', '6', '4', '2', '5', 'asdasdasd', 'asdasdasdas', 'Perusahaan (PT.)', 'asdasdasd', 'asdasdasd', '2014', '1.I.5', 'Belum Terbit', '2014-01-27', '');

-- ----------------------------
-- Table structure for `TBL_RWY`
-- ----------------------------
DROP TABLE IF EXISTS `TBL_RWY`;
CREATE TABLE `TBL_RWY` (
  `RWY_ID__` int(10) NOT NULL AUTO_INCREMENT,
  `PRZ_ID__` int(5) NOT NULL,
  `USR_ID__` int(5) NOT NULL,
  `RWY_TNGL` date NOT NULL,
  PRIMARY KEY (`RWY_ID__`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of TBL_RWY
-- ----------------------------
INSERT INTO `TBL_RWY` VALUES ('1', '5', '4', '2014-01-18');
INSERT INTO `TBL_RWY` VALUES ('2', '5', '4', '2014-01-18');
INSERT INTO `TBL_RWY` VALUES ('3', '5', '7', '2014-01-18');
INSERT INTO `TBL_RWY` VALUES ('4', '5', '8', '2014-01-18');
INSERT INTO `TBL_RWY` VALUES ('5', '5', '9', '2014-01-18');
INSERT INTO `TBL_RWY` VALUES ('6', '4', '4', '2014-01-18');
INSERT INTO `TBL_RWY` VALUES ('7', '4', '4', '2014-01-18');
INSERT INTO `TBL_RWY` VALUES ('8', '5', '4', '2014-01-27');
INSERT INTO `TBL_RWY` VALUES ('9', '6', '7', '2014-01-27');
INSERT INTO `TBL_RWY` VALUES ('10', '6', '7', '2014-01-27');
INSERT INTO `TBL_RWY` VALUES ('11', '6', '7', '2014-01-27');

-- ----------------------------
-- Table structure for `TBL_SAU`
-- ----------------------------
DROP TABLE IF EXISTS `TBL_SAU`;
CREATE TABLE `TBL_SAU` (
  `SAU_ID__` int(2) NOT NULL AUTO_INCREMENT,
  `SAU_NAMA` varchar(255) NOT NULL,
  PRIMARY KEY (`SAU_ID__`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of TBL_SAU
-- ----------------------------
INSERT INTO `TBL_SAU` VALUES ('1', 'Registrasi Awal');
INSERT INTO `TBL_SAU` VALUES ('2', 'Pelengkapan Formulir');
INSERT INTO `TBL_SAU` VALUES ('3', 'Registrasi Petugas Loket');
INSERT INTO `TBL_SAU` VALUES ('4', 'Kasubid Pelayanan dan Pendaftaran');
INSERT INTO `TBL_SAU` VALUES ('5', 'Kabid Pelayanan');
INSERT INTO `TBL_SAU` VALUES ('6', 'Kabid Pengolahan');
INSERT INTO `TBL_SAU` VALUES ('7', 'Kasubid Verifikasi dan Pendaftaran');
INSERT INTO `TBL_SAU` VALUES ('8', 'Kabid Penetapan dan Dokumentasi Izin');
INSERT INTO `TBL_SAU` VALUES ('9', 'Terbit');
INSERT INTO `TBL_SAU` VALUES ('10', 'Arsip');
INSERT INTO `TBL_SAU` VALUES ('11', 'Surat Penolakan');
INSERT INTO `TBL_SAU` VALUES ('12', 'Penghitungan Retribusi');
INSERT INTO `TBL_SAU` VALUES ('13', 'Penetapan Nilai Retribusi');
INSERT INTO `TBL_SAU` VALUES ('14', 'Back Office');

-- ----------------------------
-- Table structure for `TBL_SK`
-- ----------------------------
DROP TABLE IF EXISTS `TBL_SK`;
CREATE TABLE `TBL_SK` (
  `SK_ID__` int(25) NOT NULL AUTO_INCREMENT,
  `SK_NMR_` varchar(100) NOT NULL,
  `SK_TGL_` date NOT NULL,
  PRIMARY KEY (`SK_ID__`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of TBL_SK
-- ----------------------------

-- ----------------------------
-- Table structure for `TBL_USR`
-- ----------------------------
DROP TABLE IF EXISTS `TBL_USR`;
CREATE TABLE `TBL_USR` (
  `USR_ID__` int(4) NOT NULL AUTO_INCREMENT,
  `USR_NMLN` varchar(205) NOT NULL,
  `USR_JBTN` varchar(150) NOT NULL,
  `USR_UENM` varchar(150) NOT NULL,
  `USR_PSWR` varchar(150) NOT NULL,
  `SAU_ID__` int(2) NOT NULL,
  `USR_NIP_` text NOT NULL,
  PRIMARY KEY (`USR_ID__`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of TBL_USR
-- ----------------------------
INSERT INTO `TBL_USR` VALUES ('4', 'admin', 'admin', 'admin', 'a183a612caa74092be6143cdee49b2e0', '99', '1234 5678 9012 3456');
INSERT INTO `TBL_USR` VALUES ('7', 'u1', '--', 'u1', '0a2ede56f6523e16b6a2794c26921580', '3', '1234 5678 9012 3456');
INSERT INTO `TBL_USR` VALUES ('8', 'u2', '--', 'u2', '0a2ede56f6523e16b6a2794c26921580', '4', '1234 5678 9012 3456');
INSERT INTO `TBL_USR` VALUES ('9', 'u3', '--', 'u3', '0a2ede56f6523e16b6a2794c26921580', '5', '1234 5678 9012 3456');
INSERT INTO `TBL_USR` VALUES ('10', 'u4', '--', 'u4', '0a2ede56f6523e16b6a2794c26921580', '6', '1234 5678 9012 3456');
INSERT INTO `TBL_USR` VALUES ('11', 'u5', '--', 'u5', '0a2ede56f6523e16b6a2794c26921580', '7', '1234 5678 9012 3456');
INSERT INTO `TBL_USR` VALUES ('12', 'u6', '--', 'u6', '0a2ede56f6523e16b6a2794c26921580', '14', '1234 5678 9012 3456');
INSERT INTO `TBL_USR` VALUES ('13', 'u7', '--', 'u7', '0a2ede56f6523e16b6a2794c26921580', '8', '1234 5678 9012 3456');
