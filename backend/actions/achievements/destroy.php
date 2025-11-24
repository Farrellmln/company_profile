<?php
    include '../../app.php';
    include 'show.php';

    $storages = "../../../storages/achievements/";

    // hapus gambar jika ada
    if(!empty($achievements->image) && file_exists($storages . $achievements->image)){
        unlink($storages . $achievements->image);
    }

    // hapus data 
    $qDelete = "DELETE FROM achievements WHERE id= '$achievements->id'";
    $result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));
    if($result){
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                window.location.href = '../../pages/achievements/index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal dihapus');
                window.location.href = '../../pages/achievements/index.php';
            </script>
        ";
    }
?>