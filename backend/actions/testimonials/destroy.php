<?php
include '../../app.php';

// Cek apakah ada id di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href='../../pages/testimonials/index.php';
        </script>
    ";
    exit;
}

$id = intval($_GET['id']);

// Ambil data dulu supaya bisa hapus gambarnya
$query = "SELECT * FROM testimonials WHERE id = $id LIMIT 1";
$result = mysqli_query($connect, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "
        <script>
            alert('Data tidak ditemukan');
            window.location.href='../../pages/testimonials/index.php';
        </script>
    ";
    exit;
}

$item = mysqli_fetch_object($result);

// Path folder tempat gambar disimpan
$storagePath = "../../../storages/testimonials/" . $item->image;

// Hapus gambar jika ada
if (!empty($item->image) && file_exists($storagePath)) {
    unlink($storagePath);
}

// Hapus data dari database
$qDelete = "DELETE FROM testimonials WHERE id = $id";
$deleteResult = mysqli_query($connect, $qDelete);

if ($deleteResult) {
    echo "
        <script>
            alert('Data berhasil dihapus');
            window.location.href='../../pages/testimonials/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus');
            window.location.href='../../pages/testimonials/index.php';
        </script>
    ";
}
