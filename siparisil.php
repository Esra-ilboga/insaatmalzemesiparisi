<?php
session_start();
require('mysqlbgln.php');

if (!isset($_SESSION['username'])) {
    header("Location: giris.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sil'])) {
    $siparis_id = $_POST['siparis_id'];

    $sql = "DELETE FROM siparisler WHERE siparis_id='$siparis_id'";
    $cevap = mysqli_query($baglanti, $sql);

    if (!$cevap) {
        echo '<br>Hata: ' . mysqli_error($baglanti);
    } else {
        echo "Sipariş başarıyla silindi!";
    }

    mysqli_close($baglanti);
    header("Location: siparislistem.php");
    exit;
} else {
    echo "Geçersiz sipariş ID.";
}
?>

