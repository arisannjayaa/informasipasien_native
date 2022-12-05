CREATE DATABASE db_informasipasien_native;

USE db_informasipasien_native;

CREATE TABLE ktps(
	`nik` VARCHAR(20) NOT NULL,
  `nama` VARCHAR(100) DEFAULT NULL,
  `tempat_lahir` VARCHAR(50) DEFAULT NULL,
  `tgl_lahir` DATE DEFAULT NULL,
  `jenis_kelamin` VARCHAR(30) DEFAULT NULL,
  `gol_darah` VARCHAR(2) DEFAULT NULL,
  `alamat` VARCHAR(100) DEFAULT NULL,
  `kelurahan` VARCHAR(100) DEFAULT NULL,
  `kecamatan` VARCHAR(100) DEFAULT NULL,
  `agama` VARCHAR(50) DEFAULT NULL,
  `status_kawin` VARCHAR(30) DEFAULT NULL,
  `pekerjaan` VARCHAR(100) DEFAULT NULL,
  `kewarganegaraan` VARCHAR(100) DEFAULT NULL,
  `berlaku` VARCHAR(50) DEFAULT NULL,
  `tgl_buat` DATE DEFAULT NULL
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
	nama VARCHAR(100) NOT NULL,
	jenis_kelamin VARCHAR(30) NOT NULL,
	gol_darah VARCHAR(2) NOT NULL,
	tempat_lahir VARCHAR(60) NOT NULL,
	tanggal_lahir DATE NOT NULL,
	alamat VARCHAR(100) NOT NULL,
    kartu_rs VARCHAR(50),
    info_pasien VARCHAR(50),
    no_telp VARCHAR(20),
    email VARCHAR(50),
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
	PASSWORD VARCHAR(100),
	ROLE VARCHAR(30)
);

INSERT INTO login(username, PASSWORD, ROLE) VALUES
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
