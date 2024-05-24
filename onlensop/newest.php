<?php
session_start();
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

// Mendapatkan produk terbaru
$result = $conn->query("SELECT * FROM produk ORDER BY id DESC");
$produk = [];

while ($row = $result->fetch_assoc()) {
    $produk[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newest Products</title>
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
        <h1>Newest Products</h1>
        <div class="products-container">
            <?php foreach ($produk as $item): ?>
                <div class="product">
                    <img src="<?php echo htmlspecialchars($item['gambar']); ?>" alt="<?php echo htmlspecialchars($item['nama']); ?>">
                    <h3><?php echo htmlspecialchars($item['nama']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($item['deskripsi'])); ?></p>
                    <p class="price">Rp <?php echo number_format($item['harga'], 2, ',', '.'); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
