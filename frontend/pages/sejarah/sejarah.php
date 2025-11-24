<?php
// Ambil data dari database tentang sekolah
$qHistory = "SELECT * FROM abouts LIMIT 1";
$resHistory = mysqli_query($connect, $qHistory) or die(mysqli_error($connect));
$history   = $resHistory->fetch_object();

// Variabel fallback
$since = !empty($history->since) ? $history->since : "Tanggal berdiri belum tersedia";
$alamat     = !empty($history->alamat) ? $history->alamat : "Alamat belum tersedia";
$tagline     = !empty($history->school_tagline) ? $history->school_tagline : "-";
$description = !empty($history->school_description) ? $history->school_description : "Deskripsi belum tersedia";
$logo        = !empty($history->school_logo) ? "/company_profile/storages/abouts/" . $history->school_logo : "/company_profile/storages/abouts/default-logo.png";
$banner      = !empty($history->school_banner) ? "/company_profile/storages/abouts/" . $history->school_banner : null;
?>

<section id="history" class="history-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Sejarah Sekolah</h2>
            <p>Riwayat Singkat <?= htmlspecialchars($history->school_name) ?></p>
            <div class="section-line"></div> <!-- Garis tipis setelah subjudul -->
        </div>

        <?php if ($banner): ?>
        <div class="banner-wrapper" data-aos="zoom-in">
            <img src="<?= htmlspecialchars($banner) ?>" alt="Banner Sekolah" class="banner-img">
        </div>
        <?php endif; ?>

        <div class="content-wrapper" data-aos="fade-up" data-aos-delay="100">
            <div class="school-card">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-4 text-center">
                        <div class="school-profile">
                            <img src="<?= htmlspecialchars($logo) ?>" alt="Logo Sekolah" class="school-logo">
                            <h4 class="school-name"><?= htmlspecialchars($history->school_name) ?></h4>
                            <p class="school-tagline"><?= htmlspecialchars($tagline) ?></p>

                            <div class="school-info">
                                <p><i class="bi bi-calendar-check me-2"></i><strong>Berdiri:</strong> <?= htmlspecialchars($since) ?></p>
                                <p><i class="bi bi-geo-alt me-2"></i><strong>Alamat:</strong> <?= htmlspecialchars($alamat) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="school-history">
                            <h5><i class="bi bi-book me-2"></i>Riwayat dan Perkembangan</h5>
                            <div class="history-text">
                                <?= nl2br(htmlspecialchars($description)) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Kembali di tengah bawah -->
        <div class="text-center mt-4">
            <a href="../beranda/index.php" class="back-link">« Kembali ke Daftar Sejarah Singkat</a>
        </div>
    </div>    
</section>

<style>
/* ============================= */
/* Section Styling */
/* ============================= */
.history-section {
    padding: 120px 0 70px 0; /* jarak aman dari navbar */
    background: linear-gradient(135deg, #eaf8f0 0%, #d2f5d2 100%);
    border-radius: 0;
    margin: 0;
    scroll-margin-top: 100px; /* aman saat scroll dari menu */
}

/* ============================= */
/* Section Header */
/* ============================= */
.section-header {
    text-align: center;
    margin-bottom: 50px;
}
.section-header h2 {
    font-size: 2.3rem;
    font-weight: 700;
    color: #1b5e20;
    margin-bottom: 15px;
    position: relative;
}
.section-header h2::after {
    content: "";
    display: block;
    width: 70px;
    height: 4px;
    margin: 10px auto 0;
    background: #43a047;
    border-radius: 2px;
}
.section-header p {
    font-size: 1rem;
    color: #1b5e20; /* teks hijau gelap agar terbaca */
    margin: 0;
}

/* ============================= */
/* Garis horizontal tipis setelah subjudul */
.section-line {
    height: 2px;
    background: #43a047; /* hijau tipis */
    width: 80%; /* panjang garis */
    margin: 10px auto 0; /* jarak atas dan bawah */
    border-radius: 1px;
}

/* ============================= */
/* Banner */
.banner-wrapper {
    text-align: center;
    margin-bottom: 40px;
}
.banner-img {
    width: 100%;
    max-height: 380px;
    object-fit: cover;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(67, 160, 71, 0.25);
}

/* ============================= */
/* Card (full transparan) */
.school-card {
    background: transparent; /* full transparan */
    border-radius: 0;
    padding: 0; /* padding di dalam row saja */
    box-shadow: none;
}

/* ============================= */
/* Left Profile */
.school-profile {
    padding: 20px 0;
    border-right: none;
    color: #0d3d0d; /* teks gelap agar terbaca */
}
@media (max-width: 991.98px) {
    .school-profile {
        border-bottom: 1px solid rgba(255,255,255,0.2);
        margin-bottom: 20px;
    }
}
.school-logo {
    max-width: 130px;
    border-radius: 50%;
    margin-bottom: 20px;
}
.school-name {
    font-size: 1.3rem;
    font-weight: 600;
    color: #0d3d0d;
    margin-bottom: 10px;
}
.school-tagline {
    font-style: italic;
    color: #145a32;
    font-size: 0.95rem;
    margin-bottom: 20px;
}
.school-info p {
    margin: 5px 0;
    font-size: 0.95rem;
    color: #0d3d0d;
}
.school-info strong {
    color: #145a32;
}

/* ============================= */
/* Right Description */
.school-history h5 {
    font-size: 1.15rem;
    font-weight: 600;
    color: #0d3d0d;
    margin-bottom: 15px;
}
.history-text {
    font-size: 1rem;
    color: #0d3d0d; /* teks gelap agar terbaca */
    line-height: 1.7;
}
.history-text p {
    margin-bottom: 1rem;
}

/* ============================= */
/* Back Link Button - Mirip dengan jurusan */
.back-link {
    display: inline-block;
    margin-top: 25px;
    font-weight: 600;
    color: #28a745;
    text-decoration: none;
    border-bottom: 2px solid #28a745;
    padding-bottom: 2px;
    transition: color 0.3s ease, border-color 0.3s ease;
}
.back-link:hover {
    color: #1e7e34;
    border-color: #1e7e34;
}
</style>