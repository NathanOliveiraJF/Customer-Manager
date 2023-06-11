<?php

namespace app\Http\Requests;

class CustomerRequest
{
    public readonly string $id;

    public readonly string $username;
    public readonly string $lastname;
    public readonly string $birth;

    /**
     * @param string $name
     * @param string $lastname
     * @param string $birth
     * @param string $id
     */
    public function __construct(string $name, string $lastname, string $birth, string $id)
    {
        $this->username = $name;
        $this->lastname = $lastname;
        $this->birth = $birth;
        $this->id = $id;
    }
}