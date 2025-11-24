<?php
// Memasukkan file koneksi database
include '../../app.php';

// Periksa apakah parameter 'id' ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href = '../../pages/blogs/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];

// Ambil data blog berdasarkan ID dari database
$qSelect = "SELECT * FROM blogs WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$blog = mysqli_fetch_object($result);

// Jika data tidak ditemukan, tampilkan pesan error dan kembali ke halaman index
if (!$blog) {
    echo "
        <script>
            alert('Data tidak ditemukan');
            window.location.href = '../../pages/blogs/index.php';
        </script>
    ";
    exit;
}

$storages = "../../../storages/blogs/";

// Hapus file gambar terkait jika ada
if (!empty($blog->image) && file_exists($storages . $blog->image)) {
    unlink($storages . $blog->image);
}

// Hapus data dari tabel 'blogs'
$qDelete = "DELETE FROM blogs WHERE id = '$id'";
$delete = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// Beri umpan balik kepada pengguna dan arahkan kembali ke halaman index
if ($delete) {
    echo "
        <script>
            alert('Data berhasil dihapus');
            window.location.href = '../../pages/blogs/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal menghapus data');
            window.location.href = '../../pages/blogs/index.php';
        </script>
    ";
}
?>
