<?php
class Http
{
    public $cookie_jar = 'cookies.txt';
    public $agent = "";
    public function __construct()
    {
        $this->agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36";
        $this->cookie_jar = dirname(__FILE__) . '/cookies.txt';
    }

    public function UserAgent($agent){
        $this->agent = $agent;
    }
    public function PostJson($url, $data, $headers = "", $cookies = "", $proxy = ""){
        $urlc = curl_init($url);
        curl_setopt($urlc, CURLOPT_REFERER, 'https://www.facebook.com');
        curl_setopt($urlc, CURLOPT_POST, 1);
        curl_setopt($urlc, CURLOPT_POSTFIELDS, $data);
        curl_setopt($urlc, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($urlc, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($urlc, CURLOPT_HEADER, 0);
        curl_setopt($urlc, CURLOPT_COOKIEJAR, $this->cookie_jar);
        curl_setopt($urlc, CURLOPT_COOKIEFILE, $this->cookie_jar);
        curl_setopt($urlc, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($urlc, CURLOPT_SSL_VERIFYPEER, 0);
        //curl_setopt($urlc, CURLOPT_PROXY, '127.0.0.1:8888');
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($urlc, CURLOPT_HTTPHEADER, $headers);

        if (!empty($cookies)){
            curl_setopt($urlc, CURLOPT_COOKIE, $cookies);
        }

        if (!empty($proxy)){
            curl_setopt($urlc, CURLOPT_PROXY, $proxy);
        }

        if (empty($this->agent)){
            curl_setopt($urlc, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36');
        }else{
            curl_setopt($urlc, CURLOPT_USERAGENT, $this->agent);
        }

        $res = curl_exec($urlc);
        return $res;
    }
    public function Post($url, $data, $headers = "", $cookies = "", $proxy = "")
    {
        $urlc = curl_init($url);
        curl_setopt($urlc, CURLOPT_REFERER, 'https://www.facebook.com');
        curl_setopt($urlc, CURLOPT_POST, 1);
        curl_setopt($urlc, CURLOPT_POSTFIELDS, $data);
        curl_setopt($urlc, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($urlc, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($urlc, CURLOPT_HEADER, 1);
        curl_setopt($urlc, CURLOPT_COOKIEJAR, $this->cookie_jar);
        curl_setopt($urlc, CURLOPT_COOKIEFILE, $this->cookie_jar);
        curl_setopt($urlc, CURLOPT_PROXY, '127.0.0.1:8888');

        if (!empty($headers)){
            curl_setopt($urlc, CURLOPT_HTTPHEADER, $headers);
        }

        if (!empty($cookies)){
            curl_setopt($urlc, CURLOPT_COOKIE, $cookies);
        }

        if (!empty($proxy)){
            curl_setopt($urlc, CURLOPT_PROXY, $proxy);
        }

        if (empty($this->agent)){
            curl_setopt($urlc, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36');
        }else{
            curl_setopt($urlc, CURLOPT_USERAGENT, $this->agent);
        }

        $res = curl_exec($urlc);
        return $res;
    }


    public function Get($url, $headers = "", $cookies = "", $proxy = "")
    {
        $urlc = curl_init($url);
        //echo 'url; ' . $url;
        curl_setopt($urlc, CURLOPT_REFERER, 'https://www.facebook.com');
        curl_setopt($urlc, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($urlc, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($urlc, CURLOPT_HEADER, 1);
        //curl_setopt($urlc, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($urlc,CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($urlc, CURLOPT_COOKIEJAR, $this->cookie_jar);
        //curl_setopt($urlc, CURLOPT_COOKIEFILE, $this->cookie_jar);
        // curl_setopt($urlc, CURLOPT_PROXY, '127.0.0.1:8888');

        if (!empty($headers)){
            curl_setopt($urlc, CURLOPT_HTTPHEADER, $headers);
        }

        if (!empty($cookies)){
            curl_setopt($urlc, CURLOPT_COOKIE, $cookies);
        }

        if (!empty($proxy)){
            curl_setopt($urlc, CURLOPT_PROXY, $proxy);
        }

        if (empty($this->agent)){
            curl_setopt($urlc, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36');
        }else{
            curl_setopt($urlc, CURLOPT_USERAGENT, $this->agent);
        }

        $res = curl_exec($urlc);
        return $res;
    }

    function GetCaptcha($url,$saveto){
        $ch = curl_init ($url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_REFERER, 'https://www.google.com');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_jar);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_jar);
        $raw=curl_exec($ch);
        curl_close ($ch);
        if(file_exists($saveto)){
            unlink($saveto);
        }
        $fp = fopen($saveto,'x');
        fwrite($fp, $raw);
        fclose($fp);
    }

    function ClearCookies(){
        unlink($this->cookie_jar);
    }

    function GetBetween($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    function GetBetweenAll($str, $startDelimiter, $endDelimiter) {
        $contents = array();
        $startDelimiterLength = strlen($startDelimiter);
        $endDelimiterLength = strlen($endDelimiter);
        $startFrom = $contentStart = $contentEnd = 0;
        while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
            $contentStart += $startDelimiterLength;
            $contentEnd = strpos($str, $endDelimiter, $contentStart);
            if (false === $contentEnd) {
                break;
            }
            $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
            $startFrom = $contentEnd + $endDelimiterLength;
        }

        return $contents;
    }
    function getAll($strHTML, $strStart, $strEnd){

        $arrResults = array();
        preg_match_all('@' . $strStart . '([^<]*)' . $strEnd . '@', $strHTML, $arrResults);
        return $arrResults[1];
    }
}