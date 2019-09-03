<?php

class GetData extends Project
{
    public static function getProjectData(string $projectId)
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