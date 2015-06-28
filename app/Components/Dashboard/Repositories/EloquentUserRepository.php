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

    /**
     * Create new record
     *
     * @param array $attributes
     * @return static
     */
    public function create(array $attributes = array())
    {
        if( !isset($attributes['activated'])) {
            $attributes['activated'] = 0;
        }
        return $this->model->create($attributes);
    }

    /**
     * Update a record
     *
     * @param int $id
     * @param array $attributes
     * @return mixed
     * @throws \Exception
     */
    public function update($model, array $attributes = array())
    {
        if( !isset($attributes['activated'])) {
            $attributes['activated'] = 0;
        }
        return $model->update($attributes);
    }

}