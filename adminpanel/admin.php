<?php
require "session.php";
include_once "cek-akses.php";
require "../koneksi.php";

$admin = mysqli_query($conn, "SELECT * FROM admin");
$count = mysqli_num_rows($admin);


$verification_message = "";
$message = "!";

if (isset($_POST['verifybtn'])) {
    $username_to_verify = $_POST['username_to_verify'];

    $update_query = $conn->prepare("UPDATE admin SET status = 'active' WHERE username = ?");
    $update_query->bind_param("s", $username_to_verify);

    if ($update_query->execute()) {
        $verification_message = "Akun berhasil diverifikasi.";
?>
        <meta http-equiv="refresh" content="2, url=admin.php" />
<?php
    } else {
        $verification_message = "Gagal memverifikasi akun. Silakan coba lagi.";
    }
}

// Ambil daftar akun yang belum diverifikasi
$select_query = $conn->prepare("SELECT username, fullname FROM admin WHERE status = 'unactive'");
$select_query->execute();
$result = $select_query->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/stylee.css?version=">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <?php
    require "navbar.php";
    ?>

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i> Home
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Admin
                </li>
            </ol>
        </nav>

        <div class="mt-3">
            <h2>Verifikasi Akun</h2>

            <?php
            if (!empty($verification_message)) {
                echo "<p>$verification_message</p>";
            }

            if ($result->num_rows > 0) {
            ?>
                <div class="table-responsive mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                                    <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="username_to_verify" value="<?php echo htmlspecialchars($row['username']); ?>">
                                            <button type="submit" name="verifybtn" style="background-color: cyan;">Verifikasi</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" class="text-center">Data yang harus diverifikasi tidak ada!</td>
                        </tr>
                    </tbody>
                </table>
            <?php
            }
            ?>
        </div>

        <div class="mt-3">
            <h2>List Admin dan User</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($count == 0) {
                        ?>
                            <tr>
                                <td colspan="5" class="text-center">Data admin dan user yang tersedia!</td>
                            </tr>
                            <?php
                        } else {
                            $jumlah = 1;
                            while ($data = mysqli_fetch_assoc($admin)) {
                            ?>
                                <tr>
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['role'] ?></td>
                                    <td><?php echo $data['status'] ?></td>
                                    <td>
                                        <a href="admin-detail.php?id=<?php echo $data['id']; ?>"
                                            class="btn btn-info"><i class="fas fa-search"></i></a>
                                    </td>
                                    <td style="color: red;">
                                        <?php
                                        if ($data['status'] === 'unactive') {
                                            echo $message;
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                                $jumlah++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="../bootstrap/js/bootstrap.bundle.min.js"> </script>
    <script src="../fontawesome/js/all.min.js"> </script>
</body>

</html>