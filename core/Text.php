<?php
    namespace Core;

    class Text
    {
        protected $spanResult;
        protected $text;

        public function __construct($text)
        {
            $this->spanResult = '';
            $this->text = (isset($_REQUEST[$text])) ? $_REQUEST[$text] : '';
        }
        public function TranslitSame()
        {
            $text = $this->text;
            $arr = explode(' ', $text);
            foreach ($arr as $key => $elem) {
                $arr[$key] = $this->RandTranslit($elem);
                $this->spanResult .= ' ';
            }
            return implode(' ', $arr);
        }

        private function RandTranslit($word)
        {
            $arr = preg_split('//u',$word,-1,PREG_SPLIT_NO_EMPTY);;
            $charsRU = preg_split('//u','аАВеЕкКмМНоОрРсСТхХ',-1,PREG_SPLIT_NO_EMPTY);
            $charsEN = str_split('aABeEkKmMHoOpPcCTxX');
            $str = '';
            foreach ($arr as $index => $char) {
                if (array_search($char, $charsRU)) {
                    $key = array_search($char, $charsRU);
                }
                elseif (array_search($char, $charsEN)) {
                    $key = array_search($char, $charsEN);
                }
                else $key = false;
                if ($key) {
                    $one = $charsRU[$key];
                    $onespan = '<span class="cyr">'.$one.'</span>';
                    $two = $charsEN[$key];
                    $twospan = '<span class="lat">'.$two.'</span>';
                    $rand = rand(1,2);
                    $str.= ($rand == 1) ? $one : $two;
                    $this->spanResult .= ($rand == 1) ? $onespan : $twospan;
                }
                else {
                    $str.=$char;
                    $this->spanResult .= '<span class="txt">'.$char.'</span>';
                }
            }
            return $str;
        }

        public function getSpan()
        {
            return $this->spanResult;
        }
    }