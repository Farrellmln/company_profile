<?php
$current_folder = basename(dirname($_SERVER['PHP_SELF']));

function activeMenu($folder) {
  global $current_folder;
  return $current_folder === $folder ? 'active' : '';
}

// Untuk dropdown: jika salah satu child aktif
function activeDropdown($folders = []) {
  global $current_folder;
  return in_array($current_folder, $folders) ? 'active' : '';
}
?>

<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container position-relative d-flex align-items-center justify-content-between">

    <a href="../beranda/index.php" class="logo d-flex align-items-center me-auto me-xl-0">
      <img src="/company_profile/storages/abouts/<?= $item->school_logo ?>" style="height:50px; margin-right:10px;">
      <h1 class="sitename"><?= $item->school_name ?></h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>

        <!-- BERANDA -->
        <li><a href="../beranda/index.php" class="<?= activeMenu('beranda') ?>">Beranda</a></li>

<!-- PROFIL SEKOLAH -->
<li class="dropdown">
  <a href="#" class="<?= activeDropdown(['profil_sekolah','sejarah','visi_misi','gurustaf','organisasi','jurusan']) ?>">
    <span>Profil Sekolah</span>
    <i class="bi bi-chevron-down toggle-dropdown"></i>
  </a>
  <ul>
    <li><a href="../profil_sekolah/index.php" class="<?= activeMenu('profil_sekolah') ?>">Sambutan Kepala Sekolah</a></li>
    <li><a href="../sejarah/index.php" class="<?= activeMenu('sejarah') ?>">Sejarah Sekolah</a></li>
    <li><a href="../visi_misi/index.php" class="<?= activeMenu('visi_misi') ?>">Visi & Misi</a></li>
    <li><a href="../gurustaf/index.php" class="<?= activeMenu('gurustaf') ?>">Guru & Staf</a></li>
    <li><a href="../organisasi/index.php" class="<?= activeMenu('organisasi') ?>">Organisasi</a></li>
    <li><a href="../jurusan/index.php" class="<?= activeMenu('jurusan') ?>">Jurusan</a></li>
  </ul>
</li>

<!-- BERITA -->
<li class="dropdown">
  <a href="#" class="<?= activeDropdown(['berita','pengumuman']) ?>">
    <span>Berita</span>
    <i class="bi bi-chevron-down toggle-dropdown"></i>
  </a>
  <ul>
    <li><a href="../berita/index.php" class="<?= activeMenu('berita') ?>">Berita Terbaru</a></li>
    <li><a href="../pengumuman/index.php" class="<?= activeMenu('pengumuman') ?>">Pengumuman</a></li>
  </ul>
</li>

<li><a href="../prestasi/index.php" class="<?= activeMenu('prestasi') ?>">Prestasi</a></li>
<li><a href="../testimonials/index.php" class="<?= activeMenu('testimonials') ?>">Testimoni</a></li>
<li><a href="../galeri/index.php" class="<?= activeMenu('galeri') ?>">Galeri</a></li>
<li><a href="../kontak/index.php" class="<?= activeMenu('kontak') ?>">Kontak</a></li>


      </ul>

      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>
<style>
  /* NAVBAR SELALU SOLID (tidak transparan) */
.header {
  background: #3a3a3a !important;
  backdrop-filter: none !important;
  -webkit-backdrop-filter: none !important;
}
  
  .navmenu a.active {
  color: #41ff6a !important;  /* warna hijau */
  font-weight: 600;
}

.navmenu .dropdown > a.active {
  color: #41ff6a !important;
}
</style>