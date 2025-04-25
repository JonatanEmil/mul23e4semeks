<?php
/**
 * @var db $db
 */
require "settings/init.php";
$kategorier = $db->sql('SELECT * FROM kategorier ORDER BY katenavn ASC');
$lande = $db->sql('SELECT * FROM lande ORDER BY landenavn ASC');
$butikker = $db->sql('SELECT * FROM butikker ORDER BY butiknavn ASC');
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    
    <title>Indsæt produkt</title>
    
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="container">
    <div class="row mt-5">
        <div class="col-4">
            Billeder her
        </div>
        <div class="col-8 row">
            <div class="mb-3">
                <label for="produktnavn" class="form-label">Indsæt produktnavn</label>
                <input type="text" class="form-control" id="produktnavn">
            </div>
            <div class="col-4">
                    <div class="dropdown mb-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="inside">
                            Vælg kategori(er):
                        </button>
                        <ul class="dropdown-menu wide-dropdown">
                            <?php foreach ($kategorier as $kategori) {?>
                                <li><a class="dropdown-item" href = "#" ><?php echo $kategori->katenavn ?></a></li>
                           <?php }?>
                        </ul>
                    </div>
                <div class="dropdown mb-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="inside">
                        Vælg kategori(er):
                    </button>
                    <ul class="dropdown-menu wide-dropdown">
                        <?php foreach ($lande as $land) {?>
                            <li><a class="dropdown-item" href = "#" ><?php echo $land->landenavn ?></a></li>
                        <?php }?>
                    </ul>
                </div>
                <div class="mb-3">
                    <label for="omraade" class="form-label">Område:</label>
                    <input type="text" class="form-control" id="omraade" placeholder="eksempel: Champagne">
                </div>
            </div>
            <div class="col-4">
                <div class="dropdown mb-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="inside">
                        Vælg kategori(er):
                    </button>
                    <ul class="dropdown-menu wide-dropdown">
                        <?php foreach ($butikker as $butik) {?>
                            <li><a class="dropdown-item" href = "#" ><?php echo $butik->butiknavn ?></a></li>
                        <?php }?>
                    </ul>
                </div>
                <div class="mb-3">
                    <label for="pris" class="form-label">Pris</label>
                    <input type="text" class="form-control" id="pris">
                </div>
                <div class="row">
                    <div class="col-2">
                        Kassepris
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                            <label class="form-check-label" for="checkDefault">
                            </label>
                        </div>
                    </div>
                <div class="mb-3 col-10">
                    <label for="kassepris" class="form-label"></label>
                    <input type="text" class="form-control" id="kassepris" disabled>
                </div>
                </div>
            </div>
            <div class="col-4">

            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
