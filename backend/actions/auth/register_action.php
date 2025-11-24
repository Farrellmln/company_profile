<?php
    include '../../app.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = htmlspecialchars($_POST['name']); // sesuai dengan form <input name="name">
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = isset($_POST['role']) ? htmlspecialchars($_POST['role']) : 'staf'; 

        // 1. Cek apakah email sudah terdaftar
        $qCheckEmail = "SELECT email FROM users WHERE email = '$email'";
        $resultCheck = mysqli_query($connect, $qCheckEmail);

        if(mysqli_num_rows($resultCheck) > 0) {
            echo "
            <script>
                alert('Email sudah terdaftar. Silahkan gunakan email lain.');
                window.location.href = '../../pages/auth/register.php';
            </script>
            ";
        } else {
            // 2. Insert user baru (fix email_verified_at & remember_token biar gak error)
            $qInsert = "INSERT INTO users(name, email, password, role, email_verified_at, remember_token, created_at, updated_at) 
            VALUES ('$name', '$email', '$password', '$role', NULL, '', NOW(), NOW())";


            $result = mysqli_query($connect, $qInsert) or die(mysqli_error($connect));

            if($result){
                echo "
                <script>
                    alert('Anda berhasil register. Silahkan login');
                    window.location.href = '../../pages/auth/login.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Register gagal');
                    window.location.href = '../../pages/auth/register.php';
                </script>
                ";
            }
        }
    }
?>
