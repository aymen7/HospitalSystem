<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 24/12/2017
 * Time: 11:56
 */
$start = isset($_GET['start']) ? $_GET['start'] : 0;
$chambres = \app\models\Chambre::getAll(12, $start);
$next = $start + 12;
$previous = ($start > 12) ? $start - 12 : 0;
if ($chambres) {
    ?>
    <div class="row">
        <?php
        foreach ($chambres as $chambre) {
            /**
             * @var $chambre \app\models\Chambre
             */
            ?>
            <div class="col s12 m4">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Chambre N° <?= $chambre->getNumero() ?></span>
                        <div class="row">
                            <?php
                            $litOccupes = $chambre->getLitsOccupes();
                            for ($i = 0; $i < $chambre->getNombrelits(); $i++) {
                                $lit = $litOccupes->get($i);
                                /**
                                 * @var $lit \app\models\Lit
                                 */
                                if ($lit instanceof \app\models\Lit) {
                                    echo "<div class='col s6'>
                                          <i class='fa fa-bed fa-3x red-text text-darken-1 tooltipped' 
                                          data-position='right' data-delay='50' 
                                          data-tooltip='{$lit->getPatient()}'></i></div>";
                                } else {
                                    echo "<div class='col s6'>
                                          <i class='fa fa-bed fa-3x white-text tooltipped' 
                                          data-position='right' data-delay='50' 
                                          data-tooltip='Libre'></i></div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="buttonDetailsChambre"
                           href="?ajax=detailsChambre&chambre=<?= $chambre->getIdchambre() ?>">Détails...</a>
                    </div>
                </div>
                <?php include "addChambreModal.php"; ?>
                <div class="fixed-action-btn">
                    <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#addChambreModal"><i class="material-icons">add</i></a>
                </div>
            </div>

            <?php
        } ?>
    </div>
    <?php
}
