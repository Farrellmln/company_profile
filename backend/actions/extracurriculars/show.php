<?php
    if(!isset($_GET['id'])){
        echo "
            <script>
                alert('Tidak bisa memilih ID ini');
                window.location.href = '../../pages/extracurriculars/index.php';
            </script>
        ";
    }

    $id = $_GET['id'];

    $qSelect = "SELECT * FROM extracurriculars WHERE id = '$id'";
    $result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

    $extracurriculars = $result->fetch_object();
    if(!$extracurriculars){
        echo "Data Tidak Ditemukan";
    }
?>