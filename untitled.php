if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
{
  $tailleMax = 2097152;
  $extensionValide = array('jpg','jpeg','gif','png');
  if ($_FILES['avatar']['size']<= $tailleMax)
  {
    $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], "."),1));
    if (in_array($extensionUpload, $extensionValide))
    {
      $chemin = "membres/avatar/".$_SESSION['id'].".".$extensionUpload;
      $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
      if ($resultat)
      {
        $updateAvatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id ');
        $updateAvatar->execute(array(
        "avatar" => $_SESSION['id'].".".$extensionUpload,
        "id" => $_SESSION['id']
        ));
        header('Location: editer.php');

      }
      else
      {
        $msg =" erreur lors de l'importation du fichier";
      }
    }
    else {
    $msg ="votre photo doit etre au format jpg , jpeg, gif, png ";
  }

}
else
{
  $msg = "votre photo ne dois pas depasser 2Mo";
}
}




<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="refresh" content="5" > -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Messen</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!--   Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
</head>

<body>

  <?php

  echo '<a href="profil.php?id='.$_SESSION['id'].'"> <button type="button" href="" class="btn btn-primary" data-toggle="modal" data-target="#fullHeightModalLeft"> <i class="fa fa-hand-o-left" aria-hidden="true"></i>
  </button> </a>';

  ?>

  <div class=" flex-center flex-column" >

    <br>
    <h1 class="animated fadeIn mb-4 text-center">Modification du compte:</h1>


    <div class="container">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="md-form">
          <i class="fa fa-user prefix grey-text"></i>
          <input type="text"  class="form-control" name="newpseudo" id="newpseudo" placeholder="<?php echo $userinfo['pseudo'];?>">
          <label for="newpseudo">Nom Utilisateur :</label>
        </div>
        <!--   //mail -->
        <div class="md-form">
          <i class="fa fa-envelope prefix grey-text"></i>
          <input type="text"  class="form-control" name="newmail" id="newmail" placeholder="<?php echo $userinfo['mail'];?>">
          <label for="newmail">Email :</label>
        </div>

        <!--  //mot de passe -->
        <div class="md-form">
          <i class="fa fa-lock prefix grey-text"></i>
          <input type="password"  name="newmdp" id="newmdp">
          <label for="newmdp">Mot de passe :</label>
        </div>
        <div class="md-form">
          <i class="fa fa-lock prefix grey-text"></i>
          <input type="password"  name="newmdp2" id="newmdp2">
          <label for="newmdp2">Confirmation du mot de passe : </label>
        </div>

        <div class="text-center mt-2">
          <button type="submit" class="btn btn-success " >Valider<i class="fa fa-sign-in ml-1"></i></button>
        </div>
        <!--Footer-->

        <div class="logo">
          <p class="animated fadeIn text-muted mt-4 text-center"><small>ATC - Product°</small></p>
          <img src="logo.jpg" class="mx-auto d-block img-responsive" style="width:10%;">
        </div>
      </div>
    </div>
  </form>
</div>
</div>
</div>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>
