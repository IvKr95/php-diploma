<?php

class JsonFileAccessModel extends FileAccessModel
{

    public function __construct(string $fileName)
    {
        $this->fileName = __DIR__ . '/../' . Config::DATABASE_PATH . $fileName . '.json';
    }

    public function readJson()
    {
        $this->connect('r');

        if (is_readable($this->fileName)) {
            $content = fread($this->file, filesize($this->fileName));
        };

        $this->disconnect();

        return json_decode($content);
    }

    public function writeJson($content): void
    {
        $json = json_encode($content, JSON_PRETTY_PRINT);

        $this->connect('w');

        if (is_writable($this->fileName)) { 
            fwrite($this->file, $json);
        };

        $this->disconnect();
    }
}