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
$produkter = $db->sql('SELECT * FROM produkter INNER JOIN lande ON prodland = landeid INNER JOIN `prod-kat-con` ON prodid = prkacoprodid WHERE prkacokatid = :kateid AND prodid = :prodid', $bind);
$produkt = $produkter[0];
$madikoner = $db->sql('SELECT * FROM `prod-mad-con` INNER JOIN madikoner ON prmacoikonid = ikonid WHERE prmacoprodid = :prodid', [":prodid" => $produkt->prodid]);
$allebutikker = $db->sql('SELECT * FROM butikker');
$prodbutikker = $db->sql('SELECT * FROM `prod-but-con` INNER JOIN butikker ON prbucobutikid = butikid WHERE prbucoprodid = :prodid', [":prodid" => $produkt->prodid]);
$prodbutikarr = [];
foreach ($prodbutikker as $prodbutik) {
    $prodbutikarr[] = $prodbutik->butikid; // OBS: bruger butikid her
}
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

<body class="bg-cream">
<?php include "header.php"; ?>
<br>
<div class="container bg-rose rounded-3">
    <div class="row g-3 page-content text-port align-items-xl-center">
        <h1 class="mb-0 mt-2 fw-bolder d-lg-none"><?php echo $produkt->prodnavn; ?></h1>
        <p class="m-0 fs-4 fw-semibold d-lg-none"><?php echo $produkt->landenavn; ?></p>
        <p class="display-2 fw-bold d-lg-none mb-0">Kr. <?php echo $produkt->prodpris ?> pr. stk.</p>
        <?php if ($produkt->prodkasse === 1) { ?>
            <p class="h5 fw-bold text-wine d-lg-none m-0">Kassepris (6 flasker): Kr. <?php echo $produkt->prodkassepris ?> pr. kasse.</p>
        <?php } ?>
        <div class="col-12 d-md-none">
            <div class="d-flex justify-content-center bg-champagne rounded-2 pt-3 pb-2 me-xl-3 mb-3">
                <img class="img-fluid product-image-size-small" style="" src="img/produkter/<?php echo $produkt->prodimg; ?>"
                     alt="<?php echo $produkt->prodnavn; ?> - Vinkompagnierne">
            </div>
        </div>
        <div class="col-12 d-none d-md-block d-lg-none">
            <div class="d-flex justify-content-center bg-champagne rounded-2 pt-3 pb-2 me-xl-3 mb-3">
                <img class="img-fluid product-image-size-medium" style="" src="img/produkter/<?php echo $produkt->prodimg; ?>"
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
            <h1 class="mb-0 mt-2 d-none d-lg-block"><?php echo $produkt->prodnavn; ?></h1>
            <p class="fs-4 d-none d-lg-block"><?php echo $produkt->landenavn; ?></p>
            <div class="row d-flex justify-content-start align-items-center flex-wrap">
                <?php foreach ($madikoner as $ikon) { ?>
                    <div class="col-auto mt-2 mb-2">
                        <img class="d-none d-lg-block" style="max-height: 75px;" src="img/ikoner/<?php echo $ikon->ikonimg ?>"
                             alt="<?php echo $ikon->ikonnavn ?>">
                        <img class="d-lg-none" style="max-height: 55px;" src="img/ikoner/<?php echo $ikon->ikonimg ?>"
                             alt="<?php echo $ikon->ikonnavn ?>">
                    </div>
                <?php } ?>
            </div>
            <p class="display-2 fw-bold d-none d-lg-block">Kr. <?php echo $produkt->prodpris ?> pr. stk.</p>
            <?php if ($produkt->prodkasse === 1) { ?>
                <p class="h5 fw-bold text-wine d-none d-lg-block">Kassepris (6 flasker): Kr. <?php echo $produkt->prodkassepris ?> pr. kasse.</p>
            <?php } ?>
            <p class="h5 mt-3 mt-lg-5 fs-6">Tilgængelig i disse butikker:</p>
            <div class="row me-xl-2">
            <div class="col-5 col-xl-3">
                <select name="butikker" class="form-select bg-champagne" multiple aria-label="butikker" disabled>
                    <?php foreach ($allebutikker as $butik) { ?>
                        <option class="text-port" value="<?php echo $butik->butikid ?>"
                            <?php echo in_array($butik->butikid, $prodbutikarr) ? "selected" : ""; ?>>
                            <?php echo $butik->butiknavn ?>
                        </option>
                    <?php } ?>
                </select>
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
<br>
<br>
<br>
<br>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
