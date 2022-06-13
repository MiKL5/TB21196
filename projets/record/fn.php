<?php
// Détruire proprement une session
function cleandesctructsession(){
    unset($_SESSION["login"]); // destruction de la variable
    unset($_SESSION["role"]);
    if (ini_get("session.use_cookies")) // destruction des coockies
        {
        setcookie(session_name(), '', time()-42000);// setcoockie permet de forcer la date d'expiration
        }
    session_destroy(); // destruction du reste
}

// Envoyé un mail

function sendmail() {
    $destinataire = 'Dave Loper <dave.loper@afpa.fr>';
    $objet = 'Validation de votre inscription';
    $message = 'Merci de votre incription.';
    $message = ' ';
    $message = 'Velvet Record';
}

// Sécurité

// Vérifier les saisies
// les saisies à vérifier
if ($_POST["REQUEST_METHOD"] == "POST"){
    $user = verifyinput($_POST["user"]); // Une ligne pour chaque chose à vérifier
}
// fonction  de vérification
function verifyinput($input){
    $înput = trim($input); // supprime les caractères invisibles en début et fin de chaîne
    $input = stripslashes($input); // enlève les antislaches
    $input = htmlspecialchars($input); // enlève les caractères spéciaux
    return $input;
}
?>