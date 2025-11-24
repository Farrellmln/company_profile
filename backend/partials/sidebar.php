<?php
// Tidak perlu session_start di sini, karena sudah dipanggil di header.php
$currentFolder = basename(dirname($_SERVER['PHP_SELF']));
$role = $_SESSION['role'] ?? 'guest'; // default guest kalau belum login
?>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
    data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

    <aside class="left-sidebar">
      <div>
        <!-- LOGO -->
        <div class="brand-logo d-flex align-items-center justify-content-center py-4">
          <a href="../dashboard/index.php" class="text-nowrap logo-img">
            <img src="../../../storages/header/logo.png" width="120" alt="Logo" class="mx-auto d-block" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="bi bi-x-lg fs-8"></i>
          </div>
        </div>

        <!-- NAVIGATION -->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar style="height: calc(90vh - 120px);">
          <ul id="sidebarnav">

            <!-- HOME -->
            <li class="nav-small-cap">
              <i class="bi bi-house-door nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">HOME</span>
            </li>

            <li class="sidebar-item <?= ($currentFolder == 'dashboard') ? 'active' : '' ?>">
              <a class="sidebar-link" href="../dashboard/index.php">
                <i class="bi bi-speedometer2"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>

            <!-- MENU UTAMA -->
            <li class="nav-small-cap mt-3">
              <i class="bi bi-grid-1x2-fill nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">MENU UTAMA</span>
            </li>

            <?php if ($role != 'staf') : ?>
              <!-- Untuk admin / kepsek -->
              <li class="sidebar-item <?= ($currentFolder == 'abouts') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../abouts/index.php">
                  <i class="bi bi-info-circle-fill"></i>
                  <span class="hide-menu">Tentang Sekolah</span>
                </a>
              </li>

              <li class="sidebar-item <?= ($currentFolder == 'visi_misi') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../visi_misi/index.php">
                  <i class="bi bi-bullseye"></i>
                  <span class="hide-menu">Visi dan Misi</span>
                </a>
              </li>

              <li class="sidebar-item <?= ($currentFolder == 'contacts') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../contacts/index.php">
                  <i class="bi bi-telephone-fill"></i>
                  <span class="hide-menu">Kontak</span>
                </a>
              </li>

              <li class="sidebar-item <?= ($currentFolder == 'headmasters') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../headmasters/index.php">
                  <i class="bi bi-person-badge-fill"></i>
                  <span class="hide-menu">Kepala Sekolah</span>
                </a>
              </li>

              <li class="sidebar-item <?= ($currentFolder == 'majors') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../majors/index.php">
                  <i class="bi bi-mortarboard-fill"></i>
                  <span class="hide-menu">Jurusan</span>
                </a>
              </li>

              <li class="sidebar-item <?= ($currentFolder == 'message') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../message/index.php">
                  <i class="bi bi-envelope-paper-fill"></i>
                  <span class="hide-menu">Pesan</span>
                </a>
              </li>

              <li class="sidebar-item <?= ($currentFolder == 'social_media') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../social_media/index.php">
                  <i class="bi bi-share-fill"></i>
                  <span class="hide-menu">Media Sosial</span>
                </a>
              </li>
            <?php endif; ?>

            <!-- Menu yang tetap muncul untuk semua (termasuk staf) -->
            <li class="sidebar-item <?= ($currentFolder == 'achievements') ? 'active' : '' ?>">
              <a class="sidebar-link" href="../achievements/index.php">
                <i class="bi bi-trophy-fill"></i>
                <span class="hide-menu">Prestasi</span>
              </a>
            </li>

            <li class="sidebar-item <?= ($currentFolder == 'announcements') ? 'active' : '' ?>">
              <a class="sidebar-link" href="../announcements/index.php">
                <i class="bi bi-megaphone-fill"></i>
                <span class="hide-menu">Pengumuman</span>
              </a>
            </li>

            <li class="sidebar-item <?= ($currentFolder == 'blogs') ? 'active' : '' ?>">
              <a class="sidebar-link" href="../blogs/index.php">
                <i class="bi bi-newspaper"></i>
                <span class="hide-menu">Berita</span>
              </a>
            </li>

            <li class="sidebar-item <?= ($currentFolder == 'extracurriculars') ? 'active' : '' ?>">
              <a class="sidebar-link" href="../extracurriculars/index.php">
                <i class="bi bi-people-fill"></i>
                <span class="hide-menu">Organisasi</span>
              </a>
            </li>

            <li class="sidebar-item <?= ($currentFolder == 'galleries') ? 'active' : '' ?>">
              <a class="sidebar-link" href="../galleries/index.php">
                <i class="bi bi-images"></i>
                <span class="hide-menu">Galeri</span>
              </a>
            </li>

            <li class="sidebar-item <?= ($currentFolder == 'teachers') ? 'active' : '' ?>">
              <a class="sidebar-link" href="../teachers/index.php">
                <i class="bi bi-person-lines-fill"></i>
                <span class="hide-menu">Guru</span>
              </a>
            </li>

            <li class="sidebar-item <?= ($currentFolder == 'testimonials') ? 'active' : '' ?>">
              <a class="sidebar-link" href="../testimonials/index.php">
                <i class="bi bi-chat-quote-fill"></i>
                <span class="hide-menu">Testimoni</span>
              </a>
            </li>

            <?php if ($role != 'staf') : ?>
              <!-- LOGIN & ADMIN AREA -->
              <li class="nav-small-cap mt-3">
                <i class="bi bi-lock-fill nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">LOGIN</span>
              </li>

              <li class="sidebar-item <?= ($currentFolder == 'users') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../users/index.php">
                  <i class="bi bi-person-fill"></i>
                  <span class="hide-menu">Akun Pengguna</span>
                </a>
              </li>

              <li class="sidebar-item <?= ($currentFolder == 'user_activities') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../user_activities/index.php">
                  <i class="bi bi-clock-history"></i>
                  <span class="hide-menu">Aktivitas Pengguna</span>
                </a>
              </li>
            <?php endif; ?>

          </ul>
        </nav>
      </div>
    </aside>
