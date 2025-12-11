-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2025 at 08:01 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_logo` text NOT NULL,
  `school_banner` varchar(200) NOT NULL,
  `school_tagline` varchar(255) NOT NULL,
  `school_description` text NOT NULL,
  `since` date NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `school_name`, `school_logo`, `school_banner`, `school_tagline`, `school_description`, `since`, `alamat`) VALUES
(4, 'SMKN TEMBARAK', '1759161520-logo.png', '1759166660-banner.jpg', 'SMK Bisa, SMK Hebatt', 'Pembangunan SMK Negeri Tembarak dimulai pada tanggal 22 Januari 2007. Peletakan batu pertama dilakukan oleh Kepala Dinas Pendidikan Kabupaten Temanggung. Dana untuk pembangunan bersumber dari dana Imbal Swadaya Pemerintah Pusat. SMK Negeri Tembarak diresmikan oleh Menteri Pendidikan Nasional pada hari Sabtu, tanggal 16 Februari 2008. SMK Negeri Negeri Tembarak mulai menerima siswa baru pada tahun ajaran 2007/2008.\r\n\r\nSMK Negeri Tembarak memberikan kesempatan kepada lulusan SMP/MTs dan yang sederajat untuk melanjutkan sekolah di SMK Negeri Tembarak, adapun program keahlian yang dibuka adalah program keahlian Teknik Mekatronika, Teknik Elektronika Industri dan Rekayasa Perangkat Lunak.\r\n\r\nEra globalisasi menyebabkan terjadinya persaingan bebas diberbagai bidang kehidupan manusia, kemajuan teknologi industri dan komunikasi begitu cepat sehingga membutuhkan sumber daya manusia berkualitas yang memiliki kompetensi berstandar Internasional agar dapat berkompetitif secara global.\r\n\r\nSMK Negeri Tembarak sebagai lembaga pendidikan mempersiapkan anak didiknya untuk menghasilkan lulusan dengan kompetensi yang berstandar Internasional, dituntut untuk memelaksanakan proses pembelajaran yang sesuai dengan standar kompetensi yang dipersyaratkan sesuai dengan kebutuhan dunia usaha/dunia industri serta perkembangan teknologi.', '2007-01-22', 'Jl. Mantenan, \r\nMantenan, Greges, \r\nKec. Tembarak, \r\nKabupaten Temanggung, \r\nJawa Tengah 56261');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint NOT NULL,
  `image` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `image`, `author`, `date`, `title`, `description`) VALUES
(3, '1764128237.png', 'Pemain Futsal Putri', '2024-08-03', 'Juara 3 Futsal Putri', ' Atas perolehan tersebut, SMK Negeri Tembarak menempati peringkat ke – 3 perolehan medali dari 21 SMK di Kabupaten Temanggung.\r\n    Kepala Sekolah Aster Aswiny, S.Pd., M.Pd, memberikan apresiasi yang tinggi kepada para siswa dan Pembina di masing-masing cabang lomba, yang telah berjuang dan menorehkan prestasi yang membanggakan. Prestasi ini harus dipertahankan, ditingkatkan, dan menjadi motivasi baik untuk siswa maupun guru, dalam mengembangkan bakat dan minat siswa dengan lebih baik agar muncul potensi-potensi siswa yang bisa dibanggakan dalam kompetisi kompetisi berikutnya.'),
(12, '1764130661.png', '........', '2025-04-29', 'Juara 2 Renang Putra', ' Atas perolehan tersebut, SMK Negeri Tembarak menempati peringkat ke – 3 perolehan medali dari 21 SMK di Kabupaten Temanggung.\r\n    Kepala Sekolah Aster Aswiny, S.Pd., M.Pd, memberikan apresiasi yang tinggi kepada para siswa dan Pembina di masing-masing cabang lomba, yang telah berjuang dan menorehkan prestasi yang membanggakan. Prestasi ini harus dipertahankan, ditingkatkan, dan menjadi motivasi baik untuk siswa maupun guru, dalam mengembangkan bakat dan minat siswa dengan lebih baik agar muncul potensi-potensi siswa yang bisa dibanggakan dalam kompetisi kompetisi berikutnya.'),
(13, '1764126350.png', 'Pemain Futsal Putra', '2023-07-23', 'Juara 3 Futsal Putra', ' Atas perolehan tersebut, SMK Negeri Tembarak menempati peringkat ke – 3 perolehan medali dari 21 SMK di Kabupaten Temanggung.\r\n    Kepala Sekolah Aster Aswiny, S.Pd., M.Pd, memberikan apresiasi yang tinggi kepada para siswa dan Pembina di masing-masing cabang lomba, yang telah berjuang dan menorehkan prestasi yang membanggakan. Prestasi ini harus dipertahankan, ditingkatkan, dan menjadi motivasi baik untuk siswa maupun guru, dalam mengembangkan bakat dan minat siswa dengan lebih baik agar muncul potensi-potensi siswa yang bisa dibanggakan dalam kompetisi kompetisi berikutnya.'),
(14, '1764126727.png', 'Danang Saputra', '2023-06-12', 'Juara 1 FLS2N Cabang Lomba Kriya', ' Atas perolehan tersebut, SMK Negeri Tembarak menempati peringkat ke – 3 perolehan medali dari 21 SMK di Kabupaten Temanggung.\r\n    Kepala Sekolah Aster Aswiny, S.Pd., M.Pd, memberikan apresiasi yang tinggi kepada para siswa dan Pembina di masing-masing cabang lomba, yang telah berjuang dan menorehkan prestasi yang membanggakan. Prestasi ini harus dipertahankan, ditingkatkan, dan menjadi motivasi baik untuk siswa maupun guru, dalam mengembangkan bakat dan minat siswa dengan lebih baik agar muncul potensi-potensi siswa yang bisa dibanggakan dalam kompetisi kompetisi berikutnya.'),
(15, '1764130451.png', 'Pemain Futsal Putri', '2025-04-30', 'Juara 2 Futsal Putri', ' Atas perolehan tersebut, SMK Negeri Tembarak menempati peringkat ke – 3 perolehan medali dari 21 SMK di Kabupaten Temanggung.\r\n    Kepala Sekolah Aster Aswiny, S.Pd., M.Pd, memberikan apresiasi yang tinggi kepada para siswa dan Pembina di masing-masing cabang lomba, yang telah berjuang dan menorehkan prestasi yang membanggakan. Prestasi ini harus dipertahankan, ditingkatkan, dan menjadi motivasi baik untuk siswa maupun guru, dalam mengembangkan bakat dan minat siswa dengan lebih baik agar muncul potensi-potensi siswa yang bisa dibanggakan dalam kompetisi kompetisi berikutnya.');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint NOT NULL,
  `announcements_title` varchar(255) NOT NULL,
  `announcements_image` text NOT NULL,
  `date` date NOT NULL,
  `announcements` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcements_title`, `announcements_image`, `date`, `announcements`) VALUES
