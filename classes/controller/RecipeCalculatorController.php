<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 1-3-2018
 * Time: 20:40
 */

class RecipeCalculatorController
{
    public $errorMessage;
    public $ageList;

    private $sortedTransitionList;
    private $categorieList;

    /**
     * @param integer $id
     */
    public function findTransitionByObject($id){

    }

    public function createTransitionsFromObject($id){

    }

    public function call(){
        if(isset($_GET["objectid"])){
            $objectid = $_GET["objectid"];
            $database = new DatabaseService();
            /** @var \PDOStatement $database */
            $objectsEqualId = $database->GetSQL("SELECT * FROM Material WHERE ID=?", array($objectid));
            $object = $objectsEqualId->fetch();
            if($object){
                $this->ageList=array();
                $transitions = $database->GetSQL("SELECT * FROM Recipe", array());
                while ($row2 = $transitions->fetch()) {
                    /** @var Transition $transition */
                    $transition = new Transition($row2);
                    if(!isset($this->sortedTransitionList[$transitions->result1])){
                        $this->sortedTransitionList[$transitions->result1]=array();
                    }
                    if(!isset($this->sortedTransitionList[$transitions->result2])){
                        $this->sortedTransitionList[$transitions->result2]=array();
                    }
                    $this->sortedTransitionList[$transitions->result1][]=$transition;
                    $this->sortedTransitionList[$transitions->result2][]=$transition;
                }
                $objects = $database->GetSQL("SELECT * FROM Material ", array());
                while ($row2 = $transitions->fetch()) {
                    $this->transitionList[] = new Transition($row2);
                }

                return "../views/CalculatorPage.php";
            }else{
                $this->errorMessage="object can not be found in database";
                return "../views/ErrorPage.php";
            }
        }else{
           $this->errorMessage="objectid not found in url";
           return "../views/ErrorPage.php";
        }
    }
}