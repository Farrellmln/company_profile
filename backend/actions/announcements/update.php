<?php
// Memasukkan file konfigurasi aplikasi utama
include '../../app.php';

// Fungsi untuk membersihkan input agar aman dari SQL Injection
// Anda perlu memastikan fungsi 'escapeString' ini ada di app.php atau di file helper Anda.
// Jika belum ada, Anda bisa menggantinya dengan:
// function escapeString($conn, $str) {
//     return mysqli_real_escape_string($conn, trim($str));
// }
// Dan memanggilnya seperti: escapeString($connect, $_POST['nama_field'])

// Memeriksa apakah ID untuk data yang akan diupdate ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan. Tidak dapat melanjutkan pembaruan.');
            window.location.href = '../../pages/announcements/index.php'; // Arahkan kembali ke daftar pengumuman
        </script>
    ";
    exit; // Menghentikan eksekusi skrip jika ID tidak ada
}

// Mengambil ID dari parameter URL
$id = $_GET['id'];

// Mengambil data dari form yang dikirimkan melalui POST
// Gunakan htmlspecialchars untuk mencegah Cross-Site Scripting (XSS) pada data teks
$announcements_title = isset($_POST['announcements_title']) ? htmlspecialchars($_POST['announcements_title'], ENT_QUOTES, 'UTF-8') : '';
$date                = isset($_POST['date']) ? htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8') : '';
$announcements       = isset($_POST['announcements']) ? htmlspecialchars($_POST['announcements'], ENT_QUOTES, 'UTF-8') : '';

// --- Penanganan Upload Gambar ---
// Direktori penyimpanan file upload
$storages = "../../../storages/announcements/";

// Ambil data lama dari database untuk mendapatkan nama file gambar yang ada
$queryOldData = "SELECT announcements_image FROM announcements WHERE id = '$id'";
$resultOldData = mysqli_query($connect, $queryOldData);
$oldData = mysqli_fetch_object($resultOldData);

// Inisialisasi nama file gambar baru dengan nama file lama
$imageNew = $oldData->announcements_image;

// Memeriksa apakah ada file gambar baru yang diupload
if (isset($_FILES['announcements_image']['tmp_name']) && !empty($_FILES['announcements_image']['tmp_name'])) {
    $imageTemp = $_FILES['announcements_image']['tmp_name'];
    // Membuat nama file unik berdasarkan waktu upload untuk menghindari tabrakan nama file
    $imageNew = time() . '-announcement.png'; // Sesuaikan ekstensi jika perlu

    // Menghapus gambar lama jika ada dan file-nya benar-benar ada di server
    if (!empty($oldData->announcements_image) && file_exists($storages . $oldData->announcements_image)) {
        unlink($storages . $oldData->announcements_image);
    }

    // Memindahkan file gambar yang baru diupload ke direktori tujuan
    // Gunakan move_uploaded_file untuk memindahkan file dari lokasi sementara ke lokasi permanen
    if (!move_uploaded_file($imageTemp, $storages . $imageNew)) {
        // Jika gagal upload gambar, tampilkan pesan error dan hentikan proses
        echo "
            <script>
                alert('Gagal mengunggah gambar!');
                window.location.href = '../../pages/announcements/edit.php?id=" . $id . "'; // Kembali ke halaman edit
            </script>
        ";
        exit;
    }
}

// --- Update Data ke Database ---
// Membuat query SQL untuk mengupdate data pengumuman
$qUpdate = "UPDATE announcements SET 
    announcements_title = '$announcements_title',
    date = '$date',
    announcements = '$announcements',
    announcements_image = '$imageNew' -- Gunakan nama file gambar yang baru atau lama
    WHERE id = '$id'"; // Kondisi WHERE memastikan hanya data dengan ID yang sesuai yang diupdate

// Menjalankan query update
$update = mysqli_query($connect, $qUpdate);

// Memeriksa apakah update berhasil
if ($update) {
    // Jika berhasil, tampilkan pesan sukses dan arahkan ke halaman daftar pengumuman
    echo "
        <script>
            alert('Data pengumuman berhasil diperbarui!');
            window.location.href = '../../pages/announcements/index.php';
        </script>
    ";
} else {
    // Jika gagal, tampilkan pesan error dan arahkan kembali ke halaman daftar pengumuman
    echo "
        <script>
            alert('Gagal memperbarui data pengumuman!');
            window.location.href = '../../pages/announcements/index.php';
        </script>
    ";
}
?>