(6, 'Gelar Karya P5', '1758010772.png', '2025-06-17', 'Gelar Karya P5 merupakan salah satu komponen dalam kurikulum merdeka yang dilakukan oleh satuan pendidikan yang telah menerapkan kurikulum tersebut. Di dalam Kurikulum Merdeka, dicantumkan aspek P5 yang memberikan wadah bagi peserta didik untuk membuat suatu proyek yang berkaitan dengan Profil Pelajar Pancasila. Maka dari itu gelar karya P5 perlu dilakukan untuk memperkuat karakter dan pencapaian kompetensi siswa yang sesuai dengan profil pelajar Pancasila.'),
(7, 'Perayaan Dies Natalis SMK Negeri Tembarak Ke-18', '1759252371-announcement.png', '2025-01-17', 'Datang dan saksikan, rangkaian kegiatan peringatan Dies Natalis SMK Negeri Tembarak ke-18 21 – 22 Januari 2025 Di Lapangan Upacara SMK Negeri Tembarak (Terbuka untuk umum)\r\n\r\nDalam rangka penanaman rasa cinta pada Almamater dan bertepatan dengan hari berdirinya SMK Negeri Tembarak, peringatan Dies Natalis SMK Negeri Tembarak ke-18 kali ini diisi dengan semangat meningkatkan solidaritas, mempererat kekeluargaan, dan menguatkan karakter dalam bentuk kegiatan olahraga, keagamaan dan kesenian (olah raga, rasa dan karsa) yang dapat meningkatkan kerukunan warga sekolah, karakter sekaligus menjaring bakat dan minat siswa.\r\nRangkaian kegiatan berlangsung pada hari Selasa – Jumat, 21 – 24 Januari 2025 dengan mengusung tema Pragati Sahityam, 18 Tahun Kebersamaan Skanibar mewujudkan solidaritas dan kerukunan.'),
(8, 'Serah Terima Jabatan Organisasi Siswa SMK Negeri Tembarak', '1759252776.png', '2025-01-13', 'Di SMK Negeri Tembarak, tumbuh banyak organisasi lain selain OSIS yang berperan dalam pengembangan bakat minat dan potensi siswa melalui kegiatan ekstrakurikuler. Diantaranya adalah : Pramuka, PMR, Pecinta Alam, Majlis Taklim, PKS, Tonti, dan Adiwiyata.\r\nSehubungan dengan berakhirnya masa jabatan pengurus organisasi siswa masa bakti 2023/2024 maka dilakukan serah terima jabatan (SERTIJAB) dari pengurus lama kepada pengurus baru. Acara ini dilakukan setelah Apel Pagi pada hari Senin, 13 Januari 2025 di Lapangan Upacara. Serah terima jabatan di hadiri oleh pengurus inti setiap organisasi siswa masa bakti 2023/2024 dan pengurus inti masa bakti 2024/2025 dan disaksikan oleh semua siswa SMK Negeri Tembarak serta para guru.'),
(9, 'Halal Bi Halal Keluarga Besar SMK Negeri Tembarak : Taburkan Maaf, Sucikan Hati Dalam Indahnya Kebersamaan dan Keragaman Silaturahmi', '1759253180.png', '2025-04-11', 'Harapan serupa juga disampaikan oleh Kepala SMK Negeri Tembarak, Ibu Aster Aswiny, S.Pd., M.Pd. Dalam sambutannya, beliau juga menyampaikan hal yang sama. Beliau berharap melalui moment Halal bi Halal ini dapat menanamkan nilai-nilai kebersamaan, saling menghargai, dan pentingnya menjaga harmoni. Halal Bihalal ini menjadi awal yang baik untuk memulai kembali proses belajar mengajar dengan semangat baru dan hati yang lebih bersih.\r\n\r\n    Kegiatan dilanjutkan dengan Hikmah Halal bi Halal oleh Bapak Suryanto, S.Pd dan diakhiri dengan saling bermaafan, ramah tamah, dan makan bersama.\r\n\r\n    Puncak kegiatan ditandai dengan momen saling bermaafan antara guru dan siswa, menciptakan suasana haru dan hangat yang mempererat ikatan emosional di antara mereka. Kegiatan ini dilaksanakan pada hari Rabu, 9 April 2025 di Lapangan Upacara SMK Negeri Tembarak, diikuti oleh semua warga sekolah.\r\n\r\n    Dalam moment yang baik ini, SMK Negeri Tembarak juga mempererat jalinan silaturahmi dengan beberapa Kepala Sekolah, komite sekolah dan Guru Karyawan yang telah purna tugas melalui kunjungan ke rumah. Suasana kekeluargaan yang harmonis, hangat, dan penuh keakraban terjalin dengan sangat baik selama moment ini.');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `author` varchar(100) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `title`, `date`, `author`, `updated_at`, `content`) VALUES
(12, '1759253331.png', 'Berlangsung Meriah, Hangat, Dan Harmonis Perayaan HUT Ke – 80 Kemerdekaan RI Di SMK Negeri Tembarak', '2025-08-19', 'Admin SMK', '2025-09-30 17:30:19', 'Suasana penuh semangat, meriah, dan hangat tampak dalam rangkaian Perayaan HUT ke – 80 Kemerdekaan RI di SMK Negeri Tembarak. Rangkaian kegiatan yang dikemas dalam gelaran pentas seni, GAS MABAR, Karnaval dengan tema perjuangan, dan berbagai agenda lainnya mewarnai perayaan HUT RI Tahun ini. Sebagaimana disampaikan oleh Ketua HUT ke – 80 RI di SMK Negeri Tembarak Bapak Imam Rosyidi Kurniawan, S.Kom, dan juga oleh Ketua Pelaksana lapangan dari OSIS Hafidz, disampaikan bahwa rangkaian kegiatan Perayaan HUT ke – 80 Kemerdekaan RI di SMK Negeri Tembarak akan berlangsung selama 4 (empat) hari, yaitu pada hari Selasa sampai Jumat, 19 – 22 Agustus 2025. Bertempat di SMK Negeri Tembarak dan diikuti oleh seluruh warga sekolah. Baik Bapak Imam maupun Hafidz menaruh harapan yang sama, kegiatan dapat berlangsung sukses, lancar, dan meriah, serta dapat menjadi ajang untuk memupuk kebersamaan antar warga sekolah menjadi semakin hangat dan harmonis. Seluruh warga sekolah, baik murid maupun Guru Tenaga Kependidikan mengikuti seluruh rangkaian kegiatan dengan sangat antusias.\r\n\r\n    Pada hari pertama pelaksanaan rangkaian Perayaan HUT RI ke – 80, diselenggarakan kegiatan Turnamen Futsal dan Lomba supporter antar kelas. Sebanyak 16 kelas dari kelas X dan XI, ditambah tim futsal dari GTK turut berkompetisi dalam ajang ini. Turnamen berlangsung semangat dan sportif. Hadirnya supporter antar kelas yang juga di lombakan kekompakannya, menambah kemeriahan jalannya turnamen. Keluar sebagai pemenang dari turnamen futsal adalah : Juara 1, Tim Guru, Juara 2, kelas XI MB, dan juara 3, XI EB. Melalui turnamen ini diharapkan dapat memupuk rasa kebersamaan, kekompakan, dan sportifitas. Selain itu, juga dapat melatih fisik dan kesehatan jasmani menjadi lebih baik.\r\n\r\n    Di hari kedua Perayaan HUT RI ke – 80 kali ini, kembali diisi dengan kegiatan yang meriah. Dikemas dalam GAS MABAR, Gebyar Agustusan Masyarakat Skanibar, menghadirkan berbagai perlombaan yang meriah. Mulai dari lomba estafet tepung, goyang tali pensil dimasukkan ke dalam botol, sampai dengan estafet air. Tiap kelas mengirimkan delegasinya sebanyak 8 anak tiap jenis lomba, yang harus kompak dan solid agar dapat memenangkan kompetisi. Hadir sebagai pemenang dari estafet tepung adalah : Juara 1, X EA dan Juara 2, XI MB. Sedangkan pemenang lomba goyang tali pensil adalah : Juara 1, X PA dan Juara 2, XI RA. Sementara itu untuk lomba estafet air dimenangkan  oleh : Juara 1, XI EC dan Juara 2, X PB. Melalui perlombaan ini kita dapat melihat kekompakan dan semangat antar tim.  Event ini semakin meriah dengan hadirnya guru tenaga pendidikan yang turut serta berpartisipasi mengikuti perlombaan.\r\n\r\n    Pada hari ke – 3 Perayaan HUT RI ke – 80, GAS MABAR diramaikan dengan penampilan dari 16 kelas dalam kegiatan Pentas Seni antar kelas, lomba poster, dan lomba kebersihan keindahan kelas. Masing – masing kelas menampilkan karya dan kreativitas terbaiknya dalam ajang kali ini. Pentas seni siswa diisi dengan tampilan siswa berupa akustik, tarian, solo vocal, dan band. Di waktu yang bersamaan, dilaksanakan lomba poster dan kebersihan kelas. Tiap kelas wajib membuat poster bertemakan lingkungan dan tata tertib sekolah, yang dapat dibuat baik secara manual maupun digital. Penilaian Lomba kebersihan dan keindahan kelas dilakukan oleh Tim Adiwiyata sekolah yang independent dan objektif. Berdasarkan penilaian dewan juri, ditetapkan sebagai pemenang lomba kebersihan keindahan kelas adalah Juara 1 kelas X EB , Juara 2 kelas XI RPL A, dan juara 3 kelas X PPLG C. Sedangkan untuk pemenang lomba poster, keluar sebagai Juara 1 kelas XPPLG B, Juara 2 kelas XI EC, dan Juara 3 kelas XI EA. Melalui kegiatan ini diharapkan dapat menampung bakat, minat, kreativitas siswa yang dapat dikembangkan. Serta tercipta lingkungan belajar yang bersih, nyaman dan sehat.\r\n\r\n    Karnaval, kirab budaya, dan jalan santai menutup rangkaian kemeriahan Perayaan HUT ke – 80 RI di SMK Negeri Tembarak. Bertemakan “Perjuangan”, seluruh warga sekolah melaksanakan karnaval, berjalan mengelilingi desa sekitar dengan mengenakan kostum bertemakan perjuangan. Diantara mereka ada yang mengenakan kostum nasional kebaya, kostum pahlawan. kostum profesi (tentara, polisi, tenaga kesehatan, guru, dan lainnya), serta berbagai kostum perjuangan lainnya. Sementara itu, guru karyawan mengenakan kostum anak sekolah sebagai wujud kebersamaan. Di akhir acara, bersamaan dengan pembagian doorprize karnaval, dilaksanakan pula pembagian hadiah sebagai bentuk apresiasi kepada siswa dalam berbagai ajang perlombaan yang digelar selama beberapa hari sebelumnya. Juga dipilih beberapa kostum terbaik yang dikenakan baik oleh guru maupun murid saat karnaval dan kirab budaya.\r\n\r\n    Melalui rangkaian kegiatan Perayaan HUT ke – 80 Kemerdekaan RI yang berlangsung meriah kali ini, diharapkan murid dan seluruh warga sekolah dapat memaknai kemerdekaan yang dicapai dengan penuh perjuangan dan nasionalisme tinggi oleh seluruh kalangan saat itu, dengan mengisi kemerdekaan melalui kegiatan – kegiatan yang positif dan dapat memberikan kontribusi terbaik bagi kemerdekaan bangsa Indonesia.'),
(13, '1759253513.png', 'Upacara Memperingati HUT RI Ke – 80 DI SMK Negeri Tembarak Berlangsung Khidmat dan Semangat', '2025-08-17', 'Admin SMK', '2025-09-30 17:31:53', 'Dalam rangka memperingati Hari Ulang Tahun Kemerdekaan RI ke – 80 tahun 2025, SMK Negeri Tembarak melangsungkan upacara bendera tepat pada hari Minggu, 17 Agustus 2025. Upacara berjalan dengan tertib dan khidmat.\r\n    Bertindak sebagai Pembina upacara adalah Kepala SMK Negeri Tembarak, Ibu Aster Aswiny, S.Pd., M.Pd. Sedangkan petugas upacara merupakan tim pleton inti SMK Negeri Tembarak yang telah melaksanakan persiapan dan latihan selama dua pekan sebelum mereka bertugas. Serta didukung oleh Tim Paduan Suara Gita Bahana Skanibar. Melalui latihan yang rutin, kontinu, dan konsisten, petugas upacara dapat menjalankan tugas dengan baik, lancar, dan sukses.\r\n     Upacara bendera dilangsungkan di lapangan upacara SMK Negeri Tembarak, diikuti oleh seluruh murid kelas X, kelas XI, dan seluruh Guru Tenaga Kependidikan. Tidak semua murid mengikuti upacara di sekolah. Dalam kesempatan ini, satu pleton mengikuti upacara di Lapangan Desa Banaran Tembarak, satu pleton mengikuti upacara di halaman Polsek Tembarak, dan tiga pleton mengikuti upacara di halaman Kecamatan Tembarak. Lebih dari 15 murid SMKN Tembarak juga bertugas sebagai pasukan pengibar bendera di Kecamatan Tembarak. Hal ini merupakan wujud peran aktif SMK berkolaborasi bersama masyarakat dan instansi terkait dalam merayakan kemerdekaan RI Ke – 80 tahun ini.\r\n    Jalannya upacara di SMK Negeri Tembarak mengikuti pedoman peringatan HUT Ke – 80 RI Tahun 2025 sebagaimana dirilis oleh Kementerian Sekretaris Negara (Kemensetneg) yang tertuang dalam SE Mensesneg Nomor B-25/M/S/TU.00.03/08/2025. Diawali dengan pengibaran bendera merah putih, pembacaan naskah proklamasi, pembacaan naskah UUD 1945, amanat Pembina upacara, dan doa, serta diakhiri dengan menyanyikan lagu-lagu nasional oleh Paduan Suara Gita Bahana Skanibar.\r\n\r\n Dalam amanat yang disampaikan oleh Kepala Sekolah sebagai Pembina Upacara, beliau membacakan sambutan dari Menteri Pendidikan, Kebudayaan, Riset, Dan Teknologi Pada Upacara Peringatan Hari Ulang Tahun Ke-80 Kemerdekaan Republik Indonesia Tahun 2025. Isi amanat tersebut diantaranya :” Tema peringatan tahun ini, “Bersatu Berdaulat, Rakyat Sejahtera, Indonesia Maju”, bukan sekadar serangkaian kata. Tema ini adalah panggilan. Panggilan untuk memperkuat persatuan di tengah perbedaan suku, agama, bahasa, dan budaya. Panggilan untuk menjaga kedaulatan bangsa di tengah derasnya arus globalisasi dan revolusi digital. Dan panggilan untuk bersama-sama membangun masa depan yang sejahtera dan maju. Di era yang serba terkoneksi ini, kita menghadapi tantangan baru: disinformasi yang mengancam persatuan, intervensi asing yang merongrong kedaulatan, serta kesenjangan digital yang memperlebar jurang sosial. Namun sejarah telah mengajarkan kita: bangsa yang bersatu, tak akan runtuh oleh badai sebesar apa pun. Justru dari perbedaanlah kekuatan kita berasal. Bhineka Tunggal Ika bukan sekadar semboyan, melainkan jiwa yang mengikat bangsa ini sejak awal berdiri”.\r\n    Di akhir sambutannya, beliau mengajak semua pihak untuk menjaga semangat kemerdekaan dengan tindakan nyata. Dengan kerja keras, dedikasi, dan cinta tanah air yang tak pernah padam, untuk Indonesia yang bersatu, berdaulat, rakyatnya sejahtera, dan masa depannya maju.\r\nUpacara peringatan HUT RI Ke – 80 kali ini bukan hanya sekedar melaksanakan rutinitas upacara bendera, namun diharapkan seluruh peserta upacara dapat memaknai sebagai simbol penghargaan terhadap jasa para pahlawan serta wujud nyata dari semangat patriotisme.'),
(14, '1759253643.png', 'SMK Negeri Tembarak Umumkan Hasil Seleksi Penerimaan Murid Baru Tahun Ajaran 2025/2026', '2025-06-21', 'Admin SMK', '2025-09-30 17:34:03', 'Berdasarkan Petunjuk Operasional Penyelenggaraan Sistem Penerimaan Murid Baru (SPMB) Tahun Ajaran 2025/2026 Nomor 400.3/06780/2025, yang merupakan perubahan atas Keputusan Kepala Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah Nomor 400.3/06483, seluruh SMA dan SMK Negeri di Provinsi Jawa Tengah serentak melaksanakan pengumuman hasil seleksi pada hari Sabtu, 21 Juni 2025.\r\n\r\n    SMK Negeri Tembarak sebagai salah satu lembaga pendidikan Sekolah Menengah Kejuruan di Kabupaten Temanggung Provinsi Jawa Tengah, turut menyampaikan hasil seleksi kepada masyarakat secara resmi sesuai dengan jadwal yang telah ditetapkan. Pengumuman ini menjadi penanda penting dari berakhirnya tahapan seleksi yang telah dilaksanakan secara daring dan luring melalui sistem SPMB Provinsi Jawa Tengah yang telah berlangsung sejak 26 Mei 2025. Proses SPMB di SMK Negeri Tembarak, di awali dengan rangkaian kegiatan sebagai berikut :\r\n\r\nPengajuan akun (daring) : 26 Mei 2025 – 12 Juni 2025\r\nVerifikasi berkas (luring) : 27 Mei 2025 – 12 Juni 2025\r\nAktivasi akun (daring)      : 3 Juni 2025 – 12 Juni 2025\r\nPendaftaran (daring)        : 14 Juni 2025 – 18 Juni 2025\r\n\r\nKetua Pelaksana SPMB SMK Negeri Tembarak, Bapak Imam Rosyidi Kurniawan, S.Kom, menyampaikan bahwa proses seleksi telah berjalan dengan baik, transparan, dan sesuai regulasi yang berlaku. Sekolah juga memastikan bahwa seluruh proses seleksi dilakukan secara objektif dan akuntabel.\r\n\r\n    Untuk calon siswa yang belum berkesempatan diterima, Ibu Kepala SMK Negeri Tembarak, Ibu Aster Aswiny, S.Pd., M.Pd, melalui arahannya menyampaikan pesan agar tidak berkecil hati dan tetap semangat mengejar cita-cita meskipun tidak di SMK Negeri Tembarak. Beliau memberikan arahan utamanya bagi calon murid jalur afirmasi untuk dapat masuk ke sekolah mitra (sekolah swasta dengan prosedur sama dengan sekolah negeri). Di Kabupaten Temanggung, sebagai sekolah mitra adalah SMK Swadaya dan SMK Jenderal Bambang Soegeng.\r\n\r\n    Pengumuman hasil seleksi dapat diakses oleh calon peserta didik secara daring melalui laman resmi SPMB Jateng, pada link https://spmb.jatengprov.go.id/pengumuman. Selain itu, panitia SPMB di SMK Negeri Tembarak juga membuka layanan bantuan informasi bagi orang tua dan siswa yang mengalami kendala dalam mengakses hasil seleksi melalui nomor hotline khusus SPMB pada nomor 085727196006.\r\n\r\n    Bagi peserta yang dinyatakan lulus seleksi, pihak sekolah telah menyiapkan jadwal daftar ulang mulai tanggal 23, 24, 25, 26 dan 30 Juni 2025. Peserta diminta untuk hadir ke sekolah sesuai jadwal dengan membawa berkas-berkas yang telah ditentukan seperti tanda bukti pendaftaran, semua berkas pendaftaran asli yang telah di gandakan rangkap 2 dan dokumen lain sesuai ketentuan.\r\n\r\n    Berikut jadwal pelaksanaan daftar ulang di SMK Negeri Tembarak :\r\n\r\nHari Senin Tanggal 23 Juni 2025 untuk Program Keahlian PPLG ( RPL ) Semua Jalur dan ditambah Teknik Elektronika ( Elind ) Jalur Afirmasi dan Jalur Domisili Terdekat.\r\nHari Selasa Tanggal 24 Juni 2025 Program Keahlian Teknik Elektronika ( Elind ) Jalur Prestasi\r\nHari Rabu Tanggal 25 Juni 2025 Semua Program Keahlian dan Semua Jalur.\r\n     Layanan di buka pada pukul 08.00 WIB.\r\n\r\n    Selain menyampaikan hasil seleksi, SMK Negeri Tembarak juga mulai mempersiapkan pelaksanaan Masa Pengenalan Lingkungan Sekolah (MPLS) yang akan dilaksanakan pada awal tahun pelajaran baru. MPLS bertujuan untuk membantu calon murid baru dalam mengenal dan beradaptasi dengan lingkungan sekolah serta mengenali nilai-nilai budaya positif di SMK Negeri Tembarak.\r\n\r\n    Melalui pelaksanaan SPMB ini, diharapkan SMK Negeri Tembarak terus berkomitmen memberikan layanan pendidikan yang bermutu dan inklusif. Sekolah juga mengajak seluruh murid baru untuk siap menempuh perjalanan pendidikan yang menyenangkan, bermakna, dan penuh prestasi selama tiga tahun ke depan.'),
(15, '1759253710.png', 'Satu Hari Tanpa Polusi Di SMK Negeri Tembarak Salah Satu Upaya Menghindari Dampak Negatif Pemanasan Global Dan Perubahan Iklim', '2025-06-12', 'Admin SMK', '2025-09-30 17:35:10', 'Merujuk pada Peraturan Pemerintah RI No. 33 Tahun 2023, konservasi energi adalah upaya sistematis, terencana, dan terpadu, guna melestarikan sumber daya negeri serta meningkatkan efisiensi pemanfaatannya. Konservasi energi dapat dicapai melalui penggunaan energi secara efisien, termasuk dengan menerapkan perilaku hemat energy. konservasi energi sangat penting dilakukan karena efek pemanasan global dan perubahan iklim semakin nyata. Terlebih, meningkatnya pemanasan global disebabkan oleh tingginya konsumsi energi. Konservasi energi dapat menjadi upaya mengurangi jejak karbon dan meminimalkan efek pemanasan global sebelum menjadi lebih buruk. Semakin sedikit emisi gas rumah kaca di atmosfer, semakin besar peluang mengurangi dampak negatif perubahan iklim.\r\n\r\n    Pada dasarnya, konservasi energi merupakan upaya untuk mengatasi hal tersebut dengan mengurangi ketergantungan pada bahan bakar fosil. Penggunaan bahan bakar fosil berdampak negatif pada lingkungan, termasuk pemanasan global, polusi udara serta pencemaran tanah dan air.\r\n\r\n    Seiring meningkatnya kesadaran lingkungan, konservasi energi menjadi topik yang kerap dibahas. Konservasi energi tidak hanya sekadar upaya mengurangi penggunaan energi, melainkan juga bagian integral dari upaya dalam menghindari dampak negatif pemanasan global dan perubahan iklim. Konservasi energy dapat dilakukan dalam kehidupan sehari-hari, termasuk dilingkungan sekolah.\r\n\r\n    Sebagai salah satu bentuk upaya tersebut maka pada hari Kamis, 12 Juni 2025, SMK Negeri Tembarak melaksanakan kegiatan Satu Hari Tanpa Polusi Kendaraan Bermotor sebagai bentuk kepedulian terhadap lingkungan dan upaya mengurangi polusi udara.\r\n\r\n    Selama satu hari tersebut, seluruh warga sekolah, mulai dari siswa, guru, hingga staf sekolah, kompak mematikan mesin kendaraan bermotor sejak memasuki pintu gerbang sekolah. Kendaraan di bawa ke tempat parkir dengan cara di tuntun. Begitu pula ketika bermaksud keluar dari lingkungan sekolah, mesin kendaraan baru dinyalakan diluar pintu gerbang sekolah. Kegiatan ini disambut dengan penuh semangat dan menjadi pengalaman menyenangkan sekaligus bermakna bagi warga sekolah.\r\n\r\n    Melalui kegiatan ini, SMK Negeri Tembarak ingin menanamkan nilai cinta lingkungan sejak dini dan menunjukkan bahwa langkah kecil dapat memberi dampak besar bagi bumi kita.'),
(16, '1759253848.png', 'SMK Negeri Tembarak Gelar Purnawiyata Siswa Kelas XII 9 Siswa Berprestasi Mendapatkan Penghargaan', '2025-05-21', 'Admin SMK', '2025-09-30 17:37:28', ' Purnawiyata siswa kelas XII merupakan salah satu momen istimewa bagi siswa yang telah berhasil menyelesaikan proses pendidikan selama tiga tahun. Kegiatan ini adalah salah satu yang dinantikan oleh lulusan kelas XII setelah selama tiga tahun berjuang dan bekerja keras menuntut ilmu di SMK Negeri Tembarak. Apalagi, setelah lulus sebagian besar diantara mereka akan bekerja atau berwirausaha. Maka moment purnawiyata dijadikan moment untuk mengukir kenangan bersama sekolah, teman seangkatan, dan juga orang tua masing-masing.\r\n\r\n    Purnawiyata siswa kelas XII di SMK Negeri Tembarak dilaksanakan pada hari Rabu, 21 Mei 2025 bertempat di lapangan upacara sekolah. Meskipun kegiatan diselenggarakan dengan sederhana, tetapi dapat terlaksana dengan khidmat, hangat, dan memberikan kesan yang tidak dapat dilupakan, baik oleh siswa maupun orang tua siswa.\r\n\r\nKegiatan ini dihadiri oleh berbagai unsur, diantaranya : Pengurus komite sekolah, seluruh guru dan tenaga kependidikan, seluruh siswa kelas XII, dan orang tua siswa. Kegiatan yang diikuti oleh lebih dari 600 orang ini berlangsung dengan meriah dan sukses sesuai dengan yang diharapkan. Purnawiyata siswa tahun ini diselenggarakan langsung oleh sejumlah perwakilan orang tua siswa yang tergabung dalam kepanitiaan, dibantu oleh komite sekolah, beberapa orang dari guru dan tenaga kependidikan SMK Negeri Tembarak, serta siswa.\r\n\r\n    Rangkaian acara dimulai dengan iring iringan para wisudawan memasuki tempat kegiatan yang di awali oleh barisan Kepala Sekolah, staf sekolah, dan seluruh guru tenaga kependidikan SMK Negeri Tembarak. Para wisudawan wisudawati berjalan memasuki tempat acara dengan penuh semangat dan percaya diri, berbalut busana adat daerah bagi perempuan dan kemeja lengkap dengan jas bagi siswa laki-laki. Selanjutnya seluruh peserta kegiatan mengikuti rangkaian kegiatan sebagai berikut :\r\n\r\nPembukaan\r\nMenyanyikan lagu Indonesia Raya dan Mars SMK N Tembarak\r\nSambutan – sambutan\r\nPenyerahan penghargaan kepada lulusan terbaik\r\nProsesi wisuda\r\nPenyampaian pesan kesan perwakilan siswa kelas XII\r\nIkrar / Janji Alumni\r\nPengambilan dokumentasi\r\nPenutup\r\n\r\n Dalam sambutan yang disampaikan baik oleh Kepala SMK N Tembarak, Ibu Aster Aswiny, S.Pd.,M.Pd dan juga ketua komite sekolah Bapak Sugiyanto, disampaikan bahwa kegiatan purnawiyata siswa kelas XII tahun ini terselenggara atas kerjasama orang tua siswa dan pihak sekolah. Ucapan selamat beliau sampaikan kepada seluruh siswa kelas XII yang tahun ini lulus 100%. Dari 288 siswa, terdapat 5 siswa tidak hadir mengikuti kegiatan karena sudah diterima kerja di perusahaan terbaik di bidang elektronika. Lebih dari 80% siswa juga dalam proses rekruitmen tenaga kerja di perusahaan nasional. Atas pencapaian ini, beliau menyampaikan apresiasi yang tinggi, dan berharap seluruh siswa mendapatkan kesuksesan sesuai dengan jalan hidupnya masing-masing.\r\n\r\n    Dalam kesempatan ini pula, diberikan penghargaan kepada siswa berprestasi. Berikut adalah data perolehan nilai terbaik peringkat 1, 2, dan 3 dari masing-masing kompetensi keahlian di SMK Negeri Tembarak.\r\n\r\n'),
(17, '1759254019.png', '284 Siswa SMK Negeri Tembarak lulus 100%', '2025-05-05', 'Admin SMK', '2025-09-30 17:40:19', 'Rapat Penegas Kelulusan siswa kelas XII Tahun Ajaran 2024/2025 telah resmi menetapkan bahwa seluruh siswa kelas XII sejumlah 284 anak dinyatakan LULUS 100%, dengan rincian 105 siswa dari Kompetensi Keahlian Rekayasa Perangkat Lunak, 107 siswa dari Kompetensi Keahlian Teknik Elektronika Industri, dan 72 siswa dari Kompetensi Keahlian Teknik Mekatronika.\r\n\r\n    Rapat Penegas Kelulusan yang dihadiri oleh Kepala Sekolah dan seluruh guru SMK Negeri Tembarak dilaksanakan di Ruang Rapat Gedung COE  pada hari Jumat, 2 Mei 2025, tepat tiga hari sebelum pelaksanaan kelulusan pada Senin, 5 Mei 2025.\r\n\r\n    Hasil kelulusan ini merupakan kabar yang membanggakan, terutama bagi siswa kelas XII yang selama tiga tahun belajar, berjuang, bekerja keras dan mendedikasikan waktu tenaga pikiran untuk menempuh pendidikan di SMK Negeri Tembarak, menyelesaikan seluruh program belajar yang harus mereka tempuh.\r\n\r\n    Keterangan yang disampaikan oleh Wakil Kepala Sekolah Bidang Kurikulum, Budi Trenggono, S.Pd.T saat memimpin jalannya rapat penegas kelulusan, menyampaikan bahwa 100% siswa kelas XII telah menyelesaikan seluruh beban belajarnya dan memenuhi kriteria kelulusan dari satuan pendidikan sesuai yang ditetapkan oleh sekolah. Kriteria kelulusan yang menjadi syarat kelulusan, diantaranya : memenuhi kehadiran siswa, nilai dari semua mata pelajaran dinyatakan tuntas, mendapatkan nilai baik pada mata pelajaran akhlak mulia dan kepribadian, telah menyelesaikan program Praktik Kerja Lapangan, dan mengikuti rangkaian asesmen di akhir program belajar (seperti : Ujian Kompetensi Keahlian, Penilaian Sumatif Akhir Jenjang, dan lain sebagainya).\r\n\r\nKepala SMK Negeri Tembarak, Aster Aswiny, S.Pd., M.Pd, dalam sambutannya menyampaikan rasa syukur dan apresiasi kepada seluruh guru, dan semua pihak yang telah berjuang bersama-sama dalam pencapaian ini. Beliau menyampaikan “Kelulusan 100% ini merupakan bukti dari semangat belajar siswa, semangat para guru yang dengan tulus ikhlas mendampingi belajar siswa, serta dukungan dari orang tua keluarga yang sudah membantu menciptakan iklim belajar yang kondusif untuk siswa”. Beliau juga berharap, kelulusan dirayakan dengan melakukan kegiatan-kegiatan yang positif, siswa diarahkan agar tidak melakukan pawai ataupun konvoi yang membahayakan dan kurang bermanfaat.\r\n\r\nSelanjutnya, di akhir kegiatan rapat, wakil kepala sekolah bidang kurikulum menyampaikan bahwa pengumuman kelulusan siswa kelas XII dapat di akses pada hari Senin, 5 Mei 2025 mulai pukul 18.00 WIB secara online melalui web sekolah dengan alamat www.smkntembarak.sch.id pada menu informasi – pengumuman kelulusan dengan memasukkan NIPD (NIS), atau melalui link : https://smkntembarak.sch.id/pengumuman-kelulusan-tahun-ajaran-2024-2025/\r\n\r\nSelamat dan Sukses Untuk Seluruh Siswa SMK Negeri Tembarak !!!\r\n\r\nSemoga ilmu yang telah didapatkan bermanfaat untuk kehidupan kalian kelak.'),
(18, '1759254154.png', 'Tingkatkan Kompetensi Lulusan, SMK Negeri Tembarak Selenggarakan Uji Sertifikasi Kompetensi', '2025-06-16', 'Admin SMK', '2025-09-30 17:42:34', ' Saat ini, sertifikat kompetensi menjadi bagian yang sangat penting yang harus dimiliki oleh pekerja sebagai bukti pengakuan atas kemampuan yang dimiliki. Sertifikat kompetensi bisa menjadi nilai tambah bahkan bisa menjadi bukti keahlian untuk bisa bertahan dan bersaing di era globalisasi.\r\n\r\n    Untuk meningkatkan daya saing di dunia kerja serta peningkatan kompetensi lulusan sesuai dengan bidang keahlian, maka SMK Negeri Tembarak mengadakan Uji Sertifikasi Kompetensi bagi peserta didiknya. Hal ini bertujuan untuk meningkatkan mutu dan kualitas sumber daya manusia dalam suatu bidang atau profesi, serta meningkatkan daya saing dan produktivitas lulusan SMK Negeri Tembarak.\r\n\r\n    Pelaksanaan Uji Sertifikasi Kompetensi SMK Negeri Tembarak difasilitasi melalui Bantuan Penyelenggaran Sertifikasi Kompetensi Bagi Peserta Didik Tahun 2025 dari Pemerintah Provinsi Jawa Tengah. Kegiatan uji sertifikasi kompetensi di SMK Negeri Tembarak berlangsung selama 2 hari untuk masing-masing konsentrasi keahlian. Untuk Konsentrasi Keahlian Mekatronika berlangsung pada tanggal 16 dan 17 April 2025 serta untuk Konsentrasi Keahlian Elektronika Industri dan Rekayasa Perangkat lunak berlangsung pada tanggal 17 dan 19 April 2025.\r\n\r\n    Rangkaian kegiatan Uji Sertifikasi Kompetensi dimulai dengan verifikasi Tempat Uji Kompetensi, pengisian formulir permohonan uji sertifikasi kompetensi, pengisian kelengkapan data, pelaksanaan uji, rapat penentuan hasil uji dan penyerahan sertifikat hasil uji sertifikasi kompetensi.\r\n\r\n Skema dalam Uji Sertifikasi Kompetensi ini meliputi Novice Programmer (Pemrogram Junior) untuk peserta didik Kompetensi Keahlian Rekayasa Perangkat Lunak, Measuring Operator (Operator Pengukuran) untuk peserta didik Konsentrasi Keahlian Elektronika Industri dan Otomasi Industri untuk Konsentrasi Keahlian Mekatronika.\r\n\r\n  Dalam pelaksanaannya, SMK Negeri Tembarak bekerja sama dengan Lembaga Sertifikasi Profesi P1 SMK Negeri 3 Kendal untuk Konsentrasi Keahlian Elektronika Industri dan Rekayasa Perangkat lunak serta Lembaga Sertifikasi Profesi P1 SMK Negeri 1 Bawang Banjarnegara untuk Konsentrasi Keahlian Teknik Mekatronika.\r\n\r\nSebanyak 56 peserta didik SMK Negeri Tembarak yang mengikuti kegiatan ini, terdiri dari 18 Peserta Didik dari Konsentrasi Keahlian Elektronika Industri, 20 Peserta Didik dari Konsentrasi Keahlian Rekayasa Perangkat Lunak dan 18 Peserta Didik dari Konsentrasi Keahlian Mekatronika.\r\nHasil dari uji sertifikasi kompetensi bersama LSP P1 diharapkan peserta uji sertifikasi memperoleh status kompeten pada masing – masing bidang dan mendapatkan sertifikat dari Badan Nasional Sertifikasi Profesi (BNSP). Diharapkan melalui sertifikat dari BNSP, status kompeten peserta didik lebih terjamin dan diakui secara nasional maupun regional.\r\n    Berdasarkan tujuan Bantuan Penyelenggaran Sertifikasi Kompetensi Bagi Peserta Didik Tahun 2025 dari Pemerintah Provinsi Jawa Tengah, diharapkan peserta uji sertifikasi kompetensi dapat segera bekerja ketika lulus dari satuan pendidikan. Sehingga sertifikat dari BNSP dapat membantu dalam proses memperoleh pekerjaan.\r\n\r\nUntuk menjamin pelaksanaan Bantuan Penyelenggaran Sertifikasi Kompetensi Bagi Peserta Didik Tahun 2025 dari Pemerintah Provinsi Jawa Tengah, Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah melaksanakan pemantauan melalui Pengawas dari Cabang Dinas Pendidikan wilayah VIII. Kegiatan pemantauan ini dilaksanakan oleh bapak Chamdani pada tanggal 17 April 2025.'),
(19, '1759254240.png', 'Kunjungan Siswa SMP Negeri 1 Bulu Ke SMK Negeri Tembarak Peran Rekayasa dan Teknologi dalam Konversi Energi', '2025-02-17', 'Admin SMK', '2025-09-30 17:44:00', ' SMK Negeri Tembarak menerima kunjungan dari siswa SMP Negeri 1 Bulu pada hari Rabu tanggal 19 Februari 2025. Kunjungan dilakukan oleh seluruh siswa kelas IX yang berjumlah 192 siswa, didampingi oleh beberapa orang guru pendamping. Berkenan menerima kunjungan adalah Ketua Program Keahlian Teknik Elektronika, Hastanto Yuwono, S.Pd, didampingi Jajaran Manajemen Sekolah (Plt. Kepala Sub Bagian Tata Usaha, Para Wakil Kepala Sekolah, Para Ketua Konsentrasi Keahlian, dan Guru Produktif).\r\n\r\nKunjungan di awali dengan apel bersama di lapangan upacara SMK Negeri Tembarak. Seluruh peserta mendapatkan pengarahan dan penjelasan teknis terkait kegiatan yang akan dilaksanakan. Dalam sambutan yang disampaikan oleh Bapak Agus Selaku perwakilan guru SMP Negeri 1 Bulu, beliau menyampaikan tujuan dari kegiatan ini adalah untuk memberikan gambaran nyata kepada siswa tentang konversi energi, sesuai dengan tema P5 SMK Negeri 1 Bulu yang saat ini yaitu Berekayasa dan Berteknologi untuk Membangun NKRI. Beliau juga menyampaikan ucapan terimakasih atas kesediaan SMK Negeri Tembarak yang sudah bersedia menjadi narasumber kegiatan mengisi materi Induksi Listrik pada hari Senin, 17 Februari 2025 kepada seluruh siswa bertempat di SMP Negeri 1 Bulu. Dan dilanjutkan dengan kegiatan kunjungan ke SMK Negeri Tembarak untuk melihat secara langsung proses konversi energi dengan memanfaatkan rekayasa dan teknologi.\r\n\r\nBapak Hastanto Yuwono, S.Pd, selaku Ketua Program Keahlian Teknik Elektronika, sekaligus koordinator tim, menyampaikan apresiasi yang tinggi kepada seluruh siswa SMP Negeri 1 Bulu atas kunjungan dan kepercayaannya kepada SMK Negeri Tembarak. Dalam kegiatan kunjungan nanti, siswa akan melihat proses teknologi berupa otomasi industry, pemanfaatan listrik dasar, pneumatic hidrolik, robotic dan pemrograman.\r\n\r\n    Selanjutnya seluruh siswa berkunjung ke lab dan bengkel untuk menyaksikan secara langsung proses konversi energi induksi listrik yang ada di SMK Negeri Tembarak. Kegiatan berjalan selama 2 jam dengan lancar. Seluruh siswa SMP Negeri 1 Bulu sangat antusias mengikuti kegiatan dan beberapa siswa menyampaikan ketertarikannya untuk melanjutkan sekolah di SMK Negeri Tembarak. Begitu pula dengan guru pendamping yang merasa puas dengan kegiatan ini dan berharap kerjasama dengan SMK Negeri Tembarak akan terus terjalin pada tahun selanjutnya.'),
(20, '1759254416.png', 'Pelatihan Pembuatan Prakarya Pemanfaatan Barang Bekas Dari DPRKPLH Bersama Tim Adiwiyata SMK Negeri Tembarak Menjadi Barang yang Bernilai Guna', '2025-02-13', 'Admin SMK', '2025-09-30 17:46:56', 'Saat ini, sampah menjadi salah satu permasalahan yang cukup sulit di tangani di lingkungan kita. Hal ini terjadi karena kebiasaan masyarakatnya sebagai konsumen yang selalu menghasilkan sampah. Oleh karena itu dengan mengubah barang bekas seperti koran, kertas bekas, dan plastik menjadi barang yang dapat digunakan kembali dapat membantu mengurangi pencemaran lingkungan di sekitar kita.\r\n    Kreativitas pemanfaatan barang bekas menjadi kerajinan tangan adalah solusi yang cukup baik untuk mengubah sampah kertas dan plastik menjadi barang yang berguna kembali, bahkan memiliki nilai jual serta dapat dikreasikan menjadi barang yang mempunyai nilai estetika.\r\n    Menyikapi kondisi tersebut, maka sebagai bentuk kepedulian terhadap lingkungan sekitar, baik lingkungan rumah maupun sekolah, maka Tim Adiwiyata SMK Negeri Tembarak mengadakan kegiatan Pelatihan Pembuatan prakarya dari barang bekas. Kegiatan ini merupakan pelatihan yang ditujukan kepada Tim Adiwiyata sekolah untuk membuat kerajinan tangan dari benda bekas menjadi benda yang bernilai guna, kreatif, bernilai ekonomis dan juga sebagai upaya untuk mengurangi sampah plastik yang sangat banyak di lingkungan sekitar kita.\r\n\r\nKegiatan dilaksanakan di Ruang Meeting SMK Negeri Tembarak pada hari Kamis, 13 Februari 2025. Sejumlah 21 anak anggota Tim Adiwiyata sekolah berpartisipasi aktif dalam kegiatan tersebut. Kegiatan dibuka oleh Bapak Imam Rosyidi Kurniawan, S.Kom selaku Wakil Kepala Sekolah Bidang Kesiswaan. Bertindak selaku narasumber dan instruktur kegiatan adalah tim dari DPRKPLH Kabupaten Temanggung yang dalam kesempatan ini hadir sebanyak 5 orang.\r\n     Sebelum memulai praktik pembuatan prakarya bersama siswa, dalam sambutan pengantar yang disampaikan oleh Bapak Budi Santoso, beliau mengingatkan pentingnya pengelolaan sampah yang ada di lingkungan sekitar kita. Sampah yang dihasilkan sebanyak 2,5 liter tiap orang per harinya, jika tidak dikelola maka akan menjadi kontributor pencemaran dan kerusakan lingkungan. Sampah dibedakan dalam tiga kategori, yaitu sampah organik, sampah anorganik, dan residu. Pengelolaan sampah dapat dilakukan dalam tiga tindakan, yaitu reuse (memanfaatkan kembali), recycle (mendaur ulang), atau reduce (mengurangi).\r\n\r\nSetelah mendengarkan paparan singkat dari Bapak Budi Santoso, semua peserta melanjutkan kegiatan praktik menggunakan alat bahan yang sudah disediakan. Dalam kesempatan ini, karya yang dibuat adalah tempat buah dari galon air le mineral, tas dari plastik bekas kemasan kopi, dan bros dari botol yakult. Kegiatan berlangsung dengan menarik, peserta mengikuti dengan sangat antusias.\r\n    Di akhir kegiatan, instruktur berpesan kepada seluruh peserta tim adiwiyata sekolah untuk menularkan ilmu yang di dapat kepada teman-teman ataupun keluarga di lingkungan tempat tinggal masing-masing. Dan kegiatan semacam ini diprogramkan secara rutin agar sampah di sekolah dapat terkelola dengan lebih baik.'),
(21, '1764133497-blog.png', 'Jalan Santai Dan Kembul Megono Meriahkan Hut SMK Negeri Tembarak Ke – 18', '2025-01-24', 'Admin SMK', '2025-11-26 05:04:57', ' Dalam rangka memeriahkan Hari Ulang Tahun SMK Negeri Tembarak ke – 18, SMK Negeri Tembarak mengadakan kegiatan jalan santai dan kembul megono pada Jumat, 24 Januari 2025. Kegiatan ini merupakan kegiatan penutup dari serangkaian kegiatan perayaan HUT SMK Negeri Tembarak tahun ini. Setelah sebelumnya serangkaian acara telah dilaksanakan secara meriah, yakni Pentas Seni dan Bazar, Ceremonial kegiatan, Pengajian memperingati Isra’ Mi’raj dan doa bersama, serta Donor Darah massal bekerjasama dengan Persit Temanggung.\r\n\r\n    Kegiatan ini diikuti oleh seluruh Guru, Tenaga Kependidikan, dan peserta didik. Acara yang berlangsung dengan penuh semangat ini menjadi momen penting untuk mempererat kebersamaan di lingkungan sekolah sekaligus memberikan manfaat positif bagi kesehatan kebugaran seluruh peserta. Jalan santai dimulai dari halaman sekolah pada pukul 08.00 WIB. Rute yang dilalui adalah dari sekolah, melewati jalan Dusun Mantenan menuju Desa Nampirejo, mengelilingi Desa Nampirejo dan kembali ke sekolah. Perjalanan yang ditempuh dalam waktu 60 menit melewati jalan kampung, sungai, persawahan, dan perkebunan yang luas nan hijau ini menjadi ajang bagi peserta untuk menyatu dengan lingkungan alam, dengan warga lingkungan sekitar, dan meningkatkan kebersamaan seluruh warga sekolah.\r\n\r\n Sesampai di sekolah, kegiatan dilanjutkan dengan Kembul Megono. Megono (bahasa Jawa: ꦩꦼꦒꦤ, translit. Mêgana) adalah sebuah hidangan khas Jawa Tengah yang terbuat dari kubis jawa dengan perpaduan kelapa parut yang dibumbui sehingga menciptakan rasa gurih. Megono awalnya berasal dari Kabupaten Pekalongan di pesisir utara Jawa. Kemudian berkembang di Kota Pekalongan, Kabupaten Batang, Kabupaten Pemalang, Kabupaten Magelang, Kota Magelang, Kabupaten Wonosobo, dan Kabupaten Temanggung. Megono biasanya disajikan dengan nasi, mendoan, cumi masak hitam, telur balado, tempe orek, mentimun, dan sambal.\r\n\r\n    Diantara tradisi lokal di wilayah Kabupaten Temanggung yang hingga saat ini masih terus dilaksanakan oleh masyarakat adalah Kembul Megono. Tradisi ini umumnya dilaksanakan saat syawalan, atau syukuran di bidang pertanian. Sebagai salah satu upaya mempertahankan kearifan local dan memperkenalkan budaya ini ke siswa maka SMK Negeri Tembarak juga melaksanakan Kembul Megono, makan bersama Nasi Megono di lapangan upacara setelah semua peserta jalan santai kembali ke sekolah.\r\n\r\n    Seluruh warga sekolah sangat antusias mengikuti kegiatan ini. Dan, di akhir kegiatan, adalah pembagian doorprize bagi siswa – siswa yang beruntung di selingi dengan berbagai acara hiburan yang cukup meriah.'),
(22, '1759254614.png', 'SMK Negeri Tembarak Gelar Donor Darah', '2025-01-24', 'Admin SMK', '2025-09-30 17:50:14', ' Donor darah adalah salah satu bentuk kontribusi kemanusiaan yang paling nyata dan langsung. Melalui satu tindakan sederhana, seseorang dapat menyelamatkan nyawa orang lain. Setiap hari, ribuan orang di Indonesia memerlukan transfusi darah untuk bertahan hidup. Entah itu korban kecelakaan, pasien kanker, ibu melahirkan yang mengalami pendarahan hebat, atau mereka yang membutuhkan operasi besar, darah adalah komponen penting yang tidak bisa digantikan oleh zat apapun. Satu kantong darah yang disumbangkan dapat menyelamatkan hingga tiga nyawa karena darah tersebut dapat dipisahkan menjadi komponen-komponen seperti sel darah merah, plasma, dan trombosit.\r\n\r\n    SMK Negeri Tembarak kembali menunjukkan kepeduliannya kepada sesame melalui kegiatan donor darah. Kegiatan ini merupakan kegiatan rutin yang dilaksanakan oleh anggota ekstra PMR bekerjasama dengan PMI Kabupaten Temanggung. Setidaknya 2 hingga 4 kali dalam setahun, SMK Negeri Tembarak menggelar kegiatan donor darah.\r\n    Aksi Donor Darah kali ini, dilaksanakan bersamaan dengan rangkaian kegiatan Perayaan HUT SMK Negeri Tembarak yang ke – 18. Tidak hanya PMR dan PMI yang bekerjasama, sekolah juga menggandeng organisasi Persit Kabupaten Temanggung.\r\n\r\n    Bertempat di Gedung COE SMK Negeri Tembarak, kegiatan ini dilaksanakan pada hari Jumat, 24 Januari 2025, mulai jam 08.00 WIB hingga selesai. Para siswa, guru, staf sekolah, anggota TNI, turut serta menjadi pendonor. Kegiatan ini bekerja sama dengan Palang Merah Indonesia (PMI) Kabupaten Temanggung yang menyediakan tim medis dan peralatan donor darah.\r\n\r\n    Acara donor darah berlangsung dengan lancar dan banyak peserta yang ikut berpartisipasi. Peserta berkumpul di ruang COE yang sudah disiapkan sebagai pusat penerimaan darah. Sebelum donor darah dimulai, peserta diberikan penjelasan tentang pentingnya donor darah, prosedur donor darah yang aman serta persyaratan kesehatan yang perlu dipenuhi. Masing – masing peserta juga di tes kesehatannya, HB, tekanan darah, dan lainnya untuk memastikan bahwa yang bersangkutan telah memenuhi syarat sebagai pendonor.\r\n\r\n    Berdasarkan laporan dari petugas PMI, maka perolehan donor darah di SMK Negeri Tembarak adalah sebagai berikut : Golongan darah A 4 kolf, B 12 kolf, O 7 kolf, dan AB 4 kolf. Sehingga total perolehan darah adalah 27 kolf.\r\n\r\n    Melihat semangat dan antusias yang tinggi dari peserta, maka SMK Negeri Tembarak berkomitmen akan terus melaksanakan agenda donor darah ini dengan rutin. Ucapan terimakasih kami sampaikan kepada seluruh peserta yang dengan keikhlasan hati telah menunjukkan kepeduliannya menolong sesama yang membutuhkan.\r\n\r\n'),
(23, '1759254708.png', 'Peringatan Isra’ Mi’raj Nabi Muhammad Saw 1446 H / 2025 M Di SMK Negeri Tembarak', '2025-01-23', 'Admin SMK', '2025-09-30 17:51:48', ' Peringatan Isra Miraj adalah salah satu peristiwa penting dalam sejarah Islam. Peristiwa ini terjadi pada tanggal 27 Rajab dalam kalender Hijriyah, ketika Nabi Muhammad SAW melakukan perjalanan malam dari Masjidil Haram ke Masjidil Aqsa di Yerusalem dan kemudian naik ke langit ketujuh untuk bertemu dengan Allah SWT. Peringatan Isra Miraj biasanya diperingati dengan berbagai kegiatan, termasuk di sekolah-sekolah.\r\n\r\n     Peringatan Isra’ Mi’raj Nabi Muhammad SAW 1446 H di SMK Negeri Tembarak  dilaksanakan pada hari Kamis, 23 Januari 2025 di halaman upacara SMK Negeri Tembarak. Kegiatan ini sekaligus menjadi rangkaian acara Perayaan HUT SMK Negeri Tembarak yang ke – 18. Peringatan Isra’ Mi’raj kali ini mengusung tema “Membumikan Nilai-nilai Isra’ Mi’raj dalam Kehidupan Sehari-hari”. Dengan harapan seluruh warga sekolah dapat meneladani semangat dan perjuangan Nabi Muhammad SAW dalam memperkuat keimanan dan ketaqwaannya kepada Allah SWT, semangat pantang menyerah dalam berdakwah menyebarkan nilai-nilai kebenaran, dan memperkuat pemahaman siswa tentang ajaran Islam serta memperkuat nilai-nilai keagamaan yang terkandung dalam peristiwa Isra Miraj. Dengan kegiatan-kegiatan yang dilakukan, diharapkan siswa dapat lebih memahami ajaran Islam dan dapat mengaplikasikan nilai-nilai keagamaan tersebut dalam kehidupan sehari-hari. Peringatan Isra Miraj juga dapat memperkuat tali silaturahmi antara siswa dan guru, serta memperkuat hubungan antara sekolah dengan lingkungan sekitarnya.\r\n\r\n Susunan acara kegiatan tersebut dimulai dari pembukaan, penampilan Grup Hadroh Al Hadid SMK Negeri Tembarak, Pembacaan Ayat Suci Al Quran, Menyanyikan Lagu Indonesia Raya, Doa Bersama, Sambutan Kepala Sekolah, Tausiyah dan doa penutup.\r\n\r\n    Tausiah disampaikan oleh Ibu Luluk Ifadah, S.Pd.I, M.Si. Beliau adalah penceramah sekaligus praktisi di dunia pendidikan dari Kampus UNISNU Temanggung. Dalam tausiahnya, beliau menyampaikan bahwa bulan rajab termasuk salah satu bulan yang dimuliakan. Bulan rajab bisa diambil makna sebagai bulan agung yang di dalamnya terdapat banyak nilai ibadah yang dapat diambil. Rajab berarti takdhim (memuliakan bulan rajab dengan ibadah yang lebih baik). Beliau juga mengingatkan bahwa selama bulan Rajab kita hendaknya melakukan ibadah-ibadah yang utama, diantaranya :\r\n1. Beribadah dengan mensucikan diri dari segala dosa/ memperbanyak istighfar\r\n2. Memperbanyak puasa\r\n3. Menyempatkan untuk bersedekah\r\n\r\nDiakhir tausiahnya, Ibu Luluk mengajak kepada seluruh warga sekolah untuk meningkatkan kualitas ibadah dengan banyak bermuhasabah/ introspeksi diri untuk mengevaluasi dan memperbaiki perbuatan, sikap, dan niat, serta menjadi pribadi yang lebih baik.\r\n\r\n    Selama acara berlangsung, seluruh warga SMK Negeri Tembarak, terutama peserta didik terlihat antusias mengikuti seluruh rangkaian acara. Kegiatan ini akan terus dilaksanakan secara rutin setiap tahun demi untuk mencetak generasi yang berakhlak dan berkarakter yang mampu beradaptasi dan siap menghadapi tantangan zaman yang semakin berat.');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `icon` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `link_url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `icon`, `contact`, `email`, `link_url`) VALUES
(4, 'bi bi-telephone', 'SMKN Tembarak', 'smk@gmail.com', 'https://smkntembarak.sch.id');

-- --------------------------------------------------------

--
-- Table structure for table `extracurriculars`
--

CREATE TABLE `extracurriculars` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `coach` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `extracurriculars`
--

INSERT INTO `extracurriculars` (`id`, `name`, `description`, `coach`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Unit Sangga Bumi', 'Kegiatan Extrakurikuler Pecinta Alam dengan kegiatan-kegiatan seperti hiking, camping, penelitian alam, sosialisasi lingkungan, konservasi alam, dan kegiatan lain yang terkait dengan menjaga alam dan meningkatkan kesadaran lingkungan.', 'Edri Pratomo Adhi, S.E', '1758092030.png', '2025-09-17 13:53:50', '2025-09-19 09:21:31'),
(3, 'Pramuka', 'Ekstrakurikuler Pramuka merupakan salah satu kegiatan ekstrakurikuler wajib, yang diikuti oleh seluruh peserta didik kelas X. Pramuka dapat membentuk Karakter dan jiwa kepemimpinan dalam diri peserta didik serta mewujudkan rasa nasionalisme yang tinggi.', 'Hastanto Yuwono, S.Pd', '1758093284-org.png', '2025-09-17 13:55:14', '2025-09-19 09:20:44'),
(5, 'Majelis Taklim', 'Kegiatan Majelis ta’lim adalah kegiatan kerohanian yang di terapkan kepada siswa dan siswi, karena dapat menumbuhkan rasa ingin beribadah dan lebih taat kepada Allah SWT.', 'Suryanto, S.Pd.I', '1758248822.png', '2025-09-19 09:27:02', '2025-09-19 09:27:02'),
(6, 'Tonti', 'Pleton Inti atau yang biasa disebut tonti adalah suatu kegiatan dimana anggotanya dilatih kedisiplinan, tanggung jawab, kepemimpinan dan kegiatan utamanya adalah baris – berbaris.', 'Budi Subagyo, S.Pd', '1758249506.png', '2025-09-19 09:38:26', '2025-09-19 09:38:26'),
(7, 'PMR', 'Ekstrakurikuler PMR (Palang Merah Remaja) adalah kegiatan ekstrakurikuler di sekolah yang berfokus pada kegiatan sosial kemanusiaan.', ' Edri Pratomo Adhi, SE', '1758249673.png', '2025-09-19 09:41:13', '2025-09-19 09:41:13'),
(8, 'OSIS', 'OSIS (Organisasi Siswa Intra Sekolah) adalah wadah resmi bagi siswa untuk mengembangkan minat, bakat, kreativitas, serta kepemimpinan. Melalui OSIS, siswa dapat menyalurkan aspirasi, belajar tanggung jawab, bekerja sama, dan berperan aktif mendukung kegiatan sekolah maupun lingkungan sekitar.', 'Heri Setiyono, S.Pd', '1758249832.png', '2025-09-19 09:43:52', '2025-09-19 09:43:52'),
(9, 'Adiwiyata', 'Kegiatan Adiwiyata adalah kegiatan kerohanian yang di terapkan kepada siswa dan siswi, karena dapat menumbuhkan rasa ingin melestarikan lingkungan', 'Sri Handayani, S.T., Gr', '1759255798.png', '2025-10-01 01:09:58', '2025-10-01 01:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint NOT NULL,
  `image` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `author`, `date`, `description`) VALUES
(6, '1759256018.png', 'Admin SMK', '2025-04-23', 'Kegiatan Pembuatan Prakarya Pemanfaatan Barang Bekas Dari DPRKPLH Temanggung'),
(7, '1759256073.png', 'Admin SMK', '2025-04-02', 'Kegiatan P5 Suara Demokrasi'),
(8, '1759256126.png', 'Admin SMK', '2025-02-22', 'Rapat Pleno SMK Negeri Tembarak'),
(9, '1759256170.png', 'Admin SMK', '2025-05-31', 'Kegiatan P5 Bangunlah Jiwa Raganya'),
(10, '1759256251.png', 'Admin SMK', '2025-02-04', 'Kegiatan Parenting SMK Negeri Tembarak'),
(11, '1759256277.png', 'Admin SMK', '2025-04-04', 'Purnawiyata Siswa SMK Negeri Tembarak'),
(12, '1759256343.png', 'Admin SMK', '2025-02-03', 'Pelaksanaan Penilaian Kinerja Kepala Sekolah Tahun 2023'),
(13, '1759256369.png', 'Admin SMK', '2025-03-04', 'Job Fair SMK Pusat Keunggulan\r\n'),
(14, '1759256393.png', 'Admin SMK', '2025-05-04', 'Kunjungan Menko PMK Bapak Prof. Dr. Muhadjir Effendy, M.A.P.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `headmasters`
--

CREATE TABLE `headmasters` (
  `id` bigint NOT NULL,
  `headmaster_name` varchar(255) NOT NULL,
  `headmaster_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `headmaster_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `headmasters`
--

INSERT INTO `headmasters` (`id`, `headmaster_name`, `headmaster_image`, `headmaster_description`) VALUES
(4, 'Aster Aswiny, S.Pd., M.Pd.', '1758089438.png', 'Assalamu’alaikum Warahmatullah Wabarakatuh\r\n\r\nPuji syukur kami panjatkan kehadirat Allah SWT, karena atas berkat dan rahmat-Nya kami dapat memperbarui website SMKN Tembarak  Kehadiran website ini diharapkan dapat menjadi salah satu pintu yang memudahkan penyampaian informasi tentang profil sekolah, aktivitas-aktivitas warga sekolah, serta fasilitas sekolah kami secara terbuka kepada sesama warga sekolah, alumni, masyarakat, serta instansi lain\r\n\r\nWebsite ini diharapkan juga dapat menjadi wahana interaksi, baik antar warga sekolah, maupun warga sekolah dengan alumni, dengan masyarakat, serta komunikasi antar alumni sebagai salah satu upaya sekolah mendapatkan informasi untuk penelusuran tamatan/alumni dimana saja berada, sehingga dapat terjalin silaturahmi\r\n\r\nMari kita terus belajar, bekerja dan berkarya, serta berkolaborasi dengan penuh keikhlasan, dengan mengharap ridha dan keberkahan dari Allah SWT, demi meningkatkan kualitas generasi penerus bangsa, untuk kemajuan masyarakat.\r\n\r\nWassalamu’alaikum Warahmatullah Wabarakatuh');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` bigint NOT NULL,
  `majors_name` varchar(255) NOT NULL,
  `majors_image` text NOT NULL,
  `majors_description` text NOT NULL,
  `head` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `majors_name`, `majors_image`, `majors_description`, `head`) VALUES
