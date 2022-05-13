<?php
require_once "../controller/utilisateurc.php";
session_start();
	if(!isset($_SESSION["nompre"])){
		header("Location: login.php");
		exit(); 
	}

 
  $userc=new userc();
  $listeuser =$userc->afficherutilisateur();
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
      <script>console.log('heeloooo sirine !!! ')</script>
      
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

    <div class="card registre-card" style="overflow:scroll; border:#000000 1px solid;">
    <div class="row no-gutters" >
    <div class="card-body"  > 
             
             <center><p class="registre-card-description">Afficher Utilisateurs </p></center>
                    <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">MATRICULE</th>
                          <th scope="col">NOM & PRENOM</th>
                          <th scope="col">NUM TEL</th>    
                          <th scope="col-10">EMAIL</th>
                          <th scope="col-10">ACTION</th>
                         


                        </tr>
                      </thead>
                      <?php foreach($listeuser as $user){if ($_SESSION["nompre"]=='ttadmin'){ ?>
                        <form action ="supprimerutilisateur.php" method="POST">

                      <tbody>
                        <tr>
                          <td><?php echo  $user['id'] ;?></td>
                          <td><?php echo  $user['matricule'] ;?></td>
                          <td><?php echo  $user['nompre'] ;?></td>
                          <td><?php echo  $user['numtel'] ;?></td>
                          <td><?php echo  $user['email'] ;?></td>
                          <td>   
                          <input id="supprimer" data-id="<?php echo $user['id'] ?>" type="button" class="btn btn-danger" value="supprimer" />
                          <a href="modifierutilisateur.php?modifier=<?php echo $user['id']; ?>" type="button" class="btn btn-primary" value="modifier" title="modifier" >MODIFIER</a>              
  
                        </form>
                          </td>
                        </tr>
                      </tbody>
                      <?php } }?> 
                    </table>
            </div>
            </div>
          </div>
          
        </div>
        
	  
	
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script>
		$(document).on('click','#supprimer',function()
    {
        var supprimer_id = $(this).attr('data-id');
			
				$.ajax({
					type: "POST",
					url: "supprimerutilisateur.php",
					data: {
            supp_id: supprimer_id
					},
					cache: false,
          dataType: 'json',
					success: function(data) {
            if (data.return) {         
            alert("Suppression avec Success");
            location.reload();
           }
					},				
				});				
			});
		
	</script>
</body>
</html>