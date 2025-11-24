<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container position-relative d-flex align-items-center justify-content-between">

    <!-- LOGO SEKOLAH -->
    <a href="../beranda/index.php" class="logo d-flex align-items-center me-auto me-xl-0">
      <img src="/company_profile/storages/abouts/<?= $item->school_logo ?>" style="height:50px; margin-right:10px;">
      <h1 class="sitename"><?= $item->school_name ?></h1>
    </a>

    <!-- NAVIGATION -->
    <nav id="navmenu" class="navmenu">
      <ul>

        <li><a href="../beranda/index.php" class="<?= $isHomeActive ? 'active' : '' ?>">Beranda</a></li>

        <!-- PROFIL -->
        <li class="dropdown">
          <a href="#">
            <span>Profil Sekolah</span>
            <i class="bi bi-chevron-down toggle-dropdown"></i>
          </a>
          <ul>
            <li><a href="../profil_sekolah/index.php">Sambutan Kepala Sekolah</a></li>
            <li><a href="../sejarah/index.php">Sejarah Sekolah</a></li>
            <li><a href="../visi_misi/index.php">Visi & Misi</a></li>
            <li><a href="../gurustaf/index.php">Guru & Staf</a></li>
            <li><a href="../organisasi/index.php">Organisasi</a></li>
            <li><a href="../jurusan/index.php">Jurusan</a></li>
          </ul>
        </li>

        <!-- BERITA -->
        <li class="dropdown">
          <a href="#">
            <span>Berita</span>
            <i class="bi bi-chevron-down toggle-dropdown"></i>
          </a>
          <ul>
            <li><a href="../berita/index.php">Berita Terbaru</a></li>
            <li><a href="../pengumuman/index.php">Pengumuman</a></li>
          </ul>
        </li>

        <li><a href="../prestasi/index.php">Prestasi</a></li>
        <li><a href="../testimonials/index.php">Testimoni</a></li>
        <li><a href="../galeri/index.php">Galeri</a></li>
        <li><a href="../kontak/index.php">Kontak</a></li>

      </ul>

      <!-- TOGGLE MOBILE -->
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>
<style>
  /* ============================
   NAVBAR SOLID TANPA TRANSPARAN
============================== */
.header {
  background: #3a3a3a !important;  /* abu solid */
  z-index: 999999 !important;
}

</style>