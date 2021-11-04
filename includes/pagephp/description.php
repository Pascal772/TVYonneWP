<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qu’est ce que La Télé de l’Yonne ?</title>
    <meta name="description" content="Retrouvé ici, la description de notre association et notre équipe !">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500&display=swap" rel="stylesheet">
    <link class="link" rel="stylesheet" href="css/style.css">
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js" defer></script>
    <script src="js/burger.js" defer></script>
    <script src="js/mode.js" defer></script>
</head>

<body>
    <?php
    include "includes/navbar.php"
    ?>
    <main class="descriptions" id="descriptions">
        <section class="articles">
            <img src="img/Clipboard - 15 septembre 2021 15_07.png" alt="Image plateau La télé de l'Yonne">
            <h1>Qu’est ce que La Télé de l’Yonne ?</h1>
            <article class="article">
                <h2>La seule Web TV de l’Yonne</h2>
                <p>La Télé de l’Yonne est une Web TV locale créée en juin 2015.</p>
                <p>La Télé de l’Yonne a pour vocation de rapporter une information culturelle de qualité relative aux
                    manifestations de l’Yonne à travers un journal télévisuel, des chroniques et des reportages.</p>
                <p>Notre Web TV offre également aux jeunes de 14 à 77 ans de toutes les communes, la possibilité de
                    s’épanouir au sein d’un atelier vidéo, clé de voute du projet.</p>
                <p>La jeunesse a ainsi accès à un véritable espace de découverte, de créativité mais aussi
                    d’apprentissage des métiers de la réalisation et de la production (techniques de tournage, prise de
                    parole, montage, prise de vue etc.).</p>
                <p>Supervisés par le responsable éditorial, les apprentis reporters de La Télé de l’Yonne vont sur le
                    terrain pour filmer, poser des questions sur des sujets précis, pour permettre à notre présentateur
                    JT de réaliser son journal d’information chaque vendredi à 12h10.</p>
                <p>Plusieurs stages sont organisés pendant les vacances scolaires :</p>
                <p>un atelier axé sur l’écriture <br>un atelier d’entrainement à l’oral <br>un atelier dédié à la
                    réalisation de courtes séances vidéo </p>
            </article>
            <article class="article">
                <h2>Notre équipe</h2>
                <p>1 plein-temps <br>une dizaine de bénévoles <br>40 adhérents <br>environ 70 jeunes (et moins jeunes ? ) touchés</p>
                <p>L’aventure vous tente ? Vous aimez la vidéo et vous voulez participer à la mise en valeur de votre département ?</p>
                <p>Vous attendez quoi pour nous rejoindre ?</p>
            </article>
        </section>
        <h1>Notre équipe</h1>
        <section class="equipe" id="equipe">
            <?php
                require_once "includes/bdd_connect.php";
                $sql = "SELECT * FROM `staffs`";
                $query = $pdo->query($sql);
                $resultats = $query->fetchAll();

                foreach($resultats as $resultat){    
                    $image = $resultat['img_src'];
                    $name = $resultat['name'];
                    echo
                    "<div class='membre'>
                    <img src='img-equipe/$image' alt=''>
                    <p>$name</p>
                    </div>";
                }
                ?>
        </section>
    </main>
    <?php
    include "includes/footer.php"
    ?>
</body>

</html>