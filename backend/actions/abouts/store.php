<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $school_name = escapeString($_POST['school_name']);
    $school_tagline = escapeString($_POST['school_tagline']);
    $school_description = escapeString($_POST['school_description']);
    $since = escapeString($_POST['since']);
    $alamat = escapeString($_POST['alamat']);

    // Folder penyimpanan
    $storages = "../../../storages/abouts/";

    // File LOGO
    $school_logoOld = $_FILES['school_logo']['tmp_name'];
    $school_logoNew = time() . "-logo.png";

    // File BANNER
    $school_bannerOld = $_FILES['school_banner']['tmp_name'];
    $school_bannerNew = time() . "-banner.png";

    // Upload file ke folder
    $uploadLogo = move_uploaded_file($school_logoOld, $storages . $school_logoNew);
    $uploadBanner = move_uploaded_file($school_bannerOld, $storages . $school_bannerNew);

    // Jika kedua file berhasil diupload
    if ($uploadLogo && $uploadBanner) {
        $qInsert = "INSERT INTO abouts (
                        school_name, school_logo, school_banner, 
                        school_tagline, school_description, since, alamat
                    ) VALUES (
                        '$school_name', '$school_logoNew', '$school_bannerNew', 
                        '$school_tagline', '$school_description', '$since', '$alamat'
                    )";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));

        echo "
            <script>
                alert('Data Berhasil Ditambah');
                window.location.href = '../../pages/abouts/index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambah');
                window.location.href = '../../pages/abouts/index.php';
            </script>
        ";
    }
}
?>
