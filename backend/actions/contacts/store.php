<?php
include '../../app.php';

// cek form yang dikirm apakah dengan name ="tombol" kalau berhasil iya dan berhasil, lanjut
if (isset($_POST['tombol'])) {
    // escapeString() : untuk menghindari inputan anomali dari user
    $icon = escapeString($_POST['icon']);
    $contact = escapeString($_POST['contact']);
    $email = escapeString($_POST['email']);
    $link_url = escapeString($_POST['link_url']);

    $qInsert = "INSERT INTO contacts(icon, contact, email, link_url) VALUES ('$icon', '$contact', '$email', '$link_url')";

    // memindahkan image lama ke penyimpanan terbaru imagwwe ne
    if (mysqli_query($connect, $qInsert) or die(mysqli_error($connect))) {
        echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href = '../../pages/contacts/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Ditambah');
                    window.location.href = '../../pages/contacts/index.php';
                </script>
            ";
    }
}
