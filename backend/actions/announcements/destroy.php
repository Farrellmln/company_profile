<?php
    // Memasukkan file koneksi database
    include '../../app.php';

    // Periksa apakah parameter 'id' ada di URL
    if (!isset($_GET['id'])) {
        echo "
            <script>
                alert('ID tidak ditemukan');
                window.location.href = '../../pages/announcements/index.php';
            </script>
        ";
        exit;
    }

    $id = $_GET['id'];

    // Ambil data pengumuman berdasarkan ID dari database
    $qSelect = "SELECT * FROM announcements WHERE id = '$id'";
    $result = mysqli_query($connect, $qSelect);
    $announcement = mysqli_fetch_object($result);

    // Jika data tidak ditemukan, tampilkan pesan error dan kembali ke halaman index
    if (!$announcement) {
        echo "
            <script>
                alert('Data tidak ditemukan');
                window.location.href = '../../pages/announcements/index.php';
            </script>
        ";
        exit;
    }

    $storages = "../../../storages/announcements/";

    // Hapus file gambar terkait jika ada
    // Periksa apakah nama file gambar tidak kosong dan file benar-benar ada di direktori
    if (!empty($announcement->announcements_image) && file_exists($storages . $announcement->announcements_image)) {
        unlink($storages . $announcement->announcements_image);
    }

    // Hapus data dari tabel 'announcements'
    $qDelete = "DELETE FROM announcements WHERE id = '$id'";
    $delete = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

    // Beri umpan balik kepada pengguna dan arahkan kembali ke halaman index
    if ($delete) {
        echo "
            <script>
                alert('Data berhasil dihapus');
                window.location.href = '../../pages/announcements/index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menghapus data');
                window.location.href = '../../pages/announcements/index.php';
            </script>
        ";
    }
?>