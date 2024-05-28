<?php
session_start();
require('mysqlbgln.php');

if (!isset($_SESSION['username'])) {
    header("Location: giris.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['duzenle'])) {
    $siparis_id = $_POST['siparis_id'];

    // Sipariş bilgilerini getirir
    $sql = "SELECT * FROM siparisler WHERE siparis_id='$siparis_id'";
    $cevap = mysqli_query($baglanti, $sql);

    if (!$cevap) {
        echo '<br>Hata: ' . mysqli_error($baglanti);
    } else {
        $row = mysqli_fetch_assoc($cevap);
    }
} else {
    echo "Geçersiz istek.";
    exit;
}

mysqli_close($baglanti);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Düzenle</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">İlboğa İnşaat</a>
    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Anasayfa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="siparislistem.php">Siparişlerim</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cikisyap.php">Çıkış Yap</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <h2>Sipariş Düzenle</h2>
    <form method="post" action="siparisguncel.php">
        <input type="hidden" name="siparis_id" value="<?php echo $row['siparis_id']; ?>">
        <div class="form-group">
            <label for="material">Malzeme Adı:</label>
            <input type="text" class="form-control" id="material" name="material" value="<?php echo $row['malzeme_ad']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="quantity">Miktar (Ton):</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row['malzeme_ton']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>