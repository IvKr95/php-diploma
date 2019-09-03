<?php

class SaveTargetLangs extends Project
{

    public static function save(array $data)
    {
        self::saveJson($data);
        self::saveTxts($data);
    }

    private static function saveJson(array $data): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $projects = $modelJson->readJson();

        foreach ($projects as $id => $project) {
            if ($id === $data['project-id']) {
                $projects->{$id}->{'target-lang-text'} = $data['target-lang-text'];
                break;
            };
        };
        $modelJson->writeJson($projects);
    }

    private static function saveTxts(array $data): void
    {
        foreach ($data['target-lang-text'] as $lang => $txt) {
            $modelTxt = new FileAccessModel($data['project-id'], $lang);
            $modelTxt->write($txt);
        };
    }
}