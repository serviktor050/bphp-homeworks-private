<?php
    Class JsonFileAccessModel extends Config
    {
        protected $fileName;
        protected $file;

        public function __construct($name)
        {
            $this->fileName = self::DATABASE_PATH.$name.'.json';
        }

        private function connect()
        {
            $this->file = fopen($this->fileName, 'r+');
        }

        private function disconnect()
        {
            fclose($this->file);
        }

        public function read()
        {
            $this->connect();
            $content = fread($this->file, filesize($this->fileName));
            $this->disconnect();
            return $content;
        }

        public function write($content)
        {
            $this->file = fopen($this->fileName, 'w+');
            if ($this->file !== false) {
                fwrite($this->file, $content);
            };
            $this->disconnect();
        }

        public function readJson()
        {
            $this->connect();
            $contentJson = fread($this->file, filesize($this->fileName));
            $this->disconnect();
            return $contentJson;
        }

        public function writeJson($contentJson)
        {
            $this->file = fopen($this->fileName, 'w+');
            if ($this->file !== false) {
                fwrite($this->file, json_decode($contentJson, JSON_PRETTY_PRINT));
            };
            $this->disconnect();
        }
    }