<?php

namespace Metier;

class User
{
    private $nom;
    private $prenom;
    private $anneeDeN;
    private $mail;

    public function __construct($nom, $prenom, $anneDeN, $mail)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->anneeDeN = $anneDeN;
        $this->mail = $mail;

    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getMail(){
        return $this->mail;
    }

    public function __toString()
    {
        return $this->nom . ' ' . $this->prenom . ' ' . $this->anneeDeN . ' ' . $this->mail;
    }
}