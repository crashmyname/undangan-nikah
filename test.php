<?php
// Data yang akan dikirimkan
$data = array(
    'nama' => $_POST['nama'],
    'kehadiran' => $_POST['kehadiran'],
    'ucapan' => $_POST['ucapan'],
);

// URL endpoint untuk API Laravel
$url = 'http://127.0.0.1/undangan-fadli/public/api/ucapan';

// Inisialisasi curl
$ch = curl_init($url);

// Set opsi untuk curl
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
));

// Eksekusi curl dan tangkap responsenya
$response = curl_exec($ch);

// Cek apakah ada error
if(curl_errno($ch)){
    echo 'Error: ' . curl_error($ch);
}

// Tutup curl
curl_close($ch);

// Tampilkan respons dari API Laravel
echo $response;
?>
