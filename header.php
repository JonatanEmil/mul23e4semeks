<?php
$overkategorier = $db->sql('SELECT * FROM overkategorier');
?>

<header class="fixed-top bg-cream py-1">
    <div class="container text-port">
        <nav class="row d-flex align-items-center justify-content-center justify-content-xxl-start">
            <!-- Logo -->
            <div class="col-auto col-xxl-3 d-flex align-items-center">
                <a href="index.php">
                    <img class="img-fluid logo pb-2" src="img/logo.webp" alt="Vinkompagniernes logo">
                </a>
            </div>
            <div class="col-9 d-flex justify-content-between align-items-center d-none d-xxl-flex">
                <div class="col-10 d-flex flex-wrap gap-5">
                    <?php foreach ($overkategorier as $overkategori) {
                        $ovkatid = $overkategori->overkateid; ?>
                        <div class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link p-0 fs-5" type="button" data-bs-toggle="dropdown">
                                <?php echo $overkategori->overkatenavn; ?>
                            </a>
                            <div class="dropdown-menu bg-champagne" style="width: 100vw">
                                <div class="row d-flex justify-content-center">
                                    <?php $kategorier = $db->sql('SELECT * FROM kategorier INNER JOIN overkat_underkat_con ON kateid = underkatid WHERE overkatid = :overkatid ', ['overkatid' => $ovkatid]);
                                    foreach ($kategorier as $kategori) { ?>
                                        <div class="col-auto d-flex flex-column justify-content-center">
                                            <img class="img-fluid align-self-center" src="img/kategorier/<?php echo $kategori->kateimg ?>"
                                                 alt="<?php echo $kategori->katenavn ?>" style="max-height: 50px; height: auto; width: auto;">
                                            <a href="kategori.php?kateid=<?php echo $kategori->kateid; ?>"
                                               class="dropdown-item"><?php echo $kategori->katenavn ?></a>
                                        </div>
                                    <?php } ?>
                                </div>
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
                <div class="col-2 d-flex justify-content-end">
                    <div class="mx-auto"><img class="img-fluid" src="img/soeg.webp" alt="søgefunktion"
                                              style="max-height: 40px"></div>
                    <div class="mx-auto"><img class="img-fluid" src="img/kurv.webp" alt="kurv med varer"
                                              style="max-height: 40px"></div>
                    <div class="mx-auto"><img class="img-fluid" src="img/bruger.webp"
                                              alt="log in eller din brugerprofil" style="max-height: 40px"></div>
                </div>
            </div>
        </nav>
    </div>
</header>

<footer class="fixed-bottom botnav bg-cream py-1 d-xxl-none">
    <div class="container">
        <nav class="row d-flex justify-content-end">
            <div class="col-auto d-flex justify-content-end">
                <div class="mx-auto px-2"><img class="img-fluid" src="img/soeg.webp" alt="søgefunktion"
                                          style="max-height: 40px"></div>
                <div class="mx-auto px-2"><img class="img-fluid" src="img/kurv.webp" alt="kurv med varer"
                                          style="max-height: 40px"></div>
                <div class="mx-auto px-2"><img class="img-fluid" src="img/bruger.webp"
                                          alt="log in eller din brugerprofil" style="max-height: 40px"></div>
            </div>
            <div class="col-auto d-flex justify-content-end">
                <div class="dropup">
                    <button class="btn btn-wine dropdown-toggle" type="button" data-bs-auto-close="outside"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Shop
                    </button>
                    <ul class="dropdown-menu bg-champagne">
                        <li class="dropstart">
                            <?php foreach ($overkategorier as $overkategori) {
                                $ovkatid = $overkategori->overkateid; ?>
                                <a class="dropdown-item dropdown-toggle"
                                   data-bs-toggle="dropdown"><?php echo $overkategori->overkatenavn; ?></a>
                                <div class="dropdown-menu mheadside bg-champagne">
                                    <!-- ikke den bedste løsning med fast enhed-->
                                    <div class="row d-flex">
                                        <?php $kategorier = $db->sql('SELECT * FROM kategorier INNER JOIN overkat_underkat_con ON kateid = underkatid WHERE overkatid = :overkatid ', ['overkatid' => $ovkatid]);
                                        foreach ($kategorier as $kategori) { ?>
                                            <div class="col-12 col-md-6"><a
                                                        href="kategori.php?kateid=<?php echo $kategori->kateid; ?>"
                                                        class="dropdown-item"><?php echo $kategori->katenavn ?></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </li>
                        <li><a href="omos.php" class="dropdown-item">OM OS</a></li>
                        <li><a href="blog.php" class="dropdown-item">BLOG</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</footer>