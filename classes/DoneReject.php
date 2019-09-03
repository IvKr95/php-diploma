<?php

class DoneReject extends Project
{
    public static function handle($data)
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $projects = $modelJson->readJson();
        $projects->{$data['project-id']}->status = strtolower($data['type']);
        $modelJson->writeJson($projects);
    }
}