<?php

class ProjectsPage
{
    private $modelJson,
            $projects,
            $role; 

    const JSON_FILE = 'projects';

    public function __construct(string $role)
    {
        $this->role = $role;
        $this->modelJson = new JsonFileAccessModel(self::JSON_FILE);
        $this->projects = $this->modelJson->readJson();
    }

    public function getProjects()
    {   
        $html = '';

        if ($this->role === 'manager') {
            foreach ($this->projects as $id => $data) { 
                $html .= 
                    "<li class=\"list-item project\" data-project-id=\"$id\" data-project-status=\"$data->status\">
                        <p class=\"list-item_text initial-lang\">
                            " . mb_substr($data->text, 0, 300) . "...
                        </p>
                        <div class=\"list-item_control\">
                            <div class=\"btns\">
                                <button class=\"btn btn-primary btn-md btn-edit\">
                                    Edit
                                </button>
                                <button class=\"btn btn-danger btn-md btn-delete\">
                                    Delete
                                </button>
                            </div>
                            <div class=\"list-item_info\">
                                <div class=\"target-lang_holder\">
                                    <span class=\"target-lang\">
                                        " . implode('</span><span class="target-lang">', $data->{'target-lang'}) . "
                                    </span>
                                </div>
                                <p class=\"deadline\">$data->deadline</p>
                            </div>
                        </div>
                    </li>"; 
            };

            if ($html === '') {
                echo json_encode(
                    '<p>Hello, good sir! No projects yet, but you may press the <b>Create New</b> button
                    to create a new one!</p>');
            } else {
                echo json_encode($html);
            };
        } else {
            foreach ($this->projects as $id => $data) {
                $html .= 
                        "<li class=\"list-item project\" data-project-id=\"$id\" data-project-status=\"$data->status\">
                            <p class=\"list-item_text initial-lang\">
                                " . mb_substr($data->text, 0, 300) . "...
                            </p>
                            <div class=\"list-item_control\">
                                <div class=\"list-item_info\">
                                    <div class=\"target-lang_holder\">
                                        <span class=\"target-lang\">
                                            " . implode('</span><span class="target-lang">', $data->{'target-lang'}) . "
                                        </span>
                                    </div>
                                    <p class=\"deadline\">$data->deadline</p>
                                </div>
                            </div>
                        </li>";
            };
            if ($html === '') {
                echo json_encode(
                    '<p>Whoopsie!There are not available projects yet:(</p>');
            } else {
                echo json_encode($html);
            };
        };
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
    }
}