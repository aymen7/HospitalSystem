<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 02/11/2017
 * Time: 14:58
 */

class InfirmierTable extends Table
{
    /**
     * @param Infirmier $infirmier
     * @return Infirmier
     */
    private function fillObject(Infirmier $infirmier) {
        $specialiteTable = new SpecialiteTable($this->db);
        $infirmier->setSpecialite($specialiteTable->findById($infirmier->getIdSpecialite()));

        $gradeTable = new GradeTable($this->db);
        $infirmier->setGrade($gradeTable->findById($infirmier->getIdGrade()));

        return $infirmier;
    }

    /**
     * @param $id int
     * @return Infirmier
     */
    public function findById($id){
        $infirmier = $this->db->prepare("SELECT * FROM user WHERE idUser = ? AND poste = 'I'", array($id), Infirmier::class, true);
        return $this->fillObject($infirmier);
    }

    /**
     * @param $name String
     * @return array|mixed
     */
    public function findByName($name) {
        $param = array(
            ':nom' => '%' . $name . '%',
            ':prenom' => '%' . $name . '%'
        );
        $req = "SELECT * FROM user WHERE nom LIKE :nom OR prenom LIKE :prenom AND poste = 'I'";
        $infirmiers = $this->db->prepare($req, $param, Infirmier::class);
        $tab = [];
        foreach ($infirmiers as $infirmier){
            $tab[] = $this->fillObject($infirmier);
        }
        return $tab;
    }

    /**
     * @return array
     */
    public function getAll() {
        $infirmiers = $this->db->query("SELECT * FROM user WHERE poste = 'I'", Infirmier::class);
        $tab = [];
        foreach ($infirmiers as $infirmier) {
            $tab[] = $this->fillObject($infirmier);
        }

        return $tab;
    }

    /**
     * @param Infirmier $infirmier
     * @return Infirmier
     */
    public function create(Infirmier $infirmier) {
        $param = array(
            ':username' => $infirmier->getUsername(),
            ':password' => $infirmier->getPassword(),
            ':nom' => $infirmier->getNom(),
            ':prenom' => $infirmier->getPrenom(),
            ':numTel' => $infirmier->getNumTel(),
            ':idSpecialite' => $infirmier->getSpecialite()->getIdSpecialite(),
            ':idGrade' => $infirmier->getGrade()->getIdGrade()
        );

        $req = "INSERT INTO user VALUES (NULL, :username, :password, :nom, :prenom, :numTel, :idSpecialite, :idGrade, 'I')";

        $this->db->prepare($req, $param);
        $infirmier->setIdInfermier($this->db->lastInsertedId("user"));
        return $infirmier;
    }

    /**
     * @param Infirmier $infirmier
     */
    public function update(Infirmier $infirmier) {
        $param = array(
            ':idInfirmier' => $infirmier->getIdInfermier(),
            ':username' => $infirmier->getUsername(),
            ':password' => $infirmier->getPassword(),
            ':nom' => $infirmier->getNom(),
            ':prenom' => $infirmier->getPrenom(),
            ':numTel' => $infirmier->getNumTel(),
            ':idSpecialite' => $infirmier->getSpecialite()->getIdSpecialite(),
            ':idGrade' => $infirmier->getGrade()->getIdGrade()
        );

        $req = "UPDATE user SET nom = :nom, prenom = :prenom, numTel = :numTel, idSpecialite = :idSpecialite, idGarde = :idGarde
                WHERE idUser = :idInfirmier";
        $this->db->prepare($req, $param);
    }

    public function delete($id){
        $this->db->prepare("DELETE FROM user WHERE idUser = ?", array($id));
    }

}