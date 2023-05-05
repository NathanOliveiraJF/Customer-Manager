<?php

namespace app\Http\Requests;

class AuthRequest
{
    public readonly string $username;
    public readonly string $password;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function validated(): bool
    {
        return (isset($this->username) || isset($this->password));
    }
}