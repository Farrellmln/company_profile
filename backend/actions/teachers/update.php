<?php
include '../../app.php';

// Pastikan ada data yang dikirimkan melalui POST dan ID ada di URL
if (!isset($_POST['tombol']) || !isset($_GET['id'])) {
    echo "
        <script>
            alert('Akses tidak valid.');
            window.location.href = '../../pages/teachers/index.php';
        </script>
    ";
    exit;
}

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data guru dari database untuk mendapatkan nama foto lama
$qSelect = "SELECT * FROM teachers WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect);
$teachers = mysqli_fetch_object($result);

// Jika data tidak ditemukan, hentikan proses
if (!$teachers) {
    echo "
        <script>
            alert('Data guru tidak ditemukan!');
            window.location.href = '../../pages/teachers/index.php';
        </script>
    ";
    exit;
}

// Amankan inputan dari user
$teachers_name = escapeString($_POST['teachers_name']);
$teachers_major = escapeString($_POST['teachers_major']);
$jk = escapeString($_POST['jk']);

// Tentukan direktori penyimpanan
$storages = "../../../storages/teachers/";

// Nama foto lama dari database
$imageNew = $teachers->teachers_photo;

// Cek apakah user mengupload foto baru
if (isset($_FILES['teachers_photo']) && $_FILES['teachers_photo']['error'] === 0) {
    $imageTemp = $_FILES['teachers_photo']['tmp_name'];
    $ext = pathinfo($_FILES['teachers_photo']['name'], PATHINFO_EXTENSION);
    $imageNew = time() . '.png';

    // Hapus foto lama jika ada
    if (!empty($teachers->teachers_photo) && file_exists($storages . $teachers->teachers_photo)) {
        unlink($storages . $teachers->teachers_photo);
    }

    // Pindahkan foto baru ke folder storages
    if (!move_uploaded_file($imageTemp, $storages . $imageNew)) {
        echo "
            <script>
                alert('Gagal mengunggah foto baru!');
                window.location.href = '../../pages/teachers/edit.php?id=" . $id . "';
            </script>
        ";
        exit;
    }
}

// Perbarui data di database
$qUpdate = "UPDATE teachers SET 
    teachers_name = '$teachers_name', 
    teachers_photo = '$imageNew', 
    teachers_major = '$teachers_major', 
    jk = '$jk' 
    WHERE id = '$id'";

$update = mysqli_query($connect, $qUpdate);

// Cek hasil update
if ($update) {
    echo "
        <script>
            alert('Data guru berhasil diubah!');
            window.location.href = '../../pages/teachers/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Gagal mengubah data guru!');
            window.location.href = '../../pages/teachers/edit.php?id=" . $id . "';
        </script>
    ";
}
?>