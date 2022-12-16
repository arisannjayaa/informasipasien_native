DROP database db_informasipasien_native;
CREATE DATABASE db_informasipasien_native;

USE db_informasipasien_native;

CREATE TABLE provinsi (
  id_provinsi int PRIMARY KEY NOT NULL,
  nama_provinsi varchar(255) DEFAULT NULL
);

INSERT INTO provinsi (id_provinsi, nama_provinsi) VALUES
(1, 'Aceh'),
(2, 'Sumatera Utara'),
(3, 'Sumatera Barat'),
(4, 'Riau'),
(5, 'Jambi'),
(6, 'Sumatera Selatan'),
(7, 'Bengkulu'),
(8, 'Lampung'),
(9, 'Kepulauan Bangka Belitung'),
(10, 'Kepulauan Riau'),
(11, 'Dki Jakarta'),
(12, 'Jawa Barat'),
(13, 'Jawa Tengah'),
(14, 'Di Yogyakarta'),
(15, 'Jawa Timur'),
(16, 'Banten'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Tengah'),
(22, 'Kalimantan Selatan'),
(23, 'Kalimantan Timur'),
(24, 'Kalimantan Utara'),
(25, 'Sulawesi Utara'),
(26, 'Sulawesi Tengah'),
(27, 'Sulawesi Selatan'),
(28, 'Sulawesi Tenggara'),
(29, 'Gorontalo'),
(30, 'Sulawesi Barat'),
(31, 'Maluku'),
(32, 'Maluku Utara'),
(33, 'Papua'),
(34, 'Papua Barat');

CREATE TABLE kabupaten (
  id_kabupaten int(11) NOT NULL PRIMARY KEY,
  nama_kabupaten varchar(255) DEFAULT NULL,
  id_provinsi int(11) DEFAULT NULL,
  FOREIGN KEY (id_provinsi) REFERENCES provinsi(id_provinsi)
);

INSERT INTO kabupaten (id_kabupaten, nama_kabupaten, id_provinsi) VALUES
(1, 'Pidie Jaya', 1),
(2, 'Simeulue', 1),
(3, 'Bireuen', 1),
(4, 'Aceh Timur', 1),
(5, 'Aceh Utara', 1),
(6, 'Pidie', 1),
(7, 'Aceh Barat Daya', 1),
(8, 'Gayo Lues', 1),
(9, 'Aceh Selatan', 1),
(10, 'Aceh Tamiang', 1),
(11, 'Aceh Besar', 1),
(12, 'Aceh Tenggara', 1),
(13, 'Bener Meriah', 1),
(14, 'Aceh Jaya', 1),
(15, 'Lhokseumawe', 1),
(16, 'Aceh Barat', 1),
(17, 'Nagan Raya', 1),
(18, 'Langsa', 1),
(19, 'Banda Aceh', 1),
(20, 'Aceh Singkil', 1),
(21, 'Sabang', 1),
(22, 'Aceh Tengah', 1),
(23, 'Subulussalam', 1),
(24, 'Nias Selatan', 2),
(25, 'Mandailing Natal', 2),
(26, 'Dairi', 2),
(27, 'Labuhan Batu Utara', 2),
(28, 'Tapanuli Utara', 2),
(29, 'Simalungun', 2),
(30, 'Langkat', 2),
(31, 'Serdang Bedagai', 2),
(32, 'Tapanuli Selatan', 2),
(33, 'Asahan', 2),
(34, 'Padang Lawas Utara', 2),
(35, 'Padang Lawas', 2),
(36, 'Labuhan Batu Selatan', 2),
(37, 'Padang Sidempuan', 2),
(38, 'Toba Samosir', 2),
(39, 'Tapanuli Tengah', 2),
(40, 'Humbang Hasundutan', 2),
(41, 'Sibolga', 2),
(42, 'Batu Bara', 2),
(43, 'Samosir', 2),
(44, 'Pematang Siantar', 2),
(45, 'Labuhan Batu', 2),
(46, 'Deli Serdang', 2),
(47, 'Gunungsitoli', 2),
(48, 'Nias Utara', 2),
(49, 'Nias', 2),
(50, 'Karo', 2),
(51, 'Nias Barat', 2),
(52, 'Medan', 2),
(53, 'Pakpak Bharat', 2),
(54, 'Tebing Tinggi', 2),
(55, 'Binjai', 2),
(56, 'Tanjung Balai', 2),
(57, 'Dharmasraya', 3),
(58, 'Solok Selatan', 3),
(59, 'Sijunjung (Sawah Lunto Sijunjung)', 3),
(60, 'Pasaman Barat', 3),
(61, 'Solok', 3),
(62, 'Pasaman', 3),
(63, 'Pariaman', 3),
(64, 'Tanah Datar', 3),
(65, 'Padang Pariaman', 3),
(66, 'Pesisir Selatan', 3),
(67, 'Padang', 3),
(68, 'Sawah Lunto', 3),
(69, 'Lima Puluh Koto / Kota', 3),
(70, 'Agam', 3),
(71, 'Payakumbuh', 3),
(72, 'Bukittinggi', 3),
(73, 'Padang Panjang', 3),
(74, 'Kepulauan Mentawai', 3),
(75, 'Indragiri Hilir', 4),
(76, 'Kuantan Singingi', 4),
(77, 'Pelalawan', 4),
(78, 'Pekanbaru', 4),
(79, 'Rokan Hilir', 4),
(80, 'Bengkalis', 4),
(81, 'Indragiri Hulu', 4),
(82, 'Rokan Hulu', 4),
(83, 'Kampar', 4),
(84, 'Kepulauan Meranti', 4),
(85, 'Dumai', 4),
(86, 'Siak', 4),
(87, 'Tebo', 5),
(88, 'Tanjung Jabung Barat', 5),
(89, 'Muaro Jambi', 5),
(90, 'Kerinci', 5),
(91, 'Merangin', 5),
(92, 'Bungo', 5),
(93, 'Tanjung Jabung Timur', 5),
(94, 'Sungaipenuh', 5),
(95, 'Batang Hari', 5),
(96, 'Jambi', 5),
(97, 'Sarolangun', 5),
(98, 'Palembang', 6),
(99, 'Lahat', 6),
(100, 'Ogan Komering Ulu Timur', 6),
(101, 'Musi Banyuasin', 6),
(102, 'Pagar Alam', 6),
(103, 'Ogan Komering Ulu Selatan', 6),
(104, 'Banyuasin', 6),
(105, 'Musi Rawas', 6),
(106, 'Muara Enim', 6),
(107, 'Ogan Komering Ulu', 6),
(108, 'Ogan Komering Ilir', 6),
(109, 'Empat Lawang', 6),
(110, 'Lubuk Linggau', 6),
(111, 'Prabumulih', 6),
(112, 'Ogan Ilir', 6),
(113, 'Bengkulu Tengah', 7),
(114, 'Rejang Lebong', 7),
(115, 'Muko Muko', 7),
(116, 'Kaur', 7),
(117, 'Bengkulu Utara', 7),
(118, 'Lebong', 7),
(119, 'Kepahiang', 7),
(120, 'Bengkulu Selatan', 7),
(121, 'Seluma', 7),
(122, 'Bengkulu', 7),
(123, 'Lampung Utara', 8),
(124, 'Way Kanan', 8),
(125, 'Lampung Tengah', 8),
(126, 'Mesuji', 8),
(127, 'Pringsewu', 8),
(128, 'Lampung Timur', 8),
(129, 'Lampung Selatan', 8),
(130, 'Tulang Bawang', 8),
(131, 'Tulang Bawang Barat', 8),
(132, 'Tanggamus', 8),
(133, 'Lampung Barat', 8),
(134, 'Pesisir Barat', 8),
(135, 'Pesawaran', 8),
(136, 'Bandar Lampung', 8),
(137, 'Metro', 8),
(138, 'Belitung', 9),
(139, 'Belitung Timur', 9),
(140, 'Bangka', 9),
(141, 'Bangka Selatan', 9),
(142, 'Bangka Barat', 9),
(143, 'Pangkal Pinang', 9),
(144, 'Bangka Tengah', 9),
(145, 'Kepulauan Anambas', 10),
(146, 'Bintan', 10),
(147, 'Natuna', 10),
(148, 'Batam', 10),
(149, 'Tanjung Pinang', 10),
(150, 'Karimun', 10),
(151, 'Lingga', 10),
(152, 'Jakarta Utara', 11),
(153, 'Jakarta Barat', 11),
(154, 'Jakarta Timur', 11),
(155, 'Jakarta Selatan', 11),
(156, 'Jakarta Pusat', 11),
(157, 'Kepulauan Seribu', 11),
(158, 'Depok', 12),
(159, 'Karawang', 12),
(160, 'Cirebon', 12),
(161, 'Bandung', 12),
(162, 'Sukabumi', 12),
(163, 'Sumedang', 12),
(164, 'Indramayu', 12),
(165, 'Majalengka', 12),
(166, 'Kuningan', 12),
(167, 'Tasikmalaya', 12),
(168, 'Ciamis', 12),
(169, 'Subang', 12),
(170, 'Purwakarta', 12),
(171, 'Bogor', 12),
(172, 'Bekasi', 12),
(173, 'Garut', 12),
(174, 'Pangandaran', 12),
(175, 'Cianjur', 12),
(176, 'Banjar', 12),
(177, 'Bandung Barat', 12),
(178, 'Cimahi', 12),
(179, 'Purbalingga', 13),
(180, 'Kebumen', 13),
(181, 'Magelang', 13),
(182, 'Cilacap', 13),
(183, 'Batang', 13),
(184, 'Banjarnegara', 13),
(185, 'Blora', 13),
(186, 'Brebes', 13),
(187, 'Banyumas', 13),
(188, 'Wonosobo', 13),
(189, 'Tegal', 13),
(190, 'Purworejo', 13),
(191, 'Pati', 13),
(192, 'Sukoharjo', 13),
(193, 'Karanganyar', 13),
(194, 'Pekalongan', 13),
(195, 'Pemalang', 13),
(196, 'Boyolali', 13),
(197, 'Grobogan', 13),
(198, 'Semarang', 13),
(199, 'Demak', 13),
(200, 'Rembang', 13),
(201, 'Klaten', 13),
(202, 'Kudus', 13),
(203, 'Temanggung', 13),
(204, 'Sragen', 13),
(205, 'Jepara', 13),
(206, 'Wonogiri', 13),
(207, 'Kendal', 13),
(208, 'Surakarta (Solo)', 13),
(209, 'Salatiga', 13),
(210, 'Sleman', 14),
(211, 'Bantul', 14),
(212, 'Yogyakarta', 14),
(213, 'Gunung Kidul', 14),
(214, 'Kulon Progo', 14),
(215, 'Gresik', 15),
(216, 'Kediri', 15),
(217, 'Sampang', 15),
(218, 'Bangkalan', 15),
(219, 'Sumenep', 15),
(220, 'Situbondo', 15),
(221, 'Surabaya', 15),
(222, 'Jember', 15),
(223, 'Pamekasan', 15),
(224, 'Jombang', 15),
(225, 'Probolinggo', 15),
(226, 'Banyuwangi', 15),
(227, 'Pasuruan', 15),
(228, 'Bojonegoro', 15),
(229, 'Bondowoso', 15),
(230, 'Magetan', 15),
(231, 'Lumajang', 15),
(232, 'Malang', 15),
(233, 'Blitar', 15),
(234, 'Sidoarjo', 15),
(235, 'Lamongan', 15),
(236, 'Pacitan', 15),
(237, 'Tulungagung', 15),
(238, 'Mojokerto', 15),
(239, 'Madiun', 15),
(240, 'Ponorogo', 15),
(241, 'Ngawi', 15),
(242, 'Nganjuk', 15),
(243, 'Tuban', 15),
(244, 'Trenggalek', 15),
(245, 'Batu', 15),
(246, 'Tangerang', 16),
(247, 'Serang', 16),
(248, 'Pandeglang', 16),
(249, 'Lebak', 16),
(250, 'Tangerang Selatan', 16),
(251, 'Cilegon', 16),
(252, 'Klungkung', 17),
(253, 'Karangasem', 17),
(254, 'Bangli', 17),
(255, 'Tabanan', 17),
(256, 'Gianyar', 17),
(257, 'Badung', 17),
(258, 'Jembrana', 17),
(259, 'Buleleng', 17),
(260, 'Denpasar', 17),
(261, 'Mataram', 18),
(262, 'Dompu', 18),
(263, 'Sumbawa Barat', 18),
(264, 'Sumbawa', 18),
(265, 'Lombok Tengah', 18),
(266, 'Lombok Timur', 18),
(267, 'Lombok Utara', 18),
(268, 'Lombok Barat', 18),
(269, 'Bima', 18),
(270, 'Timor Tengah Selatan', 19),
(271, 'Flores Timur', 19),
(272, 'Alor', 19),
(273, 'Ende', 19),
(274, 'Nagekeo', 19),
(275, 'Kupang', 19),
(276, 'Sikka', 19),
(277, 'Ngada', 19),
(278, 'Timor Tengah Utara', 19),
(279, 'Belu', 19),
(280, 'Lembata', 19),
(281, 'Sumba Barat Daya', 19),
(282, 'Sumba Barat', 19),
(283, 'Sumba Tengah', 19),
(284, 'Sumba Timur', 19),
(285, 'Rote Ndao', 19),
(286, 'Manggarai Timur', 19),
(287, 'Manggarai', 19),
(288, 'Sabu Raijua', 19),
(289, 'Manggarai Barat', 19),
(290, 'Landak', 20),
(291, 'Ketapang', 20),
(292, 'Sintang', 20),
(293, 'Kubu Raya', 20),
(294, 'Pontianak', 20),
(295, 'Kayong Utara', 20),
(296, 'Bengkayang', 20),
(297, 'Kapuas Hulu', 20),
(298, 'Sambas', 20),
(299, 'Singkawang', 20),
(300, 'Sanggau', 20),
(301, 'Melawi', 20),
(302, 'Sekadau', 20),
(303, 'Kotawaringin Timur', 21),
(304, 'Sukamara', 21),
(305, 'Kotawaringin Barat', 21),
(306, 'Barito Timur', 21),
(307, 'Kapuas', 21),
(308, 'Pulang Pisau', 21),
(309, 'Lamandau', 21),
(310, 'Seruyan', 21),
(311, 'Katingan', 21),
(312, 'Barito Selatan', 21),
(313, 'Murung Raya', 21),
(314, 'Barito Utara', 21),
(315, 'Gunung Mas', 21),
(316, 'Palangka Raya', 21),
(317, 'Tapin', 22),
(318, 'Banjar', 22),
(319, 'Hulu Sungai Tengah', 22),
(320, 'Tabalong', 22),
(321, 'Hulu Sungai Utara', 22),
(322, 'Balangan', 22),
(323, 'Tanah Bumbu', 22),
(324, 'Banjarmasin', 22),
(325, 'Kotabaru', 22),
(326, 'Tanah Laut', 22),
(327, 'Hulu Sungai Selatan', 22),
(328, 'Barito Kuala', 22),
(329, 'Banjarbaru', 22),
(330, 'Kutai Barat', 23),
(331, 'Samarinda', 23),
(332, 'Paser', 23),
(333, 'Kutai Kartanegara', 23),
(334, 'Berau', 23),
(335, 'Penajam Paser Utara', 23),
(336, 'Bontang', 23),
(337, 'Kutai Timur', 23),
(338, 'Balikpapan', 23),
(339, 'Malinau', 24),
(340, 'Nunukan', 24),
(341, 'Bulungan (Bulongan)', 24),
(342, 'Tana Tidung', 24),
(343, 'Tarakan', 24),
(344, 'Bolaang Mongondow (Bolmong)', 25),
(345, 'Bolaang Mongondow Selatan', 25),
(346, 'Minahasa Selatan', 25),
(347, 'Bitung', 25),
(348, 'Minahasa', 25),
(349, 'Kepulauan Sangihe', 25),
(350, 'Minahasa Utara', 25),
(351, 'Kepulauan Talaud', 25),
(352, 'Kepulauan Siau Tagulandang Biaro (Sitaro)', 25),
(353, 'Manado', 25),
(354, 'Bolaang Mongondow Utara', 25),
(355, 'Bolaang Mongondow Timur', 25),
(356, 'Minahasa Tenggara', 25),
(357, 'Kotamobagu', 25),
(358, 'Tomohon', 25),
(359, 'Banggai Kepulauan', 26),
(360, 'Toli-Toli', 26),
(361, 'Parigi Moutong', 26),
(362, 'Buol', 26),
(363, 'Donggala', 26),
(364, 'Poso', 26),
(365, 'Morowali', 26),
(366, 'Tojo Una-Una', 26),
(367, 'Banggai', 26),
(368, 'Sigi', 26),
(369, 'Palu', 26),
(370, 'Maros', 27),
(371, 'Wajo', 27),
(372, 'Bone', 27),
(373, 'Soppeng', 27),
(374, 'Sidenreng Rappang / Rapang', 27),
(375, 'Takalar', 27),
(376, 'Barru', 27),
(377, 'Luwu Timur', 27),
(378, 'Sinjai', 27),
(379, 'Pangkajene Kepulauan', 27),
(380, 'Pinrang', 27),
(381, 'Jeneponto', 27),
(382, 'Palopo', 27),
(383, 'Toraja Utara', 27),
(384, 'Luwu', 27),
(385, 'Bulukumba', 27),
(386, 'Makassar', 27),
(387, 'Selayar (Kepulauan Selayar)', 27),
(388, 'Tana Toraja', 27),
(389, 'Luwu Utara', 27),
(390, 'Bantaeng', 27),
(391, 'Gowa', 27),
(392, 'Enrekang', 27),
(393, 'Parepare', 27),
(394, 'Kolaka', 28),
(395, 'Muna', 28),
(396, 'Konawe Selatan', 28),
(397, 'Kendari', 28),
(398, 'Konawe', 28),
(399, 'Konawe Utara', 28),
(400, 'Kolaka Utara', 28),
(401, 'Buton', 28),
(402, 'Bombana', 28),
(403, 'Wakatobi', 28),
(404, 'Bau-Bau', 28),
(405, 'Buton Utara', 28),
(406, 'Gorontalo Utara', 29),
(407, 'Bone Bolango', 29),
(408, 'Gorontalo', 29),
(409, 'Boalemo', 29),
(410, 'Pohuwato', 29),
(411, 'Majene', 30),
(412, 'Mamuju', 30),
(413, 'Mamuju Utara', 30),
(414, 'Polewali Mandar', 30),
(415, 'Mamasa', 30),
(416, 'Maluku Tenggara Barat', 31),
(417, 'Maluku Tenggara', 31),
(418, 'Seram Bagian Barat', 31),
(419, 'Maluku Tengah', 31),
(420, 'Seram Bagian Timur', 31),
(421, 'Maluku Barat Daya', 31),
(422, 'Ambon', 31),
(423, 'Buru', 31),
(424, 'Buru Selatan', 31),
(425, 'Kepulauan Aru', 31),
(426, 'Tual', 31),
(427, 'Halmahera Barat', 32),
(428, 'Tidore Kepulauan', 32),
(429, 'Ternate', 32),
(430, 'Pulau Morotai', 32),
(431, 'Kepulauan Sula', 32),
(432, 'Halmahera Selatan', 32),
(433, 'Halmahera Tengah', 32),
(434, 'Halmahera Timur', 32),
(435, 'Halmahera Utara', 32),
(436, 'Yalimo', 33),
(437, 'Dogiyai', 33),
(438, 'Asmat', 33),
(439, 'Jayapura', 33),
(440, 'Paniai', 33),
(441, 'Mappi', 33),
(442, 'Tolikara', 33),
(443, 'Puncak Jaya', 33),
(444, 'Pegunungan Bintang', 33),
(445, 'Jayawijaya', 33),
(446, 'Lanny Jaya', 33),
(447, 'Nduga', 33),
(448, 'Biak Numfor', 33),
(449, 'Kepulauan Yapen (Yapen Waropen)', 33),
(450, 'Puncak', 33),
(451, 'Intan Jaya', 33),
(452, 'Waropen', 33),
(453, 'Nabire', 33),
(454, 'Mimika', 33),
(455, 'Boven Digoel', 33),
(456, 'Yahukimo', 33),
(457, 'Sarmi', 33),
(458, 'Merauke', 33),
(459, 'Deiyai (Deliyai)', 33),
(460, 'Keerom', 33),
(461, 'Supiori', 33),
(462, 'Mamberamo Raya', 33),
(463, 'Mamberamo Tengah', 33),
(464, 'Raja Ampat', 34),
(465, 'Manokwari Selatan', 34),
(466, 'Manokwari', 34),
(467, 'Kaimana', 34),
(468, 'Maybrat', 34),
(469, 'Sorong Selatan', 34),
(470, 'Fakfak', 34),
(471, 'Pegunungan Arfak', 34),
(472, 'Tambrauw', 34),
(473, 'Sorong', 34),
(474, 'Teluk Wondama', 34),
(475, 'Teluk Bintuni', 34);

CREATE TABLE ktps(
	nik VARCHAR(20) NOT NULL,
	nama VARCHAR(100) DEFAULT NULL,
	tempat_lahir VARCHAR(50) DEFAULT NULL,
	tgl_lahir DATE DEFAULT NULL,
	jenis_kelamin VARCHAR(30) DEFAULT NULL,
	gol_darah VARCHAR(2) DEFAULT NULL,
	alamat VARCHAR(100) DEFAULT NULL,
	kelurahan VARCHAR(100) DEFAULT NULL,
	kecamatan VARCHAR(100) DEFAULT NULL,
	agama VARCHAR(50) DEFAULT NULL,
	status_kawin VARCHAR(30) DEFAULT NULL,
	pekerjaan VARCHAR(100) DEFAULT NULL,
	kewarganegaraan VARCHAR(100) DEFAULT NULL,
	berlaku VARCHAR(50) DEFAULT NULL,
	tgl_buat DATE DEFAULT NULL
);

INSERT INTO ktps(nama, nik, gol_darah, jenis_kelamin, tempat_lahir, tgl_lahir, alamat) VALUES
('Ari Sanjaya', '5103050101010001', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua'),
('Katon Jaya Deva Yogananada', '5103050101010002', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua'),
('Iwan Sandhitama', '5103050101010003', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua'),
('Dedo Karmanata', '5103050101010004', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua'),
('Walter Andrian', '5103050101010005', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua'),
('Meidi Dharma', '5103050101010006', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua'),
('Arditha Kartika Putra', '5103050101010007', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua');

CREATE TABLE pasiens(
	id_pasien INT AUTO_INCREMENT,
	nik VARCHAR(20) NOT NULL,
	nama VARCHAR(100) DEFAULT '',
	jenis_kelamin VARCHAR(30) DEFAULT '',
	gol_darah VARCHAR(2) DEFAULT '',
	tempat_lahir VARCHAR(60) DEFAULT '',
	tanggal_lahir DATE DEFAULT '2001-01-01',
    id_provinsi VARCHAR(50) DEFAULT '',
    id_kabupaten VARCHAR(50) DEFAULT '',
	alamat VARCHAR(100) DEFAULT '',
    kartu_rs VARCHAR(50) DEFAULT '',
    info_pasien VARCHAR(50) DEFAULT '',
    no_telp VARCHAR(20) DEFAULT '',
    email VARCHAR(50) DEFAULT '',
    created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP NOT NULL,
	PRIMARY KEY (id_pasien)
);

SET SQL_MODE='ALLOW_INVALID_DATES';

INSERT INTO pasiens(nama, nik, gol_darah, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, created_at, updated_at) VALUES
('Ari Sanjaya', '5103050101010001', 'A', 'Laki-laki', 'Badung', '2001-10-31', 'Nusa Dua', NOW(), NOW()),
('Katon Jaya Deva Yogananada', '5103050101010002', 'A', 'Laki-laki', 'Badung', '2002-05-24', 'Nusa Dua', NOW(), NOW()),
('Iwan Sandhitama', '5103050101010003', 'A', 'Laki-laki', 'Buleleng', '2002-08-20', 'Nusa Dua', NOW(), NOW()),
('Dedo Karmanata', '5103050101010004', 'A', 'Laki-laki', 'Karangasem', '2002-09-04', 'Nusa Dua', NOW(), NOW()),
('Walter Andrian', '5103050101010005', 'A', 'Laki-laki', 'Bekasi', '2002-08-09', 'Nusa Dua', NOW(), NOW()),
('Meidi Dharma', '5103050101010006', 'A', 'Laki-laki', 'Denpasar', '2002-5-28', 'Nusa Dua', NOW(), NOW()),
('Arditha Kartika Putra', '5103050101010007', 'A', 'Laki-laki', 'Badung', '2002-07-15', 'Nusa Dua', NOW(), NOW());

CREATE TABLE login(
	id_login INT(2) PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(60),
	password VARCHAR(100),
	role VARCHAR(30)
);

INSERT INTO login(username, password, role) VALUES
('admin', SHA1('admin1234'), 'Administrator');

-- Menampilkan data berdasarkan jumlah pasien bulan sekarang
SELECT 
    DAY(created_at)
FROM
    pasiens
WHERE
    DAY(created_at) = DAYOFMONTH(NOW());

SELECT 
    *
FROM
    pasiens
ORDER BY id_pasien DESC
LIMIT 1;

-- Menampilkan data 
SELECT 
    jenis_kelamin, COUNT(jenis_kelamin) AS jumlah
FROM
    pasiens
GROUP BY jenis_kelamin;

-- Buat view untuk menampilkan data berdasarkan bulan tahun sekarang
CREATE VIEW show_pasien_month AS SELECT MONTH
( created_at ) AS labels,
COUNT( MONTH ( created_at ) ) AS DATA 
FROM
	pasiens 
WHERE
	YEAR ( created_at ) = YEAR ( NOW( ) ) 
GROUP BY
	labels 
ORDER BY
	labels ASC;

-- Create view untuk menampilkan data berdasarkan jumlah gender
CREATE VIEW show_gender AS
    SELECT 
        jenis_kelamin, COUNT(jenis_kelamin) AS jumlah
    FROM
        pasiens
    GROUP BY jenis_kelamin;

-- Create view untuk menampilkan data berdasarkan range umur
CREATE VIEW show_umur AS
SELECT
    CASE
        WHEN umur < 20 THEN '0 - 20'
        WHEN umur BETWEEN 20 AND 40 THEN '20 - 40'
        WHEN umur BETWEEN 41 AND 60 THEN '41 - 60'
        WHEN umur >= 61 THEN '61 - 100'
        WHEN umur IS NULL THEN '(NULL)'
    END AS labels,
    COUNT(*) AS jumlah

FROM (SELECT TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur FROM pasiens) AS dummy_table
GROUP BY labels
ORDER BY labels;

CREATE TABLE kop_surat(
    id_kop INT PRIMARY KEY AUTO_INCREMENT,
    nama_instansi VARCHAR(60) DEFAULT '',
    gambar_instansi VARCHAR(255) DEFAULT '',
    id_provinsi int DEFAULT ,
    id_kabupaten int,
    email VARCHAR(60),
    no_telp VARCHAR(30),
    alamat VARCHAR(60),
    foreign key (id_provinsi) references provinsi(id_provinsi),
    foreign key (id_kabupaten) references kabupaten(id_kabupaten)
);

INSERT INTO kop_surat(nama_instansi, gambar_instansi, id_provinsi, id_kabupaten, email, no_telp, alamat) VALUES
('Rumah Sakit Surya Husada', 'rumahsakit.png', 17, 255, 'suryahusada@gmail.com', '036122003311', 'Jalan ByPass Ngurah Rai 99x');


-- select * from pasiens 
-- where date(created_at) between '2012-03-11' and '2012-05-11' 
-- order by date(created_at) desc;






