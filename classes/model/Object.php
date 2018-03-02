<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 1-3-2018
 * Time: 21:05
 */

class Object
{
    public $id;
    public $name;
    public $recipeTier;


    /**
     * Object constructor.
     * @param array $array
     */
    public function __construct($array)
    {
        $this->id = $array["ID"];
        $this->name = $array["Name"];
        $this->recipeTier = $array["RecipeTier"];
    }


}