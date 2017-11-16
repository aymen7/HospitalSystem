<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 15/11/2017
 * Time: 21:53
 */
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $resultat = \app\models\User::getSuggestions($name);
    if ($resultat) {
        foreach ($resultat as $ligne) {
            ?>
            <div class="row">
                <div class="col-xs-2">
                    <div class="letter">
                        <?= $ligne->getLettre() ?>
                    </div>
                </div>
                <div class="col-xs-10">
                    <div class="nom">
                        <?= $ligne->getNom() . " " . $ligne->getPrenom()?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
?>

