<?php
session_start();

if (isset($_SESSION['email'])) {
    echo "
      <script>
        alert('anda harus logout dahulu');
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
    <title>Login Admin CP Farrell</title>
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

        input[type='email'],
        input[type='password'] {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input[type='email']:focus,
        input[type='password']:focus {
            outline: none;
            border-color: #4a76f0;
        }

        /* *********************************** */
        /* Hapus CSS terkait .options, .remember-me, .forgot-password */
        /* Karena elemen-elemen ini dihapus dari HTML */
        /* *********************************** */
        /* .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 13px;
      margin-bottom: 25px;
      color: #444;
    }

    .remember-me input[type='checkbox'] {
      margin-right: 6px;
    }

    .forgot-password {
      color: #4a76f0;
      text-decoration: none;
    }

    .forgot-password:hover {
      text-decoration: underline;
    } */

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
            margin-top: 5px;
            /* Tambahkan sedikit margin atas agar tidak terlalu dekat dengan input password */
            margin-bottom: 20px;
            /* Tambahkan margin bawah agar tidak terlalu dekat dengan new-user */
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
            <h1>Login</h1>
            <p>Silakan masuk ke akun Anda</p>

            <form action="../../actions/auth/login_action.php" method="POST">
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
                <button type="submit" class="sign-in-button">Masuk</button>
            </form>
            <div class="new-user">
                Belum Punya Akun? <a href="register.php">Buat akun</a>
            </div>
        </div>
    </div>
</body>

</html>