<?php
// On se connecte à la BDD via notre fichier db.php :
require "db.php"; // (Bureau/Docs/pdo/php/db.php) // require est un iclude qui affiche les erreurs
$db = connexionBase();
// On récupère l'ID passé en paramètre :
$id = $_GET["id"];
// éviter l'injection SQL [ prepare(la requête) puis execute() ]
// On crée une requête préparée avec condition de recherche :
$requete = $db->prepare("SELECT * FROM artist WHERE artist_id=?");
// on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
$requete->execute(array($id)); //il va le mettre sur le ?
// Récupèration des lignes restantes d'un ensemble de résultats
// on récupère le 1e (et seul) résultat :
$myArtist = $requete->fetch(PDO::FETCH_OBJ);
// on clôt la requête en BDD
$requete->closeCursor();
// print_r($requete); // pour voir si les infos remontent
// print_r($myArtist); // pour voir si les infos remontent
?>

<!DOCTYPE html>
<html lang="fr">

<?php
    include "header.php";
?>

<body>

    <!-- afficher un msg si la bdd est introuvable ->




<!-- ajout d'un bouton de modification -->
    <!-- Début de page : traitement PHP + entête HTML
... -->

    <body>
        <div class="container bg-light rounded mt-3 mb-3">
            Artiste N° <?php echo $myArtist->artist_id ?><br>
            <div class="input-group"><!-- Site de l'artiste -->
            <span class="input-group-text mt-3" id="basic-addon3">Artiste n°</span>
            <input type="text" class="form-control mt-3" id="basic-url" placeholder="<?= $myArtist->artist_id ?>"  aria-describedby="basic-addon3" disabled>
            </div><br>
            <!-- Nom de l'artiste : <?= $myArtist->artist_name ?><br> -->
            <div class="input-group"><!-- Site de l'artiste -->
            <span class="input-group-text" id="basic-addon3">Nom de l'artiste</span>
            <input type="text" class="form-control" id="basic-url" placeholder="<?= $myArtist->artist_name ?>"  aria-describedby="basic-addon3" disabled>
            </div><br>
            <!-- Site Internet : <?= $myArtist->artist_url ?><br> -->
            <div class="input-group"><!-- Site de l'artiste -->
            <span class="input-group-text" id="basic-addon3">Site Internet</span>
            <input type="text" class="form-control" id="basic-url" placeholder="<?= $myArtist->artist_url ?>"  aria-describedby="basic-addon3" disabled>
            </div>
            <!-- Bouton modifier -->
            <a href="artist_form.php?id=<?= $myArtist->artist_id ?>"><button type="button" class="btn btn-primary btn-sm mt-3 mb-3">Modifier</button></a>
        </div>
    </body>

    <!-- Fin de page : fermetures de blocs HTML -->

<?php
    include "footer.php";
?>