<?php
    namespace Core;
    use Core\Path;
    use Core\View;

    class layout
    {
        protected $title;
        protected $description;
        protected $preface;
        protected $contentTitle;

        public function __construct()
        {
            $this->title = (new Path())->getContent('title');
            $this->description = (new Path())->getContent('description');
            $this->preface = (new Path())->getContent('preface');
            $this->contentTitle = (new Path())->getContent('contentTitle');
        }

        public function getPage()
        {
            $data = $this->getData();
            return (new View('Index', $data))->Render();
        }

        private function getData()
        {
            $text = new Text('text');
            $textResult = $text->TranslitSame();
            $show = $text->getSpan();
            return [
                'title' => $this->title,
                'description' => $this->description,
                'content' => (new View('Content',
                    ['show' => $show,
                    'contentTitle' => $this->contentTitle,
                    'preface' => $this->preface,
                    'textResult' => $textResult
                    ]))->Render()
            ];
        }
    }