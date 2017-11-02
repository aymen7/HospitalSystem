<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:52
 */

class Secretaire
{
    private $idSecretaire;
    private $nom;
    private $prenom;
    private $numTel;

    /**
     * @return int
     */
    public function getIdSecretaire()
    {
        return $this->idSecretaire;
    }

    /**
     * @param int $idSecretaire
     */
    public function setIdSecretaire($idSecretaire)
    {
        $this->idSecretaire = $idSecretaire;
    }

    /**
     * @return String
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param String $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return String
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param String $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return String
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * @param String $numTel
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;
    }


}