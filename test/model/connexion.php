<?php
include("Comptes.php");
session_start();




if(key_exists("login",$_POST) and key_exists("password",$_POST) ) {
   

    foreach ($comptes as $cpt) {
        if ($cpt["login"]===$_POST["login"] && password_verify($_POST["password"],$cpt["password"]) ) {
            $_SESSION['connecte']=true;
            echo "connexion reussie";
        break;
        }
        else{
            echo "vous n'etes pas connecté";
        break;
        }
 
    }
}





if (key_exists("connecte",$_SESSION)) {

    session_start();
    $_SESSION['deconnecte'] = true;
 ?>   
 

 <form method="post">
<button type="submit" > Se Deconnecter </button>
</form>

 <?php    
session_destroy(); //destroy the session

}

if (key_exists("deconnecte",$_SESSION)) {
    ?>   
<h1>Page de connexion/déconnexion </h1>

<nav>
<ul><li><a href="index.php">Page d'accueil</a>
            </li>       
            <li><a href="connexion.php"> Page de connexion/déconnexion</a>
            </li>  
            <li><a href=""> Partie admin </a>"
            </li>  
</ul>
</nav>


    <?php
}

?>


<h1>Page de connexion/déconnexion </h1>
<div>
<form method="post">
<label> Login : <input type="text" name="login" /> </label>
<br>
<label> password : <input type="password" name="password" /> </label>
<button type="submit" > Se connecter </button>
</form>

</div>

<nav>
<ul><li><a href="index.php">Page d'accueil</a>
            </li>       
            <li><a href="connexion.php"> Page de connexion/déconnexion</a>
            </li>  
            <li><a href=""> Partie admin </a>"
            </li>  
</ul>
</nav>







