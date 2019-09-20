<?php

/**
 * GetData class inherits
 * all the properties and methods
 * of Project and declares new
 * method to get the project's
 * data
 */
class GetData extends Project
{
    /**
     * Gets the project's data
     * @param string $projectId
     * @uses self::FILE_NAME
     * @return void 
     */
    public static function getProjectData(string $projectId): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $projects = $modelJson->readJson();
        echo json_encode($projects->{$projectId});
    }
}