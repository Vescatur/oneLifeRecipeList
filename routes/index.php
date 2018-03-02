<?php
require_once "../classes/service/list.php";
require_once "../classes/controller/ListController.php";
session_start();



$class = new ListController();
$view = $class->call();
if(isset($view)){
    require_once $view;
}