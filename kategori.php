<?php
/**
 * @var db $db
 */

require "settings/init.php";

$bind = [];

if (!empty($_GET['kateid'])) {
    $sqladd = "kateid = :kateid";
    $bind[":kateid"] = $_GET['kateid'];
}
$produkter = $db->sql('SELECT * FROM produkter INNER JOIN `prod-kat-con` ON prodid = prkacoprodid WHERE prkacokatid = :kateid', $bind);

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

<body>
<?php include "header.php"; ?>
<div class="container">
    <div class="row">
        <?php
        foreach ($produkter as $produkt) { ?>
            <div class="col-2"><a><img class="img-fluid" src="img/produkter/<?php echo $produkt->prodimg ?>"
                                       alt="<?php echo $produkt->prodnavn ?> - Vinkompagnierne"></a></div>
        <?php } ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
