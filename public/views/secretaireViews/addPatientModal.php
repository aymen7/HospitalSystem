<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 23/12/2017
 * Time: 21:47
 */
?>

<!-- Modal Structure -->
<div id="addPatientModal" class="modal modal-fixed-footer">
    <form method="POST" action="?user=patient">
        <input type="hidden" name="action" value="edit">
        <div class="modal-content">
            <h4>Ajouter un nouveau patient</h4>
            <div class="row">
                <div class="col s6 input-field">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom">
                </div>
                <div class="col s6 input-field">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom">
                </div>
            </div>
            <div class="row">
                <div class="col s6 input-field">
                    <label for="nss">N° de sécurité sociale</label>
                    <input type="text" id="nss" name="nss" >
                </div>
                <div class="col s6 input-field">
                    <!--<label for="dateDeNaissance">Date de naissance</label>-->
                    <input type="date" id="dateDeNaissance" name="dateDeNaissance" placeholder="date">
                </div>
                <div class="col s6 input-field">
                    <label for="numTel">Numéro de téléphone</label>
                    <input type="text"  id="numTel" name="numTel">
                </div>
            </div>
            <div class="row">
                <div class="col s6 input-field">
                    <select id="grade" name="medecin">
                        <option disabled selected>Médecin</option>
                        <?php
                        foreach (\app\models\Medecin::getAll() as $medecin) {
                            /**
                             * @var $medecin \app\models\Medecin
                             */
                            echo "<option value='{$medecin->getIduser()}'>{$medecin->getNom()} 
                            {$medecin->getPrenom()}</option>";
                        }
                        ?>
                    </select>
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
    })
</script>

