<?php
    include '../../app.php';

    // cek form yang dikirm apakah dengan name ="tombol" kalau berhasil iya dan berhasil, lanjut
    if(isset($_POST['tombol'])){
        // escapeString() : untuk menghindari inputan anomali dari user
        $name = escapeString($_POST['name']);
        $description = escapeString($_POST['description']);
        $coach = escapeString($_POST['coach']);

        // rename file menjadi waktu standar internasional dari 1970 diacak
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . ".png";

        $storages = "../../../storages/extracurriculars/";

        // memindahkan image lama ke penyimpanan terbaru imagwwe ne
        if(move_uploaded_file($imageOld, $storages . $imageNew)){
            $qInsert = "INSERT INTO extracurriculars(image, name, description, coach) VALUES ('$imageNew', '$name', '$description', '$coach')";

            mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
            echo "
                <script>
                    alert('Data Berhasil Ditambah');
                    window.location.href = '../../pages/extracurriculars/index.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Data Gagal Ditambah');
                    window.location.href = '../../pages/extracurriculars/index.php';
                </script>
            ";
        }
    }
?>