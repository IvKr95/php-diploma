<?php

require_once '../config/Config.php';
require_once './FileAccessModel.php';
require_once './JsonFileAccessModel.php';


class ProjectsPage
{

    const TARGET_FILE = 'projects';

    public static function getProjectsJson()
    {
        $modelJson = new JsonFileAccessModel(self::TARGET_FILE);
        $modelJson = '[' . $modelJson->read() . ']';
        $modelJson = substr_replace($modelJson, '', -2, 1);
        echo json_encode($modelJson);
    }
};

if (isset($_GET)) {
    ProjectsPage::getProjectsJson();
};