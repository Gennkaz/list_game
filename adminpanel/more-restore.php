<?php
require "session.php";
include "../koneksi.php";
include_once "cek-akses.php";


$query = mysqli_query($conn, "SELECT * FROM more WHERE is_deleted = 1");
$jumlahMore = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restore Data</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/stylee.css?version=">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="mt-3">
            <h2>List Deleted Data</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Total Unduhan</th>
                            <th>Genre</th>
                            <th>Rilis</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlahMore == 0) {
                        ?>
                            <tr>
                                <td colspan="8" class="text-center">List Deleted Data Tidak Tersedia!</td>
                            </tr>
                            <?php
                        } else {
                            $jumlah = 1;
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['unduhan'] ?></td>
                                    <td><?php echo $data['genre'] ?></td>
                                    <td><?php echo $data['rilis']; ?></td>
                                    <td><?php echo $data['link']; ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                            <button type="submit" class="btn btn-success" name="restore">Restore</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                        <button type="submit" class="btn btn-danger" name="hapus">Deleted</button>
                                        </form>
                                    </td>
                                    
                                </tr>
                        <?php
                                $jumlah++;
                            }
                        }
                        ?>
                    </tbody>

                    <?php
                    if(isset($_POST['restore'])){
                        $id = $_POST['id'];
                        $queryRestore = mysqli_query($conn, "UPDATE more SET is_deleted = 0 WHERE id='$id'");
                        
                        if(!$queryRestore){
                            die("Query Error : " . mysqli_errno($conn) . "-" . mysqli_error($conn));
                        } else {
                            echo "<script>alert('Data berhasil direstore!');</script>";
                            ?>
                            <meta http-equiv="refresh" content="2, url=more.php" />
                            <?php
                        }
                    }

                    if(isset($_POST['hapus'])){
                        $id = $_POST['id'];
                        $queryRestore = mysqli_query($conn, "DELETE FROM more WHERE id='$id'");
                        
                        if(!$queryRestore){
                            die("Query Error : " . mysqli_errno($conn) . "-" . mysqli_error($conn));
                        } else {
                            echo "<script>alert('Data berhasil dideleted permanen!');</script>";
                            ?>
                            <meta http-equiv="refresh" content="2, url=more.php" />
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <a href="more.php" style="color: black;">Kembali</a>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"> </script>
    <script src="../fontawesome/js/all.min.js"> </script>
</body>

</html>