<?php

namespace app\Http\Requests;

class CustomerRequest
{
    public readonly string $username;
    public readonly string $lastname;
    public readonly string $birth;

    /**
     * @param string $name
     * @param string $lastname
     * @param string $birth
     */
    public function __construct(string $name, string $lastname, string $birth)
    {
        $this->username = $name;
        $this->lastname = $lastname;
        $this->birth = $birth;
    }
}