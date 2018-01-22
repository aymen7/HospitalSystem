<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 08/12/2017
 * Time: 23:29
 */
?>
<!-- Modal Structure -->
<div id="addDoctorModal" class="modal modal-fixed-footer">
    <form method="POST" action="?user=medecin">
        <input type="hidden" name="action" value="edit">
        <div class="modal-content">
            <h4>Ajouter un nouveau médecin</h4>
            <div class="row">
                <div class="col s6 input-field">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="col s6 input-field">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
            </div>
            <div class="row">
                <div class="col s6 input-field">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="col s6 input-field">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="row">
                <div class="col s6 input-field">
                    <label for="numTel">Numéro de téléphone</label>
                    <input type="text" class="form-control" id="numTel" name="numTel" required>
                </div>
            </div>
            <div class="row">
                <div class="col s6 input-field">
                    <select class="form-control" id="grade" name="grade" required>
                        <option disabled selected>Grade</option>
                        <?php
                        foreach (\app\models\Grade::getAll(\app\models\Grade::MEDECIN) as $grade) {
                            /**
                             * @var $grade \app\models\Grade
                             */
                            echo "<option value='{$grade->getIdGrade()}'>{$grade->getGrade()}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col s6 input-field">
                    <select class="form-control" id="specialite" name="specialite" required>
                        <option disabled selected>Spécialité</option>
                        <?php
                        foreach (\app\models\Specialite::getAll(\app\models\Specialite::MEDECIN) as $specialite) {
                            /**
                             * @var $specialite \app\models\Specialite
                             */
                            echo "<option value='{$specialite->getIdSpecialite()}'>{$specialite->getSpecialite()}</option>";
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
