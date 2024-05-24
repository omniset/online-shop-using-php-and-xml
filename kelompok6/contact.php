<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Gaming Emporium</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header {
            background-color: #333;
            color: #ffcc00;
            padding: 1em 0;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            background-color: #444;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a, nav ul li button {
            color: #ffcc00;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        nav ul li button {
            background: none;
            border: none;
            cursor: pointer;
        }
        nav ul li a:hover, nav ul li button:hover {
            background-color: #555;
        }
        .contact-section {
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            line-height: 1.6;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .contact-section h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .contact-section p {
            background-color: #fff;
            border: 2px solid #2a9d8f;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, border 0.3s ease;
        }
        .contact-section p:hover {
            background-color: #e6f9f5;
            border: 2px solid #2a9d8f;
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
            <li><button id="addItemBtn">Add Item</button></li>
        </ul>
    </nav>
    <section class="contact-section">
        <h2>Contact Us</h2>
        <p>If you have any questions, concerns, or feedback, feel free to reach out to us. We're here to help!</p>
        <p>Email: support@gamingemporium.com</p>
        <p>Phone: +1-800-555-GAME (4263)</p>
        <p>Address: 123 Gaming Lane, Gamer City, GC 45678</p>
    </section>
    
    <script src="scripts.js"></script>
</body>
</html>
