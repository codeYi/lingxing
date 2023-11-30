<?php

namespace CodeYi\Lingxing\Services;

use CodeYi\Lingxing\Constants\ServeHttp;
use CodeYi\Lingxing\Dto\AccessTokenDto;
use CodeYi\Lingxing\Exception\GenerateAccessTokenException;
use CodeYi\Lingxing\Exception\InvalidAccessTokenException;
use CodeYi\Lingxing\Exception\RequiredParamsEmptyException;

class OpenAPIRequestService
{
    /** @var string openapi的域名 */
    private $host;
    /** @var string appID */
    private $appId;
    /** @var string appSecret */
    private $appSecret;
    /** @var AccessTokenDto */
    private $accessTokenDto;

    /**
     * @param string $host
     * @param string $appId
     * @param string $appSecret
     *
     * @throws \CodeYi\Lingxing\Exception\RequiredParamsEmptyException
     */
    public function __construct($host, $appId, $appSecret)
    {
        if (empty($host) || empty($appId) || empty($appSecret)) {
            throw new RequiredParamsEmptyException();
        }

        $this->host = rtrim($host, '/');
        $this->appId = $appId;
        $this->appSecret = !BaseRequestService::isUrlEncoded($appSecret) ? $appSecret : urldecode($appSecret);
    }

    /**
     * 请求OpenAPI接口
     *
     * @param string $routeName openapi接口路由，如/sc/oauth/service/getServiceStatus
     * @param string $method    请求方式
     * @param array  $params    请求参数
     * @param array  $headers   请求头，如需要
     *
     * @return array
     * @throws \CodeYi\Lingxing\Exception\InvalidAccessTokenException
     * @throws \CodeYi\Lingxing\Exception\InvalidResponseException
     * @throws \CodeYi\Lingxing\Exception\RequestException
     * @throws \Exception
     */
    public function makeRequest($routeName, $method, $params = [], $headers = [])
    {
        if ($this->accessTokenDto === null) {
            throw new InvalidAccessTokenException();
        }

        $timestamp = time();
        $qParams = [
            'access_token' => $this->accessTokenDto->getAccessToken(),
            'timestamp' => $timestamp,
            'app_key' => $this->appId
        ];
        $params = array_merge($params, $qParams);
        $method = strtoupper($method);
        if ($method === 'GET') {
            $qParams = $params;
        }
        $sign = SignService::makeSign($params, $this->appId);
        $qParams['sign'] = $sign;

        $headers[] = 'Content-Type: application/json';
        $url = BaseRequestService::pathJoin($this->host, $routeName);
        return BaseRequestService::sendRequest($method, BaseRequestService::buildHttpURL($url, BaseRequestService::makeQueryString($qParams)), json_encode($params), $headers);
    }

    /**
     * 获取AccessToken
     *
     * @return AccessTokenDto
     *
     * @return \CodeYi\Lingxing\Dto\AccessTokenDto
     * @throws \CodeYi\Lingxing\Exception\InvalidResponseException
     * @throws \CodeYi\Lingxing\Exception\RequestException
     */

    public function generateAccessToken()
    {
        $path = '/api/auth-server/oauth/access-token';
        $params = [
            'appId' => $this->appId,
            'appSecret' => $this->appSecret
        ];
        $url = BaseRequestService::pathJoin($this->host, $path);
        $res = BaseRequestService::sendPost(BaseRequestService::buildHttpURL($url, BaseRequestService::makeQueryString($params)));
        $this->generateAccessTokenDto(isset($res['data']) ? $res['data'] : []);
        return $this->accessTokenDto;
    }

    /**
     * 刷新AccessToken
     *
     * @param $refreshToken
     *
     * @return \CodeYi\Lingxing\Dto\AccessTokenDto
     * @throws \CodeYi\Lingxing\Exception\InvalidResponseException
     * @throws \CodeYi\Lingxing\Exception\RequestException
     */
    public function refreshToken($refreshToken)
    {
        $path = '/api/auth-server/oauth/refresh';
        $params = [
            'appId' => $this->appId,
            'refreshToken' => $refreshToken,
        ];

        $url = BaseRequestService::pathJoin($this->host, $path);
        $res = BaseRequestService::sendPost(BaseRequestService::buildHttpURL($url, BaseRequestService::makeQueryString($params)));
        $this->generateAccessTokenDto(isset($res['data']) ? $res['data'] : []);
        return $this->accessTokenDto;
    }

    /**
     * 从接口中获取AccessTokenDto
     *
     * @param $res
     *
     * @return void
     */
    private function generateAccessTokenDto($res)
    {
        $accessToken = empty($res['access_token']) ? '' : $res['access_token'];
        $refreshToken = empty($res['refresh_token']) ? '' : $res['refresh_token'];
        $expireAt = time() + (empty($res['expires_in']) ? 0 : $res['expires_in']);
        $ato = new AccessTokenDto();
        $ato->setAccessToken($accessToken)
            ->setRefreshToken($refreshToken)
            ->setExpireAt($expireAt);
        $this->accessTokenDto = $ato;
    }

    /**
     * 根据响应结果更新AccessToken的结构体
     *
     * @param $accessToken
     * @param $refreshToken
     * @param $expireAt
     *
     * @throws \CodeYi\Lingxing\Exception\GenerateAccessTokenException
     */
    public function setAccessToken($accessToken, $refreshToken = '', $expireAt = '')
    {
        if (empty($accessToken)) {
            throw new GenerateAccessTokenException();
        }

        $ato = new AccessTokenDto();
        $ato->setAccessToken($accessToken);
        if ($refreshToken) {
            $ato->setRefreshToken($refreshToken);
        }
        if ($expireAt) {
            $ato->setExpireAt($expireAt);
        }
        $this->accessTokenDto = $ato;
    }
}