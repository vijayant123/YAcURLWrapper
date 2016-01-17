<?php

/**
 * response class for YAcURLWrapper
 * @author vijayant
 * @usage holds the response data once the bot has finished executing
 * @TODO format output and add cookie saving
 **/

namespace bot {

    class response {
        private $content = null;
        private $info = array();

        public function setInfo($info){
            $this->info = $info;
        }

        public function setContent($content){
            $this->content = $content;
        }

        public function getContent(){
            return $this->content;
        }

        public function getStatusCode(){
            if(isset($this->info["http_code"]))
                return $this->info["http_code"];
            else
                return null;
        }

        public function getInfo($name){
            if(isset($this->info[$name]))
                return $this->info[$name];
            else
                return null;
        }

        public function debug(){
            print_r($this->info);
            echo "\ncontent-length = " . strlen($this->content);
        }
    }
}

?>