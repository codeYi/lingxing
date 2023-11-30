<?php

namespace Ak\OpenAPI\Services;

use Ak\OpenAPI\Exception\EncryptException;

class SignService
{
    /**
     * 生成签名
     * @param array $params 请求参数
     * @param string $appId appId
     *
     * @return string 签名
     * @throws \Exception 生成签名失败时会抛出异常
     */
    public static function makeSign($params, $appId)
    {
        ksort($params);
        $qArr = [];
        foreach ($params as $k => $v) {
            if (is_array($v)) {
                $v = SignService::filter_array($v);
                $qArr[] = "$k=" . json_encode($v, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                // 空字符不进行签名计算
            } elseif ($v !== '') {
                // bool值要转成true false
                if (is_bool($v)) {
                    $v = $v ? 'true' : 'false';
                }
                if ($v === null) {
                    $v = 'null';
                }
                $qArr[] = "$k=$v";
            }
        }
        $qStr = implode('&', $qArr);
        $md5Content = strtoupper(md5($qStr));
        $opensslRes = openssl_encrypt(
            $md5Content,
            'AES-128-ECB',
            $appId,
            OPENSSL_RAW_DATA);
        if ($opensslRes === false) {
            throw new EncryptException('ak openapi sign encrypt exception');
        }

        return base64_encode($opensslRes);
    }

    private static function filter_array($array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = SignService::filter_array($value);
            } else {
                if ($value === null) {
                    unset($array[$key]);
                }
            }
        }
        return $array;

    }
}