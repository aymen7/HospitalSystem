<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 02/11/2017
 * Time: 14:58
 */

class MedecinTable extends Table
{
    /**
     * @param $id int
     * @return Medecin
     */
    public function findById($id)
    {
        $medecin = $this->db->prepare("SELECT * FROM user WHERE idUser = ? AND poste = 'M'", array($id), Medecin::class, true);
        return $this->fillObject($medecin);
    }

    /**
     * @param Medecin $medecin
     * @return Medecin
     */
    private function fillObject(Medecin $medecin)
    {
        $specialiteTable = new SpecialiteTable($this->db);
        $medecin->setSpecialite($specialiteTable->findById($medecin->getIdSpecialite()));

        $gradeTable = new GradeTable($this->db);
        $medecin->setGrade($gradeTable->findById($medecin->getIdGrade()));

        return $medecin;
    }

    /**
     * @param $name String
     * @return array|mixed
     */
    public function findByName($name)
    {
        $param = array(
            ':nom' => '%' . $name . '%',
            ':prenom' => '%' . $name . '%'
        );
        $req = "SELECT * FROM user WHERE nom LIKE :nom OR prenom LIKE :prenom AND poste = 'M'";
        $medecins = $this->db->prepare($req, $param, Medecin::class);
        $tab = [];
        foreach ($medecins as $medecin) {
            $tab[] = $this->fillObject($medecin);
        }
        return $tab;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $medecins = $this->db->query("SELECT * FROM user WHERE poste = 'M'", Medecin::class);
        $tab = [];
        foreach ($medecins as $medecin) {
            $tab[] = $this->fillObject($medecin);
        }

        return $tab;
    }

    /**
     * @param Medecin $medecin
     * @return Medecin
     */
    public function create(Medecin $medecin)
    {
        $param = array(
            ':username' => $medecin->getUsername(),
            ':password' => $medecin->getPassword(),
            ':nom' => $medecin->getNom(),
            ':prenom' => $medecin->getPrenom(),
            ':numTel' => $medecin->getNumTel(),
            ':idSpecialite' => $medecin->getSpecialite()->getIdSpecialite(),
            ':idGrade' => $medecin->getGrade()->getIdGrade()
        );

        $req = "INSERT INTO user VALUES (NULL, :username, :password, :nom, :prenom, :numTel, :idSpecialite, :idGrade, 'M')";

        $this->db->prepare($req, $param);
        $medecin->setIdUser($this->db->lastInsertedId("user"));
        return $medecin;
    }

    /**
     * @param Medecin $medecin
     */
    public function update(Medecin $medecin)
    {
        $param = array(
            ':idMedecin' => $medecin->getIdUser(),
            ':username' => $medecin->getUsername(),
            ':password' => $medecin->getPassword(),
            ':nom' => $medecin->getNom(),
            ':prenom' => $medecin->getPrenom(),
            ':numTel' => $medecin->getNumTel(),
            ':idSpecialite' => $medecin->getSpecialite()->getIdSpecialite(),
            ':idGrade' => $medecin->getGrade()->getIdGrade()
        );

        $req = "UPDATE user SET nom = :nom, prenom = :prenom, numTel = :numTel, idSpecialite = :idSpecialite, idGarde = :idGarde
                WHERE idUser = :idMedecin";
        $this->db->prepare($req, $param);
    }

    public function delete($id)
    {
        $this->db->prepare("DELETE FROM user WHERE idUser = ?", array($id));
    }

}