<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 29/12/2017
 * Time: 19:46
 */

$medecin = unserialize($_SESSION['user']);
/**
 * @var $medecin \app\models\Medecin
 */
?>
<div class="ordonnance">
    <h2>Consultation</h2>
    <div class="row">
        <form id="ordonnanceForm" method="GET">
            <input type="hidden" name="action" value="consultation">
            <div class="row">
                <div class="col s12">
                    <input type="hidden" id="idMedecin" name="idMedecin" value="<?= $medecin->getIduser() ?>">
                    <div class="input-field col s6">
                        <input disabled type="text" id="nomMedecin" name="nomMedecin" value="<?= $medecin->getNom() ?>">
                        <label for="nomMedecin">Nom médecin</label>
                    </div>
                    <div class="input-field col s6">
                        <input disabled type="text" id="prenomMedecin" name="prenomMedecin"
                               value="<?= $medecin->getPrenom() ?>">
                        <label for="prenomMedecin">Prénom médecin</label>
                    </div>
                </div>
                <div class="col s6">
                    <input type="hidden" id="idPatient" name="idPatient">
                    <div class="input-field col s12">
                        <input required disabled type="text" id="nomPatient" name="nomPatient">
                        <label for="nomPatient">Nom patient</label>
                    </div>
                    <div class="input-field col s12">
                        <input required disabled type="text" id="prenomPatient" name="prenomPatient">
                        <label for="prenomPatient">Prénom patient</label>
                    </div>
                    <div class="input-field col s12">
                        <input required disabled type="text" id="dateNaissancePatient" name="dateDeNaissancePatient">
                        <label for="dateNaissancePatient">Date de naissance patient</label>
                    </div>
                    <div class="input-field col s12">
                        <input required disabled type="text" id="nss" name="nss">
                        <label for="nss">N° de sécurité sociale</label>
                    </div>
                </div>
                <div class="col s12 lignesOrdonnance">

                </div>
                <div class="col s3 offset-s8 buttons">
                    <button class="btn waves-effect waves-light" id="ajouterLigneOrdonnance">
                        <i class="fa fa-plus"></i> Médicament
                    </button>
                </div>
                <div class="col s11">
                    <div class="input-field col s12">
                        <textarea required id="rapportConsultation" class="materialize-textarea" name="rapportConsultation"
                                  maxlength="1000"></textarea>
                        <label for="rapportConsultation">Rapport consultation</label>
                    </div>
                </div>
                <div class="col s11 lignesExamen">

                </div>
                <div class="col s3 offset-s8 buttons">
                    <button class="btn waves-effect waves-light" id="ajouterExamen">
                        <i class="fa fa-plus"></i> Examen
                    </button>
                </div>
                <div class="col s12">
                    <div class="col s5 offset-s7 buttons">
                        <button disabled type="submit" class="btn waves-effect waves-light">
                            Envoyer
                            <i class="material-icons right">send</i>
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
