<?php
// Memasukkan file koneksi database
include '../../app.php';

// Periksa apakah parameter 'id' ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href = '../../pages/galleries/index.php';
        </script>
    ";
    exit;
}

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data galeri berdasarkan ID dari database
$qSelect = "SELECT * FROM galleries WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$gallery = mysqli_fetch_object($result);

// Jika data tidak ditemukan, tampilkan pesan error dan kembali ke halaman index
if (!$gallery) {
    echo "
        <script>
            alert('Data tidak ditemukan');
            window.location.href = '../../pages/galleries/index.php';
        </script>
    ";
    exit;
}

// Tentukan direktori penyimpanan gambar
$storages = "../../../storages/galleries/";

// Hapus file gambar terkait jika ada
if (!empty($gallery->image) && file_exists($storages . $gallery->image)) {
    unlink($storages . $gallery->image);
}

// Hapus data dari tabel 'galleries'
$qDelete = "DELETE FROM galleries WHERE id = '$id'";
$delete = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// Beri umpan balik kepada pengguna dan arahkan kembali ke halaman index
if ($delete) {
    echo "
        <script>
            alert('Data galeri berhasil dihapus');
            window.location.href = '../../pages/galleries/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus data galeri');
            window.location.href = '../../pages/galleries/index.php';
        </script>
    ";
}
?>
