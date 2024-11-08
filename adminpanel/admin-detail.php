<?php
require "session.php";
include_once "cek-akses.php";
require "../koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM admin WHERE id='$id'");
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Detail</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/stylee.css?version=">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
</head>

<style>
    form div {
        margin-bottom: 10px;
    }

    button a {
        text-decoration: none;
        color: white;
    }
</style>

<body>
    <?php
    require "navbar.php";
    ?>

    <div class="container mt-5">
        <h2>Detail Game</h2>

        <div class="col-12 col-md-6 mb-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo $data['username']; ?>" autocomplete="off" required>
                </div>
                <div>
                    <label for="role" class="mt-3">Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="<?php echo $data['role']; ?>"><?php echo $data['role']; ?></option>
                        <option value="admin">admin</option>
                        <option value="users">users</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="mt-3">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="<?php echo $data['status']; ?>"><?php echo $data['status']; ?></option>
                        <option value="active">active</option>
                        <option value="unactive">unactive</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                    <button type="submit" class="btn btn-primary" name="kembali"><a href="admin.php">Kembali</a></button>
                    <button type="submit" class="btn btn-danger" name="hapus">Delete</button>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan'])) {
                $username = $_POST['username'];
                $role = $_POST['role'];
                $status = $_POST['status'];

                $sql = mysqli_query($conn, "UPDATE admin SET username='$username', role='$role', status='$status' WHERE id='$id'");

                if (!$sql) {
                    die("Query Error : " . mysqli_errno($conn) . "-" . mysqli_error($conn));
                } else {
            ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Data admin berhasil diperbarui!
                    </div>

                    <meta http-equiv="refresh" content="1, url=admin.php" />
                <?php
                }
            }

            if (isset($_POST['hapus'])) {
                $queryHapus = mysqli_query($conn, "DELETE FROM admin WHERE id='$id'");

                if (!$queryHapus) {
                    die("Query Error : " . mysqli_errno($conn) . "-" . mysqli_error($conn));
                } else {
                ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Data admin berhasil dihapus!
                    </div>

                    <meta http-equiv="refresh" content="1, url=admin.php" />
            <?php

                }
            }
            ?>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"> </script>
    <script src="../fontawesome/js/all.min.js"> </script>
</body>

</html>