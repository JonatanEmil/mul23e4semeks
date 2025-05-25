<?php
$overkategorier = $db->sql('SELECT * FROM overkategorier');
?>

<header class="fixed-top py-1 blur bg-opacity-100">
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
                            <div class="dropdown-menu bg-cream" style="width: 100vw">
                                <div class="row d-flex justify-content-center">
                                    <?php $kategorier = $db->sql('SELECT * FROM kategorier INNER JOIN overkat_underkat_con ON kateid = underkatid WHERE overkatid = :overkatid ', ['overkatid' => $ovkatid]);
                                    foreach ($kategorier as $kategori) { ?>
                                        <div class="col-auto d-flex flex-column justify-content-center">
                                            <a href="kategori.php?kateid=<?php echo $kategori->kateid; ?>"
                                               class="dropdown-item fw-semibold d-flex flex-column text-center">
                                                <img class="img-fluid mx-auto"
                                                     src="img/kategorier/<?php echo $kategori->kateimg ?>"
                                                     alt="<?php echo $kategori->katenavn ?>"
                                                     style="max-height: 50px; height: auto; width: auto;">
                                                <span><?php echo $kategori->katenavn ?></span>
                                            </a>
                                        </div>
                                        <?php if ($kategori->kateid === 32) { ?>
                                            <div class="col-auto d-flex flex-column justify-content-center">
                                                <p class="h3">BOOK EN SMAGNING</p>
                                            </div>
                                            <div class="col-auto d-flex flex-column justify-content-center">
                                                <p class="h3">VORES BEGIVENHEDER</p>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link p-0 fs-5" type="button" data-bs-toggle="dropdown">INFO</a>
                        <div class="dropdown-menu bg-cream">
                            <a href="omos.php" class="dropdown-item">OM OS</a>
                            <a href="blog.php" class="dropdown-item">BLOG</a>
                        </div>
                    </div>
                </div>
                <div class="col-2 d-flex justify-content-end">
                    <div id="searchbutt" class="dropstart">
                        <div class="mx-auto px-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><img
                                    class="img-fluid" src="img/soeg.webp" alt="søgefunktion"
                                    style="max-height: 40px"></div>
                        <div class="dropdown-menu" style="width: 40vw">
                            <form class="d-flex dropdown-item" role="search">
                                <input id="dropupSearchInput" class="form-control me-2" type="search"
                                       placeholder="Search" aria-label="Search" autofocus/>
                                <button class="btn btn-wine" type="submit">SØG</button>
                            </form>

                        </div>
                    </div>
                    <div class="mx-auto"><img class="img-fluid" src="img/kurv.webp" alt="kurv med varer"
                                              style="max-height: 40px"></div>
                    <div class="mx-auto"><img class="img-fluid" src="img/bruger.webp"
                                              alt="login eller din brugerprofil" style="max-height: 40px"></div>
                </div>
            </div>
        </nav>
    </div>
</header>

<header class="fixed-bottom botnav py-1 d-xxl-none blur bg-opacity-100" style="height: 7vh">
    <div class="container text-port">
        <nav class="row d-flex justify-content-end">
            <div class="col-auto d-flex justify-content-end">
                <div class="mx-auto px-2"><img class="img-fluid" src="img/bruger.webp"
                                               alt="login eller din brugerprofil" style="max-height: 40px"></div>
                <div class="mx-auto px-2"><img class="img-fluid" src="img/kurv.webp" alt="kurv med varer"
                                               style="max-height: 40px"></div>
                <div id="searchbutt" class="dropup">
                    <div class="mx-auto px-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><img
                                class="img-fluid" src="img/soeg.webp" alt="søgefunktion"
                                style="max-height: 40px"></div>
                    <div class="dropdown-menu" style="width: 40vw">
                        <form class="d-flex dropdown-item" role="search">
                            <input id="dropupSearchInput" class="form-control me-2" type="search" placeholder="Search"
                                   aria-label="Search" autofocus/>
                            <button class="btn btn-wine" type="submit">SØG</button>
                        </form>

                    </div>
                </div> <!-- dropup -->
            </div>
            <div class="col-auto d-flex justify-content-end">
                <div class="dropup">
                    <button class="btn btn-wine dropdown-toggle btn-lg" type="button" data-bs-auto-close="outside"
                            data-bs-toggle="dropdown" aria-expanded="false" style="height: 100%">
                        Shop
                    </button>
                    <ul class="dropdown-menu bg-cream">
                        <li class="dropstart">
                            <?php foreach ($overkategorier as $overkategori) {
                                $ovkatid = $overkategori->overkateid; ?>
                                <a class="dropdown-item dropdown-toggle fs-4"
                                   data-bs-toggle="dropdown"><?php echo $overkategori->overkatenavn; ?></a>
                                <div class="dropdown-menu mheadside bg-cream">
                                    <div class="dropdown-columns fw-semibold">
                                        <?php
                                        $kategorier = $db->sql('SELECT * FROM kategorier INNER JOIN overkat_underkat_con ON kateid = underkatid WHERE overkatid = :overkatid', ['overkatid' => $ovkatid]);
                                        foreach ($kategorier as $kategori) { ?>
                                            <div class="d-flex align-items-center mb-2">
                                                <a href="kategori.php?kateid=<?php echo $kategori->kateid; ?>"
                                                   class="d-flex align-items-center mb-2 text-decoration-none text-port">
                                                    <img src="img/kategorier/<?php echo $kategori->kateimg ?>"
                                                         alt="<?php echo $kategori->katenavn ?>"
                                                         class="me-2" style="max-height: 50px;">
                                                    <span class="fs-5"><?php echo $kategori->katenavn ?></span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </li>
                        <li><a href="omos.php" class="dropdown-item fs-4">OM OS</a></li>
                        <li><a href="blog.php" class="dropdown-item fs-4">BLOG</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
