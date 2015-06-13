<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Module_Simpatda extends Module {

    public $version = '1.0';

    public function info() {
        return array(
            'name' => array(
                'en' => 'Simpatda System'
            ),
            'description' => array(
                'en' => 'Simpatda is a tool created for the purpose of assisting users in making data collection or determination of taxes and levies.'
            ),
            'frontend' => TRUE,
            'backend' => TRUE,
            'menu' => 'content'
        );
    }

    public function install() {
        		$this->dbforge->drop_table('simp_usergroup');
        		$this->dbforge->drop_table('simp_jenis');
        		$this->dbforge->drop_table('simp_organisasi');
        		$this->dbforge->drop_table('simp_pegawai');
        		$this->dbforge->drop_table('simp_rekening');
                $this->dbforge->drop_table('simp_reklame');
        		$this->dbforge->drop_table('simp_rms_reklame');
        		$this->dbforge->drop_table('simp_system');
        		$this->dbforge->drop_table('simp_user');
        		$this->dbforge->drop_table('simp_user_organisasi');
        		$this->dbforge->drop_table('simp_wilayah');
                $this->dbforge->drop_table('simp_info_kontrak');
                $this->dbforge->drop_table('simp_no_daftar');
                $this->dbforge->drop_table('simp_pendaftaran');
                $this->dbforge->drop_table('simp_pendataan');
                $this->dbforge->drop_table('simp_pendataan_reklame');
                $this->dbforge->drop_table('simp_penetapan');
                $this->dbforge->drop_table('simp_penetapan_reklame');
                $this->dbforge->drop_table('simp_wajib_pajak');
                $this->dbforge->drop_table('simp_wajib_pajak_izin');
                $this->dbforge->drop_table('simp_wajib_pajak_kewajiban');
		
        
                

        $simp_usergroup =   "CREATE TABLE IF NOT EXISTS " . $this->db->dbprefix('simp_usergroup') . " (
                            `Insert`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL ,
                            `Change`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL ,
                            `Delete`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL ,
                            `Browse`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL ,
                            `Access`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL ,
                            `Print`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL ,
                            `Print2`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL ,
                            `Print3`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL ,
                            `Change_StatusAP`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL ,
                            `Change_StatusAR`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL ,
                            `Change_StatusIN`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL ,
                            `LACC_SO`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT 'N' COMMENT 'Y = DI Izinkan untuk memberikan Acc SO N = Tidak dI Izinkan untuk memberikan Acc SO' ,
                            `LACC_SLD_Hutang`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT 'N' COMMENT 'Y = DI Izinkan untuk memberikan Acc Saldo Awal Hutang N = Tidak dI Izinkan untuk memberikan Acc Saldo Awal Hutang' ,
                            `LACC_PO`  char(1) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT 'N' COMMENT 'Y = DI Izinkan untuk memberikan Acc Saldo Awal Hutang N = Tidak dI Izinkan untuk memberikan Acc Saldo Awal Hutang' ,
                            `Transaksi_`  smallint(6) NULL DEFAULT 0 COMMENT '0: No Akses | 1: Akses' ,
                            `TransaksiPendaftaran_`  smallint(6) NULL DEFAULT 0 ,
                            `TransaksiPendataan_`  smallint(6) NULL DEFAULT 0 ,
                            `TransaksiCetakNPWPD_`  smallint(6) NULL DEFAULT 0 ,
                            `TransaksiPenetapan_`  smallint(6) NULL DEFAULT 0 ,
                            `TransaksiPenerbitan_`  smallint(6) NULL DEFAULT 0 ,
                            `TransaksiPelunasan_`  smallint(6) NULL DEFAULT 0 ,
                            `Laporan_`  smallint(6) NULL DEFAULT 0 ,
                            `LaporanPendaftaran_`  smallint(6) NULL DEFAULT 0 ,
                            `LaporanPenetapan_`  smallint(6) NULL DEFAULT 0 ,
                            `LaporanKartu_`  smallint(6) NULL DEFAULT 0 ,
                            `LaporanKartuMineral_`  smallint(6) NULL DEFAULT 0 ,
                            `LaporanKartuHarga_`  smallint(6) NULL DEFAULT 0 ,
                            `LaporanKartuHargaUmum_`  smallint(6) NULL DEFAULT 0 ,
                            `LaporanKartuHargaKhusus_`  smallint(6) NULL DEFAULT 0 ,
                            `LaporanKartuHargaLainnya_`  smallint(6) NULL DEFAULT 0 ,
                            `LaporanPenerimaan_`  smallint(6) NULL DEFAULT 0 ,
                            `LaporanPenerimaanRincian_`  smallint(6) NULL DEFAULT 0 ,
                            `Master_`  smallint(6) NULL DEFAULT 0 ,
                            `MasterWilayah_`  smallint(6) NULL DEFAULT 0 ,
                            `MasterJenisUsaha_`  smallint(6) NULL DEFAULT 0 ,
                            `MasterWajibPajak_`  smallint(6) NULL DEFAULT 0 ,
                            `MasterRekening_`  smallint(6) NULL DEFAULT 0 ,
                            `MasterBebanPajak_`  smallint(6) NULL DEFAULT 0 ,
                            `MasterOrganisasi_`  smallint(6) NULL DEFAULT 0 ,
                            `MasterPegawai_`  smallint(6) NULL DEFAULT 0 ,
                            `MasterPemakai_`  smallint(6) NULL DEFAULT 0 ,
                            `MasterRumusReklame_`  smallint(6) NULL DEFAULT 0 ,
                            `Utilities_`  smallint(6) NULL DEFAULT 0 ,
                            `UtilitiesUser_`  smallint(6) NULL DEFAULT 0 ,
                            `UtilitiesSystem_`  smallint(6) NULL DEFAULT 0 ,
                            `UserID`  varchar(15) CHARACTER SET ascii COLLATE ascii_bin NOT NULL DEFAULT '' ,
                            `TransaksiPendaftaranWPLama`  smallint(6) NULL DEFAULT 0 ,
                            `Backup`  smallint(6) NULL DEFAULT NULL ,
                            `Restore`  smallint(6) NULL DEFAULT NULL ,
                             PRIMARY KEY (`UserID`)
                          ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

        $simp_jenis =   "CREATE TABLE IF NOT EXISTS  " . $this->db->dbprefix('simp_jenis') ." (
                        `id` int(11) NOT NULL AUTO_INCREMENT                        
                        `JUsahaID` smallint(6) NOT NULL DEFAULT '0' COMMENT '0: Jenis Konstruksi || 1: Perdagangan Umum || 2: Lain-Lain',
                        `Description` varchar(50) DEFAULT NULL,
                        PRIMARY KEY (`JUsahaID`),
                        UNIQUE KEY `name_UNIQUE` (`Description`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $simp_organisasi = "CREATE TABLE IF NOT EXISTS " . $this->db->dbprefix('simp_organisasi') ." (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `Kode` varchar(15) NOT NULL DEFAULT '',
                            `UnitDescription` varchar(50) DEFAULT NULL,
                            `Level` smallint(6) DEFAULT '1',
                            `ID` varchar(15) DEFAULT NULL,
                            `Unit` varchar(50) DEFAULT NULL,
                            `Ket` varchar(255) DEFAULT NULL,  
                            PRIMARY KEY (`kode`)
                          ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $simp_pegawai   =   "CREATE TABLE IF NOT EXISTS " . $this->db->dbprefix('simp_pegawai') ." (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `NIP` varchar(20) NOT NULL,
                            `Nama_Pegawai` varchar(50) DEFAULT NULL,
                            `Jabatan` varchar(30) DEFAULT NULL,
                            `Alamat` varchar(50) DEFAULT NULL,
                            `Kota` varchar(20) DEFAULT NULL,
                            `NoTelp` varchar(20) DEFAULT NULL,
                            `KC` char(2) DEFAULT '' COMMENT 'KP = Untuk default nama yang tercetak di SKPD hal 1\r\nBP = Untuk default nama yang tercetak di SKPD hal 2',
                            PRIMARY KEY (`NIP`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $simp_rekening =    "CREATE TABLE IF NOT EXISTS " . $this->db->dbprefix('simp_rekening') ." (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `AkunID` char(15) NOT NULL,
                            `Description` varchar(50) DEFAULT NULL,
                            `Stat_` smallint(6) DEFAULT '1' COMMENT '1: Rekening || 2: Subject || 3: Object || 4 : Detail || 5 : Sub Detail',
                            `DescriptionRekening` varchar(50) DEFAULT NULL COMMENT 'Terisi jika stat_ = [2,3,4]',
                            `DescriptionSubject` varchar(50) DEFAULT NULL COMMENT 'Terisi jika stat_ = [3,4]',
                            `DescriptionObject` varchar(50) DEFAULT NULL COMMENT 'Terisi jika stat_ = [4]',
                            `DescriptionDetail` varchar(50) DEFAULT NULL,
                            `RekeningID` char(15) DEFAULT NULL COMMENT 'Terisi jika stat_ = [2,3,4]',
                            `SubjectID` char(15) DEFAULT NULL COMMENT 'Terisi jika stat_ = [3,4]',
                            `ObjectID` char(15) DEFAULT NULL COMMENT 'Terisi jika stat_ = [4]',
                            `DetailID` char(15) DEFAULT NULL,
                            `Stat2_` smallint(1) DEFAULT '0' COMMENT 'Digunakan untuk status bahwa ini pajak atau retribusi dan selain dari keduanya menunjukkan itu adalah umum\r\nDimana\r\n0 : Umum\r\n1 : Pajak\r\n2 : Retribusi',
                            `Stat21_` smallint(6) DEFAULT '0' COMMENT 'Status yang menunjukkan bahwa ini merupakan sub dari Pajak atau Retribusi\r\nDimana\r\n0 : Menunjukkan Tidak\r\n1 : Menunjukkan Ya',
                            `StatRincian` smallint(6) DEFAULT '0' COMMENT 'Merupakan field yang menunjukkan ada status Rincian atau tidak\r\nDimana\r\n0 : Tidak Ada Rincian\r\n1 : Ada Rincian',
                            `StatHitung` smallint(6) DEFAULT '0' COMMENT 'Merupakan Jenis Perhitungan yang dikenakan\r\ndimana \r\n1 : Tarif Umum\r\n2 : Tarif Khusus - 1\r\n3 : Tarif Khusus - 2\r\n0 : Tidak Memilih',
                            `Periode` varchar(4) DEFAULT NULL COMMENT 'Periode ini menunjukkan untuk tahun dan bln\r\n0:Periode\r\n1:Bulan\r\n2:Tahun',
                            `Prosen` decimal(7,2) DEFAULT '0.00' COMMENT 'Merupakan field untuk perhitungan prosentase',
                            `HargaDasar` decimal(28,8) DEFAULT '0.00000000' COMMENT 'Field dari harga dasar pajak atau retribusi',
                            `Satuan` varchar(10) DEFAULT NULL COMMENT 'Field satuan untuk Jenis Pajak atau retribusi ataupun umum',
                            `_pajak` decimal(7,2) DEFAULT NULL,
                            PRIMARY KEY (`AkunID`)
                          ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";
        
        $simp_reklame =     "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('gpsi_reports') ." (
                            `id` int(11) NOT NULL AUTO_INCREMENT, 
                            `AkunID` varchar(15) NOT NULL,
                            `Stat_` char(1) DEFAULT NULL,
                            `Description` varchar(60) DEFAULT NULL,
                            `HargaDasar` decimal(10,0) DEFAULT NULL,
                            `Satuan` varchar(10) DEFAULT NULL,
                            `Keterangan` varchar(100) DEFAULT NULL,
                            `Prosentase` decimal(10,0) DEFAULT '0',
                            PRIMARY KEY (`id`,`AkunID`)
                          ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $simp_rms_reklame = "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('simp_rms_reklame') ." (
                            `ThnPeriode` char(4) NOT NULL,
                            `Thn_` double(5,2) DEFAULT NULL,
                            `Bln_` double(5,2) DEFAULT NULL,
                            `Minggu_` double(5,2) DEFAULT NULL,
                            `Hari_` double(5,2) DEFAULT NULL,
                            `JlnNegara` double(5,2) DEFAULT NULL,
                            `JlnKabupaten` double(5,2) DEFAULT NULL,
                            `JlnLingkungan` double(5,2) DEFAULT NULL,
                            `SdtPandang>2` double(5,2) DEFAULT NULL,
                            `SdtPandang2` double(5,2) DEFAULT NULL,
                            `SdtPandang1` double(5,2) DEFAULT NULL,
                            `LokasiKhusus` double(5,2) DEFAULT NULL,
                            `LokasiBiasa` double(5,2) DEFAULT NULL,
                            PRIMARY KEY (`ThnPeriode`)
                          ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        
        $simp_system =      "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('simp_system') ." (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `kode` char(5) NOT NULL DEFAULT '',
                            `tanggal_pasang` datetime DEFAULT NULL,
                            `nama_aplikasi` varchar(100) DEFAULT NULL,
                            `Alamat_aplikasi` varchar(100) DEFAULT NULL,
                            `no_telp1` varchar(20) DEFAULT NULL,
                            `no_telp2` varchar(20) DEFAULT NULL,
                            `kota` varchar(20) DEFAULT NULL,
                            `beban_administrasi` float DEFAULT NULL,
                            `biaya` float DEFAULT NULL,
                            `sumbangan` float DEFAULT NULL,
                            `Logo` varchar(100) DEFAULT NULL,
                            `logo2` blob,
                            `copyright` varchar(50) DEFAULT NULL,
                            `biayaPemakaian` float DEFAULT NULL,
                            `version` char(20) DEFAULT NULL,
                            `BatasWaktu` float DEFAULT '25',
                            `kdBios` varchar(255) DEFAULT NULL,
                            `tglBios` datetime DEFAULT NULL,
                            `TimeTrial` float DEFAULT '30',
                            `TimeTrialRunning` float DEFAULT '0',
                            `ucapan` varchar(255) DEFAULT NULL,
                            `Denda` smallint(1) DEFAULT '1' COMMENT '1 : Entry denda oleh user secara automatis\r\n0 : Entry denda oleh user secara manual',
                            `StatNoPenetapan` smallint(6) NOT NULL DEFAULT '1' COMMENT 'Jika 1 maka automatic dan jika 0 maka manual',
                            PRIMARY KEY (`id`),
                            UNIQUE KEY `Kode_UNIQUE` (`kode`)
                          ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $simp_user =      "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('simp_user') ." (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `userID` varchar(15) NOT NULL DEFAULT '',
                            `pass` varchar(50) DEFAULT NULL,
                            `Nm_user` varchar(30) DEFAULT NULL,
                            `lnoaktif` char(1) DEFAULT '0',
                             PRIMARY KEY (`id`),
                            UNIQUE KEY `name_UNIQUE` (`userID`)
                          ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $simp_user_organisasi = "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('simp_user_organisasi') ." (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `UserID` varchar(10) NOT NULL,
                                `OrganisasiID` varchar(15) NOT NULL,
                                PRIMARY KEY (`UserID`,`OrganisasiID`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $simp_wilayah =  "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('simp_wilayah') ." (
                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                `WilayahID` char(10) NOT NULL,
                                `Nama` varchar(50) DEFAULT NULL,
                                `Stat_` smallint(1) DEFAULT '1' COMMENT '1: Kabupaten || 2 : Kecamatan || 3 : Desa',
                                `NamaKabupaten` varchar(50) DEFAULT NULL COMMENT 'Jika Status 2 dan 3 maka Nama Kabupaten diisi dari Nama dengan Stat_ = 1',
                                `NamaKecamatan` varchar(50) DEFAULT NULL COMMENT 'Jika Status 2 dan 3 maka Nama Kabupaten diisi dari Nama dengan Stat_ = 1',
                                `KodeKabupaten` char(10) DEFAULT NULL COMMENT 'Jika Status 2 dan 3 maka Kode Kabupaten diisi dari WilayahID dengan Stat_ = 1',
                                `KodeKecamatan` char(10) DEFAULT NULL COMMENT 'Jika Status 2 dan 3 maka Kode Kecamatan diisi dari WilayahID dengan Stat_ = 2',
                                `changed_by` varchar(12) DEFAULT NULL,
                                `Last_Modified` datetime DEFAULT NULL,
                                PRIMARY KEY (`WilayahID`),
                                UNIQUE KEY `name_UNIQUE` (`Nama`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $simp_info_kontrak =    "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('simp_info_kontrak') ." (
                                `npwpd` varchar(20) NOT NULL,
                                `noformulir` varchar(12) NOT NULL,
                                `nokontrak` varchar(50) DEFAULT NULL,
                                `keterangan` varchar(255) DEFAULT NULL,
                                `nilaikontrak` decimal(28,8) DEFAULT NULL,
                                PRIMARY KEY (`npwpd`,`noformulir`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
       
        $simp_no_daftar    =    "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('simp_no_daftar') ."(
                                `NoForm` varchar(10) NOT NULL,
                                `NPWPD` varchar(20) NOT NULL,
                                PRIMARY KEY (`NoForm`,`NPWPD`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        
        $simp_pendaftaran  =    "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('simp_pendaftaran') ."(
                                `Tgl_Daftar` date NOT NULL,
                                `No_Form_Daftar` char(10) NOT NULL,
                                `NPWPD` varchar(20) NOT NULL,
                                `User_ID` char(10) DEFAULT NULL,
                                `Stat_` tinyint(4) DEFAULT '0' COMMENT '0 : Sudah || 1 : Belum || 2 : Sambung',
                                `No_Urut_Form_Thn` smallint(7) DEFAULT NULL,
                                `No_Urut_NPWPD_Thn` smallint(7) DEFAULT NULL,
                                `TglU` datetime DEFAULT NULL,
                                `NMPenerima` varchar(20) DEFAULT NULL,
                                `NMPencatat` varchar(20) DEFAULT NULL,
                                `statWP` smallint(1) DEFAULT '0' COMMENT '0 : Laporan WP || 1 : Laporan Pendataan',
                                PRIMARY KEY (`Tgl_Daftar`,`No_Form_Daftar`,`NPWPD`),
                                KEY `FKNPWPD_WP` (`NPWPD`) USING BTREE,
                                KEY `No_Form_Daftar` (`No_Form_Daftar`)
                              ) ENGINE=InnoDB DEFAULT Charset=latin1";
        
        $simp_pendataan =   "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('simp_pendataan') ."(
                            `TglDaftar` date NOT NULL,
                            `NOForm` varchar(10) NOT NULL,
                            `NoUrut` smallint(6) NOT NULL,
                            `NPWPD` varchar(20) NOT NULL,
                            `Ayat` varchar(15) DEFAULT NULL COMMENT 'merupakan fiedl yang menampung Rekening',
                            `Omzet` decimal(28,8) DEFAULT '0.00000000' COMMENT 'merupakan field dasar penanganan pajak',
                            `TglAwal` date DEFAULT NULL,
                            `TglAkhir` date DEFAULT NULL,
                            `Beban_Pajak` decimal(28,8) DEFAULT '0.00000000' COMMENT 'Merupakan Field Tarif',
                            `TglU` datetime DEFAULT NULL,
                            `Stat_` smallint(6) DEFAULT '0' COMMENT 'Flag yang akan menandakan apakah data pendataan telah ditetapkan\r\n0: Belum Ditetapkan\r\n1: Sudah Ditetapkan',
                            `Hutang` decimal(28,8) DEFAULT NULL,
                            `StatHutang_` smallint(6) DEFAULT '0',
                            `NOSPTPD` varchar(12) NOT NULL,
                            `JNSHitung` smallint(1) DEFAULT NULL,
                            `PDJMS` char(255) DEFAULT NULL,
                            `Ukuran` decimal(18,8) DEFAULT NULL,
                            `Satuan` char(10) DEFAULT NULL,
                            `Denda` decimal(28,8) DEFAULT NULL,
                            `BulanDenda` smallint(6) DEFAULT NULL,
                            `Status_` smallint(6) NOT NULL DEFAULT '1' COMMENT 'Untuk mengetahui data sudah disimpan atau belum',
                            PRIMARY KEY (`TglDaftar`,`NOForm`,`NoUrut`,`NPWPD`,`NOSPTPD`),
                            KEY `NPWPD_` (`NPWPD`) USING BTREE,
                            KEY `FK_NOForm` (`NOForm`),
                            KEY `TglDaftar` (`TglDaftar`,`NOForm`,`NPWPD`,`Ayat`,`NoUrut`)
                          ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        
        $simp_pendataan_reklame =   "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('simp_pendataan_reklame') ."(
                                    `NoForm` varchar(10) NOT NULL,
                                    `NoUrut` smallint(6) NOT NULL,
                                    `TglDaftar` date NOT NULL,
                                    `Ayat` varchar(15) DEFAULT NULL COMMENT 'Kode Rekening',
                                    `RInduk` char(1) DEFAULT NULL COMMENT 'A-Z',
                                    `Ukuran_Satuan` decimal(18,8) DEFAULT NULL,
                                    `LamaPemasangan` int(2) DEFAULT NULL,
                                    `StatThn_` char(1) DEFAULT NULL COMMENT 'T: Tahun | B: Bulan | H: Hari | M: Minggu',
                                    `StatJln_` char(1) DEFAULT NULL COMMENT 'N : Negara | K : Kabupaten | L: Lingkungan',
                                    `StatSdt_` char(1) DEFAULT NULL COMMENT 'A : > Sisi | B: 2 Sisi | C: 1 Sisi',
                                    `StatLok_` char(1) DEFAULT NULL COMMENT 'K or B',
                                    `NPWPD` varchar(17) NOT NULL,
                                    `NamaJalan` varchar(40) DEFAULT NULL,
                                    `NLamaPsg` double(5,2) DEFAULT NULL,
                                    `NJalan` double(5,2) DEFAULT NULL,
                                    `NSdtPandang` double(5,2) DEFAULT NULL,
                                    `NLokasi` double(5,2) DEFAULT NULL,
                                    `HrgDasar` double(28,8) DEFAULT NULL,
                                    `NtotalLamaPsg` double(28,8) DEFAULT NULL,
                                    `NTotalJalan` double(28,8) DEFAULT NULL,
                                    `NTotalSdtPandang` double(28,8) DEFAULT NULL,
                                    `NTotalLokasi` double(28,8) DEFAULT NULL,
                                    `Beban_Pajak` double(5,2) DEFAULT NULL,
                                    `Jumlah_` double(5,2) DEFAULT NULL,
                                    `NTotalJumlah` double(28,8) DEFAULT NULL,
                                    `Tunggakan` int(11) NOT NULL DEFAULT '0',
                                    `NTunggakan` double(28,8) NOT NULL DEFAULT '0.00000000',
                                    PRIMARY KEY (`NoForm`,`NoUrut`,`TglDaftar`,`NPWPD`)
                                  ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        
        $simp_penetapan     =   "CREATE TABLE IF NOT EXISTS ". $this->db-dbprefix('simp_penetapan') ."(
                                `TglDaftar` date NOT NULL,
                                `NOForm` varchar(10) NOT NULL,
                                `NoUrut` smallint(6) NOT NULL,
                                `NPWPD` varchar(20) NOT NULL,
                                `Ayat` varchar(15) DEFAULT NULL COMMENT 'merupakan fiedl yang menampung Rekening',
                                `Omzet` decimal(28,8) DEFAULT '0.00000000' COMMENT 'merupakan field dasar penanganan pajak',
                                `TglAwal` date DEFAULT NULL,
                                `TglAkhir` date DEFAULT NULL,
                                `Beban_Pajak` decimal(28,8) DEFAULT '0.00000000' COMMENT 'Merupakan Pajak Terhutang Rumusnya Tarif Dasar * Omzet',
                                `TglU` datetime DEFAULT NULL,
                                `Stat_` smallint(6) DEFAULT '0' COMMENT 'Flag yang akan menandakan apakah data pendataan telah ditetapkan\r\n0: Belum Ditetapkan\r\n1: Sudah Ditetapkan',
                                `Hutang` decimal(28,8) DEFAULT NULL,
                                `Acc_` varchar(20) DEFAULT NULL COMMENT 'Di isi Nip pegawai',
                                `StatLunas_` smallint(6) DEFAULT '0' COMMENT '0 : Belum Lunas\r\n1 : Lunas',
                                `NOFormulir` varchar(12) NOT NULL DEFAULT '' COMMENT 'Digunakan untuk menyimpan noformulir penetapan',
                                `TglJthTempo` date DEFAULT NULL,
                                `TglFormulir` date DEFAULT '0000-00-00',
                                `Denda` decimal(28,8) DEFAULT NULL,
                                `Periode_` smallint(6) DEFAULT NULL,
                                `Bulan_` varchar(30) DEFAULT NULL,
                                `Tahun_` int(11) DEFAULT NULL,
                                `Ukuran_` decimal(18,8) DEFAULT NULL,
                                `TglPelunasan` date DEFAULT NULL,
                                `bulandenda_` double(5,2) DEFAULT NULL,
                                PRIMARY KEY (`TglDaftar`,`NOForm`,`NoUrut`,`NOFormulir`,`NPWPD`),
                                KEY `NPWPD_` (`NPWPD`) USING BTREE,
                                KEY `FK_NOForm` (`NOForm`),
                                KEY `TglDaftar` (`TglDaftar`,`NOForm`,`NPWPD`,`Ayat`,`NoUrut`),
                                CONSTRAINT `tpenetapan_ibfk_1` FOREIGN KEY (`NOForm`) REFERENCES `tpendaftaran` (`No_Form_Daftar`) ON DELETE NO ACTION ON UPDATE CASCADE
                              ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  
        $simp_penetapan_reklame =   "CREATE TABLE ". $this->db->dbprefix('simp_penetapan_reklame') ."(
                                    `NoForm` varchar(10) NOT NULL,
                                    `NoUrut` smallint(6) NOT NULL,
                                    `TglDaftar` date NOT NULL,
                                    `Ayat` varchar(15) DEFAULT NULL COMMENT 'Kode Rekening',
                                    `RInduk` char(1) DEFAULT NULL COMMENT 'A-Z',
                                    `Ukuran_Satuan` decimal(18,8) DEFAULT NULL,
                                    `LamaPemasangan` int(2) DEFAULT NULL,
                                    `StatThn_` char(1) DEFAULT NULL COMMENT 'T: Tahun | B: Bulan | H: Hari | M: Minggu',
                                    `StatJln_` char(1) DEFAULT NULL COMMENT 'N : Negara | K : Kabupaten | L: Lingkungan',
                                    `StatSdt_` char(1) DEFAULT NULL COMMENT 'A : > Sisi | B: 2 Sisi | C: 1 Sisi',
                                    `StatLok_` char(1) DEFAULT NULL COMMENT 'K or B',
                                    `NPWPD` varchar(17) NOT NULL,
                                    `NamaJalan` varchar(40) DEFAULT NULL,
                                    `NLamaPsg` double(5,2) DEFAULT NULL,
                                    `NJalan` double(5,2) DEFAULT NULL,
                                    `NSdtPandang` double(5,2) DEFAULT NULL,
                                    `NLokasi` double(5,2) DEFAULT NULL,
                                    `HrgDasar` double(28,8) DEFAULT NULL,
                                    `NtotalLamaPsg` double(28,8) DEFAULT NULL,
                                    `NTotalJalan` double(28,8) DEFAULT NULL,
                                    `NTotalSdtPandang` double(28,8) DEFAULT NULL,
                                    `NTotalLokasi` double(28,8) DEFAULT NULL,
                                    `TglFormulir` date NOT NULL,
                                    `NoFormulir` varchar(10) NOT NULL,
                                    `Beban_pajak` double(5,2) DEFAULT '0.00',
                                    `Jumlah_` double(5,2) DEFAULT NULL,
                                    `NtotalJumlah` double(28,8) DEFAULT NULL,
                                    `Denda` double(5,2) DEFAULT NULL,
                                    `Tunggakan` int(11) NOT NULL DEFAULT '0',
                                    `NTunggakan` double(28,8) NOT NULL DEFAULT '0.00000000',
                                    PRIMARY KEY (`NoForm`,`NoUrut`,`TglDaftar`,`NPWPD`,`NoFormulir`,`TglFormulir`)
                                  ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

        $simp_wajib_pajak = "CREATE TABLE ". $this->db->dbprefix('simp_wajib_pajak') ."(
                            `NPWPD` varchar(20) NOT NULL,
                            `Nm_BadanUsaha` varchar(50) DEFAULT NULL,
                            `Alamat_Usaha` varchar(80) DEFAULT NULL,
                            `Alamat_No_Usaha` varchar(80) DEFAULT NULL,
                            `Rt_Usaha` char(2) DEFAULT NULL,
                            `Rw_Usaha` char(2) DEFAULT NULL,
                            `Rk_Usaha` char(2) DEFAULT NULL,
                            `Kd_Wil_Usaha` char(10) DEFAULT NULL,
                            `Telp_Usaha` varchar(20) DEFAULT NULL,
                            `Kotak_Pos` char(5) DEFAULT NULL,
                            `Kode_Usaha` smallint(6) DEFAULT NULL,
                            `Modal_Kerja` decimal(10,0) DEFAULT NULL,
                            `Nm_Pemilik` varchar(50) DEFAULT NULL,
                            `Jabatan` varchar(20) DEFAULT NULL,
                            `Alamat_Pemilik` varchar(80) DEFAULT NULL,
                            `Alamat_No_Pemilik` varchar(80) DEFAULT NULL,
                            `Rt_Pemilik` char(2) DEFAULT NULL,
                            `Rw_Pemilik` char(2) DEFAULT NULL,
                            `Rk_Pemilik` char(2) DEFAULT NULL,
                            `Kd_Wil_Pemilik` varchar(10) DEFAULT NULL,
                            `Telp_Usaha_Pemilik` varchar(20) DEFAULT NULL,
                            `Kotak_Pos_Pemilik` char(10) DEFAULT NULL,
                            `Jml_Izin` smallint(6) DEFAULT NULL,
                            `lAktif` smallint(1) DEFAULT '1',
                            PRIMARY KEY (`NPWPD`),
                            KEY `TKDWilPajakPemilik` (`Kd_Wil_Pemilik`) USING BTREE,
                            KEY `Kd_Wil_Usaha` (`Kd_Wil_Usaha`,`Kd_Wil_Pemilik`) USING BTREE,
                            KEY `Kd_Wil_Usaha_2` (`Kd_Wil_Usaha`) USING BTREE
                          ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ";
        
        $simp_wajib_pajak_izin ="CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('simp_wajib_pajak_izin') ."(
                                `NPWPD` varchar(20) NOT NULL,
                                `No_Urut` smallint(6) NOT NULL,
                                `Jns_Surat_Ijin` varchar(20) DEFAULT NULL,
                                `No_Surat_Ijin` varchar(30) DEFAULT NULL,
                                `Tgl_Berlaku` date DEFAULT NULL,
                                `Tgl_Berakhir` date DEFAULT NULL,
                                PRIMARY KEY (`NPWPD`,`No_Urut`),
                                KEY `NPWPD` (`NPWPD`) USING BTREE,
                                CONSTRAINT `twajib_pajak_izin_ibfk_1` FOREIGN KEY (`NPWPD`) REFERENCES `twajib_pajak` (`NPWPD`) ON DELETE CASCADE ON UPDATE CASCADE
                              ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

        $simp_wajib_pajak_kewajiban = "CREATE TABLE IF NOT EXIST ". $this->db->dbprefix('simp_wajib_pajak_kewajiban') ."(
                                        `NPWPD` varchar(20) NOT NULL,
                                        `RekeningID` varchar(20) NOT NULL,
                                        PRIMARY KEY (`NPWPD`,`RekeningID`)
                                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ";

        $simp_alter_usergroup = "ALTER TABLE ". $this->db->dbprefix('simp_usergroup') ."
                ADD CONSTRAINT `fk_user_group` FOREIGN KEY (`userID`) REFERENCES ". $this->db->dbprefix('simp_user') ."(`userID`) ON DELETE RESTRICT ON UPDATE CASCADE";

        $simp_alter_reklame = "ALTER TABLE ". $this->db->dbprefix('simp_reklame') ."
                ADD CONSTRAINT `fk_reklame_akun` FOREIGN KEY (`akunID`) REFERENCES ". $this->db->dbprefix('simp_rekenening') ."(`akunID`) ON DELETE RESTRICT ON UPDATE CASCADE";

        $simp_alter_user_organisasi = "ALTER TABLE ". $this->db->dbprefix('simp_user_organisasi') ."
                ADD CONSTRAINT `fk_ref_user` FOREIGN KEY (`userID`) REFERENCES ". $this->db->dbprefix(`simp_user`) ."(`userID`) ON DELETE RESTRICT ON UPDATE CASCADE,
                ADD CONSTRAINT `fk_ref_organisasi` FOREIGN KEY (`organisasiID`) REFERENCES ". $this->db->dbprefix('simp_organisasi') ."(`organisasiID`) ON DELETE RESTRICT ON UPDATE CASCADE";
         
        $simp_alter_pendataan = "ALTER TABLE ". $this->db->dbprefix('simp_pendataan') ."
                ADD CONSTRAINT `fk_ref_npwpd_wajib_pajak` FOREIGN KEY (`NPWPD`) REFERENCES ". $this->db->dbprefix('simp_wajib_pajak') ."(`NPWPD`) ON DELETE RESTRICT ON UPDATE CASCADE,
                ADD CONSTRAINT `fk_ref_tglDaftar_daftar` FOREIGN KEY (`TglDaftar`) REFERENCES ". $this->db->dbprefix('simp_pendaftaran') ."(`TglDaftar`) ON DELETE RESTRICT ON UPDATE CASCADE";

        $simp_alter_pendataan_reklame = "ALTER TABLE ". $this->db->dbprefix('simp_pendataan_reklame') ."
                ADD CONSTRAINT `fk_ref_noForm_` FOREIGN KEY (`NoForm`) REFERENCES ".$this->db->dbprefix('simp_pendataan') ."(`NoForm`) ON DELETE RESTRICT ON UPDATE CASCADE,
                ADD CONSTRAINT `fk_ref_Ayat_pendataan` FOREIGN KEY (`Ayat`) REFERENCES ".$this->db->dbprefix('simp_pendataan') ."(Ayat) ON DELETE RESTRICT ON UPDATE CASCADE;"       

        $simp_alter_penetapan = "ALTER TABLE ". $this->db->dbprefix('simp_penetapan') ."
                ADD CONSTRAINT `fk_ref_npwpd_pendataan` FOREIGN KEY (`NPWPD`) REFERENCES ". $this->db->dbprefix('simp_pendataan') ."(`NPWPD`) ON DELETE RESTRICT ON UPDATE CASCADE,
                ADD CONSTRAINT `fk_ref_tglDaftar_pendataan` FOREIGN KEY (`TglDaftar`) REFERENCES ". $this->db->dbprefix('simp_pendataan') ."(`TglDaftar`) ON DELETE RESTRICT ON UPDATE CASCADE";

        $simp_alter_penetapan_reklame = "ALTER TABLE ". $this->db->dbprefix('simp_pendataan_reklame') ."
                ADD CONSTRAINT `fk_ref_noForm_penetapan` FOREIGN KEY (`NoForm`) REFERENCES ".$this->db->dbprefix('simp_penetapan') ."(`NoForm`) ON DELETE RESTRICT ON UPDATE CASCADE,
                ADD CONSTRAINT `fk_ref_Ayat_penetapan` FOREIGN KEY (`Ayat`) REFERENCES ".$this->db->dbprefix('simp_penetapan') ."(Ayat) ON DELETE RESTRICT ON UPDATE CASCADE;"       
                

        if ($this->db->query($simp) && 
            $this->db->query($gpsi_contractors) &&
            $this->db->query($gpsi_contracts) &&
            $this->db->query($gpsi_events) &&
            $this->db->query($gpsi_expenses) &&
            $this->db->query($gpsi_reports) &&
            $this->db->query($gpsi_suppliers) &&
            $this->db->query($gpsi_terms) &&
            $this->db->query($gpsi_typecurrency) &&
            $this->db->query($gpsi_typeexpenses) &&
            $this->db->query($gpsi_typehours) &&    
            $this->db->query($gpsi_alter_expenses) &&
            $this->db->query($gpsi_alter_reports) &&
            $this->db->query($gpsi_alter_contracts)
            $this->db->query($simp_usergroup) &&
            $this->db->query($simp_jenis)&&
            $this->db->query($simp_organisasi)&&
            $this->db->query($simp_pegawai)&&
            $this->db->query($simp_rekening)&&
            $this->db->query($simp_reklame)&&
            $this->db->query($simp_rms_reklame)&&
            $this->db->query($simp_system)&&
            $this->db->query($simp_user)&&
            $this->db->query($simp_user_organisasi)&&
            $this->db->query($simp_wilayah)&&
            $this->db->query($simp_info_kontrak)&&
            $this->db->query($simp_no_daftar)&&
            $this->db->query($simp_pendaftaran)&&
            $this->db->query($simp_pendataan)&&
            $this->db->query($simp_pendataan_reklame)&&
            $this->db->query($simp_penetapan)&&
            $this->db->query($simp_penetapan_reklame)&&
            $this->db->query($simp_wajib_pajak)&&
            $this->db->query($simp_wajib_pajak_izin)&&
            $this->db->query($simp_wajib_pajak_kewajiban)&&
            $this->db->query($simp_alter_usergroup)&&
            $this->db->query($simp_alter_reklame)&&
            $this->db->query($simp_alter_user_organisasi)&&
            $this->db->query($simp_alter_pendataan)&&
            $this->db->query($simp_alter_pendataan_reklame)&&
            $this->db->query($simp_alter_penetapan)&&
            $this->db->query($simp_alter_penetapan_reklame)
                ) {
            return TRUE;
        }
    }

    public function uninstall() {
        return FALSE; //Not interested in uninstalling this for the time being.
    }

    public function upgrade($old_version) {
        // Your Upgrade Logic
        return TRUE;
    }

    public function help() {
        // Return a string containing help info
        // You could include a file and return it here.
        return "<h4>Overview</h4>
		<p>The simpatda module is the application that controls the submitting of pajak or retribusi, and generates receipts based on that input.</p>
		<h4>More information to be added</h4>
		<p>Help will be added here</p>";
    }

}

/* End of file details.php */