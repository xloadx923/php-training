<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Introduction PHP - Exo 4</title>
</head>
<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 4</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a class="main-nav-link" href="index.php">Entrainement</a></li>
                    <li><a class="main-nav-link" href="exo2.php">Donnez moi des fruits</a></li>
                    <li><a class="main-nav-link" href="exo3.php">Donnez moi de la thune</a></li>
                    <li><a class="main-nav-link active" href="exo4.php">Des fonctions et des tableaux</a></li>
                    <li><a class="main-nav-link" href="exo5.php">Netflix</a></li>
                </ul>
            </nav>
        </header>

<?php

$array = [12, 65, 95, 41, 85, 63, 71, 64];

$arrayA = [12, "le", 95, 12, 85, "le", 71, "toi", 95, "la"];
$arrayB = [85, "toi", 95, "la", 65, 94, 85, "avec", 37, "chat"];

?>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et retourne la chaîne de caractère HTML permettant d'afficher les valeurs du tableau sous la forme d'une liste.</p>
            <div class="exercice-sandbox">

                <?php

                function displayValues(array $array) : string{

                    $list = "<ul>";

                    foreach($array as $value){
                        $list .= "<li>$value</li>";
                    }

                    $list .= "</ul>";

                    return $list;
                }
                echo displayValues($arrayA);

                ?>

            </div>
        </section>

        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les valeurs paires. Afficher les valeurs du tableau sous la forme d'une liste HTML.</p>
            <div class="exercice-sandbox">

            <?php

                $integers = [ 12, 35, 66, 33, 24, 18, 47, 34, 55 ];

                function displayPairIntegers(array $integers) : string{
                    $list = "<ul>";

                    foreach($integers as $integer){
                        if($integer % 2 === 0) $list .= "<li>$integer</li>";
                    }

                    $list .= "</ul>";

                    return $list;
                }
                echo displayPairIntegers($integers);

            ?>

            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les entiers d'index pair</p>
            <div class="exercice-sandbox">

            <?php

                function listPairIndex(array $integers) : string{
                    $list = "<ul>";

                    foreach($integers as $index => $integer){
                        if($index % 2 === 0) $list .= "<li>$integer</li>";
                    }

                    $list .= "</ul>";

                    return $list;
                }

                echo listPairIndex($integers);
            ?>

            </div>
        </section>

        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers. La fonction doit retourner les valeurs du tableau mulipliées par 2.</p>
            <div class="exercice-sandbox">

            <?php

                function multiplyInteger(array $integers) : string{
                    $list = "<ul>";

                    foreach($integers as $integer){
                        $list .= "<li>".($integer*2)."</li>";
                    }

                    $list .= "</ul>";

                    return $list;
                }

                echo multiplyInteger($integers);
            ?>

            </div>
        </section>


        <!-- QUESTION 4bis -->

        <section class="exercice">
            <h2 class="exercice-ttl">Question 4 bis</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et un entier. La fonction doit retourner les valeurs du tableau divisées par le second paramètre</p>
            <div class="exercice-sandbox">

            <?php

                function divideInteger(array $integers, int $int): string{
                    $list = "<ul>";

                    foreach($integers as $integer){
                        $list .= "<li>".($integer/$int)."</li>";
                    }

                    $list .= "</ul>";

                    return $list;
                }

                echo divideInteger($integers, 3);
            ?>

            </div>
        </section>

        <!-- QUESTION 5 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers ou de chaînes de caractères et retourne le tableau sans doublons</p>
            <div class="exercice-sandbox">

            <?php

                $newArray = array_merge($array,$arrayA,$arrayB);

                function ListWithoutDuplicate(array $array) : array{

                    return array_unique($array);
                }

                var_dump( ListWithoutDuplicate($newArray) );
            ?>

            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau représentant l'intersection des 2</p>
            <div class="exercice-sandbox">

            <?php

                function intersectionArray(array $arrayA, array $arrayB) : array{
                    return array_intersect($arrayA,$arrayB);
                }

                var_dump( intersectionArray($arrayA, $arrayB) );
            ?>

            </div>
        </section>

        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau des valeurs du premier tableau qui ne sont pas dans le second</p>
            <div class="exercice-sandbox">

            <?php

                function diffInArray(array $arrayA, array $arrayB) : array{
                    return array_diff($arrayA,  $arrayB);
                }

                var_dump( diffInArray($arrayA, $arrayB) );
            ?>

            </div>
        </section>


        <!-- QUESTION 8 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Réécrire la fonction précédente pour lui ajouter un paramètre booléen facultatif. Si celui-ci est à true, le tableau retourné sera sans doublons</p>
            <div class="exercice-sandbox">

            <?php

                function diffInArrayWithoutDuplicate(array $arrayA, array $arrayB) : array{
                    return array_unique(array_diff($arrayA,  $arrayB));
                }

                var_dump( diffInArrayWithoutDuplicate($arrayA, $arrayB) );

            ?>

            </div>
        </section>


        <!-- QUESTION 9 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 9</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et un entier et retourne les n premiers éléments du tableau.</p>
            <div class="exercice-sandbox">

                <?php

                    function firstNElements(array $arrayB, int $integer) : array{

                        return array_slice($arrayB, 0, 3);
                    }

                    var_dump( firstNElements($arrayB, 3) );

                ?>

            </div>
        </section>
    </div>
<div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>
</html>