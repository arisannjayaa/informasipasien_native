CREATE db_satudata;

USE db_satudata;

CREATE TABLE `tb_ktp` (
    `nik` varchar(20) NOT NULL PRIMARY KEY,
    `nama` varchar(100) DEFAULT NULL,
    `tempat_lahir` varchar(50) DEFAULT NULL,
    `tgl_lahir` date DEFAULT NULL,
    `jenis_kelamin` varchar(30) DEFAULT NULL,
    `gol_darah` varchar(2) DEFAULT NULL,
    `alamat` varchar(100) DEFAULT NULL,
    `kelurahan` varchar(100) DEFAULT NULL,
    `kecamatan` varchar(100) DEFAULT NULL,
    `agama` varchar(50) DEFAULT NULL,
    `status_kawin` varchar(30) DEFAULT NULL,
    `pekerjaan` varchar(100) DEFAULT NULL,
    `kewarganegaraan` varchar(100) DEFAULT NULL,
    `berlaku` varchar(50) DEFAULT NULL,
    `tgl_buat` date DEFAULT NULL
);

INSERT INTO tb_ktp VALUES
('5103050101010001', 'Ari Sanjaya', 'Badung', '2001-01-01', 'Laki-Laki', 'O', 'Jalan Raya Kampus Unud No.1', 'Benoa', 'Kuta Selatan', 'Hindu', 'Belum', 'Mahasiswa', 'WNI', 'Seumur Hidup', NOW()),
('5103050101010002', 'Katon Jaya Deva Yogananada', 'Denpasar', '2002-10-01', 'Laki-Laki', 'A', 'Jalan Raya Kampus Unud No.1', 'Jimabaran', 'Kuta Selatan', 'Hindu', 'Belum', 'Mahasiswa', 'WNI', 'Seumur Hidup', NOW()),
('5103050101010003', 'Walter Andrian', 'Bekasi', '2002-05-22', 'Laki-Laki', 'AB', 'Jalan Raya Kampus Unud No.1', 'Benoa', 'Kuta Selatan', 'Kristen', 'Belum', 'Mahasiswa', 'WNI', 'Seumur Hidup', NOW()),
('5103050101010004', 'Iwan Sandhitama', 'Buleleng', '2002-04-08', 'Laki-Laki', 'O', 'Jalan Raya Kampus Unud No.1', 'Jimabaran', 'Kuta Selatan', 'Hindu', 'Belum', 'Mahasiswa', 'WNI', 'Seumur Hidup', NOW()),
('5103050101010005', 'Dedo Karmanata', 'Karangasem', '2001-12-11', 'Laki-Laki', 'O', 'Jalan Raya Kampus Unud No.1', 'Jimbaran', 'Kuta Selatan', 'Hindu', 'Belum', 'Mahasiswa', 'WNI', 'Seumur Hidup', NOW()),
('5103050101010006', 'Arditha Kartika Putra', 'Badung', '2002-05-23', 'Laki-Laki', 'O', 'Jalan Raya Kampus Unud No.1', 'Ungasan', 'Kuta Selatan', 'Hindu', 'Belum', 'Mahasiswa', 'WNI', 'Seumur Hidup', NOW()),
('5103050101010007', 'Meidi Dharma Saputra', 'Buleleng', '2002-08-10', 'Laki-Laki', 'O', 'Jalan Raya Kampus Unud No.1', 'Ungasan', 'Kuta Selatan', 'Hindu', 'Belum', 'Mahasiswa', 'WNI', 'Seumur Hidup', NOW());
