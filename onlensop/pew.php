<?php 
$rss = @simplexml_load_file('https://kelompok6.doseninformatika.com/products.php');
$rssError = $rss === false;
?>