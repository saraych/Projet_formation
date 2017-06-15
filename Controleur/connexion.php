<?php
    
     require ("../Data/pdo.php");

        $pseudo = $_POST['pseudo'];
        $password=$_POST['password'];
        $passwordcrypt = crypt($_POST['password'], '$2a$07$302838711915bef2db65cc$');
                

      if (password_verify($password, $passwordcrypt )) {
                echo 'Password is valid!';
          } else {
                echo 'Invalid password.';
}

        $req = $dbh->prepare("SELECT * FROM user WHERE pseudo = :pseudo AND password = :password");
    
        $req->bindValue(":pseudo",$pseudo, PDO::PARAM_STR);
        $req->bindValue(":password", $passwordcrypt, PDO::PARAM_STR);
        $req->execute();
        
        if ($res = $req->fetch())
        {
        
        $_SESSION['connecte'] = true;
       
        echo $res['pseudo']."  "." Vous etes connecté!"; 
       // echo "password : " .$passwordcrypt;

        }
        else
            header("location: ../Vue/inscription.html");
?>

