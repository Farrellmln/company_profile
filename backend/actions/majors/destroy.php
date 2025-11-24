<?php
// Memasukkan file koneksi database
include '../../app.php';

// Periksa apakah parameter 'id' ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href = '../../pages/majors/index.php';
        </script>
    ";
    exit;
}

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data jurusan berdasarkan ID dari database
$qSelect = "SELECT * FROM majors WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$major = mysqli_fetch_object($result);

// Jika data tidak ditemukan
if (!$major) {
    echo "
        <script>
            alert('Data tidak ditemukan');
            window.location.href = '../../pages/majors/index.php';
        </script>
    ";
    exit;
}

// Tentukan direktori penyimpanan gambar
$storages = "../../../storages/majors/";

// Hapus file gambar terkait jika ada
if (!empty($major->majors_image) && file_exists($storages . $major->majors_image)) {
    unlink($storages . $major->majors_image);
}

// Hapus data dari tabel 'majors'
$qDelete = "DELETE FROM majors WHERE id = '$id'";
$delete = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// Beri umpan balik kepada pengguna
if ($delete) {
    echo "
        <script>
            alert('Data jurusan berhasil dihapus');
            window.location.href = '../../pages/majors/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus data jurusan');
            window.location.href = '../../pages/majors/index.php';
        </script>
    ";
}
?>
