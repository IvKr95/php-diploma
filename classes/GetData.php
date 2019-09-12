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
     * @uses FILE_NAME
     * @return string 
     */
    public static function getProjectData(string $projectId): string
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $projects = $modelJson->readJson();

        foreach ($projects as $id => $project) {
            if ($id === $projectId) {
                echo json_encode($projects->{$projectId});
            };
        };
    }
}