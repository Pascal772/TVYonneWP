<header>
    <h1 class="titre">CONNEXION</h1>
    <!-- Menu Burger -->
    <nav class="navbar">
        <section class="nav-main">
            <div class="burger">
                <span id="barre1" class="barreburger"></span>
                <span id="barre2" class="barreburger"></span>
                <span id="barre3" class="barreburger"></span>
            </div>
            <div class="close">
                <p>&times;</p>
            </div>
        </section>
        <div class="lien">
            <h1 class="emissions">Nos émissions</h1>
            <ul class="nav-links">
                <li class="nav-link"><a href="index.php"><strong>Accueil</strong></a></li>
                <li class="nav-link"><a href="emission.php"><strong>Toutes nos émissions</strong></a></li>
                <li class="nav-link"><a href="emission.php#decouvert">A découvert</a></li>
                <li class="nav-link"><a href="emission.php#avant">C'était comment avant ?</a></li>
                <li class="nav-link"><a href="emission.php#pros">Images de pros</a></li>
                <li class="nav-link"><a href="emission.php#jt">Le JT</a></li>
                <li class="nav-link"><a href="emission.php#couverts">Restons couverts</a></li>
                <li class="nav-link"><a href="emission.php#culture">Top culture</a></li>
                <li class="nav-link"><a href="emission.php#garage">Voix de garage</a></li>
                <li class="nav-link2"><a href="description.php">Qui sommes nous ?</a></li>
                <li class="nav-link2"><a href="description.php#equipe">Notre équipe</a></li>
            </ul>
        </div>
    </nav>
    <!-- Menu Burger -->
</header>
<!-- Formulaire -->
<main>
    <form method="post" class="formulaire">
        <div class="mail">
            <label class="label" for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="mp">
            <label class="label" for="pass">Mot de passe</label>
            <input type="password" name="pass" id="pass">
        </div>
        <button type="submit">Me connecter</button>
    </form>
</main>
<!-- Formulaire -->