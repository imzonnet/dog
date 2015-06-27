<?php
namespace App\Components\Dashboard\Repositories;

use App\Permission;
use App\Repositories\EloquentBaseRepository;

class EloquentPermissionRepository extends EloquentBaseRepository implements PermissionRepository
{
    /**
     * @var Role
     */
    protected $model;

    /**
     * @param Role $model
     */
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }


    /**
     * Register list permissions
     *
     * @param array $data
     * @return mixed
     */
    public function register($data = array())
    {
        foreach($data as $perm) {
            $flag = $this->findBy('name', $perm['name']);
            if( !empty($flag) ) {
                $this->create($perm);
            }
        }
    }
}