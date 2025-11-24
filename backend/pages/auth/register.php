<?php
session_start();

if (isset($_SESSION['email'])) {
    echo "
      <script>
        alert('Anda harus logout dahulu');
        window.location.href = '../dashboard/index.php';
      </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrasi Akun PP Farrell</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet" />
    <link rel="icon" href="../../../storages/profile/frl.jpg" type="image/x-icon" />
    <style>
        /* Reset dan font */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #e6eff9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            /* Lebarkan maksimal card */
            padding: 20px;
        }

        .login-box {
            background-color: #fff;
            border-radius: 12px;
            padding: 40px 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin-bottom: 8px;
            font-weight: 600;
            color: #222;
        }

        p {
            margin-top: 0;
            margin-bottom: 25px;
            color: #666;
            font-size: 14px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            font-size: 14px;
            display: block;
            margin-bottom: 6px;
            color: #444;
        }

        input[type='text'],
        input[type='email'],
        input[type='password'],
        /* *********************************** */
        /* CSS baru untuk elemen SELECT */
        select {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: border-color 0.3s ease;
            /* Menghapus tampilan default browser pada select untuk konsistensi */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%20viewBox%3D%220%200%20292.4%20292.4%22%3E%3Cpath%20fill%3D%22%23444%22%20d%3D%22M287%20197.35l-14.8-14.8c-2.7-2.7-7-2.7-9.7%200L146.2%20259.95l-116.3-116.3c-2.7-2.7-7-2.7-9.7%200l-14.8%2014.8c-2.7%202.7-2.7%207%200%209.7l130.6%20130.6c1.3%201.3%203%202%204.8%202s3.5-.7%204.8-2l130.6-130.6c2.7-2.7%202.7-7%200-9.7z%22%2F%3E%3C%2Fsvg%3E');
            background-repeat: no-repeat;
            background-position: right 10px top 50%;
            background-size: 10px auto;
        }

        input[type='text']:focus,
        input[type='email']:focus,
        input[type='password']:focus,
        select:focus {
            /* Tambahkan select di sini agar ada efek focus yang sama */
            outline: none;
            border-color: #4a76f0;
        }

        /* *********************************** */


        .sign-in-button {
            width: 100%;
            padding: 14px 0;
            border: none;
            background-color: #4a76f0;
            color: white;
            font-weight: 600;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .sign-in-button:hover {
            background-color: #355bd9;
        }

        .new-user {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .new-user a {
            color: #4a76f0;
            text-decoration: none;
            font-weight: 600;
        }

        .new-user a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h1>Registrasi</h1>
            <p>Silakan buat akun baru Anda</p>

            <form action="../../actions/auth/register_action.php" method="POST">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Masukkan nama Anda"
                        required />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Masukkan email"
                        required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required />
                </div>

                <div class="form-group">
                    <label for="role">Pilih Role</label>
                    <select id="role" name="role" required>
                        <option value="staf">Staf</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <button type="submit" class="sign-in-button">Daftar</button>
            </form>

            <div class="new-user">
                Sudah punya akun? <a href="login.php">Masuk</a>
            </div>
        </div>
    </div>
</body>

</html>