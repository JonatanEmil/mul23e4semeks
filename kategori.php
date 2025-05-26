<?php
/**
 * @var db $db
 */

require "settings/init.php";

$bind = [];

if (!empty($_GET['kateid'])) {
    $bind[":kateid"] = $_GET['kateid'];
}
if (!empty($_GET['lande'])) {
    $landeFilter = explode(",", $_GET['lande']);
    $placeholders = [];
    foreach ($landeFilter as $index => $id) {
        $key = ":land" . $index;
        $placeholders[] = $key;
        $bind[$key] = $id;
    }

    // Append to existing query condition
    $landCondition = " AND prodland IN (" . implode(",", $placeholders) . ")";
} else {
    $landCondition = "";
}
$produkter = $db->sql('SELECT * FROM produkter  LEFT JOIN lande ON prodland = landeid  INNER JOIN `prod-kat-con` ON prodid = prkacoprodid WHERE prkacokatid = :kateid' . $landCondition, $bind);
$lande = $db->sql('SELECT * FROM lande WHERE 1=1 ORDER BY landenavn ASC');
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
    <div class="row g-4 d-flex page-content bg-rose">
        <p class="h3 m-0"><?php echo $kategoribroed->katenavn ?></p>
        <div class="col-12 col-md-3">
            <div>
                <div class="bg-cream w-100 fw-bold fs-4 text-port text-center">
                    Filtre <i class="fa-solid fa-arrow-down-wide-short"></i>
                </div>
                <button class="btn btn-cream w-100 btn-lg fs-4 fw-bold rounded-0 landefilter">
                    Lande <i class="fa-solid fa-arrows-up-down"></i>
                </button>
                <div class="border-2 border border-cream bg-champagne landefiltercontainer d-none">
                    <?php $selectedLande = !empty($_GET['lande']) ? explode(",", $_GET['lande']) : [];
                    foreach ($lande as $land) {
                        $checked = in_array($land->landeid, $selectedLande) ? "checked" : ""; ?>
                        <div class="form-check border-top border-2 border-port">
                            <input class="form-check-input filtercheck" type="checkbox" value="<?php echo $land->landeid ?>" id="<?php echo $land->landeid ?>" <?php echo $checked ?>>
                            <label class="form-check-label" for="<?php echo $land->landeid ?>">
                                <?php echo $land->landenavn ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="row g-3">
                <?php foreach ($produkter as $produkt) {
                    $imgsize = getimagesize("img/produkter/".$produkt->prodimg);
                    $width = $imgsize[0];
                    $height = $imgsize[1];?>

                    <div class="col-6 col-lg-4 d-flex">
                        <div class="card mb-3 px-1 h-100 w-100">
                            <!-- card content here -->
                            <h5 class="card-title text-center"><?php echo $produkt->prodnavn ?></h5>
                            <div class="row">
                            <div class='<?php echo ($width > $height-200) ? "col-12 mt-2" : "col-4";?> d-flex justify-content-center'>
                                <img class='object-fit-contain' src="img/produkter/<?php echo $produkt->prodimg ?>" alt="<?php echo $produkt->prodnavn ?>" style="height: 20vh">
                            </div>
                            <div class='<?php echo ($width > $height-200) ? "col-12 ms-3" : "col-8";?>'>
                            <div class="card-body p-0 fw-semibold">
                                <p>Kr. <?php echo number_format($produkt->prodpris, 2, ",", ""); ?> pr. stk.</p>

                                <?php if ($produkt->prodkasse === 1): ?>
                                    <p>Kr. <?php echo number_format($produkt->prodkassepris, 2, ",", ""); ?> pr. kasse</p>
                                <?php endif; ?>
                                <?php if (!empty($produkt->prodland)) { ?>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-auto">
                                            <p class="card-text"><?php echo $produkt->landenavn ?></p>
                                        </div>
                                        <div class="col-3 p-1">
                                            <img class="img-fluid" src="img/flag/<?php echo $produkt->landeimg ?>" alt="<?php echo $produkt->landenavn ?>s flag">
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($produkt->prodomraade)) {
                                    echo "<p class='card-text mb-1'>" . $produkt->prodomraade . "</p>";
                                } ?>
                                <button class="btn btn-wine mb-1">Læg i kurv</button>
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
<?php include "footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="global.js"></script>
<script>

    const landefilter = document.querySelector(".landefilter");
    const landefiltercontainer = document.querySelector(".landefiltercontainer");

    landefilter.addEventListener("click", () => {
        landefiltercontainer.classList.toggle("d-none")
    })

    const checkboxes = document.querySelectorAll(".filtercheck");

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("click", () => {
            checkbox.classList.toggle("bg-wine");

            // Now add filtering logic here WITHOUT removing your toggle:
            const selected = [];
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    selected.push(cb.value);
                }
            });

            const urlParams = new URLSearchParams(window.location.search);
            if (selected.length > 0) {
                urlParams.set("lande", selected.join(","));
            } else {
                urlParams.delete("lande");
            }

            // Reload the page with updated filter parameters
            window.location.search = urlParams.toString();
        });
    });

    // On page load, keep filter container visible if any checkbox is checked
    window.addEventListener("DOMContentLoaded", () => {
        const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
        if (anyChecked) {
            landefiltercontainer.classList.remove("d-none");
        }
    });

</script>
</body>
</html>
