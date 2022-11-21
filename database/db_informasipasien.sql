CREATE DATABASE db_informasipasien_native;

USE db_informasipasien_native;

CREATE TABLE ktps(
	`nik` varchar(20) NOT NULL,
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

INSERT INTO ktps(nama, nik, gol_darah, jenis_kelamin, tempat_lahir, tgl_lahir, alamat) VALUES
('Ari Sanjaya', '5103050101010001', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua'),
('Katon Jaya Deva Yogananada', '5103050101010002', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua'),
('Iwan Sandhitama', '5103050101010003', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua'),
('Dedo Karmanata', '5103050101010004', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua'),
('Walter Andrian', '5103050101010005', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua'),
('Meidi Dharma', '5103050101010006', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua'),
('Arditha Kartika Putra', '5103050101010007', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua');

CREATE TABLE pasiens(
	id_pasien INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nik VARCHAR(20) NOT NULL,
	nama VARCHAR(100) NOT NULL,
	jenis_kelamin varchar(30) NOT NULL,
	gol_darah VARCHAR(2) NOT NULL,
	tempat_lahir VARCHAR(60) NOT NULL,
	tanggal_lahir DATE NOT NULL,
	alamat VARCHAR(100) NOT NULL,
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP NOT NULL
);

INSERT INTO pasiens(nama, nik, gol_darah, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, created_at, updated_at) VALUES
('Ari Sanjaya', '5103050101010001', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua', NOW(), NOW()),
('Katon Jaya Deva Yogananada', '5103050101010002', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua', NOW(), NOW()),
('Iwan Sandhitama', '5103050101010003', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua', NOW(), NOW()),
('Dedo Karmanata', '5103050101010004', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua', NOW(), NOW()),
('Walter Andrian', '5103050101010005', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua', NOW(), NOW()),
('Meidi Dharma', '5103050101010006', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua', NOW(), NOW()),
('Arditha Kartika Putra', '5103050101010007', 'A', 'Laki-laki', 'Badung', '2001-01-01', 'Nusa Dua', NOW(), NOW());

SELECT * FROM pasiens;


CREATE TABLE login(
	id_login INT(2) PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(60),
	password VARCHAR(100),
	role VARCHAR(30)
);

INSERT INTO login(username, password, role) VALUES
('admin', SHA1('admin1234'), 'Administrator');

SELECT * FROM login WHERE username='admin' AND PASSWORD='';

SELECT DAY(created_at) FROM pasiens WHERE DAY(created_at) = DAYOFMONTH(NOW());

SELECT * FROM pasiens ORDER BY id_pasien DESC LIMIT 1;

SELECT COUNT(MONTHNAME(created_at)) AS jumlah FROM pasiens GROUP BY MONTHNAME(created_at) ORDER BY MONTHNAME(created_at) DESC;

SELECT 
    COUNT(MONTHNAME(created_at)) AS jumlah,
    MONTHNAME(created_at) AS labels,
    day(created_at)
FROM
    pasiens
GROUP BY labels
ORDER BY month(labels);

SELECT 
    *
FROM
    pasiens;
    
select jenis_kelamin, count(jenis_kelamin) as jumlah from pasiens group by jenis_kelamin;

use db_informasipasien_native;

SELECT 
    MONTH(created_at) AS labels,
    COUNT(MONTH(created_at)) AS data
FROM
    pasiens
GROUP BY labels
ORDER BY labels ASC;