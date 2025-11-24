<?php
include '../../app.php';

if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan. Tidak dapat melanjutkan pembaruan.');
            window.location.href = '../../pages/headmasters/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];
$headmaster_name = isset($_POST['headmaster_name']) ? htmlspecialchars($_POST['headmaster_name'], ENT_QUOTES, 'UTF-8') : '';
$headmaster_description = isset($_POST['headmaster_description']) ? htmlspecialchars($_POST['headmaster_description'], ENT_QUOTES, 'UTF-8') : '';

$storages = "../../../storages/headmasters/";

// Ambil data lama
$queryOldData = "SELECT headmaster_image FROM headmasters WHERE id = '$id'";
$resultOldData = mysqli_query($connect, $queryOldData);
$oldData = mysqli_fetch_object($resultOldData);
$imageOld = $oldData->headmaster_image;

// Default: tetap pakai gambar lama
$imageNew = $imageOld;

// Kalau ada upload baru
if (isset($_FILES['headmaster_image']['tmp_name']) && !empty($_FILES['headmaster_image']['tmp_name'])) {
    $imageTemp = $_FILES['headmaster_image']['tmp_name'];
    $ext = pathinfo($_FILES['headmaster_image']['name'], PATHINFO_EXTENSION);

    // Kalau sudah ada gambar lama → pakai nama lama biar replace
    if (!empty($imageOld)) {
        $imageNew = $imageOld;
    } else {
        // Kalau belum ada gambar lama → buat nama baru
        $imageNew = time() . '-headmaster.' . $ext;
    }

    // Hapus dulu file lama (biar benar-benar ke-replace)
    if (!empty($imageOld) && file_exists($storages . $imageOld)) {
        unlink($storages . $imageOld);
    }

    // Upload file baru ke lokasi lama
    if (!move_uploaded_file($imageTemp, $storages . $imageNew)) {
        echo "
            <script>
                alert('Gagal mengunggah gambar!');
                window.location.href = '../../pages/headmasters/edit.php?id=" . $id . "';
            </script>
        ";
        exit;
    }
}

// Update DB
$safeName = mysqli_real_escape_string($connect, $headmaster_name);
$safeDesc = mysqli_real_escape_string($connect, $headmaster_description);
$safeImage = mysqli_real_escape_string($connect, $imageNew);

$qUpdate = "UPDATE headmasters SET 
    headmaster_name = '$safeName',
    headmaster_description = '$safeDesc',
    headmaster_image = '$safeImage'
    WHERE id = '$id'";

$update = mysqli_query($connect, $qUpdate);

if ($update) {
    echo "
        <script>
            alert('Data kepala sekolah berhasil diperbarui!');
            window.location.href = '../../pages/headmasters/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal memperbarui data kepala sekolah!');
            window.location.href = '../../pages/headmasters/index.php';
        </script>
    ";
}
?>
