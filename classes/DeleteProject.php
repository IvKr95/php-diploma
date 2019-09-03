<?php

class DeleteProject extends Project
{
    public static function delete(string $projectId): void
    {
        self::deleteJson($projectId);
        self::deleteTxt($projectId);
    }

    private static function deleteJson(string $projectId): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $projects = $modelJson->readJson();
        
        foreach ($projects as $id => $project) {
            if ($id === $projectId) unset($projects->{$projectId});
        };
        $modelJson->writeJson($projects); 
    }

    private static function deleteTxt(string $projectId): void
    {
        try {
            FileAccessModel::deleteDir($projectId);
        } catch (Exception $e) {
            echo $e->getMessage();
        };
    }
}