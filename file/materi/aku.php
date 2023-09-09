<?php

mysql_query ("CREATE TABLE IF NOT EXISTS sh_agenda (
  id_agenda int(11) NOT NULL AUTO_INCREMENT,
  judul_agenda varchar(50) NOT NULL,
  tanggal_agenda date NOT NULL,
  tempat_agenda varchar(50) NOT NULL,
  keterangan_agenda text NOT NULL,
  s_username varchar(30) NOT NULL,
  PRIMARY KEY (id_agenda)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_album (
  id_album int(11) NOT NULL AUTO_INCREMENT,
  nama_album varchar(30) NOT NULL,
  tanggal_album date NOT NULL,
  deskripsi_album text NOT NULL,
  foto_album varchar(30) NOT NULL,
  PRIMARY KEY (id_album)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_berita (
  id_berita int(11) NOT NULL AUTO_INCREMENT,
  judul_berita varchar(100) NOT NULL,
  isi_berita text NOT NULL,
  tanggal_posting date NOT NULL,
  gambar_kecil varchar(50) NOT NULL,
  status_terbit int(1) NOT NULL,
  status_komentar int(1) NOT NULL,
  status_headline int(1) NOT NULL,
  s_username varchar(30) NOT NULL,
  id_kategori int(11) NOT NULL,
  PRIMARY KEY (id_berita)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_buku_tamu (
  id_bukutamu int(11) NOT NULL AUTO_INCREMENT,
  nama_bukutamu varchar(30) NOT NULL,
  subjek text NOT NULL,
  isi_pesan text NOT NULL,
  email varchar(30) NOT NULL,
  tanggal_kirim date NOT NULL,
  status int(1) NOT NULL,
  PRIMARY KEY (id_bukutamu)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_galeri (
  id_galeri int(11) NOT NULL AUTO_INCREMENT,
  nama_galeri varchar(100) NOT NULL,
  id_album int(11) NOT NULL,
  tanggal_galeri date NOT NULL,
  PRIMARY KEY (id_galeri)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_guru_staff (
  id_gurustaff int(11) NOT NULL AUTO_INCREMENT,
  nip varchar(30) NOT NULL,
  posisi varchar(5) NOT NULL,
  nama_gurustaff varchar(30) NOT NULL,
  password varchar(50) NOT NULL,
  foto varchar(50) NOT NULL,
  jenkel varchar(1) NOT NULL,
  id_mapel int(11) NOT NULL,
  id_jabatan int(11) NOT NULL,
  alamat text NOT NULL,
  status_kawin varchar(20) NOT NULL,
  tahun_masuk year(4) NOT NULL,
  pendidikan_terakhir varchar(20) NOT NULL,
  email varchar(30) NOT NULL,
  telepon varchar(15) NOT NULL,
  tempat_lahir varchar(30) NOT NULL,
  tanggal_lahir date NOT NULL,
  PRIMARY KEY (id_gurustaff)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_info_sekolah (
  id_info int(11) NOT NULL AUTO_INCREMENT,
  nama_info varchar(50) NOT NULL,
  isi_info text NOT NULL,
  tanggal_info date NOT NULL,
  posisi_menu int(1) NOT NULL,
  status_terbit int(1) NOT NULL,
  PRIMARY KEY (id_info)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_jabatan (
  id_jabatan int(11) NOT NULL AUTO_INCREMENT,
  nama_jabatan varchar(30) NOT NULL,
  deskripsi_jabatan text NOT NULL,
  PRIMARY KEY (id_jabatan)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;";


mysql_query ("CREATE TABLE IF NOT EXISTS sh_kategori (
  id_kategori int(11) NOT NULL AUTO_INCREMENT,
  nama_kategori varchar(50) NOT NULL,
  deskripsi_kategori text NOT NULL,
  PRIMARY KEY (id_kategori)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_kelas (
  id_kelas int(11) NOT NULL AUTO_INCREMENT,
  nama_kelas varchar(30) NOT NULL,
  deskripsi_kelas text NOT NULL,
  nip varchar(30) NOT NULL,
  PRIMARY KEY (id_kelas)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_komentar (
  id_komentar int(11) NOT NULL AUTO_INCREMENT,
  id_berita int(11) NOT NULL,
  nama_komentar varchar(25) NOT NULL,
  email_komentar varchar(30) NOT NULL,
  isi_komentar text NOT NULL,
  tanggal_komentar date NOT NULL,
  status_terima int(1) NOT NULL,
  PRIMARY KEY (id_komentar)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_mapel (
  id_mapel int(11) NOT NULL AUTO_INCREMENT,
  nama_mapel varchar(30) NOT NULL,
  deskripsi_mapel text NOT NULL,
  PRIMARY KEY (id_mapel)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_materi (
  id_materi int(11) NOT NULL AUTO_INCREMENT,
  file_materi varchar(50) NOT NULL,
  judul_materi text NOT NULL,
  deskripsi_materi text NOT NULL,
  id_mapel int(11) NOT NULL,
  nip varchar(30) NOT NULL,
  tanggal_upload date NOT NULL,
  download int(11) NOT NULL,
  PRIMARY KEY (id_materi)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_pengaturan (
  id_pengaturan int(11) NOT NULL AUTO_INCREMENT,
  nama_pengaturan varchar(50) NOT NULL,
  isi_pengaturan text NOT NULL,
  isi_pengaturan2 text NOT NULL,
  PRIMARY KEY (id_pengaturan)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_pengumuman (
  id_pengumuman int(11) NOT NULL AUTO_INCREMENT,
  judul_pengumuman varchar(50) NOT NULL,
  isi_pengumuman text NOT NULL,
  tanggal_pengumuman date NOT NULL,
  s_username varchar(30) NOT NULL,
  PRIMARY KEY (id_pengumuman)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_psb (
  id_psb int(11) NOT NULL AUTO_INCREMENT,
  nama_psb varchar(30) NOT NULL,
  nem varchar(5) NOT NULL,
  jenkel varchar(1) NOT NULL,
  sekolah_asal text NOT NULL,
  no_sttb varchar(15) NOT NULL,
  tanggal_sttb date NOT NULL,
  tempat_lahir varchar(30) NOT NULL,
  tanggal_lahir date NOT NULL,
  bb int(3) NOT NULL,
  tb int(3) NOT NULL,
  status_psb int(1) NOT NULL,
  tanggal_psb date NOT NULL,
  nama_ortu varchar(30) NOT NULL,
  pekerjaan_ortu varchar(50) NOT NULL,
  alamat_psb text NOT NULL,
  polling_psb varchar(20) NOT NULL,
  telepon varchar(15) NOT NULL,
  email varchar(30) NOT NULL,
  PRIMARY KEY (id_psb)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_sidebar (
  id_sidebar int(11) NOT NULL AUTO_INCREMENT,
  jenis varchar(20) NOT NULL,
  status int(1) NOT NULL,
  nama varchar(50) NOT NULL,
  isi1 text NOT NULL,
  isi2 text NOT NULL,
  PRIMARY KEY (id_sidebar)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_siswa (
  id_siswa int(11) NOT NULL AUTO_INCREMENT,
  nis int(10) NOT NULL,
  nama_siswa varchar(30) NOT NULL,
  password varchar(50) NOT NULL,
  jenkel varchar(1) NOT NULL,
  tempat_lahir varchar(30) NOT NULL,
  tanggal_lahir date NOT NULL,
  alamat text NOT NULL,
  tahun_registrasi year(4) NOT NULL,
  tahun_lulus year(4) NOT NULL,
  sekolah_asal text NOT NULL,
  email varchar(30) NOT NULL,
  telepon varchar(15) NOT NULL,
  status_siswa int(1) NOT NULL,
  id_kelas int(11) NOT NULL,
  nama_ortu varchar(30) NOT NULL,
  pekerjaan_ortu varchar(50) NOT NULL,
  pekerjaan_sekarang text NOT NULL,
  info_tambahan text NOT NULL,
  PRIMARY KEY (id_siswa),
  KEY id_siswa (id_siswa)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_statistik (
  ip_addres varchar(20) NOT NULL,
  tanggal date NOT NULL,
  mengunjungi int(10) NOT NULL,
  online int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_tema (
  id_tema int(11) NOT NULL AUTO_INCREMENT,
  nama_tema varchar(30) NOT NULL,
  pembuat varchar(30) NOT NULL,
  url_pembuat varchar(30) NOT NULL,
  deskripsi text NOT NULL,
  tahun year(4) NOT NULL,
  status int(1) NOT NULL,
  PRIMARY KEY (id_tema)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_users (
  id_users varchar(50) NOT NULL,
  namausers varchar(30) NOT NULL,
  sandiusers varchar(50) NOT NULL,
  nama_lengkap_users varchar(30) NOT NULL,
  level_users varchar(30) NOT NULL,
  s_username varchar(30) NOT NULL,
  login_terakhir datetime NOT NULL,
  email_users varchar(50) NOT NULL,
  PRIMARY KEY (s_username)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");