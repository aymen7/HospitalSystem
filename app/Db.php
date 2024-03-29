<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 21/03/2017
 * Time: 22:19
 */
namespace app;
use PDO;

class Db
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    /**
     * Database constructor.
     * @param $db_name String Database name
     * @param String $db_user String Database username
     * @param String $db_pass String Database password
     * @param String $db_host String Database localhost
     */

    function __construct($db_name = 'chu', $db_user = 'root', $db_pass = '', $db_host = 'localhost') {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    /**
     * Connect to database
     * @return PDO
     */
    private function getPDO() {
        if (!isset($this->pdo))
        {
            try {
                $dsn = 'mysql:dbname=' . $this->db_name . ';host=' . $this->db_host;
                $this->pdo = new PDO($dsn, $this->db_user, $this->db_pass, array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            } catch (\Exception $exception){
                $exception->getMessage();
            }
        }
        return $this->pdo;
    }

    /**
     * @param $statement String
     * @param $class Class
     * @return array
     */
    public function query ($statement, $class = null, $oneOnly = false) {
        $req = $this->getPDO()->query($statement);
        if($class != null){
        return $req->fetchAll(PDO::FETCH_CLASS, $class);}
        else{
            if ($oneOnly)
                return $req->fetch(PDO::FETCH_OBJ);
            else
                return $req->fetchAll(PDO::FETCH_OBJ);
        }
    }

    /**
     * query with condition
     * @param $statement String
     * @param $param array
     * @param $class Class
     * @param bool $oneOnly
     * @return array|mixed
     */
    public function prepare($statement, $param, $class = null, $oneOnly = false) {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($param);
        if (strpos($statement, 'SELECT') === 0)// si la requete commence par SELECT
        {
            $req->setFetchMode(PDO::FETCH_CLASS, $class);
            if ($oneOnly)
                return $req->fetch();
            else
                return $req->fetchAll();
        }
    }

    public function lastInsertedId($name = null){
        return $this->getPDO()->lastInsertId($name);
    }
}