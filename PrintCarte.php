<script defer src = "photo.js"></script>
<?php
    require ("systVerif.php");
    $tab = generer();
    if(isset($_POST['enregistrer'])){

        $host = "127.0.0.1";
        $db_username = "root";
        $db_password = "";
        $db_name = "minocard";
        $db_port = "3308";

        #se connecter à la base de donnée
        $connect = mysqli_connect($host, $db_username, $db_password, $db_name, $db_port)or die('Error');

        #faire une requette pour insertion des données dans la base de donnée
        #$query = mysqli_query($connect,"INSERT INTO infocarte (Tcarte,Tdemande,Pidentifiant,nom,prenom
        #sexe,taille,nationalite,profession,D_naissance,L_naissance, P_residence, L_residence, tel,
        #nomPere,D_pere,nomMere,D_mere,nomOfficier) 
        #VALUES ('$tab[0]','$tab[1]','$tab[2]','$tab[3]','$tab[4]','$tab[5]','$tab[6]','$tab[7]','$tab[8]','$tab[9]','$tab[10]','$tab[11]','$tab[12]','$tab[13]'
        #,'$tab[14]','$tab[15]','$tab[16]','$tab[17],$tab[18]')");

        #faire une requette pour insertion des données dans la base de donnée
        #$query = mysqli_query($connect,"INSERT INTO dataid (idDemande,typecarte,categorie,Tdemande,Pidentifiant,nom,prenom,surnom,
        #sexe,nationalite,profession,birthday,lieuNaissance,departNaissance, paysNaissance, paysResidence, departResidence, lieuResidence, telephone, taille, 
        #teint, grpeEthnique, signeParticulier, fatherName,fatherBirth,motherName,motherBirth,officierEnrol ) 
        #VALUES ('$tab[0]','$tab[1]','$tab[2]','$tab[3]','$tab[4]','$tab[5]','$tab[6]','$tab[7]','$tab[8]','$tab[9]','$tab[10]','$tab[11]','$tab[12]','$tab[13]'
        #,'$tab[14]','$tab[15]','$tab[16]','$tab[17]','$tab[18]')");

        header("Location: genCarte.php" );

        #deleteFile();
    }

    if(isset($_POST['anuler'])){
        header("Location: Dashboard.php");
        deleteFile();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>printCarte</title>
        <meta charset="UTF_8"/>
    
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="print.css"/>

    </head>

    <body>

    <?php include("NavBar.php");?>

        <div class="container">

            <div id="row" class="row">
                <div class="col-4 col-md-4 text-center">
                    <p class="block">
                        REPUBLIQUE DU CAMEROUN
                    </p>
                    <p class="block">Paix-Travail-Patrie</p>
                    <p class="block">--------</p>
                    <p class="block">PRESIDENCE DE LA REPUBLIQUE</p>
                    <p class="block">--------</p>
                    <p class="block">DELEGATION GENERALE A LA SURETE NATIONALE</p>
                </div>

                <div class="col-4 col-md-4 text-center">
                    <img class="imge" src="images/repcameroun.JPG"/>
                </div>

                <div class="col-4 col-md-4 text-center">
                    <p id="rep" class="block" >REPUBLIC OF CAMEROON</p>
                    <p class="block">Peace-Work-Fatherland</p>
                    <p class="block">--------</p>
                    <p class="block">PRESIDENCY OF THE REPUBLIC</p>
                    <p class="block">--------</p>
                    <p class="block">GENERAL DELEGATION FOR NATIONAL SECURITY</p>
                </div>
            </div>

            <hr>

            <div class="row" >
                <div class="col-3 col-md-3 ">
                    <img class = "image" src="images/femme-noire.jpg"/>
                </div>
                <div class="col-9 col-md-9">
                    <h3>Infos Demande</h3><br/>

                    <p><strong>type de carte: </strong> <?php if(isset($tab[0])){print_r($tab[0]) ;}?></p>
                    <p><strong>Type de demande: </strong> <?php if(isset($tab[1])){print_r($tab[1]) ;}?></p>
                    <p><strong>Poste d'identification: </strong> <?php if (isset($tab[2])){print_r($tab[2]) ;}?></p>

                </div>
            </div>   

            <div class="row">
                <div class="col-6 col-md-6">
                    <h3>Identité</h3><br/>
                    <p><strong>Nom: </strong><?php if (isset($tab[3])){print_r($tab[3]) ;}?></p>
                    <p><strong>Prénom: </strong><?php if(isset($tab[4])){print_r($tab[4]) ;}?></p>
                    <p><strong>Sexe: </strong><?php if(isset($tab[5])){print_r($tab[5]) ;}?></p>
                    <p><strong>Taille: </strong><?php if( isset($tab[6])){print_r($tab[6]);} ?></p>
                    
                    <p><strong>Nationalité: </strong><?php if (isset($tab[7])){print_r($tab[7]) ;}?></p>
                    <p><strong>Profession: </strong><?php if (isset($tab[8])){print_r($tab[8]) ;}?></p>
                </div>

                <div class="col-6 col-md-6">
                    <h3>Naissance && Résidence</h3>
                    <p><strong>Date de Naissance: </strong><?php  if (isset($tab[9])){print_r($tab[9]) ;}?></p>
                    <p><strong>Lieu de Naissance: </strong><?php if (isset($tab[10])){print_r($tab[10]) ;}?></p>
                    <p><strong>Pays de Résidence: </strong><?php if(isset($tab[11])){print_r($tab[11]) ;}?></p>
                    <p><strong>Lieu de Résidence: </strong><?php if (isset($tab[12])){print_r($tab[12]) ;}?></p>
                    <p><strong>Numero de téléphone: </strong><?php if(isset($tab[13])){ print_r($tab[13]) ;}?></p>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Parents</h3>
                    <p><strong>Nom du pere: </strong><?php if(isset($tab[14])){ print_r($tab[14]) ;}?></p>
                    <p><strong>Date de Naissance: </strong><?php if(isset($tab[15])){print_r($tab[15]) ;}?></p>
                    <p><strong>Nom de jeune fille de la mere: </strong><?php  if(isset($tab[16])) {print_r($tab[16]) ;}?></p>
                    <p><strong>Date de Naissance: </strong><?php if(isset($tab[17])){print_r($tab[17]) ;}?></p>
                    <p><strong>Nom de l'officier d'enrollement: </strong><?php if(isset($tab[18])){print_r($tab[18]) ;}?></p>
                </div>
            </div>

            <hr/>

            <div class="row">
                <div class="col-6 col-md-6">
                    <h5>Signature de l'Officier d'enrollement</h5>
                    <p id="vide"></p>
                </div>
                <div class="col-6 col-md-6 text-center">
                    <h5>Signature de l'Usager</h5>
                    <p id="vide1"></p>
                </div>
            </div>
            <hr/>

            <form method="POST" action="PrintCarte.php">
                <button class="btn btn-success  text-white" name="enregistrer" style="border-radius: 1rem; ">Imprimer</button>
                <button class="btn btn-warning  text-black" name="anuler" style="border-radius: 1rem;" >Annuler</button>
            </form>
            <br/>

        </div>

        <!-- footer-->
        <div class="card-footer bg-secondary">
            <div class="text text-center text-white">
                <h8>Copyright © MinoCard AN-GAP.com™. Tous droits réservés</h8>
            </div>
        </div> 
    <!-- footer-->

    </body>
</html>