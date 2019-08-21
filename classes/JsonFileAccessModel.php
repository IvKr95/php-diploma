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

        $content = substr_replace($content, '', -1, 1);
        return json_decode('[' . $content . ']');
    }

    public function writeJson(array $content): void
    {
        $json = json_encode($content, JSON_PRETTY_PRINT);

        $this->connect('a');

        if (is_writable($this->fileName)) {
            fwrite($this->file, $json);
            fwrite($this->file, ',');
        };

        $this->disconnect();
    }

    public function updateJson(array $content): void
    {
        $json = json_encode($content, JSON_PRETTY_PRINT);
        
        $this->connect('w');

        if (is_writable($this->fileName)) {
            fwrite($this->file, $json);
        };

        $this->disconnect();
    }
}