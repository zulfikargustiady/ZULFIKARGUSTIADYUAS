
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d10040210.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Perpus</title>
    <link rel="stylesheet" href="dist/css/utama.css">
    <link rel="icon" href="img/buku-1.jpg" type="image/ico">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="utama.php">Perpus</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Perpus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" aria-current="page" href="#hero">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="login.php" class="login-button">Login</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <section id="hero">
        <div class="container">
            <div class="info">
                <h1>Selamat Datang di Perpus</h1>
                <p>Temukan buku-buku menarik dan mari menjelajahi koleksi buku kami yang beragam.</p>
                <a href="login.php" class="lesgow-button">Lets Go</a>
            </div>
        </div>
    </section>

    <div class="heading" id="about">
        <h1>About Us</h1>
    </div>
    <div class="container container-about">
        <section class="about">
            <div class="about-image">
                <img src="img/Book.jpg">
            </div>
            <div class="about-content">
                <p>Di sini, kami menghadirkan pengalaman yang berbeda dari perpustakaan konvensional. Meskipun kami
                    berbasis online, tujuan kami adalah untuk mempromosikan pengalaman membaca yang autentik di dunia
                    offline. Dengan mengunjungi situs web kami, Anda telah memasuki pintu gerbang ke dunia nyata dari
                    pengalaman membaca yang kaya dan memuaskan. Kami mengundang Anda untuk datang dan menikmati kegiatan
                    membaca di perpustakaan kami, di mana setiap halaman buku adalah petualangan baru yang menunggu
                    untuk ditemukan..</p>
            </div>
        </section>
    </div>
    <div class="container container-contact" id="contact">
        <div class="left-column">
            <div class="contact">
                <form method="POST">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" required>
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>
                    <label for="message">Pesan:</label>
                    <textarea name="message" required></textarea>
                    <button class="btn-send" type="submit">Send</button>
                </form>
            </div>
        </div>
        <div class="right-column">
            <div class="content-contact">
                <h1>Kontak Kita</h1>
                <p>
                    Selamat datang di layanan pelanggan
                    kami! Kami senang dapat membantu Anda. Jika Anda memiliki pertanyaan, masukan, atau memerlukan
                    bantuan lebih lanjut,
                    jangan ragu untuk menghubungi kami.
                </p>
                <h2>Contact Information</h2>
                <p>Email: perpus@gmail.com</p>
                <p>No.Whatsapp: 0812-9876-3456</p>
                <p>Alamat: Jln. Bandung No.123</p>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #7fa1ff;">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
            <div class="col-md-12">
                <p style="text-align: center;">©Copyright by 21552011124_Kelompok5_TIF221PA_UASWEB1</p>
            </div>
        </footer>
    </div>
    <script src="bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>

</html>