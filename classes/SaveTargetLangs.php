<?php

/**
 * SaveTargetLangs class inherits
 * all the properties and methods
 * of Project and declares new
 * method to upload target languages
 */
class SaveTargetLangs extends Project
{

    /**
     * Uploads target langs
     * @param array $data
     * @uses method saveTargetLangsJson()
     * @uses method saveTargetLangsTxts()
     * @return void
     */
    public static function upload(array $data): void
    {
        self::saveTargetLangsJson($data);
        self::saveTargetLangsTxts($data);
    }

    /**
     * Saves target langs to
     * the project's .json file
     * @param array $data
     * @uses string self::FILE_NAME
     * @return void
     */
    private static function saveTargetLangsJson(array $data): void
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

    /**
     * Saves target langs texts
     * to .txt files with identical names
     * @param array $data
     * @return void
     */
    private static function saveTargetLangsTxts(array $data): void
    {
        foreach ($data['target-lang-text'] as $lang => $txt) {
            $modelTxt = new FileAccessModel($data['project-id'], $lang);
            $modelTxt->write($txt);
        };
    }
}