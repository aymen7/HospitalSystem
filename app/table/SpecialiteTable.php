<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 02/11/2017
 * Time: 15:58
 */
namespace app\table;
use app\models\Specialite;
class SpecialiteTable extends Table
{
    /**
     * @param $id int
     * @return Specialite
     */
    public function findById($id){
        return $this->db->prepare("SELECT * FROM specialite WHERE idSpecialite = ?", array($id), Specialite::class, true);
    }

    /**
     * @return array
     */
    public function getAll(){
        return $this->db->query("SELECT * FROM specialite", Specialite::class);
    }

    /**
     * @param Specialite $specialite
     * @return Specialite
     */
    public function create(Specialite $specialite){
        $param = array(
            ':specialite' => $specialite->getSpecialite(),
            ':type' => $specialite->getType()
        );

        $this->db->prepare("INSERT INTO specialite (specialite, type) VALUES (:specialite, :type)", $param);
        $specialite->setIdSpecialite($this->db->lastInsertedId("specialite"));
        return $specialite;
    }

    /**
     * @param $id int
     */
    public function delete($id){
        $this->db->prepare("DELETE FROM specialite WHERE idSpecialite = ?", array($id));
    }
}