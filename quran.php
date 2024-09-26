<?php
// Fungsi untuk mendapatkan data surat dari API
function getSurahData()
{
    $apiUrl = 'https://api.alquran.cloud/v1/surah';
    $response = file_get_contents($apiUrl);
    return json_decode($response, true)['data'];
}

$surahData = getSurahData();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Qur'an</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <h1>Al-Qur'an</h1>
    <div class="surah-list">
        <?php foreach ($surahData as $surah): ?>
            <div class="surah-item" onclick="loadSurah(<?php echo $surah['number']; ?>)">
                <div class="surah-name"><?php echo $surah['name']; ?></div>
                <div class="surah-number">Surat ke-<?php echo $surah['number']; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="surahContent"></div>
    <script src="assets/script.js"></script>
</body>

</html>