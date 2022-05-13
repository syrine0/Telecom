<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
 
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/scss/login.scss">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container" >
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-7">
            <img src="../assets/images/logo.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-5">
            <div class="card-body">
              <div class="brand-wrapper">
              </div>
              <p class="login-card-description">Sign into your account</p>
              <form class="box" action="logindata.php" method="post" name="login">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="nompre" id="nompre" class="form-control" placeholder="UserName">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                  </div>                
                  <input id="submit" type="button" class="btn btn-block login-btn mb-4" value="Sign In" />
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Vous n'avez pas un compte ? <a href="registre.php" class="text-reset">Inscrivez Vous ici </a></p>
                
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
      
      var nompre = $("#nompre").val();
      var password = $("#password").val();
      if (nompre==''||password==''){
        alert("Remplir tout les champs SVP !! ");
        return false;
      }
				$.ajax({
					type: "POST",
					url: "logindata.php",
					data: {
            nompre: nompre,
            password: password
					},
					cache: false,
          dataType: 'json',
					success: function(data) {
            if (data.return) {
        alert("Bienvenue"+" "+nompre);
        setTimeout(function(){ window.location="index.php"; },1000);
    }else{
      alert("Vérifier Le nom d'utilisateur ou le mot de passe SVP");

    } 
					},				
				});				
			});
    });
		
	</script>
</body>
</html>
