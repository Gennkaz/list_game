<?php
require "session.php";
include_once "cek-akses.php";
require "../koneksi.php";

$message = mysqli_query($conn, "SELECT * FROM message");
$mess = mysqli_num_rows($message);
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
                    Message
                </li>
            </ol>
        </nav>

        <div class="mt-3">
            <h2>List Message</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($mess == 0) {
                        ?>
                            <tr>
                                <td colspan="7" class="text-center">List Game lainnya Tidak Tersedia!</td>
                            </tr>
                            <?php
                        } else {
                            $jumlah = 1;
                            while ($data = mysqli_fetch_array($message)) {
                            ?>
                                <tr>
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $data['fullname']; ?></td>
                                    <td><?php echo $data['email'] ?></td>
                                    <td><?php echo $data['message'] ?></td>
                                    <td><?php echo $data['created_at']; ?></td>
                                    <td>
                                        <a href="message-detail.php?id=<?php echo $data['id']; ?>"
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