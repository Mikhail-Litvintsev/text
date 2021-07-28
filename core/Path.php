<?php


    namespace Core;


    class Path
    {
        public function getView($name)
        {
            $dutyPath = $_SERVER['DOCUMENT_ROOT']."/view/$name.php";
            return $this->getPath($dutyPath);
        }

        public function getPath($name)
        {
            $ds = DIRECTORY_SEPARATOR;
            return str_replace(['/','\\'],$ds,$name);
        }

        public function getFullPath($name)
        {
            $ds = DIRECTORY_SEPARATOR;
            $dutyPath = $_SERVER['DOCUMENT_ROOT'].$name;
            return str_replace(['/','\\'],$ds,$dutyPath);
        }

        public function getContent($name)
        {
            $uri = '/content/'.$name.'.txt';
            $path = $this->getFullPath($uri);
            return file_get_contents($path);
        }
        public function getArrPath($arr)
        {
            foreach ($arr as $key => $elem) {
                $arr[$key] = $this->getPath($elem);
           }
            return $arr;
        }
    }