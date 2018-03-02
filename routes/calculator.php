<?php
require_once "../classes/service/list.php";
require_once "../classes/controller/RecipeCalculatorController.php";
session_start();



$class = new RecipeCalculatorController();
$view = $class->call();
if(isset($view)){
    require_once $view;
}