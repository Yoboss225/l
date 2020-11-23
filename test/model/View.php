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
        $this->content = '';
        $this->title = '';
        $this->menu = [];
        $this->ajax = null;
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

        
        if(key_exists(CompteValidate::NOM,$_POST) and key_exists(CompteValidate::PASSWORD,$_POST) ) {
   

            foreach ($compteData as $cpt) {
                if ($cpt[CompteValidate::NOM]===$_POST[CompteValidate::NOM] && password_verify($_POST[CompteValidate::PASSWORD],$cpt[CompteValidate::PASSWORD]) ) {
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

    }
    public function render()
    {
       

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
                <label for="<?= CompteValidate::NOM ?>">NOM
                    <input type="text" name="<?= CompteValidate::NOM ?>" id="<?= CompteValidate::NOM ?>" value="<?= CompteValidate::NOM; ?>" autofocus minlength="<?= CompteValidate::MIN_LENGTH ?>" maxlength="<?= CompteValidate::MAX_LENGTH?>">
                    <span class="error"><?= CompteValidate::NOM ?></span>
                    <span id="exist"></span>
                </label>

                <label for="<?= CompteValidate::PASSWORD ?>">Mot de passe
                    <input type="password" name="<?= CompteValidate::PASSWORD ?>" minlength="<?= CompteValidate::MIN_LENGTH ?>" maxlength="<?= CompteValidate::MAX_LENGTH?>"
                           id="<?= CompteValidate::PASSWORD ?>"
                           value="dd">
                   
                </label>

                <label for="<?= CompteValidate::EMAIL ?>">Email
                    <input type="mail" name="<?= CompteValidate::EMAIL ?>" minlength="<?= CompteValidate::MIN_LENGTH ?>" maxlength="<?= CompteValidate::MAX_LENGTH?>"
                           id="<?= CompteValidate::EMAIL ?>"
                           value="dd">
                   
                </label>

                <label for="<?= CompteValidate::NOM_ENTREP ?>">Nom Entreprise
                    <input type="text" name="<?= CompteValidate::NOM_ENTREP ?>" minlength="<?= CompteValidate::MIN_LENGTH ?>" maxlength="<?= CompteValidate::MAX_LENGTH?>"
                           id="<?= CompteValidate::NOM_ENTREP ?>"
                           value="dd">
                   
                </label>

                <label for="<?= CompteValidate::NUMERO_TEL ?>">Numero Telephone
                    <input type="text" name="<?= CompteValidate::NUMERO_TEL ?>" minlength="<?= CompteValidate::MIN_LENGTH ?>" maxlength="<?= CompteValidate::MAX_LENGTH?>"
                           id="<?= CompteValidate::NUMERO_TEL ?>"
                           value="dd">
                   
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

   
}
?>