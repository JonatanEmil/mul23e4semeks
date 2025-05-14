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

<body class="bg-champagne">
<?php include "header.php"; ?>
<div class="container">
    <div class="row g-3 page-content">
        <div class="col-5">
            <div class="d-flex justify-content-center">
                <img class="" src="img/produkter/<?php echo $produkt->prodimg; ?>" alt="<?php echo $produkt->prodnavn; ?> - Vinkompagnierne">
            </div>
        </div>
        <div class="col-7">
            <h1 class="mb-0"><?php echo $produkt->prodnavn;?></h1>
            <p><?php echo $produkt->landenavn;?></p>
            <?php foreach ($madikoner as $ikon) {?>
                <img class="img-fluid" style="height: 3vw" src="img/ikoner/<?php echo $ikon->ikonimg?>" alt="<?php echo $ikon->ikonnavn?>">
            <?php } ?>
            <p class="display-2 fw-bold">Kr. <?php echo $produkt->prodpris?> pr. stk.</p>
            <?php if ($produkt->prodkasse === 1) {?>
                <p class="h5 fw-bold">Kassepris (6 flasker): Kr. <?php echo $produkt->prodkassepris?> pr. kasse.</p>
            <?php }?>
            <select class="form-select" aria-label="Default select example"> <!-- Se kim video vil gerne have den expanded -->
                <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
            </select>
        </div>
    </div>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
