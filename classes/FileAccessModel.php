<?php

class FileAccessModel 
{

    protected $dirName;
    protected $fileName;
    protected $dh;
    protected $file;

    public function __construct(string $dirName, string $fileName)
    {
        $this->dirName = __DIR__ . '/../' . Config::PROJECTS_PATH . $dirName;

        if (!is_dir($this->dirName)) {
            mkdir($this->dirName);
        };

        $this->fileName = $this->dirName . '/' . $fileName . '.txt';
    }

    protected function connect(string $mode): void
    {  
        $this->file = fopen($this->fileName, $mode);
    }

    protected function disconnect(): void
    {
        fclose($this->file);
    }

    public function read(): string
    {
        $this->connect('r');

        if (is_readable($this->fileName)) {
            $fileContent = fread($this->file, filesize($this->fileName));
        };

        $this->disconnect();
        return $fileContent;
    }

    public function write(string $content): void
    {
        $this->connect('a');

        if (is_writable($this->fileName)) {
            fwrite($this->file, $content);
        };

        $this->disconnect();
    }
};