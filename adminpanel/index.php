<?php
require "session.php";
include_once "cek-akses.php";
require "../koneksi.php";

$more = mysqli_query($conn, "SELECT * FROM more WHERE is_deleted='0'");
$more1 = mysqli_num_rows($more);

$top1 = mysqli_query($conn, "SELECT * FROM top1");
$top = mysqli_num_rows($top1);

$top2 = mysqli_query($conn, "SELECT * FROM top2");
$topp = mysqli_num_rows($top2);

$message = mysqli_query($conn, "SELECT * FROM message");
$mess = mysqli_num_rows($message);

$admin = mysqli_query($conn, "SELECT * FROM admin");
$min = mysqli_fetch_array($admin);

$username = isset($_SESSION['username']) ? addslashes($_SESSION['username']) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/stylee.css?version=">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
</head>

<style>
    .kotak {
        border: solid;
    }

    .sumary-top {
        background-color: #0a6b4a;
        border-radius: 15px;
    }

    .sumary-top1 {
        background-color: orange;
        border-radius: 15px;
    }

    .sumary-more {
        background-color: #0a516b;
        border-radius: 15px;
    }

    .sumary-message {
        background-color: red;
        border-radius: 15px;
    }

    .sumary-profile {
        background-color: #808080;
        border-radius: 15px;
    }

    .sumary-admin {
        background-color: #8F00FF;
        border-radius: 15px;
    }

    .no-decoration {
        text-decoration: none;
    }
</style>

<body>

    <script>
        var username = "<?php echo $username; ?>"
        if (!sessionStorage.getItem('welcome')) {
            if (username) {
                alert('Selamat datang ' + username + ' Anda berhasil login');
            } else {
                alert('Selamat datang user')
            }
            sessionStorage.setItem('welcome', true);
        } 
    </script>

    <?php
    require "navbar.php";
    ?>
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i> Home
                </li>
            </ol>
        </nav>
    </div>

    <h2 class="container">Halo <?php echo $_SESSION['username'] ?></h2>
    <h3 class="container">Anda login sebagai <?php echo $_SESSION['users']['role'] ?>
        <?php if ($_SESSION['users']['role'] == 'admin') {
        ?>
            dan anda bisa mengakses semua halaman!
        <?php
        } else {
        ?>
            dan anda hanya bisa mengakses halaman home, message serta profile!
        <?php
        }
        ?>
    </h3>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="sumary-top p-3">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa-solid fa-trophy fa-7x text-black-50"></i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-2">Top 1-5</h3>
                            <p class="fs-4"><?php echo $top ?> Top</p>
                            <p><a href="top1.php" class="text-white no-decoration">Lihat Detail</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="sumary-top1 p-3">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa-solid fa-award fa-7x text-black-50"></i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-2">Top 5-10</h3>
                            <p class="fs-4"><?php echo $topp ?> Top</p>
                            <p><a href="top2.php" class="text-white no-decoration">Lihat Detail</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="sumary-more p-3">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa-solid fa-medal fa-7x text-black-50"></i></i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-2">More</h3>
                            <p class="fs-4"><?php echo $more1 ?> More</p>
                            <p><a href="more.php" class="text-white no-decoration">Lihat Detail</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="sumary-message p-3">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa-solid fa-message fa-7x text-black-50%"></i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-2">Message</h3>
                            <p class="fs-4"><?php echo $mess ?> Message</p>
                            <p><a href="message.php" class="text-white no-decoration">Lihat Detail</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="sumary-profile p-3">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa-solid fa-id-card fa-7x text-black-50%"></i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-2">Profile</h3>
                            <p class="fs-4">1 Profile</p>
                            <p><a href="profile.php" class="text-white no-decoration">Lihat Detail</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="sumary-admin p-3">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa-solid fa-user fa-7x text-black-50%"></i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-2">Admin</h3>
                            <p class="fs-4"><?php echo $admin->num_rows ?> Admin</p>
                            <p><a href="admin.php" class="text-white no-decoration">Lihat Detail</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"> </script>
    <script src="../fontawesome/js/all.min.js"> </script>
</body>

</html>