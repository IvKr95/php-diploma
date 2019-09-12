<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
session_start();

require_once './config/Config.php';
require_once './autoload.php';

if ($_SESSION['role'] === 'interpreter') {
    $obj = new ProjectsPage($_SESSION['role']);
    $obj->filterByInterpreter($_SESSION['name']);
} else {
    $obj = new ProjectsPage($_SESSION['role']);
};
$obj->getProjects();
unset($obj);