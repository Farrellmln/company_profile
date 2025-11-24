<?php
    include '../../app.php';

    // cek form yang dikirm apakah dengan name ="tombol" kalau berhasil iya dan berhasil, lanjut
    if(isset($_POST['tombol'])){
        // escapeString() : untuk menghindari inputan anomali dari user
        $majors_name = escapeString($_POST['majors_name']);
        $majors_description = escapeString($_POST['majors_description']);
        $head = escapeString($_POST['head']);

        // rename file menjadi waktu standar internasional dari 1970 diacak
        $imageOld = $_FILES['majors_image']['tmp_name'];
        $imageNew = time() . ".png";

        $storages = "../../../storages/majors/";

        // memindahkan image lama ke penyimpanan terbaru imagwwe ne
        if(move_uploaded_file($imageOld, $storages . $imageNew)){
            $qInsert = "INSERT INTO majors(majors_name, majors_image, majors_description, head) VALUES ('$majors_name', '$imageNew', '$majors_description', '$head')";

            mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
            echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href = '../../pages/majors/index.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Data Gagal Ditambah');
                    window.location.href = '../../pages/majors/index.php';
                </script>
            ";
        }
    }
?>