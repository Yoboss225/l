<?php

/**

 * Représente un compte utilisateur
 */


class Compte
{
  
    const USER  = 'user';
    private $nom;
    private $nomEntrep;
    private $email;
    private $numeroTel;
    private $password;

    public function __construct($nom,  $email, $nomEntrep, $numeroTel,$password)
    {
        $this->nom = $nom;
        $this->nomEntrep = $nomEntrep;
        $this->email = $email;
        $this->numeroTel = $numeroTel; 
        $this->password = $password;  
    }

    public function getNom()
    {
        return $this->nom;
    }


    public function getnomEntrep(){
        return $this->nomEntrep;
    }

    public function getemail(){
        return $this->email;
    }

    public function getnumeroTel(){
        return $this->numeroTel;
    }

    public function getpassword(){
        return $this->password;
    }
}