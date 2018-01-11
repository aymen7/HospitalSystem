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
                <?php
                if ($ligne instanceof \app\models\Patient){
                    echo "<a class='detailsPatient' href='?ajax=detailsPatient&id={$ligne->getIdpatient()}' data-info='{$ligne->toJson()}'>";
                }
                else
                    echo "<a>";
                ?>
                <div class="col s2">
                    <div class="letter">
                        <img src="<?= $ligne->getAvatar() ?>" class="responsive-img">
                    </div>
                </div>
                <div class="col s10">
                    <div class="nom">
                        <?= $ligne->getNom() . " " . $ligne->getPrenom() ?>
                        <h6>
                            <?php if ($ligne instanceof \app\models\Patient) {
                                echo "nss : {$ligne->getNss()}";
                            } ?>
                        </h6>
                    </div>
                </div>
                </a>
            </div>
            <?php
        }
    }
}
?>

