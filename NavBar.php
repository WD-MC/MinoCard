<!-- NavBar-->
<nav class="navbar navbar-dark bg-secondary" style="boder-bottom: 2px solid warning;">
  <div class="navbar-brand px-2" style="font-size: 1.2rem; color: #F6F2EE;" >
    <img src="images/logo.png" alt="" width="25" height="25" class="d-inline-block align-text-top"><strong> MinoCard </strong>
  </div>
  <div class="text px-2" style="font-size: 1.3rem; color: #F6F2EE;">
    <img src="images/femmeNoire.png" alt="" width="28" height="28" class="d-inline-block align-text-top">

<!-- système vérification d'authentification-->
    <?php
      #déclarer la session
      session_start();
      if($_SESSION['username']){
        echo $_SESSION['username'];
        
      }else header('Location:login.php');
    ?>
  <!-- système vérification d'authentification-->

  </div>
</nav>
<!-- NavBar-->