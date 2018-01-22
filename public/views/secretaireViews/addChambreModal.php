<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 19/01/2018
 * Time: 15:07
 */

?>
<!-- Modal Structure -->
<div id="addChambreModal" class="modal modal-fixed-footer">
    <form method="POST" action="?user=secretaire&action=addChambre">
        <div class="modal-content">
            <h4>Ajouter une nouvelle chambre</h4>
            <div class="row">
                <div class="col s6 input-field">
                    <label for="numero">Numéro: </label>
                    <input type="text" id="numero" name="numero">
                </div>
                <div class="col s6 input-field">
                    <label for="nombreLit">Nombre de lits:</label>
                    <input type="number" id="nombreLit" name="nombreLit">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" value="Ajouter">
        </div>
    </form>
</div>