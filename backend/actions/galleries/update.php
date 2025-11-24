<?php
// Memasukkan file konfigurasi aplikasi utama
include '../../app.php';

// Memeriksa apakah ID untuk data yang akan diupdate ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan. Tidak dapat melanjutkan pembaruan.');
            window.location.href = '../../pages/galleries/index.php';
        </script>
    ";
    exit;
}

// Mengambil ID dari parameter URL
$id = $_GET['id'];

// Mengambil data dari form yang dikirimkan melalui POST
$author = isset($_POST['author']) ? htmlspecialchars($_POST['author'], ENT_QUOTES, 'UTF-8') : '';
$date = isset($_POST['date']) ? htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8') : '';
$description = isset($_POST['description']) ? htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8') : '';

// --- Penanganan Upload Gambar ---
// Direktori penyimpanan file upload
$storages = "../../../storages/galleries/";

// Ambil data lama dari database untuk mendapatkan nama file gambar yang ada
$queryOldData = "SELECT image FROM galleries WHERE id = '$id'";
$resultOldData = mysqli_query($connect, $queryOldData);
$oldData = mysqli_fetch_object($resultOldData);

// Inisialisasi nama file gambar baru dengan nama file lama
$imageNew = $oldData->image;

// Memeriksa apakah ada file gambar baru yang diupload
if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
    $imageTemp = $_FILES['image']['tmp_name'];
    // Membuat nama file unik berdasarkan waktu upload untuk menghindari tabrakan nama file
    $imageNew = time() . '-gallery.png'; // Sesuaikan ekstensi jika perlu

    // Menghapus gambar lama jika ada dan file-nya benar-benar ada di server
    if (!empty($oldData->image) && file_exists($storages . $oldData->image)) {
        unlink($storages . $oldData->image);
    }

    // Memindahkan file gambar yang baru diupload ke direktori tujuan
    if (!move_uploaded_file($imageTemp, $storages . $imageNew)) {
        // Jika gagal upload gambar, tampilkan pesan error dan hentikan proses
        echo "
            <script>
                alert('Gagal mengunggah gambar!');
                window.location.href = '../../pages/galleries/edit.php?id=" . $id . "';
            </script>
        ";
        exit;
    }
}

// --- Update Data ke Database ---
// Menggunakan mysqli_real_escape_string untuk mencegah SQL Injection
$safeAuthor = mysqli_real_escape_string($connect, $author);
$safeDate = mysqli_real_escape_string($connect, $date);
$safeDescription = mysqli_real_escape_string($connect, $description);
$safeImageNew = mysqli_real_escape_string($connect, $imageNew);

// Membuat query SQL untuk mengupdate data galeri
$qUpdate = "UPDATE galleries SET 
    author = '$safeAuthor',
    date = '$safeDate',
    description = '$safeDescription',
    image = '$safeImageNew'
    WHERE id = '$id'";

// Menjalankan query update
$update = mysqli_query($connect, $qUpdate);

// Memeriksa apakah update berhasil
if ($update) {
    echo "
        <script>
            alert('Data galeri berhasil diperbarui!');
            window.location.href = '../../pages/galleries/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal memperbarui data galeri!');
            window.location.href = '../../pages/galleries/index.php';
        </script>
    ";
}
?>
