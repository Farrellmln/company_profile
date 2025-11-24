<?php
include '../../app.php';

// Cek form yang dikirim via tombol "tombol"
if(isset($_POST['tombol'])){

    // Escape input dari user agar aman
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $password = escapeString($_POST['password']);
    $role = escapeString($_POST['role']);

    // Hash password supaya aman
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah email sudah digunakan
    $checkEmail = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($checkEmail) > 0){
        echo "
            <script>
                alert('Email sudah terdaftar!');
                window.location.href='../../pages/users/create.php';
            </script>
        ";
        exit;
    }

    // Insert data user ke database, tambahkan updated_at
    $qInsert = "INSERT INTO users(name, email, password, role, created_at, updated_at) 
                VALUES ('$name', '$email', '$passwordHash', '$role', NOW(), NOW())";

    if(mysqli_query($connect, $qInsert)){
        echo "
            <script>
                alert('User berhasil dibuat!');
                window.location.href='../../pages/users/index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('User gagal dibuat!');
                window.location.href='../../pages/users/create.php';
            </script>
        ";
    }
} else {
    // Kalau diakses bukan dari form
    echo "
        <script>
            alert('Akses tidak valid');
            window.location.href='../../pages/users/index.php';
        </script>
    ";
}
?>
