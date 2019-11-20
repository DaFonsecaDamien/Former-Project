<?php 
    
    include("../appConfig.php"); 

    if(empty($_COOKIE['user'])){
		$session->create('message', 'Vous n\'avez pas accès a cette page');
		$session->create('message-box-icon', 'error');
		header('location: ' . root_folder . 'index.php');
    }

    load_header();
    $profil = new user_management();
    $result = $profil->getUserConnected();

?>

<script>
    function modificationProfil() {
        document.getElementById("CardInfo").style.display = "none";
        document.getElementById("CardModifMdp").style.display = "none";
        document.getElementById("CardInfoModif").style.display = "block";
    }

    function modificationMDP() {
        document.getElementById("CardInfo").style.display = "none";
        document.getElementById("CardInfoModif").style.display = "none";
        document.getElementById("CardModifMdp").style.display = "block";
    }

    function Retour() {
        document.getElementById("CardInfo").style.display = "block";
        document.getElementById("CardInfoModif").style.display = "none";
        document.getElementById("CardModifMdp").style.display = "none";
    }
</script>

<body>

    <div class="container">
        <div class="card mb-3" height="35px;" width="auto;">
            <div class="row no-gutters">
                <div class="col-md-4  cent">
                    <img src="<?= ressources_uri; ?>/img/membres-avatars/<?php echo $result['avatar']; ?>"
                        class="card-img border" style="width: 300px; height: 300px; " alt="...">
                </div>

                <div class="col-md-8">

                    <div class="card-body" id="CardInfo">
                        <h5 class="card-title title">Vos informations personnelles :</h5>
                        <p class="card-text">Nom : <?php echo $result['nom']; ?></p>
                        <p class="card-text">Prenom : <?php echo $result['prenom']; ?></p>
                        <p class="card-text">Email : <?php echo $result['email']; ?></p>
                        <p class="card-text">Date de Naissance : <?php echo $result['dateNaissance']; ?></p>
                        <p class="card-text">Adresse : <?php echo $result['adresse']; ?></p>
                        <p class="card-text">Num.Telephone : <?php echo $result['telephone']; ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <div id="ModifUser"><button type="button" class="btn btn-success"
                                        onclick="modificationProfil()"> Modifier mes informations </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="ModifMdp"><button type="button" class="btn btn-success"
                                        onclick="modificationMDP()"> Modifier mon mot de passe </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" id="CardInfoModif" style="display: none">
                        <h5 class="card-title title">Modification du profil :</h5>
                        <form enctype="multipart/form-data" method="POST"
                            action="<?= root_folder; ?>controller/user_controller/modification-traitement.php">
                            <div class="input-group">
                                <input type="text" class="form-control" id="nom" name="nom" value='<?php echo $result['nom']; ?>'
                                    title="2 lettres minimum" required />
                                <input type="text" class="form-control" id="prenom" name="prenom" value='<?php echo $result['prenom']; ?>'
                                    title="2 lettres minimum" required />
                            </div>
                            <input type="email" class="form-control" id="email" name="email"
                                    title=" L'odre pour un email correcte est le suivant: characters@characters.domain"
                                    value='<?php echo $result['email']; ?>' required/>
                                    <div class="input-group">
                                        <input type="tel" class="form-control" id="telephone" name="telephone" value='<?php echo $result['telephone']; ?>'
                                            title=" Le numéro doir commencer par 06 ou 07 et avoir au minimum 10 chiffres"
                                            required>
                                        <input type="date" class="form-control" id="dateNaissance" name="dateNaissance"
                                        value='<?php echo $result['dateNaissance']; ?>' required>
                                    </div>
                            <input type="text" class="form-control" id="adresse" name="adresse" value='<?php echo $result['adresse']; ?>' required>
                            <div style="text-align:center">
                                <label style="font-size:20px">Avatar :</label>
                                <input type="file" name="avatar" id="avatar" type="button"> <br><br>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="Valid">
                                        <button type="submit" name="submitModifInfo" class="btn btn-success">Valider</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="Retour">
                                    <button type="button" class="btn btn-success" onclick="Retour()"> Retour</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body" id="CardModifMdp" style="display: none">
                        <h5 class="card-title title">Modification du mot de passe :</h5>
                        <form enctype="multipart/form-data" method="POST"
                            action="<?= root_folder; ?>controller/user_controller/modification-traitement.php">

                            <p class="card-text">Ancien Mot de passe : <input id="ancienPassword" name="ancienPassword"
                                    class="form-control" type='password' required></p>
                            <p class="card-text">Nouveau Mot de passe : <input id="newPassword" name="newPassword"
                                    class="form-control" type='password' required></p>
                            <p class="card-text">Confirmation Nouveau Mot de passe : <input id="confirmNewPassword"
                                    name="confirmNewPassword" class="form-control" type='password' required></p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div id="Valid">
                                        <button type="submit" name="submitModifMdp" class="btn btn-success">Valider</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="Retour">
                                        <button type="button" class="btn btn-success" onclick="Retour()"> Retour</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
<?php
load_footer();
?>