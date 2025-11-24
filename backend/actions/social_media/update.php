<?php
include '../../app.php';

// Pastikan request datang dari form dengan tombol 'tombol'
if (!isset($_POST['tombol'])) {
    echo "
        <script>
            alert('Akses tidak valid. Silakan gunakan form untuk memperbarui data.');
            window.location.href = '../../pages/social_media/index.php';
        </script>
    ";
    exit;
}

// Pastikan ID ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan. Tidak dapat melanjutkan pembaruan.');
            window.location.href = '../../pages/social_media/index.php';
        </script>
    ";
    exit;
}

$id = escapeString($_GET['id']);

// Amankan input dari user
$icon = escapeString($_POST['icon']);
$title = escapeString($_POST['title']);
$link_url = escapeString($_POST['link_url']);

// Siapkan query UPDATE dengan sintaks yang benar
$qUpdate = "UPDATE social_media SET 
    icon = '$icon', 
    title = '$title', 
    link_url = '$link_url' 
    WHERE id = '$id'";

$result = mysqli_query($connect, $qUpdate);

if ($result) {
    echo "
        <script>
            alert('Data berhasil diubah');
            window.location.href = '../../pages/social_media/index.php';
        </script>
    ";
} else {
    // Tambahkan pesan error MySQL untuk debugging jika diperlukan
    // echo "Error: " . mysqli_error($connect);
    echo "
        <script>
            alert('Data gagal diubah!');
            window.location.href = '../../pages/social_media/index.php';
        </script>
    ";
}

exit;
?>