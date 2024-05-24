<?php
header('Content-Type: application/json');

// Koneksi ke database (ganti dengan kredensial database Anda)
$host = 'localhost';
$db = '';
$user = '';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]));
}

// Mendapatkan data dari POST request
$nama = isset($_POST['nama']) ? $_POST['nama'] : null;
$deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : null;
$harga = isset($_POST['harga']) ? $_POST['harga'] : null;
$gambar = isset($_POST['gambar']) ? $_POST['gambar'] : null;

// Validasi data
if (!$nama || !$deskripsi || !$harga || !$gambar) {
    echo json_encode(['error' => 'Incomplete data provided']);
    exit;
}

// Mempersiapkan statement SQL untuk mencegah SQL injection
$stmt = $conn->prepare("INSERT INTO produk (nama, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssds', $nama, $deskripsi, $harga, $gambar);

// Eksekusi query
if ($stmt->execute()) {
    echo json_encode(['success' => 'Product added successfully']);
} else {
    echo json_encode(['error' => 'Failed to add product: ' . $stmt->error]);
}

// Menutup koneksi dan statement
$stmt->close();
$conn->close();
?>
