<?php
// File: ../../actions/message/mark_read.php

// Pastikan koneksi database sudah ada
include '../../app.php'; 

if (isset($_POST['id'])) {
    // Escape string untuk mencegah SQL Injection
    $messageId = mysqli_real_escape_string($connect, $_POST['id']);
    
    // Query untuk menandai pesan sebagai sudah dibaca (is_read = 1)
    // Cek apakah kolom is_read sudah ada di tabel 'message'.
    $query = "UPDATE message SET is_read = 1 WHERE id = '$messageId' AND is_read = 0";
    
    if (mysqli_query($connect, $query)) {
        http_response_code(200);
        echo "Pesan berhasil ditandai sebagai sudah dibaca.";
    } else {
        http_response_code(500);
        echo "Error: " . mysqli_error($connect);
    }
} else {
    http_response_code(400);
    echo "ID pesan tidak diterima.";
}
?>