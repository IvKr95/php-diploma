<?php

class ProjectsPage
{
    private $modelJson;
    private $projects;
    private $isFiltered = false;

    const JSON_FILE = 'projects';

    public function __construct()
    {
        $this->modelJson = new JsonFileAccessModel(self::JSON_FILE);
        $this->projects = $this->modelJson->readJson();
    }

    public function getProjects()
    {   
        $html = '';

        if (!$this->isFiltered) {
            foreach ($this->projects as $id => $data) {
                if ($data->status !== 'new') {
                    $html .= 
                        "<li class=\"list-item project\" data-project-id=\"$id\" data-project-status=\"$data->status\">
                            <p class=\"list-item_text initial-lang\">
                                $data->text
                            </p>
                            <div class=\"list-item_control\">
                                <div class=\"list-item_info\">
                                    <p class=\"deadline\">$data->deadline</p>
                                    <div class=\"target-lang_holder\">
                                        <span class=\"target-lang\">
                                            " . implode('</span><span class="target-lang">', $data->{'target-lang'}) . "
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>";  
                } else {
                    $html .= 
                        "<li class=\"list-item project\" data-project-id=\"$id\" data-project-status=\"$data->status\">
                            <p class=\"list-item_text initial-lang\">
                                $data->text
                            </p>
                            <div class=\"list-item_control\">
                                <div class=\"btns\">
                                    <button class=\"btn btn-edit\">
                                        Edit
                                    </button>
                                    <button class=\"btn btn-delete\">
                                        Delete
                                    </button>
                                </div>
                                <div class=\"list-item_info\">
                                    <p class=\"deadline\">$data->deadline</p>
                                    <div class=\"target-lang_holder\">
                                        <span class=\"target-lang\">
                                            " . implode('</span><span class="target-lang">', $data->{'target-lang'}) . "
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>"; 
                }; 
            };
        } else {
            foreach ($this->projects as $id => $data) {
                $html .= 
                        "<li class=\"list-item project\" data-project-id=\"$id\" data-project-status=\"$data->status\">
                            <p class=\"list-item_text initial-lang\">
                                $data->text
                            </p>
                            <div class=\"list-item_control\">
                                <div class=\"list-item_info\">
                                    <p class=\"deadline\">$data->deadline</p>
                                    <div class=\"target-lang_holder\">
                                        <span class=\"target-lang\">
                                            " . implode('</span><span class=\"target-lang\">', $data->{'target-lang'}) . "
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>";  
            };
        };
        
        echo json_encode($html);
    }

    public function filterByInterpreter(string $interpreter): void
    {
        $filtered = [];

        foreach ($this->projects as $id => $data) {
            if ($data->assignment === $interpreter) {
                $filtered[$id] = $data;
            } else continue;
        };

        $this->projects = $filtered;
        $this->isFiltered = true;
    }
}