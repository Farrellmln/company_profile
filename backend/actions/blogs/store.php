<?php
    include '../../app.php';

    // cek form yang dikirm apakah dengan name ="tombol" kalau berhasil iya dan berhasil, lanjut
    if(isset($_POST['tombol'])){
        // escapeString() : untuk menghindari inputan anomali dari user
        $title = escapeString($_POST['title']);
        $date = escapeString($_POST['date']);
        $author = escapeString($_POST['author']);
        $content = escapeString($_POST['content']);

        // rename file menjadi waktu standar internasional dari 1970 diacak
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . ".png";

        $storages = "../../../storages/blogs/";

        // memindahkan image lama ke penyimpanan terbaru imagwwe ne
        if(move_uploaded_file($imageOld, $storages . $imageNew)){
            $qInsert = "INSERT INTO blogs(image, title, date, author, content) VALUES ('$imageNew', '$title', '$date', '$author', '$content')";

            mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
            echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href = '../../pages/blogs/index.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Data Gagal Ditambah');
                    window.location.href = '../../pages/blogs/index.php';
                </script>
            ";
        }
    }
?>