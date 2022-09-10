<!DOCTYPE HTML>
<html>

	<head>
		<title>MinoCard</title>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>

	<head>

	<body style="background: url('images/fond_back.png');">

          <br/><br/><br/><br/><br/>

<!-- header zone de connexion-->
        <div class="container">
            <div class="row justify-content-center">
                <span class="border border-secondary border-3 " style="height: 32rem; width: 24rem; border-radius: 1rem;">
                    <div class="text text-center">
                        <img src="images/person.svg" alt="" width="90" height="86" class="d-inline-block align-text-top">
                    </div> 
                    <div class="text text-center">
                        <h5> <strong> Se Connecter </strong></h5><br/>
                    </div> 

    <!-- système vérification dans la base de donnée-->
                    <?php

                    #démarrer une session
                    session_start();

                    if(isset($_POST['submit'])) 
                    {

                    $host = "127.0.0.1";
                    $db_username = "root";
                    $db_password = "";
                    $db_name = "minocard";
                    $db_port = "3308";

                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if ($username&&$password) {

                        $password = md5($password);

                        #se connecter à la base de donnée
                        $connect = mysqli_connect($host, $db_username, $db_password, $db_name, $db_port)or die('Error');

                        #verifie si l'utilisateur existe dans la base de donnée
                        $query = mysqli_query($connect,"SELECT * FROM formtable WHERE username='$username'&& password ='$password'");
                        $rows = mysqli_num_rows($query);

                        if($rows==1){
                        #verifie si l'utilisateur existe dans la base de donnée
 
                            #déclarer la session
                            $_SESSION['username']=$username;
                            header('Location:Dashboard.php');

                        }else echo('<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                  </symbol>
                                    </svg>
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      <div>
                                        <h8> Pseudo ou password incorrects </h8>
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
                              <svg class="bi flex-shrink-0 me-2" width="15" height="15" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                              <div>
                                veuillez saisir tous les champs
                              </div>
                            </div>
                        ');


                    }
                    ?>
    <!-- système vérification dans la base de donnée-->


    <!-- formulaire-->
                    <form method="POST" action="login.php">
                    <p><img src="images/person-fill.svg" alt="" width="20" height="19" class="d-inline-block align-text-top">
                    Votre pseudo:</p>
                    <input type="text" class="form-control" name="username">
                    <p><img src="images/lock-fill.svg" alt="" width="20" height="18" class="d-inline-block align-text-top">
                    Votre mot de passe:</p>
                    <input type="password" class="form-control" name="password"><br/>
                    <div class="text text-center">
                        <input type="submit" class="btn btn-warning"style="border-radius: 1rem;" data-bs-toggle="modal" data-bs-target="#staticBackdrop" value="se connecter" name= "submit">
                    </div>
                    </form>

    <!-- formulaire-->

                    <div class="text text-center">
                        <h7> Mot de passe oublié <a href='login.php'> Cliquer ici</a></h7>
                    </div> 

                    <div class="text text-center">
                        <a class="nav-link" href="register.php">
                            <img src="images/person-plus.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                            <h8 class="text text-primary" >Créez un compte<h8>
                        </a>
                    </div> 
                    
                </span>

            </div>
        </div>
<!-- header zone de connexion-->

        <br/><br/><br/><br/>

<!-- footer-->
        <div class="text text-center">
            <h8 class=" text text-primry text-center ">Copyright © MinoCard AN-GAP.com™. Tous droits réservés</h8>
        </div> 
<!-- footer-->


<!-- Script css-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>


    </body>
</html>