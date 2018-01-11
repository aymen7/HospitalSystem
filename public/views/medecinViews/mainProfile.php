<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 04/01/2018
 * Time: 20:57
 */

$medecin = unserialize($_SESSION['user']);
/**
 * @var $medecin \app\models\Medecin
 */

?>
<div class="medecinMain">
    <div class="row">
        <div class="col s6">
            <div class="mesConsultations z-depth-2 row">
                <h3>Mes consultations</h3>
                <div class="row head">
                    <div class="col s6">Date</div>
                    <div class="col s6">Patient</div>
                </div>
                <?php
                foreach ($medecin->lastConsultations(5) as $consultation){
                    /**
                     * @var $consultation \app\models\Consultation
                     */
                    echo "<div class='row ligne'>";
                    echo "<a href='?page=detailsConsultation&id={$consultation->getIdconsultation()}'>";
                    echo "<div class='col s6'>{$consultation->getDate()->format("d/m/Y")}</div> ";
                    echo "<div class='col s6'>{$consultation->getPatient()}</div> ";
                    echo "</a>";
                    echo "</div>";
                }
                ?>
                <div class="col s5 offset-s7">
                    <a class="btn waves-effect waves-light" href="?page=mesConsultation">Afficher tout</a>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="mesPatients z-depth-2 row">

                <h3>Mes patients</h3>
                <div class="row head">
                    <div class="col s6"></div>
                    <div class="col s6">Patient</div>
                </div>
                <?php
                foreach ($medecin->mesPatients(5) as $patient){
                    /**
                     * @var $patient \app\models\Patient
                     */
                    echo "<div class='row ligne'>";
                    echo "<a href='?page=detailsPatient&id={$patient->getIdpatient()}'>";
                    echo "<div class='col s6'></div> ";
                    echo "<div class='col s6'>{$patient}</div> ";
                    echo "</a>";
                    echo "</div>";
                }
                ?>
                <div class="col s5 offset-s7">
                    <a class="btn waves-effect waves-light" href="?page=mesPatients">Afficher tout</a>
                </div>
            </div>
        </div>
        <div class="col s3 offset-s9">
            <a class="btn waves-effect waves-light" href="?page=consultation">Nouvelle consultation</a>
        </div>
    </div>
</div>

