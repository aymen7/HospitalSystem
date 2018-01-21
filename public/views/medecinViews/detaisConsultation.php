<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 05/01/2018
 * Time: 20:59
 */
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $em = \app\Config::getInstance()->getEntityManager();
    $consultation = $em->find(\app\R::CONSULTATION, $_GET['id']);
    if ($consultation instanceof \app\models\Consultation) {

        ?>
        <div class="detailsConsultation">
            <h2 class="text-center" style="color: #FFF">Détails Consultation</h2>
            <div class="row">
                <div class="col s6">
                    <div class="detailsPatient z-depth-2">
                        <h3>Patient:</h3>
                        <div class="row">
                            <div class="col s6">
                                <b>Nom: </b>
                            </div>
                            <div class="col s6">
                                <?= $consultation->getPatient()->getNom() ?>
                            </div>
                            <div class="col s6">
                                <b>Prénom: </b>
                            </div>
                            <div class="col s6">
                                <?= $consultation->getPatient()->getPrenom() ?>
                            </div>
                            <div class="col s6">
                                <b>Date de naissance: </b>
                            </div>
                            <div class="col s6">
                                <?= $consultation->getPatient()->getNom() ?>
                            </div>
                            <div class="col s6">
                                <b>N° de sécurité sociale:</b>
                            </div>
                            <div class="col s6">
                                <?= $consultation->getPatient()->getNss() ?>
                            </div>
                            <div class="col s6">
                                <b>N° téléphone:</b>
                            </div>
                            <div class="col s6">
                                <?= $consultation->getPatient()->getNumtel() ?>
                            </div>
                            <div class="col s6">
                                <b>Suivi par:</b>
                            </div>
                            <div class="col s6">
                                <?php if ($consultation->getMedecin() instanceof \app\models\Medecin) echo $consultation->getMedecin() ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s6">
                    <div class="detailsMedecin z-depth-2">
                        <h3>Consultation:</h3>
                        <div class="row">
                            <div class="col s6">
                                <b>Faite le:</b>
                            </div>
                            <div class="col s6">
                                <?= $consultation->getDate()->format('d/m/Y') ?>
                            </div>
                            <div class="col s6">
                                <b>Par:</b>
                            </div>
                            <div class="col s6">
                                <?= $consultation->getMedecin() ?>

                            </div>
                            <div class="col s6">
                                <b>Rapport de consultation:</b>
                            </div>
                            <div class="col s6">
                                <?= $consultation->getRapport() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="detailsOrdonnance z-depth-2">
                        <h3>Ordonnance:</h3>
                        <div class="row">
                            <div class="col s4 offset-s8">
                                <a href="?page=imprimerOrdonnance&idOrdonnance=<?= $consultation->getOrdonnance()->getIdordonnance()?>" class="btn waves-effect waves-light"><i class="fa fa-print"></i>Imprimer
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <b>Médicaments</b>
                            </div>
                            <div class="col s2">
                                <b>Quantité</b>
                            </div>
                            <div class="col s4">
                                <b>Remarque</b>
                            </div>
                        </div>
                        <?php
                        if ($consultation->getOrdonnance()) {
                            foreach ($consultation->getOrdonnance()->getLignesOrdonnances() as $lignesOrdonnance) {
                                /**
                                 * @var $lignesOrdonnance \app\models\LigneOrdonnance
                                 */
                                ?>
                                <div class="row ligne">
                                    <div class="col s6">
                                        <?= $lignesOrdonnance->getMedicament() ?>
                                    </div>
                                    <div class="col s2">
                                        <?= $lignesOrdonnance->getQuantite() ?>
                                    </div>
                                    <div class="col s4">
                                        <?= $lignesOrdonnance->getRemarque() ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col s6">
                    <div class="detailsExamen z-depth-2">
                        <h3>Examens:</h3>
                        <div class="row">
                            <div class="col s4 offset-s8">
                                <button class="btn waves-effect waves-light"><i class="fa fa-print"></i>Imprimer
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <b>Examen</b>
                            </div>
                            <div class="col s6">
                                <b>Résultat</b>
                            </div>
                        </div>
                        <?php
                        if($consultation->getExamen()) {
                            foreach ($consultation->getExamen()->getTypeExamens() as $examen) {
                                /**
                                 * @var $examen \app\models\Typeexamen
                                 */
                                ?>
                                <div class="row ligne">
                                    <div class="col s6">
                                        <?= $examen->getAnalyse() ?>
                                    </div>
                                    <div class="col s6">
                                        <?= $examen->getResultat() ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    header('Location: index.php');
}
?>

