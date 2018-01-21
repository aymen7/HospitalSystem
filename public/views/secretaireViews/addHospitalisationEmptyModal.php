<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 18/01/2018
 * Time: 22:05
 */

?>
<!-- Modal Structure -->
<div id="updateHospitalisationModal" class="modal modal-fixed-footer">
    <form method="POST" action="?user=patient&action=modifierHospitalisation">
        <input type="hidden" id="idLit" name="idLit" value="">
        <div class="modal-content">
            <h4>Ajouter hospitalisation</h4>
            <input type="hidden" name="idPatient" value="">
            <div class="row">
                <div class="col s6 input-field">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" disabled value="">
                </div>
                <div class="col s6 input-field">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" disabled value="">
                </div>
            </div>
            <div class="row">
                <div class="col s6 input-field">
                    <select type="text" id="chambre" name="chambre" required disabled>

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
            <button class="modal-close waves-effect waves-red btn-flat">Annuler</button>
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

