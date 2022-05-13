<?php
require_once "../model/sport.php";
require_once "../controller/sportc.php";
require_once "../controller/utilisateurc.php";


session_start();
	if(!isset($_SESSION["nompre"])){
		header("Location: login.php");
		exit(); 
	}
if(isset($_GET["modifier"] ))
 {
 $id = $_GET["modifier"] ;
 $sportc = new sportc();
 $selectedsport = $sportc->getsport($id);
 
 }else 
 { 
    $var = (int)$_POST['ide'] ; 
    $sport = new sport(
        $_POST['sport_matricule'],
        $_POST['sport_nompre'],
        $_POST['type_sport'], 
        $_POST['sport_age']
        );
    $sportc = new sportc();
    $sportc->modifiersport($sport ,  $var);
    $selectedsport = $sportc->getsport( $var);
    header("Location: ../view/affichersport.php");
 }
 $userc=new userc();
 $admin = $userc->afficheradmin();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tunisie Telecom</title>
  <link rel="icon" type="image/png" href="../assets/images/minilogo.png">

  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/scss/ajouter.scss">
  <link rel="stylesheet" href="css/style.css">

  <link href="../assetss/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  

    

</head>

<body>

<nav>
      <a class="navbar-brand smoothie logo logo-dark" href="index.php"><img src="../assets/images/minilogo.png" alt="logo"></a>

            <ul>
              <li><a href="index.php">ACCUEIL</a></li>
              <li><a href="#">TICKET</a>
                <ul>
                  <li><a href="ajouterticket.php">Ajouter un ticket</a></li>
                  <?php if ($_SESSION['nompre']=="ttadmin"){?>
                      <li><a href="afficherticket.php">Afficher un ticket</a></li>
                  <?php }?>
                </ul>
              </li>
              <li><a href="#">SPORT</a>
              <ul>
                  <li><a href="ajoutersport.php">Ajouter un sport</a></li>
                  <?php if ($_SESSION['nompre']=="ttadmin"){?>
                  <li><a href="affichersport.php">Afficher un sport</a></li>
                  <?php }?>
                </ul>
              </li>
              <li><a href="#">EXCURSION</a>
              <ul>
                  <li><a href="ajouterexcursion.php">Ajouter une excursion</a></li>
                  <?php if ($_SESSION['nompre']=="ttadmin"){?>
                  <li><a href="afficherexcursion.php">Afficher une excursion</a></li>
                  <?php }?>
                </ul>
              </li>
              <?php if ($_SESSION['nompre']=="ttadmin"){ foreach($admin as $adminn) {?>
                  <li><a href="modifieradmin.php?modifier=<?php echo $adminn['id']; ?>">MON COMPTE</a>
                  <?php }}else{?>
                    <li><a href="#">MON COMPTE</a>
                  <?php }?>
              
              <ul>
                <center><h5><?php echo $_SESSION['nompre']; ?></h5></center>
                <?php if ($_SESSION['nompre']=="ttadmin"){ foreach($admin as $adminn) {?>
                  <li><a href="afficherutilisateur.php">Afficher les Utilisateurs</a></li>
                  <?php }}?>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </li>
              
            </ul>

      </nav>
      
   <br> <br> <br> 
      <div class="card registre-card">
      <div class="row no-gutters">
          <div class="col-md-7">
            <img src="../assets/images/ticket.png" alt="registre" class="registre-card-img">
          </div>
          <div class="col-md-5">
             <div class="card-body"> 
             
              <p class="registre-card-description">Modification du Sport</p>
             
              <form class="box" action="modifiersport.php" method="post">
              <input  type="hidden"  name="ide"  value="<?php echo $selectedsport['sport_id'] ; ?>" readonly>
                  <div class="form-group">
                    <input type="text" name="sport_matricule" id="sport_matricule" value="<?php echo $selectedsport['sport_matricule'] ; ?>" class="form-control" readonly >
                  </div>
                  <div class="form-group">
                    <input type="text" name="sport_nompre" id="sport_nompre" value="<?php echo $selectedsport['sport_nompre'] ; ?>" class="form-control"  >
                  </div>
                 
                  <div class="form-group">
                    <select id="type_sport" name="type_sport" value="<?php echo $selectedsport['type_sport'] ; ?>"  class="form-control" required>
                        <option value="<?php echo $selectedsport['type_sport'] ; ?>"><?php echo $selectedsport['type_sport'] ; ?></option>
                        <?php if($selectedsport['type_sport']=="zumba"){?>
                        <option value="football">football</option>
                        <?php }elseif($selectedsport['type_sport']=="football"){?>
                          <option value="zumba">zumba</option>
                          <?php }?>
                        </select>       
                        </div>  
                        <div class="form-group">
                    <input type="number" name ="sport_age" id="sport_age" value="<?php echo $selectedsport['sport_age'] ; ?>" class="form-control"  >
                  </div>         
                           <button name="submit" class="btn btn-block registre-btn mb-4">MODIFIER </button>
                </form>
  
            </div>
            </div>
            </div>
            </div>
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   
</body>
</html>