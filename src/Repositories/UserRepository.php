<?php namespace Lembarek\Auth\Repositories;

use Lembarek\Core\Repositories\Repository as MainRepository;
use Lembarek\Auth\Models\User;

class UserRepository extends MainRepository implements UserRepositoryInterface {

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }


}
