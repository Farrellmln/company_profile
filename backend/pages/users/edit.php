<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
include '../../app.php';
include '../../middleware/role_guard.php'; // hanya admin

// Periksa apakah ID ada
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak valid. Silakan pilih user yang akan diedit.');
            window.location.href = 'index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];

// Ambil data user dari database
$query = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connect, $query);
$user = mysqli_fetch_object($result);

// Periksa apakah data ditemukan
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
    html, body {
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

<div class="container">
    <div class="page-inner">
        <h1 class="mt-4" style="color:#1976d2;">Edit User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../dashboard/index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php">User</a></li>
            <li class="breadcrumb-item active">Halaman Edit</li>
        </ol>

        <div class="card w-100 card-box">
            <div class="card-header">
                <h4 class="card-title">Form Edit User</h4>
            </div>

            <div class="card-body">
                <form action="../../actions/users/update.php?id=<?= $user->id ?>" method="POST">
                    <div class="form-item">
                        <label for="name" class="form-label">
                            <i class="bi bi-person"></i> Nama Lengkap
                        </label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user->name) ?>" required>
                    </div>

                    <div class="form-item">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope"></i> Email
                        </label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user->email) ?>" required>
                    </div>

                    <div class="form-item">
                        <label for="password" class="form-label">
                            <i class="bi bi-lock"></i> Password
                        </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti password">
                    </div>

                    <div class="form-item">
                        <label for="role" class="form-label">
                            <i class="bi bi-person-badge"></i> Role
                        </label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="staf" <?= $user->role == 'staf' ? 'selected' : '' ?>>Staf</option>
                            <option value="admin" <?= $user->role == 'admin' ? 'selected' : '' ?>>Admin</option>
                        </select>
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
