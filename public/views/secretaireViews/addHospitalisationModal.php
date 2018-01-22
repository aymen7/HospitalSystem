<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 11/01/2018
 * Time: 12:41
 */

$chambres = \app\Config::getInstance()->getEntityManager()->getRepository(\app\R::CHAMBRE)->findAll();

$patient = \app\Config::getInstance()->getEntityManager()->find(\app\R::PATIENT, $_GET['id']);
/**
 * @var $patient \app\models\Patient
 */
?>
<!-- Modal Structure -->
<div id="addHospitalisationModal" class="modal modal-fixed-footer">
    <form method="POST" action="?user=patient&action=ajouterHospitalisation">
        <input type="hidden" name="action" value="edit">
        <div class="modal-content">
            <h4>Ajouter hospitalisation</h4>
            <input type="hidden" name="idPatient" value="<?= $patient->getIdpatient() ?>">
            <div class="row">
                <div class="col s6 input-field">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" disabled value="<?= $patient->getNom() ?>">
                </div>
                <div class="col s6 input-field">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" disabled value="<?= $patient->getPrenom() ?>">
                </div>
            </div>

            <div class="row">
                <div class="col s6 input-field">
                    <select type="text" id="chambre" name="chambre" required>
                        <option disabled selected>Chambre</option>
                        <?php
                        foreach ($chambres as $chambre) {
                            /**
                             * @var $chambre \app\models\Chambre
                             */
                            $nombreChambresRestant = ($chambre->getNombrelits() - $chambre->getLitsOccupes()->count());
                            $stat = '';
                            if ($nombreChambresRestant == 0)
                                $stat = 'disabled';
                            echo "<option value='{$chambre->getIdchambre()}' {$stat}>" .
                                "Chambre N°{$chambre->getNumero()} ({$nombreChambresRestant} / {$chambre->getNombrelits()})</option>";
                        }
                        ?>
                    </select>
                    <label>Chambre</label>
                </div>

                <div class="col s6 input-field">
                    <label for="dureeHospitalisation">Durée hospitalisation</label>
                    <input type="text" id="dureeHospitalisation" name="dureeHospitalisation" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" value="Ajouter">
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('.modal select').material_select();
        param = {
            separator: ' à ',
            format: 'DD/MM/YYYY'
        };
        $('#dureeHospitalisation').dateRangePicker(param).bind('datepicker-change',function()
        {
            Materialize.updateTextFields();
        });

        Materialize.updateTextFields();
    })
</script>
