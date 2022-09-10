<?php
    require("systVerif.php");
    $tab=generer();
    if(isset($_POST['enregistrer'])){
        

        #$host = "127.0.0.1";
        #$db_username = "root";
        #$db_password = "";
        #$db_name = "minocard";
        #$db_port = "3308";

        #se connecter à la base de donnée
        #$connect = mysqli_connect($host, $db_username, $db_password, $db_name, $db_port)or die('Error');

        #faire une requette pour insertion des données dans la base de donnée
        #$query = mysqli_query($connect,"INSERT INTO dataid (idDemande,typecarte,categorie,Tdemande,Pidentifiant,nom,prenom,surnom,
        #sexe,nationalite,profession,birthday,lieuNaissance,departNaissance, paysNaissance, paysResidence, departResidence, lieuResidence, telephone, taille, 
        #teint, grpeEthnique, signeParticulier, fatherName,fatherBirth,motherName,motherBirth,officierEnrol ) 
        #VALUES ('$tab[0]','$tab[1]','$tab[2]','$tab[3]','$tab[4]','$tab[5]','$tab[6]','$tab[7]','$tab[8]','$tab[9]','$tab[10]','$tab[11]','$tab[12]','$tab[13]'
        #,'$tab[14]','$tab[15]','$tab[16]','$tab[17]','$tab[18]','$tab[19]','$tab[20]','$tab[21]','$tab[22]','$tab[23]','$tab[24]','$tab[25]','$tab[26]','$tab[27]')");

        header("Location: photo.php" );

        #deleteFile();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Carte</title>
        <meta charset="UTF_8"/>
        <link rel="stylesheet" href="style_lien.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="carte.css"/>
    </head>
    <body>

        <?php include("NavBar.php");?>

        <div class="container">
            <div class="titre">
                <h3>INFORMATIONS DU CITOYEN</h3>
                <p class="texte">Veuillez vérifier que toutes les informations sont correctes!</p>
            </div>

            <div class="infos">

                <div class="infos1">
                    <div class="infosdemande">
                        <div class="mode">
                            <strong>Information de la demande</strong>
                            <a class="btn btn-success  text-white" href="infosDemande" style="border-radius: 1rem;" >Modifier</a>
                        </div>
                        <hr>
                        <p>type de carte: <?php if(isset($tab[0])){print_r($tab[0]) ;}?></p> <hr>
                        <p>Type de demande: <?php if(isset($tab[1])){print_r($tab[1]) ;}?></p><hr>
                        <p>Poste d'identification: <?php if (isset($tab[2])){print_r($tab[2]) ;}?></p>
                        
                    </div>
                    

                    <div class="citoyen">
                        <div class="mode">
                            <strong>Identité</strong>
                            <a class="btn btn-success  text-white" href="infosDemande" style="border-radius: 1rem;" >Modifier</a>
                        </div>
                        <hr>
                        <p>Nom: <?php if (isset($tab[3])){print_r($tab[3]) ;}?></p><hr>
                        <p>Prénom: <?php if(isset($tab[4])){print_r($tab[4]) ;}?></p><hr>
                        <p>Sexe: <?php if(isset($tab[5])){print_r($tab[5]) ;}?></p><hr>
                        <p>Taille: <?php if( isset($tab[6])){print_r($tab[6]);} ?></p><hr>
                        
                        <p>Nationalité: <?php if (isset($tab[7])){print_r($tab[7]) ;}?></p><hr>
                        <p>Profession: <?php if (isset($tab[8])){print_r($tab[8]) ;}?></p>
                    </div>
                </div>

                <div class="infos2">
                    <div class="naissance">
                        <div class="mode">
                            <strong>Naissance && Résidence</strong>
                            <a class="btn btn-success  text-white" href="infosDemande" style="border-radius: 1rem;" >Modifier</a>
                        </div>
                        <hr>
                        <p>Date de Naissance: <?php  if (isset($tab[9])){print_r($tab[9]) ;}?></p><hr>
                        <p>Lieu de Naissance: <?php if (isset($tab[10])){print_r($tab[10]) ;}?></p><hr>
                        
                        <p>Pays de Résidence: <?php if(isset($tab[11])){print_r($tab[11]) ;}?></p><hr>
                        <p>Lieu de Résidence: <?php if (isset($tab[12])){print_r($tab[12]) ;}?></p><hr>
                        <p>Numero de téléphone: <?php if(isset($tab[13])){ print_r($tab[13]) ;}?></p>
                    </div>

                    <div class="parent">
                        <div class="mode">
                            <strong>Parents</strong>
                            <a class="btn btn-success  text-white" href="infosDemande" style="border-radius: 1rem;" >Modifier</a>
                        </div>
                        <hr>
                        <p>Nom du pere: <?php if(isset($tab[14])){ print_r($tab[14]) ;}?></p><hr>
                        <p>Date de Naissance: <?php if(isset($tab[15])){print_r($tab[15]) ;}?></p><hr>
                        <p>Nom de jeune fille de la mere: <?php  if(isset($tab[16])) {print_r($tab[16]) ;}?></p><hr>
                        <p>Date de Naissance: <?php if(isset($tab[17])){print_r($tab[17]) ;}?></p><hr>
                        <p>Nom de l'officier d'enrollement: <?php if(isset($tab[18])){print_r($tab[18]) ;}?></p>
                    </div>
                </div>

            </div>

            <div class="validation" style= "display: flex; margin-left:900px;">
                <form method="POST" action="carte.php" style="display:inline-block;">
                <input type="submit" class="btn btn-success  text-white" name="enregistrer" value="Enregistrer le formulaire" style="border-radius: 1rem;"/>
                </form>
                <!--a class="btn btn-success  text-white" href="photo.php" style="border-radius: 1rem;" >Enregistrer le formulaire</a-->
                <a class="btn btn-warning  text-black" href="Dashboard.php" style="border-radius: 1rem; display:inline-block; height:40px; margin-left:10px;">Annuler</a>
            </div>
        </div>
        <br/>

        <!-- footer-->
        <div class="card-footer bg-secondary">
            <div class="text text-center text-white">
                <h8>Copyright © MinoCard AN-GAP.com™. Tous droits réservés</h8>
            </div>
        </div> 
        <!-- footer-->
    </body>
</html>



