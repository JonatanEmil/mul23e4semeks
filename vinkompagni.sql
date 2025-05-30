-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1:3306
-- Genereringstid: 27. 05 2025 kl. 08:37:47
-- Serverversion: 8.2.0
-- PHP-version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinkompagni`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `butikker`
--

DROP TABLE IF EXISTS `butikker`;
CREATE TABLE IF NOT EXISTS `butikker` (
  `butikid` int NOT NULL AUTO_INCREMENT,
  `butiknavn` varchar(200) NOT NULL,
  `butikbeskriv` text NOT NULL,
  PRIMARY KEY (`butikid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Data dump for tabellen `butikker`
--

INSERT INTO `butikker` (`butikid`, `butiknavn`, `butikbeskriv`) VALUES
(1, 'Slagelse', ''),
(2, 'Næstved', ''),
(3, 'Greve', ''),
(4, 'Hillerød', '');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `kategorier`
--

DROP TABLE IF EXISTS `kategorier`;
CREATE TABLE IF NOT EXISTS `kategorier` (
  `kateid` int NOT NULL AUTO_INCREMENT,
  `katenavn` varchar(200) NOT NULL,
  `kateimg` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `katebeskriv` text NOT NULL,
  PRIMARY KEY (`kateid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Data dump for tabellen `kategorier`
--

INSERT INTO `kategorier` (`kateid`, `katenavn`, `kateimg`, `katebeskriv`) VALUES
(3, 'RØDVIN', 'roedvin.webp', ''),
(4, 'HVIDVIN', 'hvidvin.webp', ''),
(5, 'ROSÉVIN', 'rosevin.webp', ''),
(6, 'MOUSSERENDE VIN', 'mousserendevin.webp', ''),
(7, 'DESSERTVIN', 'dessertvin.webp', ''),
(8, 'PORTVIN', 'portvin.webp', ''),
(9, 'ALKOHOLFRI', 'alkoholfri.webp', ''),
(10, 'ØKOLOGISK', 'oekologisk.webp', ''),
(11, 'BAG-IN-BOX', 'baginbox.webp', ''),
(12, 'VEGANSK', 'vegansk.webp', ''),
(13, 'EGNE PRODUKTER', 'logosimpel.webp', ''),
(14, 'BITTER', 'bitter.webp', ''),
(15, 'LIKØR', 'likoer.webp', ''),
(17, 'COGNAC', 'cognac.webp', ''),
(18, 'GIN', 'gin.webp', ''),
(20, 'ROM', 'rom.webp', ''),
(22, 'SNAPS', 'snaps.webp', ''),
(23, 'VODKA', 'vodka.webp', ''),
(25, 'CIGARER', 'cigar.webp', ''),
(26, 'LÆKKERIER', 'laekkerier.webp', ''),
(27, 'GAVEKORT', 'gavekort.webp', ''),
(28, 'KILDEVAND', 'kildevand.webp', ''),
(29, 'TONICVAND', 'tonicvand.webp', ''),
(30, 'PILSNER', 'pilsner.webp', ''),
(31, 'ALE', 'ale.webp', ''),
(32, 'KØB SMAGEKASSER', 'smagekasser.webp', '');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `lande`
--

DROP TABLE IF EXISTS `lande`;
CREATE TABLE IF NOT EXISTS `lande` (
  `landeid` int NOT NULL AUTO_INCREMENT,
  `landenavn` varchar(200) NOT NULL,
  `landeimg` varchar(500) NOT NULL,
  `landebeskriv` text NOT NULL,
  PRIMARY KEY (`landeid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Data dump for tabellen `lande`
--

INSERT INTO `lande` (`landeid`, `landenavn`, `landeimg`, `landebeskriv`) VALUES
(1, 'Argentina', 'argentina.webp', ''),
(2, 'Australien', 'australien.webp', ''),
(3, 'Chile', 'chile.webp', ''),
(4, 'Frankrig', 'frankrig.webp', ''),
(5, 'USA', 'usa.webp', ''),
(6, 'Italien', 'italien.webp', ''),
(7, 'Mexico', 'mexico.webp', ''),
(8, 'New Zealand', 'newzealand.webp', ''),
(9, 'Portugal', 'portugal.webp', ''),
(10, 'Spanien', 'spanien.webp', ''),
(11, 'Sydafrika', 'sydafrika.webp', ''),
(12, 'Tyskland', 'tyskland.webp', ''),
(13, 'Østrig', 'oestrig.webp', ''),
(14, 'Danmark', 'danmark.webp', ''),
(15, 'England', 'england.webp', ''),
(16, 'Cypern', 'cypern.webp', ''),
(17, 'Irland', 'irland.webp', ''),
(18, 'Skotland', 'skotland.webp', '');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `madikoner`
--

DROP TABLE IF EXISTS `madikoner`;
CREATE TABLE IF NOT EXISTS `madikoner` (
  `ikonid` int NOT NULL AUTO_INCREMENT,
  `ikonnavn` varchar(200) NOT NULL,
  `ikonimg` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ikonid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Data dump for tabellen `madikoner`
--

INSERT INTO `madikoner` (`ikonid`, `ikonnavn`, `ikonimg`) VALUES
(1, 'And', 'and.webp'),
(2, 'Chokolade', 'chokolade.webp'),
(3, 'Eksotiske frugter', 'eksotiskfrugt.webp'),
(4, 'Lam/får', 'faar.webp'),
(5, 'Frugter', 'frugt.webp'),
(6, 'Grillmad/Røget mad', 'grill.webp'),
(7, 'Svinekød', 'gris.webp'),
(8, 'Hvid fisk', 'hvidfisk.webp'),
(9, 'Søde desserter som kage', 'kage.webp'),
(10, 'Oksekød', 'ko.webp'),
(11, 'Krydret mad', 'krydret.webp'),
(12, 'Kylling', 'kylling.webp'),
(13, 'Ost', 'ost.webp'),
(14, 'Lette pastaretter', 'pasta.webp'),
(15, 'Rød fisk', 'roedfisk.webp'),
(16, 'Skaldyr', 'skaldyr.webp'),
(17, 'Suppe', 'suppe.webp'),
(18, 'Tapas', 'tapas.webp'),
(19, 'Veganske retter/retter med grøntsager som stjernen', 'vegansk.webp'),
(20, 'Vildt', 'vildt.webp');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `overkategorier`
--

DROP TABLE IF EXISTS `overkategorier`;
CREATE TABLE IF NOT EXISTS `overkategorier` (
  `overkateid` int NOT NULL AUTO_INCREMENT,
  `overkatenavn` varchar(200) NOT NULL,
  PRIMARY KEY (`overkateid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Data dump for tabellen `overkategorier`
--

INSERT INTO `overkategorier` (`overkateid`, `overkatenavn`) VALUES
(1, 'VINE'),
(2, 'ØL'),
(3, 'SPIRITUS'),
(4, 'ØVRIGE'),
(5, 'SMAGSPRØVER');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `overkat_underkat_con`
--

DROP TABLE IF EXISTS `overkat_underkat_con`;
CREATE TABLE IF NOT EXISTS `overkat_underkat_con` (
  `overkatid` int NOT NULL,
  `underkatid` int NOT NULL,
  PRIMARY KEY (`overkatid`,`underkatid`),
  UNIQUE KEY `unique_relation` (`overkatid`,`underkatid`),
  KEY `underkatid` (`underkatid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Data dump for tabellen `overkat_underkat_con`
--

INSERT INTO `overkat_underkat_con` (`overkatid`, `underkatid`) VALUES
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 9),
(3, 9),
(1, 10),
(2, 10),
(3, 10),
(1, 11),
(1, 12),
(2, 12),
(3, 12),
(1, 13),
(2, 13),
(3, 13),
(3, 14),
(3, 15),
(3, 17),
(3, 18),
(3, 20),
(3, 22),
(3, 23),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(2, 30),
(2, 31),
(5, 32);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `prod-but-con`
--

DROP TABLE IF EXISTS `prod-but-con`;
CREATE TABLE IF NOT EXISTS `prod-but-con` (
  `prbucoid` int NOT NULL AUTO_INCREMENT,
  `prbucoprodid` int NOT NULL,
  `prbucobutikid` int NOT NULL,
  PRIMARY KEY (`prbucoid`),
  KEY `prbucobutikid` (`prbucobutikid`),
  KEY `prbucoprodid` (`prbucoprodid`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Data dump for tabellen `prod-but-con`
--

INSERT INTO `prod-but-con` (`prbucoid`, `prbucoprodid`, `prbucobutikid`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 1),
(4, 4, 3),
(5, 4, 1),
(6, 5, 3),
(7, 5, 1),
(8, 6, 3),
(9, 6, 4),
(10, 6, 2),
(11, 6, 1),
(12, 7, 2),
(13, 7, 1),
(14, 8, 2),
(15, 8, 1),
(16, 9, 2),
(17, 9, 1),
(18, 10, 3),
(19, 10, 4),
(20, 10, 2),
(21, 10, 1),
(22, 11, 3),
(23, 11, 4),
(24, 11, 2),
(25, 11, 1),
(26, 12, 3),
(27, 12, 4),
(28, 12, 2),
(29, 12, 1),
(30, 13, 3),
(31, 13, 4),
(32, 13, 2),
(33, 13, 1),
(34, 14, 3),
(35, 14, 4),
(36, 14, 2),
(37, 14, 1),
(38, 15, 2),
(39, 15, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `prod-kat-con`
--

DROP TABLE IF EXISTS `prod-kat-con`;
CREATE TABLE IF NOT EXISTS `prod-kat-con` (
  `prkacoid` int NOT NULL AUTO_INCREMENT,
  `prkacoprodid` int NOT NULL,
  `prkacokatid` int NOT NULL,
  PRIMARY KEY (`prkacoid`),
  KEY `prkacoprodid` (`prkacoprodid`),
  KEY `prkacokatid` (`prkacokatid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Data dump for tabellen `prod-kat-con`
--

INSERT INTO `prod-kat-con` (`prkacoid`, `prkacoprodid`, `prkacokatid`) VALUES
(1, 1, 3),
(2, 2, 15),
(3, 3, 18),
(4, 4, 15),
(5, 4, 10),
(6, 5, 15),
(7, 5, 10),
(8, 6, 3),
(9, 7, 32),
(10, 8, 32),
(11, 9, 32),
(12, 10, 9),
(13, 10, 13),
(14, 10, 6),
(15, 10, 5),
(16, 11, 13),
(17, 11, 4),
(18, 11, 6),
(19, 12, 13),
(20, 12, 6),
(21, 12, 5),
(22, 13, 13),
(23, 13, 4),
(24, 14, 13),
(25, 14, 3),
(26, 15, 9),
(27, 15, 3),
(28, 5, 9);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `prod-mad-con`
--

DROP TABLE IF EXISTS `prod-mad-con`;
CREATE TABLE IF NOT EXISTS `prod-mad-con` (
  `prmacoid` int NOT NULL AUTO_INCREMENT,
  `prmacoprodid` int NOT NULL,
  `prmacoikonid` int NOT NULL,
  PRIMARY KEY (`prmacoid`),
  KEY `prmacoikonid` (`prmacoikonid`),
  KEY `prmacoprodid` (`prmacoprodid`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Data dump for tabellen `prod-mad-con`
--

INSERT INTO `prod-mad-con` (`prmacoid`, `prmacoprodid`, `prmacoikonid`) VALUES
(1, 1, 1),
(2, 1, 6),
(3, 1, 11),
(4, 1, 12),
(5, 1, 10),
(6, 1, 7),
(7, 1, 18),
(8, 1, 20),
(9, 2, 1),
(10, 2, 3),
(11, 2, 5),
(12, 2, 6),
(13, 2, 12),
(14, 2, 4),
(15, 2, 10),
(16, 2, 9),
(17, 2, 7),
(18, 3, 6),
(19, 3, 8),
(20, 3, 11),
(21, 3, 14),
(22, 3, 13),
(23, 3, 16),
(24, 3, 17),
(25, 3, 18),
(26, 3, 19),
(27, 4, 3),
(28, 4, 5),
(29, 4, 9),
(30, 5, 3),
(31, 5, 5),
(32, 5, 9),
(33, 6, 1),
(34, 6, 6),
(35, 6, 11),
(36, 6, 4),
(37, 6, 10),
(38, 6, 7),
(39, 6, 18),
(40, 6, 20),
(41, 10, 6),
(42, 10, 11),
(43, 10, 12),
(44, 10, 13),
(45, 10, 9),
(46, 10, 18),
(47, 11, 2),
(48, 11, 6),
(49, 11, 11),
(50, 11, 12),
(51, 12, 6),
(52, 12, 11),
(53, 12, 12),
(54, 13, 8),
(55, 13, 12),
(56, 13, 16),
(57, 14, 1),
(58, 14, 6),
(59, 14, 11),
(60, 14, 12),
(61, 14, 4),
(62, 14, 14),
(63, 14, 10),
(64, 14, 7),
(65, 14, 20),
(66, 15, 3),
(67, 15, 5),
(68, 15, 12),
(69, 15, 14),
(70, 15, 7),
(71, 15, 18),
(72, 15, 19);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `produkter`
--

DROP TABLE IF EXISTS `produkter`;
CREATE TABLE IF NOT EXISTS `produkter` (
  `prodid` int NOT NULL AUTO_INCREMENT,
  `prodnavn` varchar(200) NOT NULL,
  `prodpris` decimal(6,2) NOT NULL,
  `prodkasse` tinyint(1) DEFAULT '0',
  `prodkassepris` decimal(6,2) DEFAULT NULL,
  `prodimg` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prodbeskriv` text NOT NULL,
  `prodland` int DEFAULT NULL,
  `prodomraade` varchar(100) DEFAULT NULL,
  `prodalt` varchar(200) NOT NULL,
  PRIMARY KEY (`prodid`),
  KEY `prodland` (`prodland`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Data dump for tabellen `produkter`
--

INSERT INTO `produkter` (`prodid`, `prodnavn`, `prodpris`, `prodkasse`, `prodkassepris`, `prodimg`, `prodbeskriv`, `prodland`, `prodomraade`, `prodalt`) VALUES
(1, 'Castillo del Mago Garnacha', 39.00, 1, 234.00, 'Castillo_del_Mago_Garnacha_3.webp', 'Denne Garnacha og Tempranillo har en rubinrød farve i glasset. Bouqueten er fint duftende og frisk med noter af hindbær og mørke kirsebær.\r\n\r\nEn forførende og velsmagende vin, som er lige til og nyde. Den er afbalanceret og med en fin let syrlighed.\r\n\r\nCastillo del Mago skal nydes med lidt køling ved 14 grader, så fremtræder vines lækre, smagfulde frugt i dybden.\r\n\r\nFadlagring i 3 måneder.\r\n\r\nVinen er meget velegnet til spansk Tapas, kyllingeretter som spansk kyllingegryde, vildt, svinekød, grillet kød, danske farsretter, fuglevildt, krydret mad, buffet eller blot et glas i utide.\r\n\r\nEn kasse indeholder 6 flasker - 75 cl. 14 % Alkohol\r\n\r\nBodegas Agustin Cubero\r\n\r\nBodegas Agustin Cubero blev grundlagt i 1881 i Gordojos, en lille landsby nær Calatayud, og er stadig en vingård med en stærk familietradition. Det drives nu af den femte generation af familien. Med en gennemsnitstemperatur på 14º C, en maksimal årlig nedbør på 350 mm og en højde på over 600 m, er betingelserne for at dyrke vin optimale. De laver bevidst et udbytte pr. vinstok, som er 1,5 til 2 kg.\r\n\r\nMed hjælp fra et fremragende hold af ønologer, lykkes det bodegaen at producere højkvalitetsvine til en overkommelig pris, på en imponerende måde.', 10, 'Calatayud', 'Castillo del Mago Garnacha - Vinkompagnierne'),
(2, 'Kastanjelikør - Liqueur de Châtaigne Jean Gauthier', 249.00, 0, NULL, 'Kastanjelik__r___Liqueur_de_Ch__taigne_Jean_Gauthier_4.webp', 'Kastanjelikøren fra Gauthier hører til de søde sager. Det er en vel-afbalanceret likør lavet på kastanjer fra Ardeche i Sydfrankrig. I dette område er der i generationer blevet lavet fantastiske likører, men kastanjelikøren overgår dem alle. Alle, der smager den, overraskes over, at der virkelig er noget der smager så godt.\n\nKun fantasien sætter grænser for, hvad denne helt unikke likør kan bruges til. Her er nogle eksempler:  \n\n- Drikkes til kaffen\n- Hældes i kaffen\n- Hældes over en isdessert\n- Drikkes til ris á la manden\n- Vendes i flødeskum til lagkage og anden dessert\n- Kan dryppes på lagkagebunde\n- Kan hældes over pandekager med is\n- Bruges i marinader til kød\n- Hældes i den brune sovs i stedet for sukker\n- Blandes 1 del brandy og 1 del kastanielikør\n- Blandes 1 del vodka og 2 dele kastanielikør\n- Drikkes kold fra køleskabet eller med en isklump\n- Blandes i mousserende vin til velkomstdrink\n- Bruges ofte i Frankrig til at hælde i tør hvidvin\n- Bruges i marinader til kød\n- Hældes i den brune sovs i stedet for sukker\n- Kan generelt bruges som sødme og smagsforstærker i næsten alle slags kager og meget mere…\n\nFlasken indeholder 70 cl.  18 % alkohol.', 4, ' Rhône', 'Kastanjelikør - Liqueur de Châtaigne Jean Gauthier - Vinkompagnierne'),
(3, 'Ene Organic Gin - Tomato', 399.00, 0, NULL, 'Ene_Organic_Gin___Tomato_5.webp', 'ENE Tomato er en ny og spændende variant, som på trods af navnet har en ren og klar smag. Det er ikke meningen at den skal smage af tomat, men dufter du til den, giver den et hint af urter og væksthus med tomater. \r\n\r\nEr lavet til at give den bedste Bloody Mary, men kan også nydes med et frisk blad basilikum, en tørret tomat skive akkompagneret af en lidt aromatisk tonic som Fever Tree Aromatic. ', 14, 'Bornholm', 'Ene Organic Gin - Tomato - Vinkompagnierne'),
(4, 'Pallini Limoncello Citronlikør 26% alk.', 149.00, 0, NULL, 'Pallini_Limoncello_Citronlik__r_26__alk__6.webp', 'Dejlig sødme, og sammen med den dejlige friske citron smag, er den intet mindre end fantastisk. Serveres iskold efter et måltid, men kan med fordel blandes med tonic eller soda som en opfriskende drink eller aperitif. Dette er den klassiske Citronlikør som man altid får i det sydlige Italien.\r\n\r\nÅRETS LIMONCELLO SPRITZ - SKAL PRØVES!\r\n\r\nEt stort glas\r\nTilsæt et halv glas med isterninger\r\n2 dele Limoncello\r\n3 dele Prosecco Rose fra Le Contesse\r\n\r\nSmag løs!!', 6, 'Amalfi', 'Pallini Limoncello Citronlikør 26% alk. - Vinkompagnierne'),
(5, 'Pallini Limonzero – Alkoholfri Limoncello', 129.00, 0, NULL, 'Pallini_Limonzero_____Alkoholfri_Limoncello_7.webp', 'Smagen af Italien – uden alkohol\r\n\r\nPallini Limonzero er verdens første alkoholfrie limoncello, skabt af den berømte Pallini-familie i Italien. Denne unikke drik fremstilles med håndplukkede Sfusato-citroner fra Amalfikysten, hvilket giver en forfriskende og autentisk citronsmag, der transporterer dig direkte til Syditaliens solrige landskab.\r\n\r\nPerfekt til enhver anledning\r\n\r\nLimonzero kan serveres iskold direkte fra fryseren, over isterninger eller som en del af kreative, alkoholfrie cocktails. Prøv den i en lækker Pallini Spritz ved at kombinere den med alkoholfri mousserende vin og et strejf af frisk mynte.\r\n\r\nPrisvindende kvalitet\r\n\r\nPallini Limonzero har vundet den prestigefyldte Master Award ved Global Spirits Masters Competition og er elsket for sin naturlige smag og silkebløde tekstur. Med sit lave kalorieindhold og rene ingredienser er den også et perfekt valg for dem, der søger en sundere, men stadig udsøgt nydelse.\r\n\r\nIngredienser og detaljer\r\n\r\nFremstillet med håndplukkede Sfusato-citroner fra Amalfikysten.\r\n100 % naturlige ingredienser – uden kunstige tilsætningsstoffer.\r\nAlkohol: 0 %\r\nFlaskestørrelse: 50 cl.\r\nForkæl dig selv eller en du holder af med smagen af Italien – på en ny og alkoholfri måde!', 6, 'Amalfi', 'Pallini Limonzero – Alkoholfri Limoncello - Vinkompagni'),
(6, 'The Full Fifteen Big Red 15 % - McPherson', 75.00, 1, 450.00, 'The_Full_Fifteen_Big_Red_15_____McPherson_8.webp', 'Australiens mest imponerende rødvin til prisen!\r\n\r\nOplev den nye årgang af den eftertragtede Full Fifteen Big Red, en australsk rødvin der har taget Danmark med storm! Denne vin er et absolut superhit og er nu tilbage på markedet.\r\n\r\nFantastisk værdi for pengene!\r\n\r\nFull Fifteen har længe været en favorit blandt danske vinelskere, og med den nye 2022-årgang fortsætter succesen. Denne vin er skabt af den anerkendte vinproducent Andrew McPherson fra New South Wales – Riverina, et af Australiens største vinområder.\r\n\r\nEn smagsoplevelse ud over det sædvanlige:\r\n\r\nRig og fyldig frugt.\r\nBlide krydderier og et hint af eucalyptus.\r\nDybe noter af mørke skovbær, brombær, lakrids, mild peber og let sødlig tobak.\r\nPerfekt balance mellem frugt, intensitet og sødme.\r\n\r\nPerfekt til enhver anledning: Full Fifteen er en alsidig vin, der kan nydes til grillet gris, vildt, lam, flæskesteg, krydrede gryderetter, grillet bøf, tapas eller som ren nydelse alene.\r\n\r\nServer den ved 16-18 grader for den bedste smagsoplevelse.\r\n\r\nDruer: Cabernet Franc, Cabernet Sauvignon og Petit Verdot\r\nLagring: Amerikansk eg, som giver en toastet finish\r\nPriser:\r\n\r\nKøb en kasse med 12 flasker og oplev denne fantastiske rødvin, der er klar til at blive nydt nu!', 2, 'Riverina', 'The Full Fifteen Big Red 15 % - McPherson - Vinkompagnierne'),
(7, 'Hvidvins smagekasse - Blandede lækkerier', 399.00, 0, NULL, 'Hvidvins_smagekasse___Blandede_l__kkerier_9.webp', 'Prøv denne lækre smagekasse - 6 forskellige hvidvine fra henholdsvis Frankrig, Chile og Spanien.\r\nDisse vine har altid været nogle af favoritterne blandt vores kunder.\r\n\r\nKøb en smagekasse med 6 flasker – Spar 37%\r\n\r\nKassen indeholder følgende vine:\r\n1 flaske VIEJO FEO Chardonnay Reserva Maule Valley 75 cl.\r\n1 flaske Montespina Sauvignon Blanc Rueda - Avelino Vegas 75 cl.\r\n1 flaske THE HOLY SNAIL Sauvignon Blanc 2021 IGP Loire 75 cl.\r\n1 flaske Casa La Luna Verdejo - Castilla Y Leon 75 cl.\r\n1 flaske Pinot Grigio Castel Pietra Mezzacorona Trentino IGT  75 cl.\r\n1 flaske Viognier Du Bosc - Pierre Besinet 75 cl. \r\n\r\n6 Flasker samlet I en kasse!', NULL, NULL, 'Hvidvins smagekasse - Blandede lækkerier - Vinkompagnierne'),
(8, 'Portugisiske Perler - Smagekasse', 449.00, 0, NULL, 'Portugisiske_Perler___Smagekasse_10.webp', 'Denne smagekasse tager dig med på en rejse til Portugals hjerte – Alentejo og Douro-dalen – og byder på en spændende blanding af rød- og hvidvine fra nogle af de mest anerkendte vinhuse i regionerne. Kassen er perfekt for den, der ønsker at udforske portugisisk vin og nyde både kraftfulde rødvine og friskere hvidvine i høj kvalitet.\r\n\r\nIndeholder:\r\n\r\n2 fl. Guarda Rios Red Blend - Alentejano\r\nEn smagfuld og fyldig rødvin, der byder på komplekse aromaer af mørke bær, krydderier og et let strejf af egetræ. Dens bløde tanniner og velafbalancerede syre gør den til en perfekt ledsager til både kødretter og modnede oste.\r\n\r\n2 fl. ENCANTADO Tinto Red Blend - Ravasqueira Alentejano\r\nDenne rødvin er en elegant og kraftfuld blend af de bedste druer fra Alentejo. Med noter af modne røde frugter og subtile krydderier, kombineret med en afrundet og lang eftersmag, er den ideel til at akkompagnere kraftige kødretter som okse- eller lammekød.\r\n\r\n1 fl. ENCANTADO Blanco Ravasqueira Alentejano\r\nEn frisk og aromatisk hvidvin, der åbner med duftnoter af citrus og grønne æbler. Den lette struktur og sprøde syre gør den til en forfriskende ledsager til fisk, skaldyr eller lette salater.\r\n\r\n1 fl. VINHAS DE XISTO Reserva - Douro DOC\r\nEn imponerende rødvin fra Douro-dalen, hvor de gamle vinmarker og det særlige terroir giver en vin med dybde og karakter. Med en rig bouquet af mørke bær, krydderier og et hint af vanilje fra fadlagringen, er den perfekt til en aften med kraftige kødretter eller vildt.\r\n\r\nOplev det bedste fra Portugals vintraditioner – fra den varme, solrige Alentejo til den ikoniske Douro-dal – og lad denne smagekasse berige dine sanser. Perfekt som gave eller til at dele med venner og familie.', NULL, NULL, 'Portugisiske Perler - Smagekasse - Vinkompagnierne'),
(9, 'Grill Smagekasse', 499.00, 0, NULL, 'Grill_Smagekasse_11.webp', 'Disse vine passer perfekt til en skøn aften med vennerne og grill-hyggen. \r\n\r\nKøb denne prøvekasse med 6 flasker.\r\n\r\nKassen indeholder indeholder følgende vine:\r\n\r\n1 flaske Le Contesse Prosecco Rose Brut DOC fra Italien.\r\nVinen er fremstillet på Glera og en smule Pinot Noir fra udvalgte marker i Veneto og Friuli-Venzia-Giulia. I glasset fremstår vinen lys, delikat pink og næsen er fuld af røde frugter, violer og vildroser. Smagen er frisk og med en meget fin balance mellem syre og sødme.\r\n\r\n1 flaske Johannes Hörner - Sauvignon Blanc fra Tyskland. En fantastisk lækker vin som udvikler sig meget med lidt temperatur i glasset. Ca. 8-10 grader. Denne Sauvignon Blanc er et mesterværk fra Johannes Hörner, der i pris/kvalitetsforhold sætter mange konkurrenter til vægs. \r\n\r\n1 flaske LE VERSANT Grenache Rose IGP fra Frankrig.\r\nEn skøn bouquet som er meget indbydende af friske nuancer af hindbær, jordbær samt solmodne skovjordbær. Smagen er frisk, cremet, sprød og med røde bær touch, samt en behagelig syre i og tørhed i vinen.\r\n\r\n1 flaske GOVERNO All Uso Rosso Toscano IGT - Gerone fra Italien. En levende vin med dyb rød farve som man genkender af Governo karakter. Der er noter af modne kirsebær, skovbær, grønne urter og krydrede nelliker samt en unik bouquet.\r\n\r\n1 flaske Vista Alegre - Pink Port . Vista Alegre Pink Rosé Port produceres som almindelig rosévin, hvor man gærer mosten ved en lav temperatur. Derefter presses druerne således at drueskind blandes med mosten i kort tid for at trække den lyserøde farve ud. Derved opnås denne flotte Rosé farve og den friske of forførende smag som man ønsker. Den alkoholiske gæring stoppes ved tilsætning af druesprit, hvorved vinen beholder den naturlige og dejlige sødme.\r\n\r\n1 flaske Masseria Borgo dei Trulli Primitivo di Manduria DOP - solrig frugtsmag blandet med lette grønne urter og figen, der folder sig ud med en kraftig blommesmag, der varer ved i munden. \r\n\r\n6 flasker samlet i dette kassekøb!', NULL, NULL, 'Grill Smagekassen - Vinkompagnierne'),
(10, 'Vina Cecilia Moscato Rosé 0,0 Alkoholfri', 49.95, 1, 299.00, 'Vina_Cecilia_Moscato_Ros___0_0_Alkoholfri_12.webp', 'Moscato Rosé Frizzante vin med 0,0 % alkohol, som skal nydes..\r\n\r\nSmager himmelsk! Sødlig og frisk. Moscato alkoholfri eller alkohol free i høj kvalitet.\r\n\r\nDruer har udviklet sig til denne delikate vin, med en meget frisk, lækker frugtsødme og et naturligt lavt 0,0 % alkohol.\r\nMange øvrige alkoholfrie vine kan ikke vise denne proces! 0,0 % er en vin der er baseret på friske druer, der kun gennemgår en kort skind kontakt, og ingen alkohol gæring.\r\nDet vi sige at denne vin aldrig har haft indhold af alkohol.\r\n\r\nDelikat frisk og lækker Moscato sødme! Damernes favorit. Høj kvalitet og den bedste Moscato Rosé alkoholfri 0,0 % på markedet!\r\n\r\nAromaen i vinen, er smukt afbalanceret og består af søde bærfrugter, lime, hvide blomster og en antydning af krydderi. Smagen er fantastisk afbalanceret med en forfriskende sødme.\r\n\r\nMoscato Rose 0,0 % af denne type kan nydes til velkomst, eller bare til ren nydelse. Også god til barbecue retter, lettere krydret kyllingeretter, tapas, ost eller desserter.\r\n\r\nServer denne skønne moscato ved 5 - 7 grader.\r\n\r\nEn kasse indeholder 6 flasker - 75 cl.  0,0 % alkohol.\r\n\r\nHalal godkendt !\r\n\r\nAlkohol fri vin:\r\n\r\nØvrige alkoholfri vine gennemgår en dealkoholisering efter endt fermentering.\r\nDruer bliver plukket ved den optimale balance.. mellem naturlig sødme, og syre i druen.', 10, 'Valencia', 'Vina Cecilia Moscato Rosé 0,0 Alkoholfri - Vinkompagnierne'),
(11, 'Viña Cecilia Moscato White Frizzante', 39.95, 1, 239.00, 'Vi__a_Cecilia_Moscato_White_Frizzante_13.webp', 'Denne Moscato er delikat frisk med en lækker sødme.\r\n\r\nMed Master vinmager Fernando Tarins hjælp har de verdensberømte Moscato druer udviklet sig til denne delikate vin med en meget frisk, lækker frugtsødme og et naturligt lavt alkohol. Man kan udmærket forestille sig, hvordan varmen i den spanske sommer kunne drive en vinproducent til at skabe denne ultimative tørstslukker.\r\n\r\nMoscato Vina Cecilia blanco er så sprød og frisk som en drue plukket fra vinstokken og med en tilfredsstillende kilden på tungen af lidt mousserende. Aromaen er smukt afbalanceret og består af søde bærfrugter, lime og en antydning af krydderi. Smagen er fantastisk afbalanceret med en forfriskende sødme. Vin smager som sød hvidvin, ikke sød sød, men som lækker hvidvin.\r\n\r\nMoscato som denne kan nydes til velkomst, barbecue fest, lettere krydret kyllingeretter, dem som kan lide vin med lidt sødme, chokoladekage eller bare til ren nydelse...\r\n\r\nServer denne moscato ved 5-7 grader\r\n\r\nEn kasse indeholder 6 flasker - 75 cl. 5 % Alkohol.\r\n\r\nMoscato Valencia:\r\n\r\nValencia hører til blandt de varmeste områder i Spanien, hvor temperaturen om sommeren nærmer sig de 40 grader. En forbedret teknik i kældrene og tidligere plukning af moscato druerne, inden de bliver overmodne, har gjort at man kan lave en så flot moscato i meget høj kvalitet.\r\n\r\nVinen bliver produceret i den østlige del af Valencia området, det bedste område til dyrkning af Moscato druer, da området er under indflydelse af vinde fra Middelhavet og derfor knap så varmt som længere inde i landet.', 10, 'Valencia', 'Viña Cecilia Moscato White Frizzante - Vinkompagnierne'),
(12, 'Viña Cecilia Moscato Rosé Frizzante', 39.95, 1, 239.00, 'Vi__a_Cecilia_Moscato_Ros___Frizzante_14.webp', 'Viña Cecilia Moscato Rose mousserende Frizzante.. Delikat frisk og lækker Moscato sødme! Damernes favorit... Og også nogle mænd!! En populær moscato vin som skal nydes..\r\n\r\n     GODT KØB!   Gold Medal in Frankfurt International Trophy..  Høj kvalitet og den bedste Moscato Rose på markedet !!\r\n\r\nMoscato i høj kvalitet med Master vinmager Fernando Tarins hjælp har de verdensberømte Muskat druer udviklet sig til denne delikate vin med en meget frisk, lækker frugtsødme og et naturligt lavt alkohol. Man kan udmærket forestille sig, hvordan varmen i den spanske sommer kunne drive en vinproducent til at skabe denne ultimative tørstslukker.\r\n\r\nVina Cecilia Moscato Rose er så sprød og frisk som en drue plukket fra vinstokken og med en tilfredsstillende kilden på tungen af lidt mousserende. Aromaen er smukt afbalanceret og består af søde bærfrugter, lime, hvide blomster og en antydning af krydderi. Smagen er fantastisk afbalanceret med en forfriskende sødme.\r\n\r\nDruesammensætning er 96 % Moscato og 4 % Garnacha.\r\nVina Cecilia er blevet populær på over 150 Cafeer og restauranter i Danmark. Og kun 5 % alkohol giver lyst til til det 3 glas.\r\n\r\nMoscato af denne type kan nydes til velkomst, barbecue fest, lettere krydret kyllingeretter, dem som kan lide vin med lidt sødme, eller bare til ren nydelse...\r\n\r\nServer denne skønne moscato ved 5-7 grader\r\n\r\nTest:\r\n4,1 Point i Vivino\r\nGold Medal Mundus Vini 2025\r\nGold Medal in Frankfurt International Trophy.\r\n\r\nCitat oversat fra Oz Clarke:\r\nOz Clarke beklager med rette, at Muscat druen \"behandles med afslappet foragt af de fleste vindrikkere\". Og alligevel er den lige så gammel som selve vinen og så alsidig, at den kan gøre fremragende vin sød, medium, tør, mousserende eller befæstet. De indviede elsker den for dens fantastiske, eksotiske parfume og det faktum, at det måske er den eneste vin, der faktisk smager af friske druer. Så nyd uden videre denne Moscato Rose, der er en moderne, frugtagtig, perlevin fra solbeskinnede Valencia. Nyd den forsigtigt afkølet - alene, med grillede rejer eller fx en sommer bær-frugtsalat.\r\n\r\nFremragende moscato, lys mousserende rosé. \"Særlig favorit til damerne\"\r\n\r\nEn kasse indeholder 6 flasker - 75 cl. 5 % Alkohol.\r\n\r\nVincooperativet AneCoop ligger i Valencia Spanien.', 10, 'Valencia', 'Viña Cecilia Moscato Rosé Frizzante - Vinkompagnierne'),
(13, 'YES YES Riesling Halbtrocken Rheinhessen', 79.95, 1, 479.00, 'YES_YES_Riesling_Halbtrocken_Rheinhessen_15.webp', 'Dejlig tilgængelig Riesling.. Godt køb!\r\n\r\nRiesling YES YES. Denne velsmagende Riesling kommer fra eftertragtede vinmarker i Rheinhessen regionen, og er kendt for sin sprøde syre og frugtagtige smag. Druen er Riesling, som udtrykker en halvtør karakter.\r\n\r\nEn ren og rank forfriskende halbtrocken, som man desværre slubrer alt for hurtigt !!\r\n\r\nVinen er fremstillet med omhu, og fokus på at bevare druens naturlige friskhed og frugtighed gennem hele processen, hvilket resulterer i en balanceret og karakterfuld vin.\r\n\r\nI glasset præsenterer vinen sig med en flot lys gul farve og grønne refleksioner. I duften får man straks noter af moden abrikos, fersken samt citrusfrugter, ledsaget af en sublim blomstrende noter.\r\n\r\nI smagen byder vinen på en forfriskende syre med dejlige frugtnoter. Du finder smag af grønt æble, citron og et strejf af honning. Afslutningen er lang og livlig, hvilket efterlader en behagelig og forfriskende eftersmag.\r\n\r\nServer vinen ved 8 til 10 grader.. og nyd vinen til fjerkræ, skaldyr, buffet, asiatiske retter eller blot ren nydelse.\r\n\r\nEn kasse indeholder 6 flasker - 75 cl.  11 % Alkohol', 12, 'Rheinhessen', 'YES YES Riesling Halbtrocken Rheinhessen - Vinkompagnierne'),
(14, 'California ZIN Zinfandel', 50.00, 1, 250.00, 'California_ZIN_Zinfandel_16.webp', 'California ZIN Zinfandel er en rigtig lækker Californisk rødvin, med masser af fylde og sprængfyldt med moden frugt nuancer, og lækker varm blød eftersmag af lidt figen. Vinen er præsenteret på mange resteauranter i Danmark.\r\n\r\nVinen er produceret af druer fra nogle af de bedste områder i det solrige Californien. Smagen fremtræder med solbær, rosiner, og hint at chokolade. Den er virkelig afstemt med bløde tanniner i eftersmagen.\r\n\r\nLækker til dansk mad, kylling, pasta, oksekød samt til ren nydelse.\r\n\r\nNyd denne vin ved 15 - 16 grader.\r\n\r\nEn kasse indeholder 6 flasker - 75 cl. 14 % alkohol.', 5, 'Californien', 'California ZIN Zinfandel - Vinkompagnierne'),
(15, 'Leitz - Eins Zwei Zero Pinot Noir', 89.00, 1, 534.00, 'Leitz___Eins_Zwei_Zero_Pinot_Noir_17.webp', 'Oplev smagen af ægte Pinot Noir uden alkohol med Eins Zwei Zero Pinot Noir fra det prisvindende tyske vinhus Weingut Leitz. Denne alkoholfri rødvin er skabt til at imponere med sin autentiske smag og raffinerede balance.\r\n\r\nMed en bouquet af modne kirsebær, friske hindbær og et strejf af krydderier leverer Eins Zwei Zero Pinot Noir en elegant og fyldig vinoplevelse. Den lette krop og silkebløde tanniner gør den til det perfekte valg til både lette retter som salater og grillet fisk, samt til hygge med venner og familie.\r\n\r\nHvorfor vælge Eins Zwei Zero Pinot Noir?\r\n\r\n100 % alkoholfri: Ideel til enhver anledning, hvor alkoholfrie alternativer ønskes.\r\nPremium kvalitet: Fremstillet med fokus på at bevare Pinot Noir-druens karakteristiske smag.\r\nBæredygtigt valg: Produceret med omtanke for miljøet.\r\nServeringstips\r\nServér let afkølet ved ca. 12-14°C for at fremhæve vinens friske og frugtrige noter.\r\n\r\nKøb Eins Zwei Zero Pinot Noir online i dag!\r\nDenne alkoholfri rødvin er perfekt til dig, der ønsker en elegant vinoplevelse uden alkohol. Bestil nu og få den leveret direkte til døren.', 12, '', 'Leitz - Eins Zwei Zero Pinot Noir - Vinkompagnierne');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `prod_soeg_con`
--

DROP TABLE IF EXISTS `prod_soeg_con`;
CREATE TABLE IF NOT EXISTS `prod_soeg_con` (
  `psc_id` int NOT NULL AUTO_INCREMENT,
  `prodid` int NOT NULL,
  `soegeordid` int NOT NULL,
  PRIMARY KEY (`psc_id`),
  KEY `prodid` (`prodid`),
  KEY `soegeordid` (`soegeordid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `soegeord`
--

DROP TABLE IF EXISTS `soegeord`;
CREATE TABLE IF NOT EXISTS `soegeord` (
  `soegeordid` int NOT NULL AUTO_INCREMENT,
  `ord` varchar(200) NOT NULL,
  PRIMARY KEY (`soegeordid`),
  UNIQUE KEY `ord` (`ord`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `overkat_underkat_con`
--
ALTER TABLE `overkat_underkat_con`
  ADD CONSTRAINT `fk_overkatid` FOREIGN KEY (`overkatid`) REFERENCES `overkategorier` (`overkateid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `overkat_underkat_con_ibfk_1` FOREIGN KEY (`underkatid`) REFERENCES `kategorier` (`kateid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Begrænsninger for tabel `prod-but-con`
--
ALTER TABLE `prod-but-con`
  ADD CONSTRAINT `prod-but-con_ibfk_1` FOREIGN KEY (`prbucobutikid`) REFERENCES `butikker` (`butikid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prod-but-con_ibfk_2` FOREIGN KEY (`prbucoprodid`) REFERENCES `produkter` (`prodid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Begrænsninger for tabel `prod-kat-con`
--
ALTER TABLE `prod-kat-con`
  ADD CONSTRAINT `prod-kat-con_ibfk_1` FOREIGN KEY (`prkacoprodid`) REFERENCES `produkter` (`prodid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prod-kat-con_ibfk_2` FOREIGN KEY (`prkacokatid`) REFERENCES `kategorier` (`kateid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Begrænsninger for tabel `prod-mad-con`
--
ALTER TABLE `prod-mad-con`
  ADD CONSTRAINT `prod-mad-con_ibfk_1` FOREIGN KEY (`prmacoikonid`) REFERENCES `madikoner` (`ikonid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prod-mad-con_ibfk_2` FOREIGN KEY (`prmacoprodid`) REFERENCES `produkter` (`prodid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Begrænsninger for tabel `produkter`
--
ALTER TABLE `produkter`
  ADD CONSTRAINT `produkter_ibfk_1` FOREIGN KEY (`prodland`) REFERENCES `lande` (`landeid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Begrænsninger for tabel `prod_soeg_con`
--
ALTER TABLE `prod_soeg_con`
  ADD CONSTRAINT `prod_soeg_con_ibfk_1` FOREIGN KEY (`prodid`) REFERENCES `produkter` (`prodid`) ON DELETE CASCADE,
  ADD CONSTRAINT `prod_soeg_con_ibfk_2` FOREIGN KEY (`soegeordid`) REFERENCES `soegeord` (`soegeordid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
