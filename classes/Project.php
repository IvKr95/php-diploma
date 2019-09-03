<?php

class Project
{

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

    public function __construct(array $projectData)
    {
        $this->getProjectId();
        $this->setProjectName();
        $this->dirName = $this->projectName;
        $this->initLangText = $projectData['text'];

        $this->formateProject($projectData);
    }

    private function getProjectId(): void
    {
        $this->projectId = random_int(self::PROJECT_NUM_MIN, self::PROJECT_NUM_MAX);
    }

    private function setProjectName(): void
    {
        $this->projectName = self::PROJECT_STRING . $this->projectId;
    }

    private function formateProject(array $projectData): void
    {
        $projectData[self::STATUS_KEY] = self::PROJECT_STATUS_NEW;
        $this->projectData = $projectData;
    }

    public function save(): void
    {
        $this->saveJson();
        $this->saveTxt();
    }

    public function saveJson(): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_NAME);
        $content = $modelJson->readJson();
        $content->{$this->projectName} = $this->projectData;
        $modelJson->writeJson($content); 
    }

    public function saveTxt(): void
    {
        $modelTxt = new FileAccessModel($this->dirName, $this->projectName);
        $modelTxt->write($this->initLangText);
    }
}