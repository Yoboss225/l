<?php
include "View.php";

class Routeur
{
  
    public function run()
    {
        
        $view = new View($this);
        // Rendu de la vue générée
        $view->render();
    }

    
}
?>