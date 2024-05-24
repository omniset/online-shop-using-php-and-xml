<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Gaming Emporium</title>
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
        .about-section {
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            line-height: 1.6;
        }
        .about-section h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .about-section p {
            background-color: #f9f9f9;
            border-left: 5px solid #ff6347;
            margin: 10px 0;
            padding: 15px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
           
            bottom: 0;
            width: 100%;
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
    <section class="about-section">
        <h2>About Us</h2>
        <p>Welcome to Gaming Emporium, your number one source for all things gaming. We're dedicated to giving you the very best of gaming gear, with a focus on quality, customer service, and uniqueness.
        Founded in 2024, Gaming Emporium has come a long way from its beginnings. When we first started out, our passion for gaming gear drove us to start our own business.
        We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
        Sincerely,
        <p>The Gaming Emporium Team</p>
    </section>
    
    <script src="scripts.js"></script>
</body>
</html>
