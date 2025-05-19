<?php
/**
 * @var db $db
 */

require "settings/init.php";

$bind = [];

if (!empty($_GET['kateid'])) {
    $bind[":kateid"] = $_GET['kateid'];
}
$produkter = $db->sql('SELECT * FROM produkter LEFT JOIN lande ON prodland = landeid INNER JOIN `prod-kat-con` ON prodid = prkacoprodid WHERE prkacokatid = :kateid', $bind);

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

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-champagne">
<?php include "header.php"; ?>
<div class="container">
    <div class="row g-4 d-flex page-content ">
        <div class="col-3">
            Filter menu
        </div>
        <div class="col-9">
            <div class="row g-3">
                <?php foreach ($produkter as $produkt) { ?>
                    <div class="col-md-4 d-flex">
                        <div class="card mb-3 p-2 h-100 w-100">
                            <!-- card content here -->
                            <h5 class="card-title"><?php echo $produkt->prodnavn ?></h5>
                            <div class="row">
                                <div class="col-4 d-flex justify-content-center">
                                    <img src="img/produkter/<?php echo $produkt->prodimg ?>" class="img-fluid" alt="<?php echo $produkt->prodnavn ?> - Vinkompagnierne" style="height: 20vh">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                    <p>Kr. <?php echo $produkt->prodpris ?> pr. stk.</p>

                                        <?php if ($produkt->prodkasse === 1) {
                                            echo "<p>Kr. ".  $produkt->prodkassepris . " pr. kasse</p>";
                                        }
                                        if (!empty($produkt->prodland)) {
                                       echo '<p class="card-text">' . $produkt->landenavn .'</p>';
                                        }
                                        if (!empty($produkt->prodomraade)) {
                                       echo '<p class="card-text">' . $produkt->prodomraade .'</p>';
                                          }
                                        ?>
                                        <a class="stretched-link" href="produkt.php?kateid=<?php echo $produkt->prkacokatid ?>&prodid=<?php echo $produkt->prodid; ?>"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
