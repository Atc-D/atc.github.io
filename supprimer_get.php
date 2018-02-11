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
    $deletecompte = $bdd->prepare('DELETE FROM membres WHERE id = ?');
    $deletecompte->execute(array($_SESSION['id']));
    header('Refresh:3;url= inscription.php');
    echo '  <!DOCTYPE html>
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
    <div class="card container  flex-center flex-column z-depth-3 success-color " >
    <div class="card-body ">
    <!--Title-->
    <h2 class="card-title text-center  ">Votre compte à bien été supprimer</h2>
    <br>
    <p class="text-center"> Nous espèrons vous revoir très bientot <i class="fa fa-smile-o" aria-hidden="true"></i><p>
    <!--Text-->
    <p class="card-text text-center"> <i class="fa fa-check fa-5x" aria-hidden="true"></i></p>
    </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
    </html>
    ';

}

}
?>
