<?php
/**
 * @var db $db
 */
require "settings/init.php";
$uploadDir = "img/produkter/";
$imageName = null;

if (!empty($_FILES['data']['name']['prodimg'])) {
    $imageName = basename($_FILES['data']['name']['prodimg']);
    $targetFile = $uploadDir . $imageName;

    // Flyt filen til mappen
    if (move_uploaded_file($_FILES['data']['tmp_name']['prodimg'], $targetFile)) {
        // Success
    } else {
        echo "Fejl ved upload af billede!";
        $imageName = null;
    }
}
$kategorier = $db->sql('SELECT * FROM kategorier ORDER BY katenavn ASC');
$lande = $db->sql('SELECT * FROM lande ORDER BY landenavn ASC');
$butikker = $db->sql('SELECT * FROM butikker ORDER BY butiknavn ASC');
$ikoner = $db->sql('SELECT * FROM madikoner ORDER BY ikonnavn ASC');

if (!empty($_POST['data'])) {
    $data = $_POST['data'];

    $sqlinsert = "INSERT INTO produkter(prodnavn, prodalt, prodimg, prodpris, prodkasse, prodkassepris, prodbeskriv, prodland, prodomraade) VALUES(:prodnavn, :prodalt, :prodimg, :prodpris, :prodkasse, :prodkassepris, :prodbeskriv, :prodland, :prodomraade)";
    $bind = [
        ":prodalt" => $data["prodalt"],
        ":prodnavn" => $data["prodnavn"],
        ":prodimg" => $imageName, // her!
        ":prodpris" => $data["prodpris"],
        ":prodkasse" => $data["prodkasse"],
        ":prodkassepris" => $data["prodkassepris"],
        ":prodbeskriv" => $data["prodbeskriv"],
        ":prodland" => $data["prodland"],
        ":prodomraade" => $data["prodomraade"]
    ];
    $result = $db->sql($sqlinsert, $bind, false);
    $productId = $result->lastInsertId();


    $valgtkategorier = $_POST["kategorier"];

   if(!empty($valgtkategorier)) {
        foreach ($valgtkategorier as $kategori) {
            $prodkateinsert = "INSERT INTO prod-kat-con(prkacoprodid, prkacokatid) VALUES(:prkacoprodid, :prkacokatid)";
            $bind = ["prkacoprodid" => $productId, "prkacokatid" => $kategori];
            $db->sql($prodkateinsert, $bind, false);
    }
    }
    $valgtbutikker = $_POST["butikker"];

    if(!empty($valgtbutikker)) {
        foreach ($valgtbutikker as $butik) {
            $prodbutikinsert = "INSERT INTO prod-but-con(prbucoprodid, prbucobutikid) VALUES(:prbucoprodid, :prbucobutikid)";
            $bind = ["prbucoprodid" => $productId, "prbucobutikid" => $butik];
            $db->sql($prodbutikinsert, $bind, false);
        }
    }
    $valgtikoner = $_POST["ikoner"];

    if(!empty($valgtikoner)) {
        foreach ($valgtikoner as $ikon) {
            $prodikoninsert = "INSERT INTO prod-mad-con(prmacoprodid, prmacoikonid) VALUES(:prmacoprodid, :prmacoikonid)";
            $bind = ["prmacoprodid" => $productId, "prmacoikonid" => $ikon];
            $db->sql($prodikoninsert, $bind, false);
        }
    }

    $valgtsoegeord = $_POST["ikoner"];

    if(!empty($valgsoegeord)) {
        foreach ($valgsoegeord as $soegeord) {
            $prodsoeginsert = "INSERT INTO prod_soeg_con(prodid, soegeordid) VALUES(:prodid, :soegeordid)";
            $bind = ["prodid" => $productId, "soegeordid" => $soegeord];
            $db->sql($prodsoeginsert, $bind, false);
        }
    }



    echo "Produktet er nu indsat.<br>";
    if ($imageName) {
        echo "<img src='img/$imageName' alt='" . htmlspecialchars($data["prodalt"]);
    }
    echo "<br><a href='indsaetprodukt.php'>Indsæt et produkt mere</a>";
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
<form action="indsaetprodukt.php" method="post" enctype="multipart/form-data">
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
                <div class="d-flex justify-content-center">
                    <img id="previewImage" src="" alt="Billedeforhåndsvisning" class="img-fluid" style="height: 25em">
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
                        <select name="kategorier[]" class="form-select dropdown-menu wide-dropdown katedropdown" multiple aria-label="Multiple select example">
                            <?php foreach ($kategorier as $kategori) { ?>
                                <option class="katedropdownitem" value="<?php echo $kategori->kateid ?>"><?php echo $kategori->katenavn ?></option>
                            <?php } ?>
                        </select>
                        </button>
                    </div>
                    <div class="valgtekateshow">

                    </div>
                    <div class="dropdown mb-3">
                        <button class="btn btn-secondary dropdown-toggle landdropdown" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="false" name="data[prodland]">
                            Vælg land:
                        </button>
                        <ul class="dropdown-menu wide-dropdown">
                            <?php foreach ($lande as $land) { ?>
                                <li><a class="dropdown-item landdropdownmenu"><?php echo $land->landenavn ?> </a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="mb-3">
                        <label for="omraade" class="form-label">Område:</label>
                        <input type="text" class="form-control" id="omraade" placeholder="eksempel: Champagne"
                               name="data[prodomraade]">
                    </div>
                </div>
                <div class="col-4">
                    <div class="dropdown mb-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="false" name="data[prodalt]">
                            Vælg butik(ker):
                        <select name="butikker[]" class="form-select dropdown-menu" multiple aria-label="Multiple select example">
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
                    <div>
                        Vælg ikon(er):
                        <select name="ikoner[]" class="form-select" multiple aria-label="Multiple select example">
                            <?php foreach ($ikoner as $ikon) { ?>
                                <option value="<?php echo $ikon->ikonid ?>"><img src="img/ikoner/<?php echo $ikon->ikonimg ?>" alt="<?php echo $ikon->ikonnavn ?>"> <?php echo $ikon->ikonnavn ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="produktbeskrivelse" class="form-label">Produktbeskrivelse:</label>
                    <textarea class="form-control" id="produktbeskrivelse" rows="5" name="data[prodbeskriv]"></textarea>
                </div>
                <div class="mb-3">
                    <label for="soegeord" class="form-label">Tags (SEO) (seperer med ,):</label>
                    <input type="text" class="form-control" id="soegeord" name="soegeord[]"
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

    const fileInput = document.querySelector("#billedefil");
    const previewImg = document.querySelector("#previewImage");

    fileInput.addEventListener("change", function () {
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewImg.src = e.target.result;
                previewImg.alt = file.name;
            }

            reader.readAsDataURL(file); // Læs billedet som base64
        } else {
            previewImg.src = "";
            previewImg.alt = "Intet billede valgt";
        }
    });

    const valgtlandLinks = document.querySelectorAll(".landdropdownmenu");
    const landButton = document.querySelector(".landdropdown");

    valgtlandLinks.forEach(link => {
        link.addEventListener("click", () => {
            const valgtNavn = link.textContent.trim();
            landButton.textContent = valgtNavn;
        });
    });


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
