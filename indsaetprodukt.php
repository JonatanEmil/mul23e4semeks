<?php
/**
 * @var db $db
 */
require "settings/init.php";
$kategorier = $db->sql('SELECT * FROM kategorier ORDER BY katenavn ASC');
$lande = $db->sql('SELECT * FROM lande ORDER BY landenavn ASC');
$butikker = $db->sql('SELECT * FROM butikker ORDER BY butiknavn ASC');

if (!empty($_POST['data'])) {
    $data = $_POST['data'];

    $sqlinsert = "INSERT INTO produkter(prodnavn, prodalt, prodimg, prodpris, prodkasse, prodkassepris, prodbeskriv, prodland, prodomraade) VALUES(:prodnavn, :prodalt, :prodimg, :prodpris, :prodkasse, :prodkassepris, :prodbeskriv, :prodland, :prodomraade)";
    $bind = [":prodalt" => $data["prodalt"], ":prodnavn" => $data["prodnavn"], ":prodimg" => $data["prodimg"], ":prodpris" => $data["prodpris"], ":prodkasse" => $data["prodkasse"], ":prodkassepris" => $data["prodkassepris"], ":prodbeskriv" => $data["prodbeskriv"], ":prodland" => $data["prodland"], ":prodomraade" => $data["prodomraade"]];
    $db->sql($sqlinsert, $bind, false);

    echo "produkter er nu indsat. <a href='indsaetprodukt.php'>indsæt et prdotukt mere</a>";
}
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Indsæt produkt</title>

    <link href="css/styles.css" rel="stylesheet" type="text/css">

</head>

<body>
<form action="indsaetprodukt.php" method="post">
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                <div class="mb-3">
                    <label for="billedetekst" class="form-label">Billede alt tekst:</label>
                    <input type="text" class="form-control" id="billedetekst" name="data[prodalt]">
                </div>
                <div class="mb-3">
                    <label for="billedefil" class="form-label">Upload billede:</label>
                    <input class="form-control" type="file" id="billedefil" name="data[prodimg]">
                </div>
                <div>
                    <img src="" alt="">
                </div>
            </div>
            <div class="col-8 row">
                <div class="mb-3">
                    <label for="produktnavn" class="form-label">Indsæt produktnavn:</label>
                    <input type="text" class="form-control" id="produktnavn" name="data[prodnavn]">
                </div>
                <div class="col-4">
                    <div class="dropdown mb-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="false">
                            Vælg kategori(er):
                        <select class="form-select dropdown-menu wide-dropdown" multiple aria-label="Multiple select example">
                            <?php foreach ($kategorier as $kategori) { ?>
                                <option value="<?php echo $kategori->kateid ?>"><?php echo $kategori->katenavn ?></option>
                            <?php } ?>
                        </select>
                        </button>
                    </div>
                    <div class="dropdown mb-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="false" name="data[prodland]">
                            Vælg land:
                        </button>
                        <ul class="dropdown-menu wide-dropdown">
                            <?php foreach ($lande as $land) { ?>
                                <li><a class="dropdown-item" href="#"><?php echo $land->landenavn ?> </a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="mb-3">
                        <label for="omraade" class="form-label">Område:</label>
                        <input type="text" class="form-control" id="omraade" placeholder="eksempel: Champagne"
                               name="data[proomraade]">
                    </div>
                </div>
                <div class="col-4">
                    <div class="dropdown mb-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="false" name="data[prodalt]">
                            Vælg butik(ker):
                        <select class="form-select dropdown-menu" multiple aria-label="Multiple select example">
                            <?php foreach ($butikker as $butik) { ?>
                                <option value="<?php echo $butik->butikid ?>"><?php echo $butik->butiknavn ?></option>
                            <?php } ?>
                        </select>
                        </button>
                    </div>
                    <div class="mb-3">
                        <label for="pris" class="form-label">Pris inkl. moms (seperer med ,):</label>
                        <input type="number" step="0.01" class="form-control" id="pris" placeholder="eksempel: 99,95"
                               name="data[prodpris]">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            Kassepris inkl. moms:
                        </div>
                        <div class="col-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="kassecheck">
                                <label class="form-check-label" for="kassecheck" name="data[prodkasse]">
                                </label>
                            </div>
                        </div>
                        <div class="col-10">
                            <label for="kassepris" class="form-label"></label>
                            <input type="number" step="0.01" class="form-control" id="kassepris" disabled placeholder="eksempel: 295"
                                   name="data[prodkassepris]">
                        </div>
                    </div>
                </div>
                <div class="col-4">

                </div>
                <div class="mb-3">
                    <label for="produktbeskrivelse" class="form-label">Produktbeskrivelse:</label>
                    <textarea class="form-control" id="produktbeskrivelse" rows="5" name="data[prodbeskriv]"></textarea>
                </div>
                <div class="mb-3">
                    <label for="soegeord" class="form-label">Tags (SEO) (seperer med ,):</label>
                    <input type="text" class="form-control" id="soegeord"
                           placeholder="eksempel: rødvin, rød, vin, slagelse, vinkompagnierne, slagese vinkompagni">
                </div>
                <div class="d-flex justify-content-between gap-3">
                    <input class="btn btn-primary me-5" type="reset" value="Glem oprettelse">
                    <input class="btn btn-primary ms-5" type="button" value="Gem en pdf/udskriv">
                    <input class="btn btn-primary ms-0" type="submit" value="Gem og afslut">
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const kassecheck = document.querySelector("#kassecheck");
    const kassepris = document.querySelector("#kassepris");

    // Lav en funktion der kører hver gang brugeren klikker
    kassecheck.addEventListener('change', function () {
        if (kassecheck.checked) {
            kassepris.removeAttribute("disabled");
        } else {
            kassepris.setAttribute("disabled", "disabled");
        }
    });
</script>
</body>
</html>
