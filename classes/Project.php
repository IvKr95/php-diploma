<?php

/**
 * Project is the main class
 * that handles the creation of projects
 */

class Project
{

    /**
     * @var array $projectData The array of data of a project
     * @var int $projectId The random id of a project
     * @var string $projectName The name of a project
     * @var string $dirName The name of a directory (equal to $projectName)
     * @var string $initLangText The initial text of a project
     * @var 1 PROJECT_NUM_MIN The minimal possible id of a project
     * @var 99999 PROJECT_NUM_MIN The maximal possible id of a project
     * @var 'status' STATUS_KEY 
     * @var 'new' PROJECT_STATUS_NEW
     * @var 'rejected' PROJECT_STATUS_REJECTED
     * @var 'resolved' PROJECT_STATUS_RESOLVED
     * @var 'done' PROJECT_STATUS_DONE
     * @var 'project' PROJECT_STRING
     * @var 'projects' FILE_NAME
     */
    private $projectData,
            $projectId,
            $projectName,
            $dirName,
            $initLangText;

    const PROJECT_NUM_MIN = 1;
    const PROJECT_NUM_MAX = 99999;

    const STATUS_KEY = 'status';
    const PROJECT_STATUS_NEW = 'new';
    const PROJECT_STATUS_REJECTED = 'rejected';
    const PROJECT_STATUS_RESOLVED = 'resolved';
    const PROJECT_STATUS_DONE = 'done';

    const PROJECT_STRING = 'project';

    const FILE_NAME = 'projects';

    /**
     * The constructor of Project class
     * @param array $projectData
     */
    public function __construct(array $projectData = [])
    {
        $this->getProjectId();
        $this->setProjectName();
        $this->dirName = (string) $this->projectName;
        $this->initLangText = (string) $projectData['text'];

        $this->formateProject($projectData);

        $this->incCounter($projectData['assignment']);
    }

    /**
     * A private method that assigns a random int
     * to $this->projectId
     * @uses projectId
     * @uses PROJECT_NUM_MIN
     * @uses PROJECT_NUM_MAX
     * @return void
     */
    private function getProjectId(): void
    {
        $this->projectId = random_int(self::PROJECT_NUM_MIN, self::PROJECT_NUM_MAX);
    }

    /**
     * Sets the name of a project
     * @uses projectName
     * @uses PROJECT_STRING
     * @uses projectId
     * @return void
     */
    private function setProjectName(): void
    {
        $this->projectName = self::PROJECT_STRING . $this->projectId;
    }

    /**
     * Formattes the data array of a project
     * @param array $projectData
     * @uses STATUS_KEY
     * @uses PROJECT_STATUS_NEW
     * @return void
     */
    private function formateProject(array $projectData): void
    {
        $projectData[self::STATUS_KEY] = self::PROJECT_STATUS_NEW;
        $this->projectData = (array) $projectData;
    }

    /**
     * Saves a project
     * @uses method $this->saveJson()
     * @uses method $this->saveTxt()
     * @return void
     */
    public function save(): void
    {
        $this->saveJson();
        $this->saveTxt();
    }

    /**
     * Saves the data of a project
     * as a json file
     * @uses FILE_NAME
     * @uses projectName
     * @uses projectData
     * @return void
     */
    private function saveJson(): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $content = $modelJson->readJson();
        $content->{$this->projectName} = $this->projectData;
        $modelJson->writeJson($content); 
    }

    /**
     * Saves the text of a project
     * @uses dirName
     * @uses projectName
     * @uses initLangText
     * @return void
     */
    private function saveTxt(): void
    {
        $modelTxt = new FileAccessModel($this->dirName, $this->projectName);
        $modelTxt->write($this->initLangText);
    }


    private function incCounter(string $assignee): void
    {
        $modelJson = new JsonFileAccessModel('interpreters');
        $content = $modelJson->readJson();
        
        foreach ($content as $key => $value) {
            if($value->name === $assignee) {
                $value->projectsInProgress += 1;
                break;
            };
        };

        $modelJson->writeJson($content); 
    }
}