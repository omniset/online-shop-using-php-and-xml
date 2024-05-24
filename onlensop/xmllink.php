<?php 
$rss = @simplexml_load_file('https://www.antaranews.com/rss/terkini.xml');
$rssError = $rss === false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS Feed</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="rss-container">
            <h2>Berita Terkini</h2>
            <div id="rssList">
                <?php if ($rssError): ?>
                    <p>Gagal memuat RSS feed.</p>
                <?php else: ?>
                    <?php foreach ($rss->channel->item as $item): ?>
                        <div class="rss-item">
                            <h3><?php echo htmlspecialchars($item->title); ?></h3>
                            <p><?php echo htmlspecialchars($item->description); ?></p>
                            <p><a href="<?php echo htmlspecialchars($item->link); ?>" target="_blank">Baca Selengkapnya</a></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
<div class="button-container">
    <a href="index.php" class="button">Back to Home</a>
</div>
</body>
</html>