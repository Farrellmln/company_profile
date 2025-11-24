<?php
    include '../../app.php';

    // cek form yang dikirm apakah dengan name ="tombol" kalau berhasil iya dan berhasil, lanjut
    if(isset($_POST['tombol'])){
        // escapeString() : untuk menghindari inputan anomali dari user
        $author = escapeString($_POST['author']);
        $date = escapeString($_POST['date']);
        $title = escapeString($_POST['title']);
        $description = escapeString($_POST['description']);

        // rename file menjadi waktu standar internasional dari 1970 diacak
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . ".png";

        $storages = "../../../storages/achievements/";

        // memindahkan image lama ke penyimpanan terbaru imagwwe ne
        if(move_uploaded_file($imageOld, $storages . $imageNew)){
            $qInsert = "INSERT INTO achievements(image, author, date, title, description) VALUES ('$imageNew', '$author', '$date', '$title', '$description')";

            mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
            echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href = '../../pages/achievements/index.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Data Gagal Ditambah');
                    window.location.href = '../../pages/achievements/index.php';
                </script>
            ";
        }
    }
?>