<?php
// Query untuk ambil semua pengumuman
$qAnnouncements = "SELECT * FROM announcements ORDER BY date DESC";
$resAnnouncements = mysqli_query($connect, $qAnnouncements) or die(mysqli_error($connect));
?>

<section id="pengumuman" style="background: linear-gradient(135deg, #f0fff4 0%, #d6f5e6 100%); padding: 100px 0 60px 0;">
    <div class="container section-title text-center" data-aos="fade-up">
        <h2>Pengumuman</h2>
        <p class="subtitle">Informasi Resmi dari SMK N Tembarak</p>
        <div class="section-line"></div> <!-- garis tipis setelah subjudul -->
    </div>

    <div class="container">
        <div class="row">
            <?php while ($item = mysqli_fetch_object($resAnnouncements)) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="announcement-card">
                        <img src="/company_profile/storages/announcements/<?= $item->announcements_image ?>" 
                             alt="<?= $item->announcements_title ?>">
                        <div class="announcement-content">
                            <p class="announcement-date">
                                <?= date('d M Y', strtotime($item->date)) ?>
                            </p>
                            <h4><?= $item->announcements_title ?></h4>
                            <p class="announcement-text">
                                <?= htmlspecialchars(substr($item->announcements, 0, 100)) ?>...
                            </p>
                            <a href="detail_pengumuman.php?id=<?= $item->id ?>">Selengkapnya »</a>
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
    color: #1a5a3a; /* warna hijau tema */
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
    color: #145a32; /* hijau gelap */
    margin-bottom: 8px;
}

/* garis tipis setelah subjudul */
.section-line {
    height: 2px;
    width: 80%;
    background: #28a745;
    margin: 6px auto 0;
    border-radius: 1px;
}

/* ===== Card Pengumuman ===== */
.announcement-card {
    background: #fdfdfd;
    border-left: 6px solid #28a745;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.announcement-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.12);
}

.announcement-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-bottom: 1px solid #eee;
}

.announcement-content {
    flex: 1;
    padding: 15px 18px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.announcement-date {
    font-size: 0.85rem;
    color: #999;
    margin-bottom: 6px;
    font-style: italic;
}

.announcement-content h4 {
    font-size: 1.05rem;
    font-weight: 700;
    margin-bottom: 8px;
    color: #1a5a3a;
}

.announcement-text {
    font-size: 0.9rem;
    color: #555;
    line-height: 1.6;
    margin-bottom: 12px;
    flex-grow: 1;
}

.announcement-content a {
    font-size: 0.9rem;
    color: #28a745;
    text-decoration: none;
    font-weight: 600;
    margin-top: auto;
}

.announcement-content a:hover {
    text-decoration: underline;
}
</style>
