<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 28/12/2017
 * Time: 12:33
 */

namespace app\models;


/**
 * LigneOrdonnance
 *
 * @Table(name="ligneordonnance", indexes={@Index(name="idOrdonnance", columns={"idOrdonnance"})})
 * @Entity
 */
class LigneOrdonnance
{
    /**
     * @var integer
     *
     * @Column(name="idLigneOrdonnance", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idLigneOrdonnance;

    /**
     * @var string
     *
     * @Column(name="medicament", type="string", length=60, nullable=false)
     */
    private $medicament;

    /**
     * @var integer
     *
     * @Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var string
     *
     * @Column(name="remarque", type="string", length=100)
     */
    private $remarque;

    /**
     * @var Ordonnance
     *
     * @ManyToOne(targetEntity="Ordonnance", inversedBy="lignesOrdonnances", cascade={"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="idOrdonnance", referencedColumnName="idOrdonnance")
     * })
     */
    private $ordonnance;

    /**
     * @return int
     */
    public function getIdLigneOrdonnance()
    {
        return $this->idLigneOrdonnance;
    }

    /**
     * @param int $idLigneOrdonnance
     */
    public function setIdLigneOrdonnance($idLigneOrdonnance)
    {
        $this->idLigneOrdonnance = $idLigneOrdonnance;
    }

    /**
     *
     * @return string
     */
    public function getMedicament()
    {
        return $this->medicament;
    }

    /**
     * @param string $medicament
     */
    public function setMedicament($medicament)
    {
        $this->medicament = $medicament;
    }

    /**
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param int $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return Ordonnance
     */
    public function getOrdonnance()
    {
        return $this->ordonnance;
    }

    /**
     * @param Ordonnance $ordonnance
     */
    public function setOrdonnance($ordonnance)
    {
        $this->ordonnance = $ordonnance;
    }

    /**
     * @return string
     */
    public function getRemarque()
    {
        return $this->remarque;
    }

    /**
     * @param string $remarque
     */
    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;
    }


}