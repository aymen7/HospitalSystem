<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 02/11/2017
 * Time: 16:10
 */
namespace app\table;
use app\models\Grade;
class GradeTable extends Table
{
    /**
     * @param $id int
     * @return Grade
     */
    public function findById($id){
        return $this->db->prepare("SELECT * FROM grade WHERE idGrade = ?", array($id), Grade::class, true);
    }

    /**
     * @return array
     */
    public function getAll(){
        return $this->db->query("SELECT * FROM grade", Grade::class);
    }


    /**
     * @param Grade $grade
     * @return Grade
     */
    public function create(Grade $grade) {
        $param = array(
            ':grade' => $grade->getGrade(),
            ':type' => $grade->getType()
        );
        $this->db->prepare("INSERT INTO grade (grade, type) VALUES (:grade, :type)", $param);
        $grade->setIdGrade($this->db->lastInsertedId("grade"));
        return $grade;
    }

    /**
     * @param $id int
     */
    public function delete($id) {
        $this->db->prepare("DELETE FROM grade WHERE id = ?", array($id));
    }
}