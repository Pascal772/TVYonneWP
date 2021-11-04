<section class="partenaires-container">
        <div class='partenaires-img'>
        <h2>Nos partenaires</h2>
        <?php
        require_once "includes/bdd_connect.php";
        
        $sql = "SELECT * FROM `partners`";
        $query = $pdo->query($sql);
        $resultats = $query->fetchAll();

        foreach($resultats as $resultat ){
                $url = $resultat['link'];
                $image = $resultat['img_src'];
                $name = $resultat['name'];
                echo
                "<a target='blank' href='$url'><img src='img/$image' alt='$name'></a>";
        }
        ?>
        </div>
</section>