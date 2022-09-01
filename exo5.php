<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Introduction PHP - Exo 5</title>
</head>
<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 5</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a class="main-nav-link" href="index.php">Entrainement</a></li>
                    <li><a class="main-nav-link" href="exo2.php">Donnez moi des fruits</a></li>
                    <li><a class="main-nav-link" href="exo3.php">Donnez moi de la thune</a></li>
                    <li><a class="main-nav-link" href="exo4.php">Des fonctions et des tableaux</a></li>
                    <li><a class="main-nav-link active" href="exo5.php">Netflix</a></li>
                </ul>
            </nav>
        </header>

<?php

// Json file
try {
    $fileContent = file_get_contents("datas/series.json");
    $series = json_decode($fileContent, true);
} catch (Exception $e) {
    echo "Something went wrong with json file...";
    exit;
}

?>

        <section class="exercice">
            Sur cette page un fichier comportant les données de séries télé est importé côté serveur. (voir datas/series.json)
            Les données sont accessibles dans la variable $series.
        </section>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Récupérer dans un tableau puis affichez l'ensemble des plateformes de diffusion des séries. Afficher les par ordre alphabétique.</p>
            <div class="exercice-sandbox">
                </ul>
                    <?php

                        // var_dump($series);

                        $plateforms = [];
                        foreach($series as $serie){
                            foreach($serie as $key => $value){
                                if($key === "availableOn") array_push($plateforms, $value);
                            }
                        }

                        sort($plateforms);
                        $orderPlateforms = array_unique($plateforms);

                        foreach($orderPlateforms as $plateform){
                            echo "<li>$plateform</li>";
                        }

                    ?>
                </ul>
            </div>
        </section>


        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Récupérer dans un tableau puis affichez l'ensemble des styles de séries. Afficher les par ordre alphabétique.</p>
            <div class="exercice-sandbox">

                <?php

                    $styles = [];
                    foreach($series as $serie){
                        foreach($serie as $key => $value){
                            if($key === "styles"){
                                foreach($value  as $style){
                                    array_push($styles, $style);
                                }
                            }
                        }
                    }

                    sort($styles);
                    $orderStyles = array_unique($styles);

                    foreach($orderStyles as $style){
                        echo "<li>$style</li>";
                    }
                ?>

            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Afficher la liste de toutes les séries avec l'image principale, le titre, l'équipe de création et la liste des acteurs</p>
            <p class="exercice-txt">L'image et le titre de la série sont des liens menant à cette page avec en paramètre "serie", l'identifiant de la série</p>
            <p class="exercice-txt">Afficher une seule série par ligne sur les plus petits écrans, 2 séries par ligne sur les écrans intermédiaires et 4 séries par ligne sur un écran d'ordinateur.</p>
            <div class="exercice-sandbox list-films">
                    <?php

                        foreach($series as $serie){
                            $actors = "Actors : ";
                            $creators = "Creators : ";
                            foreach($serie as $key => $item){
                                if($key === "createdBy"){
                                    $creators .= implode(", ",$item);
                                }
                                if($key === "actors"){
                                    $actors .= implode(", ",$item);
                                }
                            }
                            echo "
                            <div class='film'>
                                <span><img src='".$serie["image"]."'></span>
                                <span>".$serie["name"]."</span>
                                <span>$creators</span>
                                <span>$actors</span>
                            </div>
                            ";
                        }

                    ?>
            </div>
        </section>


        <!-- QUESTION 4 -->
        <section id="question5" class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Si l'URL de la page appelée comporte l'identifiant d'une série, alors afficher toutes les informations de la série.</p>
            <p class="exercice-txt">Si l'identifiant ne correspond à aucune série, afficher un message d'erreur.</p>
            <div class="exercice-sandbox">

            <?php



            ?>

            </div>
        </section>

        <!-- QUESTION 5 -->
        <section id="question5" class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Globaliser l'entête et le pied des pages de ce mini-site.</p>
            <p class="exercice-txt">S'assurer de conserver les titres des pages et l'affichage dynamique du menu.</p>
            <div class="exercice-sandbox">

                <?php



                ?>

            </div>
        </section>

        <!-- QUESTION 6 -->
        <section id="question5" class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Créer un tableau listant les pages du site.</p>
            <p class="exercice-txt">Créer une fonction générant le code HTML du menu du site.</p>
            <div class="exercice-sandbox">

                <?php



                ?>

            </div>
        </section>

    </div>
<div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>
</html>