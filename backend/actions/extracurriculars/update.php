<?php
include '../../app.php';

// Pastikan ID ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan!');
            window.location.href = '../../pages/extracurriculars/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];

// Ambil data lama (untuk gambar)
$qOld = "SELECT image FROM extracurriculars WHERE id = '$id'";
$resOld = mysqli_query($connect, $qOld);
$oldData = mysqli_fetch_object($resOld);

if (!$oldData) {
    echo "
        <script>
            alert('Data tidak ditemukan!');
            window.location.href = '../../pages/extracurriculars/index.php';
        </script>
    ";
    exit;
}

// Ambil data dari form
$name        = isset($_POST['name']) ? mysqli_real_escape_string($connect, $_POST['name']) : '';
$description = isset($_POST['description']) ? mysqli_real_escape_string($connect, $_POST['description']) : '';
$coach       = isset($_POST['coach']) ? mysqli_real_escape_string($connect, $_POST['coach']) : '';

$storages = "../../../storages/extracurriculars/";
$imageNew = $oldData->image; // default: gambar lama

// Jika ada upload gambar baru
if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
    $imageTemp = $_FILES['image']['tmp_name'];
    $imageNew = time() . "-org.png"; // nama unik

    // Hapus gambar lama kalau ada
    if (!empty($oldData->image) && file_exists($storages . $oldData->image)) {
        unlink($storages . $oldData->image);
    }

    // Upload gambar baru
    if (!move_uploaded_file($imageTemp, $storages . $imageNew)) {
        echo "
            <script>
                alert('Gagal mengunggah gambar baru!');
                window.location.href = '../../pages/extracurriculars/edit.php?id=$id';
            </script>
        ";
        exit;
    }
}

// Update ke database
$qUpdate = "UPDATE extracurriculars SET 
    name = '$name',
    description = '$description',
    coach = '$coach',
    image = '$imageNew',
    updated_at = NOW()
    WHERE id = '$id'";

$update = mysqli_query($connect, $qUpdate);

if ($update) {
    echo "
        <script>
            alert('Data organisasi berhasil diperbarui!');
            window.location.href = '../../pages/extracurriculars/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal memperbarui data!');
            window.location.href = '../../pages/extracurriculars/edit.php?id=$id';
        </script>
    ";
}
?>
