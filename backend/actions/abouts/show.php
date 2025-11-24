<?php
    if(!isset($_GET['id'])){
        echo "
            <script>
                alert('Tidak bisa memilih ID ini');
                window.location.href = '../../pages/abouts/index.php';
            </script>
        ";
    }

    $id = $_GET['id'];

    $qSelect = "SELECT * FROM abouts WHERE id = '$id'";
    $result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

    $abouts = $result->fetch_object();
    if(!$abouts){
        echo "Data Tidak Ditemukan";
    }
?>