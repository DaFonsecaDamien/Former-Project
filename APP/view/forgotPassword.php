<?php 
    include("../appConfig.php");
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="form-gap"></div>

<div class="container" style="padding-top: 150px;">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="text-center">
            <img style="width: 200px; height: 200px; " src="<?= ressources_uri; ?>/img/icon/resetPassword.png">
            <h2 class="text-center">Forgot Password?</h2>
            <p>You can reset your password here.</p>

            <?php if(isset($_GET['section']))  {
  
  if($_GET['section'] == "code"){ ?>

            <div class="panel-body">
              Un code de vérification vous a été envoyé par mail: <?= $_SESSION['recup_mail'] ?>
              <form class="form" method="post"
                action="<?= root_folder; ?>controller/user_controller/recuperation-traitement.php">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                    <input type="text" placeholder="Code de vérification" name="verif_code" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <input class="btn btn-lg btn-primary btn-block" type="submit" value="Valider" name="verif_submit">
                </div>

                <input type="hidden" class="hide" name="token" id="token" value="">
              </form>
            </div>

            <?php }elseif($_GET['section'] == "changemdp"){ ?>

            <div class="panel-body">
              Nouveau mot de passe pour <?= $_SESSION['recup_mail'] ?>
              <form class="form" method="post"
                action="<?= root_folder; ?>controller/user_controller/recuperation-traitement.php">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                    <input type="password" placeholder="Nouveau mot de passe" name="change_mdp" class="form-control">
                    <input type="password" placeholder="Confirmation du mot de passe" name="change_mdpc"
                      class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <input class="btn btn-lg btn-primary btn-block" type="submit" value="Valider" name="change_submit">
                </div>

                <input type="hidden" class="hide" name="token" id="token" value="">
              </form>

            </div>

            <?php } ?>
            <?php }else { ?>

            <div class="panel-body">
              <form class="form" method="post"
                action="<?= root_folder; ?>controller/user_controller/recuperation-traitement.php">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                    <input type="email" name="recup_mail" placeholder="Votre adresse mail" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <input class="btn btn-lg btn-primary btn-block" type="submit" value="Valider" name="recup_submit">
                </div>

                <input type="hidden" class="hide" name="token" id="token" value="">
              </form>
            </div>

            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>