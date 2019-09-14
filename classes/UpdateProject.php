<?php

/**
 * UpdateProject class inherits
 * all the properties and methods
 * of Project and declares new
 * methods to update a project
 */
class UpdateProject extends Project
{

    /**
     * Updates a project
     * @param array $newData
     * @uses method updateJson()
     * @uses method updateTxt()
     * @return void
     */
    public static function update(array $newData): void
    {
        self::updateJson($newData);
        self::updateTxt($newData);
    }

    /**
     * Updates the json of
     * a project
     * @param array $data
     * @uses string self::FILE_NAME
     * @return void
     */
    private static function updateJson(array $data): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $projects = $modelJson->readJson();

        foreach ($projects as $id => $project) {
            if ($id === $data['project-id']) {
                unset($data['project-id']);
                $projects->{$id} = $data;
                break;
            };
        };
        $modelJson->writeJson($projects);
    }

    /**
     * Updates the text
     * of a project
     * @param array $data
     * @return void
     */
    private static function updateTxt(array $data): void
    {
        $modelTxt = new FileAccessModel($data['project-id'], $data['project-id']);
        $modelTxt->write($data['text']);
    }
}