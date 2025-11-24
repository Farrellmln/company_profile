<?php
// Memasukkan file konfigurasi aplikasi utama
include '../../app.php';

// Pastikan ID ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan. Tidak dapat melanjutkan pembaruan.');
            window.location.href = '../../pages/blogs/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];

// Ambil data lama untuk keperluan gambar
$qOld = "SELECT image FROM blogs WHERE id = '$id'";
$resOld = mysqli_query($connect, $qOld);
$oldData = mysqli_fetch_object($resOld);

if (!$oldData) {
    echo "
        <script>
            alert('Data tidak ditemukan!');
            window.location.href = '../../pages/blogs/index.php';
        </script>
    ";
    exit;
}

// Ambil data dari form
$title   = isset($_POST['title']) ? htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8') : '';
$date    = isset($_POST['date']) ? htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8') : '';
$author  = isset($_POST['author']) ? htmlspecialchars($_POST['author'], ENT_QUOTES, 'UTF-8') : '';
$content = isset($_POST['content']) ? htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8') : '';

// Direktori penyimpanan
$storages = "../../../storages/blogs/";

// Default: pakai gambar lama
$imageNew = $oldData->image;

// Cek jika ada upload gambar baru
if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
    $imageTemp = $_FILES['image']['tmp_name'];
    $imageNew = time() . "-blog.png"; // nama unik

    // Hapus gambar lama jika ada
    if (!empty($oldData->image) && file_exists($storages . $oldData->image)) {
        unlink($storages . $oldData->image);
    }

    // Upload gambar baru
    if (!move_uploaded_file($imageTemp, $storages . $imageNew)) {
        echo "
            <script>
                alert('Gagal mengunggah gambar!');
                window.location.href = '../../pages/blogs/edit.php?id=" . $id . "';
            </script>
        ";
        exit;
    }
}

// Update data ke database
$qUpdate = "UPDATE blogs SET 
    title = '$title',
    date = '$date',
    author = '$author',
    content = '$content',
    image = '$imageNew',
    updated_at = NOW()
    WHERE id = '$id'";

$update = mysqli_query($connect, $qUpdate);

if ($update) {
    echo "
        <script>
            alert('Data blog berhasil diperbarui!');
            window.location.href = '../../pages/blogs/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal memperbarui data blog!');
            window.location.href = '../../pages/blogs/index.php';
        </script>
    ";
}
?>
