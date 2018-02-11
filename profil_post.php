<?php
session_start();
include('pdo.php');
if (isset($_POST['messagesend']))
{
  $sender = htmlspecialchars($_POST['pseudo']);
  $texto = htmlspecialchars($_POST['message']);
  if (!empty($sender)AND !empty($texto))
  {
    // Insertion du message à l'aide d'une requête préparée
    $reqmessage = $bdd->prepare('INSERT INTO conversation (pseudo, message ,heure) VALUES(?,?, now())');
    $reqmessage->execute(array($sender, $texto ));
    // Redirection du visiteur vers la page du minichat
    header('Location: profil.php?id='.$_SESSION['id']);
  }


}



?>



