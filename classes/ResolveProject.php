<?php

class ResolveProject extends Project
{
    public static function resolve(array $data): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $projects = $modelJson->readJson();

        foreach ($projects as $id => $project) {
            if ($id === $data['project-id']) {
                $projects->{$id}->{'target-lang-text'} = $data['target-lang-text'];
                $projects->{$id}->status = 'resolved';
                break;
            };
        };
        $modelJson->writeJson($projects);
    }
}