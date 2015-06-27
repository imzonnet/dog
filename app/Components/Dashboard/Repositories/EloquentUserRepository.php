<?php
namespace App\Components\Dashboard\Repositories;

use App\Repositories\EloquentBaseRepository;
use App\User;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    
    /**
     * Return all records/entities for users
     *
     * @return array
     */
     public function listAllUsers(){
        $listUsers=array();
        $users=$this->model->all();
        foreach($users as $usr){
            $listUsers[$usr->id]=$usr->firstname.' '.$usr->lastname;
        }
        return $listUsers;
     }

}