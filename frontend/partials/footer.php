<?php
$qHome = "SELECT * FROM abouts";
$resHome = mysqli_query($connect, $qHome) or die(mysqli_error($connect));
$item = $resHome->fetch_object();
$base_url = "http://localhost/company_profile";

// Pastikan variabel-variabel ini ada
$school_name = isset($item->school_name) ? $item->school_name : 'SMKN TEMBARAK';
$school_logo = isset($item->school_logo) ? $item->school_logo : 'default_logo.png';
?>

<style>
    /* ------------------------------------------- */
    /* FOOTER STYLES - Disesuaikan dengan tema abu-abu gelap */
    /* ------------------------------------------- */
    .footer-custom {
        background: #303030;
        color: #cccccc;
        padding: 60px 0 20px 0;
        font-size: 14px;
        line-height: 1.6;
    }

    .footer-top {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px 40px 15px;
    }

    .footer-col {
        margin-bottom: 30px;
        min-width: 200px;
        padding: 0 15px;
        flex: 1 1 20%;
    }

    .footer-col:first-child {
        flex: 1 1 30%;
        min-width: 280px;
    }

    /* ------------------ LOGO + NAMA SEKOLAH ------------------ */
    .footer-logo-text {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
    }

    .footer-logo-img {
        width: 55px;
        height: 55px;
        object-fit: contain;
        border-radius: 50%;
        background-color: transparent; /* hilangkan background semi putih */
        padding: 0; /* hilangkan padding */
        box-shadow: none; /* HAPUS BAYANGAN */
    }

    .footer-school-name {
        font-size: 22px;
        font-weight: 800;
        color: #ffffff;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    /* Judul kolom */
    .footer-col h4 {
        font-size: 16px;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 20px;
        padding-bottom: 5px;
        border-bottom: 2px solid #00c291;
        display: inline-block;
    }

    /* Styling untuk daftar link */
    .footer-col ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-col ul li {
        margin-bottom: 8px;
    }

    .footer-col ul li a {
        color: #cccccc;
        text-decoration: none;
        transition: color 0.3s;
        display: block;
    }

    .footer-col ul li a:hover {
        color: #00c291;
    }

    /* Styling untuk ikon sosial media */
    .footer-social-icons {
        margin-top: 15px;
    }

    .footer-social-icons a {
        color: #ffffff;
        font-size: 18px;
        margin-right: 15px;
        transition: color 0.3s;
    }

    .footer-social-icons a:hover {
        color: #00c291;
    }

    /* Styling untuk detail kontak */
    .footer-col address p {
        margin-bottom: 10px;
        font-style: normal;
    }

    .footer-col address strong {
        color: #ffffff;
        font-weight: 600;
    }

    /* Footer bawah */
    .footer-bottom {
        border-top: 1px solid #4a4a4a;
        padding-top: 20px;
        text-align: center;
        font-size: 13px;
        color: #ffffff;
    }

    .footer-bottom .credits {
        margin-top: 5px;
        color: #cccccc;
    }

    .footer-bottom a {
        color: #00c291;
        text-decoration: none;
    }

    /* Responsif */
    @media (max-width: 991px) {
        .footer-top {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-col {
            flex: 1 1 100%;
            padding: 0;
            max-width: 400px;
        }

        .footer-col:first-child {
            max-width: 400px;
        }

        .footer-logo-text {
            justify-content: center;
        }

        .footer-col h4 {
            text-align: center;
            margin: 0 auto 20px auto;
        }

        .footer-col address {
            text-align: center;
        }

        .footer-social-icons {
            display: flex;
            justify-content: center;
        }
    }
</style>

<footer class="footer-custom">
    <div class="footer-top">
        <div class="footer-col">
            <div class="footer-logo-text">
                <img src="/company_profile/storages/abouts/<?= $item->school_logo ?>" alt="Logo Sekolah" class="footer-logo-img" />
                <div class="footer-school-name"><?= $school_name ?></div>
            </div>
            <p>Website resmi <?= $school_name ?>. Menjadi sekolah yang unggul dalam prestasi, berkarakter, dan peduli lingkungan.</p>

            <div class="footer-social-icons">
                <a href="https://www.instagram.com/smkntembarak/" title="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/@officialsmkntembarak9913" title="YouTube"><i class="bi bi-youtube"></i></a>
                <a href="https://www.facebook.com/smkntembarak/" title="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://api.whatsapp.com/send/?phone=6285727167740&text&type=phone_number&app_absent=0" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
            </div>
        </div>

        <div class="footer-col">
            <h4>Link Cepat</h4>
            <ul>
                <li><a href="../beranda/index.php">Beranda</a></li>
                <li><a href="../profil_sekolah/index.php">Profil Sekolah</a></li>
                <li><a href="../gurustaf/index.php">Guru dan Staf</a></li>
                <li><a href="../prestasi/index.php">Prestasi Siswa</a></li>
                <li><a href="../galeri/index.php">Galeri</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Program & Layanan</h4>
            <ul>
                <li><a href="#">PPDB Online</a></li>
                <li><a href="#">Ujian Online</a></li>
                <li><a href="#">Materi Ajar</a></li>
                <li><a href="#">Kalender Akademik</a></li>
                <li><a href="#">Ekstrakurikuler</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Hubungi Kami</h4>
            <address>
                <p>
                    <strong>Alamat:</strong> Jl. Raya Tembarak No. 01<br>
                    Tembarak, Kab. Temanggung, Jawa Tengah 56261<br>
                    Indonesia
                </p>
                <p><strong>Telepon:</strong> +62 857-2716-7740</p>
                <p><strong>Email:</strong> info@smkntembarak.sch.id</p>
            </address>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container-fluid">
            &copy; 2025 <strong><?= $school_name ?></strong>. All Rights Reserved.
            <div class="credits">
                Designed by <a href="https://www.instagram.com/egafarrelm/">egafarrelm</a> Distributed by <a href="https://www.instagram.com/lauwba_techno/?hl=id" target="_blank">PT. Lauwba Techno Indonesia</a>
            </div>
        </div>
    </div>
</footer>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center" style="background: #00c291; color: white; border-radius: 50%; width: 40px; height: 40px; position: fixed; bottom: 30px; right: 30px; z-index: 99; display: none;"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>
