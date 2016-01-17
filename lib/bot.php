<?php

/**
 * bot class for YAcURLWrapper
 * @author vijayant
 * @usage accepts a request object and returns a response object
 * Note: the bot has been implemented as a singleton!
 **/

namespace bot {

    require_once "request.php";
    require_once "response.php";

    class bot {
        private $ch;
        private $response;
        private $instance;

        private function __construct(){}

        public static function getInstance(){
            if(isset($instance))
                return $instance;
            else
                return $instance = new \bot\bot;
        }

        public function execute(\bot\request $request){
            $this->ch = curl_init();
            $this->response = new \bot\response;

            curl_setopt_array($this->ch, $request->getRequest());

            $this->response->setContent(curl_exec($this->ch));
            $this->response->setInfo(curl_getinfo($this->ch));

            curl_close($this->ch);

            return $this->response;
        }

    }
}

?>