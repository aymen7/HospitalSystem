<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 04/11/2017
 * Time: 21:26
 */

namespace app\table;


use app\models\Patient;

class PatientTable extends Table
{

    /**
     * @param $id int
     * @return Patient
     */
    public function findById($id){
        return $this->db->prepare("SELECT * FROM patient WHERE idPatient = ?", array($id), Patient::class, true);
    }

    /**
     * @return array
     */
    public function getAll(){
        return $this->db->query("SELECT * FROM patient", Patient::class);
    }

    /**
     * @param Patient $patient
     * @return Patient
     */
    public function create(Patient $patient){
        $param = array(
            ':nom' => $patient->getNom(),
            ':prenom' => $patient->getPrenom(),
            ':numTel' => $patient->getNumTel(),
            ':dateDeNaissance' => $patient->getDateDeNaissance(),
            ':nss' => $patient->getNss()
        );
        $req = "INSERT INTO patient VALUES (NULL, :nom, :prenom, :dateDeNaissance, :nss)";
        $this->db->prepare($req, $param);
        $patient->setIdPatient($this->db->lastInsertedId('patient'));
        return $patient;
    }

    /**
     * @param Patient $patient
     */
    public function update(Patient $patient)
    {
        $param = array(
            ':idPatient' => $patient->getIdPatient(),
            ':nom' => $patient->getNom(),
            ':prenom' => $patient->getPrenom(),
            ':numTel' => $patient->getNumTel(),
            ':dateDeNaissance' => $patient->getDateDeNaissance(),
            ':nss' => $patient->getNss()
        );
        $req = "UPDATE patient SET nom = :nom, prenom = :prenom, numTel = :numTel, dateDeNaissance = :dateDeNaissance, nss = :nss 
                WHERE idPatient = :idPatient";

        $this->db->prepare($req, $param);
    }


    public function delete($id){
        $this->db->prepare("DELETE FROM patient WHERE idPatient = ?", array($id));
    }


}