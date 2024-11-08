<?php
require "koneksi.php";

$more = mysqli_query($conn, "SELECT * FROM more WHERE is_deleted = 0");
$dataMore = mysqli_num_rows($more);

$top = mysqli_query($conn, "SELECT * FROM top1 LIMIT 5");
$top1 = mysqli_num_rows($top);

$topp = mysqli_query($conn, "SELECT * FROM top2 LIMIT 5");
$top2 = mysqli_num_rows($topp);

$message = mysqli_query($conn, "SELECT * FROM message LIMIT 2");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statis</title>
    <link rel="shortcut icon" type="x-icon" href="./image/stick.png">
    <link rel="stylesheet" href="./css/style.css?version=1.1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
</head>

<body>
    <header class="header">
        <a href="#" class="logo">KazzWeb</a>

        <label for="" class="icons">
            <i class="fa-solid fa-bars"></i>
        </label>

        <nav class="navbar">
            <a href="#home" class="active">Home</a>
            <a href="#game">Game</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
            <a href="#footer">More</a>
            <a href="./adminpanel/login.php">Dashboard</a>
        </nav>
    </header>

    <section class="homepage" id="home">
        <div class="content">
            <h1>10 Game Android Populer Di Tahun 2024</h1>
            <p>Sebagai gamer sejati, sudah layak dan sepantasnya untuk mengikuti perkembangan game yang ada. Tak hanya
                game kesenanganmu sendiri saja, tetapi juga game yang paling populer. Karena jika tidak begitu, bisa
                diartikan kamu ketinggalan zaman. Berikut ini adalah 10 Game android terpopuler di dunia hingga
                sekarang, Tahun 2024.</p>
            <a href="#game">READMORE</a>
        </div>
    </section>

    <div class="game" id="game">
        <h1>GAME</h1>
    </div>

    <section class="atas" id="atas">
        <div class="container">
            <h2>GAME</h2>
            <?php while($list1 = mysqli_fetch_array($top)){ ?>
            <div class="satu" style="background: url(./image/<?php echo $list1['image'] ?>); background-size: cover; background-position: center;">
                <h1><?php echo $list1['nama'] ?></h1>
                <table cellspacing="20" class="table">
                    <tr>
                        <td>Total Unduh</td>
                        <td>: <?php echo $list1['unduhan'] ?></td>
                    </tr>
                    <tr>
                        <td>Genre:</td>
                        <td>: <?php echo $list1['genre'] ?></td>
                    </tr>
                    <tr>
                        <td>Rating</td>
                        <td>: <?php echo $list1['rating'] ?></td>
                    </tr>
                    <tr>
                        <td>Rilis</td>
                        <td>: <?php echo $list1['rilis'] ?></td>
                    </tr>
                </table>

                <a href="<?php echo $list1['link'] ?>" target="_blank"><abbr title="DOWNLOAD"><i
                            class="fa-solid fa-download"></i></abbr></a>
            </div>
            <?php } ?>
        </div>
    </section>

    <section class="bawah">
        <div class="container" style="color: white;">
        <?php while($list2 = mysqli_fetch_array($topp)){ ?>
            <div class="enam" style="background: url(./image/<?php echo $list2['image'] ?>); background-size: cover; background-position: center;">
                <h1><?php echo $list2['nama'] ?></h1>
                <table cellspacing="20">
                    <tr>
                        <td>Total Unduh</td>
                        <td>: <?php echo $list2['unduhan'] ?></td>
                    </tr>
                    <tr>
                        <td>Genre:</td>
                        <td>: <?php echo $list2['genre'] ?></td>
                    </tr>
                    <tr>
                        <td>Rating</td>
                        <td>: <?php echo $list2['rating'] ?></td>
                    </tr>
                    <tr>
                        <td>Rilis</td>
                        <td>: <?php echo $list2['rilis'] ?></td>
                    </tr>
                </table>

                <a href="<?php echo $list2['link'] ?>"><abbr
                        title="DOWNLOAD"><i class="fa-solid fa-download"></i></abbr></a>
            </div>
            <?php } ?>
        </div>
    </section>

    <section class="about" id="about">
        <div class="bot">
            <h2>ABOUT ME</h2>
        </div>
        <div class="tentang">
            <div class="kesatu">
                <h1>KazzWeb ini berisi rekomendasi game populer buat kalian mainkan!</h1>
            </div>
            <div class="kedua">
                <ul>
                    <li><i class="fa-solid fa-dice-d20 fa-2x"></i> &nbsp;PLATFORM YANG DIBUAT UNTUK GAMER</li>
                    <li><i class="fa-solid fa-circle-info fa-2x"></i> &nbsp;MENYAJIKAN INFORMASI GAME YANG AKURAT</li>
                    <li><i class="fa-solid fa-gamepad fa-2x"></i> &nbsp;GAME YANG DIREKOMENDASIKAN TENTUNYA MENYENANGKAN
                    </li>
                    <li><i class="fa-brands fa-fantasy-flight-games fa-2x"></i> &nbsp;TEMPATNYA REKOMENDASI GAME TERBAIK
                    </li>
                    <li><i class="fa-solid fa-spinner fa-2x"></i> &nbsp;LIST GAME DIUPDATE BERDASARKAN NEW ERA</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <div class="contact-me">
            <div class="row-contact">
                <h2>CONTACT US</h2>
                <p>How can we help? Send us a Message if you have problem from My website</p>
            </div>
            <div class="contact-info">
                <div class="row-info">
                    <div class="box">
                        <div class="iconc"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="text">
                            <h3>Addres</h3>
                            <p>Kec. Maja, <br> Kabupaten Majalengka, <br> Jawa Barat</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="iconc"><i class="fa-solid fa-phone"></i></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>085827673827</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="iconc"><i class="fa-solid fa-envelope"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>akaspirdauss@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="row-form">
                    <form action="" method="post">
                        <h2>Send Message</h2>
                        <div class="input-box">
                            <input type="text" name="fullname" autocomplete="off" required="required">
                            <label>Full Name</label>
                        </div>
                        <div class="input-box">
                            <input type="text" name="email" autocomplete="off" required="required">
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <textarea name="message" id="message" autocomplete="off" required="required"></textarea>
                            <label>Type your Message</label>
                        </div>
                        <div class="input-box">
                            <input type="submit" name="kirim" value="SEND">
                        </div>
                    </form>

                    <?php 
                        if(isset($_POST['kirim'])){
                            $fullname = $_POST['fullname'];
                            $email = $_POST['email'];
                            $message = $_POST['message'];

                            $sql = mysqli_query($conn, "INSERT INTO message (fullname, email, message) VALUES ('$fullname', '$email', '$message')");

                            if(!$sql) {
                                die("Query Error : " . mysqli_errno($conn) . "-" . mysqli_error($conn));
                            } else {
                                echo "<script>alert('Message berhasil Dikirimkan, Terimakasih!');</script>";
                                ?>
                                    <meta http-equiv="refresh" content="2, url=index.php" />
                                <?php
                            }
                        }
                    ?>
                </div>

                
                <div class="row-message">
                    <h1>Message Yang telah terkirim!</h1>
                    <div class="bok">
                        <?php while($mess = mysqli_fetch_array($message)){ ?>
                            <div class="bok1">
                                <h2 style="margin-bottom: 5px;"><?php echo $mess['fullname'] ?></h2>
                                <p style="margin-bottom: 5px;"><i><?php echo $mess['email'] ?></i></p>
                                <p><?php echo $mess['message'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="footer" id="footer">
        <div class="promosi">
            <h3>GAME LAINNYA YANG MENURUT MIMIN ASIK BUAT GABUT</h3>
        </div>
        <div class="splide" role="group" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                <?php while($list = mysqli_fetch_array($more)){ ?>
                    <li class="splide__slide">
                        <div class="more" style="background-color: white;">
                            <img src="./image/<?php echo $list['image'] ?>" alt="">
                            <p href="">
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?php echo $list['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Total Unduhan</td>
                                    <td>: <?php echo $list['unduhan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Genre</td>
                                    <td>: <?php echo $list['genre'] ?></td>
                                </tr>
                                <tr>
                                    <td>Rilis</td>
                                    <td>: <?php echo $list['rilis'] ?></td>
                                </tr>
                                <tr>
                                    <td>Download</td>
                                    <td>: <a href="<?php echo $list['link'] ?>">Klik</a></td>
                                </tr>
                            </table>
                            </p>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="footer-dua">
            <div class="footer-content">
                <div class="row-icon">
                    <a href="#" id="ig"><i class="fa-brands fa-instagram fa-2x"></i></a>
                    <a href="#" id="ig"><i class="fa-brands fa-youtube fa-2x"></i></a>
                    <a href="#" id="ig"><i class="fa-brands fa-facebook fa-2x"></i></a>
                    <a href="#" id="ig"><i class="fa-brands fa-whatsapp fa-2x"></i></a>
                </div>
                <div class="row-footer">
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#game">Game</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#more">More</a></li>
                    </ul>
                </div>
                <div class="row-bottom">
                    <p>Copyright &copy; 2024 Designed by <span class="designer">Akas</span></p>
                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"
        integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        var splide = new Splide('.splide', {
            perPage: 3,
            rewind: true,
            height: 365,
        });

        splide.mount();
    </script>
</body>

</html>