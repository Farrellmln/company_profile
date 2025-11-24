<?php
// Memasukkan file koneksi database
include '../../app.php';

// Periksa apakah parameter 'id' ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href = '../../pages/extracurriculars/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];

// Ambil data organisasi berdasarkan ID dari database
$qSelect = "SELECT * FROM extracurriculars WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$data = mysqli_fetch_object($result);

// Jika data tidak ditemukan
if (!$data) {
    echo "
        <script>
            alert('Data tidak ditemukan');
            window.location.href = '../../pages/extracurriculars/index.php';
        </script>
    ";
    exit;
}

$storages = "../../../storages/extracurriculars/";

// Hapus file gambar terkait jika ada
if (!empty($data->image) && file_exists($storages . $data->image)) {
    unlink($storages . $data->image);
}

// Hapus data dari tabel 'extracurriculars'
$qDelete = "DELETE FROM extracurriculars WHERE id = '$id'";
$delete = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// Feedback ke user
if ($delete) {
    echo "
        <script>
            alert('Data berhasil dihapus');
            window.location.href = '../../pages/extracurriculars/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus data');
            window.location.href = '../../pages/extracurriculars/index.php';
        </script>
    ";
}
?>
