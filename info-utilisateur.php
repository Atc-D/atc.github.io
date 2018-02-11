       <!-- Information utilisateur  -->
       <!-- boutton pour ouvir le side bar -->

       <button  type="button" class="btn btn- blue-grey btn-floating" data-toggle="modal" data-target="#sideModalTL"><?php echo '<i class="fa fa-user-circle" ></i> &nbsp;' .$userinfo['pseudo']; ?></button>
       <div class="modal fade left" id="sideModalTL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-side modal-top-left" role="document">
         <div class="modal-content">
          <!--Header-->
          <!-- boutton pour fermer le side -->
          <div class="modal-header">
            <h4 class="text-center">Informations utilisateur :</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card card-cascade">
              <!--Avatar utilisateur -->
              <div class="view overlay hm-white-slight">
               <?php
               if (!empty($userinfo['avatar']))
               {
                ?>
                <img src="membres/avatar/<?php echo $userinfo['avatar']; ?>" class="img-fluid mx-auto d-block" alt="Responsive image" style="width: 60%; height: 50%;" >
                <?php
              }
              ?>
              <a>
                <div class="mask"></div>
              </a>
            </div>
            <!--/.Fin avatar utlisateur-->
            <!--contenue-->
            <div class="card-body text-center">
              <!--Pseudo-->
              <h4 class="card-title"><strong><?php echo $userinfo['pseudo']; ?></strong></h4>

              <!--Mail-->
              <h5><?php echo $userinfo['mail']; ?></h5>

              <!--description +-->
              <p class="card-text"><?php echo $userinfo['description']; ?></p>
              <hr style="width: 100px;">
              <!--creation du compte +-->
              <p type="text" class="indigo-text"><small>Création du compte : <?php echo $userinfo['heure'] ?></small></p>
              <hr style="width: 100px;">
              <!--supprimer le compte +-->


              <small><a class="blue-text" data-toggle="modal" data-target="#centralModalLGInfoDemo"> <i class="fa fa-lock prefix blue-text"></i> Changer le mot de passe  </a></small><br>
              <small><a class="deep-orange-text" data-toggle="modal" data-target="#modalConfirmDelete"> <i class="fa fa-trash" aria-hidden="true"></i> Supprimer le compte</a></small>




            </div>
            <!--/.Fin contenue-->
          </div>
        </div>
        <!--MODIFIER  / DECONNEXION -->
        <div class="modal-footer justify-content-center">
         <?php
         echo '<a href="editer.php?id='.$_SESSION['id'].'" class="white-text"><button type="button" class="btn btn-orange ">Modifier</button></a>';
         ?>
         <a href="deconexion.php" class="white-text"><button type="button" class="btn btn-blue darken-4">Déconexion</button></a>
       </div>
     </div>
     <!--/.MODIFIER  / DECONNEXION-->
   </div>
 </div>
 <!--.Information utilisateur -->
