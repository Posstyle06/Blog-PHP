<?php


try
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if(!empty($_POST['pseudo']) AND !empty($_POST['pass']) AND !empty($_POST['pass2']) AND !empty($_POST['email']) )
{
    
$pseudo= $_POST['pseudo'];
$email= $_POST['email'];


$reponse = $bdd->query('SELECT COUNT(*) AS result FROM members WHERE pseudo="'.$pseudo.'"');
$donnees = $reponse->fetch();
$reponse->closeCursor();

$result= $donnees['result'];

        if ($result==0){
            
        
            if(preg_match("#^[a-z0-9]+[a-z0-9._-]*@[a-z0-9]{2}[a-z0-9._-]*\.[a-z]{2,4}$#", $email)){

            $reponse = $bdd->query('SELECT COUNT(*) AS nblignes FROM members WHERE email="'.$email.'"');
            $donnees = $reponse->fetch();
            $reponse->closeCursor();

            $nblignes= $donnees['nblignes'];    
            
            
	   
                    if($nblignes == 0) {

                        if ($_POST['pass']==$_POST['pass2']) {
                            
                            $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                        
                            $bdd->exec("INSERT INTO members (pseudo, pass, email, registration_date) VALUES
                                    ('$pseudo','$pass_hache', '$email', NOW())");

                            header('Location: inscription.php');
                        }
                        else
                        {
                        echo "Erreur de confirmation du mot de passe<p><a href= http://localhost/PHP/registration/registration.php>Retour à la page d'nscription</a></p>";
                        }
	               
                    } 
	                else {

		            echo "Un compte est déjà associé à cet email<p><a href= http://localhost/PHP/registration/registration.php>Retour à la page d'nscription</a></p>";
	                }
            }
            else 
            {
            echo "L'adresse mail saisie est invalide<p><a href= http://localhost/PHP/registration/registration.php>Retour à la page d'nscription</a></p>";   
            }
        }
        else
        {
        echo "Ce pseudo est déjà pris<p><a href= http://localhost/PHP/registration/registration.php>Retour à la page d'nscription</a></p>"; 
        }

}
else
{
    echo "Tous les champs doivent être remplis<p><a href= http://localhost/PHP/registration/registration.php>Retour à la page d'nscription</a></p>";

}

header('Location: http://localhost/PHP/projet4/index.php')
?>

