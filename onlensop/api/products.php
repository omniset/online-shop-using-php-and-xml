<?php
$host = 'localhost';
$db = 'onlineshop';
$user = 'root';
$pass = '';

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan daftar produk
$result = $conn->query("SELECT * FROM produk");
$produk = [];

while ($row = $result->fetch_assoc()) {
    $produk[] = $row;
}

$conn->close();

// Membuat XML
$xml = new SimpleXMLElement('<products/>');

foreach ($produk as $item) {
    $product = $xml->addChild('product');
    $product->addChild('id', $item['id']);
    $product->addChild('nama', htmlspecialchars($item['nama']));
    $product->addChild('deskripsi', htmlspecialchars($item['deskripsi']));
    $product->addChild('harga', $item['harga']);
    $product->addChild('gambar', htmlspecialchars($item['gambar']));
}

// Mengatur header untuk XML
header('Content-Type: application/xml');
echo $xml->asXML();
?>