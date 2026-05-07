<?php
function notHesapla($vize, $final)
{
    return ($vize * 0.4) + ($final * 0.6);
}

function durumBelirle($ortalama)
{
    if ($ortalama >= 50) {
        return "Geçti!";
    } else {
        return "Kaldı!";
    }
}

$sonuc = null;
$durum = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $vize = $_POST["vize"];
    $final = $_POST["final"];

    $sonuc = notHesapla($vize, $final);
    $durum = durumBelirle($sonuc);
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Not Hesaplama</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow p-4">
                <h2 class="text-center mb-4">Öğrenci Not Hesaplama</h2>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Vize Notu</label>
                        <input type="number" name="vize" class="form-control" min="0" max="100" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Final Notu</label>
                        <input type="number" name="final" class="form-control" min="0" max="100" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Hesapla</button>
                </form>

                <?php if ($sonuc !== null): ?>
                    <div class="alert mt-4 <?php echo $durum == 'Geçti' ? 'alert-success' : 'alert-danger'; ?>">
                        Ortalama: <strong><?php echo $sonuc; ?></strong><br>
                        Durum: <strong><?php echo $durum; ?></strong>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>