<?php
require "session.php";
include_once "cek-akses.php";
require "../koneksi.php";

$more = mysqli_query($conn, "SELECT * FROM more WHERE is_deleted = 0");
$jumlahMore = mysqli_num_rows($more);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More</title>
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
                    More
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <h3>Tambah List Game</h3> 

            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" placeholder="Input nama game" required>
                </div>
                <div class="mt-2">
                    <label for="unduhan">Total Unduhan</label>
                    <input type="text" class="form-control" name="unduhan" autocomplete="off" required>
                </div>
                <div class="mt-2">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" name="genre" autocomplete="off" required>
                </div>
                <div class="mt-2">
                    <label for="rilis">Rilis</label>
                    <input type="date" class="form-control" name="rilis" autocomplete="off" required>
                </div>
                <div class="mt-2">
                    <label for="link">Link Download</label>
                    <input type="text" class="form-control" name="link" autocomplete="off" required>
                </div>
                <div class="mt-2">
                    <label for="image">Gambar</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn btn-dark mt-3" name="simpan">Simpan</button>
                </div>
            </form>

            <!-- Nambah List Game -->
            <?php
            if (isset($_POST['simpan'])) {
                $nama = $_POST['nama'];
                $unduhan = $_POST['unduhan'];
                $genre = $_POST['genre'];
                $rilis = $_POST['rilis'];
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

                        $query = mysqli_query($conn, "INSERT INTO more (nama, unduhan, genre, rilis, link, image) VALUES ('$nama', '$unduhan', '$genre', '$rilis', '$link', '$new_name')");

                        if (!$query) {
                            die("Query Error : " . mysqli_errno($conn) . "-" . mysqli_error($conn));
                        } else {
                            echo "<script>alert('Data berhasil Ditambahkan!');</script>";
                            ?>
                                <meta http-equiv="refresh" content="2, url=more.php" />
                            <?php
                        }
                    } else {
                        echo "<script>alert('Ekstensi gambar hanya bisa png, jpg dan jpeg!');</script>";
                    }
                } else {
                    $query = mysqli_query($conn, "INSERT INTO more (nama, unduhan, genre, rilis, link) VALUES ('$nama', '$unduhan', '$genre', '$rilis', '$link')");

                    if (!$query) {
                        die("Query Error : " . mysqli_errno($conn) . "-" . mysqli_error($conn));
                    } else {
                        echo "<script>alert('Data berhasil Ditambahkan!');</script>";
                        ?>
                            <meta http-equiv="refresh" content="2, url=more.php" />
                        <?php
                    }
                }
            }
            ?>
        </div>

        <div class="mt-3">
            <h2>List Game Halaman More</h2>
            <a href="more-restore.php" class="btn btn-primary" style="margin-left: 80%;">View Deleted Data</a>

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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlahMore == 0) {
                        ?>
                            <tr>
                                <td colspan="7" class="text-center">List Game lainnya Tidak Tersedia!</td>
                            </tr>
                            <?php
                        } else {
                            $jumlah = 1;
                            while ($data = mysqli_fetch_array($more)) {
                            ?>
                                <tr>
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['unduhan'] ?></td>
                                    <td><?php echo $data['genre'] ?></td>
                                    <td><?php echo $data['rilis']; ?></td>
                                    <td><?php echo $data['link']; ?></td>
                                    <td>
                                        <a href="more-detail.php?id=<?php echo $data['id']; ?>"
                                            class="btn btn-info"><i class="fas fa-search"></i></a>
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