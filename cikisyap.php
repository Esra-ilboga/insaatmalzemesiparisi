<?php
session_start();

// Tüm oturum değişkenlerini temizler
$_SESSION = array();

// Oturumu sonlandırır
session_destroy();

// Kullanıcıyı giriş sayfasına yönlendirir
header("Location: giris.php");
exit;
?>
