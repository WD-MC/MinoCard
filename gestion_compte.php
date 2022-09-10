<?php
  $host = "127.0.0.1";
  $db_username = "root";
  $db_password = "";
  $db_name = "minocard";
  $db_port = "3308";
  $feminin="Féminin";
  $masculin="Masculin";
?>


<!DOCTYPE HTML>
<html>
	<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="style_lien.css" />
		<title>MinoCard</title>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>

	<head>

	<body>

<!-- NavBar-->
    <nav class="navbar navbar-dark bg-dark">
      <li class="navbar-brand px-2" style="font-size: 1.2rem; color: #F6F2EE;" >
        <img src="images/logo.png" alt="" width="25" height="25" class="d-inline-block align-text-top"><strong> MinoCard </strong>
      </li>
        <div class="text px-2" style="font-size: 1.3rem; color: #F6F2EE;">
          <img src="images/femmeNoire.png" alt="" width="28" height="28" class="d-inline-block align-text-top">

  <!-- système vérification affichage de donnée -->
          <?php
            # déclarer la session #
            session_start();
            # déclarer la session #

            # ouvre la session liée au pseudo #
            if($_SESSION['pseudo']){
              echo $_SESSION['pseudo'];
            # ouvre la session liée au pseudo #

            # recupère le pseudo de la session ouverte #
              $username = $_SESSION['pseudo'];
            # recupère le pseudo de la session ouverte #

            # se connecter à la base de donnée #
              $connect = mysqli_connect($host, $db_username, $db_password, $db_name, $db_port)or die('Error');
            # se connecter à la base de donnée #

            # recupère l'id de la session #
              $resulta = mysqli_query($connect,"SELECT id FROM formtable WHERE pseudo='$username'");
              $row0 = mysqli_fetch_row($resulta);
              $id=$row0[0];
            # recupère l'id de la session #
            
            # envoi la requete pour selectionner les données de l'id #
              $result = mysqli_query($connect,"SELECT * FROM formtable WHERE id='$id'");
            # envoi la requete pour selectionner les données de l'id #

            # vérifie s'il ya erreur #
              if (!$result) {
                  echo 'Impossible la requête : ' . mysql_error();
                  exit;
              }
            # vérifie s'il ya erreur #

            # recupère les données à afficher #
              $row = mysqli_fetch_row($result);

              $codepass=$row[5];
              $pass='................';
              $codepass = $pass;

              if($row[3]=='1'){
                $row[3]=$feminin;
              }else $row[3]=$masculin;
            # recupère les données à afficher #
              
            }else header('Location:login.php');
          ?>
  <!-- système vérification affichage de donnée -->

        </div>
    </nav>
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
                  <h8 class="text text-black" ><strong>Créer une carte</strong><h8>
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
                  <h8 class="text text-primary" ><strong>Gérer mon compte</strong><h8>
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
        <div class="card bg-light text-black">
          <img src="images/v915-wit-002-g_2_1.jpg" class="card-img" alt="..." style="width: 82.3rem; height:47rem;">
          <div class="card-img-overlay" style = "font-family:Georgia;">

            <!--entete-->
            <div class="container" style="margin-left: 8rem;">
              <div class="text text-center">
                  <img src="images/femmeNoire.png" alt="" width="90" height="86" class="d-inline-block align-text-top">
              </div> 

              <div class="text text-center">
                <?php
                  echo('<h4 class=" text text-primry text-center ">Bienvenue '). $row[1],' ',$row[2].('</h4>');
                ?>
                <h8 class=" text text-primry text-center ">Voici vos informations personnelles et des options pour les gérer</h8><br/><br/>
              </div>
            </div> 
            <!--entete--> 

        <!-- système vérification d'authentification-->
          <?php
        
        
          ?>

            <!--contenu-->
            <div class="container" style="margin-left: 15rem;">
              <div class="card bg-transparent border-secondary shadow-lg" style="height:2.rem; width: 50rem;">
                <div class="card-header">
                  <h5>Informations générales</h5>
                </div>
                <div class="card-body">
                  <?php

                    #affiche la donnée correspondante
                    echo('
                    <p><strong>Nom et prénom: </strong>'). $row[1],' ',$row[2]; // la valeur du champ email
                    echo('
                    <hr><p><strong>Pseudo: </strong>'). $row[4];
                    echo('
                    <hr><p><strong>Sexe: </strong>'). $row[3];
                    echo('
                    <hr><p><strong>Mot de passe: </strong>').$codepass;
                  ?>
          
                </div>
              </div>
            </div><br/>


            <div class="container" style="margin-left: 15rem;">
              <div class="card bg-transparent border-secondary shadow-lg " style="height:2.rem; width: 50rem;">
                <div class="card-header">
                  <h5>Coordonnées</h5>
                </div>
                <div class="card-body">
                  <?php
                  #affiche la donnée correspondante
                    echo('
                    <p><strong>Adresse: </strong>'). $row[6];
                    echo('
                    <hr><p><strong>Téléphone: </strong>'). $row[7];
                  ?>
                </div>
              </div>
            </div>

            <div class="position-relative">
              <div class="position-absolute top-0 end-50 translate-middle-y">
                <a href="#" class="btn btn-warning"><h7 class= "text text-black">Modifier mes informations</h7></a>
              </div>
            </div>
            <!--contenu-->

          
        <!-- système vérification d'authentification-->

          </div>
        </div>
      </div> 
      <!--Accueil-->

    </div>
<!-- Footer-->


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