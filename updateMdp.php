<?php
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

<!-- Central Modal Large Info-->
<div class="modal fade" id="centralModalLGInfoDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-st modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <small class="heading lead">Modification du mot de passe</small>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
             <div class=" container flex-center flex-column" >

                <!-- debut du formulaire d'inscription  -->
                <form action="" method="post" enctype="multipart/form-data">
                    <!--  //mot de passe -->
                    <br>
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password"  name="newmdp" id="newmdp">
                        <label for="newmdp">Nouveau mot de passe :</label>
                    </div>
                    <br>
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password"  name="newmdp2" id="newmdp2">
                        <label for="newmdp2">Confirmation du mot de passe : </label>
                    </div>
                    <br>
                    <!-- // bouton d'envoie -->
                    <div class="text-center mt-2">
                        <button type="submit" class="btn btn-success " >Modifier<i class="fa fa-sign-in ml-1"></i></button>
                    </div>
                </form>
                <!-- Fin du formulaire d'insciption -->
                <!--Footer-->
                <p class=" text-center"> <?php

                if (isset($success))
                {
                    echo ' <a class=" animated bounce text-center btn btn-success " >'.$success.'</a>
                    ';
                }

                ?></p>


            </div>
        </div>

    </div>

</div>


</div>
<!--/.Content-->
</div>
</div>
<!-- Central Modal Large Info-->





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




