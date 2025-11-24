<?php
    include '../../app.php';
    include 'show.php';

    // hapus data 
    $qDelete = "DELETE FROM user_activities WHERE id= '$user_activities->id'";
    $result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));
    if($result){
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                window.location.href = '../../pages/user_activities/index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal dihapus');
                window.location.href = '../../pages/user_activities/index.php';
            </script>
        ";
    }
?>