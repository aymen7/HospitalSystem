<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:45
 */
namespace app\models;


/**
 * Lit
 *
 * @Table(name="lit", indexes={@Index(name="idChambre", columns={"idChambre"}), @Index(name="idPatient", columns={"idPatient"})})
 * @Entity
 */
class Lit
{
    /**
     * @var integer
     *
     * @Column(name="idLit", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idlit;

    /**
     * @var \DateTime
     *
     * @Column(name="dateDebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @Column(name="dateFin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var \Chambre
     *
     * @ManyToOne(targetEntity="Chambre")
     * @JoinColumns({
     *   @JoinColumn(name="idChambre", referencedColumnName="idChambre")
     * })
     */
    private $idchambre;

    /**
     * @var \Patient
     *
     * @ManyToOne(targetEntity="Patient")
     * @JoinColumns({
     *   @JoinColumn(name="idPatient", referencedColumnName="idPatient")
     * })
     */
    private $idpatient;


}

