<?php
$overkategorier = $db->sql('SELECT * FROM overkategorier');
?>

<header class="fixed-top bg-cream py-1">
    <div class="container text-port">
        <nav class="row align-items-center">
            <!-- Logo -->
            <div class="col-3 d-flex align-items-center ">
                <a href="index.php">
                    <img class="img-fluid logo" src="img/logo.webp" alt="Vinkompagniernes logo">
                </a>
            </div>
            <div class="col-9 d-flex justify-content-between align-items-center"> <!--d-none d-lg-block-->
                <div class="col-10 d-flex flex-wrap gap-5">
                    <?php foreach ($overkategorier as $overkategori) { ?>
                        <a href="kategori.php?overkateid=<?php echo $overkategori->overkateid ?>"
                           class="nav-link p-0 fs-4">
                            <?php echo $overkategori->overkatenavn ?>
                        </a>
                    <?php } ?>
                    <a href="omos.php" class="nav-link p-0 fs-4">OM OS</a>
                </div>
                <div class="col-2 d-flex flex-wrap justify-content-end">
                    <div class="mx-auto">🔍</div>
                    <div class="mx-auto">🛒</div>
                    <div class="mx-auto">👤</div>
                </div>
            </div>
        </nav>
    </div>
</header>

<!--<footer class="d-lg-none fixed-bottom">
    <div class="container">
        <nav class="row">
            <div class="col-3"><a href="index.php"> <img class="img-fluid " src="img/logo.webp" alt="Vinkompagniernes logo"></a></div>
            <div class="col-6">
                <a href="kategori.php?overkateid=1">VINE</a>
                <a href="kategori.php?overkateid=2">ØL</a>
                <a href="kategori.php?overkateid=3">SPIRITUS</a>
                <a href="kategori.php?overkateid=4">ØVRIGE</a>
                <a href="kategori.php?overkateid=5">SMAGSPRØVER</a>
                <a href="omos.php">OM OS</a>
            </div>
            <div class="col-3">
                3 små ikoner
            </div>
        </nav>
    </div>
</footer>-->