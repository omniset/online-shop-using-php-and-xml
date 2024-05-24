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

// Menambahkan produk baru
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['role']) && $_SESSION['role'] === 'seller') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar']; // URL gambar produk

    $stmt = $conn->prepare("INSERT INTO produk (nama, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $nama, $deskripsi, $harga, $gambar);
    $stmt->execute();
    $stmt->close();
}

// Mendapatkan daftar produk
$result = $conn->query("SELECT * FROM produk");
$produk = [];

while ($row = $result->fetch_assoc()) {
    $produk[] = $row;
}

$conn->close();

// Mendapatkan RSS feed dari kelompok lain
$rss = @simplexml_load_file('https://www.antaranews.com/rss/terkini.xml');
$rssError = $rss === false;

// Mendapatkan produk dari kelompok sendiri dalam format XML
$xml = @simplexml_load_file('http://localhost/onlineshop/api/products.php');
$xmlError = $xml === false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
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
            <li><a href="xmllink.php">xml kelompok lain</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Online Shop - Aksesoris Komputer</h1>
        <div class="products-container">
            <button class="nav-button left" onclick="prevProduct()">&#10094;</button>
            <div class="product-wrapper" id="productsWrapper">
                <?php foreach ($produk as $item): ?>
                    <div class="product">
                        <img src="<?php echo htmlspecialchars($item['gambar']); ?>" alt="<?php echo htmlspecialchars($item['nama']); ?>">
                        <h3><?php echo htmlspecialchars($item['nama']); ?></h3>
                        <p><?php echo nl2br(htmlspecialchars($item['deskripsi'])); ?></p>
                        <p class="price">Rp <?php echo number_format($item['harga'], 2, ',', '.'); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="nav-button right" onclick="nextProduct()">&#10095;</button>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
