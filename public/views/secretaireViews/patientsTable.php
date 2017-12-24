<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 23/12/2017
 * Time: 16:50
 */

$start = isset($_GET['start']) ? $_GET['start'] : 0;

$patients = \app\models\Patient::getAll(5, $start);
$next = $start + 5;
$previous = ($start > 5) ? $start - 5 : 0;
if (!empty($patients)) {
    ?>
    <div class="doctors-control " id="table-wrapper">
        <h2 class="text-center">Patients</h2>
        <div class="table-users">
            <div class="row" style="margin-bottom: 7px">
                <div class="col s2 offset-s9">
                    <a class="btn waves-effect modal-trigger" href="#addPatientModal">
                        <i class="fa fa-user-plus"></i>
                        Ajouter Patient
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col s1">
                    <div class="control-btn-wrapper">
                        <a href="?ajax=patientsTable&start=<?= $previous ?>"
                           class="control-btn btn btn-default chev-btn previousPage">
                            <i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="col s10">
                    <table class="table table-responsive striped" id="patients-table" cellspacing="0">
                        <thead>
                        <tr class="text-center">
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de naissance</th>
                            <th>Téléphone</th>
                            <th>N° SS</th>
                            <th>Médecin</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($patients as $patient) {
                            /**
                             * @var $patient \app\models\Patient
                             */
                            echo "<tr>
                <td>{$patient->getIdpatient()}</td>
                <td>{$patient->getNom()}</td>
                <td>{$patient->getPrenom()}</td>
                <td>{$patient->getDatedenaissance()->format('d/m/Y')}</td>
                <td>{$patient->getNumTel()}</td>
                <td>{$patient->getNss()}</td>
                <td>{$patient->getUser()}</td>
                </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col s1">
                    <div class="control-btn-wrapper">
                        <a href="?ajax=patientsTable&start=<?= $next ?>"
                           class="control-btn btn btn-default chev-btn nextPage"><i class="fa fa-chevron-right fa-2x"
                                                                                    aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'addPatientModal.php'; ?>
    </div>
    <script>
        var medecins = '<?php echo \app\models\Medecin::getAllInJson()?>';
    </script>
    <?php
} else {
    header('HTTP/1.1 500 Internal Server Booboo');
    die(500);
}