<?php

    namespace Core;

    use Core\Path;
    use Core\View;

    class layout
    {
        protected $title;
        protected $description;
        protected $bodyData;
        protected $inputName;

        public function __construct()
        {
            $this->title = (new Path())->getContent('title');
            $this->description = (new Path())->getContent('description');
            $this->bodyData = (new Path())->getData('body');
            $this->inputName = 'text';
        }

        public function getPage()
        {
            $data = $this->getData();
            return (new View('index', $data))->Render();
        }

        private function getData()
        {
            $text = new Text($this->inputName);
            $bodyData = $this->bodyData;
            $bodyData['textResult'] = $text->TranslitSame();
            $bodyData['colorView'] = $text->getSpan();
            return [
                'title' => $this->title,
                'description' => $this->description,
                'content' => (new View('content', $bodyData))->Render()
            ];
        }
    }