<?php
session_start();
include('pdo.php');

if (isset($_GET['id']) AND $_GET['id'] > 0)

{

  $getid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM membres WHERE id= ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();


  if ($userinfo['id'] == $_SESSION['id'])
  {
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
            header('Refresh:1; url= profil.php?id='.$_SESSION['id']);
            $success = "photo a bien été modifier";

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
    if (isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $userinfo['pseudo'])
    {

      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $editepseudo = $bdd->prepare('UPDATE membres SET pseudo = ? WHERE id =? ');
      $editepseudo->execute(array($newpseudo, $_SESSION['id']));
      header('Location: connexion.php');
    }
    if (isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $userinfo['mail'])
    {
      $newmail = htmlspecialchars($_POST['newmail']);
      $editemail = $bdd->prepare('UPDATE membres SET mail = ? WHERE id =? ');
      $editemail->execute(array($newmail, $_SESSION['id']));
      header('Location: connexion.php');
    }
    if (isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']) )
    {
      $newmdp = sha1($_POST['newmdp']);
      $newmdp2 = sha1($_POST['newmdp2']);
      if ($_POST['newmdp'] == $_POST['newmdp2'])
      {
        $editemdp = $bdd->prepare('UPDATE membres SET motdepasse = ? WHERE id =? ');
        $editemdp->execute(array($newmdp, $_SESSION['id']));
        header('Location: connexion.php');
      }
    }
    if (isset($_POST['description']) AND !empty($_POST['description']))
    {
      $description = htmlspecialchars($_POST['description']);
      $newDescription = $bdd->prepare('UPDATE membres SET description = ? WHERE id =? ');
      $newDescription->execute(array($description, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
    }
    ?>

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

      echo '<a href="profil.php?id='.$_SESSION['id'].'"> <button type="button" href="" class="btn btn- blue-grey" data-toggle="modal" data-target="#fullHeightModalLeft"> <i class="fa fa-hand-o-left" aria-hidden="true"></i>
      </button> </a>';

      ?>

      <div class=" container flex-center flex-column" >
        <h1 class="animated fadeIn mb-4 text-center">Modification du compte:</h1>
        <!-- debut du formulaire d'inscription  -->
        <form action="" method="post" enctype="multipart/form-data">
          <div class="md-form">
            <i class="f prefix grey-text"></i>
            <img src="membres/avatar/<?php echo $userinfo['avatar']; ?>" class=" img-responsive" width="20">
            <input type="file" name="avatar" >
          </div>
          <!-- //utilisateur -->
          <div class="md-form">
            <i class="fa fa-user prefix grey-text"></i>
            <input type="text"  class="form-control" name="newpseudo" id="newpseudo" placeholder="<?php echo $userinfo['pseudo'];?>">
            <label for="newpseudo">Nom Utilisateur :</label>
          </div>
          <!--   //mail -->
          <div class="md-form">
            <i class="fa fa-user prefix grey-text"></i>
            <input type="text"  class="form-control" name="description" id="description" placeholder="<?php echo $userinfo['description'];?>">
            <label for="description">Description:</label>
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
          <!-- // bouton d'envoie -->
          <div class="text-center mt-2">
            <button type="submit" class="btn btn-success " >Modifier<i class="fa fa-sign-in ml-1"></i></button>

          </div>
        </form>
        <!-- Fin du formulaire d'insciption -->

        <br>



        <div class="container">
          <!--Footer-->
          <p class=" text-center"> <?php

          if (isset($success))
          {
            echo ' <a class=" animated bounce text-center btn btn-success " >'.$success.'</a>
            ';
          }

          ?></p>
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







<?php
}
else
{
  header('Location: connexion.php');
}








}





else
{
  header('Location: connexion.php');
}

?>

