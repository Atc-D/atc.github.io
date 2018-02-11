<?php
session_start();
include('connexion_post.php');
?>
<!DOCTYPE html>
<html lang="en">
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

<body >
  <!-- Start your project here-->
  <div style="height: 100vh">
   <div class="flex-center flex-column">
    <h4 class="title"> CONNEXION</h4>
    <br>   <!-- debut du formulaire d'inscription  -->
    <form action="" method="post">

     <!--   //mail -->
     <div class="md-form">
      <i class="fa fa-envelope prefix grey-text"></i>
      <input type="text" class="form-control" name="mailconnect" id="mailconnect" value="<?php if(isset($mailconnect)) { echo $mailconnect;}
      ?>">
      <label for="mailconnect">Email :</label>
    </div>

    <!--  //mot de passe -->
    <div class="md-form">
      <i class="fa fa-lock prefix grey-text"></i>
      <input type="password"  name="mdpconnect" id="mdpconnect">
      <label for="mdpconnect">Mot de passe :</label>
    </div>
    <!--  // bouton d'envoie -->
    <div class="text-center mt-2">
      <button type="submit" value="<?php $_SESSION['id']?>" name="formconnect" class="btn btn-info">Valider<i class="fa fa-sign-in ml-1"></i></button>
      <div class="options text-center text-md-right mt-1">
        <p>Vous n'êtes pas inscris <a href="inscription.php">Inscrivez-vous</a></p>
        <p class="text-center "><a  href="">Mot de passe oublié ?</a></p>

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
      <p class=" text-center"> <?php
      if (isset($erreur))
      {
        echo '<a class=" animated bounce text-center btn btn-danger btn-sm" >'.$erreur.'</a>';
      }
      ?></p>
      <!-- Fin affichage du message d'erreur  -->
      <div class="logo">
        <p class="animated fadeIn text-muted mt-4 text-center"><small>ATC - Product°</small></p>
        <img src="logo.jpg" class="mx-auto d-block img-responsive" style="width:10%;">
      </div>



      <!--Modal: Register Form-->

    </div>
  </div>
  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.2.1.min.js">

    $("#alert-target").click(function () {
      toastr["info"]("I was launched via jQuery!")
    });

  </script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>





























