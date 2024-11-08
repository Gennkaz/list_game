<?php
require "session.php";
include_once "cek-akses.php";
require "../koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM top1 WHERE id='$id'");
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top1 Detail</title>
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

    button a{
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
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data['nama']; ?>" autocomplete="off" required>
                </div>
                <div>
                    <label for="unduhan">Unduhan</label>
                    <input type="text" name="unduhan" id="unduhan" class="form-control" value="<?php echo $data['unduhan']; ?>" autocomplete="off" required>
                </div>
                <div>
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" id="genre" class="form-control" value="<?php echo $data['genre']; ?>" autocomplete="off" required>
                </div>
                <div>
                    <label for="rilis">Rilis</label>
                    <input type="text" name="rilis" id="rilis" class="form-control" value="<?php echo $data['rilis']; ?>" autocomplete="off" required>
                </div>
                <div>
                    <label for="rating">Rating</label>
                    <input type="text" name="rating" id="rating" class="form-control" value="<?php echo $data['rating']; ?>" autocomplete="off" required>
                </div>
                <div>
                    <label for="link">Link</label>
                    <input type="text" name="link" id="link" class="form-control" value="<?php echo $data['link']; ?>" autocomplete="off" required>
                </div>
                <div>
                    <label for="currentFoto">Gambar</label>
                    <img src="../image/<?php echo $data['image'] ?>" alt="" width="300px;">
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                    <button type="submit" class="btn btn-primary" name="kembali"><a href="top1.php">Kembali</a></button>
                    <button type="submit" class="btn btn-danger" name="hapus">Delete</button>
                </div>
            </form>

            <?php
                if(isset($_POST['simpan'])){
                    $nama = $_POST['nama'];
                    $unduhan = $_POST['unduhan'];
                    $genre = $_POST['genre'];
                    $rilis = $_POST['rilis'];
                    $rating = $_POST['rating'];
                    $link = $_POST['link'];
                    $image = $_FILES['image']['name'];

                    if ($image != "") {
                        $ekstensi_berhasil = array('png', 'jpg', 'jpeg');
                        $new = explode('.', $image);
                        $ekstensi = strtolower(end($new));
                        $file_tmp = $_FILES['image']['tmp_name'];
                        $angka_acak = rand(1, 999);
                        $new_name = $angka_acak . '-' . $image;
    
                        if (in_array($ekstensi, $ekstensi_berhasil) === true) {
                            move_uploaded_file($file_tmp, '../image/' . $new_name);
    
                            $query = mysqli_query($conn, "UPDATE top1 SET nama='$nama', unduhan='$unduhan', genre='$genre', rilis='$rilis', rating='$rating', link='$link', image='$new_name' WHERE id='$id'");
    
                            if (!$query) {
                                die("Query Error : " . mysqli_errno($conn) . "-" . mysqli_error($conn));
                            } else {
                                echo "<script>alert('Data berhasil DiUpdate!');</script>";
                                ?>
                                    <meta http-equiv="refresh" content="2, url=top1.php" />
                                <?php
                            }
                        } else {
                            echo "<script>alert('Ekstensi gambar hanya bisa png, jpg dan jpeg!');</script>";
                        }
                    } else {
                        $query = mysqli_query($conn, "UPDATE top1 SET nama='$nama', unduhan='$unduhan', genre='$genre', rilis='$rilis', rating='$rating', link='$link' WHERE id='$id'");
    
                            if (!$query) {
                                die("Query Error : " . mysqli_errno($conn) . "-" . mysqli_error($conn));
                            } else {
                                echo "<script>alert('Data berhasil DiUpdate!');</script>";
                                ?>
                                    <meta http-equiv="refresh" content="2, url=top1.php" />
                                <?php
                            }
                    }
                }

                if(isset($_POST['hapus'])){
                    $queryHapus = mysqli_query($conn, "DELETE FROM top1 WHERE id='$id'");
                    
                    if(!$queryHapus){
                        die("Query Error : " . mysqli_errno($conn) . "-" . mysqli_error($conn));
                    } else {
                        echo "<script>alert('Data berhasil DiHapus!');</script>";
                        ?>
                            <meta http-equiv="refresh" content="2, url=top1.php" />
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