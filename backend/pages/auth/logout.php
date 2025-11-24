<?php
include '../../app.php';
session_start();

// ==========================================================
// !!! MENCATAT LOG AKTIVITAS LOGOUT !!!
// ==========================================================
if (isset($_SESSION['user_id'])) {
    $user_id = mysqli_real_escape_string($connect, $_SESSION['user_id']);
    $activity = 'logout';
    $ip_address = mysqli_real_escape_string($connect, $_SERVER['REMOTE_ADDR']);
    $user_agent = mysqli_real_escape_string($connect, $_SERVER['HTTP_USER_AGENT']);
    $table_name = '';
    $record_id = 0;
    $description = 'User berhasil logout';

    // Insert log aktivitas logout
    $insert_log_query = "
        INSERT INTO user_activities 
            (user_id, activity, ip_address, user_agent, login_at, logout_at, created_at, table_name, record_id, description)
        VALUES 
            ('$user_id', '$activity', '$ip_address', '$user_agent', NULL, NOW(), NOW(), '$table_name', '$record_id', '$description')
    ";

    $insert_log_result = mysqli_query($connect, $insert_log_query);

    if (!$insert_log_result) {
        error_log('Gagal mencatat log logout: ' . mysqli_error($connect));
    }
}

// ==========================================================
// HAPUS SESSION
// ==========================================================
session_unset();
session_destroy();

// Redirect ke halaman login pakai alert (tanpa ?status=)
echo "
    <script>
        alert('Anda berhasil logout');
        window.location.href = '../../pages/auth/login.php';
    </script>
";
exit();
?>
