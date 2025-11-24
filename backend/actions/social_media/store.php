<?php
include '../../app.php';

// cek form yang dikirm apakah dengan name ="tombol" kalau berhasil iya dan berhasil, lanjut
if (isset($_POST['tombol'])) {
    // escapeString() : untuk menghindari inputan anomali dari user
    $icon = escapeString($_POST['icon']);
    $title = escapeString($_POST['title']);
    $link_url = escapeString($_POST['link_url']);

    $qInsert = "INSERT INTO social_media(icon, title, link_url) VALUES ('$icon', '$title', '$link_url')";

    // memindahkan image lama ke penyimpanan terbaru imagwwe ne
    if (mysqli_query($connect, $qInsert) or die(mysqli_error($connect))) {
        echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href = '../../pages/social_media/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Ditambah');
                    window.location.href = '../../pages/majors/index.php';
                </script>
            ";
    }
}
