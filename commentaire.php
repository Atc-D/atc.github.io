
<!-- Affichage des commentaires  -->
<div class="boxmessage">
  <?php
  include('pdo.php');
  $reponse = $bdd->query('SELECT COUNT(message) AS message FROM conversation ');
  while ($donnees = $reponse->fetch())
  {
    echo '<p>Messages : <span class="badge pink lighten-1"> '.$donnees['message'] .'</span> </p>';
  }
  ?>

  <?php
  include('load_message.php');
  ?>
  <!-- Affichage des commentaires  -->
  <!-- Formulaire de commentaire  -->
  <form class="container" action="profil_post.php" method="post">
    <input type="hidden" name="pseudo" value="<?php echo $_SESSION['pseudo'];?>">
    <textarea type="text" name="message" class="md-textarea" placeholder="Message :" required=""></textarea>
    <input class="btn btn-blue darken-4 btn-ms" type="submit" name="messagesend" />
  </form>
  <!--.Formulaire de commentaire  -->
