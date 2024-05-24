<?php 
$rss = @simplexml_load_file('https://anishop.ahmaaad.web.id/api/produks/xml');
$rssError = $rss === false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Emporium</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <style>
        .products-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            width: 300px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .card h2 {
            font-size: 1.5em;
            margin: 16px;
        }
        .card p {
            margin: 0 16px 16px;
        }
        .price {
            font-weight: bold;
            color: #2a9d8f;
        }
    </style>
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
            <li><a href="addItemAhmad.php">Add Item</button></li>
            <li><a href="products.php" target="_blank">XML</a></li>
            <li><a href="xmllink.php">kelompok lain</a></li>
        </ul>
    </nav>
    <section class="products-section">
        <!-- Data akan dimuat di sini menggunakan JavaScript -->
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('https://anishop.ahmaaad.web.id/api/produks/xml')
                .then(response => response.text())
                .then(data => {
                    let parser = new DOMParser();
                    let xmlDoc = parser.parseFromString(data, "application/xml");
                    let produks = xmlDoc.getElementsByTagName('produk');
                    let productsSection = document.querySelector('.products-section');

                    for (let produk of produks) {
                        let card = document.createElement('div');
                        card.classList.add('card');

                        let id = produk.getElementsByTagName('id')[0].textContent;
                        let nama = produk.getElementsByTagName('nama')[0].textContent;
                        let anime = produk.getElementsByTagName('anime')[0].textContent;
                        let tipe = produk.getElementsByTagName('tipe')[0].textContent;
                        let harga = produk.getElementsByTagName('harga')[0].textContent;
                        let deskripsi = produk.getElementsByTagName('deskripsi')[0].textContent;
                        let created_at = produk.getElementsByTagName('created_at')[0].textContent;
                        let updated_at = produk.getElementsByTagName('updated_at')[0].textContent;

                        card.innerHTML = `
                            <img src="placeholder.jpg" alt="${nama}">
                            <h2>${nama}</h2>
                            <p>${deskripsi}</p>
                            <p class="price">Rp${parseFloat(harga).toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</p>
                            <p><strong>Anime:</strong> ${anime}</p>
                            <p><strong>Tipe:</strong> ${tipe}</p>
                            <p><strong>Created at:</strong> ${created_at}</p>
                            <p><strong>Updated at:</strong> ${updated_at}</p>
                        `;

                        productsSection.appendChild(card);
                    }
                })
                .catch(error => console.error('Error fetching the XML data:', error));
        });
    </script>
</body>
</html>
