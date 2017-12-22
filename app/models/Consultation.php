<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:35
 */
namespace app\models;


/**
 * Consultation
 *
 * @Table(name="consultation", indexes={@Index(name="idPatient", columns={"idPatient"}), @Index(name="idUser", columns={"idUser"})})
 * @Entity
 */
class Consultation
{
    /**
     * @var integer
     *
     * @Column(name="idConsultation", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idconsultation;

    /**
     * @var \DateTime
     *
     * @Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @Column(name="rapport", type="text", length=65535, nullable=false)
     */
    private $rapport;

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