<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 19/01/2018
 * Time: 21:39
 */

namespace app;

use app\models\LigneOrdonnance;
use app\models\Ordonnance;
use app\models\Patient;

require 'fpdf\fpdf.php';
class ImpressionOrdonnance extends \FPDF {

    /**
     * @var $patient Patient
     */
    private $patient;

    /**
     * impressionOrdonnance constructor.
     * @param Patient $patient
     */
    public function __construct(Patient $patient)
    {
        parent::__construct();
        $this->patient = $patient;
        $this->AddPage();
    }


    function Header()
    {
        $this->SetFont('Arial', 'BI', 12);
        $this->Cell(50);
        $this->cMargin = 0;
        $this->Cell(15,8,'Centre Hospitalo-Universitaire ', 0, 1, 'R');
        $this->Cell(20, 8, 'Dr Tidjani Damerdji de Tlemcen');
        $this->cMargin = 1;
        $this->SetFont('courier', '', 10);
        $this->SetTextColor(0);
        $this->Ln();
        $this->Cell(15, 8, 'Tel: 043 41 72 34', 0, 1);
        $this->Ln();
        $this->Cell(15, 8, 'Nom: ' . $this->patient->getNom() . $this->patient->getPrenom(), 0, 1);
        $this->Cell(15, 8, 'Date de naissance : ' . $this->patient->getDatedenaissance()->format('d/m/Y'), 0, 1);
        $this->Ln();
    }

    function loadOrdonnance(Ordonnance $ordonnance)
    {
        $data = array();
        foreach ($ordonnance->getLignesOrdonnances() as $lignesOrdonnance)
        {
            /**
             * @var $lignesOrdonnance LigneOrdonnance
             */
            $pr = array();
            $pr[] = $lignesOrdonnance->getMedicament();
            $pr[] = $lignesOrdonnance->getQuantite();
            $pr[] = $lignesOrdonnance->getRemarque();
            $data[] = $pr;
        }
        $this->ImprovedTable($data);

    }

    function ImprovedTable($data)
    {
        // Largeurs des colonnes
        $w = array(100, 40, 50);
        // En-tête
        for($i=0; $i<3; $i++)
        {
            $this->Cell($w[$i], 7, '', 0, 0, 'C');
        }

        $this->Ln();
        // Données
        foreach($data as $row)
        {
            $str = iconv('UTF-8', 'windows-1252', $row[0]);
            $this->Cell($w[0],6,$str,0);
            $str = iconv('UTF-8', 'windows-1252', $row[1]);
            $this->Cell($w[1],6,$str,0);
            $str = iconv('UTF-8', 'windows-1252', $row[2]);
            $this->Cell($w[2],6,$str,0,0,'R');
            $this->Ln();
            $this->Ln();
            $this->Ln();
        }
        // Trait de terminaison
        $this->Cell(array_sum($w),0,'','T');
    }

}/*
if (isset($_GET['id']))
{
    $factureDb = new \app\table\FactureTable(\app\Config::getInstance()->getDatabase());
    $idFacture = (ctype_digit($_GET['id'])) ? $_GET['id'] : null;
    $facture = $factureDb->findById($idFacture);
    if ($facture)
    {
        $pdf = new FacturePDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('courier', '', 12);
        $str = iconv('UTF-8', 'windows-1252', 'Facture N°: ' . str_pad($facture->getNumeroFacture(), 10, '0', STR_PAD_LEFT));
        $pdf->Cell(15, 8, $str, 0, 1);
        $pdf->Cell(15, 8, 'Tlemcen, le: ' . date('d/m/Y', strtotime($facture->getDate())), 0, 1);
        $str = 'Client: ' . $facture->getCommande()->getClient()->getNom() . ' ' . $facture->getCommande()->getClient()->getPrenom();
        $str = iconv('UTF-8', 'windows-1252', $str);
        $pdf->Cell(15, 8, $str, 0, 1);
        $str = 'Adresse: ' . $facture->getCommande()->getAdresseLivraison();
        $str = iconv('UTF-8', 'windows-1252', $str);
        $pdf->Cell(15, 8, $str, 0, 1);
        $data = $pdf->loadFacture($facture);
        $header = array('Reference', 'Libelle', 'Quantité', 'Prix UHT', 'Montant HT');
        $pdf->Ln();
        $pdf->ImprovedTable($header, $data);
        $pdf->totalFacture($facture);
        $pdf->Output();
    }
}*/
