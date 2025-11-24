<?php
    include '../../app.php';
    include './show.php';

    // cek form yang dikirm apakah dengan name ="tombol" kalau berhasil iya dan berhasil, lanjut
    if(isset($_POST['tombol'])){
        // escapeString() : untuk menghindari inputan anomali dari user
        $visi = escapeString($_POST['visi']);
        $misi = escapeString($_POST['misi']);

        $qUpdate = "UPDATE visi_misi SET visi='$visi', misi='$misi' WHERE id='$visi_misi->id'";

        $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
        if($result){
            echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href = '../../pages/visi_misi/index.php';
                </script>
            ";
        }else{
            echo "
                    <script>
                        alert('Data gagal diubah');
                        window.location.href = '../../pages/visi_misi/edit.php';
                    </script>
                ";
        }     
    }
?>