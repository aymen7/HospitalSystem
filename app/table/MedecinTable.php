<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 02/11/2017
 * Time: 14:58
 */
namespace app\table;
use app\models\Medecin;
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
        if (!is_null($medecin->getIdSpecialite())) {
            $specialiteTable = new SpecialiteTable($this->db);
            $medecin->setSpecialite($specialiteTable->findById($medecin->getIdSpecialite()));
        }

        if (!is_null($medecin->getIdGrade())) {
            $gradeTable = new GradeTable($this->db);
            $medecin->setGrade($gradeTable->findById($medecin->getIdGrade()));
        }

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

    public function getAll($size = null, $offset = null)
    {
        $req = "SELECT * FROM user WHERE poste = 'M' ORDER BY idUser";
        if (!is_null($size) && is_null($offset))
            $req .= " LIMIT " . $size;
        else if (!is_null($offset) && !is_null($size))
            $req .= " LIMIT " . $offset . ", " . $size;
        $medecins = $this->db->query($req, Medecin::class);
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

        $req = "UPDATE user SET username = :username, password = :password, nom = :nom, prenom = :prenom, 
                numTel = :numTel, idSpecialite = :idSpecialite, idGrade = :idGrade
                WHERE idUser = :idMedecin";
        $this->db->prepare($req, $param);
    }

    /**
     * @param $id int
     */
    public function delete($id)
    {
        $this->db->prepare("DELETE FROM user WHERE idUser = ?", array($id));
    }

    /**
     * @param $username String
     * @return Medecin|false
     */
    public function connect($username) {
        $medecin = $this->db->prepare("SELECT * FROM user WHERE username = ? AND poste = 'M'", array($username), Medecin::class);
        if ($medecin instanceof Medecin)
            $medecin = $this->fillObject($medecin);
        return $medecin;
    }

}