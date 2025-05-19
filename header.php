<?php
$overkategorier = $db->sql('SELECT * FROM overkategorier');
?>

<header class="fixed-top bg-cream py-1">
    <div class="container text-port">
        <nav class="row d-flex align-items-center justify-content-center justify-content-xxl-start">
            <!-- Logo -->
            <div class="col-auto d-flex align-items-center">
                <a href="index.php">
                    <img class="img-fluid logo" src="img/logo.webp" alt="Vinkompagniernes logo">
                </a>
            </div>
            <div class="col-9 d-flex justify-content-between align-items-center d-none d-xxl-flex"> <!--d-none d-lg-block-->
                <div class="col-10 d-flex flex-wrap gap-5">
                    <?php foreach ($overkategorier as $overkategori) {
                        $ovkatid = $overkategori->overkateid; ?>
                        <div class="nav-item dropdown" >
                            <a class="dropdown-toggle nav-link p-0 fs-5" type="button" data-bs-toggle="dropdown">
                                <?php echo $overkategori->overkatenavn; ?>
                            </a>
                            <div class="dropdown-menu">
                            <?php $kategorier = $db->sql('SELECT * FROM kategorier INNER JOIN overkat_underkat_con ON kateid = underkatid WHERE overkatid = :overkatid ', ['overkatid' => $ovkatid]);
                            foreach ($kategorier as $kategori) { ?>
                                <a href="kategori.php?kateid=<?php echo $kategori->kateid; ?>" class="dropdown-item"><?php echo $kategori->katenavn ?></a>
                            <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link p-0 fs-5" type="button" data-bs-toggle="dropdown">Info</a>
                        <div class="dropdown-menu">
                            <a href="omos.php" class="dropdown-item">Om os</a>
                            <a href="blog.php" class="dropdown-item">Blog</a>
                        </div>
                    </div>
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

<footer class="fixed-bottom botnav bg-cream py-1 d-xxl-none">
    <div class="container">
        <nav class="row d-flex justify-content-end">
            <div class="col-3">
                3 små ikoner
            </div>
            <div class="col-6 d-flex justify-content-end">
                <div class="btn-group dropup">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Shop
                    </button>
                    <ul class="dropdown-menu">
                        <?php foreach ($overkategorier as $overkategori) {
                        $ovkatid = $overkategori->overkateid; ?>
                        <div class="nav-item dropstart" >
                            <a class="dropdown-toggle nav-link p-0 fs-5" type="button" data-bs-toggle="dropdown"><?php echo $overkategori->overkatenavn; ?></a>
                            <div class="dropdown-menu">
                                <?php $kategorier = $db->sql('SELECT * FROM kategorier INNER JOIN overkat_underkat_con ON kateid = underkatid WHERE overkatid = :overkatid ', ['overkatid' => $ovkatid]);
                                foreach ($kategorier as $kategori) { ?>
                                    <a href="kategori.php?kateid=<?php echo $kategori->kateid; ?>" class="dropdown-item"><?php echo $kategori->katenavn ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </nav>
    </div>
</footer>