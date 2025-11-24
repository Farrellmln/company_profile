<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    // escape input
    $name    = escapeString($_POST['name']);
    $rating  = intval($_POST['rating']);
    $status  = escapeString($_POST['status']);
    $message = escapeString($_POST['message']);

    // cek file upload
    $imageOld = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $ext = pathinfo($imageName, PATHINFO_EXTENSION);

    // rename file unik
    $imageNew = time() . '_' . uniqid() . '.' . $ext;

    // lokasi penyimpanan
    $storages = "../../../storages/testimonials/";

    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        // query insert
        $qInsert = "
            INSERT INTO testimonials (image, name, rating, status, message) 
            VALUES ('$imageNew', '$name', '$rating', '$status', '$message')
        ";
        $insertResult = mysqli_query($connect, $qInsert);

        if ($insertResult) {
            echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href='../../pages/testimonials/index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambah: " . mysqli_error($connect) . "');
                    window.location.href='../../pages/testimonials/index.php';
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Upload gambar gagal');
                window.location.href='../../pages/testimonials/index.php';
            </script>
        ";
    }
}
?>
