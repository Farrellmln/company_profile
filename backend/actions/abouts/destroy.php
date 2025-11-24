<?php
include '../../app.php';
include 'show.php'; // pastikan path ini benar ke file koneksi database

if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href = '../../../pages/abouts/index.php';
        </script>
    ";
    exit;
}

$id = intval($_GET['id']);

// Ambil data dulu supaya bisa hapus gambarnya
$query = "SELECT * FROM abouts WHERE id = $id LIMIT 1";
$result = mysqli_query($connect, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "
        <script>
            alert('Data tidak ditemukan');
            window.location.href = '../../../pages/abouts/index.php';
        </script>
    ";
    exit;
}

$item = mysqli_fetch_object($result);

// Path folder tempat gambar disimpan
$storageLogo = "../../../storages/abouts/" . $item->school_logo;
$storageBanner = "../../../storages/abouts/" . $item->school_banner;

// Hapus gambar jika ada
if (!empty($item->school_logo) && file_exists($storageLogo)) {
    unlink($storageLogo);
}

if (!empty($item->school_banner) && file_exists($storageBanner)) {
    unlink($storageBanner);
}

// Hapus data di database
$qDelete = "DELETE FROM abouts WHERE id = $id";
$deleteResult = mysqli_query($connect, $qDelete);

if ($deleteResult) {
    echo "
        <script>
            alert('Data berhasil dihapus');
            window.location.href = '../../pages/abouts/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus');
            window.location.href = '../../pages/abouts/index.php';
        </script>
    ";
}
