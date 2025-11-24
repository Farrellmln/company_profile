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
            window.location.href = 'index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];
// Ambil data dari database berdasarkan ID
$query = "SELECT * FROM testimonials WHERE id = '$id'";
$result = mysqli_query($connect, $query);
$testimonial = mysqli_fetch_object($result);

// Periksa apakah data ditemukan
if (!$testimonial) {
    echo "
        <script>
            alert('Data tidak ditemukan!');
            window.location.href = 'index.php';
        </script>
    ";
    exit;
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    html,
    body {
        height: 100%;
    }

    .page-inner {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        gap: 20px;
    }

    .container {
        max-width: 1200px;
        margin-top: 80px;
    }

    .card-box {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border: none;
        overflow: hidden;
    }

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

    .card-title {
        color: white !important;
        margin-bottom: 0;
    }

    .card-body {
        background-color: #ffffff;
        padding: 2rem;
    }

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

    .img-preview-edit {
        max-width: 150px;
        max-height: 150px;
        object-fit: contain;
        border-radius: 8px;
        border: 1px solid #dee2e6;
        padding: 5px;
        margin-bottom: 10px;
    }

    .btn-primary.with-icon,
    .btn-secondary.with-icon {
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
        <h1 class="mt-4" style="color:#1976d2;">Edit Testimonial</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../dashboard/index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php">Testimonials</a></li>
            <li class="breadcrumb-item active">Halaman Edit</li>
        </ol>

        <div class="card w-100 card-box">
            <div class="card-header">
                <h4 class="card-title">Form Edit Testimonial</h4>
            </div>

            <div class="card-body">
                <form action="../../actions/testimonials/update.php?id=<?= $testimonial->id ?>" method="POST" enctype="multipart/form-data">

                    <!-- Image -->
                    <div class="form-item">
                        <label for="imageinput" class="form-label">
                            <i class="bi bi-image"></i> Foto
                        </label>
                        <img src="../../../storages/testimonials/<?= htmlspecialchars($testimonial->image) ?>" alt="Foto Saat Ini" class="img-preview-edit">
                        <input type="file" class="form-control mt-2" id="imageinput" name="image">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                    </div>

                    <!-- Name -->
                    <div class="form-item">
                        <label for="nameinput" class="form-label">
                            <i class="bi bi-person"></i> Nama
                        </label>
                        <input type="text" class="form-control" id="nameinput" name="name" placeholder="Masukkan nama..." value="<?= htmlspecialchars($testimonial->name) ?>" required>
                    </div>

                    <!-- Rating -->
                    <div class="form-item">
                        <label for="ratinginput" class="form-label">
                            <i class="bi bi-star"></i> Rating
                        </label>
                        <select class="form-control" name="rating" id="ratinginput" required>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <option value="<?= $i ?>" <?= ($testimonial->rating == $i) ? 'selected' : '' ?>>
                                    <?= str_repeat("⭐", $i) ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="form-item">
                        <label for="statusinput" class="form-label">
                            <i class="bi bi-toggle-on"></i> Status
                        </label>
                        <input type="text" class="form-control" id="statusinput" name="status"
                            placeholder="Masukkan status..." value="<?= htmlspecialchars($testimonial->status) ?>" required>
                    </div>


                    <!-- Message -->
                    <div class="form-item">
                        <label for="messageinput" class="form-label">
                            <i class="bi bi-chat-dots"></i> Pesan
                        </label>
                        <textarea name="message" id="messageinput" class="form-control" rows="3" required><?= htmlspecialchars($testimonial->message) ?></textarea>
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