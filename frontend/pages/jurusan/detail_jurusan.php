<?php
include '../../app.php';
include '../../partials/header.php';
include '../../partials/navbar.php'; // sesuaikan path kalau beda

// Ambil ID jurusan dari URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Query jurusan berdasarkan ID
$qMajor = "SELECT * FROM majors WHERE id = $id LIMIT 1";
$resMajor = mysqli_query($connect, $qMajor) or die(mysqli_error($connect));
$item = mysqli_fetch_object($resMajor);

// Jika data tidak ditemukan
if (!$item) {
    echo "<h2>Jurusan tidak ditemukan!</h2>";
    exit;
}
?>

<style>
    /* Detail Jurusan */
    #detail-jurusan {
        padding: 100px 0 60px 0;
        background: linear-gradient(135deg, #e8f5e9 0%, #d0fbd0 100%);
    }

    .jurusan-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .jurusan-header img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        border: 6px solid #28a74533;
        margin-bottom: 20px;
    }

    .jurusan-header h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #2b8852;
        margin-bottom: 10px;
    }

    .jurusan-header p {
        font-size: 1rem;
        color: #555;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.8;
        text-align: justify;
    }

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

<section id="detail-jurusan">
    <div class="container">
        <div class="jurusan-header" data-aos="fade-up">
            <img src="/company_profile/storages/majors/<?= $item->majors_image ?>" 
                 alt="<?= $item->majors_name ?>">
            <h2><?= $item->majors_name ?></h2>
            <p><?= nl2br(htmlspecialchars($item->majors_description)) ?></p>
            <a href="index.php" class="back-link">« Kembali ke Daftar Jurusan</a>
        </div>
    </div>
</section>
<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>