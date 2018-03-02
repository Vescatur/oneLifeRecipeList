<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 1-3-2018
 * Time: 21:06
 */

class Transition
{
    public $id;
    public $requirement1;
    public $requirement2;
    public $result1;
    public $result2;
    public $recipeTime;

    /**
     * Transition constructor.
     * @param array $array
     */
    public function __construct($array)
    {
        $this->id = $array["ID"];
        $this->requirement1 = $array["Requirement1"];
        $this->requirement2 = $array["Requirement2"];
        $this->result1 = $array["Result1"];
        $this->result2 = $array["Result2"];
        $this->recipeTime = $array["RecipeTime"];
    }


}