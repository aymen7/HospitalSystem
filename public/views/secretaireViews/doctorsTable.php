<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 04/11/2017
 * Time: 20:10
 */

$start = isset($_GET['start']) ? $_GET['start'] : 0;
$medecins = \app\models\Medecin::getAll(5, $start);
$next = $start + 5;
$previous = ($start > 5) ? $start - 5 : 0;
?>
<div class="col-lg-6 doctors-control" id="table-wrapper">
    <table class="table table-responsive" id="doctors-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>telephone </th>
            <th>spécialité</th>
            <th>Grade</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($medecins as $medecin){
            /**
             * @var $medecin \app\models\Medecin
             */
            echo "<tr>
                <td>{$medecin->getIdUser()}</td>
                <td>{$medecin->getNom()}</td>
                <td>{$medecin->getPrenom()}</td>
                <td>{$medecin->getNumTel()}</td>
                <td>{$medecin->getSpecialite()->getSpecialite()}</td>
                <td>{$medecin->getGrade()->getGrade()}</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <div id="table-controls">
        <div class="control-btn-wrapper">
            <a href="?ajax=doctorsTable&start=<?=$previous?>" class="control-btn btn btn-default chev-btn previousPage"><i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i></a>
        </div>
        <div class="control-btn-wrapper">
            <button class="control-btn btn btn-default plus-btn" ><i class="fa fa-plus fa-2x" aria-hidden="true"></i></button>
        </div>
        <div class="control-btn-wrapper">
            <button class="control-btn btn btn-default pencil-btn" disabled><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></button>
        </div>
        <div class="control-btn-wrapper">
            <button class="control-btn btn btn-default trash-btn" disabled><i class="fa fa-trash fa-2x" aria-hidden="true"></i></button>
        </div>
        <div class="control-btn-wrapper">
            <a href="?ajax=doctorsTable&start=<?=$next?>" class="control-btn btn btn-default chev-btn nextPage"><i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i></a>
        </div>

    </div>
</div>
