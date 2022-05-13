<?php
require_once "../model/ticket.php";
require_once "../controller/ticketc.php";
require_once "../controller/utilisateurc.php";


session_start();
	if(!isset($_SESSION["nompre"])){
		header("Location: login.php");
		exit(); 
	}
if(isset($_GET["modifier"] ))
 {
 $id = $_GET["modifier"] ;
 $ticketc = new ticketc();
 $selectedticket = $ticketc->getticket($id);
 
 }else 
 { 
    $var = (int)$_POST['ide'] ; 
    $ticket = new ticket(
        $_POST['ticket_matricule'],
        $_POST['ticket_nompre'],
        $_POST['ticket_nbper'], 
        $_POST['type_ticket'],   
        $_POST['offre_ticket'] 
    );
    $ticketc = new ticketc();
    $ticketc->modifierticket($ticket ,  $var);
    $selectedticket = $ticketc->getticket( $var);
    header("Location: ../view/afficherticket.php");
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
             
              <p class="registre-card-description">Modification du Ticket</p>
             
              <form class="box" action="modifierticket.php" method="post">
              <input  type="hidden"  name="ide"  value="<?php echo $selectedticket['ticket_id'] ; ?>" readonly>
                  <div class="form-group">
                    <input type="text" name="ticket_matricule" id="ticket_matricule" value="<?php echo $selectedticket['ticket_matricule'] ; ?>" class="form-control" readonly >
                  </div>
                  <div class="form-group">
                    <input type="text" name="ticket_nompre" id="ticket_nompre" value="<?php echo $selectedticket['ticket_nompre'] ; ?>" class="form-control"  >
                  </div>
                  <div class="form-group">
                    <input type="number" name ="ticket_nbper" id="ticket_nbper" value="<?php echo $selectedticket['ticket_nbper'] ; ?>" class="form-control"  >
                  </div>
                  <div class="form-group">
                    <select id="type_ticket" name="type_ticket" value="<?php echo $selectedticket['type_ticket'] ; ?>"  class="form-control" required>
                        <option value="<?php echo $selectedticket['type_ticket'] ; ?>"><?php echo $selectedticket['type_ticket'] ; ?></option>
                        <?php if($selectedticket['type_ticket']=="Non Subventionne"){?>
                        <option value="Subventionne">Subventionne</option>
                        <?php }else {?>
                        <option value="Non Subventionne">Non Subventionne</option>
                        <?php }?>
                        </select>       
                        </div>  
                    <div class="form-group">
                    <select id="offre_ticket" name="offre_ticket" class="form-control" required>
                        <option value="<?php echo $selectedticket['offre_ticket'] ; ?>"><?php echo $selectedticket['offre_ticket'] ; ?></option>
                        <?php if($selectedticket['offre_ticket']=="Sandwitch"){?>
                        <option value="Self">Self</option>
                        <?php }else{?>
                        <option value="Sandwitch">Sandwitch</option>
                        <?php }?>
                        </select>       
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