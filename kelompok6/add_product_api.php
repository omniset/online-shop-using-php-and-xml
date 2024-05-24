<?php
header('Content-Type: application/json');

$host = 'localhost';
$db = 'dosa9773_kelompok5';
$user = 'dosa9773';
$pass = 'wzg62paZxZ2eHzVX';

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Mendapatkan data dari permintaan POST
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['nama'], $data['deskripsi'], $data['harga'], $data['gambar'])) {
    $nama = $data['nama'];
    $deskripsi = $data['deskripsi'];
    $harga = $data['harga'];
    $gambar = $data['gambar']; // URL gambar produk

    $stmt = $conn->prepare("INSERT INTO produk (nama, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $nama, $deskripsi, $harga, $gambar);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Product added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add product']);
    }
    
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
}

$conn->close();
?>
