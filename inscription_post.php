<?php
// connextion a la base de donnee
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=espace-membre;chasert=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
  die('erreur:'.$e->getMessage());
}
// si on clique sur  le bouton d'inscription "envoie_donnees" alors :
if (isset($_POST['envoie_donnees']))
{
  //on declare les variables qui correspondent au donnees du formulaire
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $mail = htmlspecialchars($_POST['mail']);
  $mail2 = htmlspecialchars($_POST['mail2']);
  $mdp = sha1($_POST['mdp']);
  $mdp2 = sha1($_POST['mdp2']);
// si le champs pseudo, mail, mail2, mdp, mdp2 existent et ne sont pas vides
  if (!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND!empty($_POST['mail2']) AND!empty($_POST['mdp']) AND!empty($_POST['mdp2'])  )
  {
    $pseudolength =strlen($pseudo);
//si le pseudo de l'utilisateur ne depasse pas 255 caractères
    if ($pseudolength <= 255)
    {
      $reqpseudo = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
      $reqpseudo->execute(array($pseudo));
      $pseudoexist = $reqpseudo->rowcount();

//si le spseudo exite pas deja
      if ($pseudoexist == 0)
      {
        //si le mail correspond au mail2
        if ($mail == $mail2)
        {
         if (filter_var($mail, FILTER_VALIDATE_EMAIL))
         {
          $reqmail = $bdd->prepare('SELECT * FROM membres WHERE mail = ?');
          $reqmail->execute(array($mail));
          $mailexist = $reqmail->rowcount();
//si mail n'existe pas déja
          if ( $mailexist == 0)
          {
            //si mdp correspond a mpd2
            if ($mdp == $mdp2)
            {
              //on fait une requete pour envoyer tous les donnees a la base de donnees
              $insertmenbre = $bdd->prepare('INSERT INTO membres(pseudo, mail, motdepasse, avatar,description, heure) VALUES(?,?,?,?,?, now())');
              $insertmenbre->execute(array($pseudo,$mail,$mdp,"avatar.jpg","Ajoutez une description"));
              // on redirige l'internaute verx la page de connexion
              header('Location: connexion.php');






            }else
            {
               //sinon on dis que le message d'ereur "$erreur" est égale à:
              $erreur = "Vos mots de passe de correspondent pas! ";
            }
          }
          else
          {
              //sinon on dis que le message d'ereur "$erreur" est égale à:

            $erreur = "Mail déja existant! ";
          }
        }
        else
        {
              //sinon on dis que le message d'ereur "$erreur" est égale à:
          $erreur = "votre adresse mail n'est pas valide ";
        }
      }
      else
      {
               //sinon on dis que le message d'ereur "$erreur" est égale à:

        $erreur = "Les mails ne correspondent pas ";
      }
    }
    else
    {
               //sinon on dis que le message d'ereur "$erreur" est égale à:

      $erreur = "Pseudo déja existant";
    }
  }
  else
  {
             //sinon on dis que le message d'ereur "$erreur" est égale à:

    $erreur = " Votre pseudo ne dois pas depasser 255 caractères !";
  }
}
else
{
              //sinon on dis que le message d'ereur "$erreur" est égale à:

  $erreur = "Tous les champs doivent être complétés!";
}
}
?>
