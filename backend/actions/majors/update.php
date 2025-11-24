<?php
include '../../app.php';

if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan. Tidak dapat melanjutkan pembaruan.');
            window.location.href = '../../pages/majors/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];
$majors_name        = isset($_POST['majors_name']) ? htmlspecialchars($_POST['majors_name'], ENT_QUOTES, 'UTF-8') : '';
$majors_description = isset($_POST['majors_description']) ? htmlspecialchars($_POST['majors_description'], ENT_QUOTES, 'UTF-8') : '';
$head               = isset($_POST['head']) ? htmlspecialchars($_POST['head'], ENT_QUOTES, 'UTF-8') : '';

$storages = "../../../storages/majors/";

// Ambil data lama
$queryOldData  = "SELECT majors_image FROM majors WHERE id = '$id'";
$resultOldData = mysqli_query($connect, $queryOldData);
$oldData       = mysqli_fetch_object($resultOldData);
$imageOld      = $oldData ? $oldData->majors_image : '';

// Default: tetap pakai gambar lama
$imageNew = $imageOld;

// Kalau ada upload baru
if (isset($_FILES['majors_image']['tmp_name']) && !empty($_FILES['majors_image']['tmp_name'])) {
    $imageTemp = $_FILES['majors_image']['tmp_name'];
    $ext = pathinfo($_FILES['majors_image']['name'], PATHINFO_EXTENSION);

    // Kalau sudah ada gambar lama → pakai nama lama biar replace
    if (!empty($imageOld)) {
        $imageNew = $imageOld;
    } else {
        // Kalau belum ada gambar lama → buat nama baru
        $imageNew = time() . '-major.' . $ext;
    }

    // Hapus dulu file lama
    if (!empty($imageOld) && file_exists($storages . $imageOld)) {
        unlink($storages . $imageOld);
    }

    // Upload file baru
    if (!move_uploaded_file($imageTemp, $storages . $imageNew)) {
        echo "
            <script>
                alert('Gagal mengunggah gambar!');
                window.location.href = '../../pages/majors/edit.php?id=" . $id . "';
            </script>
        ";
        exit;
    }
}

// Update ke DB
$safeName  = mysqli_real_escape_string($connect, $majors_name);
$safeDesc  = mysqli_real_escape_string($connect, $majors_description);
$safeHead  = mysqli_real_escape_string($connect, $head);
$safeImage = mysqli_real_escape_string($connect, $imageNew);

$qUpdate = "UPDATE majors SET 
    majors_name = '$safeName',
    majors_description = '$safeDesc',
    majors_image = '$safeImage',
    head = '$safeHead'
    WHERE id = '$id'";

$update = mysqli_query($connect, $qUpdate);

if ($update) {
    echo "
        <script>
            alert('Data jurusan berhasil diperbarui!');
            window.location.href = '../../pages/majors/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal memperbarui data jurusan!');
            window.location.href = '../../pages/majors/edit.php?id=$id';
        </script>
    ";
}
?>
