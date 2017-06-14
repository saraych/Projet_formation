<?php
    
    require ("../Data/pdo.php");
        
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        
                
        $req = $dbh->prepare("SELECT * FROM user WHERE pseudo = :pseudo AND password = :password");
    
        $req->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $req->bindValue(":password", $password, PDO::PARAM_STR);
        $req->execute();
        
        if ($res = $req->fetch())
        {
        
        $_SESSION['connecte'] = true;
       
        //echo $res['pseudo']."<p> Vous etes connecté!</p>"; 
          
           
            
        echo "Vous etes connecté " .$pseudo;
       // echo "password : " .$password;

        }
        else
            header("location: ../Vue/inscription.html");
?>

