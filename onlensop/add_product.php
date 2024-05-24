<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'seller') {
    header("Location: login.php");
    exit;
}

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

// Menambahkan produk baru
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar']; // URL gambar produk

    $stmt = $conn->prepare("INSERT INTO produk (nama, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $nama, $deskripsi, $harga, $gambar);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="newest.php">Newest Products</a></li>
            <li><a href="account.php">Account</a></li>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'seller'): ?>
                <li><a href="add_product.php">Add Product</a></li>
            <?php endif; ?>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Add New Product</h1>
        <form method="post" action="">
            <label for="nama">Nama Produk</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" required></textarea>
            
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" required>

            <label for="gambar">URL Gambar</label>
            <input type="text" id="gambar" name="gambar" required>
            
            <button type="submit">Tambah Produk</button>
        </form>
    </div>
</body>
</html>
