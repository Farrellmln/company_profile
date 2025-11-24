<?php
// Memasukkan file koneksi database
include '../../app.php';

// Periksa apakah parameter 'id' ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href = '../../pages/headmasters/index.php';
        </script>
    ";
    exit;
}

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data headmaster berdasarkan ID dari database
$qSelect = "SELECT * FROM headmasters WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$headmaster = mysqli_fetch_object($result);

// Jika data tidak ditemukan, tampilkan pesan error dan kembali ke halaman index
if (!$headmaster) {
    echo "
        <script>
            alert('Data tidak ditemukan');
            window.location.href = '../../pages/headmasters/index.php';
        </script>
    ";
    exit;
}

// Tentukan direktori penyimpanan gambar
$storages = "../../../storages/headmasters/";

// Hapus file gambar terkait jika ada
if (!empty($headmaster->headmaster_image) && file_exists($storages . $headmaster->headmaster_image)) {
    unlink($storages . $headmaster->headmaster_image);
}

// Hapus data dari tabel 'headmasters'
$qDelete = "DELETE FROM headmasters WHERE id = '$id'";
$delete = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// Beri umpan balik kepada pengguna dan arahkan kembali ke halaman index
if ($delete) {
    echo "
        <script>
            alert('Data kepala sekolah berhasil dihapus');
            window.location.href = '../../pages/headmasters/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus data kepala sekolah');
            window.location.href = '../../pages/headmasters/index.php';
        </script>
    ";
}
?>
