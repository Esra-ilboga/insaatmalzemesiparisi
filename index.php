<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: giris.php");
    exit;
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: giris.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İnşaat Malzemeleri</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- üst sekme bölgesi -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">İlboğa İnşaat</a>
    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
            <?php if (!isset($_SESSION['username'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="giris.php">Giriş Yap</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kayit.php">Kaydol</a>
            </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="siparislistem.php">Siparişlerim</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cikisyap.php">Çıkış</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<!-- Verilen hizmet hakkında açıklama alanı -->
<div class="jumbotron text-center">
    <h3>İlboğa İnşaat Hizmetleri</h3>
    <p>İlboğa İnşaat olarak temel amacımız müşterimizin memnuniyetidir. 
        2000'li yılların başlarından beri halkımıza en kaliteli ve en uygun fiyatlarda ürünlerimizi sunmaktayız. 
        Ürünlerimiz ülkemizin köklü fabrikalarından alınıp herhangi bir nakliye ücreti talep edilmeden müşterilerimize sunulmaktadır. 
        Bize güvendiğiniz için teşekkür ederiz.</p>
</div>

<!-- Malzeme Listesi  -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2>Malzemeler</h2>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Malzeme</th>
                        <th>Ağırlık (1 Ton)</th>
                        <th>Fiyat (TL)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>1</strong></td>
                        <td>İzocam</td>
                        <td>1 Ton</td>
                        <td>89000 TL</td>
                    </tr>
                    <tr>
                        <td><strong>2</strong></td>
                        <td>Tuğla</td>
                        <td>1 Ton</td>
                        <td>56000 TL</td>
                    </tr>
                    <tr>
                        <td><strong>3</strong></td>
                        <td>Pilket</td>
                        <td>1 Ton</td>
                        <td>64000 TL</td>
                    </tr>
                    <tr>
                        <td><strong>4</strong></td>
                        <td>Kereste</td>
                        <td>1 Ton</td>
                        <td>98000 TL</td>
                    </tr>
                    <tr>
                        <td><strong>5</strong></td>
                        <td>Çimento</td>
                        <td>1 Ton</td>
                        <td>120000 TL</td>
                    </tr>
                    <tr>
                        <td><strong>6</strong></td>
                        <td>Demir</td>
                        <td>1 Ton</td>
                        <td>85000 TL</td>
                    </tr>
                    <tr>
                        <td><strong>7</strong></td>
                        <td>Sac</td>
                        <td>1 Ton</td>
                        <td>80000 TL</td>
                    </tr>
                    <tr>
                        <td><strong>8</strong></td>
                        <td>Kireç</td>
                        <td>1 Ton</td>
                        <td>56000 TL</td>
                    </tr>
                    <tr>
                        <td><strong>9</strong></td>
                        <td>Kömür</td>
                        <td>1 Ton</td>
                        <td>38000 TL</td>
                    </tr>
                    <tr>
                        <td><strong>10</strong></td>
                        <td>Kalekim</td>
                        <td>1 Ton</td>
                        <td>6800 TL</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Sipariş vermek için gerekli olan form -->
        <div class="col-lg-4 mt-5">
            <div class="card bg-dark text-white mb-3">
                <div class="card-header">
                    <h2 class="card-title h5">Sipariş Ver</h2>
                </div>
                <div class="card-body">
                    <form action="siparisgiris.php" method="POST">
                        <div class="form-group">
                            <label for="material">Malzeme Seçin:</label>
                            <select class="form-control" id="material" name="material">
                                <option value="İzocam">İzocam</option>
                                <option value="Tuğla">Tuğla</option>
                                <option value="Pilket">Pilket</option>
                                <option value="Kereste">Kereste</option>
                                <option value="Çimento">Çimento</option>
                                <option value="Demir">Demir</option>
                                <option value="Sac">Sac</option>
                                <option value="Kireç">Kireç</option>
                                <option value="Kömür">Kömür</option>
                                <option value="Kalekim">Kalekim</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Miktar (Ton):</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Sipariş Ver</button>
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
