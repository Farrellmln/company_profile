<?php
// Memasukkan file koneksi database
include '../../app.php';

// Periksa apakah parameter 'id' ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan. Tidak dapat melanjutkan penghapusan.');
            window.location.href = '../../pages/social_media/index.php';
        </script>
    ";
    exit;
}

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data sosial media berdasarkan ID dari database
$qSelect = "SELECT * FROM social_media WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$social_media = mysqli_fetch_object($result);

// Jika data tidak ditemukan, tampilkan pesan error dan kembali ke halaman index
if (!$social_media) {
    echo "
        <script>
            alert('Data tidak ditemukan');
            window.location.href = '../../pages/social_media/index.php';
        </script>
    ";
    exit;
}

// Hapus data dari tabel 'social_media'
$qDelete = "DELETE FROM social_media WHERE id = '$id'";
$delete = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// Beri umpan balik kepada pengguna dan arahkan kembali ke halaman index
if ($delete) {
    echo "
        <script>
            alert('Data sosial media berhasil dihapus');
            window.location.href = '../../pages/social_media/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus data sosial media');
            window.location.href = '../../pages/social_media/index.php';
        </script>
    ";
}
?>