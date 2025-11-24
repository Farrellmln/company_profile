<?php
    if(!isset($_GET['id'])){
        echo "
            <script>
                alert('Tidak bisa memilih ID ini');
                window.location.href = '../../pages/achievements/index.php';
            </script>
        ";
    }

    $id = $_GET['id'];

    $qSelect = "SELECT * FROM achievements WHERE id = '$id'";
    $result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

    $achievements = $result->fetch_object();
    if(!$achievements){
        echo "Data Tidak Ditemukan";
    }
?>