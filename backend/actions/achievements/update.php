<?php
    include '../../app.php';
    include './show.php';

    // cek form yang dikirm apakah dengan name ="tombol" kalau berhasil iya dan berhasil, lanjut
    if(isset($_POST['tombol'])){
        // escapeString() : untuk menghindari inputan anomali dari user
        $author = escapeString($_POST['author']);
        $date = escapeString($_POST['date']);
        $title = escapeString($_POST['title']);
        $description = escapeString($_POST['description']);

        $imageNew = $achievements->image;
        $storages = "../../../storages/achievements/";

        // cek apakah user mengupload gambar baru 
        if(!empty($_FILES['image']['tmp_name'])){
            $imageOld = $_FILES['image']['tmp_name'];
            $imageNew = time() . '.png';

            // hapus gambar lama jika if ada
            if(!empty($achievements->image) && file_exists($storages . $achievements->image)){
                unlink($storages . $achievements->image);
            }

            // simpam gambar baru
            move_uploaded_file($imageOld, $storages . $imageNew);
        }

        $qUpdate = "UPDATE achievements SET author='$author', date='$date', title='$title', description='$description', image='$imageNew' WHERE id='$achievements->id'";

        $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
        if($result){
            echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href = '../../pages/achievements/index.php';
                </script>
            ";
        }else{
            echo "
                    <script>
                        alert('Data gagal diubah');
                        window.location.href = '../../pages/achievements/edit.php';
                    </script>
                ";
        }     
    }
?>