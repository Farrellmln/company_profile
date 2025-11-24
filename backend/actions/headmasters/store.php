<?php
    include '../../app.php';

    // cek form yang dikirm apakah dengan name ="tombol" kalau berhasil iya dan berhasil, lanjut
    if(isset($_POST['tombol'])){
        // escapeString() : untuk menghindari inputan anomali dari user
        $headmaster_name = escapeString($_POST['headmaster_name']);
        $headmaster_description = escapeString($_POST['headmaster_description']);

        // rename file menjadi waktu standar internasional dari 1970 diacak
        $imageOld = $_FILES['headmaster_image']['tmp_name'];
        $imageNew = time() . ".png";

        $storages = "../../../storages/headmasters/";

        // memindahkan image lama ke penyimpanan terbaru imagwwe ne
        if(move_uploaded_file($imageOld, $storages . $imageNew)){
            $qInsert = "INSERT INTO headmasters(headmaster_name, headmaster_image, headmaster_description) VALUES ('$headmaster_name', '$imageNew', '$headmaster_description')";

            mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
            echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href = '../../pages/headmasters/index.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Data Gagal Ditambah');
                    window.location.href = '../../pages/headmasters/index.php';
                </script>
            ";
        }
    }
?>