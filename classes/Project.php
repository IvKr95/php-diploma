<?php

header('Content-type: application/json');

require_once '../config/Config.php';
require_once './FileAccessModel.php';
require_once './JsonFileAccessModel.php';

class Project
{

    private $projectData;
    private $projectId;
    private $projectName;
    private $dirName;
    private $initLangText;

    const PROJECT_NUM_MIN = 1;
    const PROJECT_NUM_MAX = 99999;

    const STATUS_KEY = 'status';
    const PROJECT_STATUS_NEW = 'new';

    const PROJECT_STRING = 'project';
    const FILE_TO_WRITE = 'projects';
    const FILE_TO_READ = 'projects';
    const ID_STRING = 'id';

    public function __construct(array $projectData)
    {
        $this->projectId = $this->getProjectId();
        $this->projectName = self::PROJECT_STRING . $this->projectId;
        $this->dirName = $this->projectName;
        $this->initLangText = $projectData['text'];

        $this->projectData = $this->formateProject($projectData);
    }

    private function getProjectId(): int
    {
        return random_int(self::PROJECT_NUM_MIN, self::PROJECT_NUM_MAX);
    }

    private function formateProject(array $projectData): array
    {
        $projectData[self::STATUS_KEY] = self::PROJECT_STATUS_NEW;
        $projectData[self::ID_STRING] = $this->projectName;

        return $projectData;
    }

    public function saveProjectJson(): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_TO_WRITE);
        $modelJson->writeJson($this->projectData); 
    }

    public static function updateProjectJson(array $projects): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_TO_WRITE);
        $modelJson->updateJson($projects); 
    }

    public static function deleteProjectJson(string $projectId): void
    {
        $modelJson = new JsonFileAccessModel(self::FILE_TO_READ);
        $projects = $modelJson->readJson();
        
        foreach ($projects as $key => $project) {
            if ($project->id === $projectId) {
                unset($projects[$key]);
                $projects = array_values($projects);
                self::updateProjectJson($projects);
            }
        }
    }

    public function saveProjectTxt(): void
    {
        $modelTxt = new FileAccessModel($this->dirName, $this->projectName);
        $modelTxt->write($this->initLangText);
    }

    public static function deleteProjectTxt(string $projectId): void
    {
        $modelTxt = new FileAccessModel(self::FILE_TO_READ);
        $arr = $modelJson->readJson();

        foreach ($arr as $key => $project) {
            if ($project->id === $projectId) {
                unset($arr[$key]);
                $arr = array_values($arr);
                print_r($arr);
            }
        }
    }
};

if (isset($_POST)) {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'create') {
    
            array_shift($_POST);
            $project = new Project($_POST);
            $project->saveProjectJson();
            $project->saveProjectTxt();
        
            echo json_encode('Successfully Created!');
        };
    } else {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
    
        Project::deleteProjectJson($obj->id);
        echo json_encode('Successfully Deleted!');
    }
}
