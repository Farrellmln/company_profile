<?php
include '../../app.php';

if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan');
            window.location.href = '../../pages/abouts/index.php';
        </script>
    ";
    exit;
}

$id = $_GET['id'];

// Ambil data dari form
$school_name        = escapeString($_POST['school_name']);
$school_tagline     = escapeString($_POST['school_tagline']);
$school_description = escapeString($_POST['school_description']);
$since              = escapeString($_POST['since']);
$alamat             = escapeString($_POST['alamat']);

// Path upload
$storages = "../../../storages/abouts/";

// Ambil data lama
$result = mysqli_query($connect, "SELECT * FROM abouts WHERE id = '$id'");
$oldData = mysqli_fetch_object($result);

$school_logoNew   = $oldData->school_logo;
$school_bannerNew = $oldData->school_banner;

// Proses logo baru
if (!empty($_FILES['school_logo']['tmp_name'])) {
    // Hapus file lama jika ada dan file-nya eksis
    if (!empty($oldData->school_logo) && file_exists($storages . $oldData->school_logo)) {
        unlink($storages . $oldData->school_logo);
    }

    $ext = pathinfo($_FILES['school_logo']['name'], PATHINFO_EXTENSION);
    $school_logoNew = time() . "-logo." . $ext;
    move_uploaded_file($_FILES['school_logo']['tmp_name'], $storages . $school_logoNew);
}

// Proses banner baru
if (!empty($_FILES['school_banner']['tmp_name'])) {
    if (!empty($oldData->school_banner) && file_exists($storages . $oldData->school_banner)) {
        unlink($storages . $oldData->school_banner);
    }

    $ext = pathinfo($_FILES['school_banner']['name'], PATHINFO_EXTENSION);
    $school_bannerNew = time() . "-banner." . $ext;
    move_uploaded_file($_FILES['school_banner']['tmp_name'], $storages . $school_bannerNew);
}

// Update ke database
$qUpdate = "UPDATE abouts SET 
    school_name = '$school_name',
    school_logo = '$school_logoNew',
    school_banner = '$school_bannerNew',
    school_tagline = '$school_tagline',
    school_description = '$school_description',
    since = '$since',
    alamat = '$alamat'
    WHERE id = '$id'";

mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));

echo "
    <script>
        alert('Data berhasil diperbarui!');
        window.location.href = '../../pages/abouts/index.php';
    </script>
";
?>
