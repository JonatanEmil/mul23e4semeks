<?php
/**
 * @var db $db
 */

require "settings/init.php";

// Hårdkodet liste af produkt-ID'er
$ids = [1, 4, 6, 10];
$idList = implode(",", $ids);

// Hent produkter med lande og kategorier
$sql = "
    SELECT 
        produkter.*, 
        lande.*, 
        kategorier.katenavn, 
        kategorier.kateid 
    FROM produkter 
    LEFT JOIN lande ON prodland = landeid  
    INNER JOIN `prod-kat-con` ON prodid = prkacoprodid 
    INNER JOIN kategorier ON prkacokatid = kateid
    WHERE prodid IN ($idList)
";

$produktData = $db->sql($sql);

// Saml unikke produkter og deres kategorier
$produkter = [];

foreach ($produktData as $row) {
    $id = $row->prodid;

    if (!isset($produkter[$id])) {
        $produkter[$id] = $row;
        $produkter[$id]->kategorier = [];
        $produkter[$id]->katids = [];
    }

    // Tilføj kategori hvis den ikke allerede er tilføjet
    if (!in_array($row->katenavn, $produkter[$id]->kategorier)) {
        $produkter[$id]->kategorier[] = $row->katenavn;
        $produkter[$id]->katids[] = $row->kateid;
    }
}
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Vinkompagnierne</title>
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php include "header.php"; ?>
<div class="container page-content">
    <div class="row">
        <div class="col-12">
            <div>
                <img class="img-fluid rounded-2" src="img/herolarge.webp" alt="Fordi hvert glas har sin anledning - Hero Image">
            </div>
            <div class="position-relative">
                <div class="carousel">
                    <div class="carousel-fixed-item">
                        <div class="navigator-icon nav-icon-left">←</div>
                        <div class="navigator-icon nav-icon-right">→</div>
                    </div>

                    <div class="carousel-item active"><img class="img-fluid" src="img/slider1.png" /></div>
                    <div class="carousel-item"><img class="img-fluid" src="img/slider2.png" /></div>
                    <div class="carousel-item"><img class="img-fluid" src="img/slider3.png" /></div>
                    <div class="carousel-item"><img class="img-fluid" src="img/slider4.png" /></div>
                    <div class="carousel-item"><img class="img-fluid" src="img/slider5.png" /></div>
                </div>

                <div class="carousel-indicators">
                    <div class="dots">
                        <span class="dot active" data-index="0"></span>
                        <span class="dot" data-index="1"></span>
                        <span class="dot" data-index="2"></span>
                        <span class="dot" data-index="3"></span>
                        <span class="dot" data-index="4"></span>
                    </div>
                </div>
            </div>
            <div class="col-12 row g-2">
                <p class="h1 text-center text-port">Produkter anbefalet af os:</p>
                <?php foreach ($produkter as $produkt) { ?>
                    <div class="col-12 col-md-6 col-xxl-3 d-flex">
                        <div class="card mb-3 p-2 h-100 w-100">
                            <h5 class="card-title"><?php echo $produkt->prodnavn ?></h5>
                            <div class="row">
                                <div class="col-4 d-flex justify-content-center">
                                    <img src="img/produkter/<?php echo $produkt->prodimg ?>" class="img-fluid" alt="<?php echo $produkt->prodnavn ?> - Vinkompagnierne" style="height: 20vh">
                                </div>
                                <div class="col-8">
                                    <div class="card-body fw-semibold">
                                        <p>Kr. <?php echo number_format($produkt->prodpris, 2, ",", ""); ?> pr. stk.</p>

                                        <?php if ($produkt->prodkasse === 1): ?>
                                            <p>Kr. <?php echo number_format($produkt->prodkassepris, 2, ",", ""); ?> pr. kasse</p>
                                        <?php endif; ?>
                                        <button class="btn btn-wine mb-1">Læg i kurv</button>

                                        <?php if (!empty($produkt->landenavn)): ?>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-auto">
                                            <p class="card-text"><?php echo $produkt->landenavn ?></p>
                                            </div>
                                            <div class="col-3 p-1">
                                                <img class="img-fluid" src="img/flag/<?php echo $produkt->landeimg ?>" alt="<?php echo $produkt->landenavn ?>s flag">
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($produkt->prodomraade)): ?>
                                            <p class="card-text"><?php echo $produkt->prodomraade ?></p>
                                        <?php endif; ?>

                                        <?php if (!empty($produkt->kategorier)): ?>
                                            <p class="card-text">
                                                <?php echo implode(", ", $produkt->kategorier); ?>
                                            </p>
                                        <?php endif; ?>
                                        <button class="btn btn-wine mb-1">Læs mere</button>
                                        <!-- Link med første kateid -->
                                        <a class="stretched-link" href="produkt.php?kateid=<?php echo $produkt->katids[0]; ?>&prodid=<?php echo $produkt->prodid; ?>"></a>
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

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="global.js"></script>
<script>
    $(document).ready(function () {
        const carouselElem = document.querySelector('.carousel');
        const instance = M.Carousel.init(carouselElem, {
            indicators: false,
            duration: 0
        });

        const $dots = $('.dot');

        function updateDots() {
            const activeIndex = instance.center % $dots.length;
            $dots.removeClass('active');
            $dots.eq(activeIndex).addClass('active');
        }

        $('.nav-icon-left').click(function (e) {
            e.stopPropagation();
            instance.prev();
        });

        $('.nav-icon-right').click(function (e) {
            e.stopPropagation();
            instance.next();
        });

        $dots.click(function () {
            const index = $(this).data('index');
            instance.set(index);
        });

        // Opdater hele tiden for drag/swipe
        setInterval(updateDots, 300);
    });
</script>
</body>
</html>
