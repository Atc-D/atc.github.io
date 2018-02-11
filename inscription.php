<?php include('inscription_post.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Messenger_Star</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body class=" container">
  <div style="height: 100vh">
    <div class=" container flex-center flex-column">
      <h4 class="title"> INSCRIPTION </h4>


      <!-- debut du formulaire d'inscription  -->
      <form action="" method="post">
        <!-- //utilisateur -->
        <div class="md-form">
          <i class="fa fa-user prefix grey-text"></i>
          <input type="text" id="pseudo" class="form-control" name="pseudo"
          value="<?php if(isset($pseudo)) { echo $pseudo;}?>">
          <!-- on affiche le pseudo meme si l'utilisateur se trompe sur les autre champ pour eviter de tout reécrire  -->
          <label for="pseudo">Nom Utilisateur :</label>
        </div>
        <!--   //mail -->
        <div class="md-form">
          <i class="fa fa-envelope prefix grey-text"></i>
          <input type="text" id="mail" class="form-control" name="mail"
          value="<?php if(isset($mail)) { echo $mail;}?>">
          <!-- on affiche le mail meme si l'utilisateur se trompe sur les autre champ pour eviter de tout reécrire  -->
          <label for="mail">Email :</label>
        </div>
        <!-- //confirmation de mail -->
        <div class="md-form">
          <i class="fa fa-envelope prefix grey-text"></i>
          <input type="text" id="mail2" class="form-control" name="mail2"
          value="<?php if(isset($mail2)) { echo $mail2;}?>">
          <!-- on affiche le mail2 meme si l'utilisateur se trompe sur les autre champ pour eviter de tout reécrire  -->
          <label for="mail2">Email :</label>
        </div>
        <!--  //mot de passe -->
        <div class="md-form">
          <i class="fa fa-lock prefix grey-text"></i>
          <input type="password"  name="mdp" id="mdp">
          <label for="mdp">Mot de passe :</label>
        </div>
        <!--  //Confirmation du mot de passe -->
        <div class="md-form">
          <i class="fa fa-lock prefix grey-text"></i>
          <input type="password"  name="mdp2" id="mdp2">
          <label for="mdp2">Confirmation du mot de passe : </label>
        </div>
        <!-- // bouton d'envoie -->
        <div class="text-center mt-2">
          <button type="submit" value="je m'inscris" name="envoie_donnees" class="btn btn-info " >Valider<i class="fa fa-sign-in ml-1"></i></button>
          <!-- //Redirection vers la page connexion si internaute déja inscris -->
          <div class="options text-center text-md-right mt-1">
            <p>Vous êtes déjà inscris <a href="connexion.php">Connectez-vous</a></p>
          </div>
        </div>
      </form>
      <!-- Fin du formulaire d'insciption -->

      <!--Affichage d'un message d'erreur si
        - tous les champs ne sont pas remplis
      - le nom utilisateur ne depasse pas 255 caractère
      - le nom d'utilisateur  deja existant
      - les mail ne correspondent pas
      - l'adresse mail n'est pas valide
      - le mail existe deja
      - les mots de passe ne correspondent pas -->
      <p class=" text-center">
       <?php
       if (isset($erreur))
       {
        echo '<a class=" animated bounce text-center btn btn-danger btn-sm" >'.$erreur.'</a>';
      }

      ?>

    </p>

    <!-- Fin affichage du message d'erreur  -->
    <div class="logo">
     <p class="animated fadeIn text-muted mt-4 text-center"><small>ATC - Product°</small></p>
     <img src="logo.jpg" class="mx-auto d-block img-responsive" style="width:10%;">
   </div>
 </div>
</div>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"> </script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>
