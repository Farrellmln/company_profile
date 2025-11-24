<?php
include '../../app.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($connect, htmlspecialchars($_POST['email']));
    $password = htmlspecialchars($_POST['password']);

    // Cek user berdasarkan email
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connect, $query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_object();

        // Verifikasi password
        if (password_verify($password, $row->password)) {

            // Simpan sesi login
            $_SESSION['user_id'] = $row->id;
            $_SESSION['email'] = $row->email;
            $_SESSION['name'] = $row->name;
            $_SESSION['role'] = $row->role;

            // ==============================
            // Catat aktivitas LOGIN
            // ==============================
            $user_id = $row->id;
            $activity = 'login';
            $ip_address = mysqli_real_escape_string($connect, $_SERVER['REMOTE_ADDR']);
            $user_agent = mysqli_real_escape_string($connect, $_SERVER['HTTP_USER_AGENT']);
            $table_name = '';
            $record_id = 0;
            $description = 'User berhasil login';

            $insert_log_query = "
                INSERT INTO user_activities 
                    (user_id, activity, ip_address, user_agent, login_at, logout_at, created_at, table_name, record_id, description)
                VALUES 
                    ('$user_id', '$activity', '$ip_address', '$user_agent', NOW(), NULL, NOW(), '$table_name', '$record_id', '$description')
            ";

            $insert_log_result = mysqli_query($connect, $insert_log_query);

            if (!$insert_log_result) {
                error_log('Gagal mencatat log login: ' . mysqli_error($connect));
            }

            // ==============================
            // Redirect pakai alert JS (tanpa ?status=)
            // ==============================
            echo "
                <script>
                    alert('Anda berhasil login');
                    window.location.href='../../pages/dashboard/index.php';
                </script>
            ";
            exit();

        } else {
            echo "
                <script>
                    alert('Password salah');
                    window.location.href='../../pages/auth/login.php';
                </script>
            ";
            exit();
        }

    } else {
        echo "
            <script>
                alert('Email salah / belum terdaftar');
                window.location.href='../../pages/auth/login.php';
            </script>
        ";
        exit();
    }
}
?>
