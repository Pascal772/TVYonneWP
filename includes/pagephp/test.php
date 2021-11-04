<?php

const DBHOST = 'localhost';

const DBUSER = 'root';

const DBPASS = '';

const DBNAME = 'tvyonne';


$dsn = 'mysql:dbname=' . DBNAME . ';host=' . DBHOST;

try {


    $db = new PDO($dsn, DBUSER, DBPASS);


    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    $db->exec('SET NAMES utf8');
} catch (PDOException $e) {


    die($e->getMessage());
}

$sql = "SELECT city.city_code, city.name, COUNT(videos.id) AS nb_videos FROM city LEFT JOIN videos on videos.city_id = city.id GROUP BY city.id";

$requete = $db->query($sql);


$nbvid = $requete->fetchAll();


// echo "<pre>";
// var_dump($nbvid);
// echo "</pre>";


?>

<script>
    let nbvideo = JSON.parse('<?php echo json_encode($nbvid) ?>');
    // console.table(nbvideo);
</script>