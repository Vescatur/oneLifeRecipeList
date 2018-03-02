<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 1-3-2018
 * Time: 20:57
 */

class ObjectWithTransitionsDTO
{
    /* @var Object */
    public $object;
    /* @var Transition[] */
    public $transitions;

    /**
     * ObjectWithTransitionsDTO constructor.
     * @param Object $object
     * @param Transition[] $transitions
     */
    public function __construct($object, $transitions)
    {
        $this->object = $object;
        $this->transitions = $transitions;
    }


}