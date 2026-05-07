<?php

// KDV hesaplama fonksiyonu
function kdvHesapla($fiyat, $kdvOrani)
{
    return $fiyat * ($kdvOrani / 100);
}

// Toplam fiyat hesaplama fonksiyonu
function toplamFiyatHesapla($fiyat, $kdvTutari)
{
    return $fiyat + $kdvTutari;
}

$kdvTutari = null;
$toplamFiyat = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Formdan gelen verileri alıyoruz
    $fiyat = $_POST["fiyat"];
    $kdvOrani = $_POST["kdv_orani"];

    // Fonksiyonları kullanarak hesaplama yapıyoruz
    $kdvTutari = kdvHesapla($fiyat, $kdvOrani);
    $toplamFiyat = toplamFiyatHesapla($fiyat, $kdvTutari);
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>KDV Hesaplama</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow p-4">
                    <h2 class="text-center mb-4">KDV Hesaplama Uygulaması</h2>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Ürün Fiyatı</label>
                            <input type="number" name="fiyat" class="form-control" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">KDV Oranı (%)</label>
                            <input type="number" name="kdv_orani" class="form-control" min="0" max="100" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Hesapla</button>
                    </form>

                    <?php if ($kdvTutari !== null): ?>
                        <div class="alert alert-info mt-4">
                            KDV Tutarı: <strong><?php echo $kdvTutari; ?> TL</strong><br>
                            Toplam Fiyat: <strong><?php echo $toplamFiyat; ?> TL</strong>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>