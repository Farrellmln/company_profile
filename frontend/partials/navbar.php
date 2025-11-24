<?php
$qHome = "SELECT * FROM abouts";
$resHome = mysqli_query($connect, $qHome) or die(mysqli_error($connect));
$item = $resHome->fetch_object();

$currentPath = $_SERVER['PHP_SELF'];

$isHomeActive         = strpos($currentPath, '/beranda/index.php') !== false || $currentPath == '/index.php' || $currentPath == '/';
$isSambutanActive     = strpos($currentPath, '/profil_sekolah/index.php') !== false;
$isSejarahActive      = strpos($currentPath, '/sejarah/index.php') !== false;
$isVisiMisiActive     = strpos($currentPath, '/visi_misi/index.php') !== false;
$isGuruStafActive     = strpos($currentPath, '/gurustaf/index.php') !== false;
$isOrganisasiActive   = strpos($currentPath, '/organisasi/index.php') !== false;
$isJurusanActive      = strpos($currentPath, '/jurusan/index.php') !== false;

$isBeritaTerbaruActive = strpos($currentPath, '/berita/index.php') !== false;
$isPengumumanActive    = strpos($currentPath, '/pengumuman/index.php') !== false;
$isPrestasiActive      = strpos($currentPath, '/prestasi/index.php') !== false;
$isTestimoniActive     = strpos($currentPath, '/testimonials/index.php') !== false;
$isGaleriActive        = strpos($currentPath, '/galeri/index.php') !== false;
$isKontakActive        = strpos($currentPath, '/kontak/index.php') !== false;

$isProfilActive = $isSambutanActive || $isSejarahActive || $isVisiMisiActive || $isGuruStafActive || $isOrganisasiActive || $isJurusanActive;
$isBeritaActive = $isBeritaTerbaruActive || $isPengumumanActive;
?>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <style>
    .header {
      background: rgba(58, 58, 58, 0.9);
      color: white;
      z-index: 999;
    }

    .logo img {
      height: 65px;
      margin-right: 15px;
      object-fit: contain;
    }

    .sitename {
      font-size: 30px;
      font-weight: bold;
      color: white;
      margin: 0;
    }

    .navmenu {
      display: flex;
      justify-content: center;
      flex-grow: 1;
    }

    .navmenu ul {
      display: flex;
      align-items: center;
      gap: 0;
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .navmenu a {
      color: white !important;
      text-decoration: none;
      font-weight: 500;
      padding: 8px 10px;
      transition: color 0.3s;
    }

    .navmenu a.active,
    .navmenu li.dropdown > a.active {
      color: #00c291 !important;
      font-weight: 700;
    }

    .navmenu a:hover {
      color: #00c291 !important;
    }

    .navmenu li.dropdown > a {
      cursor: pointer;
    }

    .navmenu .dropdown ul {
      background-color: #4a4a4a;
      padding: 10px 0;
      position: absolute;
      display: none;
      list-style: none;
      border-radius: 5px;
      z-index: 999;
    }

    .navmenu li.dropdown:hover > ul {
      display: block;
    }

    .navmenu .dropdown ul li a {
      color: white !important;
      padding: 8px 20px;
      display: block;
    }

    .navmenu .dropdown ul li a.active,
    .navmenu .dropdown ul li a:hover {
      color: #00c291 !important;
      font-weight: 600;
    }

    .social-icons {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .social-icons a {
      color: white;
      font-size: 18px;
      transition: color 0.3s;
    }

    .social-icons a:hover {
      color: #00c291;
    }

    @media (max-width: 991px) {
      .navmenu,
      .social-icons {
        display: none;
      }
    }
  </style>
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between px-4">
      <a href="../beranda/index.php" class="logo d-flex align-items-center me-auto">
        <img src="/company_profile/storages/abouts/<?= $item->school_logo ?>" alt="Logo Sekolah" />
        <h1 class="sitename"><?= $item->school_name ?></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="../beranda/index.php" class="<?= $isHomeActive ? 'active' : '' ?>">Beranda</a></li>

          <li class="dropdown">
            <a class="<?= $isProfilActive ? 'active' : '' ?>" onclick="return false;">Profil Sekolah <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../profil_sekolah/index.php" class="<?= $isSambutanActive ? 'active' : '' ?>">Sambutan Kepala Sekolah</a></li>
              <li><a href="../sejarah/index.php" class="<?= $isSejarahActive ? 'active' : '' ?>">Sejarah Sekolah</a></li>
              <li><a href="../visi_misi/index.php" class="<?= $isVisiMisiActive ? 'active' : '' ?>">Visi dan Misi</a></li>
              <li><a href="../gurustaf/index.php" class="<?= $isGuruStafActive ? 'active' : '' ?>">Guru dan Staf</a></li>
              <li><a href="../organisasi/index.php" class="<?= $isOrganisasiActive ? 'active' : '' ?>">Organisasi Sekolah</a></li>
              <li><a href="../jurusan/index.php" class="<?= $isJurusanActive ? 'active' : '' ?>">Jurusan</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="<?= $isBeritaActive ? 'active' : '' ?>" onclick="return false;">Berita <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../berita/index.php" class="<?= $isBeritaTerbaruActive ? 'active' : '' ?>">Berita Terbaru</a></li>
              <li><a href="../pengumuman/index.php" class="<?= $isPengumumanActive ? 'active' : '' ?>">Pengumuman</a></li>
            </ul>
          </li>

          <li><a href="../prestasi/index.php" class="<?= $isPrestasiActive ? 'active' : '' ?>">Prestasi</a></li>
          <li><a href="../testimonials/index.php" class="<?= $isTestimoniActive ? 'active' : '' ?>">Testimoni</a></li>
          <li><a href="../galeri/index.php" class="<?= $isGaleriActive ? 'active' : '' ?>">Galeri</a></li>
          <li><a href="../kontak/index.php" class="<?= $isKontakActive ? 'active' : '' ?>">Kontak</a></li>
        </ul>
      </nav>

      <div class="social-icons">
        <a href="https://www.instagram.com/smkntembarak/"><i class="bi bi-instagram"></i></a>
        <a href="https://www.youtube.com/@officialsmkntembarak9913"><i class="bi bi-youtube"></i></a>
        <a href="https://www.facebook.com/smkntembarak/"><i class="bi bi-facebook"></i></a>
        <a href="https://api.whatsapp.com/send/?phone=6285727167740&text&type=phone_number&app_absent=0"><i class="bi bi-telephone"></i></a>
      </div>
    </div>
  </header>
</body>
