<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
include '../../app.php';

// Pastikan ID ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan!');
            window.location.href = 'index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];

// Ambil data user dari database
$qSelect = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$user = mysqli_fetch_object($result);

// Jika data tidak ditemukan
if (!$user) {
    echo "
        <script>
            alert('Data user tidak ditemukan!');
            window.location.href = 'index.php';
        </script>
    ";
    exit;
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    .page-inner {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .container {
        max-width: 1000px;
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

    .detail-item {
        margin-bottom: 1.2rem;
    }

    .detail-label {
        font-weight: 600;
        color: #1976d2;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 0.3rem;
    }

    .btn-secondary.with-icon {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 25px;
        font-weight: 500;
        transition: all 0.3s ease;
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

<div class="container">
    <div class="page-inner">
        <h1 class="mt-4 text-center" style="color:#1976d2;">Detail Akun</h1>
        <ol class="breadcrumb mb-4 justify-content-center">
            <li class="breadcrumb-item"><a href="../dashboard/index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php">User</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>

        <div class="card w-100 card-box">
            <div class="card-header">
                <h4 class="card-title">Informasi Detail User</h4>
            </div>

            <div class="card-body">
                <div class="detail-item">
                    <div class="detail-label"><i class="bi bi-person"></i> Nama Lengkap</div>
                    <p><?= htmlspecialchars($user->name) ?></p>
                </div>

                <div class="detail-item">
                    <div class="detail-label"><i class="bi bi-envelope"></i> Email</div>
                    <p><?= htmlspecialchars($user->email) ?></p>
                </div>

                <div class="detail-item">
                    <div class="detail-label"><i class="bi bi-person-badge"></i> Role</div>
                    <p><?= htmlspecialchars($user->role) ?></p>
                </div>

                <div class="detail-item">
                    <div class="detail-label"><i class="bi bi-calendar-check"></i> Dibuat Pada</div>
                    <p><?= htmlspecialchars($user->created_at) ?></p>
                </div>

                <div class="detail-item">
                    <div class="detail-label"><i class="bi bi-clock-history"></i> Terakhir Diperbarui</div>
                    <p><?= htmlspecialchars($user->updated_at) ?></p>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="index.php" class="btn btn-secondary with-icon">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>
