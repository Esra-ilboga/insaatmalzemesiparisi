<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4">
                <div class="card bg-light text-dark mb-3">
                    <div class="card-header">
                        <h2 class="card-title h5">Kayıt Ol</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        session_start();

                        // Veritabanı bağlantı dosyasını ekliyoruz
                        include("mysqlbgln.php");

                        // Form verilerini alıyoruz
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            $hashed_password = hash('sha256', $password);

                            // SQL sorgusunu hazırlıyoruz
                            $sql = "INSERT INTO kisiler (kisi_ad, kisi_sifre) VALUES ('$username', '$hashed_password')";

                            // Sorguyu veritabanına gönderiyoruz
                            $cevap = mysqli_query($baglanti, $sql);

                            if (!$cevap) {
                                echo '<br>Hata:' . mysqli_error($baglanti);
                            } else {
                                echo "Kayıt başarıyla eklendi!";
                                
                                // Oturum bilgilerini sakla
                                $_SESSION['username'] = $username;
                                $_SESSION['loggedin'] = true;
                                
                                // Ana sayfaya yönlendir
                                header("Location: index.php");
                                exit;
                            }

                            // Veritabanı bağlantısını kapatıyoruz
                            mysqli_close($baglanti);
                        }
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <label for="username">Kullanıcı Adı:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Şifre:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Kayıt Ol</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
