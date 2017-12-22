<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:54
 */
namespace app\models;


/**
 * Typeexamen
 *
 * @Table(name="typeexamen", indexes={@Index(name="idExamen", columns={"idExamen"})})
 * @Entity
 */
class Typeexamen
{
    /**
     * @var integer
     *
     * @Column(name="idTypeExamen", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idtypeexamen;

    /**
     * @var string
     *
     * @Column(name="analyse", type="string", length=100, nullable=false)
     */
    private $analyse;

    /**
     * @var string
     *
     * @Column(name="resultat", type="string", length=100, nullable=false)
     */
    private $resultat;

    /**
     * @var \Examen
     *
     * @ManyToOne(targetEntity="Examen")
     * @JoinColumns({
     *   @JoinColumn(name="idExamen", referencedColumnName="idExamen")
     * })
     */
    private $idexamen;


}

