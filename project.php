<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

require_once './config/Config.php';
require_once './autoload.php';

if (!empty($_GET)) {

    if (isset($_GET['id'])) {
        GetData::getProjectData($_GET['id']);
    };

} elseif (!empty($_POST) || false !== ($json = file_get_contents('php://input'))) {

    if (isset($_POST['action'])) {

        if ($_POST['action'] === 'create') {
    
            unset($_POST['action']);
            $project = new Project($_POST);
            $project->save();
        
            echo json_encode('Successfully Created!');

        } elseif ($_POST['action'] === 'edit') {

            unset($_POST['action']);
            UpdateProject::update($_POST);
            
            echo json_encode('Successfully Updated!');

        } elseif ($_POST['action'] === 'translate') {

            if (strtolower($_POST['type']) === 'save') {
                SaveTargetLangs::upload($_POST);
                echo json_encode('Successfully Saved!');
            } else {
                ResolveProject::resolve($_POST);
                echo json_encode('Successfully Resolved!');
            };
            
        } else {
            DoneReject::handle($_POST);
            echo json_encode('Successfully Updated!');
        };
    } else {

        $obj = json_decode($json);
    
        DeleteProject::delete($obj->id);
        echo json_encode('Successfully Deleted!');
    };
};
