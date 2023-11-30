<?php

namespace Ak\OpenAPI\Dto;

class AccessTokenDto
{
    /** @var string access token */
    private $accessToken;
    /** @var string refresh token */
    private $refreshToken;
    /** @var int 过期时间时间戳 */
    private $expireAt;

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     *
     * @return $this
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param string $refreshToken
     *
     * @return $this
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpireAt()
    {
        return $this->expireAt;
    }

    /**
     * @param int $expireIn
     *
     * @return $this
     */
    public function setExpireAt($expireIn)
    {
        $this->expireAt = $expireIn;
        return $this;
    }
}