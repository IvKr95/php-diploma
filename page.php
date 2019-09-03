<?php

header('Content-type: application/json');

require_once './config/Config.php';
require_once './autoload.php';

if (isset($_GET['interpreter'])) {
    $obj = new ProjectsPage();
    $obj->filterByInterpreter($_GET['interpreter']);
} else {
    $obj = new ProjectsPage();
};
$obj->getProjects();
unset($obj);