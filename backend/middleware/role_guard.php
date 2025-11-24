<?php
// middleware/role_guard.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Pastikan role tersedia
$role = $_SESSION['role'] ?? 'guest';

// Folder yang boleh diakses staf
$allowed_for_staff = [
    'dashboard',
    'achievements',
    'announcements',
    'blogs',
    'extracurriculars',
    'galleries',
    'teachers',
    'testimonials'
];

// Ambil folder saat ini
$current_folder = basename(dirname($_SERVER['PHP_SELF']));

// Jika role staf dan folder tidak diizinkan
if ($role === 'staf' && !in_array($current_folder, $allowed_for_staff)) {
    echo "<script>
        alert('⚠️ Anda tidak memiliki izin untuk mengakses halaman ini.');
        window.location.href = '../dashboard/index.php';
    </script>";
    exit;
}
?>
