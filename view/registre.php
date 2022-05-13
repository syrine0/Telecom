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
  <link rel="stylesheet" href="../assets/scss/registre.scss">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container" >
      <div class="card registre-card">
        <div class="row no-gutters">
          <div class="col-md-7">
            <img src="../assets/images/image3.jpg" alt="registre" class="registre-card-img">
          </div>
          <div class="col-md-5">
            <div class="card-body">
             
              <p class="registre-card-description">Inscription</p>
             
              <form class="box" action="registredata.php" method="post">
                  <div class="form-group">
                    <label for="matricule" class="sr-only">votre Matricule</label>
                    <input type="text" name="matricule" id="matricule" class="form-control" placeholder="Votre Matricule">
                  </div>
                  <div class="form-group">
                    <label for="nompre" class="sr-only">Nom et Prenom</label>
                    <input type="text" name="nompre" id="nompre" class="form-control" placeholder="Nom et Prenom">
                  </div>
                  <div class="form-group">
                    <label for="numtel" class="sr-only">Numéro de téléphone</label>
                    <input type="number" name="numtel" id="numtel" class="form-control" placeholder="Votre numéro de Téléphone">
                  </div>
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Votre Email">
                  </div>
                  
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                  </div>
                  <input id="submit" type="button" class="btn btn-block registre-btn mb-4" value="Sign Up" />
                </form>
                <p class="login-card-footer-text">Vous avez déja un compte ? <a href="login.php" class="text-reset">Cliquez ici</a></p>

              
                
            </div>
          </div>
        </div>
      </div>
   
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
    $("#submit").click(function() {
      var matricule = $("#matricule").val();
      var nompre = $("#nompre").val();
      var numtel = $("#numtel").val();
      var email = $("#email").val();
      var password = $("#password").val();
      if (matricule==''||nompre==''||numtel==''||email==''||password==''){
        alert("Remplir tout les champs SVP !! ");
        return false;
      }
				$.ajax({
					type: "POST",
					url: "registredata.php",
					data: {
            matricule: matricule,
            nompre: nompre,
            numtel: numtel,
            email: email,
            password: password
					},
					cache: false,
          dataType: 'json',
					success: function(data) {
            if (data.return) {
        alert("Vous ètes inscrit avec Success");
        setTimeout(function(){ window.location="login.php"; },1000);
       
    } 
					},				
				});				
			});
    });
		
	</script>
 
 
</body>
</html>