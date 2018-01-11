<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 26/12/2017
 * Time: 16:51
 */

if (isset($_GET['chambre']) && ctype_digit($_GET['chambre'])) {
    $chambre = \app\Config::getInstance()->getEntityManager()->find(\app\R::CHAMBRE, $_GET['chambre']);
    /**
     * @var $chambre \app\models\Chambre
     */
    if (isset($chambre)) {
        echo "<div class='detailsChambre'>";
        echo "<h2 class='text-center'>Chambre N° {$chambre->getNumero()} </h2>";
        echo "<div class='row'>";
        for ($i = 0; $i < $chambre->getNombrelits(); $i++) {
            $lit = $chambre->getLits()->get($i);
            /**
             * @var $lit \app\models\Lit
             */
            echo "<div class='col s11 z-depth-2 offset-s1 detailsLit'>";
            if ($lit instanceof \app\models\Lit){
                ?>
                <div class="col s2">
                    <i class="fa fa-bed fa-4x red-text text-darken-1"></i>
                </div>
                <div class="col s10">
                    <div class="col s12"><b>Nom: </b><?= $lit->getPatient()->getNom() ?> <b>Prénom: </b>
                        <?= $lit->getPatient()->getPrenom()?> <b>DN: </b>
                        <?= $lit->getPatient()->getDatedenaissance()->format('d/m/Y')?></div>
                    <div class="col s12">
                        <b>NSS: </b><?= $lit->getPatient()->getNss()?> <b>Suivi par: </b><?= $lit->getPatient()->getUser()?>
                    </div>
                    <div class="col s12">
                        <b>Hospitalisation de: </b><?= $lit->getDatedebut()->format('d/m/Y') ?>
                        <b> à </b><?= $lit->getDatefin()->format('d/m/Y')?>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="col s2">
                    <i class="fa fa-bed fa-4x green-text text-darken-1"></i>
                </div>
                <div class="col s10">
                    <h2>Libre</h2>
                </div>
                <?php
            }
            ?>

            <?php
            echo "</div>";
        }
        echo "</div>";
        echo "</div>";
    }
} else {

}
