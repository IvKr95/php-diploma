<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

require_once './config/Config.php';
require_once './classes/FileAccessModel.php';
require_once './classes/JsonFileAccessModel.php';

$modelJson = new JsonFileAccessModel('interpreters');
$interpreters = $modelJson->readJson();

$html = '';

foreach ($interpreters as $key => $value) {
    $html .= "
        <option value=\"$value->name\">
            $value->name
            " . implode(' ', $value->knowledge) . "
            Active projects($value->projectsInProgress)
        </option>";
};

echo json_encode($html);