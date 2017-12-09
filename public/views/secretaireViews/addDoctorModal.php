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
    <form>
        <div class="modal-content">
            <h4>Ajouter un nouveau medecin</h4>
            <div class="row">
                <div class="col s10 input-field">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
            </div>
            <div class="row">
            <div class="col s10 input-field">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            </div>
            <div class="row">
            <div class="col s10 input-field">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            </div>
            <div class="row">
            <div class="col s10 input-field">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            </div>
            <div class="row">
            <div class="col s10 input-field">
                <label for="numTel">Numéro de téléphone</label>
                <input type="text" class="form-control" id="numTel" name="numTel">
            </div>
            </div>
            <div class="row">
            <div class="col s10 input-field">
                <label for="grade">Grade</label>
                <select class="form-control" id="grade" name="grade">
                    <option disabled selected>Grade</option>
                    <?php
                    foreach (\app\models\Grade::getAll() as $grade) {
                        /**
                         * @var $grade \app\models\Grade
                         */
                        echo "<option value='{$grade->getIdGrade()}'>{$grade->getGrade()}</option>";
                    }
                    ?>
                </select>
            </div>
            </div>
            <div class="row">
            <div class="col s10 input-field">
                <label for="specialite">Spécialité</label>
                <select class="form-control" id="specialite" name="specialite">
                    <option disabled selected>Spécialité</option>
                    <?php
                    foreach (\app\models\Specialite::getAll() as $specialite) {
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
            <button class="modal-action modal-close waves-effect waves-red btn-flat">Annuler</button>
            <input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" value="Ajouter">
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        $('select').material_select();
    })
</script>
