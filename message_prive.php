<?php
include('pdo.php');
if(isset($_SESSION['id']) AND !empty($_SESSION['id']))
{
  if(isset($_POST['msg']))
  {
    if(isset($_POST['destinataire']) AND isset($_POST['messages']) AND !empty($_POST['destinataire']) AND !empty($_POST['messages']))
    {
     $destinataire = htmlspecialchars($_POST['destinataire']);
     $messages = htmlspecialchars($_POST['messages']);
     $id_destinataire = $bdd->prepare('SELECT id FROM membres WHERE pseudo = ?');
     $id_destinataire->execute(array($destinataire));
     $dest_exist = $id_destinataire->rowCount();

     if($dest_exist == 1 )
     {


      $id_destinataire = $id_destinataire->fetch();
      $id_destinataire = $id_destinataire['id'];

      $ins = $bdd->prepare('INSERT INTO message_prive(id_expediteur, id_destinataire, messages) VALUES(?,?,?)');
      $ins->execute(array($_SESSION['id'],$id_destinataire,$messages));
      $error = "Votre message a bien été envoyé !";
    } else
    {
      $error = "Cet utilisateur n'existe pas...";
    }

  } else
  {
   $error = "Veuillez compléter tous les champs";
 }
}
$destinataires = $bdd->query('SELECT pseudo FROM membres ORDER BY pseudo');
?>



<?php

$msgPrivate = $bdd->prepare('SELECT * FROM message_prive WHERE id_destinataire=?');
$msgPrivate->execute(array($_SESSION['id']));
while ($msg_prive = $msgPrivate->fetch())
{
  $_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
  $_exp->execute(array($msg_prive['id_expediteur']));
  $_exp = $_exp->fetch();
  $_exp = $_exp['pseudo'];
  echo 'Nouveaux message de '.$_exp.' : <br>'.$msg_prive['messages'].'<br>';
}
?>
<form method="post"  action="">
  <label class="my-1 mr-2" >Destinataires : </label>
  <select name="destinataire">

    <option  >selection</option>
    <?php while($d = $destinataires->fetch())
    { ?>
      <option  ><?php echo $d['pseudo'] ?></option>
      <?php } ?>
    </select>

    <div class="md-form">
      <textarea type="text" name="messages" ></textarea>
    </div>
    <button type="submit" name="msg"> Envoyer</button>
    <br /><br />
    <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
    </form>



    <!-- <!--Message envoyer-->
              <!-- <p type="text" class="btn-floating btn-small btn-fb"><i class="fa fa-envelope"> Message envoyer :
                <span class="badge badge-info badge-pill">
                 <?php
                 include('pdo.php');
                 $reponse = $bdd->prepare('SELECT COUNT(message) AS message FROM conversation WHERE pseudo = ? ');
                 $reponse->execute(array($_SESSION['pseudo']));
                 $countmessage = $reponse->fetch();
                 echo $countmessage['message'];
                 ?></i></p> -->
               </div>

               <?php
             }
             ?>
