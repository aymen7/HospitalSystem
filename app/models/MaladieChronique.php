<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:46
 */
namespace app\models;


/**
 * Maladiechronique
 *
 * @Table(name="maladiechronique", indexes={@Index(name="idPatient", columns={"idPatient"}), @Index(name="idUser", columns={"idUser"})})
 * @Entity
 */
class Maladiechronique
{
    /**
     * @var integer
     *
     * @Column(name="idMaladie", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idmaladie;

    /**
     * @var string
     *
     * @Column(name="maladie", type="string", length=30, nullable=false)
     */
    private $maladie;

    /**
     * @var \Patient
     *
     * @ManyToOne(targetEntity="Patient")
     * @JoinColumns({
     *   @JoinColumn(name="idPatient", referencedColumnName="idPatient")
     * })
     */
    private $idpatient;

    /**
     * @var \User
     *
     * @ManyToOne(targetEntity="User")
     * @JoinColumns({
     *   @JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;


}