(1, 'ELIND', '1758096376.png', 'Perkembangan teknologi yang sangat cepat menuntut kita untuk menjadi tenaga-tenaga terampil supaya dapat menjawab tantangan perkembangan teknologi terutama tantangan revolusi industri 4.0. Program Jurusan Teknik Elektronika Industri didirikan dengan tujuan untuk melahirkan tenaga-tenaga lulusan SMK yang berakhlak mulia, berpikiran terbuka, dan terampil di bidang sistem kontrol dan maintenance peralatan industri di bidang elektronika yang siap bersaing untuk menjawab tantangan revolusi industri 4.0.\r\n\r\nKompetensi yang diajarkan untuk peserta didik di Jurusan Teknik Elektronika Industri meliputi Pengetahuan dan Ketrampilan Dasar Listrik dan Elektronika, Mikroprosesor dan Mikrokontroler, Pneumatic dan PLC, serta Pemrograman yang erat kaitannya dengan dunia industri.\r\n\r\nKompetensi Keahlian yang diajarkan:\r\n\r\n1. Kerja Bengkel dan Gambar Teknik\r\n2. Dasar Listrik Elektronika\r\n3. Teknik Pemrograman\r\n4. Mikroprosesor, dan Mikronontroler\r\n5. Penerapan Rangkaian Elektronika\r\n6. Sistem Pengendali Elektronik\r\n7. Pengendali Sistem Robotik\r\n8. Pembuatan, Perbaikan, dan Pemeliharaan Peralatan Elektronika\r\n9. Produk Kreatif dan Kewirausahaan\r\n\r\nIndustri yang membutuhkan tenaga terampil lulusan Teknik Elektronika Industri\r\n1. Perusahaan BUMN\r\n2. Perusahaan Software dan Hardware\r\n3. Perusahaan Manufaktur\r\n4. Perusahaan Elektronik\r\n5. Perusahaan Telekomunikasi\r\n6. Perusahaan Perminyakan dan Pertambangan\r\n7. Wirausaha\r\n8. Dan masih banyak lagi', 'Hastanto Yuwono. S.pd'),
(3, 'PPLG', '1758513661.png', 'A. Visi\r\n\r\nDapat menghasilkan tenaga kerja tingkat menengah di bidang Teknologi Informatika untuk memenuhi kebutuhan Pembangunan Nasional dan daerah setempat, baik saat ini maupun dimasa yang akan dating sejalan dengan kecenderungan era globalisasi, kemajuan teknologi, dan wawasan lingkungan\r\n\r\nB. Misi\r\n\r\nMembentuk SDM teknologi informasi berwawasan global yang beriman dan bertaqwa kepada Tuhan YME.\r\nMenghasilkan lulusan yang bertaqwa, berakhlak mulia, produktif, adaptif, kreatif, inovatif, peduli dan berbudaya lingkungan dibidang Teknologi Informatika khususnya Rekayasa Perangkat Lunak (Software Engineering) serta mampu melaksanakan hak dan kewajibannya sebagai warga negara.\r\nMeningkatkan kecerdasan yang bermartabat didasari asas kecakapan hidup dibidang Teknologi Informatika khususnya Rekasaya Perangkat Lunak (Software Engineering).\r\nMenghasilkan lulusan yang berkualitas dan mampu bersaing di pasar tenaga kerja baik nasional, regional, maupun internasional di bidang Teknologi Informatika khususnya Rekayasa Perangkat Lunak (Software Engineering).\r\nMembekali peserta didik dengan kemampuan berbahasa asing untuk mampu mengisi lapangan kerja terdidik di luar negeri khususnya di bidang Teknologi Informatika.\r\nC. Tujuan\r\n\r\nMenginstalasi software aplikasi spesifik pemrograman\r\nMengoperasikan software aplikasi spesifik pemrograman\r\nMerawat software aplikasi spesifik pemrograman\r\nMembangun software aplikasi spesifik pemrograman\r\nMengelola usaha di bidang pembuatan software aplikasi yang ramah lingkungan', 'Amin Wahyudi, S.Kom'),
(4, 'MEKA', '1758513760.png', 'Mekatronika merupakan suatu gabungan dari kata Mekanik dan Elektronik. Mekatronik adalah suatu cabang ilmu yang mempelajari gabungan disiplin iptek teknik mesin, teknik elektro, teknik kendali, dan teknik informatika. Program Jurusan Teknik Mekatronika didirikan dengan tujuan untuk melahirkan tenaga-tenaga lulusan SMK yang berakhlak mulia, berpikiran terbuka, dan terampil di bidang robotika dan otomasi industri yang siap bersaing untuk menjawab  tantangan revolusi industri 4.0. Kompetensi yang diajarkan untuk peserta didik di Jurusan Teknik Elektronika Industri meliputi Pengetahuan dan Ketrampilan Dasar Listrik dan Elektronika, Mikroprosesor dan Mikrokontroler, Pneumatic dan PLC, Pemrograman, dan Sistem Robotika yang berperan penting dalam bidang industri.\r\n\r\nKompetensi Keahlian yang diajarkan:\r\n\r\n1. Kerja Bengkel dan Gambar Teknik\r\n2. Dasar Listrik Elektronika\r\n3. Teknik Pemrograman\r\n4. Mikroprosesor, dan Mikronontroler\r\n5. Sistem Kontrol Mekatonik\r\n6. Sistem Kontrol CAE\r\n7. Sistem Kontrol Robotik\r\n8. Perawatan dan Perbaikan Peralatan Mekatronik\r\n9. Produk Kreatif dan Kewirausahaan\r\n \r\nIndustri yang membutuhkan tenaga terampil lulusan Teknik Elektronika Industri antara lain:\r\n\r\n1. Perusahaan BUMN\r\n2. Perusahaan Pertambangan\r\n3. Perusahaan Mesin-mesin Industri\r\n4. Perusahaan Industri Otomotif\r\n5. Perusahaan Elektronik\r\n6. Perusahaan Manufaktur\r\n7. Perusahaan Perminyakan\r\n8. Perusahaan Maintenance\r\n9. Wirausaha', 'Hastanto Yuwono. S.pd');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` bigint NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `telepon`, `subjek`, `message`, `created_at`, `is_read`) VALUES
(9, 'Farrell Ega Maulana', 'farrell@gmail.com', '08574989268', 'e', 'w', '2025-09-29 11:49:41', 1),
(10, 'Farrell Ega Maulana', 'farrell@gmail.com', '08574989268', 'frf', 's', '2025-09-29 11:51:23', 1),
(11, 'Farrell Ega Maulana', 'farrell@gmail.com', '08574989268', 'frf', 's', '2025-10-01 05:14:46', 1),
(12, 'Aulia', 'aulia@gmail.com', '08574989268', 'tanya tentang web sekolah nya', 'tanya tentang web sekolah nya tanya tentang web sekolah nya tanya tentang web sekolah nya tanya tentang web sekolah nya', '2025-10-01 08:37:10', 1),
(13, 'putri', 'putri@gmail.com', '08574989268', 'tanya tentang web sekolah nya', 'tanya tentang web sekolah nyatanya tentang web sekolah nyatanya tentang web sekolah nya', '2025-10-14 21:01:00', 1),
(14, 'putri', 'putri@gmail.com', '08574989268', 'tanya tentang web sekolah nya', 'tanya tentang web sekolah nyatanya tentang web sekolah nyatanya tentang web sekolah nya', '2025-10-14 21:01:02', 1),
(15, 'Farrell Ega Maulana', 'farrell@gmail.com', '08574989268', 'frf', 'grgr', '2025-10-14 21:01:33', 1),
(16, 'Farrell EM', 'ega@gmail.com', '08574989268', 'tanya tentang web sekolah nya', 'gerg', '2025-10-14 21:04:55', 1),
(17, 'maulana', 'maulana@gmail.com', '085698751231', 'tanya tentang seputar web sekolah', 'itu foto foto yg blur mhon diubah ya agar lebih bagus', '2025-10-19 22:53:21', 1),
(18, 'Farrell EM', 'guru@gmail.com', '08574989268', 'rr', 'rr', '2025-10-20 00:26:26', 1),
(19, 'Farrell Ega Maulana', 'farrell@gmail.com', '08574989268', 'frf', 'tt', '2025-10-20 00:36:46', 1),
(20, 'farrell maulana', 'admin@gmail.com', '3234131221', 'feefe', 'feew', '2025-10-27 23:42:25', 0),
(21, 'farrell maulana', 'admin@gmail.com', '3234131221', 'feefe', 'wd3', '2025-10-27 23:50:50', 0),
(22, 'farrell maulana', 'admin@gmail.com', '3234131221', 'feefe', '3r3', '2025-10-28 06:53:55', 0),
(23, 'Farrell Ega Maulana', 'farrell@gmail.com', '08574989268', 'tanya tentang web sekolah nya', 'te', '2025-10-29 06:30:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint NOT NULL,
  `icon` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `icon`, `title`, `link_url`) VALUES
(1, 'bi bi-facebook', 'facebook', 'https://www.facebook.com/smkntembarak/'),
(3, 'bi bi-instagram', 'Instagram', 'https://www.instagram.com/smkntembarak/'),
(5, 'bi bi-youtube', 'Youtube', 'https://www.youtube.com/@officialsmkntembarak9913');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint NOT NULL,
  `teachers_name` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `teachers_photo` text NOT NULL,
  `teachers_major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teachers_name`, `jk`, `teachers_photo`, `teachers_major`) VALUES
(5, 'Syaiful Anwar, S.Pd', 'Laki-laki', '1758180702.png', 'Kepala Tata Usaha'),
(6, 'Lukman, S.Pd', 'Laki-laki', '1758180754.png', 'Wakil Kepala Bidang Hubungan Industri'),
(7, 'Budi Trenggono, S.Pd.T', 'Laki-laki', '1758180814.png', 'Wakil Kepala Bidang Kurikulum'),
(8, 'Erma Nasriyati, S.Pd, M.Si', 'Perempuan', '1758180901.png', 'Wakil Kepala Bidang Manajemen Mutu'),
(9, 'KUSNUN, S.Pd', 'Laki-laki', '1758181022.png', 'Wakil Kepala Bidang Sarpras'),
(10, 'AMIN WAHYUDI, S.Kom', 'Laki-laki', '1758181609.png', 'Kaprogli Teknik Komputer Dan Informatika'),
(11, 'TRI WARDONO BAGUS P, S.T', 'Laki-laki', '1758182355.png', 'BKK SMK Negeri Tembarak'),
(12, 'HASTANTO YUWONO, S.Pd', 'Laki-laki', '1758182378.png', 'KAPROGLI TEKNIK ELEKTRONIKA'),
(13, 'IMAM ROSYIDI KURNIAWAN, S.Kom', 'Laki-laki', '1758182413.png', 'Wakil Kepala Bidang Kesiswaan'),
(14, 'Nurhidayah, S.Pd', 'Perempuan', '1758183520.png', 'Guru BP/BK'),
(16, 'Endang Palupi, S.Pd', 'Perempuan', '1758183634.png', 'Guru Adaptif Normatif'),
(17, 'ARIN PRAWIYATI, S.Pd., M.Si.', 'Perempuan', '1758183610.png', 'Guru Adaptif Normatif'),
(18, 'Sidik Waluyo, S.Kom, M.Si', 'Laki-laki', '1758183592.png', 'Guru Produktif RPL'),
(19, 'Fajar Indah Mulyani, ST, M.Si', 'Perempuan', '1758183576.png', 'Guru Adaptif Normatif'),
(20, 'Tri Nugroho, S.Pd', 'Laki-laki', '1758183553.png', 'Guru Produktif ELIND'),
(21, 'Iswantiningsih, S.Pd', 'Perempuan', '1758184024.png', 'Guru Adaptif Normatif'),
(22, 'Sri Nurning Wijayanti, S.Pd', 'Perempuan', '1758183967.png', 'Guru Adaptif Normatif'),
(23, 'Timbul Darja\'I, S.Kom', 'Laki-laki', '1758183821.png', 'Guru Produktif RPL'),
(24, 'UDI LUSIYATI, S.Pd.Si', 'Perempuan', '1758183790.png', 'Guru Adaptif Normatif'),
(25, 'Isnadi, S.S', 'Laki-laki', '1758183759.png', 'Guru Adaptif Normatif'),
(26, 'Budi Subagyo, S.Pd', 'Laki-laki', '1758184057.png', 'Guru Produktif ELIND'),
(27, 'Muhamad Sulanjari, S.Pd ', 'Laki-laki', '1758184323.png', 'Guru Produktif Mekatronika'),
(28, 'Edri Pratomo Adhi, S.E ', 'Laki-laki', '1758184354.png', 'Guru Produktif RPL'),
(29, 'Anik Puspitasari, S.Pd ', 'Perempuan', '1758184392.png', 'Guru Adaptif Normatif'),
(30, 'Hendi Agus Wijanarko, S.Pd.Kor', 'Laki-laki', '1758184419.png', ' Guru Adaptif Normatif'),
(31, 'Setia Dwi Utami, S.Si ', 'Perempuan', '1758184443.png', 'Guru Adaptif Normatif'),
(32, 'Sri Handayani, S.T., Gr ', 'Perempuan', '1758184466.png', 'Guru Produktif ELIND'),
(33, 'Asih Rokhaeni, S.Pd.I ', 'Perempuan', '1758184561.png', 'Guru Adaptif Normatif'),
(34, 'Budi Wahyu Ratnasari, S.Pd', 'Perempuan', '1758184589.png', ' Guru Adaptif Normatif'),
(35, 'Akhmad Syaiful Lubis, S.Kom ', 'Laki-laki', '1758184611.png', 'Guru Produktif RPL'),
(36, 'Heri Setiyono, S.Pd', 'Laki-laki', '1758184632.png', ' Guru Adaptif Normatif'),
(37, 'Bayu Setiyawan, S.Pd ', 'Laki-laki', '1758184660.png', 'Guru Produktif Mekatronika'),
(38, 'Muhammad Taufiqurrohman, S.Pd ', 'Laki-laki', '1758184684.png', 'Guru Produktif Mekatronika'),
(39, 'Sinung Rahayu, S.Pd ', 'Perempuan', '1758184786.png', 'Guru Adaptif Normatif'),
(40, 'Ahmad Fajar Nugroho, S.Pd ', 'Laki-laki', '1758184821.png', 'Guru Produktif Mekatronika'),
(41, 'Suryanto, S.Pd.I ', 'Laki-laki', '1758184863.png', 'Guru Adaptif Normatif'),
(42, 'Vivin Vitri Isnaini, S.Kom', 'Perempuan', '1758184885.png', ' Bendahara'),
(43, ' Wiwik Adibah, SE ', 'Perempuan', '1758184919.png', 'Bendahara'),
(44, 'Yuli Rahmawati, SE ', 'Perempuan', '1758184950.png', 'Kesekretariatan'),
(45, 'Didik Risdiyantoro, ST ', 'Laki-laki', '1758185041.png', 'Teknisi'),
(46, 'Muhammad Khotibul Iman ', 'Laki-laki', '1758185066.png', 'Teknisi'),
(47, 'Saeful Rokhman, SE ', 'Laki-laki', '1758185090.png', 'Bendahara Barang'),
(48, 'Siska Sulistyaningsih, S.E ', 'Perempuan', '1758185143.png', 'Staff Administrasi'),
(49, 'Maya Krismasari, S.I.', 'Perempuan', '1758185171.png', 'Pust Pustakawan'),
(50, 'Siti Fatimatul Zahro ', 'Perempuan', '1758185210.png', 'Staff Administrasi'),
(51, 'Akhmad Nur Wachid ', 'Laki-laki', '1758185271.png', 'Staff Kebersihan'),
(52, 'Agus Setiawan ', 'Laki-laki', '1758185319.png', 'Security'),
(53, 'Kusman', 'Laki-laki', '1758185343.png', ' Penjaga Sekolah'),
(54, 'Adi Nugroho ', 'Laki-laki', '1758185652.png', 'Penjaga Sekolah'),
(55, 'Wahyudi ', 'Laki-laki', '1758185693.png', 'Penjaga Sekolah'),
(56, 'Nur Chamid ', 'Laki-laki', '1758185725.png', 'Staff Kebersihan');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `status` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `rating`, `status`, `message`) VALUES
(7, '1764125935-testimoni.jpg', 'Farrell Ega', 5, 'Siswa', 'Peralatan lab di sini canggih dan lengkap. Saya dapat skill praktik yang langsung terpakai di industri. Lulus nanti saya yakin siap kerja!'),
(9, '1764125583-testimoni.jpg', 'Gunawan', 5, 'Alumni SMK', 'Kurikulum di sekolah ini benar-benar relevan dengan kebutuhan industri saat ini. Saya merasa satu langkah di depan saat memasuki dunia profesional.'),
(10, '1764125619-testimoni.jpg', 'Dhamar', 5, 'Alumni SMK', 'Fasilitas lab yang lengkap dan instruktur yang kompeten membuat belajar di sini sangat efektif. Keterampilan saya meningkat pesat dan siap kerja.'),
(11, '1764126127-testimoni.jpg', 'Anas Adi', 5, 'Siswa', 'Lingkungan sekolah yang suportif dan bimbingan karir yang fokus membantu saya menemukan passion. Saya diterima di universitas impian.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `role` enum('staf','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(2, 'staf', 'staf@gmail.com', NULL, '$2y$10$AFS1T2YsIDbbbk1/EnOqHuDUTLLKbi/KoFRDR4oBXcsbz97BlbyfC', '', '2025-10-06 03:28:50', '2025-10-06 03:28:50', 'staf'),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$10$xGYMVpsQ7wviPZRQCS5/GuD4P4SzKcmvim0X0c6HuV5/GDUdCKDUa', '', '2025-10-14 04:09:22', '2025-10-14 04:09:22', 'admin'),
(5, 'farrell', 'farrell@gmail.com', NULL, '$2y$10$TByFPqWuunoHuRpxNVqHr.YfSwOug/jfEsOeDdygbiQZKRGrqXDIW', '', '2025-10-19 17:42:00', '2025-10-19 17:42:00', 'staf'),
(6, 'pak maulana', 'maulana@gmail.com', NULL, '$2y$10$1ixSV7lBzuElVEesgnUYoeRznQ3/wuq1eAuZeBMYhprQcdlnk7zN2', '', '2025-10-19 17:42:40', '2025-10-19 17:42:40', 'admin'),
(8, 'eeee', 'farrell22@gmail.com', NULL, '$2y$10$6j4lcwVKZCOtDIArloE9IuINn3qdtM.PnLynWg3gfln/noEBzCJfW', '', '2025-10-22 03:23:03', '2025-10-22 03:23:03', 'staf'),
(9, 'Aulia', 'farrell222@gmail.com', NULL, '$2y$10$B76hyqXWdNY6gdpCDMT8EuiYYRZfmwkym5aD0zOINegF77HsMBj3y', '', '2025-10-22 03:26:33', '2025-10-22 03:26:33', 'staf');

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `activity` varchar(50) NOT NULL,
  `login_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL,
  `user_agent` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `record_id` int NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_activities`
--

INSERT INTO `user_activities` (`id`, `user_id`, `activity`, `login_at`, `logout_at`, `ip_address`, `user_agent`, `created_at`, `table_name`, `record_id`, `description`) VALUES
(69, 3, 'logout', NULL, '2025-10-20 06:56:21', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 06:56:21', '', 0, 'User berhasil logout'),
(70, 5, 'login', '2025-10-20 06:56:25', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 06:56:25', '', 0, 'User berhasil login'),
(71, 5, 'logout', NULL, '2025-10-20 06:56:31', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 06:56:31', '', 0, 'User berhasil logout'),
(72, 3, 'login', '2025-10-20 06:56:38', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 06:56:38', '', 0, 'User berhasil login'),
(73, 6, 'logout', NULL, '2025-10-20 07:15:41', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 07:15:41', '', 0, 'User berhasil logout'),
(74, 3, 'login', '2025-10-20 07:15:49', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 07:15:49', '', 0, 'User berhasil login'),
(75, 3, 'logout', NULL, '2025-10-20 07:18:21', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 07:18:21', '', 0, 'User berhasil logout'),
(76, 3, 'login', '2025-10-20 07:18:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 07:18:31', '', 0, 'User berhasil login'),
(77, 3, 'logout', NULL, '2025-10-20 07:18:41', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 07:18:41', '', 0, 'User berhasil logout'),
(78, 2, 'login', '2025-10-20 07:18:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 07:18:48', '', 0, 'User berhasil login'),
(79, 2, 'logout', NULL, '2025-10-20 07:19:03', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 07:19:03', '', 0, 'User berhasil logout'),
(80, 3, 'login', '2025-10-20 07:19:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 07:19:10', '', 0, 'User berhasil login'),
(81, 3, 'logout', NULL, '2025-10-20 07:29:58', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 07:29:58', '', 0, 'User berhasil logout'),
(82, 2, 'login', '2025-10-20 07:30:05', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 07:30:05', '', 0, 'User berhasil login'),
(83, 2, 'logout', NULL, '2025-10-20 07:30:41', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 07:30:41', '', 0, 'User berhasil logout'),
(84, 3, 'login', '2025-10-20 07:30:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-20 07:30:58', '', 0, 'User berhasil login'),
(85, 3, 'login', '2025-10-21 15:22:45', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-21 15:22:45', '', 0, 'User berhasil login'),
(86, 3, 'logout', NULL, '2025-10-21 15:44:50', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-21 15:44:50', '', 0, 'User berhasil logout'),
(87, 6, 'login', '2025-10-21 15:45:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-21 15:45:11', '', 0, 'User berhasil login'),
(88, 6, 'logout', NULL, '2025-10-21 15:46:07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-21 15:46:07', '', 0, 'User berhasil logout'),
(89, 3, 'login', '2025-10-22 03:28:59', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-22 03:28:59', '', 0, 'User berhasil login'),
(90, 3, 'logout', NULL, '2025-10-22 09:08:50', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-22 09:08:50', '', 0, 'User berhasil logout'),
(91, 3, 'login', '2025-10-23 01:26:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-23 01:26:24', '', 0, 'User berhasil login'),
(92, 3, 'login', '2025-10-23 01:49:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-23 01:49:30', '', 0, 'User berhasil login'),
(93, 3, 'login', '2025-10-23 02:48:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-23 02:48:09', '', 0, 'User berhasil login'),
(94, 3, 'login', '2025-10-27 02:00:20', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-27 02:00:20', '', 0, 'User berhasil login'),
(95, 3, 'login', '2025-10-27 04:10:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-27 04:10:32', '', 0, 'User berhasil login'),
(96, 3, 'login', '2025-10-28 04:27:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-28 04:27:08', '', 0, 'User berhasil login'),
(97, 3, 'logout', NULL, '2025-10-28 04:35:49', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-28 04:35:49', '', 0, 'User berhasil logout'),
(98, 3, 'login', '2025-10-28 06:23:41', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-28 06:23:41', '', 0, 'User berhasil login'),
(99, 3, 'login', '2025-10-29 06:13:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-10-29 06:13:10', '', 0, 'User berhasil login'),
(100, 3, 'login', '2025-11-26 02:19:57', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-26 02:19:57', '', 0, 'User berhasil login'),
(101, 3, 'login', '2025-12-04 02:13:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-04 02:13:33', '', 0, 'User berhasil login'),
(102, 3, 'logout', NULL, '2025-12-04 02:20:32', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-04 02:20:32', '', 0, 'User berhasil logout');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` bigint NOT NULL,
  `visi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `visi`, `misi`) VALUES
(1, 'Menjadi pusat pelayanan masyarakat untuk menyiapkan tenaga kerja tingkat menengah yang profesional, berjiwa wirausaha, berwawasan lingkungan, dan berdaya saing di era global.', 'Menyiapkan lulusan yang kompeten di kompetensi keahliannya.\r\nMenjadi Sekolah Menengah Kejuruan Unggulan yang bisa diakses masyarakat luas.\r\nMeningkatkan daya serap lulusan di Dunia Kerja, menjadi Wirausaha, dan dapat melanjutkan ke pendidikan tinggi.\r\nMeningkatkan peran SMK Negeri Tembarak sebagai Pusat Pengembangan Teknologi dan Rekayasa, Teknologi Informasi dan Komunikasi bagi sekolah, industri, dan masyarakat.\r\nMemberdayakan warga sekolah dalam mewujudkan sekolah yang bersih, dan berwawasan lingkungan.\r\nMengembangkan potensi peserta didik melalui kegiatan ekstrakurikuler yang terintegrasi pendidikan karakter dan lingkungan hidup.\r\nMeningkatkan mutu sumberdaya manusia pendidik dan tenaga kependidikan, sertifikasi kompetensi, sertifikasi asesor kompetensi profesi, pendidikan dan pelatihan (diklat) serta magang industri.\r\nMengembangkan unit produksi sebagai wahana pelatihan berbasis produksi dan kewirausahaan.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extracurriculars`
--
ALTER TABLE `extracurriculars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headmasters`
--
ALTER TABLE `headmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `extracurriculars`
--
ALTER TABLE `extracurriculars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `headmasters`
--
ALTER TABLE `headmasters`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
