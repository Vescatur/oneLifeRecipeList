<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 2-3-2018
 * Time: 20:32
 */

class Categorie
{
    public $categorieId;
    public $materialId;
    
    /**
     * Categorie constructor.
     * @param $array
     */
    public function __construct($array)
    {
        $this->categorieId = $array["CategorieID"];
        $this->materialId = $array["MaterialID"];
    }
}