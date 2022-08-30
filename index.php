<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Introduction PHP - Exo 1</title>
</head>
<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 1</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a class="main-nav-link active" href="index.php">Entrainement</a></li>
                    <li><a class="main-nav-link" href="exo2.php">Donnez moi des fruits</a></li>
                    <li><a class="main-nav-link" href="exo3.php">Donnez moi de la thune</a></li>
                    <li><a class="main-nav-link" href="exo4.php">Des fonctions et des tableaux</a></li>
                    <li><a class="main-nav-link" href="exo5.php">Netflix</a></li>
                </ul>
            </nav>
        </header>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Evrivez la phrase suivante dans une balise HTML P en utilisant les 2 variables ci-dessous :</p>
            <p class="exercice-txt">"<i>Firstname</i> a obtenu <i>score</i> points à cette partie."</p>
            <div class="exercice-sandbox">
                <?php
                    $firstname = "Samir";
                    $score = 327;

                    echo "<p>$firstname a obtenu $score points à cette partie.</p>";
                ?>
            </div>
        </section>


        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Afficher dans une liste HTML le nom des produits suivants et leurs prix.</p>
            <div class="exercice-sandbox">
                <?php
                    $nameProduct1 = "arc";
                    $priceProduct1 = 10.30;
                    $nameProduct2 = "flèche";
                    $priceProduct2 = 2.90;
                    $nameProduct3 = "potion";
                    $priceProduct3 = 5.20;
                ?>
                <ul>
                    <li><?php echo $nameProduct1." : ".$priceProduct1; ?></li>
                    <li><?php echo $nameProduct2." : ".$priceProduct2; ?></li>
                    <li><?php echo $nameProduct3." : ".$priceProduct3; ?></li>
                </ul>
            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Calculer le montant total de la commande des produits ci-dessus avec les quantités ci-dessous et appliquez lui une remise de 10%.</p>
            <div class="exercice-sandbox">
                <?php
                    $quantityProduct1 = 1;
                    $quantityProduct2 = 10;
                    $quantityProduct3 = 4;

                    function totalDiscount(float $price1, float $price2, float $price3, int $quantity1, int $quantity2, int $quantity3) : float{
                        $total = $price1*$quantity1 + $price2*$quantity2 + $price3*$quantity3;
                        $pourcent = $total - $total * 0.1;
                        return $pourcent;
                    }

                    // echo totalDiscount($priceProduct1, $priceProduct2, $priceProduct3);
                    echo totalDiscount($priceProduct1, $priceProduct2, $priceProduct3, $quantityProduct1, $quantityProduct2, $quantityProduct3);

                ?>
            </div>
        </section>


        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Affichez le prix le plus élevé des 3 produits ci-dessus.</p>
            <div class="exercice-sandbox">

                <?=max($priceProduct1,$priceProduct2,$priceProduct3)?>

            </div>
        </section>

        <!-- QUESTION 5 -->
        <?php

        $text1 = "Le marchand m'a vendu un arc et des flèches.";
        $nameProduct = [
            "arc" => 10.30,
            "flèche" => 2.90,
            "potion" => 5.20
        ];

        ?>
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Affichez dans une liste HTML le nom des produits de la question 2 qui sont présents dans la phrase : "<?=$text1?>"</p>
            <div class="exercice-sandbox">

                <ul>
                    <?php

                        $result = "";
                        foreach($nameProduct as $label => $price)
                        {
                            if ( str_contains($text1, $label) ) $result .= "<li>$label : $price</li>";
                        }

                        echo $result;

                    ?>
                </ul>

            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Parmi les scores suivants, affichez le prénom des joueurs qui ont obtenus entre 50 et 150 points.</p>
            <div class="exercice-sandbox">
                <ul>
                <?php

                    $namePlayer1 = "Tim";
                    $scorePlayer1 = 67;
                    $namePlayer2 = "Morgan";
                    $scorePlayer2 = 198;
                    $namePlayer3 = "Hamed";
                    $scorePlayer3 = 21;
                    $namePlayer4 = "Camille";
                    $scorePlayer4 = 134;
                    $namePlayer5 = "Kevin";
                    $scorePlayer5 = 103;

                    $rounds = [];
                    array_push( $rounds, [$namePlayer1 => $scorePlayer1], [$namePlayer2 => $scorePlayer2],
                            [$namePlayer3 => $scorePlayer3], [$namePlayer4 => $scorePlayer4], [$namePlayer5 => $scorePlayer5]);

                        $result = "";

                        foreach($rounds as $round){
                            foreach($round as $name=>$score){
                                if ($score > 50 && $score < 150) $result .= "<li>".$name."</li>";
                            }
                        }

                        echo $result;

                ?>
                </ul>
            </div>
        </section>


        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">En réutilisant les scores de la question pécédente, afficher le nom du joueur ayant obtenu le plus grand score.</p>
            <div class="exercice-sandbox">

            </div>
        </section>


        <!-- QUESTION 8 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Affichez le prénom du joueur le plus long en nombre de caractères.</p>
            <div class="exercice-sandbox">

            <?php

            ?>
            </div>
        </section>

        <!-- QUESTION 9 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 9</h2>
            <p class="exercice-txt">Créer une variable $players ayant pour valeur un tableau multidimensionnel contenant toutes les données des joueurs avec leurs scores ci-dessus et leurs ages ci-dessous.</p>
            <ul class="exercice-txt">
                <li>Tim : 25 ans</li>
                <li>Morgan  : 34 ans</li>
                <li>Hamed : 27 ans</li>
                <li>Camille : 47 ans</li>
                <li>Kevin : 31 ans</li>
            </ul>
            <p class="exercice-txt">Afficher la valeur de cette variable avec tous les détails.</p>
            <div class="exercice-sandbox">
                
            </div>
        </section>

        <!-- QUESTION 10 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 10</h2>
            <p class="exercice-txt">Afficher le prénom et l'âge du joueur le plus jeune dans une phrase dans une balise HTML P.</p>
            <div class="exercice-sandbox">

            </div>
        </section>

    </div>
<div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>
</html>