<?php
require_once 'config.php';

// Ambil data kota dari tabel `kota`
$kotaResult = mysqli_query($link, "SELECT nama_kota FROM kota");
$kotaList = [];
while ($row = mysqli_fetch_assoc($kotaResult)) {
    $kotaList[] = $row['nama_kota'];
}

// Ambil data transportasi dari tabel `rekomendasi_transportasi`
$transportResult = mysqli_query($link, "SELECT nama_transportasi, kota, foto FROM rekomendasi_transportasi");
$transportData = [];

while ($row = mysqli_fetch_assoc($transportResult)) {
    $city = strtolower($row['kota']);
    if (!isset($transportData[$city])) {
        $transportData[$city] = [];
    }
    $transportData[$city][] = [
        'name' => $row['nama_transportasi'],
        'photo' => $row['foto'] // Ambil data foto
    ];
    
    // Transportasi dengan kota 'All' ditambahkan ke semua kota
    if ($city === 'all') {
        foreach ($kotaList as $kota) {
            $cityKey = strtolower($kota);
            if (!isset($transportData[$cityKey])) {
                $transportData[$cityKey] = [];
            }
            $transportData[$cityKey][] = [
                'name' => $row['nama_transportasi'],
                'photo' => $row['foto'] // Tambahkan data foto
            ];
        }
    }
}
// Kirim data sebagai JSON
echo json_encode([
    'cities' => $kotaList,
    'transportData' => $transportData
]);

mysqli_close($link);
?>
