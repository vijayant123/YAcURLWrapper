<?php

namespace bot {

    class request {

        private $options = array();

        public function __construct($url = null){
            $this->setDefaults();
            if(isset($url))
                $this->setURL($url);
        }


        public function setDefaults(){
            unset($this->options);
            $this->options = array(
                CURLOPT_HTTPGET => true,                // make GET request
                CURLOPT_RETURNTRANSFER => true,         // return web page
                CURLOPT_HEADER         => true,         // return headers
                CURLOPT_FOLLOWLOCATION => true,         // follow redirects
                CURLOPT_ENCODING       => "",           // handle all encodings
                CURLOPT_USERAGENT      => "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)",     // who am i
                CURLOPT_AUTOREFERER    => true,         // set referer on redirect
                CURLOPT_CONNECTTIMEOUT => 120,          // timeout on connect
                CURLOPT_TIMEOUT        => 120,          // timeout on response
                CURLOPT_MAXREDIRS      => 10,           // stop after 10 redirects
                CURLOPT_SSL_VERIFYHOST => 0,            // don't verify ssl
                CURLOPT_SSL_VERIFYPEER => false        //
            );

        }

        public function setURL($url){
            $this->options[CURLOPT_URL] = $url;
        }

        public function setAgent($agent){
            $this->options[CURLOPT_USERAGENT] = $agent;
        }

        public function POST(array $data, $url = null){
            $this->options[CURLOPT_HTTPGET] = false;
            $this->options[CURLOPT_POST] = true;
            $this->options[CURLOPT_POSTFIELDS] = http_build_query($data);
            if(isset($url))
                setURL($url);
        }

        public function setHeaders(array $headers){
            $this->options[CURLOPT_HEADER] = $headers;
        }

        public function debug(){
            print_r($this->options);
        }

    }
}

?>