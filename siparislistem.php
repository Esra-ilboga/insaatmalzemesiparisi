<?php
session_start();
require('mysqlbgln.php');

if (!isset($_SESSION['username'])) {
    header("Location: giris.php");
    exit;
}

$username = $_SESSION['username'];

// Siparişleri getirmeyi sağlar
$sql = "SELECT siparis_id, malzeme_ad, malzeme_ton 
        FROM siparisler s 
        INNER JOIN kisiler k ON s.kisi_id = k.kisi_id 
        WHERE k.kisi_ad = '$username'";
$cevap = mysqli_query($baglanti, $sql);

if (!$cevap) {
    echo '<br>Hata:' . mysqli_error($baglanti);
}

mysqli_close($baglanti);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siparişlerim</title>
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
    <h2>Siparişlerim</h2>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Malzeme Adı</th>
            <th>Miktar (Ton)</th>
            <th>İşlemler</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($cevap)) {
            echo "<tr>";
            echo "<td>" . $row['siparis_id'] . "</td>";
            echo "<td>" . $row['malzeme_ad'] . "</td>";
            echo "<td>" . $row['malzeme_ton'] . "</td>";
            echo "<td>
                    <form method='post' action='siparisduzenle.php'>
                        <input type='hidden' name='siparis_id' value='" . $row['siparis_id'] . "'>
                        <button type='submit' class='btn btn-primary btn-sm' name='duzenle'>Düzenle</button>
                    </form>
                    <form method='post' action='siparisil.php'>
                        <input type='hidden' name='siparis_id' value='" . $row['siparis_id'] . "'>
                        <button type='submit' name='sil' class='btn btn-danger btn-sm mt-2'>Sil</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>