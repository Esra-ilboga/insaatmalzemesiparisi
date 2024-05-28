<?php
session_start();
require('mysqlbgln.php');

if (!isset($_SESSION['username'])) {
    header("Location: giris.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $malzeme_ad = $_POST['material'];
    $malzeme_ton = $_POST['quantity'];

    // Kullanıcının kisi_id'sini almak için sorgu
    $user_query = "SELECT kisi_id FROM kisiler WHERE kisi_ad='$username'";
    $user_result = mysqli_query($baglanti, $user_query);
    
    if ($user_result) {
        $user_data = mysqli_fetch_assoc($user_result);
        $kisi_id = $user_data['kisi_id'];

        // Siparişi ekleme sorgusu
        $sql = "INSERT INTO siparisler (kisi_id, malzeme_ad, malzeme_ton) VALUES ('$kisi_id', '$malzeme_ad', '$malzeme_ton')";
        $cevap = mysqli_query($baglanti, $sql);

        if (!$cevap) {
            echo '<br>Hata:' . mysqli_error($baglanti);
        } else {
            echo "Sipariş başarıyla eklendi!";
        }
    } else {
        echo '<br>Kullanıcı sorgusunda hata: ' . mysqli_error($baglanti);
    }

    mysqli_close($baglanti);
    header("Location: index.php");
    exit;
}
?>
