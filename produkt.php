<?php
/**
 * @var db $db
 */

require "settings/init.php";
$bind = [];

if (!empty($_GET['kateid']) && !empty($_GET['prodid'])) {
    $bind[":kateid"] = $_GET['kateid'];
    $bind[":prodid"] = $_GET['prodid'];
}
$produkter = $db->sql('SELECT * FROM produkter LEFT JOIN lande ON prodland = landeid INNER JOIN `prod-kat-con` ON prodid = prkacoprodid WHERE prkacokatid = :kateid AND prodid = :prodid', $bind);
$produkt = $produkter[0];
$madikoner = $db->sql('SELECT * FROM `prod-mad-con` LEFT JOIN madikoner ON prmacoikonid = ikonid WHERE prmacoprodid = :prodid', [":prodid" => $produkt->prodid]);
$allebutikker = $db->sql('SELECT * FROM butikker');
$prodbutikker = $db->sql('SELECT * FROM `prod-but-con` INNER JOIN butikker ON prbucobutikid = butikid WHERE prbucoprodid = :prodid', [":prodid" => $produkt->prodid]);
$prodbutikarr = [];
foreach ($prodbutikker as $prodbutik) {
    $prodbutikarr[] = $prodbutik->butikid; // OBS: bruger butikid her
}
$bindkate = [];
if (!empty($_GET['kateid'])) {
    $bindkate[":kateid"] = $_GET['kateid'];
}
$kategorierbroed = $db->sql('SELECT * FROM kategorier WHERE kateid=:kateid', $bindkate);
$kategoribroed = $kategorierbroed[0];
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title><?php echo $produkt->prodnavn; ?> hos Vinkompagnierne</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php include "header.php"; ?>
<div class="container page-content rounded-3">
    <div class="d-flex align-items-center">
        <a href="kategori.php?kateid=<?php echo $kategoribroed->kateid ?>"
           class="h3 mb-0 text-decoration-none text-dark">
            <?php echo $kategoribroed->katenavn ?>
        </a>
        <span class="h3 mx-2 mb-0">→</span>
        <a href="produkt.php?kateid=<?php echo $kategoribroed->kateid ?>&prodid=<?php echo $produkt->prodid ?>"
           class="h3 mb-0 text-decoration-none text-dark">
            <?php echo $produkt->prodnavn ?>
        </a>
    </div>
    <div class="row g-3 page-content text-port align-items-xl-center mt-0 pt-0">
        <h1 class="mb-0 mt-2 fw-bolder d-lg-none"><?php echo $produkt->prodnavn; ?></h1>

        <?php if (!is_null($produkt->prodland)) { ?>
            <div class="row d-flex align-items-center">
                <div class="col-2"><img class="img-fluid d-lg-none" src="img/flag/<?php echo $produkt->landeimg; ?>"
                                        alt="<?php echo $produkt->landenavn; ?>s flag"></div>
                <div class="col-10"><p class="m-0 fs-4 fw-semibold d-lg-none"><?php echo $produkt->landenavn; ?></p>
                </div>
            </div>
        <?php } ?>

        <p class="display-2 fw-bold d-lg-none mb-0">Kr. <?php echo number_format($produkt->prodpris, 2, ",", ""); ?> pr.
            stk.</p>
        <?php if ($produkt->prodkasse === 1) { ?>
            <p class="h5 fw-bold text-wine d-lg-none m-0">Kassepris (6 flasker):
                Kr. <?php echo number_format($produkt->prodkassepris, 2, ",", ""); ?> pr. kasse.</p>
        <?php } ?>
        <div class="col-12 d-md-none">
            <div class="d-flex justify-content-center bg-champagne rounded-2 pt-3 pb-2 me-xl-3 mb-3">
                <img class="img-fluid product-image-size-small" style=""
                     src="img/produkter/<?php echo $produkt->prodimg; ?>"
                     alt="<?php echo $produkt->prodnavn; ?> - Vinkompagnierne">
            </div>
        </div>
        <div class="col-12 d-none d-md-block d-lg-none">
            <div class="d-flex justify-content-center bg-champagne rounded-2 pt-3 pb-2 me-xl-3 mb-3">
                <img class="img-fluid product-image-size-medium" style=""
                     src="img/produkter/<?php echo $produkt->prodimg; ?>"
                     alt="<?php echo $produkt->prodnavn; ?> - Vinkompagnierne">
            </div>
        </div>
        <div class="col-lg-5 d-none d-lg-block">
            <div class="d-flex justify-content-center bg-champagne pt-5 pb-5 rounded-2 pt-3 pb-2 me-xl-3 mb-3">
                <img class="img-fluid product-image-size-big" src="img/produkter/<?php echo $produkt->prodimg; ?>"
                     alt="<?php echo $produkt->prodnavn; ?> - Vinkompagnierne">
            </div>
        </div>
        <div class="col-12 col-lg-7">
            <h1 class="mb-0 mt-2 d-none d-lg-block card-title"><?php echo $produkt->prodnavn; ?></h1>
            <?php if (!is_null($produkt->prodland)) { ?>
                <div class="row d-flex align-items-center">
                    <div class="col-2"><img class="img-fluid d-lg-block d-none"
                                            src="img/flag/<?php echo $produkt->landeimg; ?>"
                                            alt="<?php echo $produkt->landenavn; ?>s flag"></div>
                    <div class="col-10"><p
                                class="m-0 fs-4 fw-semibold d-lg-block d-none"><?php echo $produkt->landenavn; ?></p>
                    </div>
                </div>
            <?php } ?>
            <div class="row d-flex justify-content-start align-items-center flex-wrap">
                <?php foreach ($madikoner as $ikon) { ?>
                    <div class="col-auto mt-2 mb-2">
                        <img class="d-none d-lg-block" style="max-height: 75px;"
                             src="img/ikoner/<?php echo $ikon->ikonimg ?>"
                             alt="<?php echo $ikon->ikonnavn ?>" title="<?php echo $ikon->ikonnavn ?>">
                        <img class="d-lg-none" style="max-height: 55px;" src="img/ikoner/<?php echo $ikon->ikonimg ?>"
                             alt="<?php echo $ikon->ikonnavn ?> " title="<?php echo $ikon->ikonnavn ?>">
                    </div>
                <?php } ?>
            </div>
            <p class="display-2 fw-bold d-none d-lg-block">
                Kr. <?php echo number_format($produkt->prodpris, 2, ",", ""); ?> pr. stk.</p>
            <?php if ($produkt->prodkasse === 1) { ?>
                <p class="h5 fw-bold text-wine d-none d-lg-block">Kassepris (6 flasker):
                    Kr. <?php echo number_format($produkt->prodkassepris, 2, ",", ""); ?> pr. kasse.</p>
            <?php } ?>
            <p class="h5 mt-3 mt-lg-5 fs-6">Tilgængelig i disse butikker:</p>
            <div class="row me-xl-2">
                <div class="col-5 col-xl-3">
                    <div class="bg-champagne border rounded p-2">
                        <?php foreach ($allebutikker as $butik): ?>
                            <?php $erValgt = in_array($butik->butikid, $prodbutikarr); ?>
                            <div class="d-flex align-items-center mb-1 p-1 rounded
                    <?php echo $erValgt ? 'bg-wine text-champagne fw-bold' : 'text-port'; ?>">
                                <i class="fa-solid <?php echo $erValgt ? 'fa-check me-2' : 'fa-xmark me-2'; ?>"></i>
                                <span><?php echo htmlspecialchars($butik->butiknavn); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-7 col-xl-9 d-flex justify-content-end">
                    <button class="btn btn-wine mt-5">Læg i kurv</button>
                </div>
                <div class="d-none d-lg-block col-12 mt-3">
                    <br>
                    <p class="h3 mt-3">Beskrivelse:</p>
                    <p class="bg-champagne rounded rounded-2 p-1"><?php echo $produkt->prodbeskriv ?></p>
                </div>
            </div>
        </div>
        <div class="d-lg-none col-12">
            <br>
            <p class="h3 mt-3">Beskrivelse:</p>
            <p class="bg-champagne rounded rounded-2 p-1"><?php echo $produkt->prodbeskriv ?></p>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/96a3a7d865.js" crossorigin="anonymous"></script>
<script src="global.js"></script>
</body>
</html>
