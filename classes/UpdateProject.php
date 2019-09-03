<?php

class UpdateProject extends Project
{
    public static function update(array $newData)
    {
        self::updateJson($newData);
        self::updateTxt($newData);
    }

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

    private static function updateTxt(array $data): void
    {
        $modelTxt = new FileAccessModel($data['project-id'], $data['project-id']);
        $modelTxt->write($data['text']);
    }
}