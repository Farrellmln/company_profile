<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
include '../../app.php';

// Periksa apakah ID ada
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak valid. Silakan pilih data yang akan diedit.');
            window.location.href = 'index.php'; // Arahkan kembali ke daftar
        </script>
    ";
    exit;
}

$id = $_GET['id'];
// Ambil data dari database berdasarkan ID
$query = "SELECT * FROM visi_misi WHERE id = '$id'";
$result = mysqli_query($connect, $query);
$visi_misi = mysqli_fetch_object($result);

// Periksa apakah data ditemukan
if (!$visi_misi) {
    echo "
        <script>
            alert('Data tidak ditemukan!');
            window.location.href = 'index.php'; // Arahkan kembali ke daftar
        </script>
    ";
    exit;
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    /* Mengatur tinggi elemen html dan body menjadi 100% */
    html, body {
        height: 100%;
    }

    /* Gaya untuk container utama halaman */
    .page-inner {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        gap: 20px;
    }

    /* Mengatur lebar maksimum dan margin atas untuk container utama */
    .container {
        max-width: 1200px;
        margin-top: 80px;
    }
    
    /* Gaya untuk card-box utama yang membungkus semua konten */
    .card-box {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border: none;
        overflow: hidden;
    }

    /* Gaya untuk header card, dengan tata letak flexbox */
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        background-color: #1976d2;
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 12px 12px 0 0;
    }

    /* Gaya untuk judul card */
    .card-title {
        color: white !important;
        margin-bottom: 0;
    }

    /* Gaya untuk body card */
    .card-body {
        background-color: #ffffff;
        padding: 2rem;
    }

    /* Gaya untuk setiap baris form */
    .form-item {
        margin-bottom: 1.5rem;
    }

    .form-item .form-label {
        font-weight: 600;
        color: #1976d2;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Gaya untuk preview gambar */
    .img-preview-edit {
        max-width: 150px;
        max-height: 150px;
        object-fit: contain;
        border-radius: 8px;
        border: 1px solid #dee2e6;
        padding: 5px;
        margin-bottom: 10px;
    }

    /* Gaya untuk tombol simpan dan batal */
    .btn-primary.with-icon, .btn-secondary.with-icon {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 25px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-primary.with-icon {
        background-color: #1976d2;
        border-color: #1976d2;
        color: white;
    }

    .btn-primary.with-icon:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #1565c0;
        border-color: #1565c0;
    }

    .btn-secondary.with-icon {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
    }

    .btn-secondary.with-icon:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #5a6268;
        border-color: #5a6268;
    }
</style>

<div class="container" style="max-width: 1200px;" class="mx-auto">
    <div class="page-inner">
        <h1 class="mt-4" style="color:#1976d2;">Edit Visi & Misi Sekolah</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../dashboard/index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php">Visi & Misi Sekolah</a></li>
            <li class="breadcrumb-item active">Halaman Edit</li>
        </ol>

        <div class="card w-100 card-box">
            <div class="card-header">
                <h4 class="card-title">Form Edit Visi & Misi Sekolah</h4>
            </div>

            <div class="card-body">
                <form action="../../actions/visi_misi/update.php?id=<?= $visi_misi->id ?>" method="POST" enctype="multipart/form-data">

                    <div class="form-item">
                        <label for="visiinput" class="form-label">
                            <i class="bi bi-card-text"></i> Visi
                        </label>
                        <textarea name="visi" id="visiinput" class="form-control" rows="3" required><?= htmlspecialchars($visi_misi->visi) ?></textarea>
                    </div>
                    <div class="form-item">
                        <label for="misiinput" class="form-label">
                            <i class="bi bi-card-text"></i> Misi
                        </label>
                        <textarea name="misi" id="misiinput" class="form-control" rows="10" required><?= htmlspecialchars($visi_misi->misi) ?></textarea>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="index.php" class="btn btn-secondary with-icon me-2">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                        <button type="submit" name="tombol" class="btn btn-primary with-icon">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>