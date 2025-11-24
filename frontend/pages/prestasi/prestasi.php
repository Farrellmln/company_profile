<?php
// Query untuk ambil semua prestasi
$qAchievements = "SELECT * FROM achievements ORDER BY date DESC";
$resAchievements = mysqli_query($connect, $qAchievements) or die(mysqli_error($connect));
?>

<section id="prestasi" style="background: linear-gradient(135deg, #e8f5e9 0%, #b0fab0 100%); padding: 100px 0 0 0; position: relative; z-index: 1;">
    <div class="container section-title text-center" data-aos="fade-up">
        <h2>Prestasi Sekolah</h2>
        <p class="subtitle">Capaian & Keberhasilan Siswa-Siswi SMK N Tembarak</p>
        <div class="section-line"></div> <!-- garis tipis setelah subjudul -->
    </div>

    <div class="container" style="padding-bottom: 40px;"> <!-- biar ada sedikit ruang sebelum footer -->
        <div class="row">
            <?php while ($item = mysqli_fetch_object($resAchievements)) { ?>
                <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                    <div class="prestasi-card w-100">
                        <div class="prestasi-img-wrapper">
                            <img src="/company_profile/storages/achievements/<?= $item->image ?>" 
                                 alt="<?= htmlspecialchars($item->title) ?>">
                        </div>
                        <div class="prestasi-content">
                            <p class="prestasi-date"><?= date('d M Y', strtotime($item->date)) ?></p>
                            <h4><?= htmlspecialchars($item->title) ?></h4>
                            <p class="prestasi-author">oleh <?= htmlspecialchars($item->author) ?></p>
                            <p class="prestasi-desc">
                                <?= htmlspecialchars(substr($item->description, 0, 100)) ?>...
                            </p>
                            <a href="detail_prestasi.php?id=<?= $item->id ?>">Lihat Selengkapnya »</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<style>
.section-title {
    padding-top: 50px;
    margin-bottom: 40px;
}

.section-title h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #1a5a3a;
    margin-bottom: 10px;
    position: relative;
    display: inline-block;
}

.section-title h2::after {
    content: "";
    display: block;
    width: 70px;
    height: 3px;
    background: #28a745;
    margin: 8px auto 0;
    border-radius: 2px;
}

.section-title p.subtitle {
    font-size: 1rem;
    color: #145a32;
    margin-bottom: 8px;
}

.section-line {
    height: 2px;
    width: 80%;
    background: #28a745;
    margin: 6px auto 0;
    border-radius: 1px;
}

/* ===== Card Prestasi ===== */
.prestasi-card {
    background: #ffffff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.prestasi-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.prestasi-img-wrapper {
    width: 100%;
    height: 220px;
    overflow: hidden;
}

.prestasi-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-bottom: 3px solid #28a745;
}

.prestasi-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    padding: 18px;
}

.prestasi-date {
    font-size: 0.85rem;
    color: #999;
    margin-bottom: 4px;
    font-style: italic;
}

.prestasi-content h4 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 8px;
    color: #1a5a3a;
}

.prestasi-author {
    font-size: 0.9rem;
    font-weight: 600;
    color: #28a745;
    margin-bottom: 10px;
}

.prestasi-desc {
    font-size: 0.9rem;
    color: #555;
    line-height: 1.6;
    margin-bottom: 12px;
    flex-grow: 1;
}

.prestasi-content a {
    font-size: 0.9rem;
    color: #28a745;
    font-weight: 600;
    text-decoration: none;
    margin-top: auto;
}

.prestasi-content a:hover {
    text-decoration: underline;
}

/* --- Biar footer gak ketiban elemen section --- */
#prestasi {
    overflow: visible;
}
</style>
