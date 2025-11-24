<?php
include '../../app.php';
include '../../partials/header.php';
include '../../partials/navbar.php';

// Ambil ID pengumuman dari URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Query pengumuman berdasarkan ID
$qDetail = "SELECT * FROM announcements WHERE id = $id LIMIT 1";
$resDetail = mysqli_query($connect, $qDetail) or die(mysqli_error($connect));
$pengumuman = mysqli_fetch_object($resDetail);

// Jika tidak ditemukan
if (!$pengumuman) {
    echo "<h2 style='text-align:center; padding: 80px;'>Pengumuman tidak ditemukan!</h2>";
    exit;
}
?>

<style>
#detail-pengumuman {
    padding: 100px 0 60px 0;
    background: linear-gradient(135deg, #f0fff4 0%, #d6f5e6 100%);
}

.pengumuman-header {
    text-align: center;
    margin-bottom: 40px;
}

.pengumuman-header img {
    width: 100%;
    max-width: 800px;
    height: auto;
    object-fit: cover;
    border-radius: 12px;
    border: 6px solid #28a74533;
    margin-bottom: 25px;
}

.pengumuman-header h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #2b8852;
    margin-bottom: 10px;
}

.pengumuman-header .date {
    font-size: 0.95rem;
    color: #777;
    font-style: italic;
    margin-bottom: 20px;
}

.pengumuman-header .desc {
    font-size: 1rem;
    color: #555;
    max-width: 850px;
    margin: 0 auto;
    line-height: 1.8;
    text-align: justify;
    white-space: pre-line;
}

.back-link {
    display: inline-block;
    margin-top: 30px;
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

<section id="detail-pengumuman">
    <div class="container">
        <div class="pengumuman-header" data-aos="fade-up">
            <?php if (!empty($pengumuman->announcements_image)): ?>
                <img src="/company_profile/storages/announcements/<?= htmlspecialchars($pengumuman->announcements_image) ?>" alt="<?= htmlspecialchars($pengumuman->announcements_title) ?>">
            <?php endif; ?>

            <h2><?= htmlspecialchars($pengumuman->announcements_title) ?></h2>
            <div class="date"><i class="bi bi-calendar3 me-1"></i><?= date('d F Y', strtotime($pengumuman->date)) ?></div>
            <p class="desc"><?= nl2br(htmlspecialchars($pengumuman->announcements)) ?></p>
            <a href="index.php" class="back-link">« Kembali ke Daftar Pengumuman</a>
        </div>
    </div>
</section>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>
