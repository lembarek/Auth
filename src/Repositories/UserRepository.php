<?php

 namespace Lembarek\Auth\Repositories;

use Lembarek\Auth\Models\User;

class UserRepository extends Repository implements UserRepositoryInterface
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
