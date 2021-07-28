<?php

    namespace Core;

    use Core\Path;

    class View
    {
        protected $View;
        protected $Data;

        public function __construct($View, $Data = [])
        {
            $this->View = $View;
            $this->Data = $Data;
        }

        public function Render()
        {
            ob_start();
            extract($this->Data);
            include (new Path())->getView($this->View);
            return ob_get_clean();
        }
    }