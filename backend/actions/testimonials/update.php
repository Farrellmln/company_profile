<?php
// Memasukkan file konfigurasi aplikasi utama
include '../../app.php';

// Memeriksa apakah ID untuk data yang akan diupdate ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan. Tidak dapat melanjutkan pembaruan.');
            window.location.href = '../../pages/testimonials/index.php';
        </script>
    ";
    exit;
}

// Mengambil ID dari parameter URL
$id = $_GET['id'];

// Mengambil data dari form yang dikirimkan melalui POST
$name    = isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') : '';
$rating  = isset($_POST['rating']) ? htmlspecialchars($_POST['rating'], ENT_QUOTES, 'UTF-8') : '';
$status  = isset($_POST['status']) ? htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8') : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8') : '';

// --- Penanganan Upload Gambar ---
$storages = "../../../storages/testimonials/";

// Ambil data lama dari database untuk mendapatkan nama file gambar yang ada
$queryOldData = "SELECT image FROM testimonials WHERE id = '$id'";
$resultOldData = mysqli_query($connect, $queryOldData);
$oldData = mysqli_fetch_object($resultOldData);

// Inisialisasi nama file gambar baru dengan nama file lama
$imageNew = $oldData->image;

// Memeriksa apakah ada file gambar baru yang diupload
if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
    $imageTemp = $_FILES['image']['tmp_name'];
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageNew = time() . "-testimoni." . $ext;

    // Menghapus gambar lama jika ada dan file-nya benar-benar ada di server
    if (!empty($oldData->image) && file_exists($storages . $oldData->image)) {
        unlink($storages . $oldData->image);
    }

    // Memindahkan file gambar yang baru diupload ke direktori tujuan
    if (!move_uploaded_file($imageTemp, $storages . $imageNew)) {
        echo "
            <script>
                alert('Gagal mengunggah gambar!');
                window.location.href = '../../pages/testimonials/edit.php?id=" . $id . "';
            </script>
        ";
        exit;
    }
}

// --- Update Data ke Database ---
$safeName    = mysqli_real_escape_string($connect, $name);
$safeRating  = mysqli_real_escape_string($connect, $rating);
$safeStatus  = mysqli_real_escape_string($connect, $status);
$safeMessage = mysqli_real_escape_string($connect, $message);
$safeImageNew = mysqli_real_escape_string($connect, $imageNew);

$qUpdate = "UPDATE testimonials SET 
    name = '$safeName',
    rating = '$safeRating',
    status = '$safeStatus',
    message = '$safeMessage',
    image = '$safeImageNew'
    WHERE id = '$id'";

// Menjalankan query update
$update = mysqli_query($connect, $qUpdate);

// Memeriksa apakah update berhasil
if ($update) {
    echo "
        <script>
            alert('Data testimoni berhasil diperbarui!');
            window.location.href = '../../pages/testimonials/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal memperbarui data testimoni!');
            window.location.href = '../../pages/testimonials/index.php';
        </script>
    ";
}
?>
