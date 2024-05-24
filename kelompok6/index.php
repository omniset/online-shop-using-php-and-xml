<?php
$host = 'localhost';
$db = 'dosa9773_kelompok5';
$user = 'dosa9773';
$pass = 'wzg62paZxZ2eHzVX';

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menambahkan produk baru
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar']; // URL gambar produk

    $stmt = $conn->prepare("INSERT INTO produk (nama, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $nama, $deskripsi, $harga, $gambar);
    $stmt->execute();
    $stmt->close();

    // Clearing form after successful submission
    $_POST = array(); // Clear the $_POST array

    // Redirect to prevent form resubmission
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

// Mendapatkan daftar produk
$result = $conn->query("SELECT * FROM produk");
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
    <title>Gaming Emporium</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <header style="background-image: url('https://img.freepik.com/free-photo/cool-geometric-triangular-figure-neon-laser-light-great-backgrounds-wallpapers_181624-9331.jpg');">
        <h1>Gaming Emporium</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Products</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><button id="addItemBtn">Add Item</button></li>
            <li><a href="products.php" target="_blank">XML</a></li>
            <li><a href="xmllink.php">kelompok lain</a></li>
             <li class="cart-container">
                <div class="cart-icon">
                    <img src="https://as2.ftcdn.net/v2/jpg/02/48/54/89/1000_F_248548930_7ZtT5VLUrTHBHq4wLTjtTw16AotdL1gI.jpg" alt="Cart">
                </div>
               
        </ul>
    </nav>
    <section class="products-section">
        <?php foreach ($produk as $item): ?>
            <div class="card">
                <img src="<?= $item['gambar'] ?>" alt="<?= $item['nama'] ?>">
                <div class="card-content">
                    <h2><?= $item['nama'] ?></h2>
                    <p><?= $item['deskripsi'] ?></p>
                    <p class="price">Rp<?= number_format($item['harga'], 2) ?></p>
                </div>
                <div class="cart-icon">
                    <img src="https://as2.ftcdn.net/v2/jpg/02/48/54/89/1000_F_248548930_7ZtT5VLUrTHBHq4wLTjtTw16AotdL1gI.jpg" alt="Cart Icon">
                </div>
            </div>
        <?php endforeach; ?>
    </section>
    
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="POST">
                <label for="nama">Product Name:</label>
                <input type="text" id="nama" name="nama" required>
                <label for="deskripsi">Description:</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
                <label for="harga">Price:</label>
                <input type="number" id="harga" name="harga" step="0.01" required>
                <label for="gambar">Image URL:</label>
                <input type="text" id="gambar" name="gambar">
                <button type="submit" name="submit">Add Product</button>
            </form>
        </div>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
