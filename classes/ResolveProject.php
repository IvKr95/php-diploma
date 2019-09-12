<?php

/**
 * ResolveProject class inherits
 * all the properties and methods
 * of Project and declares new
 * method to change the project's
 * state to resolved
 */
class ResolveProject extends Project
{
    /**
     * Changes the project's state
     * to resolved by its data
     * @param array $data
     * @uses FILE_NAME
     * @uses PROJECT_STATUS_RESOLVED
     * @return void
     */
    public static function resolve(array $data): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $projects = $modelJson->readJson();

        foreach ($projects as $id => $project) {
            if ($id === $data['project-id']) {
                $projects->{$id}->{'target-lang-text'} = $data['target-lang-text'];
                $projects->{$id}->status = self::PROJECT_STATUS_RESOLVED;
                break;
            };
        };
        $modelJson->writeJson($projects);
    }
}