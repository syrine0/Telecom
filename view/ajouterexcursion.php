<?php 
require_once "../controller/utilisateurc.php";

session_start();
if(!isset($_SESSION["nompre"])){
  header("Location: login.php");
  exit(); 
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
            <img src="../assets/images/yalaa.jpg" alt="registre" class="registre-card-img">
          </div>
          <div class="col-md-5">
             <div class="card-body"> 
             
              <p class="registre-card-description">Ajouter une Excursion</p>
             
              <form class="box" action="excursiondata.php" method="post">
                  <div class="form-group">
                    <input type="text" name="excursion_matricule" id="excursion_matricule" class="form-control" placeholder="Matricule">
                  </div>
                  <div class="form-group">
                    <input type="text" name="excursion_nompre" id="excursion_nompre" class="form-control" placeholder="Nom et Prenom">
                  </div>
                  <div class="form-group">
                    <input type="text" name="excursion_age" id="excursion_age" class="form-control" placeholder="Age">
                        </div> 
                  <div class="form-group">
                    <select id="type_excursion" name="type_excursion" class="form-control" >
                        <option value="">TYPE DE EXCURSION</option>
                        <option value="desert">desert</option>
                        <option value="camping">camping</option>
                        </select>       
                        </div>  
                  <input id="submit" type="button" class="btn btn-block registre-btn mb-4" value="Ajouter" />
                </form>
  
            </div>
            </div>
            </div>
            </div>
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
    $("#submit").click(function() {
      var excursionmatricule = $("#excursion_matricule").val();
      var excursionnompre = $("#excursion_nompre").val();
      var excursionage = $("#excursion_age").val();
      var typeexcursion = $("#type_excursion").val();
      
      if (excursionmatricule==''||excursionnompre==''||excursionage==''||typeexcursion==''){
        alert("Remplir tout les champs SVP !! ");
        return false;
      }
             $.ajax({
					type: "POST",
					url: "excursiondata.php",
					data: {
                        excursion_matricule: excursionmatricule,
                        excursion_nompre: excursionnompre,
                        excursion_age: excursionage,
                        type_excursion: typeexcursion
                        
					},
					cache: false,
                    dataType: 'json',
					success: function(data) {
                    if (data.return) {
                    alert("Ajout avec Success");
                    location.reload();
                    
                     }else{
                        alert("s'il vous plais vérifier la Matricule !");
                     }
					},				
				});				
			});
    });
		
	</script>
 
</body>
</html>