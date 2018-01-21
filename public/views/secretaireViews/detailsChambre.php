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
        echo "<h2 class='text-center white-text'>Chambre N° {$chambre->getNumero()} </h2>";
        echo "<div class='row'>";
        $litOcuppes = $chambre->getLitsOccupes();
        for ($i = 0; $i < $chambre->getNombrelits(); $i++) {
            $tab = [];
            $lit= $litOcuppes->get($i);
            /**
             * @var $lit \app\models\Lit
             */

            echo "<div class='col s10 z-depth-2 offset-s1 detailsLit'>";
            if ($lit instanceof \app\models\Lit) {
                $tab['idLit'] = $lit->getIdlit();
                $tab['nom'] = $lit->getPatient()->getNom();
                $tab['prenom'] = $lit->getPatient()->getPrenom();
                $tab['idChambre'] = $lit->getChambre()->getIdchambre();
                $tab['chambre'] = $lit->getChambre()->getNumero();
                $tab['date'] = $lit->getDatedebut()->format('d/m/Y') . " à " . $lit->getDatefin()->format('d/m/Y');
                $jsonTab = json_encode($tab);
                ?>
                <div class="col s2">
                    <i class="fa fa-bed fa-4x red-text text-darken-1"></i>
                </div>
                <div class="col s9">
                    <div class="col s12"><b>Nom: </b><?= $lit->getPatient()->getNom() ?> <b>Prénom: </b>
                        <?= $lit->getPatient()->getPrenom() ?> <b>DN: </b>
                        <?= $lit->getPatient()->getDatedenaissance()->format('d/m/Y') ?></div>
                    <div class="col s12">
                        <b>NSS: </b><?= $lit->getPatient()->getNss() ?> <b>Suivi
                            par: </b><?= $lit->getPatient()->getUser() ?>
                    </div>
                    <div class="col s12">
                        <b>Hospitalisation de: </b><?= $lit->getDatedebut()->format('d/m/Y') ?>
                        <b> à </b><?= $lit->getDatefin()->format('d/m/Y') ?>
                    </div>
                </div>
                <div class="col s1" style="margin-top: 34px">
                    <button data-info='<?php echo $jsonTab ?>' class="waves-effect waves-teal btn-flat modal-trigger updateHospitalisation"
                            ><i class="fa fa-edit"></i></button>
                </div>
                <?php
            } else {
                ?>
                <div class="col s2">
                    <i class="fa fa-bed fa-4x green-text text-darken-1"></i>
                </div>
                <div class="col s9">
                    <h2>Libre</h2>
                </div>
                <?php
            }
            echo "</div>";
        }
        echo "</div>";
        echo "</div>";

        require "addHospitalisationEmptyModal.php";
        ?>
<script>
    $(document).ready(function(){
        $(document).on('click', '.updateHospitalisation', function (e) {

            data = $(this).data('info');
            console.log(data);
            $("#idLit").val(data.idLit);
            $("#nom").val(data.nom);
            $("#prenom").val(data.prenom);
            $('#chambre').append($('<option>', {
                value: data.idChambre,
                text: data.chambre
            }));
            $("#chambre").val(data.idChambre);
            $("#dureeHospitalisation").val(data.date);

            Materialize.updateTextFields();
            $('.modal select').material_select();
            $("#updateHospitalisationModal").modal('open');
        })
    });
</script>
<?php
    }
} else {

}
