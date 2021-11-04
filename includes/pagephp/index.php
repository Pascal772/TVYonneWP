<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Télé de l'Yonne</title>
    <meta name="description" content="La Télé de l'Yonne, votre Web Tv qui vous offre des émissions sur les villes et villages de notre département !">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500&display=swap" rel="stylesheet">
    <link class="link" rel="stylesheet" href="css/style.css">
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js" defer></script>
    <script src="js/burger.js" defer></script>
    <script src="js/mode.js" defer></script>
    <script src="js/map.js" defer></script>
    <script src="js/modal-ville.js" defer></script>
</head>

<body>
    <?php
    include "includes/navbar.php"
    ?>
    <main class="articles-container">
        <section class="modal-video">
            <h1 class="modal-title">Titre de la video</h1>
            <div class="close-modal">
                <p>&times;</p>
            </div>
            <iframe id="iframe-ville" class="iframemob" width="300" height="315" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </section>
        <h2 class="titre-accueil">Venez découvrir nos différentes émissions sur les communes de l'Yonne !</h2>
        <img class="imgplateau" src="img/Clipboard - 15 septembre 2021 15_07.png" alt="Plateau de tournage">
        <h2 class="last-emissions">Nos dernières émissions</h2>
        <section id="emissions">
            <?php
            require_once "includes/connexionbase.php";

            $sql = "SELECT videos.*,emissions.name FROM `videos` LEFT JOIN emissions on emissions.id = videos.emission_id GROUP BY videos.id LIMIT 6";
            
            $requete = $db->query($sql);


            $resultats = $requete->fetchAll();
        

            foreach ($resultats as $resultat) {
                $emission = $resultat['name'];
                $url = $resultat['link'];
                $image = $resultat['img_src'];
                $title = $resultat['description'];
                echo
                "<article class='emission'>
                <h2>$emission</h2>
                <a href='$url' class='url-modal' href=''>
                <img src='img/$image' alt='$image'>
                <h3>$title</h3>
                </a>
                </article>";
            }
            ?>
        </section>
        <div class="more">
            <a href="emission.html">
                <h3>Toutes nos émissions</h3>
                <span class="iconify" data-icon="akar-icons:circle-plus" style="color: rgb(255, 255, 255);"></span>
            </a>
        </div>
        <section class="map-container">
            <h2>Nous y sommes allés !</h2>
            <section class="map-yonne">
                <select class="ville-container">
                    <option value="Choix">Choisissez une ville</option>
                </select>
                <?php
                include "includes/map.php"
                ?>
                <p style="text-align: center;">Carte créée par Franck Vasseur</p>
            </section>
            <?php
            include "includes/partners.php"
            ?>
    </main>
    <?php
    include "includes/footer.php"
    ?>
</body>

</html>