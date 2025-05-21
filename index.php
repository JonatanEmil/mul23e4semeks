<?php
/**
 * @var db $db
 */

require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    
    <title>Vinkompagnierne</title>
    
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-champagne">
<?php include "header.php"; ?>
<div class="container page-content bg-cream">
    <div class="row pt-3">
        <div class="col-12">
            <h1>Det virker 🥳</h1>
        </div>
    </div>
</div>

<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/DJBFWu_AkD8/" data-instgrm-version="14"></blockquote>
<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/DA6h3AzCY53/?img_index=2" data-instgrm-version="14"></blockquote>
<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/DIL71M3Kemz" data-instgrm-version="14"></blockquote>
<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/CikuD-Hr0oO/" data-instgrm-version="14"></blockquote>
<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/C_I7AEuvOh7/" data-instgrm-version="14"></blockquote>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> <!-- Denne lå i index
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> denne lå i products, hvilken skal vi bruge?????+-->
<script src="//www.instagram.com/embed.js"></script>
<script>
    const dropupElement = document.querySelector('#searchbutt');
    const input = document.querySelector('#dropupSearchInput');

    dropupElement.addEventListener('shown.bs.dropdown', function () {
        input.focus();
    });
</script>
</body>
</html>
