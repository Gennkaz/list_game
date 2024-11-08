<?php
include "../koneksi.php";
session_start();

$register_message = "";
if (isset($_SESSION["login"])) {
    header("location: index.php");
}

if (isset($_POST['registerbtn'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $role = $_POST['role'];
    $fullname = $_POST['fullname'];
    $alamat = $_POST['alamat'];
    $no_phone = $_POST['no_phone'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $check_query = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $check_query->bind_param("s", $username);
    $check_query->execute();
    $result = $check_query->get_result();

    if ($result->num_rows > 0) {
        $register_message = "Username sudah digunakan. Silakan pilih yang lain.";
    } else {
        // Set status default 'unactive' hingga diverifikasi oleh admin
        $status = 'unactive';

        // Simpan data ke database
        $sql = "INSERT INTO admin (username, password, role, fullname, alamat, no_phone, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $query = $conn->prepare($sql);
        $query->bind_param("sssssss", $username, $hashed_password, $role, $fullname, $alamat, $no_phone, $status);

        if ($query->execute()) {
            $register_message = "Registrasi berhasil! Akun anda akan diverifikasi oleh admin terlebih dahulu.";
        } else {
            $register_message = "Registrasi gagal, silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="shortcut icon" type="x-icon" href="../image/stick.png">
    <link rel="stylesheet" href="../css/login.css?version=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="Fullname" name="fullname" id="fullname" autocomplete="off" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username" id="username" autocomplete="off" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" id="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Alamat" name="alamat" id="alamat" autocomplete="off" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="No_phone" name="no_phone" id="no_phone" autocomplete="off" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <label for="role">Role</label>
                <select name="role" id="role">
                    <option value="users">Users</option>
                </select>
            </div>
            <div class="remember-forgot">
                <a href="../index.php">Kembali</a>
            </div>

            <button type="submit" class="btn" name="registerbtn">Register</button>

            <div class="register-link">
                <p>Have an Account? <a href="login.php">Login</a></p>
            </div>
            <i><?php if (!empty($register_message)): ?>
                    <p><?php echo $register_message; ?></p>
                <?php endif; ?>
            </i> <br>
        </form>
    </div>
</body>

</html>