<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 03/11/2017
 * Time: 17:45
 */

namespace app\table;

use app\models\Secretaire;

class SecretaireTable extends Table
{

    /**
     * @param $id int
     * @return Secretaire
     */
    public function findById($id)
    {
        $secretaire = $this->db->prepare("SELECT * FROM user WHERE idUser = ? AND poste = 'S'", array($id),
            Secretaire::class, true);
        return $secretaire;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $secretaires = $this->db->query("SELECT * FROM user WHERE poste = 'S'");
        return $secretaires;
    }

    /**
     * @param Secretaire $secretaire
     * @return Secretaire
     */
    public function create(Secretaire $secretaire)
    {
        $param = array(
            ':username' => $secretaire->getUsername(),
            ':password' => $secretaire->getPassword(),
            ':nom' => $secretaire->getNom(),
            ':prenom' => $secretaire->getPrenom(),
            ':numTel' => $secretaire->getNumTel()
        );

        $req = "INSERT INTO user VALUES (null, :username, :password, :nom, :prenom, :numTel, NULL, NULL, 'S')";

        $this->db->prepare($req, $param);
        $secretaire->setIdUser($this->db->lastInsertedId('user'));
        return $secretaire;
    }

    /**
     * @param Secretaire $secretaire
     */
    public function update(Secretaire $secretaire)
    {
        $param = array(
            ':idUser' => $secretaire->getIdUser(),
            ':username' => $secretaire->getUsername(),
            ':password' => $secretaire->getPassword(),
            ':nom' => $secretaire->getNom(),
            ':prenom' => $secretaire->getPrenom(),
            ':numTel' => $secretaire->getNumTel()
        );

        $req = "UPDATE user SET username = :username, password = :password, nom = :nom, prenom = :prenom, numTel = :numTel
                WHERE idUser = :idUser";
        $this->db->prepare($req, $param);
    }

    /**
     * @param $id int
     */
    public function delete($id)
    {
        $this->db->prepare("DELETE FROM user WHERE idUser = ?", array($id));
    }
}