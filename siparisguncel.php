<?php
session_start();
require('mysqlbgln.php');

if (!isset($_SESSION['username'])) {
    header("Location: giris.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $siparis_id = $_POST['siparis_id'];
    $quantity = $_POST['quantity'];

    // Siparişin güncellemesini sağlar
    $sql = "UPDATE siparisler SET malzeme_ton='$quantity' WHERE siparis_id='$siparis_id'";
    $cevap = mysqli_query($baglanti, $sql);

    if (!$cevap) {
        echo '<br>Hata: ' . mysqli_error($baglanti);
    } else {
        echo "Sipariş başarıyla güncellendi!";
    }

    mysqli_close($baglanti);
    header("Location: siparislistem.php");
    exit;
} else {
    echo "Geçersiz istek.";
    exit;
}
?>
