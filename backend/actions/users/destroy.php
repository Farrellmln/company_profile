<?php
// Memasukkan file koneksi database
include '../../app.php';

// Periksa apakah parameter 'id' ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan. Tidak dapat melanjutkan penghapusan.');
            window.location.href = '../../pages/users/index.php';
        </script>
    ";
    exit;
}

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data user berdasarkan ID dari database
$qSelect = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$user = mysqli_fetch_object($result);

// Jika data tidak ditemukan, tampilkan pesan error dan kembali ke halaman index
if (!$user) {
    echo "
        <script>
            alert('Data user tidak ditemukan');
            window.location.href = '../../pages/users/index.php';
        </script>
    ";
    exit;
}

// Hapus data dari tabel 'users'
$qDelete = "DELETE FROM users WHERE id = '$id'";
$delete = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// Beri umpan balik kepada pengguna dan arahkan kembali ke halaman index
if ($delete) {
    echo "
        <script>
            alert('Data user berhasil dihapus');
            window.location.href = '../../pages/users/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus data user');
            window.location.href = '../../pages/users/index.php';
        </script>
    ";
}
?>
