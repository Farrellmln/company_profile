<?php
include '../../app.php'; // sesuaikan path ke app.php (3 tingkat ke atas dari actions/teachers)

// cek apakah ada id dari URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil data guru untuk hapus gambar juga
    $query = "SELECT teachers_photo FROM teachers WHERE id = $id";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $teacher = mysqli_fetch_assoc($result);

        // hapus foto lama kalau ada
        if (!empty($teacher['teachers_photo'])) {
            $filePath = "../../../storages/teachers/" . $teacher['teachers_photo'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // hapus data dari tabel
        $delete = "DELETE FROM teachers WHERE id = $id";
        if (mysqli_query($connect, $delete)) {
            echo "<script>
                    alert('Data guru berhasil dihapus!');
                    window.location.href='../../pages/teachers/index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data guru gagal dihapus!');
                    window.location.href='../../pages/teachers/index.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Data guru tidak ditemukan!');
                window.location.href='../../pages/teachers/index.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID tidak valid!');
            window.location.href='../../pages/teachers/index.php';
          </script>";
}
