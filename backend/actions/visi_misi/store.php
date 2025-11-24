<?php
include '../../app.php';

// cek form yang dikirm apakah dengan name ="tombol" kalau berhasil iya dan berhasil, lanjut
if (isset($_POST['tombol'])) {
    // escapeString() : untuk menghindari inputan anomali dari user
    $visi = escapeString($_POST['visi']);
    $misi = escapeString($_POST['misi']);

    $qInsert = "INSERT INTO visi_misi(visi, misi) VALUES ('$visi', '$misi')";

    // memindahkan image lama ke penyimpanan terbaru imagwwe ne
    if (mysqli_query($connect, $qInsert) or die(mysqli_error($connect))) {
        echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href = '../../pages/visi_misi/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Ditambah');
                    window.location.href = '../../pages/visi_misi/index.php';
                </script>
            ";
    }
}
