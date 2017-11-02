<?php
/**
 * Created by PhpStorm.
 * User: Yacine
 * Date: 02/11/2017
 * Time: 14:59
 */

abstract class Table
{
    protected $db;

    public function __construct(\app\Db $db)
    {
        $this->db = $db;
    }

}