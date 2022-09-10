<!--systeme de verification-->

<?php

    require("systVerif.php");
    if(isset($_POST['valider'])){

        $typeCarte = $_POST['typeCarte'];
        $Tdemande = $_POST['Tdemande'];
        $Pidentifiant = $_POST['Pidentifiant'];

        if($typeCarte&&$Tdemande&&$Pidentifiant){

            header("Location: Detail_citoy.php");

            $typeCarte = set($typeCarte);
            $Tdemande = set($Tdemande);
            $Pidentifiant = set($Pidentifiant);

            sauvegarder($typeCarte);
            sauvegarder($Tdemande);
            sauvegarder($Pidentifiant);

        } else{
            $error = '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
            veuillez saisir tous les champs
            </div>
        </div>';
        }
    }

    
    if(isset($_POST['anuler'])){

        deleteFile();
    }
?>

<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style_lien.css" />
        <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.css"/>
        <title>MinoCard</title>

        <link rel="stylesheet" href="css/bootstrap.min.css"/>

    <head>

    <body>

    <!-- NavBar-->
        <?php include("NavBar.php");?>
    <!-- NavBar-->

    <!-- Footer-->
    
        <div class="row g-0">

        <!--barre de menu-->
        <div class="col-6 col-md-2">
            <div class="card bg-light text-black">
            <div class="card-img-overlay">

                <div class="text" style="font-size: 1.15rem;">
                <a class="nav-link" href="Dashboard.php">
                    <img src="images/house-door.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    <h8 class="text text-black" ><strong>Accueil</strong><h8>
                </a>
                </div>

                <div class="text" style="font-size: 1.15rem;">
                <a class="nav-link" href="infosDemande.php">
                    <img src="images/téléchargement.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    <h8 class="text text-primary" ><strong>Créer une carte</strong><h8>
                </a>
                </div> 

                <div class="text" style="font-size: 1.13rem;">
                <a class="nav-link" href="search_id.php">
                    <img src="images/Rech.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    <h8 class="text text-black" ><strong>Chercher une carte</strong><h8>
                </a>
                </div>

                <div class="text" style="font-size: 1.15rem;">
                <a class="nav-link" href="perte.php">
                    <img src="images/id-icon-png-27.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    <h8 class="text text-black" ><strong>Déclarer une perte</strong><h8>
                </a>
                </div><br/>  
                <hr>

                <div class="text" style="font-size: 1.15rem;">
                <a class="nav-link" href="gestion_compte.php">
                    <img src="images/person.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    <h8 class="text text-black" ><strong>Gérer mon compte</strong><h8>
                </a>
                </div>

                <div class="text" style="font-size: 1.15rem;">
                <a class="nav-link" href="aide.php">
                    <img src="images/question-circle.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    <h8 class="text text-black" ><strong>Aide</strong><h8>
                </a>
                </div><br/>
                <hr>

                <div class="text" style="font-size: 1.15rem;">
                <a class="nav-link" href="log_out.php">
                    <h8 class="text text-primary" ><strong>Déconexion</strong><h8>
                </a>
                </div>
                
            </div>
            </div>
        </div>
        <!--barre de menu-->

        

        <!--Accueil-->
        <div class="col-sm-6 col-md-8">
            <div class="card bg-light text-white">
            <img src="images/v915-wit-002-g_2_1.jpg" class="card-img" alt="..." style="width:83.1rem; height:43.25rem;">
            <div class="card-img-overlay text-center " style = "font-family:Georgia;">
                <br/>
                <div class="container" >
                <h4 class="card-text" style = "color: #AC5F1A;"><strong>Formulaire d'identification</strong></h4><br/>
                </div>

                <div class="container" style="margin-left: 15rem;">
                <div class="card bg-transparent border-secondary shadow-lg " style="height:2.rem; width: 50rem;">
                    <div class="card-header text-black text-start">
                        <h5><strong>Information de la Demande</strong></h5>
                    </div>

                    <?php if (isset($error)){?>
                    <?php echo $error;}?>

                    <div class="card-body text-black text-start">
                        <form method="POST" action="infosDemande.php">

                            <p>
                                <label for="typeCarte"> <i class="fa fa-star" style="color:red;"></i> Type de carte: </label>
                                <input type="text" class="form-control" name="typeCarte" id="typeCarte" placeholder="CNI-carte nationale d'identite" required/>
                            </p>
                            <p>
                                <label for="Tdemande"><i class="fa fa-star" style="color:red;"></i> Type de demande:</label>
                                <input type="text" class="form-control" name="Tdemande" id="Tdemande" placeholder="premiere" required/>
                            </p>
                            <p>
                                <label for="Pidentifiant" class="form-label" >Poste d'identification:</label>
                                <input type="text" class="form-control"  name="Pidentifiant" id="Pidentifiant"
                                placeholder="CE88 13"  required/>
                            </p>
                            <br/>
                            
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <h8 class="text text-black text-end" >Page 1 sur 4 <h8>

                            <div class="container" style="margin-left:0rem;">
                                <input type="submit" class="btn btn-success  text-white" name="valider" value="Suivant" style="border-radius: 1rem;"/>
                                <button class="btn btn-warning  text-black" name="anuler" style="border-radius: 1rem;" >Anuler le formulaire</button>
                            </div>
                        </form>

                    </div>
                </div>
                </div>
                <br/>

            </div>
            </div>

        </div>
        <!--header-->

    </div>
<!-- footer-->
    <div class="card-footer bg-secondary">
        <div class="text text-center text-white">
            <h8>Copyright © MinoCard AN-GAP.com™. Tous droits réservés</h8>
        </div>
    </div> 
<!-- footer-->


<!-- Script css-->
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!-- Script css-->


    </body>
</html>