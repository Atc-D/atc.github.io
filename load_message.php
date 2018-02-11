
<div id= "messages">
  <?php

  include('pdo.php');
  $reponse= $bdd->query('SELECT pseudo, message, heure, DATE_FORMAT(heure, \'%d/%m/%Y à %Hh %imin\') AS heure_fr FROM conversation ORDER BY heure DESC  LIMIT 3  ');

  while ($donnees = $reponse->fetch())
  {
    echo'

    <div class="list-group" >
    <a href="#" class=" z-depth-1  grey lighten-2 list-group-item list-group-item-action flex-column align-items-start " >
    <div class="d-flex w-100 justify-content-between" >
    <h5 class="mb-1 blue-text">'. htmlspecialchars($donnees['pseudo']) .':</h5>
    </div>
    <p class="mb-1">'. htmlspecialchars($donnees['message']) .'</p>
    <p class="text-right"> <small class="cyan-text" ><i class="comment-date fa fa-clock-o"></i>'.$donnees['heure_fr'].'</small></p>

    </a>
    </div>
    <br>

    ';

  }
  $reponse->closeCursor();
  ?>
</div>






