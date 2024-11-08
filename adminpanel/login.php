<?php
session_start();
require "../koneksi.php";

$login_message = "";

if (isset($_POST['loginbtn'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Ambil hash password dari database berdasarkan username
    $query = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        if (password_verify($password, $data['password'])) {
            if ($data['status'] === 'active') {
                $_SESSION['username'] = $data['username'];
                $_SESSION['users'] = array(
                    'role' => $data['role']
                );
                $_SESSION['login'] = true;
                header('location: index.php');
                exit();
            } else {
                $login_message = "Akun Anda belum diverifikasi oleh admin.";
            }
        } else {
            $login_message = "Password Anda salah.";
        }
    } else {
        $login_message = "Akun tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" type="x-icon" href="../image/stick.png">
    <link rel="stylesheet" href="../css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username" id="username" autocomplete="off" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" id="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <a href="../index.php">Kembali</a>
            </div>

            <button type="submit" class="btn" name="loginbtn">Login</button>

            <div class="register-link">
                <p>Don't Have an Account <a href="register.php">Register</a></p>
            </div>
            <i><?php if (!empty($login_message)): ?>
                    <p><?php echo $login_message; ?></p>
                <?php endif; ?>
            </i> <br>
        </form>
    </div>
</body>

</html>