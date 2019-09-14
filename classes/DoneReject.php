<?php

/**
 * DoneReject class inherits
 * all the properties and methods
 * of Project and declares new
 * method to refresh the project's
 * status
 */
class DoneReject extends Project
{
    /**
     * Changes the state of a project
     * according to the passed data
     * @param array $data
     * @uses self::FILE_NAME
     * @uses self::PROJECT_STATUS_DONE
     * @uses self::dicCounter()
     * @return void
     */
    public static function handle(array $data): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $projects = $modelJson->readJson();
        $projects->{$data['project-id']}->status = strtolower($data['type']);

        if ($projects->{$data['project-id']}->status === self::PROJECT_STATUS_DONE) {
            self::dicCounter($projects->{$data['project-id']}->assignment);
        };

        $modelJson->writeJson($projects);
    }

    /**
     * Dicrease the number of
     * the interpreter's projects by one
     * @param string $assignee
     * @return void
     */
    private function dicCounter(string $assignee): void
    {
        $modelJson = new JsonFileAccessModel('interpreters');
        $content = $modelJson->readJson();
        
        foreach ($content as $key => $value) {
            if($value->name === $assignee) {
                $value->projectsInProgress -= 1;
                break;
            };
        };

        $modelJson->writeJson($content); 
    }
}