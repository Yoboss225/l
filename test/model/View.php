<?php


include "CompteValidate.php";
//include "compteData.php";
/**
 * Class View
 * Gestion de l'affichage en fonction de l'état du modèle à partir d'un template de base
 * @package App\src\view
 */
class View
{
    /**
     * Référence au routeur pour récupération des urls dynamiquement, la vue
     * ignore la mode de fonctionnement des urls.
     * @var Router Référence au routeur
     */
    protected $routeur;
    protected $title;
    protected $content;
    protected $menu;
    protected $feedback;
    protected $ajax;

    public function __construct(Routeur $r )
    {
        $this->routeur = $r;
     
    }

    /************************
     *  Méthodes de rendu   *
     ************************/

    /**
     * Effectue le rendu de la page web à partir du template de base base.php.
     * Les propriétés de la classe correspondent à des parties du templates.
     */

    public function connexion(){
        $compteData = array(
            array(
                'login' => 'test1',
                'password' => '$2y$10$q5N2BxChLZrR7FUkfqvZjOwjZIy9DQu4FdT19gw6aBLk0TmbbsQsO',
                
                
            ),
            array(
                'test2' => 'test2',
                'password' => '$2y$10$BDsnHlehtLSY.Huphis2cObAbg8bRodnBX76SSeta9mMz9yFgj9Q6',
                
                
            ),
            array(
                'test3' => 'test3',
                'password' => '$2y$10$UXSUZLmLcydHdy.rwXIwr.GQvLFleb26M/tS/fYNZll7Pm42xNeeG',
            
            ),
            
        );
        $data = array();
        $vl = new CompteValidate($data);
        
        if(key_exists("login",$_POST) and key_exists("password",$_POST) ) {
   

            foreach ($compteData as $cpt) {
                if ($cpt["login"]===$_POST["login"] && password_verify($_POST["password"],$cpt["password"]) ) {
                    $_SESSION['test_Epitech']=true;
                    echo "connexion reussie";
                    echo "<br>";
                break;
                }
                else{
                    echo $vl->isValidName($_POST["login"]);
                    echo"<br>";
                    echo $vl->isValidPsw($_POST["password"]);
                    echo"<br>";
                    echo "vous n'etes pas connecté";
                break;
                }
         
            }
        }


    }

    public function deconnexion(){

        if (key_exists("test_Epitech",$_SESSION)) {
           
            ?>
                    <h3>CARTE DE VISITE</h3>

                    <p>Votre nom est : <?php echo $_POST["login"] ;?>  </p>
                    <p>Votre Nom d'entreprise est : <?php echo $_POST["entreprise"] ; ?>  </p>
                    <p>Votre Numero est : <?php echo $_POST["numero"] ; ?>  </p>
                    <p>Votre Email est : <?php echo $_POST["email"] ;?>  </p>

                    <?php

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
      
        
        <nav>
        <p> VOUS N'ETES PLUS CONNECTÉ </p>
        </nav>
        
        
            <?php
           
        }

    }
    
    public function formul(){
        ?>
        <div class="single-wrap">
            <div class="single-title">
                <div class="single-title-item">
                    <h1>"TITRE"</h1>
                </div>
            </div>
            <div class="single-content">
                <div class="single-box">
                    <form method="post">
                        <label >NOM
                            <input type="text" name="login" >
                            <span id="exist"></span>
                        </label>
        
                        <label >PASSWORD
                            <input type="password" name="password" >
                            <span id="exist"></span>
                        </label>    
                           
                        </label>
        
                        <label >Email
                            <input type="mail" name="email" minlength="<?= CompteValidate::MIN_LENGTH ?>" maxlength="<?= CompteValidate::MAX_LENGTH?>"
                                   id="email"
                                   value="email@email.com">
                           
                        </label>
        
                        <label >Nom Entreprise
                            <input type="text" name="entreprise" minlength="<?= CompteValidate::MIN_LENGTH ?>" maxlength="<?= CompteValidate::MAX_LENGTH?>"
                                   id="entreprise"
                                   value="entreprise">
                           
                        </label>
        
                        <label >Numero Telephone
                            <input type="text" name="numero" minlength="<?= CompteValidate::MIN_LENGTH ?>" maxlength="<?= CompteValidate::MAX_LENGTH?>"
                                   id="numero"
                                   value="0628419948">
                           
                        </label>
        
                        <div class="actions">
                            <button type="submit">"VALIDER"</button>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
              <?php 
              


        
    }
    public function render()
    {
       $this->formul();
       

       if (key_exists("deconnexion",$_SESSION)) {

        ?> 
        <h1>VOUS ETES DECONNECTE</h1>
        <?php
    }


       
      
     
    }

   
}
?>
