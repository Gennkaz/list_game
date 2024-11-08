<?php
require "session.php";
include_once "cek-akses.php";
require "../koneksi.php";

$username = $_SESSION['username'];
$minn = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
$data = mysqli_fetch_array($minn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/stylee.css?version=">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
</head>

<style>
    form{
        width: 50%;
    }
</style>

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
                    Profile
                </li>
            </ol>
        </nav>

        <div class="mt-3">
            <h2>My Profile</h2>

            <div class="mt-5">
                <form action="">
                    <label for="fullname" class="form-label">Fullname</label>
                    <input type="text" class="form-control mb-3" value="<?php echo $data['fullname']?>">

                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control mb-3" value="<?php echo $_SESSION['username']?>">

                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control mb-3" value="<?php echo $data['alamat']?>">

                    <label for="no_phone" class="form-label">No_phone</label>
                    <input type="text" class="form-control mb-3" value="<?php echo $data['no_phone']?>">

                    <label for="role" class="form-label">Role</label>
                    <input type="text" class="form-control mb-3" value="<?php echo $data['role']?>">
                </form>
            </div>
        </div>
    </div>


    <script src="../bootstrap/js/bootstrap.bundle.min.js"> </script>
    <script src="../fontawesome/js/all.min.js"> </script>
</body>

</html>