<?php
include('pdo.php');
if (isset($_POST['formconnect']))
{

  $mailconnect = htmlspecialchars($_POST['mailconnect']);
  $mdpconnect = sha1($_POST['mdpconnect']);

  if (!empty($mailconnect) AND !empty($mdpconnect))
  {
    $requser = $bdd->prepare('SELECT * FROM membres WHERE mail = ? AND motdepasse = ?');
    $requser->execute(array($mailconnect, $mdpconnect));
    $userexist= $requser->rowCount();

    if ($userexist == 1)
    {
      $userinfo = $requser->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
      $_SESSION['mail'] = $userinfo['mail'];

      header('Location: profil.php?id='.$_SESSION['id']);
    }
    else
    {
      $erreur = "Mot depasse ou mail incorrecte";
    }

  }
  else
  {
    $erreur = "Tous les champs doivent être remplis ";
  }





}
?>
