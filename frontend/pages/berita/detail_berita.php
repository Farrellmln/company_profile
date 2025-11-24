<?php
include '../../app.php';
include '../../partials/header.php';
include '../../partials/navbar.php';

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Query berita berdasarkan ID
$qDetail = "SELECT * FROM blogs WHERE id = $id LIMIT 1";
$resDetail = mysqli_query($connect, $qDetail) or die(mysqli_error($connect));
$berita = mysqli_fetch_object($resDetail);

// Jika data tidak ditemukan
if (!$berita) {
    echo "<h2 style='text-align:center; padding: 80px;'>Berita tidak ditemukan!</h2>";
    exit;
}
?>

<style>
    /* Detail Berita */
    #detail-berita {
        padding: 100px 0 60px 0;
        background: linear-gradient(135deg, #e8f5e9 0%, #d0fbd0 100%);
    }

    .berita-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .berita-header img {
        width: 100%;
        max-width: 800px;
        height: auto;
        border-radius: 10px;
        object-fit: cover;
        border: 6px solid #28a74533;
        margin-bottom: 20px;
    }

    .berita-header h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #2b8852;
        margin-bottom: 10px;
    }

    .berita-header .date {
        font-size: 0.95rem;
        color: #777;
        font-style: italic;
        margin-bottom: 20px;
    }

    .berita-header p {
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

<section id="detail-berita">
    <div class="container">
        <div class="berita-header" data-aos="fade-up">
            <img src="/company_profile/storages/blogs/<?= htmlspecialchars($berita->image) ?>" alt="<?= htmlspecialchars($berita->title) ?>">
            <h2><?= htmlspecialchars($berita->title) ?></h2>
            <div class="date"><i class="bi bi-calendar3 me-1"></i><?= date('d F Y', strtotime($berita->updated_at)) ?></div>
            <p><?= nl2br(htmlspecialchars($berita->content)) ?></p>
            <a href="index.php" class="back-link">« Kembali ke Daftar Berita</a>
        </div>
    </div>
</section>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>
