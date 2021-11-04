<?php

session_start();
// On vérifie si $_POST n'est pas vide
if (!empty($_POST)) {
    // Ici on sait que le formulaire a été envoyé
    // On vérifie que tous les champs obligatoires sont remplis
   
    if (
        isset($_POST['name'], $_POST['firstname'], $_POST['email'], $_POST['sujet'], $_POST['message'], $_POST['rgpd']) &&
        !empty($_POST['name']) &&
        !empty($_POST['firstname']) &&
        !empty($_POST['email']) &&
        !empty($_POST['sujet']) &&
        !empty($_POST['message']) &&
        !empty($_POST['rgpd'])
    ) {
        // Le formulaire est rempli
        // On vérifie l'email
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'][] = 'L\'email n\'est pas valide';
            header('Location: contact.php');
            exit;
        }

        // On "sécurise" les données
        $sujet = strip_tags($_POST['sujet']);
        $message = htmlentities($_POST['message']);
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];

        // Gestion du fichier
        // On initialise le nom à null, pour les cas sans fichier
        $nomFichier = NULL;

        // On vérifie si on a un fichier
        if ($_FILES['fichier']['error'] == 0) {
            // On vérifie le type de fichier (PDF, TXT, JPG, PNG)
            $extensions = ['pdf', 'txt', 'jpg', 'jpeg', 'jfif', 'png'];
            $types = ['application/pdf', 'text/plain', 'image/jpeg', 'image/png'];

            // On récupère l'extension du fichier en minuscules
            $extFichier = strtolower(pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION));

            if (!in_array($extFichier, $extensions) || !in_array($_FILES['fichier']['type'], $types)) {
                $_SESSION['message'][] = 'Le type de fichier n\'est pas autorisé (pdf, txt, jpg et png sont acceptés)';
            }

            // On vérifie la taille (max 4Mo)
            if ($_FILES['fichier']['size'] > 4194304) {
                $_SESSION['message'][] = 'Le fichier dépasse le maximum de 4Mo autorisé';
            }

            // En cas d'erreur, redirection
            if (!empty($_SESSION['message'])) {
                header('Location: contact.php');
                exit;
            }

            // On génère le nom du fichier
            $nomFichier = md5(uniqid()) . '.' . $extFichier;

            // On déplace le fichier temporaire dans la destination tout en le renommant
            // On crée le chemin complet
            $chemin = __DIR__ . '/uploads/contacts/' . $nomFichier;

            // On déplace
            if (!move_uploaded_file($_FILES['fichier']['tmp_name'], $chemin)) {
                $_SESSION['message'][] = 'La copie de la pièce jointe a échoué';
                header('Location: contact.php');
                exit;
            }
           
        }
       
        // On se connecte à la base
        require_once 'includes/bdd_connect.php';

        // On écrit la requête
        $sql = "INSERT INTO `formulaires`(`name`, `firstname`, `email`, `subject`, `message`, `attachment`, `rgpd`) VALUES (:name, :firstname, :email, :subject, :message, :nomfichier, 1);";

        // On prépare la requête
        $requete = $pdo->prepare($sql);

        // On injecte les données
        $requete->bindValue(':email', $email, PDO::PARAM_STR); // PDO::PARAM_STR est facultatif
        $requete->bindValue(':name', $name);
        $requete->bindValue(':firstname', $firstname);
        $requete->bindValue(':subject', $sujet);
        $requete->bindValue(':message', $message);
        // On protège 
        $param = ($nomFichier != NULL) ? PDO::PARAM_STR : PDO::PARAM_NULL;
        $requete->bindValue(':nomfichier', $nomFichier, $param);

        // On exécute la requête
        ($requete->execute());
        

        $_SESSION['message'][] = 'Le formulaire a été envoyé';
        header('Location: contact.php');
        exit;

    } else {
        $_SESSION['message'][] = 'Il faut remplir tous les champs obligatoires';
        header('Location: contact.php');
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vous souhaitez nous contacter ?</title>
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
    <main class="formulaire-contact">
        <form method="POST" enctype="multipart/form-data">
            <h1>Vous souhaitez nous contacter ?</h1>
            <?php
        if(isset($_SESSION['message'])){
            foreach($_SESSION['message'] as $message){
                echo "<p>$message</p>";
            }
            unset($_SESSION['message']);
        }
        ?>
            <div class="name">
                <label for="name">Nom :</label>
                <input type="text" name="name" id="name" placeholder="ex: Gambier">
            </div>
            <div class="firstname">
                <label for="firstname">Prénom :</label>
                <input type="text" name="firstname" id="firstname" placeholder="ex: Benoît">
            </div>
            <div class="email">
                <label for="email">E-mail :</label>
                <input type="email" name="email" id="email" placeholder="ex: benoit.gambier@gmail.com">
            </div>
            <div class="subject">
                <label for="sujet">Sujet :</label>
                <input type="text" name="sujet" id="sujet" placeholder="ex: Demande d'interview">
            </div>
            <div class="message">
                <label for="message">Votre message :</label>
                <textarea name="message" id="message" cols="30" rows="5" maxlength="501" placeholder="501 caractères maximum"></textarea>
            </div>
            <div>
                <label for="fichier">Pièce jointe (facultatif)</label>
                <input type="file" name="fichier" id="fichier">
            </div>
            <div>
                <input type="checkbox" name="rgpd" id="rgpd">
                <label for="rgpd">J'accepte la collecte de mes données personnelles dans le cadre de cette demande de contact. Les données concernées seront utilisées exclusivement pour traiter ma demande.</label>
            </div>
            <button type="submit">Envoyer votre demande</button>
        </form>
        <section class="imgplateau">
            <img src="img/Clipboard - 15 septembre 2021 15_07.png" alt="image plateau la télé de l'Yonne">
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