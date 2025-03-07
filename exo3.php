<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Introduction PHP - Exo 3</title>
</head>
<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 3</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a class="main-nav-link" href="index.php">Entrainement</a></li>
                    <li><a class="main-nav-link" href="exo2.php">Donnez moi des fruits</a></li>
                    <li><a class="main-nav-link active" href="exo3.php">Donnez moi de la thune</a></li>
                    <li><a class="main-nav-link" href="exo4.php">Des fonctions et des tableaux</a></li>
                    <li><a class="main-nav-link" href="exo5.php">Netflix</a></li>
                </ul>
            </nav>
        </header>

<?php

$fruits = ["fraise", "banane","pomme", "cerise", "ananas"];

$prices = [3, 2, 2, 5, 8];

?>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Ordonner le tableau des prix par ordre croissant et l'afficher en détail</p>
            <div class="exercice-sandbox">

                <?php

                    sort($prices);
                    var_dump($prices);

                ?>

                <?php
                    sort($prices);
                    var_dump($prices);
                ?>

            </div>
        </section>

        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Ajouter 1 euro à chaque prix</p>
            <div class="exercice-sandbox">

                <?php

                    foreach($prices as $index=>$price){
                        $prices[$index] = $price + 1;
                    }
                    var_dump($prices);

                ?>

                <?php
                $add = fn($n) => ++$n;
                $prices = array_map($add, $prices);

                var_dump($prices);

                // foreach ($prices as $price) {
                //     $newPrice = $price + 1;
                //     echo $newPrice."\n";
                // }
                ?>

            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Créer le tableau $store qui combine les tableaux des fruits et des prix afin d'obtenir un tableau associatif d'attribution des prix. Afficher le tableau obtenu</p>
            <div class="exercice-sandbox">

            <?php

                $store = array_combine($fruits, $prices);
                var_dump($store);

            ?>

                <?php
                $store = array_combine($fruits, $prices);
                var_dump($store);
                ?>
            </div>
        </section>

        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Afficher dans une liste HTML le nom des fruits ayant un prix inférieur à 4 euros</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php

                        foreach ($store as $fruit=>$price){
                            if( $price < 4)  echo "<li>$fruit : $price</li>";
                        }

                        foreach ($store as $fruit => $price) {
                            if ($price < 4) echo "<li>$fruit</li>";
                        }

                        var_dump(array_filter($store, fn($p) => $p < 4));

                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 5 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Afficher dans une liste HTML le nom des fruits ayant un prix pair</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php

                        function even($var)
                        {
                            // retourne si l'entier en entrée est pair
                            return !($var & 1);
                        }
                        $arrayFilter = array_filter(array_values($store),"even");


                        foreach($store as $name=>$price){
                            if(in_array($price,$arrayFilter)) echo "<li>$name : $price</li>";
                        }

                        foreach ($store as $fruit => $price) {
                            if ($price%2 === 0) echo "<li>$fruit</li>";
                        }

                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Composer un panier de fruits ne dépassant pas 12 euros</p>
            <div class="exercice-sandbox">

                <ul>
                    <?php

                        $totalPrice = 0;

                        foreach($store as $name=>$price){
                            if($totalPrice + $price <= 12){
                                $totalPrice += $price;
                                echo "<li>$name : $price => total : $totalPrice</li>";
                            }
                            if($totalPrice >= 12) break;
                        }

                    ?>
                </ul>

                <?php
                    $cart = 0;
                    foreach ($store as $fruit => $price) {
                        if ($cart + $price <= 12) {
                            $cart += $price;
                            echo "<li>On ajoute $fruit, le panier est de $cart.</li>";
                        }
                        if ($cart >= 12) break;
                    }


                    $cart = 0;
                    $cartList = "";
                    while ($cart < 12) {
                        $key = array_rand($store);
                        if ($cart + $store[$key] > 12) break;
                        $cart += $store[$key];
                        $cartList .= "<li>$key: ".$store[$key]."</li>";
                    }

                    echo "Panier de $cart <ul>$cartList</ul>";

                ?>

            </div>
        </section>

        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">En reprenant le prix total du panier constitué à la question précédente, appliquez-lui une taxe de 18%. Afficher le total taxe comprise.</p>
            <div class="exercice-sandbox">

            <?php

                function applyTax($total, $tax){
                    return $total + $total * ($tax/100);
                }

                echo "Prix total : $totalPrice => avec taxe 18% : ".applyTax($totalPrice,  18).".";

            ?>

                <?=$cart * 1.18?>

            </div>
        </section>

        <!-- QUESTION 8 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Ajouter au tableau $store le fruit "kiwi" pour un prix de 1,50 € puis afficher le tableau complet</p>
            <div class="exercice-sandbox">

            <?php

                $store["kiwi"]  = 1.50;
                var_dump($store);

            ?>

                <?php
                    $store["kiwi"] = 1.5;

                    var_dump($store);
                ?>
            </div>

        </section>

        <!-- QUESTION 9 -->
        <?php
            $newFruits = [
                "pêche" => 3,
                "abricot" => 2,
                "mangue" => 9
            ];
        ?>

        <section class="exercice">
            <h2 class="exercice-ttl">Question 9</h2>
            <p class="exercice-txt">Ajouter les nouveaux fruits du tableau $newFruits au tableau $store</p>
            <div class="exercice-sandbox">
            <?php
                // foreach ($newFruits as $newFruit => $price) {
                //     $store[$newFruit] = $price;
                // }


                $store = array_merge($store, $newFruits);

                var_dump($store);
            ?>
            
            </div>
        </section>

        <!-- QUESTION 10 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 10</h2>
            <p class="exercice-txt">Afficher le nom et le prix du fruit le moins cher</p>
            <div class="exercice-sandbox">

                <?php

                    // asort($store);
                    array_multisort($store, SORT_NUMERIC, SORT_ASC);
                    $sliceData =  array_slice($store, 0, 1);

                    // echo array_keys($sliceData)[0]." : ".array_values($sliceData)[0];
                    foreach($sliceData as $name => $price){
                        echo $name." : ".$price;
                    }

                ?>

            </div>
        </section>

        <!-- QUESTION 11 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 11</h2>
            <p class="exercice-txt">Afficher les noms et le prix des fruits les plus chers</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php

                        foreach($store as $name=>$price){
                            if($price === max($store)) echo "<li>$name : $price</li>";
                        }
                    ?>
                    <!-- ON PEUT UTILISER UNE LISTE SI ON VEUT AFFICHER LES FRUITS MAIS UN SEUL PRIX -->
                </ul>
            </div>
        </section>
    </div>
<div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>
</html>