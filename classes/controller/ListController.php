<?php


class ListController
{
    /* @var ObjectWithTransitionsDTO[] */
    public $objectList;

    /**
     * @return string | null
     */
    public function call()
    {
        $database = new DatabaseService();
        /** @var \PDOStatement $database */
        $this->objectList = array();

        $objects = $database->GetSQL("SELECT * FROM Material", array());

        while ($row = $objects->fetch()) {
            $object = new Object($row);
            $transitionList = array();
            $transitions = $database->GetSQL("SELECT * FROM Recipe WHERE Requirement1=? OR Requirement2=? OR Result1=? OR Result2=?", array($row["ID"], $row["ID"], $row["ID"], $row["ID"]));
            while ($row2 = $transitions->fetch()) {
                $transitionList[] = new Transition($row2);
            }
            $objectDTO = new ObjectWithTransitionsDTO($object, $transitionList);
            $this->objectList[] = $objectDTO;
        }
        return "../views/ListPage.php";

    }


}