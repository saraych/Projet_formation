<?php
    require ("../Data/pdo.php");
    extract($_POST);


if(empty($password)){
    echo 'il manque le mot de passe ';
}

    if (empty($name) || empty($pname) || empty($adress)||empty($city)||empty($postalCode)||empty($age)||empty($pseudo)||empty($password)||empty($mail))
        echo "<h3> Champs vide veuillez tout remplir </h3>";

    else
    {    
        $name = $_POST['name'];
        $pname = $_POST['pname'];
        $adress = $_POST['adress'];
        $city = $_POST['city'];
        $postalCode = $_POST['postalCode'];
        $age = $_POST['age'];
        $pseudo= $_POST['pseudo'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
$passwordcrypt = crypt($_POST['password'], '$2a$07$302838711915bef2db65cc$');
        /*$salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);
        $passwordhash = crypt($password, $salt);
        Voir la documentation de crypt() : http://devdocs.io/php/function.crypt
        */
        
   
   $req = $dbh->prepare('INSERT INTO user(name,pname,adress,city,postalCode,age,pseudo,mail,password) VALUES(
      :name, :pname, :adress, :city, :postalCode, :age, :pseudo, :mail, :password
    )');
        
     $req->bindValue(":name",$name,PDO::PARAM_STR);
     $req->bindValue(":pname",$pname,PDO::PARAM_STR);
     $req->bindValue(":adress",$adress,PDO::PARAM_STR);
     $req->bindValue(":city",$city,PDO::PARAM_STR);
     $req->bindValue(":postalCode",$postalCode,PDO::PARAM_INT);
     $req->bindValue(":age",$age,PDO::PARAM_INT);
     $req->bindValue(":pseudo",$pseudo,PDO::PARAM_STR);
     $req->bindValue(":mail",$mail,PDO::PARAM_STR);
    /* $req->bindValue(":password",$passwordhash,PDO::PARAM_STR);*/
     $req->bindValue(":password",$passwordcrypt,PDO::PARAM_STR);
     
        echo "name = " .$name;
        echo "<br/>pname = " .$pname;
        echo "<br/>adress = " .$adress;
        echo "<br/>city = " .$city;
        echo "<br/>postalCode = ".$postalCode;
        echo "<br/>age=".$age;
        echo "<br/>pseudo=".$pseudo;
        echo "<br/>mail=".$mail;
        echo"<br/>password=".$passwordcrypt;
        
    $req->execute();

 
    }
?>