<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 01/11/2017
 * Time: 23:29
 */
namespace app\models;
use app\Config;
use app\R;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @var integer
     *
     * @Column(name="nombreLits", type="integer", nullable=false)
     */
    private $nombrelits;

    /**
     * @OneToMany(targetEntity="Lit", mappedBy="chambre")
     */
    private $lits;

    public function __construct()
    {
        $this->lits = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getIdchambre()
    {
        return $this->idchambre;
    }

    /**
     * @param int $idchambre
     */
    public function setIdchambre($idchambre)
    {
        $this->idchambre = $idchambre;
    }

    /**
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param string $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return int
     */
    public function getNombrelits()
    {
        return $this->nombrelits;
    }

    /**
     * @param int $nombrelits
     */
    public function setNombrelits($nombrelits)
    {
        $this->nombrelits = $nombrelits;
    }

    /**
     * @return ArrayCollection
     */
    public function getLits()
    {
        return $this->lits;
    }

    /**
     * @param ArrayCollection $lits
     */
    public function setLits($lits)
    {
        $this->lits = $lits;
    }

    public static function getAll($size = null, $offset = null){
        $chambreRepo = Config::getInstance()->getEntityManager()->getRepository(R::CHAMBRE);
        return $chambreRepo->findBy(array(), array(), $size, $offset);
    }


}
