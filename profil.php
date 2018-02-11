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
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
      <meta charset="utf-8">
      <!-- <meta http-equiv="refresh" content="5" > -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

      <?php include('info-utilisateur.php'); ?>
      <!-- Page centrale  -->
      <div class=" container flex-center flex-column" >
        <?php include('commentaire.php'); ?>
        <?php include('updateMdp.php'); ?>
        <?php include('supprime.php'); ?>
        <?php include ('footer-logo.php'); ?>
      </div>
      <!--/.Page centrale-->
    </section>
  </div>
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script>
    setInterval('load_message()', 500);
    function load_message()
    {
      $('#messages').load('load_message.php');
    };
  </script>
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
