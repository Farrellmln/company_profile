<?php
include '../../app.php';

// Pastikan request datang dari form dengan tombol 'tombol'
if (!isset($_POST['tombol'])) {
    echo "
        <script>
            alert('Akses tidak valid. Silakan gunakan form untuk memperbarui data.');
            window.location.href = '../../pages/users/index.php';
        </script>
    ";
    exit;
}

// Pastikan ID ada di URL
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak ditemukan. Tidak dapat melanjutkan pembaruan.');
            window.location.href = '../../pages/users/index.php';
        </script>
    ";
    exit;
}

$id = escapeString($_GET['id']);

// Amankan input dari user
$name = escapeString($_POST['name']);
$email = escapeString($_POST['email']);
$role = escapeString($_POST['role']);
$password = $_POST['password']; // password tidak di-escape dulu karena akan di-hash

// Siapkan query update
if (!empty($password)) {
    // Jika password diisi, hash dulu
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $qUpdate = "UPDATE users SET 
        name = '$name', 
        email = '$email', 
        role = '$role',
        password = '$hashedPassword'
        WHERE id = '$id'";
} else {
    // Password tidak diubah
    $qUpdate = "UPDATE users SET 
        name = '$name', 
        email = '$email', 
        role = '$role'
        WHERE id = '$id'";
}

$result = mysqli_query($connect, $qUpdate);

if ($result) {
    echo "
        <script>
            alert('Data user berhasil diubah');
            window.location.href = '../../pages/users/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data user gagal diubah!');
            window.location.href = '../../pages/users/index.php';
        </script>
    ";
}

exit;
?>
