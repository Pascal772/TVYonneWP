<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adhérer à notre association</title>
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
    <main>
        <section class="iframe" style="display: flex; flex-direction: column; margin: auto; width: 80%;">
            <iframe id="haWidget" allowtransparency="true" scrolling="auto" src="https://www.helloasso.com/associations/la-tele-de-l-yonne/formulaires/1/widget" style="width:100%;height:750px;border:none;" onload="window.scroll(0, this.offsetTop)"></iframe>
            <p style="text-align: center; margin:0; background-color: #71c34b; padding: 10px; color: white;">Adhérer à l'association</p>
            <iframe id="haWidget" allowtransparency="true" scrolling="auto" src="https://www.helloasso.com/associations/la-tele-de-l-yonne/adhesions/bulletin-d-adhesion-a-la-tele-de-l-yonne/widget" style="width:100%;height:750px;border:none; margin-top: 0;" onload="window.scroll(0, this.offsetTop)"></iframe>
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