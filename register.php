
<!DOCTYPE HTML>
<html>
	<head>
		<title>MinoCard</title>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>

	<head>

	<body style="background: url('images/fond_back.png');">

        <br/> <br/>

<!-- header zone d'inscription-->
        <div class="container">
            <div class="row justify-content-center">
                <span class="border border-secondary border-3 " style="height: 57rem; width: 32rem; border-radius: 1rem;">
                    <div class="text text-center">
                        <img src="images/person.svg" alt="" width="90" height="86" class="d-inline-block align-text-top">
                    </div> 
                    <div class="text text-center">
                        <h5> <strong> Inscription </strong></h5><br/>
                    </div>
                    
    <!-- système vérification d'enregistrement dans la base de donnée-->
                    <?php

					if(isset($_POST['submit'])) 
					{

					$host = "127.0.0.1";
					$db_username = "root";
					$db_password = "";
					$db_name = "minocard";
					$db_port = "3308";


					$surname = $_POST['surname'];
					$firstname= $_POST['firstname'];
					$username = $_POST['username'];
					$genre = $_POST['genre'];
					$password = $_POST['password'];
					$repeatpassword = $_POST['resaisissezlemotdepasse'];
					$adresse = $_POST['adresse'];
					$phone = $_POST['phone'];

						if ($surname&&$firstname&&$username&&$genre&&$password&&$repeatpassword&&$adresse&&$phone) {
							if ($password==$repeatpassword) {
 
								# crypté le mot de passe
								$password = md5($password);

								#se connecter à la base de donnée
								$connect = mysqli_connect($host, $db_username, $db_password, $db_name, $db_port)or die('Error');

								#verifier si un utilisateur n'a pas le meme nom
								$reg = mysqli_query($connect,"SELECT * FROM formtable WHERE surname='$surname'");
								$rows = mysqli_num_rows($reg);

								if($rows==0){
								#verifier si un utilisateur n'a pas le meme nom

									#faire une requette pour insertion des données dans la base de donnée
									#$query = mysqli_query($connect,"INSERT INTO formtable (surname,firstname,genre,username, password,adresse,phone) VALUES ('$surname','$firstname','$genre','$username', '$password','$adresse','$phone')");
									die('
										<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
											<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
											<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
											</symbol>
										<div class="alert alert-success d-flex align-items-center" role="alert">
											<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
											<div>
											votre compte a été crée avec sucess.
											</div>
										</div>
										<div class="text text-center">
											<a class="btn btn-warning" style="border-radius: 1rem;" data-bs-toggle="modal" href="login.php" role="button">Connectez-vous</a>
										</div>
									');
								}else echo('<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
											<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
											<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
											</symbol>
											</svg>
											<div class="alert alert-danger d-flex align-items-center" role="alert">
												<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
												<div>
												<h8> Ce nom existe déja; veuillez choisir un autre </h8>
												</div>
											</div>');
								?>

							<?php
							}else  
								echo('
									<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
										<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
										<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
										</symbol>
									</svg>
									<div class="alert alert-danger d-flex align-items-center" role="alert">
										<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
										<div>
										<h8>les deux mots de passe ne sont pas identiques</h8>
										</div>
									</div>
								');
								
							
						}else
							echo(' 
								<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
										<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
										<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
										</symbol>
									</svg>
									<div class="alert alert-danger d-flex align-items-center" role="alert">
										<svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
										<div>
										veuillez saisir tous les champs
										</div>
									</div>
								');

						
					}
					?>
	<!-- système vérification d'enregistrement dans la base de donnée-->

	<!-- formulaire-->
                    <form method="POST" action="register.php">
                    <p><img src="images/person-fill.svg" alt="" width="20" height="19" class="d-inline-block align-text-top">
					Votre nom:</p>
					<input type="text" class="form-control" name="surname">

					<p><img src="images/person-fill.svg" alt="" width="20" height="19" class="d-inline-block align-text-top">
					Votre prénom:</p>
					<input type="text" class="form-control" name="firstname">

					<p><img src="images/person-fill.svg" alt="" width="20" height="19" class="d-inline-block align-text-top">
					Votre pseudo:</p>
					<input type="text" class="form-control" name="username">

					<p><img src="images/person-fill.svg" alt="" width="20" height="19" class="d-inline-block align-text-top">
					Sexe:</p>
					<select type="text" class="form-select form-select-sm" aria-label=".form-select-sm" name="genre">
						<option selected></option>
						<option value="1">F</option>
						<option value="2">M</option>
					</select>

					<p><img src="images/lock-fill.svg" alt="" width="20" height="19" class="d-inline-block align-text-top">
					Votre mot de passe:</p>
					<input type="password" class="form-control" name="password">

					<p><img src="images/lock-fill.svg" alt="" width="20" height="19" class="d-inline-block align-text-top">
					Entrez de nouveau votre mot de passe:</p>
					<input type="password"  class="form-control" name="resaisissezlemotdepasse">

					<p><img src="images/house-door-fill.svg" alt="" width="20" height="19" class="d-inline-block align-text-top">
					Votre adresse:</p>
					<input type="text"  class="form-control" name="adresse">

					<p><img src="images/telephone-fill.svg" alt="" width="20" height="19" class="d-inline-block align-text-top">
					Numéro téléphone:</p>
					<input type="text"  class="form-control" name="phone"><br/>

					<div class="text text-center">
						<a class="btn btn-warning " href="login.php" style="border-radius: 1rem;" >Anuler</a>
						<input type="submit" class="btn btn-warning"style="border-radius: 1rem;" data-bs-toggle="modal" data-bs-target="#staticBackdrop" value="S'inscrire" name= "submit">
					</div>

					</form>

	<!-- formulaire-->
                    
                </span>

            </div>
        </div>
<!-- header zone d'inscription-->

        <br/><br/>

<!-- footer-->
        <div class="text text-center">
            <h8 class=" text text-center ">Copyright © MinoCard AN-GAP.com™. Tous droits réservés</h8>
        </div> 
<!-- footer-->


<!-- Script css-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
<!-- Script css-->

    </body>
</html>