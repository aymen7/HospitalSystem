<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:29
 */
namespace app\models;

/**
 * Chambre
 *
 * @Table(name="chambre")
 * @Entity
 */
class Chambre
{
    /**
     * @var integer
     *
     * @Column(name="idChambre", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idchambre;

    /**
     * @var string
     *
     * @Column(name="numero", type="string", length=10, nullable=false)
     */
    private $numero;

    /**
     * @var boolean
     *
     * @Column(name="nombreLits", type="boolean", nullable=false)
     */
    private $nombrelits;


}
