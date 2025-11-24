<?php
include '../../app.php';
include '../../partials/header.php';
include '../../partials/navbar.php';

// Ambil ID prestasi dari URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Query prestasi berdasarkan ID
$qDetail = "SELECT * FROM achievements WHERE id = $id LIMIT 1";
$resDetail = mysqli_query($connect, $qDetail) or die(mysqli_error($connect));
$prestasi = mysqli_fetch_object($resDetail);

// Jika tidak ditemukan
if (!$prestasi) {
    echo "<h2 style='text-align:center; padding: 80px;'>Prestasi tidak ditemukan!</h2>";
    exit;
}
?>

<style>
#detail-prestasi {
    padding: 100px 0 60px 0;
    background: linear-gradient(135deg, #f0fff4 0%, #d6f5e6 100%);
}

.prestasi-box {
    background: #ffffff;
    border-left: 6px solid #28a745;
    border-radius: 12px;
    padding: 30px;
    max-width: 950px;
    margin: auto;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.prestasi-box img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 20px;
    border: 3px solid #28a74533;
}

.prestasi-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1a5a3a;
    margin-bottom: 10px;
    text-align: center;
}

.prestasi-meta {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 20px;
    text-align: center;
}

.prestasi-meta span {
    margin: 0 8px;
    font-weight: 600;
    color: #28a745;
}

.prestasi-description {
    font-size: 1rem;
    color: #333;
    line-height: 1.8;
    text-align: justify;
    white-space: pre-line;
}

.back-link {
    display: block;
    margin: 40px auto 0;
    width: fit-content;
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

<section id="detail-prestasi">
    <div class="container">
        <div class="prestasi-box" data-aos="fade-up">
            <img src="/company_profile/storages/achievements/<?= htmlspecialchars($prestasi->image) ?>" 
                 alt="<?= htmlspecialchars($prestasi->title) ?>">

            <h1 class="prestasi-title"><?= htmlspecialchars($prestasi->title) ?></h1>

            <div class="prestasi-meta">
                <span><?= date('d F Y', strtotime($prestasi->date)) ?></span> |
                <span>oleh <?= htmlspecialchars($prestasi->author) ?></span>
            </div>

            <div class="prestasi-description">
                <?= nl2br(htmlspecialchars($prestasi->description)) ?>
            </div>

            <a href="index.php" class="back-link">« Kembali ke Daftar Prestasi</a>
        </div>
    </div>
</section>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>
