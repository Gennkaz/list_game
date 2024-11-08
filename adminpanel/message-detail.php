<?php
require "session.php";
include_once "cek-akses.php";
require "../koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM message WHERE id='$id'" );
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Detail</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/stylee.css?version=">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
</head>

<style>
    button a{
        color: white;
        text-decoration: none;
    }
</style>

<body>
    <?php
    require "navbar.php";
    ?>

    <div class="container mt-5">
        <h2>Detail Message</h2>

        <div class="col-12 col-md-6 mb-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="fullname">Fullname</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo $data['fullname']; ?>" autocomplete="off" required>
                </div>
                <div class="mt-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $data['email']; ?>" autocomplete="off" required>
                </div>
                <div class="mt-3">
                    <label for="message">Message</label>
                    <input type="text" name="message" id="message" class="form-control" value="<?php echo $data['message']; ?>" autocomplete="off" required>
                </div>
                <div class="mt-3">
                    <label for="created_at">Created_at</label>
                    <input type="text" name="created_at" id="created_at" class="form-control" value="<?php echo $data['created_at']; ?>" autocomplete="off" required>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-primary" name="kembali"><a href="message.php">Kembali</a></button>
                    <button type="submit" class="btn btn-danger" name="hapus">Delete</button>
                </div>
            </form>

            <?php
            if(isset($_POST['hapus'])){
                    $queryHapus = mysqli_query($conn, "DELETE FROM message WHERE id='$id'");
                    
                    if(!$queryHapus){
                        die("Query Error : " . mysqli_errno($conn) . "-" . mysqli_error($conn));
                    } else {
                        echo "<script>alert('Data berhasil DiHapus!');</script>";
                        ?>
                            <meta http-equiv="refresh" content="2, url=message.php" />
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