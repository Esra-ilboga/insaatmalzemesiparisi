<?php 
session_start(); 
require('mysqlbgln.php'); 

// Oturum temizlemek için (test amaçlı)
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: giris.php");
    exit;
}

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['username']) and isset($_POST['password'])){ 
    $username = $_POST['username'];
    $password = $_POST['password']; 
 
    $password = hash('sha256', $password); 
    $sql = "SELECT * FROM `kisiler` WHERE kisi_ad='$username' and kisi_sifre='$password'"; 
    $cevap = mysqli_query($baglanti, $sql); 
    
    if (!$cevap ){ 
        echo '<br>Hata:' . mysqli_error($baglanti); 
    } 
    
    $say = mysqli_num_rows($cevap); 
    
    if ($say == 1){ 
        $_SESSION['username'] = $username; 
        header("Location: index.php"); 
        exit;
    } else { 
        $mesaj = "<h2 class='text-danger'> Hatalı Kullanıcı adı veya Şifre!</h2>"; 
    } 
} 
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .custom-jumbotron {
      padding: 1rem;
      margin-bottom: 1rem;
      background-color: #3f3f3f; 
      color: #ffffff; 
      border-radius: 0.3rem;
    }
    .custom-jumbotron h2 {
      font-size: 2rem; 
    }
    .custom-jumbotron .lead {
      font-size: 1.2rem; 
    }
  </style>
</head>
<body>
        <div class="container">
            <div class="jumbotron custom-jumbotron">
                <h2 class="display-4">İlboğa İnşaat Web Giriş Ekranı</h2>
                <p class="lead">Sitemiz için zaten bir hesabınız varsa aşağıdaki formu doldurup anasayfaya ve şifrelerinize erişebilirsiniz.
                    hesabınız yoksa kayıt ol butonuna tıklayıp kayıt olacağınız ekrana erişebilirsiniz.
                    Kayıt olduktan sonra aynı şekilde anasayfa ve siparişlere erişebiliyor olacaksınız. 
                </p>
                <hr class="my-4">
                <p></br>Bizi tercih ettiğiniz için teşekkürler.</p>
            </div>
        </div>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4">
                <div class="card bg-light text-dark mb-3">
                    <div class="card-header">
                        <h2 class="card-title h5">Giriş Yap</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <?php if(isset($mesaj)) { echo $mesaj; } ?>
                            <div class="form-group">
                                <label for="username">Kullanıcı Adı:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Şifre:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Giriş Yap</button>
                            <a href="kayit.php" class="btn btn-secondary">Kayıt Ol</a>
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
