<?php
      require('config.php');
      if (isset($_POST['matricule'], $_POST['nompre'], $_POST['numtel'], $_POST['email'], $_POST['password'])){
        $matricule = stripslashes($_POST['matricule']);
        $matricule = mysqli_real_escape_string($conn, $matricule);
        $nompre = stripslashes($_POST['nompre']);
        $nompre = mysqli_real_escape_string($conn, $nompre); 
        $numtel = stripslashes($_POST['numtel']);
        $numtel = mysqli_real_escape_string($conn, $numtel);
        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($conn, $password);
          $query = "INSERT into `users` (matricule, nompre, numtel, email, password)
                    VALUES ('$matricule', '$nompre', '$numtel', '$email', '".hash('sha256', $password)."')";
          $res = mysqli_query($conn, $query);
          if($res){  
            $return = true;

          }
      }
      die(json_encode(array('return' => $return)));

?>