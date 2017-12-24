<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 23/12/2017
 * Time: 20:12
 */
$start = isset($_GET['start']) ? $_GET['start'] : 0;
$infirmiers = \app\models\Infirmier::getAll(5, $start);
$next = $start + 5;
$previous = ($start > 5) ? $start - 5 : 0;
if (!empty($infirmiers)) {
    ?>

    <div class="doctors-control " id="table-wrapper">
        <h2 class="text-center">Infirmier</h2>
        <div class="table-users">
            <div class="row" style="margin-bottom: 7px">
                <div class="col s2 offset-s9">
                    <a class="btn waves-effect modal-trigger" href="#addInfirmierModal">
                        <i class="fa fa-user-plus"></i>
                        Ajouter Infirmier
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col s1">
                    <div class="control-btn-wrapper">
                        <a href="?ajax=doctorsTable&start=<?= $previous ?>"
                           class="control-btn btn btn-default chev-btn previousPage">
                            <i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="col s10">
                    <table class="table table-responsive striped" id="infirmiers-table" cellspacing="0">
                        <thead>
                        <tr class="text-center">
                            <th class="hidden">Id</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Spécialité</th>
                            <th>Grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($infirmiers as $infirmier) {
                            /**
                             * @var $infirmier \app\models\Infirmier
                             */
                            echo "<tr>
                <td class='hidden'>{$infirmier->getIdUser()}</td>
                <td>{$infirmier->getNom()}</td>
                <td>{$infirmier->getPrenom()}</td>
                <td>{$infirmier->getNumTel()}</td>
                <td>{$infirmier->getSpecialite()->getSpecialite()}</td>
                <td>{$infirmier->getGrade()->getGrade()}</td>
                </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col s1">
                    <div class="control-btn-wrapper">
                        <a href="?ajax=doctorsTable&start=<?= $next ?>"
                           class="control-btn btn btn-default chev-btn nextPage">
                            <i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'addInfirmierModal.php' ?>
    </div>
    <!-- create javascript 2 variables content all specialites and grades in json format to add it in tabledit in profile.js-->
    <script type="text/javascript">
        var specialites, grades;
        specialites = '<?php echo \app\models\Specialite::getAllinJson(\app\models\Specialite::INFIRMIER) ?>';
        grades = '<?php echo \app\models\Grade::getAllinJson(\app\models\Grade::INFIRMIER) ?>';
    </script>

    <?php
} else {
    header('HTTP/1.1 500 Internal Server Booboo');
    die(500);
}