<?php
include 'Compte.php';
class CompteValidate
{
    const NOM = 'pseudo';
    const NOM_ENTREP = "entreprise";
    const EMAIL = "email";
    const NUMERO_TEL ="0628419948";
    const PASSWORD = "pswd";
    const MIN_LENGTH = 4;
    const MAX_LENGTH = 20;


    

    private $error;
    private $data;

    public function __construct($data = [])
    {
        $this->data = $data;
        $this->error = [];
    }

    public function createAccount()
    { 
        return new Compte($this->data[self::NOM], $this->data[self::EMAIL],$this->data[self::NOM_ENTREP],$this->data[self::NUMERO_TEL], 'user', $this->data[self::PASSWORD]);
    }


    public function isValid()
    {
        if (key_exists(self::NOM, $this->data)) {
            $this->data[self::NOM] = trim($this->data[self::NOM]);
        }
        //Validation du nom
        if (!key_exists(self::NOM, $this->data) || $this->data[self::NOM] === '') {
            $this->error[self::NOM] = 'Champ vide';
        } elseif (mb_strlen($this->data[self::NOM], 'UTF8') > self::MAX_LENGTH) {
            $this->error[self::NOM] = 'Taille du champ limitée à ' . self::MAX_LENGTH .' caractères';
        } elseif (mb_strlen($this->data[self::NOM], 'UTF8') < self::MIN_LENGTH) {
            $this->error[self::NOM] = 'Taille du champ minimum '. self::MIN_LENGTH .' caractères';
        }

         //Validation du nom entreprise
         if (!key_exists(self::NOM_ENTREP, $this->data) || $this->data[self::NOM_ENTREP] === '') {
            $this->error[self::NOM_ENTREP] = 'Champ vide';
        } elseif (mb_strlen($this->data[self::NOM_ENTREP], 'UTF8') > self::MAX_LENGTH) {
            $this->error[self::NOM_ENTREP] = 'Taille du champ limitée à ' . self::MAX_LENGTH .' caractères';
        } elseif (mb_strlen($this->data[self::NOM_ENTREP], 'UTF8') < self::MIN_LENGTH) {
            $this->error[self::NOM_ENTREP] = 'Taille du champ minimum '. self::MIN_LENGTH .' caractères';
        }

        //Validation du numero telephone
        if (!key_exists(self::NUMERO_TEL, $this->data) || $this->data[self::NUMERO_TEL] === '') {
            $this->error[self::NUMERO_TEL] = 'Champ vide';
        } elseif (mb_strlen($this->data[self::NUMERO_TEL], 'UTF8') != 10) {
            $this->error[self::NUMERO_TEL] = 'Taille du champ doit etre à ' . 10 .' caractères';
        }

        //Validation du mot de passe
        if (!key_exists(self::PASSWORD, $this->data) || $this->data[self::PASSWORD] === '') {
            $this->error[self::PASSWORD] = 'Champ vide';
        } elseif (mb_strlen($this->data[self::PASSWORD], 'UTF8') > self::MAX_LENGTH) {
            $this->error[self::PASSWORD] = 'Taille du champ limitée à ' . self::MAX_LENGTH .' caractères';
        } elseif (mb_strlen($this->data[self::PASSWORD], 'UTF8') < self::MIN_LENGTH) {
            $this->error[self::PASSWORD] = 'Taille du champ minimum '. self::MIN_LENGTH .' caractères';
        }

        if (!empty($this->error)) {
            return false;
        }
        return true;
    
    }

   /* public function hasPseudoAndPassword()
    {
        //Validation du pseudo
        if (!key_exists(self::PSEUDO_REF, $this->data) || $this->data[self::PSEUDO_REF] === '') {
            $this->error[self::PSEUDO_REF] = 'Champ vide';
        }
        //Validation du mot de passe
        if (!key_exists(self::PASSWORD_REF, $this->data) || $this->data[self::PASSWORD_REF] === '') {
            $this->error[self::PASSWORD_REF] = 'Champ vide';
        }
        if (key_exists(self::PSEUDO_REF, $this->error) || key_exists(self::PASSWORD_REF, $this->error)) {
            return false;
        }
        return true;
    }*/

    public function getErrorId($name)
    {
        if (key_exists($name, $this->error)) {
            return $this->error[$name];
        }
        return null;
    }

    public function getDataId($name)
    {
        if (key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }
}