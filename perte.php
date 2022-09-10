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
    <?php include("NavBar.php");?>
<!-- NavBar-->

<!-- Footer-->
  
    <div class="row g-0">

      <!--barre de menu-->
      <div class="col-6 col-md-2">
        <div class="card bg-light text-black">
          <div class="card-img-overlay">

            <div class="text" style="font-size: 1.15rem;">
              <a class="nav-link" href="">
                  <img src="images/house-door.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                  <h8 class="text text-black" ><strong>Accueil</strong><h8>
              </a>
            </div>

            <div class="text" style="font-size: 1.15rem;">
              <a class="nav-link" href="perte.php">
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
                  <h8 class="text text-primary" ><strong>Déclarer une perte</strong><h8>
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
          <img src="images/fond.jpg" class="card-img" alt="..." style="width: 83.3rem; height:45.7rem;">
          <div class="card-img-overlay text-center " style = "font-family:Georgia;">
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <div class="container" style="margin-left: 10rem;">
              <h1 class="card-title text-black start-50"><strong>BIENVENUE SUR MinoCard Déclaration perte</strong></h1>
              <h4 class="card-text" style = "color: #AC5F1A;"><strong>Votre application de création de carte d'identité</strong></h4>
            </div>
            <br/><br/><br/><br/>
            <div class="container" style="margin-left: 10rem;">
              <h5 class="card-text" style = "color: #AC5F1A;"><strong>Avec MinoCard, la carte d'identité à la porté de clic</strong> </h5>
            </div>
          </div>
        </div>
      </div>
      <!--Accueil-->

    </div>
<!-- Footer-->

<!-- Script css-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!-- Script css-->


  </body>
</html>