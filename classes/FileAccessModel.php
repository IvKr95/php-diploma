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
        $this->connect('w');

        if (is_writable($this->fileName)) {
            fwrite($this->file, $content);
        };

        $this->disconnect();
    }

    public static function deleteDir(string $project)
    {
        $dirPath = __DIR__ . '/../' . Config::PROJECTS_PATH . $project;

        if (is_dir($dirPath)) {
            $files = scandir($dirPath);
        } else {
            throw new Exception('Not Directory');
        };
        
        foreach ($files as $key => $file) {
            if (($file !== '.') && ( $file !== '..' )) {
                $full = $dirPath . '/' . $file;
                if (is_dir($full)) {
                    rmdir($full);
                } else {
                    unlink($full);
                };
            };
        };

        rmdir($dirPath);
    }
};