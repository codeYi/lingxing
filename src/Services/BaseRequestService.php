<?php

namespace Ak\OpenAPI\Services;

use Ak\OpenAPI\Exception\InvalidResponseException;
use Ak\OpenAPI\Exception\RequestException;

class BaseRequestService
{
    /**
     * POST 请求
     * @param string $url
     * @param array $params
     *
     * @return array
     * @throws \Ak\OpenAPI\Exception\InvalidResponseException
     * @throws \Ak\OpenAPI\Exception\RequestException
     */
    public static function sendPost($url, $params = [], $headers = [])
    {
        return self::sendRequest('POST', $url, self::makeQueryString($params), $headers);
    }

    /**
     * GET 请求
     * @param string $url
     * @param array $params
     *
     * @return array
     * @throws \Ak\OpenAPI\Exception\InvalidResponseException
     * @throws \Ak\OpenAPI\Exception\RequestException
     */
    public static function sendGet($url, $params = [], $headers = [])
    {
        if ($params) {
            $qStr = self::makeQueryString($params);
            $url = self::buildHttpURL($url, $qStr);
        }
        return self::sendRequest('GET', $url, $headers);
    }

    /**
     * 发起http请求
     * @param string $method
     * @param string $url
     * @param string $params
     * @param array $headers
     *
     * @return array
     * @throws \Ak\OpenAPI\Exception\InvalidResponseException
     * @throws \Ak\OpenAPI\Exception\RequestException
     */
    public static function sendRequest($method, $url, $params = '', $headers = [])
    {
        $method = strtoupper($method);
        $headers[] = "X-HTTP-Method-Override: $method";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if ($method !== 'GET') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        if ('HTTPS' === strtoupper(substr($url, 0, 5))) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        $res = curl_exec($ch);
        $err = curl_error($ch);
        $errno = curl_errno($ch);
        if (false === $res || $err) {
            // 直接抛出异常
            throw new RequestException($err, $errno);
        }

        curl_close($ch);
        $realRes = json_decode($res, true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            // 抛出异常
            throw new InvalidResponseException(json_last_error_msg());
        }

        $code = isset($realRes['code']) ? $realRes['code'] : -1;
        if ($code === -1) {
            $msg = isset($realRes['msg']) ? $realRes['msg'] : (isset($realRes['message']) ? $realRes['message'] : '');
            throw new InvalidResponseException($msg);
        }

        return $realRes;
    }

    /**
     * 拼接QueryString
     * @param array|string $params 参数
     *
     * @return string
     */
    public static function makeQueryString($params)
    {
        if (is_string($params)) {
            return $params;
        }

        $qArr = [];
        foreach ($params as $k => $v){
            $qArr[] = rawurlencode($k) . '=' . rawurlencode($v);
        }

        return implode('&', $qArr);
    }

    /**
     * 拼接query string 到 URL
     * @param $url
     * @param $qStr
     *
     * @return string
     */
    public static function buildHttpURL($url, $qStr)
    {
        if (!$qStr) {
            return $url;
        }

        return join('?', [trim($url, '?'), trim($qStr, '?')]);
    }

    /**
     * 拼接路由
     * @param $url
     * @param ...$pathList
     * @return mixed|string
     */
    public static function pathJoin($url, ...$pathList)
    {
        $uri = trim($url, '/');
        foreach ($pathList as $path) {
            $uri = join('/', [$uri, trim($path, '/')]);
        }

        return $uri;
    }

    public static function isUrlEncoded($str)
    {
        $str = strtoupper($str);
        $dontNeedEncoding = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789-_.";
        $encoded = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $needEncode = false;
        for ($i = 0; $i < strlen($str); $i++) {
            $c = substr($str, $i, 1);
            if (strpos($dontNeedEncoding, $c) !== false) {//不需要处理
                continue;
            }
            if ($c == '%' && ($i + 2) < strlen($str)) { // 判断是否符合urlEncode规范
                $c1 = substr($str, ++$i, 1);
                $c2 = substr($str, ++$i, 1);
                if (strpos($encoded, $c1) !== false && strpos($encoded, $c2) !== false) {
                    continue;
                }
            } // 其他字符，肯定需要urlEncode
            $needEncode = true;
            break;
        } //如果有字符需要进行编码，那这个字符串肯定就是没有经过编码的
        return !$needEncode;
    }
}