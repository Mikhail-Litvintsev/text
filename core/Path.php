<?php


    namespace Core;


    class Path
    {
        public function getView($name)
        {
            $dutyPath = $_SERVER['DOCUMENT_ROOT'] . "/view/$name.php";
            return $this->getPath($dutyPath);
        }

        public function getPath($name)
        {
            $ds = DIRECTORY_SEPARATOR;
            return str_replace(['/', '\\'], $ds, $name);
        }

        public function getFullPath($name)
        {
            $ds = DIRECTORY_SEPARATOR;
            $dutyPath = $_SERVER['DOCUMENT_ROOT'] . $name;
            return str_replace(['/', '\\'], $ds, $dutyPath);
        }

        public function getContent($name)
        {
            $uri = '/content/' . $name . '.txt';
            $path = $this->getFullPath($uri);
            return file_get_contents($path);
        }

        public function getData($place)
        {
            $uri = '/content/' . $place . '/';
            $path = $this->getFullPath($uri);
            $folder = scandir($path);
            unset($folder[0]);
            unset($folder[1]);
            $data = [];
            foreach ($folder as $elem) {
                $file = $this->regFiltr($elem);
                if ($file[2] == 'txt') {
                    $data[$file[1]] = file_get_contents($path . $file[0]);
                }
            }
            return $data;
        }

        public function regFiltr($name)
        {
            preg_match('#^([^.]+).([^.]+)$#', $name, $match);
            return $match;
        }
    }