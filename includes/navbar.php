<header>
        <nav class="navbar">

        <?php
        if (has_custom_logo()) {
            the_custom_logo();
        } else {
            echo '<h1>' . get_bloginfo('name') . '</h1>';
        }

        echo '<h1>' . get_bloginfo('name') . '</h1>';
        ?>
        <!-- menu haut -->
        <?php wp_nav_menu([
            'theme_location' => 'top_menu',
            'menu_class' => 'lien',
            'container' => 'div'
        ]) ?>

        <section class="nav-main">
            <div class="darkmode">
                <p>Thème sombre</p>
                <span id="dark" class="iconify" data-icon="ic:outline-dark-mode" style="color: black;"></span>
                <span id="light" class="iconify" data-icon="ic:baseline-light-mode" style="color: rgb(255, 255, 255);"></span>
                <div class="burger">
                    <span id="barre1" class="barreburger"></span>
                    <span id="barre2" class="barreburger"></span>
                    <span id="barre3" class="barreburger"></span>
                </div>
                <div class="close">
                    <p>&times;</p>
                </div>
        </section>
</nav>
</header>