<?php
// Endpoint URL to Ahmad's API
$api_url = 'https://anishop.ahmaaad.web.id/api/addFigure';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $anime = $_POST['anime'];
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    // Prepare the data array
    $data = [
        'nama' => $nama,
        'anime' => $anime,
        'tipe' => $tipe,
        'harga' => $harga,
        'deskripsi' => $deskripsi,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];

    // Initialize cURL session
    $ch = curl_init($api_url);

    // Set the cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Execute the cURL request
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        $error = curl_error($ch);
    } else {
        $response_data = json_decode($response, true);
        if (isset($response_data['status']) && $response_data['status'] === 'success') {
            $success = true;
        } else {
            $error = $response_data['message'] ?? 'Failed to add item';
        }
    }

    // Close the cURL session
    curl_close($ch);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item to Ahmad's Database</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Add Item to Ahmad's Database</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="xmllink.php">Back to XML Page</a></li>
        </ul>
    </nav>
    <section>
        <?php if (isset($success) && $success): ?>
            <p>Item added successfully!</p>
        <?php elseif (isset($error)): ?>
            <p>Error: <?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST">
            <label for="nama">Nama Produk:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="anime">Anime:</label>
            <input type="text" id="anime" name="anime" required>

            <label for="tipe">Tipe:</label>
            <input type="text" id="tipe" name="tipe" required>

            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" step="0.01" required>

            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required></textarea>

            <button type="submit">Add Item</button>
        </form>
    </section>
</body>
</html>
